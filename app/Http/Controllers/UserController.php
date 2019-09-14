<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\NotificationRepositoryInterfaces;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\User;

class UserController extends Controller
{
    private $notification;

    public function __construct(NotificationRepositoryInterfaces $notification)
    {
        $this->notification = $notification;
    }
    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(StoreUserRequest $request)
    {
        try {
            $user = User::create($request->store());

            return response()->json($this->notification->storeSuccess());
        } catch (\Throwable $th) {
            return response()->json($this->notification->storeFailed($th));
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        try {
            $user = User::findOrFail($id);
            return response()->json($this->notification->showSuccess($user));
        } catch (\Throwable $th) {
            return response()->json($this->notification->showFailed($th));
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        try {
            $user = User::findOrFail($id);

            return response()->json($this->notification->showSuccess($user));
        } catch (\Throwable $th) {
            return response()->json($this->notification->showFailed($th));
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        try {
            $user = User::where('id', $id)->update($request->update());

            return response()->json($this->notification->updateSuccess());
        } catch (\Throwable $th) {

            return response()->json($this->notification->updateSuccess($th));
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return response()->json($this->notification->deleteSuccess());
        } catch (\Throwable $th) {
            return response()->json($this->notification->deleteFailed($th));
        }
    }
}
