<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\NotificationRepositoryInterfaces;
use Spatie\Permission\Models\Permission;
use App\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Auth;
use Hash;
class UserController extends Controller
{
    private $notification;

    public function __construct(NotificationRepositoryInterfaces $notification)
    {
        $this->notification = $notification;
    }
    public function getUserLogin()
    {
        $user = request()->user();
        $permissions = [];
        foreach (Permission::all() as $permission) {
            if (request()->user()->can($permission->name)) {
                $permissions[] = $permission->name;
            }
        }
        $user['permission'] = $permissions;
        return response()->json(['status' => 'success', 'data' => $user]);
    }
    public function checkSameCurrentPassword($current_password)
    {
        if (!(Hash::check($current_password, request()->user()->password))) {
            // The passwords matches
            return response()->json(['isSameCurrentPassword' => true]);
        } else {
            return response()->json(['isSameCurrentPassword' => false]);
        }
    }
    public function checkNewPassword($current_password, $new_password) {
        if(strcmp($current_password, $new_password) == 0){
            //Current password and new password are same
            return response()->json(['isSameNewPassword' => true]);
        } else {
            return response()->json(['isSameNewPassword' => false]);
        }
    }
    public function changePassword(Request $request)
    {
        try {
            $user = User::findOrFail(Auth::user()->id);
            $user->password = Hash::make($request->get('new_password'));
            $user->save();

            $data = [
                'messages' => 'Password Berhasil di Ubah',
                'status' => 200
            ];

            return response()->json($data);

        } catch (\Exception $e) {
            $data = [
                'messages' => $e->getMessage(),
                'status' => $e->getCode()
            ];
            return response()->json($data);
        }
    }
    public function accessRight() {
        try {
            $data['roles'] = Role::all();
            $data['permissions'] = Permission::all();

            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function storeRole(Request $request) {
        try {
            Role::create([
                'name' => $request->name,
                'guard_name' => 'web'
            ]);

            $data['roles'] = Role::all();
            $data['permissions'] = Permission::all();

            return response()->json($this->notification->storeSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->storeFailed($th));
        }
    }
    public function destroyRole($id) {
        try {
            $data = Role::findOrFail($id);
            $data->delete();

            $currentData['roles'] = Role::all();
            $currentData['permissions'] = Permission::all();

            return response()->json($this->notification->deleteSuccess($currentData));
        } catch (\Throwable $th) {
            return response()->json($this->notification->deleteFailed($th));
        }
    }
    public function editRole($id)
    {
        try {
            $data['data'] = Role::findOrFail($id);
            $data['roles'] = Role::where('id', $id)->get();
            $data['admin'] = Permission::whereIn('id', [1, 2, 3, 4, 5, 6, 9, 10])->get();
            $data['general'] = Permission::whereIn('id', [7, 8, 11])->get();

            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function getData() {
        try {
            $data['user'] = User::where('id', '!=', request()->user()->id)->get();
            $data['roles'] = Role::all();

            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
}
