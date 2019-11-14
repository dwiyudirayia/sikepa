<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\NotificationRepositoryInterfaces;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Builder;
class AdminController extends Controller
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
                $query->where('id', 1);
            })->where('id', '!=', auth()->user()->id)->get();
            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function create()
    {
        try {
            $data = Role::where('id', 1)->get();

            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function store(StoreUserRequest $request)
    {
        try {
            $user = User::create($request->store());
            $user->assignRole($request->role);

            $data = User::with('roles')->whereHas('roles', function(Builder $query) {
                $query->where('id', 1);
            })->where('id', '!=', auth()->user()->id)->get();

            return response()->json($this->notification->storeSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->storeFailed($th));
        }
    }
    public function changeStatus(Request $request, $id) {
        try {
            $data = User::findOrFail($id);
            $data->active = !$data->active;
            $data->save();

            $data = User::with('roles')->whereHas('roles', function(Builder $query) {
                $query->where('id', 1);
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
                $query->where('id', 1);
            })->where('id', '!=', auth()->user()->id)->get();

            return response()->json($this->notification->deleteSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->deleteFailed($th));
        }
    }
    public function update(UpdateUserRequest $request, $id) {
        try {
            $user = User::whereId($id)->update($request->update());

            $userUpdateRole = User::findOrFail($id);
            $userUpdateRole->syncRoles($request->role);

            $data = User::with('roles')->whereHas('roles', function(Builder $query) {
                $query->where('id', 1);
            })->where('id', '!=', auth()->user()->id)->get();

            return response()->json($this->notification->updateSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->updateFailed($th));
        }
    }
}
