<?php

namespace App\Http\Controllers;

use App\DeputiPICGuest;
use App\FileDraftGuest;
use App\FileNotulenGuest;
use App\Mail\ApproveCooperationFinal;
use App\Mail\OfflineMeetingGuest;
use App\Mail\RejectCooperation;
use App\Notifications\DispositionNotification;
use App\Repositories\Interfaces\NotificationRepositoryInterfaces;
use App\SubmissionProposalGuest;
use App\User;
use Carbon\Carbon;
use DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Mail;

class SubmissionProposalGuestController extends Controller
{
    private $notification;

    public function __construct(NotificationRepositoryInterfaces $notification)
    {
        $this->notification = $notification;
    }
    function continue (Request $request) {
        try {
            DB::beginTransaction();
            $user = auth()->user();
            $proposal = SubmissionProposalGuest::with('deputi.role')->findOrFail($request->id);

            if ($proposal->status_disposition == 3) {
                $proposal->deputi()->where('role_id', $user->roles[0]->id)->update([
                    'status' => 1,
                    'approval' => 2,
                    'reason' => $request->reason,
                ]);

                $deputi = DeputiPICGuest::where('submission_proposal_guest_id', $request->id)->get();
                $sumStatus = DeputiPICGuest::where('submission_proposal_guest_id', $request->id)->sum('status');

                $countRowProposal = $deputi->count();

                if ($sumStatus == $countRowProposal) {
                    $proposal->status_disposition = 9;
                    $proposal->save();

                    $statusDisposition = $proposal->status_disposition;
                    $users = User::whereHas('roles', function (Builder $query) use ($statusDisposition) {
                        $query->where('id', $statusDisposition);
                    })->get();

                    $path = 'MOUProposalSubmissionCooperationIndex';

                    Notification::send($users, new DispositionNotification(auth()->user(), $path, $proposal));
                }
            } elseif ($proposal->status_disposition == 2) {
                $collectDeputi = collect($proposal->deputi->toArray());
                $mapDeputi = $collectDeputi->map(function ($item, $key) {
                    return $item['role_id'];
                });
                $currentRoleId = $mapDeputi->all();

                $proposal->tracking()->where('role_id', $user->roles[0]->id)->update([
                    'status' => 1,
                    'approval' => 2,
                    'reason' => $request->reason,
                ]);

                $track = SubmissionProposalGuest::where('id', $request->id)->increment('status_disposition', 1);
                $users = User::whereHas('roles', function (Builder $query) use ($currentRoleId) {
                    $query->whereIn('id', $currentRoleId);
                })->get();

                $path = 'MOUProposalSubmissionCooperationIndex';

                Notification::send($users, new DispositionNotification(auth()->user(), $path, $proposal));
                // Mail::to($proposal->email)->send(new ApproveCooperation);
            } elseif ($proposal->status_disposition == 11) {
                $proposal->tracking()->where('role_id', $user->roles[0]->id)->update([
                    'status' => 1,
                    'approval' => 2,
                    'reason' => $request->reason,
                ]);

                $track = SubmissionProposalGuest::where('id', $request->id)->increment('status_disposition', 1);
                $statusDisposition = $proposal->status_disposition + 1;
                $users = User::whereHas('roles', function (Builder $query) use ($statusDisposition) {
                    $query->where('id', $statusDisposition);
                })->get();

                $path = 'MOUProposalSubmissionCooperationIndex';

                Notification::send($users, new DispositionNotification(auth()->user(), $path, $proposal));
                Mail::to($proposal->email)->send(new OfflineMeetingGuest($request->keterangan_pesan));
            } else {
                $proposal->tracking()->where('role_id', $user->roles[0]->id)->update([
                    'status' => 1,
                    'approval' => 2,
                    'reason' => $request->reason,
                ]);

                $track = SubmissionProposalGuest::where('id', $request->id)->increment('status_disposition', 1);
                $statusDisposition = $proposal->status_disposition + 1;
                $users = User::whereHas('roles', function (Builder $query) use ($statusDisposition) {
                    $query->where('id', $statusDisposition);
                })->get();

                $path = 'MOUProposalSubmissionCooperationIndex';

                Notification::send($users, new DispositionNotification(auth()->user(), $path, $proposal));
                // Mail::to($proposal->email)->send(new ApproveCooperation);
            }

            $data = [];
            DB::commit();
            return response()->json($this->notification->updateSuccess($data));
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json($this->notification->updateFailed($th));
        }
    }
    public function approve(Request $request)
    {
        try {
            DB::beginTransaction();
            $user = auth()->user();
            $proposal = SubmissionProposalGuest::with('deputi.role')->findOrFail($request->id);
            if ($proposal->status_disposition > 12 && $proposal->status_disposition < 15) {
                $getRoleId = $user->roles[0]->id;
                if ($getRoleId == 11) {
                    $roleId = 13;
                } else {
                    $roleId = 14;
                }
                $proposal->tracking()->where('role_id', $roleId)->update([
                    'status' => 1,
                    'approval' => 1,
                    'reason' => $request->reason,
                ]);

                $track = SubmissionProposalGuest::where('id', $request->id)->increment('status_disposition', 1);

                $statusDisposition = $proposal->status_disposition + 1;

                $users = User::whereHas('roles', function (Builder $query) use ($statusDisposition) {
                    $query->where('id', $statusDisposition);
                })->get();

                $path = 'MOUProposalSubmissionCooperationIndex';

                Notification::send($users, new DispositionNotification(auth()->user(), $path, $proposal));
                // Mail::to($proposal->email)->send(new ApproveCooperation);
            }

            $data = [];
            DB::commit();
            return response()->json($this->notification->updateSuccess($data));
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json($this->notification->updateFailed($th));
        }
    }
    public function reject(Request $request)
    {
        try {
            DB::beginTransaction();
            $user = auth()->user();

            $proposal = SubmissionProposalGuest::findOrFail($request->id);
            if ($proposal->status_disposition > 12 && $proposal->status_disposition < 15) {
                $getRoleId = $user->roles[0]->id;
                if ($getRoleId == 11) {
                    $roleId = 13;
                } else {
                    $roleId = 14;
                }
                $proposal->tracking()->where('role_id', $roleId)->update([
                    'status' => 1,
                    'approval' => 3,
                    'reason' => $request->reason,
                ]);

                SubmissionProposalGuest::where('id', $request->id)->update([
                    'status_proposal' => 0,
                ]);

                Mail::to($proposal->email)->send(new RejectCooperation);
            }
            $data = [];
            DB::commit();
            return response()->json($this->notification->updateSuccess($data));
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json($this->notification->updateFailed($th));
        }
    }
    public function law(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $proposal = SubmissionProposalGuest::findOrFail($id);
            $user = auth()->user();

            if ($request->hasFile('notulen')) {
                $extention = $request->notulen->getClientOriginalExtension();
                $fileName = 'law-notulen' . '-' . date('Y-m-d') . '-' . time() . '.' . $extention;
                $path = $request->notulen->storeAs($proposal->id, $fileName, 'law_notulen_guest');

                $proposal->notulen()->create([
                    'created_by' => auth()->user()->id,
                    'name' => $path,
                ]);
            }

            if ($request->hasFile('draft')) {
                $extention = $request->draft->getClientOriginalExtension();
                $fileName = 'law-draft' . '-' . date('Y-m-d') . '-' . time() . '.' . $extention;
                $path = $request->draft->storeAs($proposal->id, $fileName, 'law_draft_guest');

                $proposal->draft()->create([
                    'created_by' => auth()->user()->id,
                    'name' => $path,
                ]);
            }

            $proposal->tracking()->where('role_id', $user->roles[0]->id)->update([
                'status' => 1,
                'approval' => 2,
            ]);

            $proposal->status_disposition = $proposal->status_disposition + 1;
            $proposal->save();

            $path = 'MOUProposalSubmissionCooperationIndex';

            $users = User::whereHas('roles', function (Builder $query) {
                $query->where('id', 11);
            })->get();

            Notification::send($users, new DispositionNotification(auth()->user(), $path, $proposal));

            DB::commit();
            return response()->json([
                'messages' => 'Data Berhasil Diperbaharui',
            ]);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'messages' => 'Data Gagal Diperbaharui',
                'status' => $th->getCode(),
            ]);
        }
    }
    public function fileDraftMOU($id)
    {
        try {
            $proposal = FileDraftGuest::findOrFail($id);

            $draft = $proposal->name;
            return response()->download(storage_path("/app/public/law_draft_guest/" . $draft));
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => 'Download Gagal',
                'status' => $th->getCode(),
            ]);
        }
    }
    public function fileNotulenMOU($id)
    {
        try {
            $proposal = FileNotulenGuest::findOrFail($id);

            $draft = $proposal->name;
            return response()->download(storage_path("/app/public/law_notulen_guest/" . $draft));
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => 'Download Gagal',
                'status' => $th->getCode(),
            ]);
        }
    }
    public function downloadDraftMOUSuccess($id)
    {
        try {
            $data = FileDraftGuest::where('submission_proposal_guest_id', $id)->get();

            $lastData = $data->last();

            return response()->download(storage_path("/app/public/law_draft_guest/" . $lastData->name));
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => $th->getMessage(),
                'status' => $th->getCode(),
            ]);
        }
    }
    public function storeDraft(Request $request)
    {
        try {
            DB::beginTransaction();
            $proposal = SubmissionProposalGuest::findOrFail($request->id);

            $extention = $request->draft->getClientOriginalExtension();
            $fileName = 'law-draft' . '-' . date('Y-m-d') . '-' . time() . '.' . $extention;
            $path = $request->draft->storeAs($proposal->id, $fileName, 'law_draft_guest');

            $proposal->draft()->create([
                'created_by' => auth()->user()->id,
                'name' => $path,
            ]);

            DB::commit();

            $data = FileDraftGuest::where('submission_proposal_guest_id', $request->id)->get();

            return response()->json([
                'data' => $data,
                'messages' => 'Berhasil',
                'status' => 200,
            ]);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json($this->notification->updateFailed($th));
        }
    }
    public function storeNotulen(Request $request)
    {
        try {
            DB::beginTransaction();
            $proposal = SubmissionProposalGuest::findOrFail($request->id);

            $extention = $request->notulen->getClientOriginalExtension();
            $fileName = 'law-notulen' . '-' . date('Y-m-d') . '-' . time() . '.' . $extention;
            $path = $request->notulen->storeAs($proposal->id, $fileName, 'law_notulen_guest');

            $proposal->notulen()->create([
                'created_by' => auth()->user()->id,
                'name' => $path,
            ]);

            DB::commit();

            $data = FileNotulenGuest::where('submission_proposal_guest_id', $request->id)->get();
            return response()->json([
                'data' => $data,
                'messages' => 'Berhasil',
                'status' => 200,
            ]);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json($this->notification->updateFailed($th));
        }
    }
    function final (Request $request, $id) {
        try {
            DB::beginTransaction();
            $user = auth()->user();

            $proposal = SubmissionProposalGuest::findOrFail($id);
            $proposal->title_cooperation = $request->title_cooperation_final;
            $proposal->time_period = $request->time_period_final;
            $proposal->expired_at = Carbon::parse($proposal->created_at)->addYears($request->time_period_final);
            $proposal->save();

            foreach ($request->nomor as $key => $value) {
                $proposal->nomor()->updateOrCreate([
                    'submission_proposal_guest_id' => $id,
                ],
                ['created_by' => auth()->user()->id,
                'nomor' => $value,]);
            }
            $proposal->tracking()->where('role_id', $user->roles[1]->id)->update([
                'status' => 1,
                'approval' => 2,
            ]);

            $track = SubmissionProposalGuest::where('id', $proposal->id)->increment('status_disposition', 1);

            $users = User::whereHas('roles', function (Builder $query) {
                $query->where('id', 9);
            })->get();

            $path = 'MOUProposalSubmissionCooperationIndex';

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
    public function destroyDeputiPIC($id)
    {
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
    public function storeDeputiPIC(Request $request)
    {
        try {
            foreach ($request->data as $key => $value) {
                $deputiPIC = DeputiPICGuest::create([
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
    public function downloadProposalCooperationGuest($id)
    {
        try {
            $proposal = SubmissionProposalGuest::findOrFail($id);

            $file = $proposal->proposal;
            return response()->download(storage_path("/app/public/proposal_cooperation_guest/" . $file));
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => 'Download Gagal',
                'status' => $th->getCode(),
            ]);
        }
    }
    public function downloadAgencyProfileCooperationGuest($id)
    {
        try {
            $proposal = SubmissionProposalGuest::findOrFail($id);

            $file = $proposal->agency_profile;
            return response()->download(storage_path("/app/public/agency_profile_cooperation_guest/" . $file));
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => 'Download Gagal',
                'status' => $th->getCode(),
            ]);
        }
    }
    public function downloadKTPGuest($id)
    {
        try {
            $proposal = SubmissionProposalGuest::findOrFail($id);

            $file = $proposal->ktp;
            return response()->download(storage_path("/app/public/ktp_guest/" . $file));
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => 'Download Gagal',
                'status' => $th->getCode(),
            ]);
        }
    }
    public function downloadNPWPGuest($id)
    {
        try {
            $proposal = SubmissionProposalGuest::findOrFail($id);

            $file = $proposal->npwp;
            return response()->download(storage_path("/app/public/npwp_guest/" . $file));
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => 'Download Gagal',
                'status' => $th->getCode(),
            ]);
        }
    }
    public function downloadSIUPGuest($id)
    {
        try {
            $proposal = SubmissionProposalGuest::findOrFail($id);

            $file = $proposal->siup;
            return response()->download(storage_path("/app/public/siup_guest/" . $file));
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => 'Download Gagal',
                'status' => $th->getCode(),
            ]);
        }
    }
}
