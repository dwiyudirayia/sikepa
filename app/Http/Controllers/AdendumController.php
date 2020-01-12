<?php

namespace App\Http\Controllers;

use App\Adendum;
use App\AdendumGuest;
use App\DeputiPICAdendum;
use App\DeputiPICAdendumGuest;
use App\FileDraftAdendumGuest;
use App\FileNotulenAdendumGuest;
use App\Http\Resources\SubmissionProposalCollection;
use App\Http\Resources\SubmissionProposalGuestCollection;
use App\Mail\ApproveCooperationFinal;
use App\Mail\OfflineMeetingGuest;
use App\Mail\RejectCooperation;
use App\Notifications\DispositionNotification;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\NotificationRepositoryInterfaces;
use App\TypeOfCooperationOneDerivative;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class AdendumController extends Controller
{
    private $notification;

    public function __construct(NotificationRepositoryInterfaces $notification)
    {
        $this->notification = $notification;
    }
    public function indexMOU()
    {
        try {
            $user = auth()->user();
            $roles = collect($user['roles']);

            $mappingRole = $roles->map(function ($item, $key) {
                return $item['id'];
            });

            $idRoles = $mappingRole->all();
            if ($user->roles[0]->id <= 7 && $user->roles[0]->id >= 3) {
                $data['approval'] = new SubmissionProposalCollection(Adendum::with('deputi', 'country', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->whereHas('deputi', function (Builder $query) use ($user) {
                    $query->where('role_id', $user->roles[0]->id);
                    $query->whereNull('approval');
                })->where('status_disposition', 3)->where('status_proposal', 1)->get());
                $data['guest'] = new SubmissionProposalGuestCollection(AdendumGuest::with('deputi', 'country', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->whereHas('deputi', function (Builder $query) use ($user) {
                    $query->where('role_id', $user->roles[0]->id);
                    $query->whereNull('approval');
                })->where('status_disposition', 3)->where('status_proposal', 1)->get());
            } elseif ($user->roles[0]->id == 9) {
                $data['approval'] = new SubmissionProposalCollection(Adendum::with('country', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('status_proposal', 1)->where('status_disposition', '<', 16)->get());
                $data['guest'] = new SubmissionProposalGuestCollection(AdendumGuest::with('country', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('status_proposal', 1)->where('status_disposition', '<', 16)->get());
            } elseif ($user->roles[0]->id == 11) {
                $data['approval'] = new SubmissionProposalCollection(Adendum::with('deputi', 'country', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->whereHas('deputi', function (Builder $query) use ($user) {
                    $query->where('role_id', $user->roles[0]->id);
                    $query->whereNull('approval');
                })->where('status_disposition', 3)->where('status_proposal', 1)->orWhereIn('status_disposition', $idRoles)->get());
                $data['guest'] = new SubmissionProposalGuestCollection(AdendumGuest::with('deputi', 'country', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->whereHas('deputi', function (Builder $query) use ($user) {
                    $query->where('role_id', $user->roles[0]->id);
                    $query->whereNull('approval');
                })->where('status_disposition', 3)->where('status_proposal', 1)->orWhere(function ($query) use ($idRoles) {
                    $query->whereIn('status_disposition', $idRoles)->where('status_proposal', 1);
                })->get());
            } else {
                $data['approval'] = new SubmissionProposalCollection(Adendum::with('country', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('status_proposal', 1)->whereIn('status_disposition', $idRoles)->get());
                $data['guest'] = new SubmissionProposalGuestCollection(AdendumGuest::with('country', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('status_proposal', 1)->whereIn('status_disposition', $idRoles)->paginate(10));
            }
            $data['you'] = new SubmissionProposalCollection(Adendum::with('country', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('created_by', $user->id)->get());
            $data['type'] = TypeOfCooperationOneDerivative::all();

            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function detail($id)
    {
        try {
            dd($id);
            $data = Adendum::with('deputi.role', 'tracking.role', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo', 'country', 'province', 'regency', 'draft', 'notulen')->findOrFail($id);

            $collectDeputi = collect($data['deputi']);
            $mapDeputi = $collectDeputi->map(function ($item, $key) {
                return $item['role_id'];
            });
            $currentRoleId = $mapDeputi->all();
            $deputi = [
                0 => [
                    'id' => 3,
                    'name' => 'Deputi Bidang Partisipasi Masyarakat',
                ],
                1 => [
                    'id' => 4,
                    'name' => 'Deputi Bidang Kesetaraan Gender',
                ],
                2 => [
                    'id' => 5,
                    'name' => 'Deputi Bidang Perlindungan Anak',
                ],
                3 => [
                    'id' => 6,
                    'name' => 'Deputi Bidang Perlindungan Hak Perempuan',
                ],
                4 => [
                    'id' => 7,
                    'name' => 'Deputi Bidang Tumbuh Kembang Anak',
                ],
                5 => [
                    'id' => 11,
                    'name' => 'Sesmen',
                ],
            ];

            $data['deputi_not_in'] = array_values(collect($deputi)->whereNotIn('id', $currentRoleId)->all());


            return response()->json($this->notification->showSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->showFailed($th));
        }
    }
    public function detailGuest($id)
    {
        try {
            $data['data'] = AdendumGuest::with('deputi.role', 'tracking.role', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo', 'country', 'province', 'regency', 'draft', 'notulen')->findOrFail($id);
            $collectDeputi = collect($data['data']['deputi']);
            $mapDeputi = $collectDeputi->map(function ($item, $key) {
                return $item['role_id'];
            });
            $currentRoleId = $mapDeputi->all();
            $deputi = [
                0 => [
                    'id' => 3,
                    'name' => 'Deputi Bidang Partisipasi Masyarakat',
                ],
                1 => [
                    'id' => 4,
                    'name' => 'Deputi Bidang Kesetaraan Gender',
                ],
                2 => [
                    'id' => 5,
                    'name' => 'Deputi Bidang Perlindungan Anak',
                ],
                3 => [
                    'id' => 6,
                    'name' => 'Deputi Bidang Perlindungan Hak Perempuan',
                ],
                4 => [
                    'id' => 7,
                    'name' => 'Deputi Bidang Tumbuh Kembang Anak',
                ],
                5 => [
                    'id' => 11,
                    'name' => 'Sesmen',
                ],
            ];

            $data['deputi_not_in'] = array_values(collect($deputi)->whereNotIn('id', $currentRoleId)->all());

            return response()->json($this->notification->showSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->showFailed($th));
        }
    }
    public function continueGuest(Request $request)
    {
        try {
            DB::beginTransaction();
            $user = auth()->user();
            $proposal = AdendumGuest::with('deputi.role')->findOrFail($request->id);

            if ($proposal->status_disposition == 3) {
                $proposal->deputi()->where('role_id', $user->roles[0]->id)->update([
                    'status' => 1,
                    'approval' => 2,
                    'reason' => $request->reason,
                ]);

                $deputi = DeputiPICAdendumGuest::where('adendum_guest_id', $request->id)->get();
                $sumStatus = DeputiPICAdendumGuest::where('adendum_guest_id', $request->id)->sum('status');
                $sumApproval = DeputiPICAdendumGuest::where('adendum_guest_id', $request->id)->sum('approval');

                $countRowProposal = $deputi->count();

                if ($sumStatus == $countRowProposal) {
                    // if($sumApproval > 0) {
                    $proposal->status_disposition = 9;
                    $proposal->save();

                    $statusDisposition = $proposal->status_disposition;
                    $users = User::whereHas('roles', function (Builder $query) use ($statusDisposition) {
                        $query->where('id', $statusDisposition);
                    })->get();

                    $path = 'AdendumProposalSubmissionCooperationIndex';

                    Notification::send($users, new DispositionNotification(auth()->user(), $path, $proposal));

                    //     Mail::to($proposal->email)->send(new ApproveCooperation);
                    // } else {
                    //     $proposal->status_proposal = 0;
                    //     $proposal->save();

                    //     Mail::to($proposal->email)->send(new RejectCooperation);
                    // }
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

                $track = AdendumGuest::where('id', $request->id)->increment('status_disposition', 1);
                $users = User::whereHas('roles', function (Builder $query) use ($currentRoleId) {
                    $query->whereIn('id', $currentRoleId);
                })->get();

                $path = 'AdendumProposalSubmissionCooperationIndex';

                Notification::send($users, new DispositionNotification(auth()->user(), $path, $proposal));
                // Mail::to($proposal->email)->send(new ApproveCooperation);
            } elseif ($proposal->status_disposition == 11) {
                $proposal->tracking()->where('role_id', $user->roles[0]->id)->update([
                    'status' => 1,
                    'approval' => 2,
                    'reason' => $request->reason,
                ]);

                $track = AdendumGuest::where('id', $request->id)->increment('status_disposition', 1);
                $statusDisposition = $proposal->status_disposition + 1;
                $users = User::whereHas('roles', function (Builder $query) use ($statusDisposition) {
                    $query->where('id', $statusDisposition);
                })->get();

                $path = 'AdendumProposalSubmissionCooperationIndex';

                Notification::send($users, new DispositionNotification(auth()->user(), $path, $proposal));
                Mail::to(auth()->user()->email)->send(new OfflineMeetingGuest($request->keterangan_pesan));
            } else {
                $proposal->tracking()->where('role_id', $user->roles[0]->id)->update([
                    'status' => 1,
                    'approval' => 2,
                    'reason' => $request->reason,
                ]);

                $track = AdendumGuest::where('id', $request->id)->increment('status_disposition', 1);
                $statusDisposition = $proposal->status_disposition + 1;
                $users = User::whereHas('roles', function (Builder $query) use ($statusDisposition) {
                    $query->where('id', $statusDisposition);
                })->get();

                $path = 'AdendumProposalSubmissionCooperationIndex';

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
    public function continue(Request $request)
    {
        try {
            DB::beginTransaction();
            $user = auth()->user();
            $proposal = Adendum::with('deputi.role')->findOrFail($request->id);

            if ($proposal->status_disposition == 3) {
                $proposal->deputi()->where('role_id', $user->roles[0]->id)->update([
                    'status' => 1,
                    'approval' => 2,
                    'reason' => $request->reason,
                ]);

                $deputi = DeputiPICAdendum::where('adendum_id', $request->id)->get();
                $sumStatus = DeputiPICAdendum::where('adendum_id', $request->id)->sum('status');
                $sumApproval = DeputiPICAdendum::where('adendum_id', $request->id)->sum('approval');

                $countRowProposal = $deputi->count();

                if ($sumStatus == $countRowProposal) {
                    // if($sumApproval > 0) {
                    $proposal->status_disposition = 9;
                    $proposal->save();

                    $statusDisposition = $proposal->status_disposition;
                    $users = User::whereHas('roles', function (Builder $query) use ($statusDisposition) {
                        $query->where('id', $statusDisposition);
                    })->get();

                    $path = 'AdendumProposalSubmissionCooperationIndex';

                    Notification::send($users, new DispositionNotification(auth()->user(), $path, $proposal));

                    //     Mail::to($proposal->email)->send(new ApproveCooperation);
                    // } else {
                    //     $proposal->status_proposal = 0;
                    //     $proposal->save();

                    //     Mail::to($proposal->email)->send(new RejectCooperation);
                    // }
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

                $track = Adendum::where('id', $request->id)->increment('status_disposition', 1);
                $users = User::whereHas('roles', function (Builder $query) use ($currentRoleId) {
                    $query->whereIn('id', $currentRoleId);
                })->get();

                $path = 'AdendumProposalSubmissionCooperationIndex';

                Notification::send($users, new DispositionNotification(auth()->user(), $path, $proposal));
                // Mail::to($proposal->email)->send(new ApproveCooperation);
            } elseif ($proposal->status_disposition == 11) {
                $proposal->tracking()->where('role_id', $user->roles[0]->id)->update([
                    'status' => 1,
                    'approval' => 2,
                    'reason' => $request->reason,
                ]);

                $track = Adendum::where('id', $request->id)->increment('status_disposition', 1);
                $statusDisposition = $proposal->status_disposition + 1;
                $users = User::whereHas('roles', function (Builder $query) use ($statusDisposition) {
                    $query->where('id', $statusDisposition);
                })->get();

                $path = 'AdendumProposalSubmissionCooperationIndex';

                Notification::send($users, new DispositionNotification(auth()->user(), $path, $proposal));
                Mail::to(auth()->user()->email)->send(new OfflineMeetingGuest($request->keterangan_pesan));
            } else {
                $proposal->tracking()->where('role_id', $user->roles[0]->id)->update([
                    'status' => 1,
                    'approval' => 2,
                    'reason' => $request->reason,
                ]);

                $track = Adendum::where('id', $request->id)->increment('status_disposition', 1);
                $statusDisposition = $proposal->status_disposition + 1;
                $users = User::whereHas('roles', function (Builder $query) use ($statusDisposition) {
                    $query->where('id', $statusDisposition);
                })->get();

                $path = 'AdendumProposalSubmissionCooperationIndex';

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
    public function downloadProposalCooperationGuest($id)
    {
        try {
            $proposal = AdendumGuest::findOrFail($id);

            $file = $proposal->proposal;
            return response()->download(storage_path("/app/public/proposal_cooperation_guest_adendum/" . $file));
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
            $proposal = AdendumGuest::findOrFail($id);

            $file = $proposal->agency_profile;
            return response()->download(storage_path("/app/public/agency_profile_cooperation_guest_adendum/" . $file));
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
            $proposal = AdendumGuest::findOrFail($id);

            $file = $proposal->ktp;
            return response()->download(storage_path("/app/public/ktp_guest_adendum/" . $file));
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
            $proposal = AdendumGuest::findOrFail($id);

            $file = $proposal->npwp;
            return response()->download(storage_path("/app/public/npwp_guest_adendum/" . $file));
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
            $proposal = AdendumGuest::findOrFail($id);

            $file = $proposal->siup;
            return response()->download(storage_path("/app/public/siup_guest_adendum/" . $file));
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => 'Download Gagal',
                'status' => $th->getCode(),
            ]);
        }
    }
    public function destroyDeputiPICGuest($id)
    {
        try {
            $deputi = DeputiPICAdendumGuest::findOrFail($id);
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
    public function storeDeputiPICGuest(Request $request)
    {
        try {
            foreach ($request->data as $key => $value) {
                $deputiPIC = DeputiPICAdendumGuest::updateOrCreate([
                    'role_id' => $value,
                    'adendum_guest_id' => $request->id,
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
    public function approveGuest(Request $request)
    {
        try {
            DB::beginTransaction();
            $user = auth()->user();
            $proposal = AdendumGuest::with('deputi.role')->findOrFail($request->id);
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

                $track = AdendumGuest::where('id', $request->id)->increment('status_disposition', 1);

                $statusDisposition = $proposal->status_disposition + 1;

                $users = User::whereHas('roles', function (Builder $query) use ($statusDisposition) {
                    $query->where('id', $statusDisposition);
                })->get();

                $path = 'AdendumProposalSubmissionCooperationIndex';

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
    public function rejectGuest(Request $request)
    {
        try {
            DB::beginTransaction();
            $user = auth()->user();

            $proposal = AdendumGuest::findOrFail($request->id);
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

                AdendumGuest::where('id', $request->id)->update([
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
    public function approve(Request $request)
    {
        try {
            DB::beginTransaction();
            $user = auth()->user();
            $proposal = Adendum::with('deputi.role')->findOrFail($request->id);
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

                $track = Adendum::where('id', $request->id)->increment('status_disposition', 1);

                $statusDisposition = $proposal->status_disposition + 1;

                $users = User::whereHas('roles', function (Builder $query) use ($statusDisposition) {
                    $query->where('id', $statusDisposition);
                })->get();

                $path = 'AdendumProposalSubmissionCooperationIndex';

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

            $proposal = Adendum::findOrFail($request->id);
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

                Adendum::where('id', $request->id)->update([
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
            $proposal = Adendum::findOrFail($id);
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

            $path = 'AdendumProposalSubmissionCooperationIndex';

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
    public function lawGuest(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $proposal = AdendumGuest::findOrFail($id);
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

            $path = 'AdendumProposalSubmissionCooperationIndex';

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
    public function finalGuest(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $user = auth()->user();

            $proposal = AdendumGuest::findOrFail($id);
            $proposal->title_cooperation = $request->title_cooperation_final;
            $proposal->time_period = $request->time_period_final;
            $proposal->save();

            foreach ($request->nomor as $key => $value) {
                $proposal->nomor()->updateOrCreate([
                    'created_by' => auth()->user()->id,
                    'nomor' => $value,
                ]);
            }
            $proposal->tracking()->where('role_id', $user->roles[1]->id)->update([
                'status' => 1,
                'approval' => 2,
            ]);

            $track = AdendumGuest::where('id', $proposal->id)->increment('status_disposition', 1);

            $users = User::whereHas('roles', function (Builder $query) {
                $query->where('id', 9);
            })->get();

            $path = 'AdendumProposalSubmissionCooperationIndex';

            DB::commit();
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
    public function fileNotulenMOUGuest($id)
    {
        try {
            $proposal = FileNotulenAdendumGuest::findOrFail($id);

            $draft = $proposal->name;
            return response()->download(storage_path("/app/public/law_notulen_guest_adendum/" . $draft));
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => 'Download Gagal',
                'status' => $th->getCode(),
            ]);
        }
    }
    public function fileDraftMOUGuest($id)
    {
        try {
            $proposal = FileDraftAdendumGuest::findOrFail($id);

            $draft = $proposal->name;
            return response()->download(storage_path("/app/public/law_draft_guest_adendum/" . $draft));
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => 'Download Gagal',
                'status' => $th->getCode(),
            ]);
        }
    }
    public function storeDraftGuest(Request $request)
    {
        try {
            DB::beginTransaction();
            $proposal = AdendumGuest::findOrFail($request->id);

            $extention = $request->draft->getClientOriginalExtension();
            $fileName = 'law-draft' . '-' . date('Y-m-d') . '-' . time() . '.' . $extention;
            $path = $request->draft->storeAs($proposal->id, $fileName, 'law_draft_guest_adendum');

            $proposal->draft()->create([
                'created_by' => auth()->user()->id,
                'name' => $path,
            ]);

            DB::commit();

            $data = FileDraftAdendumGuest::where('submission_proposal_guest_id', $request->id)->get();

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
    public function storeNotulenGuest(Request $request)
    {
        try {
            DB::beginTransaction();
            $proposal = AdendumGuest::findOrFail($request->id);

            $extention = $request->notulen->getClientOriginalExtension();
            $fileName = 'law-notulen' . '-' . date('Y-m-d') . '-' . time() . '.' . $extention;
            $path = $request->notulen->storeAs($proposal->id, $fileName, 'law_notulen_guest_adendum');

            $proposal->notulen()->create([
                'created_by' => auth()->user()->id,
                'name' => $path,
            ]);

            DB::commit();

            $data = FileNotulenAdendumGuest::where('submission_proposal_guest_id', $request->id)->get();
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
}
