<?php

namespace App\Http\Controllers;

use App\Adendum;
use App\AdendumGuest;
use App\Agency;
use App\Country;
use App\DeputiPIC;
use App\Extension;
use App\FileDraft;
use App\FileNotulen;
use App\Http\Requests\StoreSubmissionProposalRequest;
use App\Http\Resources\SubmissionProposalCollection;
use App\Http\Resources\SubmissionProposalGuestCollection;
use App\Mail\OfflineMeeting;
use App\Mail\RejectCooperation;
use App\Notifications\DispositionNotification;
use App\Notifications\SatkerSesmenFinalNotification;
use App\Notifications\SatkerSesmenNotification;
use App\Province;
use App\Regency;
use App\Repositories\Interfaces\NotificationRepositoryInterfaces;
use App\SubmissionProposal;
use App\SubmissionProposalGuest;
use App\TypeOfCooperationOneDerivative;
use App\TypeOfCooperationTwoDerivative;
use App\User;
use DB;
// use App\Mail\SubmissionCooperationApprove;
// use App\Mail\SubmissionCooperationReject;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class SubmissionProposalController extends Controller
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
                $data['approval'] = new SubmissionProposalCollection(SubmissionProposal::with('deputi', 'country', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->whereHas('deputi', function (Builder $query) use ($user) {
                    $query->where('role_id', $user->roles[0]->id);
                    $query->whereNull('approval');
                })->where('status_disposition', 3)->where('status_proposal', 1)->get());
                $data['guest'] = new SubmissionProposalGuestCollection(SubmissionProposalGuest::with('deputi', 'country', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->whereHas('deputi', function (Builder $query) use ($user) {
                    $query->where('role_id', $user->roles[0]->id);
                    $query->whereNull('approval');
                })->where('status_disposition', 3)->where('status_proposal', 1)->get());
            } elseif ($user->roles[0]->id == 9) {
                $data['approval'] = new SubmissionProposalCollection(SubmissionProposal::with('country', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('status_proposal', 1)->where('status_disposition', '<', 16)->get());
                $data['guest'] = new SubmissionProposalGuestCollection(SubmissionProposalGuest::with('country', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('status_proposal', 1)->where('status_disposition', '<', 16)->get());
            } elseif ($user->roles[0]->id == 11) {
                $data['approval'] = new SubmissionProposalCollection(SubmissionProposal::with('deputi', 'country', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->whereHas('deputi', function (Builder $query) use ($user) {
                    $query->where('role_id', $user->roles[0]->id);
                    $query->whereNull('approval');
                })->where('status_disposition', 3)->where('status_proposal', 1)->orWhereIn('status_disposition', $idRoles)->get());
                $data['guest'] = new SubmissionProposalGuestCollection(SubmissionProposalGuest::with('deputi', 'country', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->whereHas('deputi', function (Builder $query) use ($user) {
                    $query->where('role_id', $user->roles[0]->id);
                    $query->whereNull('approval');
                })->where('status_disposition', 3)->where('status_proposal', 1)->orWhere(function ($query) use ($idRoles) {
                    $query->whereIn('status_disposition', $idRoles)->where('status_proposal', 1);
                })->get());
            } else {
                $data['approval'] = new SubmissionProposalCollection(SubmissionProposal::with('country', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('status_proposal', 1)->whereIn('status_disposition', $idRoles)->get());
                $data['guest'] = new SubmissionProposalGuestCollection(SubmissionProposalGuest::with('country', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('status_proposal', 1)->whereIn('status_disposition', $idRoles)->paginate(10));
            }
            $data['you'] = new SubmissionProposalCollection(SubmissionProposal::with('country', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('created_by', $user->id)->get());
            $data['type'] = TypeOfCooperationOneDerivative::all();

            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    // public function indexPKS() {
    //     try {
    //         $user = auth()->user();
    //         $roles = collect($user['roles']);

    //         $mappingRole = $roles->map(function($item, $key) {
    //             return $item['id'];
    //         });

    //         $idRoles = $mappingRole->all();

    //         if($user->roles[0]->id <= 7 && $user->roles[0]->id >= 3) {
    //             $data['approval'] = SubmissionProposal::with('deputi','country','agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->whereHas('deputi', function(Builder $query) use ($user) {
    //                 $query->where('role_id', $user->roles[0]->id);
    //                 $query->whereNull('approval');
    //             })->where('type_id', 1)->where('status_disposition', 3)->where('status_proposal', 1)->get();
    //             $data['guest'] = SubmissionProposalGuest::with('deputi','country','agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->whereHas('deputi', function(Builder $query) use ($user) {
    //                 $query->where('role_id', $user->roles[0]->id);
    //                 $query->whereNull('approval');
    //             })->where('type_guest_id', 1)->where('status_disposition', 3)->where('status_proposal', 1)->get();
    //         } elseif($user->roles[0]->id == 9) {
    //             $data['approval'] = SubmissionProposal::with('country','agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('type_id', 1)->where('status_proposal', 1)->where('status_disposition', '<', 17)->get();
    //             $data['guest'] = SubmissionProposalGuest::with('country','agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('type_guest_id', 1)->where('status_proposal', 1)->get();
    //         } else {
    //             $data['approval'] = SubmissionProposal::with('country','agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('type_id', 1)->where('status_proposal', 1)->where('status_disposition', '<', 17)->whereIn('status_disposition', $idRoles)->get();
    //             $data['guest'] = SubmissionProposalGuest::with('country','agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('type_guest_id', 1)->where('status_proposal', 1)->whereIn('status_disposition', $idRoles)->get();

    //         }

    //         $data['you'] = SubmissionProposal::with('country','agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('type_id', 1)->where('created_by', $user->id)->get();
    //         $data['type'] = SubmissionType::all();

    //     return response()->json($this->notification->generalSuccess($data));
    //     } catch (\Throwable $th) {
    //         return response()->json($this->notification->generalFailed($th));
    //     }
    // }
    public function destroyDeputiPIC($id)
    {
        try {
            $deputi = DeputiPIC::findOrFail($id);
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
                $deputiPIC = DeputiPIC::updateOrCreate([
                    'role_id' => $value,
                    'submission_proposal_id' => $request->id,
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
    public function create()
    {
        try {
            $data['agencies'] = Agency::all();
            $data['type_two'] = TypeOfCooperationOneDerivative::all();
            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function store(StoreSubmissionProposalRequest $request)
    {
        try {
            DB::beginTransaction();
            if($request->type_of_cooperation_two_derivative_id == 3) {
                $proposal = Extension::create($request->storeExtension());
            } elseif ($request->type_of_cooperation_two_derivative_id == 4) {
                $proposal = Adendum::create($request->storeAdendum());
            } else {
                $proposal = SubmissionProposal::create($request->storeMOU());
            }

            foreach ($request->deputi as $key => $value) {
                $proposal->deputi()->create([
                    'role_id' => $value,
                ]);
            }

            $userKPPA = [9, 10, 11, 12, 13, 14, 15];
            foreach ($userKPPA as $key => $value) {
                $proposal->tracking()->create([
                    'role_id' => $value,
                ]);
            }

            DB::commit();

            $deputi = $request->deputi;
            $users = User::whereHas('roles', function (Builder $query) use ($deputi) {
                $query->whereIn('id', $deputi);
            })->get();

            $path = 'MOUProposalSubmissionCooperationIndex';

            Notification::send($users, new SatkerSesmenNotification(auth()->user(), $path));
            return response()->json([
                'messages' => 'Data Berhasil di Simpan',
                'status' => 200,
            ]);
        } catch (\Throwable $th) {
            dd($th);
            DB::rollback();
            return response()->json($this->notification->storeFailed($th));
        }
    }
    public function changeSelectTwoDerivative($id)
    {
        try {
            if ($id == 1) {
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
    public function getRegecies($id)
    {
        try {
            $data = Regency::where('province_id', $id)->get();
            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function detail($id)
    {
        try {
            $data = SubmissionProposal::with('nomor', 'deputi.role', 'tracking.role', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo', 'country', 'province', 'regency', 'draft', 'notulen')->findOrFail($id);

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
            $data['data'] = SubmissionProposalGuest::with('nomor', 'deputi.role', 'tracking.role', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo', 'country', 'province', 'regency', 'draft', 'notulen')->findOrFail($id);
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
    public function detailPKS($id)
    {
        try {
            $data = SubmissionProposal::with('tracking', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo', 'country', 'province', 'regency')->findOrFail($id);
            return response()->json($this->notification->showSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->showFailed($th));
        }
    }
    function continue (Request $request) {
        try {
            DB::beginTransaction();
            $user = auth()->user();
            $proposal = SubmissionProposal::with('deputi.role')->findOrFail($request->id);

            if ($proposal->status_disposition == 3) {
                $proposal->deputi()->where('role_id', $user->roles[0]->id)->update([
                    'status' => 1,
                    'approval' => 2,
                    'reason' => $request->reason,
                ]);

                $deputi = DeputiPIC::where('submission_proposal_id', $request->id)->get();
                $sumStatus = DeputiPIC::where('submission_proposal_id', $request->id)->sum('status');
                $sumApproval = DeputiPIC::where('submission_proposal_id', $request->id)->sum('approval');

                $countRowProposal = $deputi->count();

                if ($sumStatus == $countRowProposal) {
                    // if($sumApproval > 0) {
                    $proposal->status_disposition = 9;
                    $proposal->save();

                    $statusDisposition = $proposal->status_disposition;
                    $users = User::whereHas('roles', function (Builder $query) use ($statusDisposition) {
                        $query->where('id', $statusDisposition);
                    })->get();

                    $path = 'MOUProposalSubmissionCooperationIndex';

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

                $track = SubmissionProposal::where('id', $request->id)->increment('status_disposition', 1);
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

                $track = SubmissionProposal::where('id', $request->id)->increment('status_disposition', 1);
                $statusDisposition = $proposal->status_disposition + 1;
                $users = User::whereHas('roles', function (Builder $query) use ($statusDisposition) {
                    $query->where('id', $statusDisposition);
                })->get();

                $path = 'MOUProposalSubmissionCooperationIndex';

                Notification::send($users, new DispositionNotification(auth()->user(), $path, $proposal));
                Mail::to(auth()->user()->email)->send(new OfflineMeeting($request->keterangan_pesan));
            } else {
                $proposal->tracking()->where('role_id', $user->roles[0]->id)->update([
                    'status' => 1,
                    'approval' => 2,
                    'reason' => $request->reason,
                ]);

                $track = SubmissionProposal::where('id', $request->id)->increment('status_disposition', 1);
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
            $proposal = SubmissionProposal::with('deputi.role')->findOrFail($request->id);
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

                $track = SubmissionProposal::where('id', $request->id)->increment('status_disposition', 1);

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

            $proposal = SubmissionProposal::findOrFail($request->id);
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

                SubmissionProposal::where('id', $request->id)->update([
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
            $proposal = SubmissionProposal::findOrFail($id);
            $user = auth()->user();

            if ($request->hasFile('notulen')) {
                $extention = $request->notulen->getClientOriginalExtension();
                $fileName = 'law-notulen' . '-' . date('Y-m-d') . '-' . time() . '.' . $extention;
                $path = $request->notulen->storeAs($proposal->id, $fileName, 'law_notulen');

                $proposal->notulen()->create([
                    'created_by' => auth()->user()->id,
                    'name' => $path,
                ]);
            }

            if ($request->hasFile('draft')) {
                $extention = $request->draft->getClientOriginalExtension();
                $fileName = 'law-draft' . '-' . date('Y-m-d') . '-' . time() . '.' . $extention;
                $path = $request->draft->storeAs($proposal->id, $fileName, 'law_draft');

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
                'messages' => 'Data Berhasil diperbaharui',
            ]);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'messages' => 'Data Gagal diperbaharui',
                'status' => $th->getCode(),
            ]);
        }
    }
    function final (Request $request, $id) {
        // dd($request->all());
        try {
            DB::beginTransaction();
            $user = auth()->user();

            $proposal = SubmissionProposal::findOrFail($id);
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

            $track = SubmissionProposal::where('id', $proposal->id)->increment('status_disposition', 1);

            Notification::send($proposal->created_by, new SatkerSesmenFinalNotification);

            $data = [];

            DB::commit();
            return response()->json($this->notification->updateSuccess($data));
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json($this->notification->updateFailed($th));
        }
    }
    public function successMOU() {
        try {
            $data = SubmissionProposal::where('status_proposal', 1)->where('status_disposition', 16)->where('type_of_cooperation_one_derivative_id', 2)->where('type_of_cooperation_two_derivative_id', 2)->get();

            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function proposalApproveMOU()
    {
        try {
            $data['you'] = SubmissionProposal::with('tracking', 'country', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('status_proposal', 1)->where('status_disposition', 16)->where('created_by', auth()->user()->id)->get();
            $data['satker'] = SubmissionProposal::with('tracking', 'country', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('status_proposal', 1)->where('status_disposition', 16)->get();
            $data['guest'] = SubmissionProposalGuest::with('tracking', 'country', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('status_proposal', 1)->where('status_disposition', 16)->get();
            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function proposalRejectMOU()
    {
        try {
            $data['you'] = SubmissionProposal::with('tracking', 'country', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('status_proposal', 0)->where('created_by', auth()->user()->id)->get();
            $data['satker'] = SubmissionProposal::with('tracking', 'country', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('status_proposal', 0)->get();
            $data['guest'] = SubmissionProposalGuest::with('tracking', 'country', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('status_proposal', 0)->get();

            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function proposalApprovePKS()
    {
        try {
            $data['satker'] = SubmissionProposal::with('tracking', 'country', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('type_id', 1)->where('status_proposal', 1)->where('status_disposition', 17)->get();

            $data['guest'] = SubmissionProposalGuest::with('tracking', 'country', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('type_guest_id', 1)->where('status_proposal', 1)->where('status_disposition', 17)->get();

            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function proposalRejectPKS()
    {
        try {
            $data['satker'] = SubmissionProposal::with('tracking', 'country', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('type_id', 1)->where('status_proposal', 0)->get();
            $data['guest'] = SubmissionProposalGuest::with('tracking', 'country', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('type_guest_id', 1)->where('status_proposal', 0)->get();

            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function fileNotulenMOU($id)
    {
        try {
            $proposal = FileNotulen::findOrFail($id);

            $draft = $proposal->name;
            return response()->download(storage_path("/app/public/law_notulen/" . $draft));
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => 'Download Gagal',
                'status' => $th->getCode(),
            ]);
        }
    }
    public function fileDraftMOU($id)
    {
        try {
            $proposal = FileDraft::findOrFail($id);

            $draft = $proposal->name;
            return response()->download(storage_path("/app/public/law_draft/" . $draft));
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => 'Download Gagal',
                'status' => $th->getCode(),
            ]);
        }
    }
    public function storeDraft(Request $request)
    {
        try {
            DB::beginTransaction();
            $proposal = SubmissionProposal::findOrFail($request->id);

            $extention = $request->draft->getClientOriginalExtension();
            $fileName = 'law-draft' . '-' . date('Y-m-d') . '-' . time() . '.' . $extention;
            $path = $request->draft->storeAs($proposal->id, $fileName, 'law_draft_guest');

            $proposal->draft()->create([
                'created_by' => auth()->user()->id,
                'name' => $path,
            ]);

            DB::commit();

            $data = FileDraft::where('submission_proposal_guest_id', $request->id)->get();

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
            $proposal = SubmissionProposal::findOrFail($request->id);

            $extention = $request->notulen->getClientOriginalExtension();
            $fileName = 'law-notulen' . '-' . date('Y-m-d') . '-' . time() . '.' . $extention;
            $path = $request->notulen->storeAs($proposal->id, $fileName, 'law_notulen_guest');

            $proposal->notulen()->create([
                'created_by' => auth()->user()->id,
                'name' => $path,
            ]);

            DB::commit();

            $data = FileNotulen::where('submission_proposal_guest_id', $request->id)->get();
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
    public function downloadDraftMOUSuccess($id)
    {
        try {
            $data = FileDraft::where('submission_proposal_id', $id)->get();

            $lastData = $data->last();

            return response()->download(storage_path("/app/public/law_draft/" . $lastData->name));
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => $th->getMessage(),
                'status' => $th->getCode(),
            ]);
        }
    }
    public function downloadAgencyProfile($id)
    {
        try {
            $proposal = SubmissionProposal::findOrFail($id);

            $file = $proposal->agency_profile;
            return response()->download(storage_path("/app/public/agency_profile_cooperation/" . $file));
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => 'Download Gagal',
                'status' => $th->getCode(),
            ]);
        }
    }
    public function downloadProposal($id)
    {
        try {
            $proposal = SubmissionProposal::findOrFail($id);

            $file = $proposal->proposal;
            return response()->download(storage_path("/app/public/proposal_cooperation/" . $file));
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => 'Download Gagal',
                'status' => $th->getCode(),
            ]);
        }
    }
    // public function type($id) {
    //     try {
    //         $data = TypeOfCooperation::where('submission_type_id', $id)->where('name', '!=', 'Permohonan Bantuan Dana')->get();

    //         return response()->json([
    //             'data' => $data,
    //             'messages' => 'Data Berhasil di Ambil'
    //         ]);
    //     } catch (\Throwable $th) {
    //         return response()->json([
    //             'messages' => $th->getMessage(),
    //             'status' => $th->getCode(),
    //         ]);
    //     }
    // }
    // public function typeOne($id) {
    //     try {
    //         $data = TypeOfCooperationOneDerivative::where('type_of_cooperation_id', $id)->get();

    //         return response()->json([
    //             'data' => $data,
    //             'messages' => 'Data Berhasil di Ambil'
    //         ]);
    //     } catch (\Throwable $th) {
    //         return response()->json([
    //             'messages' => $th->getMessage(),
    //             'status' => $th->getCode(),
    //         ]);
    //     }
    // }
    public function typeTwo($id)
    {
        try {
            if ($id == 1) {
                $data['country'] = Country::where('id', '!=', '102')->get();
            } else {
                $data['country'] = Country::where('id', '102')->get();
                $data['province'] = Province::all();
            }

            $data['type'] = TypeOfCooperationTwoDerivative::where('type_of_cooperation_one_derivative_id', $id)->get();

            return response()->json([
                'data' => $data,
                'messages' => 'Data Berhasil di Ambil',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => $th->getMessage(),
                'status' => $th->getCode(),
            ]);
        }
    }
    public function province($id)
    {
        try {
            if ($id == 102) {
                $data = Province::all();
            } else {
                $data = [];
            }

            return response()->json([
                'data' => $data,
                'messages' => 'Data Berhasil di Ambil',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => $th->getMessage(),
                'status' => $th->getCode(),
            ]);
        }
    }
    public function regency($id)
    {
        try {
            $data = Regency::where('province_id', $id)->get();

            return response()->json([
                'data' => $data,
                'messages' => 'Data Berhasil di Ambil',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => $th->getMessage(),
                'status' => $th->getCode(),
            ]);
        }
    }
    public function filterSatkerSesmenApprovalMOU(Request $request)
    {
        try {
            $user = auth()->user();
            $roles = collect($user['roles']);

            $mappingRole = $roles->map(function ($item, $key) {
                return $item['id'];
            });

            $idRoles = $mappingRole->all();
            $data['guest'] = SubmissionProposal::query();
            if ($user->roles[0]->id <= 7 && $user->roles[0]->id >= 3) {
                if ($request->q != null) {
                    $data['guest']->with('deputi', 'country', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->whereHas('deputi', function (Builder $query) use ($user) {
                        $query->where('role_id', $user->roles[0]->id);
                        $query->whereNull('approval');
                    })->where('status_disposition', 3)->where('status_proposal', 1)->where('title_cooperation', 'LIKE', '%' . $request->q);
                }

                if ($request->type_one != null) {
                    $data['guest']->with('deputi', 'country', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->whereHas('deputi', function (Builder $query) use ($user) {
                        $query->where('role_id', $user->roles[0]->id);
                        $query->whereNull('approval');
                    })->where('status_disposition', 3)->where('status_proposal', 1)->where('type_of_cooperation_one_derivative_id', $request->type_one);
                }
            } elseif ($user->roles[0]->id == 9) {
                if ($request->q != null) {
                    $data['guest']->with('deputi', 'country', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('status_proposal', 1)->where('title_cooperation', 'LIKE', '%' . $request->q);
                }

                if ($request->type_one != null) {
                    $data['guest']->with('deputi', 'country', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('status_proposal', 1)->where('type_of_cooperation_one_derivative_id', $request->type_one);
                }
            } elseif ($user->roles[0]->id == 11) {
                if ($request->q != null) {
                    $data['guest']->with('deputi', 'country', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->whereIn('status_disposition', 3)->where('status_proposal', 1)->where('title_cooperation', 'LIKE', '%' . $request->q)->orWhere('status_disposition', $user->roles[0]->id);
                }

                if ($request->type_one != null) {
                    $data['guest']->with('deputi', 'country', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->whereIn('status_disposition', $idRoles)->where('status_proposal', 1)->where('type_of_cooperation_one_derivative_id', $request->type_one)->orWhere('status_disposition', $user->roles[0]->id);
                }
            } else {
                if ($request->q != null) {
                    $data['guest']->with('deputi', 'country', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->whereIn('status_disposition', $idRoles)->where('status_proposal', 1)->where('title_cooperation', 'LIKE', '%' . $request->q);
                }

                if ($request->type_one != null) {
                    $data['guest']->with('deputi', 'country', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->whereIn('status_disposition', $idRoles)->where('status_proposal', 1)->where('type_of_cooperation_one_derivative_id', $request->type_one);
                }
            }
            $result['guest'] = new SubmissionProposalCollection($data['guest']->get());
            return response()->json($this->notification->generalSuccess($result));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function filterSatkerSesmenYouMOU(Request $request)
    {
        try {
            $user = auth()->user();
            $data['you'] = SubmissionProposal::query();
            if ($request->q != null) {
                $data['you']->with('country', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('created_by', $user->id)->where('type_of_cooperation_one_derivative_id', $request->type_one)->where('title_cooperation', 'LIKE', '%' . $request->q);
            }
            if ($request->type_one != null) {
                $data['you']->with('country', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('created_by', $user->id)->where('type_of_cooperation_one_derivative_id', $request->type_one)->where('type_of_cooperation_one_derivative_id', $request->type_one);
            }

            $result['you'] = new SubmissionProposalCollection($data['you']->get());
            return response()->json($this->notification->generalSuccess($result));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function filterGuestMOU(Request $request)
    {
        try {
            $user = auth()->user();
            $roles = collect($user['roles']);

            $mappingRole = $roles->map(function ($item, $key) {
                return $item['id'];
            });

            $idRoles = $mappingRole->all();
            $data['guest'] = SubmissionProposalGuest::query();
            if ($user->roles[0]->id <= 7 && $user->roles[0]->id >= 3) {
                if ($request->q != null) {
                    $data['guest']->with('deputi', 'country', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->whereHas('deputi', function (Builder $query) use ($user) {
                        $query->where('role_id', $user->roles[0]->id);
                        $query->whereNull('approval');
                    })->where('status_disposition', 3)->where('status_proposal', 1)->where('title_cooperation', 'LIKE', '%' . $request->q);
                }

                if ($request->type_one != null) {
                    $data['guest']->with('deputi', 'country', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->whereHas('deputi', function (Builder $query) use ($user) {
                        $query->where('role_id', $user->roles[0]->id);
                        $query->whereNull('approval');
                    })->where('status_disposition', 3)->where('status_proposal', 1)->where('type_of_cooperation_one_derivative_id', $request->type_one);
                }
            } elseif ($user->roles[0]->id == 9) {
                if ($request->q != null) {
                    $data['guest']->with('deputi', 'country', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('status_proposal', 1)->where('title_cooperation', 'LIKE', '%' . $request->q);
                }

                if ($request->type_one != null) {
                    $data['guest']->with('deputi', 'country', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('status_proposal', 1)->where('type_of_cooperation_one_derivative_id', $request->type_one);
                }
            } elseif ($user->roles[0]->id == 11) {
                if ($request->q != null) {
                    $data['guest']->with('deputi', 'country', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->whereIn('status_disposition', 3)->where('status_proposal', 1)->where('title_cooperation', 'LIKE', '%' . $request->q)->orWhere('status_disposition', $user->roles[0]->id);
                }

                if ($request->type_one != null) {
                    $data['guest']->with('deputi', 'country', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->whereIn('status_disposition', $idRoles)->where('status_proposal', 1)->where('type_of_cooperation_one_derivative_id', $request->type_one)->orWhere('status_disposition', $user->roles[0]->id);
                }
            } else {
                if ($request->q != null) {
                    $data['guest']->with('deputi', 'country', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->whereIn('status_disposition', $idRoles)->where('status_proposal', 1)->where('title_cooperation', 'LIKE', '%' . $request->q);
                }

                if ($request->type_one != null) {
                    $data['guest']->with('deputi', 'country', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->whereIn('status_disposition', $idRoles)->where('status_proposal', 1)->where('type_of_cooperation_one_derivative_id', $request->type_one);
                }
            }
            $result['guest'] = new SubmissionProposalGuestCollection($data['guest']->get());
            return response()->json($this->notification->generalSuccess($result));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function resetSatkerSesmenApprovalMOU(Request $request)
    {
        try {
            $user = auth()->user();
            $roles = collect($user['roles']);

            $mappingRole = $roles->map(function ($item, $key) {
                return $item['id'];
            });

            $idRoles = $mappingRole->all();
            if ($user->roles[0]->id <= 7 && $user->roles[0]->id >= 3) {
                $data['approval'] = new SubmissionProposalCollection(SubmissionProposal::with('deputi', 'country', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->whereHas('deputi', function (Builder $query) use ($user) {
                    $query->where('role_id', $user->roles[0]->id);
                    $query->whereNull('approval');
                })->where('status_disposition', 3)->where('status_proposal', 1)->get());
            } else {
                $data['approval'] = new SubmissionProposalCollection(SubmissionProposal::with('country', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('status_proposal', 1)->whereIn('status_disposition', $idRoles)->get());
            }
            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function resetSatkerSesmenYouMOU(Request $request)
    {
        try {
            $user = auth()->user();
            $data['you'] = new SubmissionProposalCollection(SubmissionProposal::with('country', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('created_by', $user->id)->get());

            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function resetGuestMOU(Request $request)
    {
        try {
            $user = auth()->user();
            $roles = collect($user['roles']);

            $mappingRole = $roles->map(function ($item, $key) {
                return $item['id'];
            });

            $idRoles = $mappingRole->all();
            if ($user->roles[0]->id <= 7 && $user->roles[0]->id >= 3) {
                $data['guest'] = new SubmissionProposalGuestCollection(SubmissionProposalGuest::with('deputi', 'country', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->whereHas('deputi', function (Builder $query) use ($user) {
                    $query->where('role_id', $user->roles[0]->id);
                    $query->whereNull('approval');
                })->where('status_disposition', 3)->where('status_proposal', 1)->get());
            } else {
                $data['guest'] = new SubmissionProposalGuestCollection(SubmissionProposalGuest::with('country', 'agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('status_proposal', 1)->whereIn('status_disposition', $idRoles)->get());
            }

            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    // public function filterSatkerSesmenApprovalPKS(Request $request) {
    //     try {
    //         $user = auth()->user();
    //         $roles = collect($user['roles']);

    //         $mappingRole = $roles->map(function($item, $key) {
    //             return $item['id'];
    //         });

    //         $idRoles = $mappingRole->all();
    //         $data['approval'] = SubmissionProposal::query();
    //         if($user->roles[0]->id <= 7 && $user->roles[0]->id >= 3) {
    //             if($request->q != null) {
    //                 $data['approval']->with('deputi','country','agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->whereHas('deputi', function(Builder $query) use ($user) {
    //                     $query->where('role_id', $user->roles[0]->id);
    //                     $query->whereNull('approval');
    //                 })->where('type_id', 1)->where('status_disposition', 3)->where('status_proposal', 1)->where('title_cooperation', 'LIKE', '%'.$request->q);
    //             }

    //             if($request->type_one != null) {
    //                 $data['approval']->with('deputi','country','agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->whereHas('deputi', function(Builder $query) use ($user) {
    //                     $query->where('role_id', $user->roles[0]->id);
    //                     $query->whereNull('approval');
    //                 })->where('type_id', 1)->where('status_disposition', 3)->where('status_proposal', 1)->where('type_of_cooperation_one_derivative_id', $request->type_one);
    //             }
    //         } else {
    //             if($request->q != null) {
    //                 $data['approval']->with('deputi','country','agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('type_id', 1)->whereIn('status_disposition', $idRoles)->where('status_proposal', 1)->where('title_cooperation', 'LIKE', '%'.$request->q);
    //             }

    //             if($request->type_one != null) {
    //                 $data['approval']->with('deputi','country','agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('type_id', 1)->whereIn('status_disposition', $idRoles)->where('status_proposal', 1)->where('type_of_cooperation_one_derivative_id', $request->type_one);
    //             }
    //         }
    //         $result['guest'] = $data['guest']->get();
    //         return response()->json($this->notification->generalSuccess($result));
    //         } catch (\Throwable $th) {
    //             return response()->json($this->notification->generalFailed($th));
    //         }
    // }
    // public function filterSatkerSesmenYouPKS(Request $request) {
    //     try {
    //         $user = auth()->user();
    //         $data['you'] = SubmissionProposal::query();
    //         if($request->q != null) {
    //             $data['you']->with('country','agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('type_id', 1)->where('created_by', $user->id)->where('type_of_cooperation_one_derivative_id', $request->type_one)->where('title_cooperation', 'LIKE', '%'.$request->q);
    //         }
    //         if($request->type_one != null) {
    //             $data['you']->with('country','agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('type_id', 1)->where('created_by', $user->id)->where('type_of_cooperation_one_derivative_id', $request->type_one)->where('type_of_cooperation_one_derivative_id', $request->type_one);
    //         }

    //         $result['you'] = $data['you']->get();
    //         return response()->json($this->notification->generalSuccess($result));
    //     } catch (\Throwable $th) {
    //         return response()->json($this->notification->generalFailed($th));
    //     }
    // }
    // public function filterGuestPKS(Request $request) {
    //     try {
    //     $user = auth()->user();
    //     $roles = collect($user['roles']);

    //     $mappingRole = $roles->map(function($item, $key) {
    //         return $item['id'];
    //     });

    //     $idRoles = $mappingRole->all();
    //     $data['guest'] = SubmissionProposalGuest::query();
    //     if($user->roles[0]->id <= 7 && $user->roles[0]->id >= 3) {
    //         if($request->q != null) {
    //             $data['guest']->with('deputi','country','agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->whereHas('deputi', function(Builder $query) use ($user) {
    //                 $query->where('role_id', $user->roles[0]->id);
    //                 $query->whereNull('approval');
    //             })->where('type_guest_id', 1)->where('status_disposition', 3)->where('status_proposal', 1)->where('title_cooperation', 'LIKE', '%'.$request->q);
    //         }

    //         if($request->type_one != null) {
    //             $data['guest']->with('deputi','country','agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->whereHas('deputi', function(Builder $query) use ($user) {
    //                 $query->where('role_id', $user->roles[0]->id);
    //                 $query->whereNull('approval');
    //             })->where('type_guest_id', 1)->where('status_disposition', 3)->where('status_proposal', 1)->where('type_of_cooperation_one_derivative_id', $request->type_one);
    //         }
    //     } else {
    //         if($request->q != null) {
    //             $data['guest']->with('deputi','country','agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('type_guest_id', 1)->whereIn('status_disposition', $idRoles)->where('status_proposal', 1)->where('title_cooperation', 'LIKE', '%'.$request->q);
    //         }

    //         if($request->type_one != null) {
    //             $data['guest']->with('deputi','country','agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('type_guest_id', 1)->whereIn('status_disposition', $idRoles)->where('status_proposal', 1)->where('type_of_cooperation_one_derivative_id', $request->type_one);
    //         }
    //     }
    //     $result['guest'] = $data['guest']->get();
    //     return response()->json($this->notification->generalSuccess($result));
    //     } catch (\Throwable $th) {
    //         return response()->json($this->notification->generalFailed($th));
    //     }
    // }
    // public function resetSatkerSesmenApprovalPKS(Request $request) {
    //     try {
    //         $user = auth()->user();
    //         $roles = collect($user['roles']);

    //         $mappingRole = $roles->map(function($item, $key) {
    //             return $item['id'];
    //         });

    //         $idRoles = $mappingRole->all();
    //         if($user->roles[0]->id <= 7 && $user->roles[0]->id >= 3) {
    //             $data['approval'] = SubmissionProposal::with('deputi','country','agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->whereHas('deputi', function(Builder $query) use ($user) {
    //                 $query->where('role_id', $user->roles[0]->id);
    //                 $query->whereNull('approval');
    //             })->where('type_id', 1)->where('status_disposition', 3)->where('status_proposal', 1)->get();
    //         } else {
    //              $data['approval'] = SubmissionProposal::with('country','agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('type_id', 1)->where('status_proposal', 1)->whereIn('status_disposition', $idRoles)->get();
    //         }
    //         return response()->json($this->notification->generalSuccess($data));
    //         } catch (\Throwable $th) {
    //             return response()->json($this->notification->generalFailed($th));
    //         }
    // }
    // public function resetSatkerSesmenYouPKS(Request $request) {
    //     try {
    //         $user = auth()->user();
    //         $data['you'] = SubmissionProposal::with('country','agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('type_id', 1)->where('created_by', $user->id)->get();

    //         return response()->json($this->notification->generalSuccess($data));
    //     } catch (\Throwable $th) {
    //         return response()->json($this->notification->generalFailed($th));
    //     }
    // }
    // public function resetGuestPKS(Request $request) {
    //     try {
    //     $user = auth()->user();
    //     $roles = collect($user['roles']);

    //     $mappingRole = $roles->map(function($item, $key) {
    //         return $item['id'];
    //     });

    //     $idRoles = $mappingRole->all();
    //     if($user->roles[0]->id <= 7 && $user->roles[0]->id >= 3) {
    //         $data['guest'] = SubmissionProposalGuest::with('deputi','country','agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->whereHas('deputi', function(Builder $query) use ($user) {
    //             $query->where('role_id', $user->roles[0]->id);
    //             $query->whereNull('approval');
    //         })->where('type_guest_id', 1)->where('status_disposition', 3)->where('status_proposal', 1)->get();

    //     } else {
    //         $data['guest'] = SubmissionProposalGuest::with('country','agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('type_guest_id', 1)->where('status_proposal', 1)->whereIn('status_disposition', $idRoles)->get();
    //     }

    //     return response()->json($this->notification->generalSuccess($data));
    //     } catch (\Throwable $th) {
    //         return response()->json($this->notification->generalFailed($th));
    //     }
    // }
    public function findMOUSuccess($id) {
        try {
            $data = SubmissionProposal::findOrFail($id);

            return response()->json($this->notification->showSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->showFailed($data));
        }
    }
}
