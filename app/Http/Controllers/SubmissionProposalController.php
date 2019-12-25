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
use App\Agency;
use App\Country;
use App\DeputiPIC;
use App\LawFileSubmissionProposal;
use App\Mail\OfflineMeeting;
use App\Province;
use App\Regency;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Mail;
// use App\Mail\SubmissionCooperationApprove;
// use App\Mail\SubmissionCooperationReject;
use App\Notifications\DispositionNotification;
use App\SubmissionProposalGuest;
use App\SubmissionType;
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
        if($user->roles[0]->id <= 7 && $user->roles[0]->id >= 3) {
            $data['approval'] = SubmissionProposal::with('deputi','country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->whereHas('deputi', function(Builder $query) use ($user) {
                $query->where('role_id', $user->roles[0]->id);
                $query->whereNull('approval');
            })->where('type_id', 2)->where('status_disposition', 3)->where('status_proposal', 1)->get();
            $data['guest'] = SubmissionProposalGuest::with('deputi','country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->whereHas('deputi', function(Builder $query) use ($user) {
                $query->where('role_id', $user->roles[0]->id);
                $query->whereNull('approval');
            })->where('type_guest_id', 2)->where('status_disposition', 3)->where('status_proposal', 1)->get();
        } else {
            $data['approval'] = SubmissionProposal::with('country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('type_id', 2)->where('status_proposal', 1)->whereIn('status_disposition', $idRoles)->get();
            $data['guest'] = SubmissionProposalGuest::with('country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('type_guest_id', 2)->where('status_proposal', 1)->whereIn('status_disposition', $idRoles)->get();
        }
        $data['you'] = SubmissionProposal::with('country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('type_id', 2)->where('created_by', $user->id)->get();
        $data['type'] = TypeOfCooperation::where('submission_type_id', 2)->get();

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

            if($user->roles[0]->id <= 7 && $user->roles[0]->id >= 3) {
                $data['approval'] = SubmissionProposal::with('deputi','country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->whereHas('deputi', function(Builder $query) use ($user) {
                    $query->where('role_id', $user->roles[0]->id);
                    $query->whereNull('approval');
                })->where('type_id', 1)->where('status_disposition', 3)->where('status_proposal', 1)->get();
                $data['guest'] = SubmissionProposalGuest::with('deputi','country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->whereHas('deputi', function(Builder $query) use ($user) {
                    $query->where('role_id', $user->roles[0]->id);
                    $query->whereNull('approval');
                })->where('type_guest_id', 1)->where('status_disposition', 3)->where('status_proposal', 1)->get();
            } else {
                $data['approval'] = SubmissionProposal::with('country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('type_id', 1)->where('status_proposal', 1)->whereIn('status_disposition', $idRoles)->get();
                $data['guest'] = SubmissionProposalGuest::with('country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('type_guest_id', 1)->where('status_proposal', 1)->whereIn('status_disposition', $idRoles)->get();
            }

            $data['you'] = SubmissionProposal::with('country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('type_id', 1)->where('created_by', $user->id)->get();
            $data['type'] = SubmissionType::all();

        return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function create() {
        try {
            $data['type'] = SubmissionType::all();
            $data['agencies'] = Agency::all();

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

            $userKPPA = [2, 9, 10, 11, 12, 13, 14, 15, 16];
            foreach ($userKPPA as $key => $value) {
                $proposal->tracking()->create([
                    'role_id' => $value,
                ]);
            }

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
            Notification::send($users, new DispositionNotification(auth()->user(), $path, $proposal));
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
            $data = SubmissionProposal::with('nomor','deputi.role','law','tracking.role','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo', 'country', 'province', 'regency')->findOrFail($id);
            return response()->json($this->notification->showSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->showFailed($th));
        }
    }
    public function detailGuest($id) {
        try {
            $data['data'] = SubmissionProposalGuest::with('nomor','deputi.role','law','tracking.role','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo', 'country', 'province', 'regency')->findOrFail($id);
            $collectDeputi = collect($data['data']['deputi']);
            $mapDeputi = $collectDeputi->map(function($item, $key) {
                return $item['role_id'];
            });
            $currentRoleId = $mapDeputi->all();
            $deputi = [
                0 => [
                    'id' => 3,
                    'name' => 'Bidang Partisipasi Masyarakat',
                ],
                1 => [
                    'id' => 4,
                    'name' => 'Bidang Kesetaraan Gender',
                ],
                2 => [
                    'id' => 5,
                    'name' => 'Bidang Perlindungan Anak',
                ],
                3 => [
                    'id' => 6,
                    'name' => 'Bidang Perlindungan Hak Perempuan',
                ],
                4 => [
                    'id' => 7,
                    'name' => 'Bidang Tumbuh Kembang Anak'
                ],
            ];

            $data['deputi'] = array_values(collect($deputi)->whereNotIn('id', $currentRoleId)->all());

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
            $proposal = SubmissionProposal::findOrFail($request->id);
            if($proposal->status_disposition == 3) {

                $proposal->deputi()->where('role_id', $user->roles[0]->id)->update([
                    'status' => 1,
                    'approval' => 1,
                    'reason' => $request->reason,
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
                        Notification::send($users, new DispositionNotification(auth()->user(), $path, $proposal));
                    } else {
                        $proposal->status_proposal = 0;
                        $proposal->save();
                    }
                }
            } elseif($proposal->status_disposition == 12) {

                $proposal->tracking()->where('role_id', $user->roles[0]->id)->update([
                    'status' => 1,
                    'approval' => 1,
                    'reason' => $request->reason,
                ]);

                SubmissionProposal::where('id', $request->id)->increment('status_disposition', 1);
                $statusDisposition = $proposal->status_disposition + 1;
                $users = User::whereHas('roles', function(Builder $query) use ($statusDisposition) {
                    $query->where('id', $statusDisposition);
                })->get();

                $data = SubmissionProposal::with('user')->findOrFail($request->id);
                if($data->type_id == 1) {
                    $path = 'PKSProposalSubmissionCooperationIndex';
                } else {
                    $path = 'MOUProposalSubmissionCooperationIndex';
                }

                Notification::send($users, new DispositionNotification(auth()->user(), $path, $proposal));
                Mail::to($data->user->email)->send(new OfflineMeeting($request->keterangan_pesan));
            } elseif($proposal->status_disposition > 13 && $proposal->status_disposition < 16) {
                $proposal->tracking()->where('role_id', $user->roles[1]->id)->update([
                    'status' => 1,
                    'approval' => 1,
                    'reason' => $request->reason,
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
                Notification::send($users, new DispositionNotification(auth()->user(), $path, $proposal));

            } else {
                $proposal->tracking()->where('role_id', $user->roles[0]->id)->update([
                    'status' => 1,
                    'approval' => 1,
                    'reason' => $request->reason,
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
                Notification::send($users, new DispositionNotification(auth()->user(), $path, $proposal));
            }


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
            $user = auth()->user();

            $proposal = SubmissionProposal::findOrFail($request->id);

            if($user->roles[0]->id <= 7 && $user->roles[0]->id >= 3) {
                $proposal->deputi()->where('role_id', $user->roles[0]->id)->update([
                    'status' => 1,
                    'approval' => 3,
                    'reason' => $request->reason,
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
                        Notification::send($users, new DispositionNotification(auth()->user(), $path, $proposal));
                    } else {
                        $proposal->status_proposal = 0;
                        $proposal->save();
                    }
                }
            } elseif($proposal->status_disposition > 13 && $proposal->status_disposition < 16) {
                $proposal->tracking()->where('role_id', $user->roles[1]->id)->update([
                    'status' => 1,
                    'approval' => 3,
                    'reason' => $request->reason,
                ]);

                SubmissionProposal::where('id', $request->id)->update([
                    'status_proposal' => 0
                ]);

            } elseif($proposal->status_disposition == 12) {
                $proposal->tracking()->where('role_id', $user->roles[0]->id)->update([
                    'status' => 1,
                    'approval' => 3,
                    'reason' => $request->reason,
                ]);

                SubmissionProposal::where('id', $request->id)->increment('status_disposition', 1);
                $statusDisposition = $proposal->status_disposition + 1;
                $users = User::whereHas('roles', function(Builder $query) use ($statusDisposition) {
                    $query->where('id', $statusDisposition);
                })->get();

                $data = SubmissionProposal::with('user')->findOrFail($request->id);
                if($data->type_id == 1) {
                    $path = 'PKSProposalSubmissionCooperationIndex';
                } else {
                    $path = 'MOUProposalSubmissionCooperationIndex';
                }

                Notification::send($users, new DispositionNotification(auth()->user(), $path, $proposal));
                Mail::to($data->user->email)->send(new OfflineMeeting($request->keterangan_pesan));
            } else {
                $proposal->tracking()->where('role_id', $user->roles[0]->id)->update([
                    'status' => 1,
                    'approval' => 3,
                    'reason' => $request->reason,
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
                Notification::send($users, new DispositionNotification(auth()->user(), $path, $proposal));
            }

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

            $proposal->tracking()->where('role_id', $user->roles[0]->id)->update([
                'status' => 1,
                'approval' => 2,
            ]);

            $proposal->status_disposition = $proposal->status_disposition + 1;
            $proposal->save();

            $data = SubmissionProposal::findOrFail($id);
            if($data->type_id == 1) {
                $path = 'PKSProposalSubmissionCooperationIndex';
            } else {
                $path = 'MOUProposalSubmissionCooperationIndex';
            }
            $users = User::whereHas('roles', function(Builder $query) {
                $query->where('id', 11);
            })->get();

            Notification::send($users, new DispositionNotification(auth()->user(), $path, $proposal));
            DB::commit();

            return response()->json([
                'messages' => 'Data Berhasil diperbaharui'
            ]);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'messages' => 'Data Gagal diperbaharui',
                'status' => $th->getCode(),
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

            $proposal->tracking()->where('role_id', $user->roles[0]->id)->update([
                'status' => 1,
                'approval' => 2,
            ]);

            $track = SubmissionProposal::where('id', $proposal->id)->increment('status_disposition', 1);

            $users = User::whereHas('roles', function(Builder $query) {
                $query->where('id', 9);
            })->get();

            if($proposal->type_id == 1) {
                $path = 'PKSProposalSubmissionCooperationIndex';
            } else {
                $path = 'MOUProposalSubmissionCooperationIndex';
            }
            Notification::send($users, new DispositionNotification(auth()->user(), $path, $proposal));
            DB::commit();
            return response()->json($this->notification->updateSuccess($data));
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json($this->notification->updateFailed($th));
        }
    }
    public function proposalApproveMOU() {
        try {
            $data['satker'] = SubmissionProposal::with('tracking','country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('type_id', 2)->where('status_proposal', 1)->where('status_disposition', 17)->get();
            $data['guest'] = SubmissionProposalGuest::with('tracking','country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('type_guest_id', 2)->where('status_proposal', 1)->where('status_disposition', 17)->get();
            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function proposalRejectMOU() {
        try {
            $data['satker'] = SubmissionProposal::with('tracking','country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('type_id', 2)->where('status_proposal', 0)->get();
            $data['guest'] = SubmissionProposalGuest::with('tracking','country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('type_guest_id', 2)->where('status_proposal', 0)->get();

            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function proposalApprovePKS() {
        try {
            $data['satker'] = SubmissionProposal::with('tracking','country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('type_id', 1)->where('status_proposal', 1)->where('status_disposition', 17)->get();

            $data['guest'] = SubmissionProposalGuest::with('tracking','country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('type_guest_id', 1)->where('status_proposal', 1)->where('status_disposition', 17)->get();

            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function proposalRejectPKS() {
        try {
            $data['satker'] = SubmissionProposal::with('tracking','country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('type_id', 1)->where('status_proposal', 0)->get();
            $data['guest'] = SubmissionProposalGuest::with('tracking','country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('type_guest_id', 1)->where('status_proposal', 0)->get();

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
                'messages' => 'Download Gagal',
                'status' => $th->getCode()
            ]);
        }
    }
    public function downloadAgencyProfile($id) {
        try {
            $proposal = SubmissionProposal::findOrFail($id);

            $file = $proposal->agency_profile;
            return response()->download(storage_path("/app/public/agency_profile_cooperation/".$file));

        } catch (\Throwable $th) {
            return response()->json([
                'messages' => 'Download Gagal',
                'status' => $th->getCode()
            ]);
        }
    }
    public function downloadProposal($id) {
        try {
            $proposal = SubmissionProposal::findOrFail($id);

            $file = $proposal->agency_profile;
            return response()->download(storage_path("/app/public/proposal_cooperation/".$file));

        } catch (\Throwable $th) {
            return response()->json([
                'messages' => 'Download Gagal',
                'status' => $th->getCode()
            ]);
        }
    }
    public function type($id) {
        try {
            $data = TypeOfCooperation::where('submission_type_id', $id)->where('name', '!=', 'Permohonan Bantuan Dana')->get();

            return response()->json([
                'data' => $data,
                'messages' => 'Data Berhasil di Ambil'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => $th->getMessage(),
                'status' => $th->getCode(),
            ]);
        }
    }
    public function typeOne($id) {
        try {
            $data = TypeOfCooperationOneDerivative::where('type_of_cooperation_id', $id)->get();

            return response()->json([
                'data' => $data,
                'messages' => 'Data Berhasil di Ambil'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => $th->getMessage(),
                'status' => $th->getCode(),
            ]);
        }
    }
    public function typeTwo($id) {
        try {
            if($id == 1 || $id == 2) {
                $data['country'] = Country::where('id', '!=', '102')->get();
            } else {
                $data['country'] = Country::where('id', '102')->get();
                $data['province'] = Province::all();
            }

            $data['type'] = TypeOfCooperationTwoDerivative::where('type_of_cooperation_one_derivative_id', $id)->get();

            return response()->json([
                'data' => $data,
                'messages' => 'Data Berhasil di Ambil'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => $th->getMessage(),
                'status' => $th->getCode(),
            ]);
        }
    }
    public function province($id) {
        try {
            if($id == 102) {
                $data = Province::all();
            } else {
                $data = [];
            }

            return response()->json([
                'data' => $data,
                'messages' => 'Data Berhasil di Ambil'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => $th->getMessage(),
                'status' => $th->getCode(),
            ]);
        }
    }
    public function regency($id) {
        try {
            $data = Regency::where('province_id', $id)->get();

            return response()->json([
                'data' => $data,
                'messages' => 'Data Berhasil di Ambil'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => $th->getMessage(),
                'status' => $th->getCode(),
            ]);
        }
    }
    public function filterSatkerSesmenApprovalMOU(Request $request) {
        try {
            $user = auth()->user();
            $roles = collect($user['roles']);

            $mappingRole = $roles->map(function($item, $key) {
                return $item['id'];
            });

            $idRoles = $mappingRole->all();
            $data['approval'] = SubmissionProposal::query();
            if($user->roles[0]->id <= 7 && $user->roles[0]->id >= 3) {
                if($request->q != null) {
                    $data['approval']->with('deputi','country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->whereHas('deputi', function(Builder $query) use ($user) {
                        $query->where('role_id', $user->roles[0]->id);
                        $query->whereNull('approval');
                    })->where('type_id', 2)->where('status_disposition', 3)->where('status_proposal', 1)->where('title_cooperation', 'LIKE', '%'.$request->q);
                }

                if($request->type != null) {
                    $data['approval']->with('deputi','country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->whereHas('deputi', function(Builder $query) use ($user) {
                        $query->where('role_id', $user->roles[0]->id);
                        $query->whereNull('approval');
                    })->where('type_id', 2)->where('status_disposition', 3)->where('status_proposal', 1)->where('type_of_cooperation_id', $request->type);
                }
            } else {
                if($request->q != null) {
                    $data['approval']->with('deputi','country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('type_id', 2)->whereIn('status_disposition', $idRoles)->where('status_proposal', 1)->where('title_cooperation', 'LIKE', '%'.$request->q);
                }

                if($request->type != null) {
                    $data['approval']->with('deputi','country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('type_id', 2)->whereIn('status_disposition', $idRoles)->where('status_proposal', 1)->where('type_of_cooperation_id', $request->type);
                }
            }
            $result['guest'] = $data['guest']->get();
            return response()->json($this->notification->generalSuccess($result));
            } catch (\Throwable $th) {
                return response()->json($this->notification->generalFailed($th));
            }
    }
    public function filterSatkerSesmenYouMOU(Request $request) {
        try {
            $user = auth()->user();
            $data['you'] = SubmissionProposal::query();
            if($request->q != null) {
                $data['you']->with('country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('type_id', 2)->where('created_by', $user->id)->where('type_of_cooperation_id', $request->type)->where('title_cooperation', 'LIKE', '%'.$request->q);
            }
            if($request->type != null) {
                $data['you']->with('country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('type_id', 2)->where('created_by', $user->id)->where('type_of_cooperation_id', $request->type)->where('type_of_cooperation_id', $request->type);
            }

            $result['you'] = $data['you']->get();
            return response()->json($this->notification->generalSuccess($result));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function filterGuestMOU(Request $request) {
        try {
        $user = auth()->user();
        $roles = collect($user['roles']);

        $mappingRole = $roles->map(function($item, $key) {
            return $item['id'];
        });

        $idRoles = $mappingRole->all();
        $data['guest'] = SubmissionProposalGuest::query();
        if($user->roles[0]->id <= 7 && $user->roles[0]->id >= 3) {
            if($request->q != null) {
                $data['guest']->with('deputi','country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->whereHas('deputi', function(Builder $query) use ($user) {
                    $query->where('role_id', $user->roles[0]->id);
                    $query->whereNull('approval');
                })->where('type_guest_id', 2)->where('status_disposition', 3)->where('status_proposal', 1)->where('title_cooperation', 'LIKE', '%'.$request->q);
            }

            if($request->type != null) {
                $data['guest']->with('deputi','country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->whereHas('deputi', function(Builder $query) use ($user) {
                    $query->where('role_id', $user->roles[0]->id);
                    $query->whereNull('approval');
                })->where('type_guest_id', 2)->where('status_disposition', 3)->where('status_proposal', 1)->where('type_of_cooperation_id', $request->type);
            }
        } else {
            if($request->q != null) {
                $data['guest']->with('deputi','country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('type_guest_id', 2)->whereIn('status_disposition', $idRoles)->where('status_proposal', 1)->where('title_cooperation', 'LIKE', '%'.$request->q);
            }

            if($request->type != null) {
                $data['guest']->with('deputi','country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('type_guest_id', 2)->whereIn('status_disposition', $idRoles)->where('status_proposal', 1)->where('type_of_cooperation_id', $request->type);
            }
        }
        $result['guest'] = $data['guest']->get();
        return response()->json($this->notification->generalSuccess($result));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
}

