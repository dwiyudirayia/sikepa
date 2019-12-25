<?php
namespace App\Http\Controllers;

use App\User;
use App\Repositories\Interfaces\NotificationRepositoryInterfaces;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Builder;

class SatkerController extends Controller
{
    private $notification;
    public function __construct(NotificationRepositoryInterfaces $notification)
    {
        $this->notification = $notification;
    }
    public function index()
    {
        try {
            $data = User::with('roles')->whereHas('roles', function(Builder $query) {
                $query->whereBetween('id', [2, 13]);
            })->where('id', '!=', auth()->user()->id)->get();
            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function create()
    {
        try {
            $data['role'] = Role::whereBetween('id', [2, 13])->get();

            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->store());
        if($request->role == "Bagian Kerja Sama")
        {
            $user->assignRole(["Bagian Kerja Sama", "Bagian Kerja Sama Final"]);
        } elseif ($request->role == "Sesmen") {
            $user->assignRole(["Sesmen", "Sesmen Final"]);
        } elseif($request->role == "Menteri") {
            $user->assignRole(["Menteri", "Menteri Final"]);
        } else {
            $user->assignRole($request->role);
        }

        $data = User::with('roles')->whereHas('roles', function(Builder $query) {
            $query->whereBetween('id', [2, 13]);
        })->where('id', '!=', auth()->user()->id)->get();

        return response()->json($this->notification->storeSuccess($data));
    }
    public function changeStatus($id) {
        try {
            $data = User::findOrFail($id);
            $data->active = !$data->active;
            $data->save();

            $data = User::with('roles')->whereHas('roles', function(Builder $query) {
                $query->whereBetween('id', [2, 13]);
            })->where('id', '!=', auth()->user()->id)->get();
            return response()->json($this->notification->updateSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->updateFailed($th));
        }
    }
    public function edit($id) {
        try {
            $data = User::with('roles')->findOrFail($id);

            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function destroy($id) {
        try {
            $data = User::findOrFail($id);
            $data->delete();

            $data = User::with('roles')->whereHas('roles', function(Builder $query) {
                $query->whereBetween('id', [2, 13]);
            })->where('id', '!=', auth()->user()->id)->get();
            return response()->json($this->notification->deleteSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->deleteFailed($th));
        }
    }
    public function update(UpdateUserRequest $request, $id) {
        User::whereId($id)->update($request->update());

        $userUpdatePermission = User::findOrFail($id);
        if($request->role == "Bagian Kerja Sama")
        {
            $userUpdatePermission->syncRoles(["Bagian Kerja Sama", "Bagian Kerja Sama Final"]);
        } elseif ($request->role == "Sesmen") {
            $userUpdatePermission->syncRoles(["Sesmen", "Sesmen Final"]);
        } elseif($request->role == "Menteri") {
            $userUpdatePermission->syncRoles(["Menteri", "Menteri Final"]);
        } else {
            $userUpdatePermission->syncRoles($request->role);
        }

        $data = User::with('roles')->whereHas('roles', function(Builder $query) {
            $query->whereBetween('id', [2, 13]);
        })->where('id', '!=', auth()->user()->id)->get();

        return response()->json($this->notification->updateSuccess($data));
    }
}
