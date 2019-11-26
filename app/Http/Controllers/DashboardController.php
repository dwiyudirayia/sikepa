<?php

namespace App\Http\Controllers;

use App\ApprovalOldSubmissionCooperation;
use App\Repositories\Interfaces\NotificationRepositoryInterfaces;
use App\SubmissionProposalOld;
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
            $data['old_monev_all'] = ApprovalOldSubmissionCooperation::groupBy('year')
            ->select(DB::raw('count(IF(status = 1, 1, NULL)) as status_valid, count(IF(status = 0, 1, NULL)) as status_not_valid, year(tanggal_ttd) as year'))
            ->orderBy('year', 'asc')
            ->take(5)
            ->get();

            $data['submission_proposal_old'] = SubmissionProposalOld::groupBy('year')
            ->select(DB::raw('count(IF(status =1, 1, NULL)) as status_valid, count(IF(status = 0, 1, NULL)) as status_not_valid, year'))
            ->orderBy('year', 'asc')
            ->take(5)
            ->get();

            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function filterOldMonev($year) {
        try {
            $data['old_monev_all'] = ApprovalOldSubmissionCooperation::groupBy('year')
            ->select(DB::raw('count(IF(status = 1, 1, NULL)) as status_valid, count(IF(status = 0, 1, NULL)) as status_not_valid, year(tanggal_ttd) as year'))
            ->whereRaw('year(tanggal_ttd) = ?', $year)
            ->orderBy('year', 'asc')
            ->take(5)
            ->get();

            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
}
