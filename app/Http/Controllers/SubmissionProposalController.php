<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubmissionProposalRequest;
use App\SubmissionProposal;
use App\Repositories\Interfaces\NotificationRepositoryInterfaces;
use App\TypeOfCooperation;
use App\TypeOfCooperationOneDerivative;
use App\TypeOfCooperationTwoDerivative;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use App\CooperationTarget;
use App\Agency;
use App\Country;
use App\Province;
use App\ReasonSubmissionCooperation;
use App\Regency;
use Illuminate\Http\Request;
use DB;
// use Illuminate\Support\Facades\Mail;
// use App\Mail\SubmissionCooperationApprove;
// use App\Mail\SubmissionCooperationReject;
use App\Notifications\DispositionNotification;
use Illuminate\Support\Facades\Notification;
use App\TrackingSubmissionProposal;

class SubmissionProposalController extends Controller
{
    private $notification;

    public function __construct(NotificationRepositoryInterfaces $notification)
    {
        $this->notification = $notification;
    }
    public function index() {
        try {
            $user = auth()->user();
            $roles = collect($user['roles']);

            $mappingRole = $roles->map(function($item, $key) {
                return $item['id'];
            });

            if($user->roles[0]->id <= 6 && $user->roles[0]->id >= 2) {
                $rolesName = $user->roles[0]->name;
                $convertToSnakeCase = Str::snake($rolesName);
                $idRoles = [2];
                $data['approval'] = SubmissionProposal::with('tracking','country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->whereHas('tracking', function(Builder $query) use ($convertToSnakeCase) {
                    $query->whereNull($convertToSnakeCase);
                })->where('status_proposal', 1)->whereIn('status_disposition', $idRoles)->get();
            } else {
                $idRoles = $mappingRole->all();

                $data['approval'] = SubmissionProposal::with('country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('status_proposal', 1)->whereIn('status_disposition', $idRoles)->get();
            }

            $data['you'] = SubmissionProposal::with('country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('created_by', $user->id)->get();

            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function create() {
        try {
            $data['typeof'] = TypeOfCooperation::where('id', 2)->get();
            $data['cooperation'] = CooperationTarget::all();
            $data['agency'] = Agency::all();
            $data['country'] = Country::all();
            $data['province'] = Province::all();

            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function store(StoreSubmissionProposalRequest $request) {
        try {
            $user = auth()->user();
            $roles = collect($user['roles']);

            $mappingRole = $roles->map(function($item, $key) {
                return $item['id'];
            });

            $idRoles = $mappingRole->all();

            $proposal = SubmissionProposal::create($request->store());
            $proposal->tracking()->create([]);

            $data['approval'] = SubmissionProposal::with('country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('status_proposal', 1)->whereIn('status_disposition', $idRoles)->get();
            $data['you'] = SubmissionProposal::with('country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('created_by', $user->id)->get();

            return response()->json($this->notification->storeSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->storeFailed($th));
        }
    }
    public function changeSelectOneDerivative($id) {
        try {
            $data = TypeOfCooperationOneDerivative::where('type_of_cooperation_id', $id)->get();
            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function changeSelectTwoDerivative($id) {
        try {
            $data = TypeOfCooperationTwoDerivative::where('type_of_cooperation_one_derivative_id', $id)->get();
            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function getRegecies($id) {
        try {
            $data = Regency::where('province_id', $id)->get();
            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function detail($id) {
        try {
            $data = SubmissionProposal::with('tracking','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo', 'country', 'province', 'regency')->findOrFail($id);
            return response()->json($this->notification->showSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->showFailed($th));
        }
    }
    public function approve(Request $request) {
        try {
            DB::beginTransaction();
            $user = auth()->user();
            $roles = collect($user['roles']);

            $mappingRole = $roles->map(function($item, $key) {
                return $item['id'];
            });

            if($user->roles[0]->id <= 6 && $user->roles[0]->id >= 2) {
                $rolesName = $user->roles[0]->name;
                $convertToSnakeCase = Str::snake($rolesName);
                $idRoles = [2];
                $data['approval'] = SubmissionProposal::with('tracking','country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->whereHas('tracking', function(Builder $query) use ($convertToSnakeCase) {
                    $query->whereNull($convertToSnakeCase);
                })->where('status_proposal', 1)->whereIn('status_disposition', $idRoles)->get();

                $updateDeputiValue = SubmissionProposal::findOrFail($request->id);
                $updateDeputiValue->tracking()->update([
                    $convertToSnakeCase => 1
                ]);
            } else {
                $idRoles = $mappingRole->all();

                $data['approval'] = SubmissionProposal::with('country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('status_proposal', 1)->whereIn('status_disposition', $idRoles)->get();
            }
            $tracking = SubmissionProposal::with('tracking')->whereHas('tracking', function(Builder $query) {
                $query->whereNotNull('deputi_bidang_partisipasi_masyarakat');
                $query->whereNotNull('deputi_bidang_kesetaraan_gender');
                $query->whereNotNull('deputi_bidang_perlindungan_anak');
                $query->whereNotNull('deputi_bidang_perlindungan_hak_perempuan');
                $query->whereNotNull('deputi_bidang_tumbuh_kembang_anak');
            })->get();

            if($tracking->count() > 0) {
                foreach ($tracking as $key => $value) {
                    $track = SubmissionProposal::where('id', $value->id)->update([
                        'status_disposition' => 9
                    ]);
                    $users = User::role('Bagian Kerja Sama')->get();
                    $user = auth()->user(); //GET USER YANG SEDANG LOGIN
                    //KIRIM NOTIFIKASINYA MENGGUNAKAN FACADE NOTIFICATION
                    Notification::send($users, new DispositionNotification($track, $user));
                }
            }
            ReasonSubmissionCooperation::create([
                'created_by' => auth()->user()->id,
                'submission_proposal_id' => $request->id,
                'reason' => $request->reason,
            ]);


            $data['you'] = SubmissionProposal::where('created_by', $user->id)->get();
            DB::commit();
            return response()->json($this->notification->updateSuccess($data));
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json($this->notification->updateFailed($th));
        }
    }
    public function reject(Request $request) {
        try {
            DB::beginTransaction();
            $user = auth()->user();
            $roles = collect($user['roles']);

            $mappingRole = $roles->map(function($item, $key) {
                return $item['id'];
            });

            if($user->roles[0]->id <= 6 && $user->roles[0]->id >= 2) {
                $rolesName = $user->roles[0]->name;

                $convertToSnakeCase = Str::snake($rolesName);

                $idRoles = [2];

                $data['approval'] = SubmissionProposal::with('tracking','country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->whereHas('tracking', function(Builder $query) use ($convertToSnakeCase) {
                    $query->whereNull($convertToSnakeCase);
                })->where('status_proposal', 1)->whereIn('status_disposition', $idRoles)->get();

                $updateDeputiValue = SubmissionProposal::findOrFail($request->id);
                $updateDeputiValue->tracking()->update([
                    $convertToSnakeCase => 0
                ]);
            } else {
                $idRoles = $mappingRole->all();

                $data['approval'] = SubmissionProposal::with('country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('status_proposal', 1)->whereIn('status_disposition', $idRoles)->get();
            }

            $tracking = SubmissionProposal::with('tracking')->whereHas('tracking', function(Builder $query) {
                $query->whereNotNull('deputi_bidang_partisipasi_masyarakat');
                $query->whereNotNull('deputi_bidang_kesetaraan_gender');
                $query->whereNotNull('deputi_bidang_perlindungan_anak');
                $query->whereNotNull('deputi_bidang_perlindungan_hak_perempuan');
                $query->whereNotNull('deputi_bidang_tumbuh_kembang_anak');
            })->get();

            if($tracking->count() > 0) {
                foreach ($tracking as $key => $value) {
                    $track = SubmissionProposal::where('id', $value->id)->update([
                        'status_disposition' => 9
                    ]);
                    $users = User::role('Bagian Kerja Sama')->get();
                    $user = auth()->user(); //GET USER YANG SEDANG LOGIN
                    //KIRIM NOTIFIKASINYA MENGGUNAKAN FACADE NOTIFICATION
                    Notification::send($users, new DispositionNotification($track, $user));
                }
            }

            ReasonSubmissionCooperation::create([
                'created_by' => auth()->user()->id,
                'submission_proposal_id' => $request->id,
                'reason' => $request->reason,
            ]);


            $data['you'] = SubmissionProposal::where('created_by', $user->id)->get();
            DB::commit();
            return response()->json($this->notification->updateSuccess($data));
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json($this->notification->updateFailed($th));
        }
    }
}

