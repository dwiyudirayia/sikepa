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
    public function userLists()
    {
        try {
            $data = User::where('role', '!=', 3)->get();
            return response()->json($this->notification->generalSuccess($data));

        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function getUserLogin()
    {
        $user = request()->user(); //MENGAMBIL USER YANG SEDANG LOGIN
        $permissions = [];
        $role = [];
        foreach (Permission::all() as $permission) {
            //JIKA USER YANG SEDANG LOGIN PUNYA PERMISSION TERKAIT
            if (request()->user()->can($permission->name)) {
                $permissions[] = $permission->name; //MAKA PERMISSION TERSEBUT DITAMBAHKAN
            }
        }
        foreach (Role::all() as $role) {
            //JIKA USER YANG SEDANG LOGIN PUNYA PERMISSION TERKAIT
            if (request()->user()->can($role->name)) {
                $role[] = $role->name; //MAKA PERMISSION TERSEBUT DITAMBAHKAN
            }
        }
        $user['permission'] = $permissions; //PERMISSION YANG DIMILIKI DIMASUKKAN KE DALAM DATA USER.
        $user['role'] = $role; //PERMISSION YANG DIMILIKI DIMASUKKAN KE DALAM DATA USER.
        return response()->json(['status' => 'success', 'data' => $user]);
    }
    public function checkSameCurrentPassword($current_password)
    {
        if (!(Hash::check($current_password, Auth::user()->password))) {
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
}
