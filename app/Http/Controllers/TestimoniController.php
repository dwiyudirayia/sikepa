<?php

namespace App\Http\Controllers;

use App\Testimoni;
use App\Repositories\Interfaces\NotificationRepositoryInterfaces;
use App\Http\Requests\StoreTestimoniRequest;

class TestimoniController extends Controller
{
    private $notification;

    public function __construct(NotificationRepositoryInterfaces $notification)
    {
        $this->notification = $notification;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $getPermissions = request()->user()->getPermissionNames();
            $data = Testimoni::all();

            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTestimoniRequest $request)
    {
        try {
            Testimoni::create($request->store());

            $data = Testimoni::all();

            return response()->json($this->notification->storeSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->storeFailed($th));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $data = Testimoni::findOrFail($id);
            $data->delete();

            $currentData = Testimoni::all();
            return response()->json($this->notification->deleteSuccess($currentData));
        } catch (\Throwable $th) {
            return response()->json($this->notification->deleteFailed($th));
        }
    }
}
