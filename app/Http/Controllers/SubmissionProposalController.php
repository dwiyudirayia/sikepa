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
use App\DeputiPIC;
use App\LawFileSubmissionProposal;
use App\Notifications\DeputiNotification;
use App\Province;
use App\ReasonSubmissionCooperation;
use App\Regency;
use Illuminate\Http\Request;
use DB;
// use Illuminate\Support\Facades\Mail;
// use App\Mail\SubmissionCooperationApprove;
// use App\Mail\SubmissionCooperationReject;
use App\Notifications\DispositionNotification;
use App\SubmissionProposalGuest;
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
        $roles = collect($user['roles']);

        $mappingRole = $roles->map(function($item, $key) {
            return $item['id'];
        });

        $idRoles = $mappingRole->all();
        if($user->roles[0]->id <= 6 && $user->roles[0]->id >= 2) {
            $data['approval'] = SubmissionProposal::with('deputi','country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->whereHas('deputi', function(Builder $query) use ($user) {
                $query->where('role_id', $user->roles[0]->id);
                $query->whereNull('approval');
            })->where('type_id', 2)->where('status_disposition', 2)->where('status_proposal', 1)->get();
        } else {
            $data['approval'] = SubmissionProposal::with('country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('type_id', 2)->where('status_proposal', 1)->whereIn('status_disposition', $idRoles)->get();
        }
        $data['you'] = SubmissionProposal::with('country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('type_id', 1)->where('created_by', $user->id)->get();
        $data['guest'] = SubmissionProposalGuest::with('country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('type_id', 2)->where('status_proposal', 1)->whereIn('status_disposition', $idRoles)->get();

        return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function indexPKS() {
        try {
            $user = auth()->user();
            $roles = collect($user['roles']);

            $mappingRole = $roles->map(function($item, $key) {
                return $item['id'];
            });

            $idRoles = $mappingRole->all();

            if($user->roles[0]->id <= 6 && $user->roles[0]->id >= 2) {
                $data['approval'] = SubmissionProposal::with('deputi','country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->whereHas('deputi', function(Builder $query) use ($user) {
                    $query->where('role_id', $user->roles[0]->id);
                    $query->whereNull('approval');
                })->where('type_id', 1)->where('status_disposition', 2)->where('status_proposal', 1)->get();
            } else {
                $data['approval'] = SubmissionProposal::with('country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('type_id', 1)->where('status_proposal', 1)->whereIn('status_disposition', $idRoles)->get();
            }

            $data['you'] = SubmissionProposal::with('country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('type_id', 1)->where('created_by', $user->id)->get();
            $data['guest'] = SubmissionProposalGuest::with('country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('type_id', 1)->where('status_proposal', 1)->whereIn('status_disposition', $idRoles)->get();

        return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function create() {
        try {
            $data['typeof'] = TypeOfCooperation::where('id', 2)->get();
            $data['typeof_one'] = TypeOfCooperationOneDerivative::where('type_of_cooperation_id', 2)->get();
            $data['agency'] = Agency::all();

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

            $deputi = $request->deputi;
            $users = User::whereHas('roles', function(Builder $query) use ($deputi) {
                $query->whereIn('id', $deputi);
            })->get();

            if($request->type_id == 1) {
                $path = 'PKSProposalSubmissionCooperationIndex';
            } else {
                $path = 'MOUProposalSubmissionCooperationIndex';
            }
            Notification::send($users, new DeputiNotification(auth()->user(), $path));
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
    public function detail($id) {
        try {
            $data = SubmissionProposal::with('deputi','nomor','deputi.role','law','tracking','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo', 'country', 'province', 'regency')->findOrFail($id);
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
            $countRole = auth()->user()->roles()->count();
            $user = auth()->user();
            $proposal = SubmissionProposal::findOrFail($request->id);
            if($user->roles[0]->id <= 6 && $user->roles[0]->id >= 2) {

                $proposal->deputi()->where('role_id', $user->roles[0]->id)->update([
                    'status' => 1,
                    'approval' => 1
                ]);

                $deputi = DeputiPIC::where('submission_proposal_id', $request->id)->get();
                $sumStatus = DeputiPIC::where('submission_proposal_id', $request->id)->sum('status');
                $sumApproval = DeputiPIC::where('submission_proposal_id', $request->id)->sum('approval');

                $countRowProposal = $deputi->count();

                if($sumStatus == $countRowProposal) {
                    if($sumApproval > 0) {
                        $proposal->status_disposition = 9;
                        $proposal->save();

                        $statusDisposition = $proposal->status_disposition;
                        $users = User::whereHas('roles', function(Builder $query) use ($statusDisposition) {
                            $query->where('id', $statusDisposition);
                        })->get();

                        if($proposal->type_id == 1) {
                            $path = 'PKSProposalSubmissionCooperationIndex';
                        } else {
                            $path = 'MOUProposalSubmissionCooperationIndex';
                        }
                        Notification::send($users, new DispositionNotification(auth()->user(), $path));
                    } else {
                        $proposal->status_proposal = 0;
                        $proposal->save();
                    }
                }
            } elseif($countRole == 2 && ($proposal->status_disposition > 13 && $proposal->status_disposition < 16) ) {
                $rolesName = $user->roles[1]->name;
                $convertToSnakeCase = Str::snake($rolesName);

                $proposal->tracking()->update([
                    $convertToSnakeCase => 1
                ]);

                $track = SubmissionProposal::where('id', $request->id)->increment('status_disposition', 1);

                $statusDisposition = $proposal->status_disposition + 1;
                $users = User::whereHas('roles', function(Builder $query) use ($statusDisposition) {
                    $query->where('id', $statusDisposition);
                })->get();

                if($proposal->type_id == 1) {
                    $path = 'PKSProposalSubmissionCooperationIndex';
                } else {
                    $path = 'MOUProposalSubmissionCooperationIndex';
                }
                Notification::send($users, new DispositionNotification(auth()->user(), $path));

            } elseif($countRole == 2 && $proposal->status_disposition == 16) {
                $rolesName = $user->roles[1]->name;
                $convertToSnakeCase = Str::snake($rolesName);

                $proposal->tracking()->update([
                    $convertToSnakeCase => 1
                ]);

                $track = SubmissionProposal::where('id', $request->id)->increment('status_disposition', 1);

                $users = User::whereHas('roles', function(Builder $query) {
                    $query->where('id', 9);
                })->get();

                if($proposal->type_id == 1) {
                    $path = 'PKSProposalSubmissionCooperationIndex';
                } else {
                    $path = 'MOUProposalSubmissionCooperationIndex';
                }
                Notification::send($users, new DispositionNotification(auth()->user(), $path));
            } else {
                $rolesName = $user->roles[0]->name;
                $convertToSnakeCase = Str::snake($rolesName);

                $proposal->tracking()->update([
                    $convertToSnakeCase => 1
                ]);

                $track = SubmissionProposal::where('id', $request->id)->increment('status_disposition', 1);
                $statusDisposition = $proposal->status_disposition + 1;
                $users = User::whereHas('roles', function(Builder $query) use ($statusDisposition) {
                    $query->where('id', $statusDisposition);
                })->get();

                if($proposal->type_id == 1) {
                    $path = 'PKSProposalSubmissionCooperationIndex';
                } else {
                    $path = 'MOUProposalSubmissionCooperationIndex';
                }
                Notification::send($users, new DispositionNotification(auth()->user(), $path));
            }

            ReasonSubmissionCooperation::create([
                'created_by' => auth()->user()->id,
                'submission_proposal_id' => $request->id,
                'reason' => $request->reason,
                'approval' => 1,
            ]);


            $data = [];
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
            $countRole = auth()->user()->roles()->count();
            $user = auth()->user();

            $proposal = SubmissionProposal::findOrFail($request->id);

            if($user->roles[0]->id <= 6 && $user->roles[0]->id >= 2) {

                $proposal->deputi()->where('role_id', $user->roles[0]->id)->update([
                    'status' => 1,
                    'approval' => 0
                ]);

                $deputi = DeputiPIC::where('submission_proposal_id', $request->id)->get();
                $sumStatus = DeputiPIC::where('submission_proposal_id', $request->id)->sum('status');
                $sumApproval = DeputiPIC::where('submission_proposal_id', $request->id)->sum('approval');

                $countRowProposal = $deputi->count();

                if($sumStatus == $countRowProposal) {
                    if($sumApproval > 0) {
                        $proposal->status_disposition = 9;
                        $proposal->save();

                        $statusDisposition = $proposal->status_disposition;
                        $users = User::whereHas('roles', function(Builder $query) use ($statusDisposition) {
                            $query->where('id', $statusDisposition);
                        })->get();

                        if($proposal->type_id == 1) {
                            $path = 'PKSProposalSubmissionCooperationIndex';
                        } else {
                            $path = 'MOUProposalSubmissionCooperationIndex';
                        }
                        Notification::send($users, new DispositionNotification(auth()->user(), $path));
                    } else {
                        $proposal->status_proposal = 0;
                        $proposal->save();
                    }
                }
            } elseif($countRole == 2 && ($proposal->status_disposition > 13 && $proposal->status_disposition < 16) ) {
                $rolesName = $user->roles[1]->name;
                $convertToSnakeCase = Str::snake($rolesName);

                $proposal->tracking()->update([
                    $convertToSnakeCase => 0
                ]);

                SubmissionProposal::where('id', $request->id)->update([
                    'status_proposal' => 0
                ]);

            } elseif($countRole == 2 && $proposal->status_disposition == 16) {
                $rolesName = $user->roles[1]->name;
                $convertToSnakeCase = Str::snake($rolesName);

                $proposal->tracking()->update([
                    $convertToSnakeCase => 0
                ]);

                $track = SubmissionProposal::where('id', $request->id)->increment('status_disposition', 1);

                $users = User::whereHas('roles', function(Builder $query) {
                    $query->where('id', 9);
                })->get();

                if($proposal->type_id == 1) {
                    $path = 'PKSProposalSubmissionCooperationIndex';
                } else {
                    $path = 'MOUProposalSubmissionCooperationIndex';
                }
                Notification::send($users, new DispositionNotification(auth()->user(), $path));
            } else {

                $proposal = SubmissionProposal::findOrFail($request->id);

                $rolesName = $user->roles[0]->name;
                $convertToSnakeCase = Str::snake($rolesName);

                $proposal->tracking()->update([
                    $convertToSnakeCase => 0
                ]);

                $track = SubmissionProposal::where('id', $request->id)->increment('status_disposition', 1);

                $statusDisposition = $proposal->status_disposition + 1;
                $users = User::whereHas('roles', function(Builder $query) use ($statusDisposition) {
                    $query->whereIn('id', $statusDisposition);
                })->get();

                if($proposal->type_id == 1) {
                    $path = 'PKSProposalSubmissionCooperationIndex';
                } else {
                    $path = 'MOUProposalSubmissionCooperationIndex';
                }
                Notification::send($users, new DispositionNotification(auth()->user(), $path));
            }


            ReasonSubmissionCooperation::create([
                'created_by' => auth()->user()->id,
                'submission_proposal_id' => $request->id,
                'reason' => $request->reason,
                'approval' => 0,
            ]);


            $data = [];
            DB::commit();
            return response()->json($this->notification->updateSuccess($data));
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json($this->notification->updateFailed($th));
        }
    }
    public function law(Request $request, $id) {
        try {
            DB::beginTransaction();
            $proposal = SubmissionProposal::findOrFail($id);
            $user = auth()->user();

            if($request->hasFile('notulen')) {
                $extention = $request->notulen->getClientOriginalExtension();
                $fileName = 'law-notulen'.'-'.date('Y-m-d').'-'.time().'.'.$extention;
                $path = $request->notulen->storeAs($proposal->id, $fileName, 'law_notulen');

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

            if($request->hasFile('draft')) {
                $extention = $request->draft->getClientOriginalExtension();
                $fileName = 'law-draft'.'-'.date('Y-m-d').'-'.time().'.'.$extention;
                $path = $request->draft->storeAs($proposal->id, $fileName, 'law_draft');

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

            $rolesName = $user->roles[0]->name;
            $convertToSnakeCase = Str::snake($rolesName);

            $proposal->tracking()->update([
                $convertToSnakeCase => 2
            ]);

            $proposal->status_disposition = $proposal->status_disposition + 1;
            $proposal->save();

            DB::commit();

            return response()->json([
                'messages' => 'Data Berhasil di Update'
            ]);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'messages' => $th->getMessage(),
                'status' => $th->getMessage(),
            ]);
        }

    }
    public function final(Request $request, $id) {
        // dd($request->title_cooperation_final);
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

            $proposal = SubmissionProposal::findOrFail($id);
            $proposal->title_cooperation = $request->title_cooperation_final;
            $proposal->save();
            if($request->hasFile('notulen')) {

                $extention = $request->notulen->getClientOriginalExtension();
                $fileName = 'law-notulen'.'-'.date('Y-m-d').'-'.time().'.'.$extention;
                $path = $request->notulen->storeAs($proposal->id, $fileName, 'law_notulen');

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

            if($request->hasFile('draft')) {

                $extention = $request->draft->getClientOriginalExtension();
                $fileName = 'law-draft'.'-'.date('Y-m-d').'-'.time().'.'.$extention;
                $path = $request->draft->storeAs($proposal->id, $fileName, 'law_draft');

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
                $proposal->nomor()->updateOrCreate([
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
    public function proposalApproveMOU() {
        try {
            $data = SubmissionProposal::with('tracking','country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('type_id', 2)->where('status_proposal', 1)->where('status_disposition', 17)->get();
            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function proposalRejectMOU() {
        try {
            $data = SubmissionProposal::with('tracking','country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('type_id', 2)->where('status_proposal', 0)->get();

            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function proposalApprovePKS() {
        try {
            $data = SubmissionProposal::with('tracking','country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('type_id', 1)->where('status_proposal', 1)->where('status_disposition', 17)->get();
            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function proposalRejectPKS() {
        try {
            $data = SubmissionProposal::with('tracking','country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('type_id', 1)->where('status_proposal', 0)->get();

            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function fileDraftMOU($id) {
        try {
            $proposal = SubmissionProposal::with('law')->findOrFail($id);

            $draft = $proposal->law->draft;
            return response()->download(storage_path("/app/public/law_draft/".$draft));

        } catch (\Throwable $th) {
            return response()->json([
                'messages' => $th->getMessage(),
                'status' => $th->getCode()
            ]);
        }
    }
}

