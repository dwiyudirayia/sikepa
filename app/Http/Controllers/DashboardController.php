<?php

namespace App\Http\Controllers;

use App\ApprovalOldSubmissionCooperation;
use App\Repositories\Interfaces\NotificationRepositoryInterfaces;
use App\SubmissionProposalGuest;
use App\SubmissionProposal;
use Illuminate\Database\Eloquent\Builder;
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

            $data['data_deputi_kesetaraan_gender_guest'] = SubmissionProposalGuest::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 3);
            })->get();
            $data['data_deputi_kesetaraan_gender'] = SubmissionProposal::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 3);
            })->get();

            $data['deputi_kesetaraan_gender'] = array_merge($data['data_deputi_kesetaraan_gender_guest']->toArray(), $data['data_deputi_kesetaraan_gender']->toArray());
            //
            $data['pks_approve'] = SubmissionProposal::where('type_id', 1)->where('status_proposal', 1)->where('status_disposition', 17)->get()->count();
            $data['pks_approve_guest'] = SubmissionProposalGuest::where('type_guest_id', 1)->where('status_proposal', 1)->where('status_disposition', 17)->get()->count();

            $data['mou_approve'] = SubmissionProposal::where('type_id', 2)->where('status_proposal', 1)->where('status_disposition', 17)->get()->count();
            $data['mou_approve_guest'] = SubmissionProposalGuest::where('type_guest_id', 2)->where('status_proposal', 1)->where('status_disposition', 17)->get()->count();

            $data['pks_reject'] = SubmissionProposal::where('type_id', 1)->where('status_proposal', 0)->get()->count();
            $data['pks_reject_guest'] = SubmissionProposalGuest::where('type_guest_id', 1)->where('status_proposal', 0)->get()->count();

            $data['mou_reject'] = SubmissionProposal::where('type_id', 2)->where('status_proposal', 0)->get()->count();
            $data['mou_reject_guest'] = SubmissionProposalGuest::where('type_guest_id', 2)->where('status_proposal', 0)->get()->count();

            $data['pks_process'] = SubmissionProposal::where('type_id', 1)->where('status_proposal', 1)->where('status_disposition', '<', 17)->get()->count();
            $data['pks_process_guest'] = SubmissionProposalGuest::where('type_guest_id', 1)->where('status_proposal', 1)->where('status_disposition', '<', 17)->get()->count();

            $data['mou_process'] = SubmissionProposal::where('type_id', 2)->where('status_proposal', 1)->where('status_disposition', '<', 17)->get()->count();
            $data['mou_process_guest'] = SubmissionProposalGuest::where('type_guest_id', 2)->where('status_proposal', 1)->where('status_disposition', '<', 17)->get()->count();

            $data['pks_total'] = SubmissionProposal::where('type_id', 1)->get()->count();
            $data['pks_total_guest'] = SubmissionProposalGuest::where('type_guest_id', 1)->get()->count();

            $data['mou_total'] = SubmissionProposal::where('type_id', 2)->get()->count();
            $data['mou_total_guest'] = SubmissionProposalGuest::where('type_guest_id', 2)->get()->count();

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
