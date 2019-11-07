<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\NotificationRepositoryInterfaces;
use App\ApprovalOldSubmissionCooperation;

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
    public function storeActivity() {

    }
}
