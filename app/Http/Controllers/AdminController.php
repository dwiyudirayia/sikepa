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
                $query->whereBetween('id', [1,4]);
            })->where('id', '!=', request()->user()->id)->get();

            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }

    public function create()
    {
        try {
            $data = Permission::whereBetween('id', [1, 26])->get();

            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function store(StoreUserRequest $request)
    {

    }
}
