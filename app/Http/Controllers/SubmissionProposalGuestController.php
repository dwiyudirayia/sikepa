<?php

namespace App\Http\Controllers;

use App\DeputiPICGuest;
use App\Mail\RejectDeputi;
use App\SubmissionProposalGuest;
use Illuminate\Http\Request;
use DB;
use Illuminate\Database\Eloquent\Builder;
use App\User;

class SubmissionProposalGuestController extends Controller
{
    public function approve(Request $request) {
        try {
            DB::beginTransaction();
            $countRole = auth()->user()->roles()->count();
            $user = auth()->user();
            $proposal = SubmissionProposalGuest::findOrFail($request->id);
            if($user->roles[0]->id <= 6 && $user->roles[0]->id >= 2) {

                $proposal->deputi()->where('role_id', $user->roles[0]->id)->update([
                    'status' => 1,
                    'approval' => 1
                ]);

                $deputi = DeputiPICGuest::where('submission_proposal_id', $request->id)->get();
                $sumStatus = DeputiPICGuest::where('submission_proposal_id', $request->id)->sum('status');
                $sumApproval = DeputiPICGuest::where('submission_proposal_id', $request->id)->sum('approval');

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

                        Mail::to($value->email)->send(new RejectDeputi);
                    }
                }
            } elseif($countRole == 2 && ($proposal->status_disposition > 13 && $proposal->status_disposition < 16) ) {
                $rolesName = $user->roles[1]->name;
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

            $proposal = SubmissionProposalGuest::findOrFail($request->id);

            if($user->roles[0]->id <= 6 && $user->roles[0]->id >= 2) {

                $proposal->deputi()->where('role_id', $user->roles[0]->id)->update([
                    'status' => 1,
                    'approval' => 0
                ]);

                $deputi = DeputiPICGuest::where('submission_proposal_id', $request->id)->get();
                $sumStatus = DeputiPICGuest::where('submission_proposal_id', $request->id)->sum('status');
                $sumApproval = DeputiPICGuest::where('submission_proposal_id', $request->id)->sum('approval');

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

                        Mail::to($value->email)->send(new RejectDeputi);
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
}
