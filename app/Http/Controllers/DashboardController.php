<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\NotificationRepositoryInterfaces;
use App\SatisfactionSurvey;
use App\SubmissionProposalGuest;
use App\SubmissionProposal;
use Carbon\Carbon;
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
            $data['survey'] = SatisfactionSurvey::
            select(DB::raw('count(IF(survey = 1, 1, NULL)) as sangat_tidak_memuaskan, count(IF(survey = 2, 1, NULL)) as tidak_memuaskan, count(IF(survey = 3, 1, NULL)) as sesuai_standar, count(IF(survey = 4, 1, NULL)) as memuaskan,count(IF(survey = 5, 1, NULL)) as sangat_memuaskan, monthname(created_at) as monthname'))
            ->where('verified', 1)
            ->whereYear('created_at', Carbon::now()->format('Y'))
            ->groupBy('monthname')
            ->orderByRaw('FIELD(monthname, "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December")')
            ->take(5)
            ->get();

            $data['survey_year'] = SatisfactionSurvey::groupBy('year')
            ->select(DB::raw('year(created_at) as year'))
            ->where('verified', 1)
            ->orderBy('year', 'desc')
            ->take(5)
            ->get();
            //Instansi PKS
            // $merge['data_deputi_agencies_guest_pks'] = SubmissionProposalGuest::with('agencies')->select(DB::raw('*,year(created_at) year'))->where('type_guest_id', 1)->get();
            // $merge['data_deputi_agencies_pks'] = SubmissionProposal::with('agencies')->select(DB::raw('*,year(created_at) year'))->where('type_id', 1)->get();

            // $mergeAgenciesPKS = collect(array_merge($merge['data_deputi_agencies_guest_pks']->toArray(), $merge['data_deputi_agencies_pks']->toArray()));
            // $groupedDataAgenciesPKS = $mergeAgenciesPKS->groupBy('agencies_id');
            // $groupedYearAgenciesPKS = $mergeAgenciesPKS->groupBy('year');
            // $data['agencies_pks'] = array_values($groupedDataAgenciesPKS->toArray());
            // $data['agencies_year_pks'] = array_values($groupedYearAgenciesPKS->toArray());

            //Instansi MOU
            $merge['data_deputi_agencies_guest_mou'] = SubmissionProposalGuest::with('agencies')->select(DB::raw('*,year(created_at) year'))->where('type_guest_id', 2)->get();
            $merge['data_deputi_agencies_mou'] = SubmissionProposal::with('agencies')->select(DB::raw('*,year(created_at) year'))->where('type_id', 2)->get();

            $mergeAgenciesMOU = collect(array_merge($merge['data_deputi_agencies_guest_mou']->toArray(), $merge['data_deputi_agencies_mou']->toArray()));
            $groupedDataAgenciesMOU = $mergeAgenciesMOU->groupBy('agencies_id');
            $groupedYearAgenciesMOU = $mergeAgenciesMOU->groupBy('year');
            $data['agencies_mou'] = array_values($groupedDataAgenciesMOU->toArray());
            $data['agencies_year_mou'] = array_values($groupedYearAgenciesMOU->toArray());

            // Kesetaraan Gender
            // $merge['data_deputi_kesetaraan_gender_guest_pks'] = SubmissionProposalGuest::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
            //     $q->where('role_id', 4);
            // })->where('type_guest_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();
            // $merge['data_deputi_kesetaraan_gender_pks'] = SubmissionProposal::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
            //     $q->where('role_id', 4);
            // })->where('type_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();

            $merge['data_deputi_kesetaraan_gender_guest_mou'] = SubmissionProposalGuest::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 4);
            })->where('type_guest_id', 2)->where('status_disposition', 17)->where('status_proposal', 1)->get();
            $merge['data_deputi_kesetaraan_gender_mou'] = SubmissionProposal::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 4);
            })->where('type_id', 2)->where('status_disposition', 17)->where('status_proposal', 1)->get();

            // $data['deputi_kesetaraan_gender_pks'] = array_merge($merge['data_deputi_kesetaraan_gender_guest_pks']->toArray(), $merge['data_deputi_kesetaraan_gender_pks']->toArray());

            $data['deputi_kesetaraan_gender_mou'] = array_merge($merge['data_deputi_kesetaraan_gender_guest_mou']->toArray(), $merge['data_deputi_kesetaraan_gender_mou']->toArray());

            // Partisipasi Masyarakat
            // $merge['data_deputi_partisipasi_masyarakat_guest_pks'] = SubmissionProposalGuest::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
            //     $q->where('role_id', 3);
            // })->where('type_guest_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();
            // $merge['data_deputi_partisipasi_masyarakat_pks'] = SubmissionProposal::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
            //     $q->where('role_id', 3);
            // })->where('type_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();

            $merge['data_deputi_partisipasi_masyarakat_guest_mou'] = SubmissionProposalGuest::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 3);
            })->where('type_guest_id', 2)->where('status_disposition', 17)->where('status_proposal', 1)->get();
            $merge['data_deputi_partisipasi_masyarakat_mou'] = SubmissionProposal::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 3);
            })->where('type_id', 2)->where('status_disposition', 17)->where('status_proposal', 1)->get();

            // $data['deputi_partisipasi_masyarakat_pks'] = array_merge($merge['data_deputi_partisipasi_masyarakat_guest_pks']->toArray(), $merge['data_deputi_partisipasi_masyarakat_pks']->toArray());

            $data['deputi_partisipasi_masyarakat_mou'] = array_merge($merge['data_deputi_partisipasi_masyarakat_guest_mou']->toArray(), $merge['data_deputi_partisipasi_masyarakat_mou']->toArray());

            // Perlindungan Anak
            // $merge['data_deputi_perlindungan_anak_guest_pks'] = SubmissionProposalGuest::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
            //     $q->where('role_id', 5);
            // })->where('type_guest_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();
            // $merge['data_deputi_perlindungan_anak_pks'] = SubmissionProposal::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
            //     $q->where('role_id', 5);
            // })->where('type_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();

            $merge['data_deputi_perlindungan_anak_guest_mou'] = SubmissionProposalGuest::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 5);
            })->where('type_guest_id', 2)->where('status_disposition', 17)->where('status_proposal', 1)->get();
            $merge['data_deputi_perlindungan_anak_mou'] = SubmissionProposal::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 5);
            })->where('type_id', 2)->where('status_disposition', 17)->where('status_proposal', 1)->get();

            // $data['deputi_perlindungan_anak_pks'] = array_merge($merge['data_deputi_perlindungan_anak_guest_pks']->toArray(), $merge['data_deputi_perlindungan_anak_pks']->toArray());

            $data['deputi_perlindungan_anak_mou'] = array_merge($merge['data_deputi_perlindungan_anak_guest_mou']->toArray(), $merge['data_deputi_perlindungan_anak_mou']->toArray());

            // Perlindungan Hak Perempuan
            // $merge['data_deputi_perlindungan_hak_perempuan_guest_pks'] = SubmissionProposalGuest::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
            //     $q->where('role_id', 6);
            // })->where('type_guest_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();
            // $merge['data_deputi_perlindungan_hak_perempuan_pks'] = SubmissionProposal::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
            //     $q->where('role_id', 6);
            // })->where('type_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();

            $merge['data_deputi_perlindungan_hak_perempuan_guest_mou'] = SubmissionProposalGuest::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 6);
            })->where('type_guest_id', 2)->where('status_disposition', 17)->where('status_proposal', 1)->get();
            $merge['data_deputi_perlindungan_hak_perempuan_mou'] = SubmissionProposal::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 6);
            })->where('type_id', 2)->where('status_disposition', 17)->where('status_proposal', 1)->get();

            // $data['deputi_perlindungan_hak_perempuan_pks'] = array_merge($merge['data_deputi_perlindungan_hak_perempuan_guest_pks']->toArray(), $merge['data_deputi_perlindungan_hak_perempuan_pks']->toArray());

            $data['deputi_perlindungan_hak_perempuan_mou'] = array_merge($merge['data_deputi_perlindungan_hak_perempuan_guest_mou']->toArray(), $merge['data_deputi_perlindungan_hak_perempuan_mou']->toArray());

            // Perlindungan Tumbuh Kembang Anak
            // $merge['data_deputi_tumbuh_kembang_anak_guest_pks'] = SubmissionProposalGuest::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
            //     $q->where('role_id', 7);
            // })->where('type_guest_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();
            // $merge['data_deputi_tumbuh_kembang_anak_pks'] = SubmissionProposal::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
            //     $q->where('role_id', 7);
            // })->where('type_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();

            $merge['data_deputi_tumbuh_kembang_anak_guest_mou'] = SubmissionProposalGuest::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 7);
            })->where('type_guest_id', 2)->where('status_disposition', 17)->where('status_proposal', 1)->get();
            $merge['data_deputi_tumbuh_kembang_anak_mou'] = SubmissionProposal::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 7);
            })->where('type_id', 2)->where('status_disposition', 17)->where('status_proposal', 1)->get();

            // $data['deputi_tumbuh_kembang_anak_pks'] = array_merge($merge['data_deputi_tumbuh_kembang_anak_guest_pks']->toArray(), $merge['data_deputi_tumbuh_kembang_anak_pks']->toArray());

            $data['deputi_tumbuh_kembang_anak_mou'] = array_merge($merge['data_deputi_tumbuh_kembang_anak_guest_mou']->toArray(), $merge['data_deputi_tumbuh_kembang_anak_mou']->toArray());

            //Pengajuan Kerjasama Per Tahun PKS
            // $merge['data_submission_cooperation_guest_pks'] = SubmissionProposalGuest::groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->where('type_guest_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();

            // $merge['data_submission_cooperation_pks'] = SubmissionProposal::groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->where('type_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();

            // $data['submission_cooperation_pks'] = array_merge($merge['data_submission_cooperation_guest_pks']->toArray(), $merge['data_submission_cooperation_pks']->toArray());

            //Pengajuan Kerjasama Per Tahun MOU
            $merge['data_submission_cooperation_guest_mou'] = SubmissionProposalGuest::groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->where('type_guest_id', 2)->where('status_disposition', 17)->where('status_proposal', 1)->get();

            $merge['data_submission_cooperation_mou'] = SubmissionProposal::groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->where('type_id', 2)->where('status_disposition', 17)->where('status_proposal', 1)->get();

            $data['submission_cooperation_mou'] = array_merge($merge['data_submission_cooperation_guest_mou']->toArray(), $merge['data_submission_cooperation_mou']->toArray());

            //Widget
            // $data['pks_approve'] = SubmissionProposal::where('type_id', 1)->where('status_proposal', 1)->where('status_disposition', 17)->get()->count();
            // $data['pks_approve_guest'] = SubmissionProposalGuest::where('type_guest_id', 1)->where('status_proposal', 1)->where('status_disposition', 17)->get()->count();

            $data['mou_approve'] = SubmissionProposal::where('type_id', 2)->where('status_proposal', 1)->where('status_disposition', 17)->get()->count();
            $data['mou_approve_guest'] = SubmissionProposalGuest::where('type_guest_id', 2)->where('status_proposal', 1)->where('status_disposition', 17)->get()->count();

            // $data['pks_reject'] = SubmissionProposal::where('type_id', 1)->where('status_proposal', 0)->get()->count();
            // $data['pks_reject_guest'] = SubmissionProposalGuest::where('type_guest_id', 1)->where('status_proposal', 0)->get()->count();

            $data['mou_reject'] = SubmissionProposal::where('type_id', 2)->where('status_proposal', 0)->get()->count();
            $data['mou_reject_guest'] = SubmissionProposalGuest::where('type_guest_id', 2)->where('status_proposal', 0)->get()->count();

            // $data['pks_process'] = SubmissionProposal::where('type_id', 1)->where('status_proposal', 1)->where('status_disposition', '<', 17)->get()->count();
            // $data['pks_process_guest'] = SubmissionProposalGuest::where('type_guest_id', 1)->where('status_proposal', 1)->where('status_disposition', '<', 17)->get()->count();

            $data['mou_process'] = SubmissionProposal::where('type_id', 2)->where('status_proposal', 1)->where('status_disposition', '<', 17)->get()->count();
            $data['mou_process_guest'] = SubmissionProposalGuest::where('type_guest_id', 2)->where('status_proposal', 1)->where('status_disposition', '<', 17)->get()->count();

            // $data['pks_total'] = SubmissionProposal::where('type_id', 1)->get()->count();
            // $data['pks_total_guest'] = SubmissionProposalGuest::where('type_guest_id', 1)->get()->count();

            $data['mou_total'] = SubmissionProposal::where('type_id', 2)->get()->count();
            $data['mou_total_guest'] = SubmissionProposalGuest::where('type_guest_id', 2)->get()->count();

            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function filterSurvey($year) {
        try {

            $result = SatisfactionSurvey::groupBy('year')
            ->select(DB::raw('count(IF(survey = 1, 1, NULL)) as sangat_tidak_memuaskan, count(IF(survey = 2, 1, NULL)) as tidak_memuaskan, count(IF(survey = 3, 1, NULL)) as sesuai_standar, count(IF(survey = 4, 1, NULL)) as memuaskan,count(IF(survey = 5, 1, NULL)) as sangat_memuaskan, year(created_at) as year, monthname(created_at) as monthname'))
            ->where('verified', 1)
            ->whereYear('created_at', $year)
            ->groupBy('monthname')
            ->orderByRaw('FIELD(monthname, "January", "February", "March", "April", "May", "June	", "July", "August", "September", "October", "November", "December")')
            ->take(5)
            ->get();

            return response()->json($this->notification->generalSuccess($result));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function resetSurvey() {
        try {

            $result = SatisfactionSurvey::groupBy('year')
            ->select(DB::raw('count(IF(survey = 1, 1, NULL)) as sangat_tidak_memuaskan, count(IF(survey = 2, 1, NULL)) as tidak_memuaskan, count(IF(survey = 3, 1, NULL)) as sesuai_standar, count(IF(survey = 4, 1, NULL)) as memuaskan,count(IF(survey = 5, 1, NULL)) as sangat_memuaskan, year(created_at) as year, monthname(created_at) as monthname'))
            ->where('verified', 1)
            ->groupBy('monthname')
            ->orderByRaw('FIELD(monthname, "January", "February", "March", "April", "May", "June	", "July", "August", "September", "October", "November", "December")')
            ->take(5)
            ->get();

            return response()->json($this->notification->generalSuccess($result));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    // public function filterSubmissionPKS($year) {
    //     try {
    //         $merge['data_submission_cooperation_guest_pks'] = SubmissionProposalGuest::groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->where('type_guest_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();

    //         $merge['data_submission_cooperation_pks'] = SubmissionProposal::groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->where('type_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();

    //         $data['submission_cooperation_pks'] = array_merge($merge['data_submission_cooperation_guest_pks']->toArray(), $merge['data_submission_cooperation_pks']->toArray());

    //         $collectData = collect($data['submission_cooperation_pks']);

    //         $filtered = $collectData->where('year', $year);

    //         $result = array_values($filtered->all());

    //         return response()->json($this->notification->generalSuccess($result));
    //     } catch (\Throwable $th) {
    //         return response()->json($this->notification->generalFailed($th));
    //     }
    // }
    // public function resetSubmissionPKS() {
    //     try {
    //         $merge['data_submission_cooperation_guest_pks'] = SubmissionProposalGuest::groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->where('type_guest_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();

    //         $merge['data_submission_cooperation_pks'] = SubmissionProposal::groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->where('type_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();

    //         $data['submission_cooperation_pks'] = array_merge($merge['data_submission_cooperation_guest_pks']->toArray(), $merge['data_submission_cooperation_pks']->toArray());

    //         $collectData = collect($data['submission_cooperation_pks']);

    //         $result = array_values($collectData->all());

    //         return response()->json($this->notification->generalSuccess($result));
    //     } catch (\Throwable $th) {
    //         return response()->json($this->notification->generalFailed($th));
    //     }
    // }
    public function filterSubmissionMOU($year) {
        try {
            $merge['data_submission_cooperation_guest_mou'] = SubmissionProposalGuest::groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->where('type_guest_id', 2)->where('status_disposition', 17)->where('status_proposal', 1)->get();

            $merge['data_submission_cooperation_mou'] = SubmissionProposal::groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->where('type_id', 2)->where('status_disposition', 17)->where('status_proposal', 1)->get();

            $data['submission_cooperation_mou'] = array_merge($merge['data_submission_cooperation_guest_mou']->toArray(), $merge['data_submission_cooperation_mou']->toArray());

            $collectData = collect($data['submission_cooperation_mou']);

            $filtered = $collectData->where('year', $year);

            $result = array_values($filtered->all());

            return response()->json($this->notification->generalSuccess($result));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function resetSubmissionMOU() {
        try {
            $merge['data_submission_cooperation_guest_mou'] = SubmissionProposalGuest::groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->where('type_guest_id', 2)->where('status_disposition', 17)->where('status_proposal', 1)->get();

            $merge['data_submission_cooperation_mou'] = SubmissionProposal::groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->where('type_id', 2)->where('status_disposition', 17)->where('status_proposal', 1)->get();

            $data['submission_cooperation_mou'] = array_merge($merge['data_submission_cooperation_guest_mou']->toArray(), $merge['data_submission_cooperation_mou']->toArray());

            $collectData = collect($data['submission_cooperation_mou']);

            $result = array_values($collectData->all());

            return response()->json($this->notification->generalSuccess($result));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    // public function filterKesetaraanGenderPKS($year) {
    //     try {
    //         // Kesetaraan Gender
    //         $data['data_deputi_kesetaraan_gender_guest_pks'] = SubmissionProposalGuest::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
    //             $q->where('role_id', 4);
    //         })->where('type_guest_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();
    //         $data['data_deputi_kesetaraan_gender_pks'] = SubmissionProposal::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
    //             $q->where('role_id', 4);
    //         })->where('type_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();

    //         $data['deputi_kesetaraan_gender_pks'] = array_merge($data['data_deputi_kesetaraan_gender_guest_pks']->toArray(), $data['data_deputi_kesetaraan_gender_pks']->toArray());

    //         $collectData = collect($data['deputi_kesetaraan_gender_pks']);

    //         $filtered = $collectData->where('year', $year);

    //         $result = array_values($filtered->all());

    //         return response()->json($this->notification->generalSuccess($result));
    //     } catch (\Throwable $th) {
    //         return response()->json($this->notification->generalFailed($th));
    //     }
    // }
    // public function resetKesetaraanGenderPKS() {
    //     try {
    //         // Kesetaraan Gender
    //         $data['data_deputi_kesetaraan_gender_guest_pks'] = SubmissionProposalGuest::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
    //             $q->where('role_id', 4);
    //         })->where('type_guest_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();
    //         $data['data_deputi_kesetaraan_gender_pks'] = SubmissionProposal::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
    //             $q->where('role_id', 4);
    //         })->where('type_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();

    //         $data['deputi_kesetaraan_gender_pks'] = array_merge($data['data_deputi_kesetaraan_gender_guest_pks']->toArray(), $data['data_deputi_kesetaraan_gender_pks']->toArray());

    //         $collectData = collect($data['deputi_kesetaraan_gender_pks']);

    //         $result = array_values($collectData->all());

    //         return response()->json($this->notification->generalSuccess($result));
    //     } catch (\Throwable $th) {
    //         return response()->json($this->notification->generalFailed($th));
    //     }
    // }
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

            $result = array_values($filtered->all());

            return response()->json($this->notification->generalSuccess($result));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function resetKesetaraanGenderMOU() {

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

            $result = array_values($collectData->all());

            return response()->json($this->notification->generalSuccess($result));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    // public function filterPartisipasiMasyarakatPKS($year) {

    //     try {
    //         // Partisipasi Masyarakat
    //         $data['data_deputi_partisipasi_masyarakat_guest_pks'] = SubmissionProposalGuest::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
    //             $q->where('role_id', 3);
    //         })->where('type_guest_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();
    //         $data['data_deputi_partisipasi_masyarakat_pks'] = SubmissionProposal::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
    //             $q->where('role_id', 3);
    //         })->where('type_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();

    //         $data['deputi_partisipasi_masyarakat_pks'] = array_merge($data['data_deputi_partisipasi_masyarakat_guest_pks']->toArray(), $data['data_deputi_partisipasi_masyarakat_pks']->toArray());

    //         $collectData = collect($data['deputi_partisipasi_masyarakat_pks']);

    //         $filtered = $collectData->where('year', $year);

    //         $result = array_values($filtered->all());

    //         return response()->json($this->notification->generalSuccess($result));
    //     } catch (\Throwable $th) {
    //         return response()->json($this->notification->generalFailed($th));
    //     }
    // }
    // public function resetPartisipasiMasyarakatPKS() {

    //     try {
    //         // Partisipasi Masyarakat
    //         $data['data_deputi_partisipasi_masyarakat_guest_pks'] = SubmissionProposalGuest::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
    //             $q->where('role_id', 3);
    //         })->where('type_guest_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();
    //         $data['data_deputi_partisipasi_masyarakat_pks'] = SubmissionProposal::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
    //             $q->where('role_id', 3);
    //         })->where('type_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();

    //         $data['deputi_partisipasi_masyarakat_pks'] = array_merge($data['data_deputi_partisipasi_masyarakat_guest_pks']->toArray(), $data['data_deputi_partisipasi_masyarakat_pks']->toArray());

    //         $collectData = collect($data['deputi_partisipasi_masyarakat_pks']);

    //         $result = array_values($collectData->all());

    //         return response()->json($this->notification->generalSuccess($result));
    //     } catch (\Throwable $th) {
    //         return response()->json($this->notification->generalFailed($th));
    //     }
    // }
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

            $result = array_values($filtered->all());

            return response()->json($this->notification->generalSuccess($result));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function resetPartisipasiMasyarakatMOU() {
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

            $result = array_values($collectData->all());

            return response()->json($this->notification->generalSuccess($result));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    // public function filterPerlindunganAnakPKS($year) {

    //     try {
    //         // Perlindungan Anak
    //         $data['data_deputi_perlindungan_anak_guest_pks'] = SubmissionProposalGuest::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
    //             $q->where('role_id', 5);
    //         })->where('type_guest_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();
    //         $data['data_deputi_perlindungan_anak_pks'] = SubmissionProposal::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
    //             $q->where('role_id', 5);
    //         })->where('type_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();

    //         $data['deputi_perlindungan_anak_pks'] = array_merge($data['data_deputi_perlindungan_anak_guest_pks']->toArray(), $data['data_deputi_perlindungan_anak_pks']->toArray());

    //         $collectData = collect($data['deputi_perlindungan_anak_pks']);
    //         // dd($collectData);
    //         $filtered = $collectData->where('year', $year);

    //         $result = array_values($filtered->all());

    //         return response()->json($this->notification->generalSuccess($result));
    //     } catch (\Throwable $th) {
    //         return response()->json($this->notification->generalFailed($th));
    //     }
    // }
    // public function resetPerlindunganAnakPKS() {

    //     try {
    //         // Perlindungan Anak
    //         $data['data_deputi_perlindungan_anak_guest_pks'] = SubmissionProposalGuest::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
    //             $q->where('role_id', 5);
    //         })->where('type_guest_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();
    //         $data['data_deputi_perlindungan_anak_pks'] = SubmissionProposal::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
    //             $q->where('role_id', 5);
    //         })->where('type_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();

    //         $data['deputi_perlindungan_anak_pks'] = array_merge($data['data_deputi_perlindungan_anak_guest_pks']->toArray(), $data['data_deputi_perlindungan_anak_pks']->toArray());

    //         $collectData = collect($data['deputi_perlindungan_anak_pks']);

    //         $result = array_values($collectData->all());

    //         return response()->json($this->notification->generalSuccess($result));
    //     } catch (\Throwable $th) {
    //         return response()->json($this->notification->generalFailed($th));
    //     }
    // }
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

            $result = array_values($filtered->all());

            return response()->json($this->notification->generalSuccess($result));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function resetPerlindunganAnakMOU() {

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

            $result = array_values($collectData->all());

            return response()->json($this->notification->generalSuccess($result));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    // public function filterPerlindunganHakPerempuanPKS($year) {

    //     try {
    //         // Perlindungan Anak
    //         $data['data_deputi_perlindungan_hak_perempuan_guest_pks'] = SubmissionProposalGuest::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
    //             $q->where('role_id', 6);
    //         })->where('type_guest_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();
    //         $data['data_deputi_perlindungan_hak_perempuan_pks'] = SubmissionProposal::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
    //             $q->where('role_id', 6);
    //         })->where('type_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();

    //         $data['deputi_perlindungan_hak_perempuan_pks'] = array_merge($data['data_deputi_perlindungan_hak_perempuan_guest_pks']->toArray(), $data['data_deputi_perlindungan_hak_perempuan_pks']->toArray());

    //         $collectData = collect($data['deputi_perlindungan_hak_perempuan_pks']);

    //         $filtered = $collectData->where('year', $year);

    //         $result = array_values($filtered->all());

    //         return response()->json($this->notification->generalSuccess($result));
    //     } catch (\Throwable $th) {
    //         return response()->json($this->notification->generalFailed($th));
    //     }
    // }
    // public function resetPerlindunganHakPerempuanPKS() {

    //     try {
    //         // Perlindungan Anak
    //         $data['data_deputi_perlindungan_hak_perempuan_guest_pks'] = SubmissionProposalGuest::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
    //             $q->where('role_id', 6);
    //         })->where('type_guest_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();
    //         $data['data_deputi_perlindungan_hak_perempuan_pks'] = SubmissionProposal::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
    //             $q->where('role_id', 6);
    //         })->where('type_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();

    //         $data['deputi_perlindungan_hak_perempuan_pks'] = array_merge($data['data_deputi_perlindungan_hak_perempuan_guest_pks']->toArray(), $data['data_deputi_perlindungan_hak_perempuan_pks']->toArray());

    //         $collectData = collect($data['deputi_perlindungan_hak_perempuan_pks']);

    //         $result = array_values($collectData->all());

    //         return response()->json($this->notification->generalSuccess($result));
    //     } catch (\Throwable $th) {
    //         return response()->json($this->notification->generalFailed($th));
    //     }
    // }
    public function filterPerlindunganHakPerempuanMOU($year) {

        try {
            // Partisipasi Masyarakat
            $data['data_deputi_perlindungan_hak_perempuan_guest_mou'] = SubmissionProposalGuest::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 6);
            })->where('type_guest_id', 2)->where('status_disposition', 17)->where('status_proposal', 1)->get();
            $data['data_deputi_perlindungan_hak_perempuan_mou'] = SubmissionProposal::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 6);
            })->where('type_id', 2)->where('status_disposition', 17)->where('status_proposal', 1)->get();

            $data['deputi_perlindungan_hak_perempuan_mou'] = array_merge($data['data_deputi_perlindungan_hak_perempuan_guest_mou']->toArray(), $data['data_deputi_perlindungan_hak_perempuan_mou']->toArray());

            $collectData = collect($data['deputi_perlindungan_hak_perempuan_mou']);

            $filtered = $collectData->where('year', $year);

            $result = array_values($filtered->all());

            return response()->json($this->notification->generalSuccess($result));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function resetPerlindunganHakPerempuanMOU() {

        try {
            // Partisipasi Masyarakat
            $data['data_deputi_perlindungan_hak_perempuan_guest_mou'] = SubmissionProposalGuest::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 6);
            })->where('type_guest_id', 2)->where('status_disposition', 17)->where('status_proposal', 1)->get();
            $data['data_deputi_perlindungan_hak_perempuan_mou'] = SubmissionProposal::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 6);
            })->where('type_id', 2)->where('status_disposition', 17)->where('status_proposal', 1)->get();

            $data['deputi_perlindungan_hak_perempuan_mou'] = array_merge($data['data_deputi_perlindungan_hak_perempuan_guest_mou']->toArray(), $data['data_deputi_perlindungan_hak_perempuan_mou']->toArray());

            $collectData = collect($data['deputi_perlindungan_hak_perempuan_mou']);

            $result = array_values($collectData->all());

            return response()->json($this->notification->generalSuccess($result));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    // public function filterPerlindunganTumbuhKembangAnakPKS($year) {

    //     try {
    //         // Perlindungan Anak
    //         $data['data_deputi_tumbuh_kembang_anak_guest_pks'] = SubmissionProposalGuest::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
    //             $q->where('role_id', 7);
    //         })->where('type_guest_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();
    //         $data['data_deputi_tumbuh_kembang_anak_pks'] = SubmissionProposal::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
    //             $q->where('role_id', 7);
    //         })->where('type_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();

    //         $data['deputi_tumbuh_kembang_anak_pks'] = array_merge($data['data_deputi_tumbuh_kembang_anak_guest_pks']->toArray(), $data['data_deputi_tumbuh_kembang_anak_pks']->toArray());

    //         $collectData = collect($data['deputi_tumbuh_kembang_anak_pks']);

    //         $filtered = $collectData->where('year', $year);

    //         $result = array_values($filtered->all());

    //         return response()->json($this->notification->generalSuccess($result));
    //     } catch (\Throwable $th) {
    //         return response()->json($this->notification->generalFailed($th));
    //     }
    // }
    // public function resetPerlindunganTumbuhKembangAnakPKS($year) {

    //     try {
    //         // Perlindungan Anak
    //         $data['data_deputi_tumbuh_kembang_anak_guest_pks'] = SubmissionProposalGuest::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
    //             $q->where('role_id', 7);
    //         })->where('type_guest_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();
    //         $data['data_deputi_tumbuh_kembang_anak_pks'] = SubmissionProposal::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
    //             $q->where('role_id', 7);
    //         })->where('type_id', 1)->where('status_disposition', 17)->where('status_proposal', 1)->get();

    //         $data['deputi_tumbuh_kembang_anak_pks'] = array_merge($data['data_deputi_tumbuh_kembang_anak_guest_pks']->toArray(), $data['data_deputi_tumbuh_kembang_anak_pks']->toArray());

    //         $collectData = collect($data['deputi_tumbuh_kembang_anak_pks']);

    //         $result = array_values($collectData->all());

    //         return response()->json($this->notification->generalSuccess($result));
    //     } catch (\Throwable $th) {
    //         return response()->json($this->notification->generalFailed($th));
    //     }
    // }
    public function filterPerlindunganTumbuhKembangAnakMOU($year) {

        try {
            // Partisipasi Masyarakat
            $data['data_deputi_tumbuh_kembang_anak_guest_mou'] = SubmissionProposalGuest::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 7);
            })->where('type_guest_id', 2)->where('status_disposition', 17)->where('status_proposal', 1)->get();
            $data['data_deputi_tumbuh_kembang_anak_mou'] = SubmissionProposal::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 7);
            })->where('type_id', 2)->where('status_disposition', 17)->where('status_proposal', 1)->get();

            $data['deputi_tumbuh_kembang_anak_mou'] = array_merge($data['data_deputi_tumbuh_kembang_anak_guest_mou']->toArray(), $data['data_deputi_tumbuh_kembang_anak_mou']->toArray());

            $collectData = collect($data['deputi_perlindungan_hak_perempuan_mou']);

            $filtered = $collectData->where('year', $year);

            $result = array_values($filtered->all());

            return response()->json($this->notification->generalSuccess($result));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function resetPerlindunganTumbuhKembangAnakMOU() {

        try {
            // Partisipasi Masyarakat
            $data['data_deputi_tumbuh_kembang_anak_guest_mou'] = SubmissionProposalGuest::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 7);
            })->where('type_guest_id', 2)->where('status_disposition', 17)->where('status_proposal', 1)->get();
            $data['data_deputi_tumbuh_kembang_anak_mou'] = SubmissionProposal::with('deputi.role')->groupBy('year')->select(DB::raw('count(*) as data, year(created_at) year'))->whereHas('deputi', function(Builder $q) {
                $q->where('role_id', 7);
            })->where('type_id', 2)->where('status_disposition', 17)->where('status_proposal', 1)->get();

            $data['deputi_tumbuh_kembang_anak_mou'] = array_merge($data['data_deputi_tumbuh_kembang_anak_guest_mou']->toArray(), $data['data_deputi_tumbuh_kembang_anak_mou']->toArray());

            $collectData = collect($data['deputi_perlindungan_hak_perempuan_mou']);

            $result = array_values($collectData->all());

            return response()->json($this->notification->generalSuccess($result));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    // public function filterAgenciesPKS($year) {
    //     try {
    //         //Instansi PKS
    //         $merge['data_deputi_agencies_guest_pks'] = SubmissionProposalGuest::with('agencies')->select(DB::raw('*,year(created_at) year'))->where('type_guest_id', 1)->get();
    //         $merge['data_deputi_agencies_pks'] = SubmissionProposal::with('agencies')->select(DB::raw('*,year(created_at) year'))->where('type_id', 1)->get();

    //         $mergeAgencies = collect(array_merge($merge['data_deputi_agencies_guest_pks']->toArray(), $merge['data_deputi_agencies_pks']->toArray()));
    //         $groupedAgencies = $mergeAgencies->where('year', $year)->groupBy('agencies_id');

    //         $result = array_values($groupedAgencies->toArray());
    //         return response()->json($this->notification->generalSuccess($result));
    //     } catch (\Throwable $th) {
    //         return response()->json($this->notification->generalFailed($th));
    //     }
    // }
    // public function resetAgenciesPKS() {
    //     try {
    //         //Instansi PKS
    //         $merge['data_deputi_agencies_guest_pks'] = SubmissionProposalGuest::with('agencies')->select(DB::raw('*,year(created_at) year'))->where('type_guest_id', 1)->get();
    //         $merge['data_deputi_agencies_pks'] = SubmissionProposal::with('agencies')->select(DB::raw('*,year(created_at) year'))->where('type_id', 1)->get();

    //         $mergeAgencies = collect(array_merge($merge['data_deputi_agencies_guest_pks']->toArray(), $merge['data_deputi_agencies_pks']->toArray()));
    //         $groupedAgencies = $mergeAgencies->groupBy('agencies_id');

    //         $result = array_values($groupedAgencies->toArray());
    //         return response()->json($this->notification->generalSuccess($result));
    //     } catch (\Throwable $th) {
    //         return response()->json($this->notification->generalFailed($th));
    //     }
    // }
    public function filterAgenciesMOU($year) {
        try {
            //Instansi PKS
            $merge['data_deputi_agencies_guest_mou'] = SubmissionProposalGuest::with('agencies')->select(DB::raw('*,year(created_at) year'))->where('type_guest_id', 2)->get();
            $merge['data_deputi_agencies_mou'] = SubmissionProposal::with('agencies')->select(DB::raw('*,year(created_at) year'))->where('type_id', 2)->get();

            $mergeAgencies = collect(array_merge($merge['data_deputi_agencies_guest_mou']->toArray(), $merge['data_deputi_agencies_mou']->toArray()));
            $groupedAgencies = $mergeAgencies->where('year', $year)->groupBy('agencies_id');

            $result = array_values($groupedAgencies->toArray());
            return response()->json($this->notification->generalSuccess($result));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function resetAgenciesMOU() {
        try {
            //Instansi PKS
            $merge['data_deputi_agencies_guest_mou'] = SubmissionProposalGuest::with('agencies')->select(DB::raw('*,year(created_at) year'))->where('type_guest_id', 2)->get();
            $merge['data_deputi_agencies_mou'] = SubmissionProposal::with('agencies')->select(DB::raw('*,year(created_at) year'))->where('type_id', 2)->get();

            $mergeAgencies = collect(array_merge($merge['data_deputi_agencies_guest_mou']->toArray(), $merge['data_deputi_agencies_mou']->toArray()));
            $groupedAgencies = $mergeAgencies->groupBy('agencies_id');

            $result = array_values($groupedAgencies->toArray());
            return response()->json($this->notification->generalSuccess($result));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
}
