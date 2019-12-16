<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\NotificationRepositoryInterfaces;
use App\SubmissionProposal;
use App\SubmissionProposalGuest;
use DB;
use Illuminate\Database\Eloquent\Builder;

class MonevController extends Controller
{
    private $notification;

    public function __construct(NotificationRepositoryInterfaces $notification)
    {
        $this->notification = $notification;
    }
    public function index() {
        try {
            $user = auth()->user();
            if($user->roles[0]->id == 9) {
                $data['approval'] = SubmissionProposal::with('deputi','country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('status_disposition', 17)->where('status_proposal', 1)->get();
                $data['guest'] = SubmissionProposalGuest::with('deputi','country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('status_disposition', 17)->where('status_proposal', 1)->get();
            } else {
                $data['approval'] = SubmissionProposal::with('deputi','country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->whereHas('deputi', function(Builder $query) use ($user) {
                    $query->where('role_id', $user->roles[0]->id);
                })->where('status_disposition', 17)->where('status_proposal', 1)->get();
                $data['guest'] = SubmissionProposalGuest::with('deputi','country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->whereHas('deputi', function(Builder $query) use ($user) {
                    $query->where('role_id', $user->roles[0]->id);
                })->where('status_disposition', 17)->where('status_proposal', 1)->get();
            }

            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    // public function store(Request $request) {
    //     try {
    //         DB::beginTransaction();

    //         $approvalOld = ApprovalOldSubmissionCooperation::create([
    //             'created_by' => auth()->user()->id,
    //             'title_of_cooperation' => $request->title_of_cooperation,
    //             'tanggal_ttd' => $request->time_period[0],
    //             'end_date' => $request->time_period[1],
    //             'background' => $request->background,
    //             'status' => $request->status,
    //             'description' => $request->description,
    //             'role_id' => auth()->user()->roles[0]->id,
    //             'latitude' => $request->latitude,
    //             'longitude' => $request->longitude,
    //         ]);

    //         foreach ($request->nomor as $key => $valueSplitNomor) {
    //             NomorApprovalOldSubmissionCooperation::create([
    //                 'created_by' => auth()->user()->id,
    //                 'approval_old_submission_cooperation_id' => $approvalOld->id,
    //                 'nomor' => $valueSplitNomor,
    //             ]);
    //         }

    //         foreach ($request->the_parties as $key => $valueSplitParaPihak) {
    //             ThePartiesApprovalOldSubmissionCooperation::create([
    //                 'created_by' => auth()->user()->id,
    //                 'approval_old_submission_cooperation_id' => $approvalOld->id,
    //                 'name' => $valueSplitParaPihak
    //             ]);
    //         }

    //         $data = ApprovalOldSubmissionCooperation::where('role_id', auth()->user()->roles[0]->id)->get();

    //         DB::commit();
    //         return response()->json($this->notification->storeSuccess($data));
    //     } catch (\Throwable $th) {
    //         DB::rollback();
    //         return response()->json($this->notification->storeFailed($th));
    //     }
    // }
    // public function edit($id) {
    //     try {
    //         $data = ApprovalOldSubmissionCooperation::with('nomor','parties')->findOrFail($id);

    //         return response()->json($this->notification->generalSuccess($data));
    //     } catch (\Throwable $th) {
    //         return response()->json($this->notification->generalFailed($data));
    //     }
    // }
    // public function update(Request $request, $id) {
    //     try {
    //         // dd($request->all());
    //         DB::beginTransaction();
    //         $approvalOld = ApprovalOldSubmissionCooperation::where('id', $id)->update([
    //             'created_by' => auth()->user()->id,
    //             'title_of_cooperation' => $request->title_of_cooperation,
    //             'tanggal_ttd' => $request->time_period[0],
    //             'end_date' => $request->time_period[1],
    //             'background' => $request->background,
    //             'status' => $request->status,
    //             'description' => $request->description,
    //             'role_id' => auth()->user()->roles[0]->id,
    //             'latitude' => $request->latitude,
    //             'longitude' => $request->longitude,
    //         ]);

    //         foreach ($request->nomor as $key => $valueSplitNomor) {
    //             if($valueSplitNomor != null) {
    //                 NomorApprovalOldSubmissionCooperation::updateOrCreate([
    //                     'created_by' => auth()->user()->id,
    //                     'approval_old_submission_cooperation_id' => $id,
    //                     'nomor' => $valueSplitNomor,
    //                 ]);
    //             }
    //         }

    //         foreach ($request->the_parties as $key => $valueSplitParaPihak) {
    //             if($valueSplitParaPihak != null) {
    //                 ThePartiesApprovalOldSubmissionCooperation::updateOrCreate([
    //                     'created_by' => auth()->user()->id,
    //                     'approval_old_submission_cooperation_id' => $id,
    //                     'name' => $valueSplitParaPihak
    //                 ]);
    //             }
    //         }

    //         $data = ApprovalOldSubmissionCooperation::where('role_id', auth()->user()->roles[0]->id)->get();

    //         DB::commit();
    //         return response()->json($this->notification->updateSuccess($data));
    //     } catch (\Throwable $th) {
    //         DB::rollback();
    //         return response()->json($this->notification->updateFailed0($th));
    //     }
    // }
    // public function destroyNomor($id, $nomor) {
    //     try {
    //         NomorApprovalOldSubmissionCooperation::where('approval_old_submission_cooperation_id', $id)->where('nomor', $nomor)->delete();

    //         return response()->json([
    //             'messages' => 'Data Berhasil di Hapus',
    //             'status' => 200,
    //         ]);
    //     } catch (\Throwable $th) {
    //         return response()->json([
    //             'messages' => $th->getMessage(),
    //             'status' => $th->getCode(),
    //         ]);
    //     }
    // }
    // public function destroyParties($id, $parties) {
    //     try {
    //         $replacePercent = str_replace("%", " ", $parties);
    //         ThePartiesApprovalOldSubmissionCooperation::where('approval_old_submission_cooperation_id', $id)->where('name', $replacePercent)->delete();

    //         return response()->json([
    //             'messages' => 'Data Berhasil di Hapus',
    //             'status' => 200,
    //         ]);
    //     } catch (\Throwable $th) {
    //         return response()->json([
    //             'messages' => $th->getMessage(),
    //             'status' => $th->getCode(),
    //         ]);
    //     }
    // }
    // public function createActivity($id) {
    //     try {
    //         $data = ApprovalOldSubmissionCooperation::findOrFail($id);

    //         return response()->json($this->notification->generalSuccess($data));
    //     } catch (\Throwable $th) {
    //         return response()->json($this->notification->generalFailed($th));
    //     }
    // }
    // public function storeActivity(StoreMonevActivityRequest $request) {
    //     try {
    //         $store = ApprovalOldSubmissionCooperationActivity::create($request->store());
    //         if($request->hasFile('documentation')) {
    //             foreach ($request->documentation as $key => $value) {
    //                 $extention = $value->getClientOriginalExtension();
    //                 $fileName = 'activity-documentation'.'-'.date('Y-m-d').'-'.time().'.'.$extention;
    //                 $path = $value->storeAs($store->id, $fileName, 'file_page');
    //                 $store->documentation()->create([
    //                     'created_by' => auth()->user()->id,
    //                     'approval_old_submission_cooperation_activity_id' => $store->id,
    //                     'name' => $path
    //                 ]);
    //             }
    //         }
    //         $data = ApprovalOldSubmissionCooperation::where('role_id', auth()->user()->roles[0]->id)->get();
    //         return response()->json($this->notification->storeSuccess($data));
    //     } catch (\Throwable $th) {
    //         return response()->json($this->notification->storeFailed($th));
    //     }
    // }
    // public function showActivity($id) {
    //     try {
    //         $data = ApprovalOldSubmissionCooperation::with('activities', 'activities.documentation', 'nomor', 'parties')->findOrFail($id);

    //         return response()->json($this->notification->showSuccess($data));
    //     } catch (\Throwable $th) {
    //         return response()->json($this->notification->showFailed($th));
    //     }
    // }
    // public function deleteActivity($id) {
    //     try {
    //         $delete = ApprovalOldSubmissionCooperationActivity::findOrFail($id);
    //         $delete->delete();

    //         $data = ApprovalOldSubmissionCooperation::where('role_id', auth()->user()->roles[0]->id)->get();
    //         return response()->json($this->notification->deleteSuccess($data));
    //     } catch (\Throwable $th) {
    //         return response()->json($this->notification->deleteFailed($th));
    //     }
    // }
    // public function listMonevActivity($id) {
    //     try {
    //         $data = ApprovalOldSubmissionCooperationActivity::where('approval_old_submission_cooperation_id', $id)->get();

    //         return response()->json($this->notification->generalSuccess($data));
    //     } catch (\Throwable $th) {
    //         return response()->json($this->notification->generalFailed($th));
    //     }
    // }
    // public function destroyListMonevActivity($id) {
    //     try {
    //         $delete = ApprovalOldSubmissionCooperationActivity::findOrFail($id);
    //         $delete->delete();

    //         $data = ApprovalOldSubmissionCooperationActivity::all();
    //         return response()->json($this->notification->deleteSuccess($data));
    //     } catch (\Throwable $th) {
    //         return response()->json($this->notification->deleteFailed($th));
    //     }
    // }
    // public function uploadOldMOU(Request $request, $id) {
    //     try {
    //         $extention = $request->file->getClientOriginalExtension();
    //         $fileName = 'old-mou'.'-'.date('Y-m-d').'-'.time().'.'.$extention;
    //         $path = $request->file->storeAs($id, $fileName, 'old_mou');

    //         ApprovalOldSubmissionCooperation::where('id', $id)->update([
    //             'file' => $path
    //         ]);

    //         $data = ApprovalOldSubmissionCooperation::where('role_id', auth()->user()->roles[0]->id)->get();

    //         return response()->json($this->notification->updateSuccess($data));
    //     } catch (\Throwable $th) {
    //         DB::rollback();
    //         return response()->json($this->notification->updateFailed0($th));
    //     }

    // }
}
