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
use App\LawFileSubmissionProposal;
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

class SubmissionProposalController extends Controller
{
    private $notification;

    public function __construct(NotificationRepositoryInterfaces $notification)
    {
        $this->notification = $notification;
    }
    public function indexMOU() {
        try {
        $user = auth()->user();
        $data['approval'] = SubmissionProposal::with('deputi','country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->whereHas('deputi', function(Builder $query) use ($user) {
            $query->where('role_id', 3);
        })->where('type_id', 2)->where('status_disposition', 2)->get();
        // $data['approval'] = SubmissionProposal::with('country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('type_id', 1)->where('status_proposal', 1)->get();
        $data['you'] = SubmissionProposal::with('country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('type_id', 1)->where('created_by', $user->id)->get();

        return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function indexPKS() {
        try {
        $user = auth()->user();
        $data['you'] = SubmissionProposal::with('country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('type_id', 2)->where('created_by', $user->id)->get();

        return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function create() {
        try {
            $data['typeof'] = TypeOfCooperation::where('id', 2)->get();
            $data['typeof_one'] = TypeOfCooperationOneDerivative::where('type_of_cooperation_id', 2)->get();
            $data['cooperation'] = CooperationTarget::all();

            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function store(StoreSubmissionProposalRequest $request) {
        try {
            DB::beginTransaction();
            $proposal = SubmissionProposal::create($request->store());

            foreach ($request->deputi as $key => $value) {
                $proposal->deputi()->create([
                    'role_id' => $value,
                ]);
            }
            $proposal->tracking()->create([]);

            DB::commit();
            return response()->json([
                'messages' => 'Data Berhasil di Simpan',
                'status' => 200
            ]);

        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json($this->notification->storeFailed($th));
        }
    }
    public function changeSelectTwoDerivative($id) {
        try {
            if($id == 1) {
                $data['country'] = Country::where('country_code', '!=', 'ID')->get();
            } else {
                $data['country'] = Country::where('country_code', 'ID')->get();
                $data['province'] = Province::all();
            }
            $data['data'] = TypeOfCooperationTwoDerivative::where('type_of_cooperation_one_derivative_id', $id)->get();
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
    public function detailMOU($id) {
        try {
            $data = SubmissionProposal::with('deputi','deputi.role','law','tracking','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo', 'country', 'province', 'regency')->findOrFail($id);
            return response()->json($this->notification->showSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->showFailed($th));
        }
    }
    public function detailPKS($id) {
        try {
            $data = SubmissionProposal::with('law','tracking','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo', 'country', 'province', 'regency')->findOrFail($id);
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
            } else {
                $countRole = auth()->user()->roles()->count();
                $updateDeputiValue = SubmissionProposal::findOrFail($request->id);
                if($countRole == 2 && ($updateDeputiValue->status_disposition > 13 && $updateDeputiValue->status_disposition < 16) ) {
                    $rolesName = $user->roles[1]->name;
                    $convertToSnakeCase = Str::snake($rolesName);

                    $updateDeputiValue->tracking()->update([
                        $convertToSnakeCase => 1
                    ]);
                    $track = SubmissionProposal::where('id', $request->id)->increment('status_disposition', 1);
                } elseif($countRole == 2 && $updateDeputiValue->status_disposition == 16) {
                    $rolesName = $user->roles[1]->name;
                    $convertToSnakeCase = Str::snake($rolesName);

                    $updateDeputiValue->tracking()->update([
                        $convertToSnakeCase => 1
                    ]);

                    $track = SubmissionProposal::where('id', $request->id)->increment('status_disposition', 1);
                } else {
                    $rolesName = $user->roles[0]->name;
                    $convertToSnakeCase = Str::snake($rolesName);
                    $updateDeputiValue->tracking()->update([
                        $convertToSnakeCase => 1
                    ]);

                    $track = SubmissionProposal::where('id', $request->id)->increment('status_disposition', 1);
                }


                $idRoles = $mappingRole->all();

                $data['approval'] = SubmissionProposal::with('country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('status_proposal', 1)->whereIn('status_disposition', $idRoles)->get();
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

            } else {
                $countRole = auth()->user()->roles()->count();
                $updateDeputiValue = SubmissionProposal::findOrFail($request->id);
                if($countRole == 2 && ($updateDeputiValue->status_disposition > 13 && $updateDeputiValue->status_disposition < 16) ) {
                    $rolesName = $user->roles[1]->name;
                    $convertToSnakeCase = Str::snake($rolesName);

                    $updateDeputiValue->tracking()->update([
                        $convertToSnakeCase => 0
                    ]);
                } elseif($countRole == 2 && $updateDeputiValue->status_disposition == 16) {
                    $rolesName = $user->roles[1]->name;
                    $convertToSnakeCase = Str::snake($rolesName);

                    $updateDeputiValue->tracking()->update([
                        $convertToSnakeCase => 0
                    ]);

                    SubmissionProposal::where('id', $request->id)->update([
                        'status_proposal' => (int) 0
                    ]);
                } else {
                    $rolesName = $user->roles[0]->name;
                    $convertToSnakeCase = Str::snake($rolesName);
                    $updateDeputiValue->tracking()->update([
                        $convertToSnakeCase => 0
                    ]);

                    $track = SubmissionProposal::where('id', $request->id)->increment('status_disposition', 1);
                }

                $idRoles = $mappingRole->all();

                $data['approval'] = SubmissionProposal::with('country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('status_proposal', 1)->whereIn('status_disposition', $idRoles)->get();
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
    public function uploadNotulen(Request $request, $id) {
        try {
            if($request->hasFile('file')) {
                $proposal = SubmissionProposal::findOrFail($id);

                $extention = $request->file->getClientOriginalExtension();
                $fileName = 'law-notulen'.'-'.date('Y-m-d').'-'.time().'.'.$extention;
                $path = $request->file->storeAs($proposal->id, $fileName, 'law_notulen');

                $checkTable = LawFileSubmissionProposal::where('submission_proposal_id', $id)->get();

                if($checkTable->count() == 0) {
                    $proposal->law()->create([
                        'created_by' => auth()->user()->id,
                        'notulen' => $path
                    ]);
                } else {
                    $proposal->law()->update([
                        'created_by' => auth()->user()->id,
                        'notulen' => $path
                    ]);
                }
            }

            return response()->json([
                'messages' => 'Upload File Berhasil',
                'status' => 200
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => $th->getMessage(),
                'status' => $th->getCode()
            ]);
        }
    }
    public function uploadDraft(Request $request, $id) {
        try {
            if($request->hasFile('file')) {
                $proposal = SubmissionProposal::findOrFail($id);

                $extention = $request->file->getClientOriginalExtension();
                $fileName = 'law-draft'.'-'.date('Y-m-d').'-'.time().'.'.$extention;
                $path = $request->file->storeAs($proposal->id, $fileName, 'law_draft');

                $checkTable = LawFileSubmissionProposal::where('submission_proposal_id', $id)->get();

                if($checkTable->count() == 0) {
                    $proposal->law()->create([
                        'created_by' => auth()->user()->id,
                        'draft' => $path
                    ]);
                } else {
                    $proposal->law()->update([
                        'created_by' => auth()->user()->id,
                        'draft' => $path
                    ]);
                }
            }

            return response()->json([
                'messages' => 'Upload File Berhasil',
                'status' => 200
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => $th->getMessage(),
                'status' => $th->getCode()
            ]);
        }
    }
    public function final(Request $request, $id) {
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

            DB::beginTransaction();

            if($request->hasFile('notulen')) {
                $proposal = SubmissionProposal::findOrFail($id);

                $extention = $request->file->getClientOriginalExtension();
                $fileName = 'law-notulen'.'-'.date('Y-m-d').'-'.time().'.'.$extention;
                $path = $request->file->storeAs($proposal->id, $fileName, 'law_notulen');

                $checkTable = LawFileSubmissionProposal::where('submission_proposal_id', $id)->get();

                if($checkTable->count() == 0) {
                    $proposal->law()->create([
                        'created_by' => auth()->user()->id,
                        'notulen' => $path
                    ]);
                } else {
                    $proposal->law()->update([
                        'created_by' => auth()->user()->id,
                        'notulen' => $path
                    ]);
                }
            }

            if($request->hasFile('file')) {
                $proposal = SubmissionProposal::findOrFail($id);

                $extention = $request->file->getClientOriginalExtension();
                $fileName = 'law-draft'.'-'.date('Y-m-d').'-'.time().'.'.$extention;
                $path = $request->file->storeAs($proposal->id, $fileName, 'law_draft');

                $checkTable = LawFileSubmissionProposal::where('submission_proposal_id', $id)->get();

                if($checkTable->count() == 0) {
                    $proposal->law()->create([
                        'created_by' => auth()->user()->id,
                        'draft' => $path
                    ]);
                } else {
                    $proposal->law()->update([
                        'created_by' => auth()->user()->id,
                        'draft' => $path
                    ]);
                }
            }
            foreach ($request->nomor as $key => $value) {
                $proposal = SubmissionProposal::findOrFail($id);
                $proposal->nomor()->create([
                    'created_by' => auth()->user()->id,
                    'nomor' => $value
                ]);
            }

            DB::commit();
            return response()->json($this->notification->updateSuccess($data));
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json($this->notification->updateFailed($th));
        }
    }
    public function proposalApprove() {
        try {
            $data = SubmissionProposal::with('tracking','country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('status_proposal', 1)->where('status_disposition', 17)->get();
            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function proposalReject() {
        try {
            $data = SubmissionProposal::with('tracking','country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('status_proposal', 0)->get();

            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
}

