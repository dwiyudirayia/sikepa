<?php

namespace App\Http\Controllers;

use App\ApprovalOldSubmissionCooperation;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\NotificationRepositoryInterfaces;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    private $notification;

    public function __construct(NotificationRepositoryInterfaces $notification)
    {
        $this->notification = $notification;
    }
    public function index() {
        try {
            $data['old_monev'] = ApprovalOldSubmissionCooperation::groupBy('status')->select('status', DB::raw('count(*) as total'))->get();

            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
}
