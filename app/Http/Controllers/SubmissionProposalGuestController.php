<?php

namespace App\Http\Controllers;

use App\DeputiPICGuest;
use App\LawFileSubmissionProposalGuest;
use App\Repositories\Interfaces\NotificationRepositoryInterfaces;
use App\Mail\ApproveCooperation;
use App\Mail\ApproveCooperationFinal;
use App\Mail\RejectCooperation;
use App\ReasonSubmissionCooperationGuest;
use App\SubmissionProposalGuest;
use Illuminate\Http\Request;
use DB;
use Illuminate\Database\Eloquent\Builder;
use App\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\DispositionNotification;
use Mail;
use Illuminate\Support\Str;

class SubmissionProposalGuestController extends Controller
{
    private $notification;

    public function __construct(NotificationRepositoryInterfaces $notification)
    {
        $this->notification = $notification;
    }
    public function approve(Request $request) {
        try {
            DB::beginTransaction();
            $countRole = auth()->user()->roles()->count();
            $user = auth()->user();
            $proposal = SubmissionProposalGuest::with('deputi.role')->findOrFail($request->id);

            if($proposal->status_disposition == 3) {
                $proposal->deputi()->where('role_id', $user->roles[0]->id)->update([
                    'status' => 1,
                    'approval' => 1
                ]);

                $deputi = DeputiPICGuest::where('submission_proposal_guest_id', $request->id)->get();
                $sumStatus = DeputiPICGuest::where('submission_proposal_guest_id', $request->id)->sum('status');
                $sumApproval = DeputiPICGuest::where('submission_proposal_guest_id', $request->id)->sum('approval');

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

                        Mail::to($proposal->email)->send(new ApproveCooperation);
                    } else {
                        $proposal->status_proposal = 0;
                        $proposal->save();

                        Mail::to($proposal->email)->send(new RejectCooperation);
                    }
                }
            } elseif($proposal->status_disposition == 2) {
                $collectDeputi = collect($proposal->deputi->toArray());
                $mapDeputi = $collectDeputi->map(function($item, $key) {
                    return $item['role_id'];
                });
                $currentRoleId = $mapDeputi->all();

                $rolesName = $user->roles[0]->name;
                $convertToSnakeCase = Str::snake($rolesName);

                $proposal->tracking()->update([
                    $convertToSnakeCase => 1
                ]);

                $track = SubmissionProposalGuest::where('id', $request->id)->increment('status_disposition', 1);



                $users = User::whereHas('roles', function(Builder $query) use ($currentRoleId) {
                    $query->whereIn('id', $currentRoleId);
                })->get();

                if($proposal->type_id == 1) {
                    $path = 'PKSProposalSubmissionCooperationIndex';
                } else {
                    $path = 'MOUProposalSubmissionCooperationIndex';
                }
                Notification::send($users, new DispositionNotification(auth()->user(), $path));
                Mail::to($proposal->email)->send(new ApproveCooperation);
            }
            elseif($countRole == 2 && ($proposal->status_disposition > 13 && $proposal->status_disposition < 16) ) {
                $rolesName = $user->roles[1]->name;
                $convertToSnakeCase = Str::snake($rolesName);

                $proposal->tracking()->update([
                    $convertToSnakeCase => 1
                ]);

                $track = SubmissionProposalGuest::where('id', $request->id)->increment('status_disposition', 1);

                $statusDisposition = $proposal->status_disposition + 1;
                // dd($statusDisposition);
                $users = User::whereHas('roles', function(Builder $query) use ($statusDisposition) {
                    $query->where('id', $statusDisposition);
                })->get();

                if($proposal->type_id == 1) {
                    $path = 'PKSProposalSubmissionCooperationIndex';
                } else {
                    $path = 'MOUProposalSubmissionCooperationIndex';
                }
                Notification::send($users, new DispositionNotification(auth()->user(), $path));
                Mail::to($proposal->email)->send(new ApproveCooperation);

            } elseif($countRole == 2 && $proposal->status_disposition == 16) {
                $rolesName = $user->roles[1]->name;
                $convertToSnakeCase = Str::snake($rolesName);

                $proposal->tracking()->update([
                    $convertToSnakeCase => 1
                ]);

                $track = SubmissionProposalGuest::where('id', $request->id)->increment('status_disposition', 1);

                $users = User::whereHas('roles', function(Builder $query) {
                    $query->where('id', 9);
                })->get();

                if($proposal->type_id == 1) {
                    $path = 'PKSProposalSubmissionCooperationIndex';
                } else {
                    $path = 'MOUProposalSubmissionCooperationIndex';
                }
                Notification::send($users, new DispositionNotification(auth()->user(), $path));
                Mail::to($proposal->email)->send(new ApproveCooperationFinal);
            } else {
                $rolesName = $user->roles[0]->name;
                $convertToSnakeCase = Str::snake($rolesName);

                $proposal->tracking()->update([
                    $convertToSnakeCase => 1
                ]);

                $track = SubmissionProposalGuest::where('id', $request->id)->increment('status_disposition', 1);
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
                Mail::to($proposal->email)->send(new ApproveCooperation);
            }

            ReasonSubmissionCooperationGuest::create([
                'created_by' => auth()->user()->id,
                'submission_proposal_guest_id' => $request->id,
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

            $proposal = SubmissionProposalGuest::findOrFail($request->id);

            if($proposal->status_disposition == 3) {

                $proposal->deputi()->where('role_id', $user->roles[0]->id)->update([
                    'status' => 1,
                    'approval' => 0
                ]);

                $deputi = DeputiPICGuest::where('submission_proposal_guest_id', $request->id)->get();
                $sumStatus = DeputiPICGuest::where('submission_proposal_guest_id', $request->id)->sum('status');
                $sumApproval = DeputiPICGuest::where('submission_proposal_guest_id', $request->id)->sum('approval');

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

                        Mail::to($proposal->email)->send(new RejectCooperation);
                    }
                }
            } elseif($proposal->status_disposition == 2) {
                $rolesName = $user->roles[0]->name;
                $convertToSnakeCase = Str::snake($rolesName);

                $proposal->tracking()->update([
                    $convertToSnakeCase => 0
                ]);

                SubmissionProposalGuest::where('id', $request->id)->update([
                    'status_proposal' => 0
                ]);

                Mail::to($proposal->email)->send(new RejectCooperation);


            } elseif($countRole == 2 && ($proposal->status_disposition > 13 && $proposal->status_disposition < 16) ) {
                $rolesName = $user->roles[1]->name;
                $convertToSnakeCase = Str::snake($rolesName);

                $proposal->tracking()->update([
                    $convertToSnakeCase => 0
                ]);

                SubmissionProposalGuest::where('id', $request->id)->update([
                    'status_proposal' => 0
                ]);

                Mail::to($proposal->email)->send(new RejectCooperation);

            } elseif($countRole == 2 && $proposal->status_disposition == 16) {
                $rolesName = $user->roles[1]->name;
                $convertToSnakeCase = Str::snake($rolesName);

                $proposal->tracking()->update([
                    $convertToSnakeCase => 0
                ]);

                $track = SubmissionProposalGuest::where('id', $request->id)->increment('status_disposition', 1);
            } else {

                $proposal = SubmissionProposalGuest::findOrFail($request->id);

                $rolesName = $user->roles[0]->name;
                $convertToSnakeCase = Str::snake($rolesName);

                $proposal->tracking()->update([
                    $convertToSnakeCase => 0
                ]);

                $track = SubmissionProposalGuest::where('id', $request->id)->increment('status_disposition', 1);

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


            ReasonSubmissionCooperationGuest::create([
                'created_by' => auth()->user()->id,
                'submission_proposal_guest_id' => $request->id,
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
            $proposal = SubmissionProposalGuest::findOrFail($id);
            $user = auth()->user();

            if($request->hasFile('notulen')) {
                $extention = $request->notulen->getClientOriginalExtension();
                $fileName = 'law-notulen'.'-'.date('Y-m-d').'-'.time().'.'.$extention;
                $path = $request->notulen->storeAs($proposal->id, $fileName, 'law_notulen_guest');

                $checkTable = LawFileSubmissionProposalGuest::where('submission_proposal_guest_id', $id)->get();

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
                $path = $request->draft->storeAs($proposal->id, $fileName, 'law_draft_guest');

                $checkTable = LawFileSubmissionProposalGuest::where('submission_proposal_guest_id', $id)->get();

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

            if($proposal->type_id == 1) {
                $path = 'PKSProposalSubmissionCooperationIndex';
            } else {
                $path = 'MOUProposalSubmissionCooperationIndex';
            }
            $users = User::whereHas('roles', function(Builder $query) {
                $query->where('id', 11);
            })->get();

            Notification::send($users, new DispositionNotification(auth()->user(), $path));

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
    public function fileDraftMOU($id) {
        try {
            $proposal = SubmissionProposalGuest::with('law')->findOrFail($id);

            $draft = $proposal->law->draft;
            return response()->download(storage_path("/app/public/law_draft_guest/".$draft));

        } catch (\Throwable $th) {
            return response()->json([
                'messages' => $th->getMessage(),
                'status' => $th->getCode()
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
            return response()->json([
                'messages' => 'Berhasil',
                'status' => 200,
            ]);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json($this->notification->updateFailed($th));
        }
    }
    public function destroyDeputiPIC($id) {
        try {
            $deputi = DeputiPICGuest::findOrFail($id);
            $deputi->delete();

            return response()->json([
                'messages' => 'Data berhasil dihapus',
                'status' => 200,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => $th->getMessage(),
                'status' => $th->getCode(),
            ]);
        }
    }
    public function storeDeputiPIC(Request $request) {
        try {
            foreach ($request->data as $key => $value) {
                $deputiPIC = DeputiPICGuest::updateOrCreate([
                    'role_id' => $value,
                    'submission_proposal_guest_id' => $request->id,
                ]);
            }

            return response()->json([
                'messages' => 'Data berhasil ditambahkan',
                'status' => 200,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => $th->getMessage(),
                'status' => $th->getCode(),
            ]);
        }
    }
}
