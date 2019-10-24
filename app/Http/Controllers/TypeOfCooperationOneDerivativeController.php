<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\NotificationRepositoryInterfaces;
use App\Http\Requests\StoreTypeOfCooperationOneDerivative;
use App\Http\Requests\UpdateTypeOfCooperationOneDerivative;
use App\TypeOfCooperation;
use App\TypeOfCooperationOneDerivative;

class TypeOfCooperationOneDerivativeController extends Controller
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
            $data = TypeOfCooperationOneDerivative::all();

            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function create() {
        try {
            $data = TypeOfCooperation::all();

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
    public function store(StoreTypeOfCooperationOneDerivative $request)
    {
        try {
            TypeOfCooperationOneDerivative::create($request->store());
            $data = TypeOfCooperationOneDerivative::where('type_of_cooperation_id', $request->type_of_cooperation_id)->get();
            return response()->json($this->notification->storeSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->storeFailed($th));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $data = TypeOfCooperationOneDerivative::findOrFail($id);

            return response()->json($this->notification->showSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->showFailed($th));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $data['data'] = TypeOfCooperationOneDerivative::findOrFail($id);
            $data['select'] = TypeOfCooperation::all();

            return response()->json($this->notification->showSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->showFailed($th));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTypeOfCooperationOneDerivative $request, $id)
    {
        try {
            TypeOfCooperationOneDerivative::where('id', $id)->update($request->update());
            $array = TypeOfCooperationOneDerivative::where('type_of_cooperation_id', $request->type_of_cooperation_id)->get();

            return response()->json($this->notification->updateSuccess($array));
        } catch (\Throwable $th) {

            return response()->json($this->notification->updateSuccess($th));
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
            $data = TypeOfCooperationOneDerivative::findOrFail($id);
            $data->delete();

            $array = TypeOfCooperationOneDerivative::where('type_of_cooperation_id', $data->type_of_cooperation_id)->get();
            return response()->json($this->notification->deleteSuccess($array));
        } catch (\Throwable $th) {
            return response()->json($this->notification->deleteFailed($th));
        }
    }
    public function listTypeOfCooperationOne($id) {
        try {
            $data = TypeOfCooperationOneDerivative::where('type_of_cooperation_id', $id)->get();
            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
}
