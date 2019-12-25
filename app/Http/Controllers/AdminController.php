<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\NotificationRepositoryInterfaces;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateUserRequest;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Builder;
use Validator;
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
    public function store(Request $request)
    {
        Validator::extend('without_spaces', function($attr, $value){
            return preg_match('/^\S*$/u', $value);
        });

        Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required|without_spaces|unique:users,username|regex:/(^[A-Za-z0-9]+$)+/',
            'email' => 'required|email|unique:users,email',
            'nip' => 'required',
        ], [
            'name.required' => 'Nama Harus di Isi',
            'username.required' => 'Username Harus di Isi',
            'username.unique' => 'Username Sudah Digunakan',
            'email.required' => 'Email Harus di Isi',
            'email.email' => 'Format Email Tidak Sesuai',
            'email.unique' => 'Email Sudah Digunakan',
            'nip.required' => 'NIP Harus di Isi',
        ])->validate();

        if($request->hasFile('photo')) {
            $extentionPhoto = $request->photo->getClientOriginalExtension();
            $filenamePhoto = 'photo'.'-'.date('Y-m-d').'-'.time().'.'.$extentionPhoto;
            $pathPhoto = $request->photo->storeAs($request->username, $filenamePhoto, 'photo_user');
        } else {
            $pathPhoto = null;
        }

        $user = User::create([
            'created_by' => auth()->user()->id,
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nip' => $request->nip,
            'jabatan' => $request->jabatan,
            'photo' => $pathPhoto,
            // 'signature' => $pathSignature,
            'active' => 1
        ]);
        $user->assignRole($request->role);

        $data = User::with('roles')->whereHas('roles', function(Builder $query) {
            $query->where('id', 1);
        })->where('id', '!=', auth()->user()->id)->get();
        return response()->json($this->notification->storeSuccess($data));
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
        $user = User::whereId($id)->update($request->update());

        $userUpdateRole = User::findOrFail($id);
        $userUpdateRole->syncRoles($request->role);

        $data = User::with('roles')->whereHas('roles', function(Builder $query) {
            $query->where('id', 1);
        })->where('id', '!=', auth()->user()->id)->get();

        return response()->json($this->notification->updateSuccess($data));
    }
}
