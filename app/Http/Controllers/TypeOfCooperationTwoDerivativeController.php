<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\NotificationRepositoryInterfaces;
use App\Http\Requests\StoreTypeOfCooperationTwoDerivative;
use App\Http\Requests\UpdateTypeOfCooperationTwoDerivative;
use App\TypeOfCooperationTwoDerivative;
use App\TypeOfCooperation;
use App\TypeOfCooperationOneDerivative;

class TypeOfCooperationTwoDerivativeController extends Controller
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
            $data = TypeOfCooperationTwoDerivative::all();

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
    public function store(StoreTypeOfCooperationTwoDerivative $request)
    {
        try {
            TypeOfCooperationTwoDerivative::create($request->store());
            $data = TypeOfCooperationTwoDerivative::where('type_of_cooperation_one_derivative_id', $request->type_of_cooperation_one_derivative_id)->get();

            return response()->json($this->notification->storeSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->storeFailed($th));
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $data = TypeOfCooperationTwoDerivative::findOrFail($id);

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
            $data['data'] = TypeOfCooperationTwoDerivative::findOrFail($id);
            $data['select_type_of'] = TypeOfCooperation::all();
            $data['select_type_of_derivative'] = TypeOfCooperationOneDerivative::all();

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
    public function update(UpdateTypeOfCooperationTwoDerivative $request, $id)
    {
        try {
            TypeOfCooperationTwoDerivative::where('id', $id)->update($request->update());
            $array = TypeOfCooperationTwoDerivative::where('type_of_cooperation_one_derivative_id', $request->type_of_cooperation_one_derivative_id)->get();

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
            $data = TypeOfCooperationTwoDerivative::findOrFail($id);
            $data->delete();

            $array = TypeOfCooperationTwoDerivative::where('type_of_cooperation_one_derivative_id', $data->type_of_cooperation_one_derivative_id)->get();
            return response()->json($this->notification->deleteSuccess($array));
        } catch (\Throwable $th) {
            return response()->json($this->notification->deleteFailed($th));
        }
    }
    public function listTypeOfCooperationTwo($id) {
        try {
            $data = TypeOfCooperationTwoDerivative::where('type_of_cooperation_one_derivative_id', $id)->get();

            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function createType($id) {
        try {
            $data = TypeOfCooperationOneDerivative::where('type_of_cooperation_id', $id)->get();

            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
}
