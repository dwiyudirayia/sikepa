<?php

namespace App\Http\Controllers;

use App\SubmissionType;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\NotificationRepositoryInterfaces;

class SubmissionTypeController extends Controller
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
    public function store(Request $request)
    {
        try {
            SubmissionType::create([
                'name' => $request->name,
                'created_by' => auth()->user()->id
            ]);

            return response()->json([
                'messages' => 'Data Berhasil di Masukan',
                'status' => 200,
            ]);
        } catch(\Throwable $th) {
            return response()->json($this->notification->storeFailed($th));
        }
    }
    public function edit($id) {
        try {
            $data = SubmissionType::findOrFail($id);

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
    public function update(Request $request, $id)
    {
        try {
            SubmissionType::where('id', $id)->update([
                'name' => $request->name,
                'updated_by' => auth()->user()->id
            ]);

            return response()->json([
                'messages' => 'Data Berhasil di Perbaharui',
                'status' => 200,
            ]);
        } catch(\Throwable $th) {
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
            $data = SubmissionType::findOrFail($id);
            $data->delete();

            return response()->json([
                'messages' => 'Data Berhasil di Hapus',
                'status' => 200,
            ]);
        } catch (\Throwable $th) {
            return response()->json($this->notification->deleteFailed($th));
        }
    }
}
