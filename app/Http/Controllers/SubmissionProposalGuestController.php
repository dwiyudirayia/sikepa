<?php

namespace App\Http\Controllers;

use App\DeputiPICGuest;
use App\LawFileSubmissionProposalGuest;
use App\Repositories\Interfaces\NotificationRepositoryInterfaces;
use App\Mail\ApproveCooperation;
use App\Mail\ApproveCooperationFinal;
use App\Mail\OfflineMeetingGuest;
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
            $user = auth()->user();
            $proposal = SubmissionProposalGuest::with('deputi.role')->findOrFail($request->id);

            if($proposal->status_disposition == 3) {
                $proposal->deputi()->where('role_id', $user->roles[0]->id)->update([
                    'status' => 1,
                    'approval' => 1,
                    'reason' => $request->reason,
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

                        if($proposal->type_guest_id == 1) {
                            $path = 'PKSProposalSubmissionCooperationIndex';
                        } else {
                            $path = 'MOUProposalSubmissionCooperationIndex';
                        }
                        Notification::send($users, new DispositionNotification(auth()->user(), $path, $proposal));

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

                $proposal->tracking()->where('role_id', $user->roles[0]->id)->update([
                    'status' => 1,
                    'approval' => 1,
                    'reason' => $request->reason,
                ]);

                $track = SubmissionProposalGuest::where('id', $request->id)->increment('status_disposition', 1);
                $users = User::whereHas('roles', function(Builder $query) use ($currentRoleId) {
                    $query->whereIn('id', $currentRoleId);
                })->get();

                if($proposal->type_guest_id == 1) {
                    $path = 'PKSProposalSubmissionCooperationIndex';
                } else {
                    $path = 'MOUProposalSubmissionCooperationIndex';
                }
                Notification::send($users, new DispositionNotification(auth()->user(), $path, $proposal));
                Mail::to($proposal->email)->send(new ApproveCooperation);
            } elseif($proposal->status_disposition == 12) {
                $proposal->tracking()->where('role_id', $user->roles[0]->id)->update([
                    'status' => 1,
                    'approval' => 1,
                    'reason' => $request->reason,
                ]);

                $track = SubmissionProposalGuest::where('id', $request->id)->increment('status_disposition', 1);
                $statusDisposition = $proposal->status_disposition + 1;
                $users = User::whereHas('roles', function(Builder $query) use ($statusDisposition) {
                    $query->where('id', $statusDisposition);
                })->get();

                if($proposal->type_guest_id == 1) {
                    $path = 'PKSProposalSubmissionCooperationIndex';
                } else {
                    $path = 'MOUProposalSubmissionCooperationIndex';
                }

                Notification::send($users, new DispositionNotification(auth()->user(), $path, $proposal));
                Mail::to($proposal->email)->send(new OfflineMeetingGuest($request->keterangan_pesan));
            } elseif ($proposal->status_disposition > 13 && $proposal->status_disposition < 16) {
                $proposal->tracking()->where('role_id', $user->roles[1]->id)->update([
                    'status' => 1,
                    'approval' => 1,
                    'reason' => $request->reason,
                ]);

                $track = SubmissionProposalGuest::where('id', $request->id)->increment('status_disposition', 1);

                $statusDisposition = $proposal->status_disposition + 1;

                $users = User::whereHas('roles', function(Builder $query) use ($statusDisposition) {
                    $query->where('id', $statusDisposition);
                })->get();

                if($proposal->type_guest_id == 1) {
                    $path = 'PKSProposalSubmissionCooperationIndex';
                } else {
                    $path = 'MOUProposalSubmissionCooperationIndex';
                }
                Notification::send($users, new DispositionNotification(auth()->user(), $path, $proposal));
                Mail::to($proposal->email)->send(new ApproveCooperation);

            } else {
                $proposal->tracking()->where('role_id', $user->roles[0]->id)->update([
                    'status' => 1,
                    'approval' => 1,
                    'reason' => $request->reason,
                ]);

                $track = SubmissionProposalGuest::where('id', $request->id)->increment('status_disposition', 1);
                $statusDisposition = $proposal->status_disposition + 1;
                $users = User::whereHas('roles', function(Builder $query) use ($statusDisposition) {
                    $query->where('id', $statusDisposition);
                })->get();

                if($proposal->type_guest_id == 1) {
                    $path = 'PKSProposalSubmissionCooperationIndex';
                } else {
                    $path = 'MOUProposalSubmissionCooperationIndex';
                }

                Notification::send($users, new DispositionNotification(auth()->user(), $path, $proposal));
                Mail::to($proposal->email)->send(new ApproveCooperation);
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

            $proposal = SubmissionProposalGuest::findOrFail($request->id);

            if($proposal->status_disposition == 3) {

                $proposal->deputi()->where('role_id', $user->roles[0]->id)->update([
                    'status' => 1,
                    'approval' => 3,
                    'reason' => $request->reason
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

                        if($proposal->type_guest_id == 1) {
                            $path = 'PKSProposalSubmissionCooperationIndex';
                        } else {
                            $path = 'MOUProposalSubmissionCooperationIndex';
                        }
                        Notification::send($users, new DispositionNotification(auth()->user(), $path, $proposal));
                    } else {
                        $proposal->status_proposal = 0;
                        $proposal->save();

                        Mail::to($proposal->email)->send(new RejectCooperation);
                    }
                }
            } elseif($proposal->status_disposition == 12) {
                $proposal->tracking()->where('role_id', $user->roles[0]->id)->update([
                    'status' => 1,
                    'approval' => 3,
                    'reason' => $request->reason,
                ]);

                $track = SubmissionProposalGuest::where('id', $request->id)->increment('status_disposition', 1);
                $statusDisposition = $proposal->status_disposition + 1;
                $users = User::whereHas('roles', function(Builder $query) use ($statusDisposition) {
                    $query->where('id', $statusDisposition);
                })->get();

                if($proposal->type_guest_id == 1) {
                    $path = 'PKSProposalSubmissionCooperationIndex';
                } else {
                    $path = 'MOUProposalSubmissionCooperationIndex';
                }

                Notification::send($users, new DispositionNotification(auth()->user(), $path, $proposal));
                Mail::to($proposal->email)->send(new OfflineMeetingGuest($request->keterangan_pesan));
            } elseif ($proposal->status_disposition == 2) {
                $proposal->tracking()->where('role_id', $user->roles[0]->id)->update([
                    'status' => 1,
                    'approval' => 3,
                    'reason' => $request->reason,
                ]);

                SubmissionProposalGuest::where('id', $request->id)->update([
                    'status_proposal' => 0
                ]);

                Mail::to($proposal->email)->send(new RejectCooperation);


            } elseif($proposal->status_disposition > 13 && $proposal->status_disposition < 16) {
                $proposal->tracking()->where('role_id', $user->roles[0]->id)->update([
                    'status' => 1,
                    'approval' => 3,
                    'reason' => $request->reason,
                ]);

                SubmissionProposalGuest::where('id', $request->id)->update([
                    'status_proposal' => 0
                ]);

                Mail::to($proposal->email)->send(new RejectCooperation);

            } else {

                $proposal->tracking()->where('role_id', $user->roles[0]->id)->update([
                    'status' => 1,
                    'approval' => 3,
                    'reason' => $request->reason,
                ]);

                $track = SubmissionProposalGuest::where('id', $request->id)->increment('status_disposition', 1);

                $statusDisposition = $proposal->status_disposition + 1;
                $users = User::whereHas('roles', function(Builder $query) use ($statusDisposition) {
                    $query->where('id', $statusDisposition);
                })->get();

                if($proposal->type_guest_id == 1) {
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

            $proposal->tracking()->where('role_id', $user->roles[0]->id)->update([
                'status' => 1,
                'approval' => 2,
            ]);

            $proposal->status_disposition = $proposal->status_disposition + 1;
            $proposal->save();

            if($proposal->type_guest_id == 1) {
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
                'messages' => 'Data Berhasil Diperbaharui'
            ]);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'messages' => 'Data Gagal Diperbaharui',
                'status' => $th->getCode(),
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
                'messages' => 'Download Gagal',
                'status' => $th->getCode()
            ]);
        }
    }
    public function final(Request $request, $id) {
        try {
            $user = auth()->user();
            DB::beginTransaction();

            $proposal = SubmissionProposalGuest::findOrFail($id);
            $proposal->title_cooperation = $request->title_cooperation_final;
            $proposal->save();
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

            $track = SubmissionProposalGuest::where('id', $proposal->id)->increment('status_disposition', 1);

            $users = User::whereHas('roles', function(Builder $query) {
                $query->where('id', 9);
            })->get();

            if($proposal->type_guest_id == 1) {
                $path = 'PKSProposalSubmissionCooperationIndex';
            } else {
                $path = 'MOUProposalSubmissionCooperationIndex';
            }
            DB::commit();
            Notification::send($users, new DispositionNotification(auth()->user(), $path, $proposal));
            Mail::to($proposal->email)->send(new ApproveCooperationFinal);

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
                'messages' => 'Data Berhasil Dihapus',
                'status' => 200,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => 'Data Gagal Dihapus',
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
                'messages' => 'Data Berhasil Ditambah',
                'status' => 200,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => 'Data Gagal Ditambah',
                'status' => $th->getCode(),
            ]);
        }
    }
    public function downloadProposalCooperationGuest($id) {
        try {
            $proposal = SubmissionProposalGuest::findOrFail($id);

            $file = $proposal->proposal;
            return response()->download(storage_path("/app/public/proposal_cooperation_guest/".$file));

        } catch (\Throwable $th) {
            return response()->json([
                'messages' => 'Download Gagal',
                'status' => $th->getCode()
            ]);
        }
    }
    public function downloadAgencyProfileCooperationGuest($id) {
        try {
            $proposal = SubmissionProposalGuest::findOrFail($id);

            $file = $proposal->agency_profile;
            return response()->download(storage_path("/app/public/agency_profile_cooperation_guest/".$file));

        } catch (\Throwable $th) {
            return response()->json([
                'messages' => 'Download Gagal',
                'status' => $th->getCode()
            ]);
        }
    }
    public function downloadKTPGuest($id) {
        try {
            $proposal = SubmissionProposalGuest::findOrFail($id);

            $file = $proposal->ktp;
            return response()->download(storage_path("/app/public/ktp_guest/".$file));

        } catch (\Throwable $th) {
            return response()->json([
                'messages' => 'Download Gagal',
                'status' => $th->getCode()
            ]);
        }
    }
    public function downloadNPWPGuest($id) {
        try {
            $proposal = SubmissionProposalGuest::findOrFail($id);

            $file = $proposal->npwp;
            return response()->download(storage_path("/app/public/npwp_guest/".$file));

        } catch (\Throwable $th) {
            return response()->json([
                'messages' => 'Download Gagal',
                'status' => $th->getCode()
            ]);
        }
    }
    public function downloadSIUPGuest($id) {
        try {
            $proposal = SubmissionProposalGuest::findOrFail($id);

            $file = $proposal->siup;
            return response()->download(storage_path("/app/public/siup_guest/".$file));

        } catch (\Throwable $th) {
            return response()->json([
                'messages' => 'Download Gagal',
                'status' => $th->getCode()
            ]);
        }
    }
}
