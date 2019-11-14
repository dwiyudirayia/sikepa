<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\NotificationRepositoryInterfaces;
use App\ApprovalOldSubmissionCooperation;
use App\ApprovalOldSubmissionCooperationActivity;
use App\Http\Requests\StoreMonevActivityRequest;

class MonevController extends Controller
{
    private $notification;

    public function __construct(NotificationRepositoryInterfaces $notification)
    {
        $this->notification = $notification;
    }
    public function index() {
        try {
            $data = ApprovalOldSubmissionCooperation::all();

            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function createActivity($id) {
        try {
            $data = ApprovalOldSubmissionCooperation::findOrFail($id);

            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function storeActivity(StoreMonevActivityRequest $request) {
        try {
            $store = ApprovalOldSubmissionCooperationActivity::create($request->store());
            if($request->hasFile('documentation')) {
                foreach ($request->documentation as $key => $value) {
                    $extention = $value->getClientOriginalExtension();
                    $fileName = 'activity-documentation'.'-'.date('Y-m-d').'-'.time().'.'.$extention;
                    $path = $value->storeAs($store->id, $fileName, 'file_page');
                    $store->documentation()->create([
                        'created_by' => auth()->user()->id,
                        'approval_old_submission_cooperation_activity_id' => $store->id,
                        'name' => $path
                    ]);
                }
            }
            $data = ApprovalOldSubmissionCooperation::all();
            return response()->json($this->notification->storeSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->storeFailed($th));
        }
    }
    public function showActivity($id) {
        try {
            $data = ApprovalOldSubmissionCooperation::with('activities', 'activities.documentation', 'nomor', 'parties')->findOrFail($id);

            return response()->json($this->notification->showSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->showFailed($th));
        }
    }
    public function deleteActivity($id) {
        try {
            $delete = ApprovalOldSubmissionCooperation::findOrFail($id);
            $delete->delete();

            $data = ApprovalOldSubmissionCooperation::all();
            return response()->json($this->notification->deleteSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->deleteFailed($th));
        }
    }
    public function listMonevActivity($id) {
        try {
            $data = ApprovalOldSubmissionCooperationActivity::where('approval_old_submission_cooperation_id', $id)->get();

            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function destroyListMonevActivity($id) {
        try {
            $delete = ApprovalOldSubmissionCooperationActivity::findOrFail($id);
            $delete->delete();

            $data = ApprovalOldSubmissionCooperationActivity::all();
            return response()->json($this->notification->deleteSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->deleteFailed($th));
        }
    }
}
