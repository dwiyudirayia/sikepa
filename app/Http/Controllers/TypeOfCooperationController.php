<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\NotificationRepositoryInterfaces;
use App\Http\Requests\StoreTypeOfCooperationRequest;
use App\Http\Requests\UpdateTypeOfCooperationRequest;
use App\SubmissionType;
use App\TypeOfCooperation;

class TypeOfCooperationController extends Controller
{
    private $notification;

    public function __construct(NotificationRepositoryInterfaces $notification)
    {
        $this->notification = $notification;
    }
    public function create() {
        try {
            $data = SubmissionType::all();

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
    public function store(StoreTypeOfCooperationRequest $request)
    {
        try {
            TypeOfCooperation::create($request->store());
            $data = TypeOfCooperation::all();
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
            $data = TypeOfCooperation::where('submission_type_id', $id)->get();

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
            $data['data'] = TypeOfCooperation::findOrFail($id);
            $data['tipe'] = SubmissionType::all();

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
    public function update(UpdateTypeOfCooperationRequest $request, $id)
    {
        try {
            TypeOfCooperation::where('id', $id)->update($request->update());
            $data = TypeOfCooperation::all();

            return response()->json($this->notification->updateSuccess($data));
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
            $data = TypeOfCooperation::findOrFail($id);

            $array = TypeOfCooperation::where('submission_type_id', $data->submission_type_id)->get();
            $data->delete();

            return response()->json($this->notification->deleteSuccess($array));
        } catch (\Throwable $th) {
            return response()->json($this->notification->deleteFailed($th));
        }
    }
}
