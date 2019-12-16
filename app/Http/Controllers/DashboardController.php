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
            // Kesetaraan Gender
            $data['data_deputi_kesetaraan_gender_guest_pks'] = SubmissionProposalGuest::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 4);
            })->where('type_guest_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();
            $data['data_deputi_kesetaraan_gender_pks'] = SubmissionProposal::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 4);
            })->where('type_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();

            $data['data_deputi_kesetaraan_gender_guest_mou'] = SubmissionProposalGuest::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 4);
            })->where('type_guest_id', 2)->where('status_disposition', 17)->where('status_proposal', 1)->get();
            $data['data_deputi_kesetaraan_gender_mou'] = SubmissionProposal::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 4);
            })->where('type_id', 2)->where('status_disposition', 17)->where('status_proposal', 1)->get();

            $data['deputi_kesetaraan_gender_pks'] = array_merge($data['data_deputi_kesetaraan_gender_guest_pks']->toArray(), $data['data_deputi_kesetaraan_gender_pks']->toArray());

            $data['deputi_kesetaraan_gender_mou'] = array_merge($data['data_deputi_kesetaraan_gender_guest_mou']->toArray(), $data['data_deputi_kesetaraan_gender_mou']->toArray());

            // Partisipasi Masyarakat
            $data['data_deputi_partisipasi_masyarakat_guest_pks'] = SubmissionProposalGuest::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 3);
            })->where('type_guest_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();
            $data['data_deputi_partisipasi_masyarakat_pks'] = SubmissionProposal::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 3);
            })->where('type_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();
            $data['data_deputi_partisipasi_masyarakat_guest_mou'] = SubmissionProposalGuest::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 3);
            })->where('type_guest_id', 2)->where('status_disposition', 17)->where('status_proposal', 1)->get();
            $data['data_deputi_partisipasi_masyarakat_mou'] = SubmissionProposal::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 3);
            })->where('type_id', 2)->where('status_disposition', 17)->where('status_proposal', 1)->get();

            $data['deputi_partisipasi_masyarakat_pks'] = array_merge($data['data_deputi_partisipasi_masyarakat_guest_pks']->toArray(), $data['data_deputi_partisipasi_masyarakat_pks']->toArray());

            $data['deputi_partisipasi_masyarakat_mou'] = array_merge($data['data_deputi_partisipasi_masyarakat_guest_mou']->toArray(), $data['data_deputi_partisipasi_masyarakat_mou']->toArray());

            // Perlindungan Anak
            $data['data_deputi_perlindungan_anak_guest_pks'] = SubmissionProposalGuest::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 5);
            })->where('type_guest_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();
            $data['data_deputi_perlindungan_anak_pks'] = SubmissionProposal::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 5);
            })->where('type_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();
            $data['data_deputi_perlindungan_anak_guest_mou'] = SubmissionProposalGuest::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 5);
            })->where('type_guest_id', 2)->where('status_disposition', 17)->where('status_proposal', 1)->get();
            $data['data_deputi_perlindungan_anak_mou'] = SubmissionProposal::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 5);
            })->where('type_id', 2)->where('status_disposition', 17)->where('status_proposal', 1)->get();

            $data['deputi_perlindungan_anak_pks'] = array_merge($data['data_deputi_perlindungan_anak_guest_pks']->toArray(), $data['data_deputi_perlindungan_anak_pks']->toArray());

            $data['deputi_perlindungan_anak_mou'] = array_merge($data['data_deputi_perlindungan_anak_guest_mou']->toArray(), $data['data_deputi_perlindungan_anak_mou']->toArray());

            // Perlindungan Hak Perempuan
            $data['data_deputi_perlindungan_hak_perempuan_guest_pks'] = SubmissionProposalGuest::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 6);
            })->where('type_guest_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();
            $data['data_deputi_perlindungan_hak_perempuan_pks'] = SubmissionProposal::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 6);
            })->where('type_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();
            $data['data_deputi_perlindungan_hak_perempuan_guest_mou'] = SubmissionProposalGuest::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 6);
            })->where('type_guest_id', 2)->where('status_disposition', 17)->where('status_proposal', 1)->get();
            $data['data_deputi_perlindungan_hak_perempuan_mou'] = SubmissionProposal::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 6);
            })->where('type_id', 2)->where('status_disposition', 17)->where('status_proposal', 1)->get();

            $data['deputi_perlindungan_hak_perempuan_pks'] = array_merge($data['data_deputi_perlindungan_hak_perempuan_guest_pks']->toArray(), $data['data_deputi_perlindungan_hak_perempuan_pks']->toArray());

            $data['deputi_perlindungan_hak_perempuan_mou'] = array_merge($data['data_deputi_perlindungan_hak_perempuan_guest_mou']->toArray(), $data['data_deputi_perlindungan_hak_perempuan_mou']->toArray());

            // Perlindungan Tumbuh Kembang Anak
            $data['data_deputi_tumbuh_kembang_anak_guest_pks'] = SubmissionProposalGuest::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 7);
            })->where('type_guest_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();
            $data['data_deputi_tumbuh_kembang_anak_pks'] = SubmissionProposal::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 7);
            })->where('type_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();
            $data['data_deputi_tumbuh_kembang_anak_guest_mou'] = SubmissionProposalGuest::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 7);
            })->where('type_guest_id', 2)->where('status_disposition', 17)->where('status_proposal', 1)->get();
            $data['data_deputi_tumbuh_kembang_anak_mou'] = SubmissionProposal::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 7);
            })->where('type_id', 2)->where('status_disposition', 17)->where('status_proposal', 1)->get();

            $data['deputi_tumbuh_kembang_anak_pks'] = array_merge($data['data_deputi_tumbuh_kembang_anak_guest_pks']->toArray(), $data['data_deputi_tumbuh_kembang_anak_pks']->toArray());

            $data['deputi_tumbuh_kembang_anak_mou'] = array_merge($data['data_deputi_tumbuh_kembang_anak_guest_mou']->toArray(), $data['data_deputi_tumbuh_kembang_anak_mou']->toArray());

            //Widget
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
    public function filterKesetaraanGenderPKS($year) {

        try {
            // Kesetaraan Gender
            $data['data_deputi_kesetaraan_gender_guest_pks'] = SubmissionProposalGuest::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 4);
            })->where('type_guest_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();
            $data['data_deputi_kesetaraan_gender_pks'] = SubmissionProposal::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 4);
            })->where('type_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();

            $data['deputi_kesetaraan_gender_pks'] = array_merge($data['data_deputi_kesetaraan_gender_guest_pks']->toArray(), $data['data_deputi_kesetaraan_gender_pks']->toArray());

            $collectData = collect($data['deputi_kesetaraan_gender_pks']);

            $filtered = $collectData->where('year', $year);

            $result = $filtered->all();

            return response()->json($this->notification->generalSuccess($result));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function filterKesetaraanGenderMOU($year) {

        try {
            // Kesetaraan Gender
            $data['data_deputi_kesetaraan_gender_guest_mou'] = SubmissionProposalGuest::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 4);
            })->where('type_guest_id', 2)->where('status_disposition', 17)->where('status_proposal', 1)->get();
            $data['data_deputi_kesetaraan_gender_mou'] = SubmissionProposal::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 4);
            })->where('type_id', 2)->where('status_disposition', 17)->where('status_proposal', 1)->get();

            $data['deputi_kesetaraan_gender_mou'] = array_merge($data['data_deputi_kesetaraan_gender_guest_mou']->toArray(), $data['data_deputi_kesetaraan_gender_mou']->toArray());

            $collectData = collect($data['deputi_kesetaraan_gender_mou']);

            $filtered = $collectData->where('year', $year);

            $result = $filtered->all();

            return response()->json($this->notification->generalSuccess($result));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function filterPartisipasiMasyarakatPKS($year) {

        try {
            // Partisipasi Masyarakat
            $data['data_deputi_partisipasi_masyarakat_guest_pks'] = SubmissionProposalGuest::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 3);
            })->where('type_guest_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();
            $data['data_deputi_partisipasi_masyarakat_pks'] = SubmissionProposal::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 3);
            })->where('type_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();

            $data['deputi_partisipasi_masyarakat_pks'] = array_merge($data['data_deputi_partisipasi_masyarakat_guest_pks']->toArray(), $data['data_deputi_partisipasi_masyarakat_pks']->toArray());

            $collectData = collect($data['deputi_partisipasi_masyarakat_pks']);

            $filtered = $collectData->where('year', $year);

            $result = $filtered->all();

            return response()->json($this->notification->generalSuccess($result));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function filterPartisipasiMasyarakatMOU($year) {

        try {
            // Partisipasi Masyarakat
            $data['data_deputi_partisipasi_masyarakat_guest_mou'] = SubmissionProposalGuest::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 3);
            })->where('type_guest_id', 2)->where('status_disposition', 17)->where('status_proposal', 1)->get();
            $data['data_deputi_partisipasi_masyarakat_mou'] = SubmissionProposal::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 3);
            })->where('type_id', 2)->where('status_disposition', 17)->where('status_proposal', 1)->get();

            $data['deputi_partisipasi_masyarakat_mou'] = array_merge($data['data_deputi_partisipasi_masyarakat_guest_mou']->toArray(), $data['data_deputi_partisipasi_masyarakat_mou']->toArray());

            $collectData = collect($data['deputi_partisipasi_masyarakat_mou']);

            $filtered = $collectData->where('year', $year);

            $result = $filtered->all();

            return response()->json($this->notification->generalSuccess($result));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function filterPerlindunganAnakPKS($year) {

        try {
            // Perlindungan Anak
            $data['data_deputi_perlindungan_anak_guest_pks'] = SubmissionProposalGuest::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 3);
            })->where('type_guest_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();
            $data['data_deputi_perlindungan_anak_pks'] = SubmissionProposal::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 3);
            })->where('type_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();

            $data['deputi_perlindungan_anak_pks'] = array_merge($data['data_deputi_perlindungan_anak_guest_pks']->toArray(), $data['data_deputi_perlindungan_anak_pks']->toArray());

            $collectData = collect($data['deputi_perlindungan_anak_pks']);

            $filtered = $collectData->where('year', $year);

            $result = $filtered->all();

            return response()->json($this->notification->generalSuccess($result));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function filterPerlindunganAnakMOU($year) {

        try {
            // Partisipasi Masyarakat
            $data['data_deputi_perlindungan_anak_guest_mou'] = SubmissionProposalGuest::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 3);
            })->where('type_guest_id', 2)->where('status_disposition', 17)->where('status_proposal', 1)->get();
            $data['data_deputi_perlindungan_anak_mou'] = SubmissionProposal::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 3);
            })->where('type_id', 2)->where('status_disposition', 17)->where('status_proposal', 1)->get();

            $data['deputi_perlindungan_anak_mou'] = array_merge($data['data_deputi_perlindungan_anak_guest_mou']->toArray(), $data['data_deputi_perlindungan_anak_mou']->toArray());

            $collectData = collect($data['deputi_perlindungan_anak_mou']);

            $filtered = $collectData->where('year', $year);

            $result = $filtered->all();

            return response()->json($this->notification->generalSuccess($result));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function filterPerlindunganHakPerempuanPKS($year) {

        try {
            // Perlindungan Anak
            $data['data_deputi_perlindungan_hak_perempuan_guest_pks'] = SubmissionProposalGuest::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 3);
            })->where('type_guest_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();
            $data['data_deputi_perlindungan_hak_perempuan_pks'] = SubmissionProposal::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 3);
            })->where('type_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();

            $data['deputi_perlindungan_hak_perempuan_pks'] = array_merge($data['data_deputi_perlindungan_hak_perempuan_guest_pks']->toArray(), $data['data_deputi_perlindungan_hak_perempuan_pks']->toArray());

            $collectData = collect($data['deputi_perlindungan_hak_perempuan_pks']);

            $filtered = $collectData->where('year', $year);

            $result = $filtered->all();

            return response()->json($this->notification->generalSuccess($result));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function filterPerlindunganHakPerempuanMOU($year) {

        try {
            // Partisipasi Masyarakat
            $data['data_deputi_perlindungan_hak_perempuan_guest_mou'] = SubmissionProposalGuest::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 3);
            })->where('type_guest_id', 2)->where('status_disposition', 17)->where('status_proposal', 1)->get();
            $data['data_deputi_perlindungan_hak_perempuan_mou'] = SubmissionProposal::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 3);
            })->where('type_id', 2)->where('status_disposition', 17)->where('status_proposal', 1)->get();

            $data['deputi_perlindungan_hak_perempuan_mou'] = array_merge($data['data_deputi_perlindungan_hak_perempuan_guest_mou']->toArray(), $data['data_deputi_perlindungan_hak_perempuan_mou']->toArray());

            $collectData = collect($data['deputi_perlindungan_hak_perempuan_mou']);

            $filtered = $collectData->where('year', $year);

            $result = $filtered->all();

            return response()->json($this->notification->generalSuccess($result));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function filterPerlindunganTumbuhKembangAnakPKS($year) {

        try {
            // Perlindungan Anak
            $data['data_deputi_tumbuh_kembang_anak_guest_pks'] = SubmissionProposalGuest::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 3);
            })->where('type_guest_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();
            $data['data_deputi_tumbuh_kembang_anak_pks'] = SubmissionProposal::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 3);
            })->where('type_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();

            $data['deputi_tumbuh_kembang_anak_pks'] = array_merge($data['data_deputi_tumbuh_kembang_anak_guest_pks']->toArray(), $data['data_deputi_tumbuh_kembang_anak_pks']->toArray());

            $collectData = collect($data['deputi_tumbuh_kembang_anak_pks']);

            $filtered = $collectData->where('year', $year);

            $result = $filtered->all();

            return response()->json($this->notification->generalSuccess($result));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function filterPerlindunganTumbuhKembangAnakMOU($year) {

        try {
            // Partisipasi Masyarakat
            $data['data_deputi_tumbuh_kembang_anak_guest_mou'] = SubmissionProposalGuest::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 3);
            })->where('type_guest_id', 2)->where('status_disposition', 17)->where('status_proposal', 1)->get();
            $data['data_deputi_tumbuh_kembang_anak_mou'] = SubmissionProposal::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 3);
            })->where('type_id', 2)->where('status_disposition', 17)->where('status_proposal', 1)->get();

            $data['deputi_tumbuh_kembang_anak_mou'] = array_merge($data['data_deputi_tumbuh_kembang_anak_guest_mou']->toArray(), $data['data_deputi_tumbuh_kembang_anak_mou']->toArray());

            $collectData = collect($data['deputi_perlindungan_hak_perempuan_mou']);

            $filtered = $collectData->where('year', $year);

            $result = $filtered->all();

            return response()->json($this->notification->generalSuccess($result));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
}
