<?php
namespace App\Http\Controllers;

use App\User;
use App\Repositories\Interfaces\NotificationRepositoryInterfaces;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Spatie\Permission\Models\Permission;
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
            $data = User::with('permissions')->whereHas('permissions', function(Builder $query) {
                $query->whereBetween('id', [5, 8]);
            })->where('id', '!=', request()->user()->id)->get();
            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function create()
    {
        try {
            $data = Permission::whereBetween('id', [5, 8])->get();
            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function store(StoreUserRequest $request)
    {
        try {
            $user = User::create($request->store());
            $user->givePermissionTo($request->permissions);

            $data = User::with('permissions')->whereHas('permissions', function(Builder $query) {
                $query->whereBetween('id', [5, 8]);
            })->where('id', '!=', request()->user()->id)->get();

            return response()->json($this->notification->storeSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->storeFailed($th));
        }
    }
    public function changeStatus($id) {
        try {
            $data = User::findOrFail($id);
            $data->active = !$data->active;
            $data->save();

            $data = User::with('permissions')->whereHas('permissions', function(Builder $query) {
                $query->whereBetween('id', [5, 8]);
            })->where('id', '!=', request()->user()->id)->get();
            return response()->json($this->notification->updateSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->updateFailed($th));
        }
    }
    public function edit($id) {
        try {
            $data = User::with('permissions')->findOrFail($id);

            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function destroy($id) {
        try {
            $data = User::findOrFail($id);
            $data->delete();

            $data = User::with('permissions')->whereHas('permissions', function(Builder $query) {
                $query->whereBetween('id', [5, 8]);
            })->where('id', '!=', request()->user()->id)->get();
            return response()->json($this->notification->deleteSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->deleteFailed($th));
        }
    }
    public function update(UpdateUserRequest $request, $id) {
        try {
            $user = User::where('id', $id)->update($request->update());
            $user->syncPermissions($request->permissions);

            $data = User::with('permissions')->whereHas('permissions', function(Builder $query) {
                $query->whereBetween('id', [5, 8]);
            })->where('id', '!=', request()->user()->id)->get();

            return response()->json($this->notification->updateSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->updateFailed($th));
        }
    }
}
