<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMonevActivitySatkerGuestRequest;
use App\Http\Requests\StoreMonevActivitySatkerRequest;
use App\Http\Resources\SubmissionProposalCollection;
use App\Http\Resources\SubmissionProposalGuestCollection;
use App\MonitoringActivityAdendum;
use App\MonitoringActivityDocumentationAdendum;
use App\MonitoringActivityDocumentationAdendumGuest;
use App\MonitoringActivityAdendumGuest;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\NotificationRepositoryInterfaces;
use App\Adendum;
use App\AdendumGuest;
use App\ReportAdendum;
use App\ReportAdendumGuest;
use DB;
use Illuminate\Database\Eloquent\Builder;
use PDF;
use Illuminate\Support\Facades\Storage;

class MonevAdendumController extends Controller
{
    private $notification;

    public function __construct(NotificationRepositoryInterfaces $notification)
    {
        $this->notification = $notification;
    }
    public function index() {
        try {
            $user = auth()->user();
            if($user->roles[0]->id == 9 || $user->roles[0]->id == 1) {
                $data['approval'] = new SubmissionProposalCollection(Adendum::with('deputi','mou','report','country','agencies', 'monevActivity', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('status_disposition', 16)->where('status_proposal', 1)->get());
                $data['guest'] = new SubmissionProposalGuestCollection(AdendumGuest::with('deputi','mou','report','country','agencies', 'monevActivity', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('status_disposition', 16)->where('status_proposal', 1)->get());
            } else {
                $data['approval'] = new SubmissionProposalCollection(Adendum::with('deputi','mou', 'report','country','agencies', 'monevActivity', 'typeOfCooperationOne', 'typeOfCooperationTwo')->whereHas('deputi', function(Builder $query) use ($user) {
                    $query->where('role_id', $user->roles[0]->id);
                })->where('status_disposition', 16)->where('status_proposal', 1)->get());
                $data['guest'] = new SubmissionProposalGuestCollection(AdendumGuest::with('deputi','mou','report','country','agencies', 'monevActivity','typeOfCooperationOne', 'typeOfCooperationTwo')->whereHas('deputi', function(Builder $query) use ($user) {
                    $query->where('role_id', $user->roles[0]->id);
                })->where('status_disposition', 16)->where('status_proposal', 1)->get());
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
    public function storeActivitySatker(StoreMonevActivitySatkerRequest $request) {
        try {
            DB::beginTransaction();
            $proposal = Adendum::findOrFail($request->id);
            $monevActivity = $proposal->monevActivity()->create($request->store());

            if($request->hasFile('file')) {
                foreach ($request->file as $key => $value) {
                    $extFile = $value->getClientOriginalExtension();
                    $nameFile = 'file-monev-activity'.'-'.date('Y-m-d').'-'.time().'.'.$extFile;
                    $path = $value->storeAs($monevActivity->id, $nameFile, 'activity_documentation_adendum');
                    $monevActivity->documentation()->create([
                        'file' => $path
                    ]);
                }
            }

            DB::commit();
            return response()->json([
                'messages' => 'Data Berhasil di Tambahkan',
                'status' => 200,
            ]);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json($this->notification->storeFailed($th));
        }
    }
    public function storeActivityGuest(StoreMonevActivitySatkerGuestRequest $request) {
        try {
            DB::beginTransaction();
            $proposal = AdendumGuest::findOrFail($request->id);
            $monevActivity = $proposal->monevActivity()->create($request->store());

            if($request->hasFile('file')) {
                foreach ($request->file as $key => $value) {
                    $extFile = $value->getClientOriginalExtension();
                    $nameFile = 'file-monev-activity'.'-'.date('Y-m-d').'-'.time().'.'.$extFile;
                    $path = $value->storeAs($monevActivity->id, $nameFile, 'activity_documentation_guest_adendum');
                    $monevActivity->documentation()->create([
                        'file' => $path
                    ]);
                }
            }

            DB::commit();
            return response()->json([
                'messages' => 'Data Berhasil di Tambahkan',
                'status' => 200,
            ]);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json($this->notification->storeFailed($th));
        }
    }
    public function showActivitySatker($id) {
        try {
            $data = MonitoringActivityAdendum::findOrFail($id);
            return response()->json($this->notification->showSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->showFailed($th));
        }
    }
    public function showActivityGuest($id) {
        try {
            $data = MonitoringActivityAdendumGuest::findOrFail($id);
            return response()->json($this->notification->showSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->showFailed($th));
        }
    }
    public function listActivitySatker($id) {
        try {
            $data = MonitoringActivityAdendum::where('adendum_id', $id)->get();
            return response()->json($this->notification->showSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->showFailed($th));
        }
    }
    public function destroyActivitySatker($id) {
        try {
            $data = MonitoringActivityAdendum::findOrFail($id);
            $data->delete();

            return response()->json([
                'messages' => 'Data Berhasil di Hapus',
                'status' => 200,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => 'Data Gagal di Tambahkan',
                'status' => $th->getCode(),
            ]);
        }
    }
    public function listActivityGuest($id) {
        try {
            $data = MonitoringActivityAdendumGuest::where('adendum_guest_id', $id)->get();
            return response()->json($this->notification->showSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->showFailed($th));
        }
    }
    public function destroyActivityGuest($id) {
        try {
            $data = MonitoringActivityAdendumGuest::findOrFail($id);
            $data->delete();

            return response()->json([
                'messages' => 'Data Berhasil di Hapus',
                'status' => 200,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => 'Data Gagal di Tambahkan',
                'status' => $th->getCode(),
            ]);
        }
    }
    public function downloadSummaryGuest($id) {
        ini_set('max_execution_time', 300);
        ini_set("memory_limit","512M");

        $data = AdendumGuest::with('deputi.role', 'tracking.role', 'country','agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo','monevActivity', 'monevActivity.documentation')->findOrFail($id);
        // dd($data->monevActivity[0]->result->evaluation);
        $pdf = PDF::loadView('export.summary-monev', compact('data'));
        return $pdf->download('Rangkuman Monitoring Evaluasi '.date('Y-m-d_H-i-s').'.pdf');
    }
    public function downloadSummarySatker($id) {
        ini_set('max_execution_time', 300);
        ini_set("memory_limit","512M");

        $data = Adendum::with('deputi.role', 'tracking.role', 'country','agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo','monevActivity', 'monevActivity.documentation')->findOrFail($id);
        $pdf = PDF::loadView('export.summary-monev', compact('data'));
        return $pdf->download('Rangkuman Monitoring Evaluasi '.date('Y-m-d_H-i-s').'.pdf');
    }
    public function detailMonevGuest($id) {
        try {
            $data = AdendumGuest::with('deputi.role', 'tracking.role', 'country','province','regency','agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo','monevActivity', 'monevActivity.documentation')->findOrFail($id);

            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => 'Data Gagal di Ambil',
                'status' => $th->getCode(),
            ]);
        }
    }
    public function detailMonevSatker($id) {
        try {
            $data = AdendumGuest::with('deputi.role', 'tracking.role', 'country','province','regency','agencies', 'typeOfCooperationOne', 'typeOfCooperationTwo','monevActivity', 'monevActivity.documentation')->findOrFail($id);

            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => 'Data Gagal di Ambil',
                'status' => $th->getCode(),
            ]);
        }
    }
    public function editSatker($id) {
        try {
            $data = MonitoringActivityAdendum::with('documentation')->findOrFail($id);

            return response()->json([
                'data' => $data,
                'messages' => 'Data Berhasil di Ambil',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => $th->getCode(),
                'messages' => 'Data Gagal di Ambil',
            ]);
        }
    }
    public function editGuest($id) {
        try {
            $data = MonitoringActivityAdendumGuest::with('documentation')->findOrFail($id);

            return response()->json([
                'data' => $data,
                'messages' => 'Data Berhasil di Ambil',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => $th->getCode(),
                'messages' => 'Data Gagal di Ambil',
            ]);
        }
    }
    public function downloadImageGuest($id) {
        try {
            $data = MonitoringActivityDocumentationAdendumGuest::findOrFail($id);

            $draft = $data->file;
            return response()->download(storage_path("/app/public/activity_documentation_guest_adendum/".$draft));

        } catch (\Throwable $th) {
            return response()->json([
                'messages' => $th->getMessage(),
                'status' => $th->getCode()
            ]);
        }
    }
    public function downloadImageSatker($id) {
        try {
            $data = MonitoringActivityDocumentationAdendum::findOrFail($id);

            $draft = $data->file;
            return response()->download(storage_path("/app/public/activity_documentation_adendum/".$draft));

        } catch (\Throwable $th) {
            return response()->json([
                'messages' => 'Download Gagal',
                'status' => $th->getCode()
            ]);
        }
    }
    public function destroyImageGuest($id) {
        try {
            $data = MonitoringActivityDocumentationAdendumGuest::findOrFail($id);
            Storage::disk('activity_documentation_guest_adendum')->delete($data->file);
            $data->delete();

            return response()->json([
                'messages' => 'Data Berhasil di Hapus',
                'status' => 200,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => 'Data Gagal di Hapus',
                'status' => 200,
            ]);
        }
    }
    public function destroyImageSatker($id) {
        try {
            $data = MonitoringActivityDocumentationAdendum::findOrFail($id);
            Storage::disk('activity_documentation_adendum')->delete($data->file);
            $data->delete();

            return response()->json([
                'messages' => 'Data Berhasil di Hapus',
                'status' => 200,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => 'Data Gagal di Hapus',
                'status' => 200,
            ]);
        }
    }
    public function storeImageGuest(Request $request)  {
        try {
            if($request->hasFile('file')) {
                $extFile = $request->file->getClientOriginalExtension();
                $nameFile = 'file-monev-activity'.'-'.date('Y-m-d').'-'.time().'.'.$extFile;
                $path = $request->file->storeAs($request->id, $nameFile, 'activity_documentation_guest_adendum');

                MonitoringActivityDocumentationAdendumGuest::create([
                    'monitoring_activity_adendum_guest_id' => $request->id,
                    'file' => $path
                ]);
            }

            return response()->json([
                'messages' => 'Data Berahasil di Simpan',
                'status' => 200,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => 'Data Gagal di Simpan',
                'status' => $th->getCode(),
            ]);
        }
    }
    public function storeImageSatker(Request $request) {
        try {
            if($request->hasFile('file')) {
                $extFile = $request->file->getClientOriginalExtension();
                $nameFile = 'file-monev-activity'.'-'.date('Y-m-d').'-'.time().'.'.$extFile;
                $path = $request->file->storeAs($request->id, $nameFile, 'activity_documentation_adendum');

                MonitoringActivityDocumentationAdendum::create([
                    'monitoring_activity_adendum_id' => $request->id,
                    'file' => $path
                ]);
            }

            return response()->json([
                'messages' => 'Data Berahasil di Simpan',
                'status' => 200,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => 'Data Gagal di Simpan',
                'status' => $th->getCode(),
            ]);
        }
    }
    public function updateActivityGuest(Request $request, $id) {
        try {
            MonitoringActivityAdendumGuest::where('id', $id)->update([
                'title_activity' => $request->title_activity,
                'implementation_date' => $request->implementation_date,
                'location' => $request->location,
                'description_activities' => $request->description_activities,
                'result_status' => $request->result_status,
            ]);
            return response()->json([
                'messages' => 'Data Berahasil di Perbaharui',
                'status' => 200,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => 'Data Gagal di Perbaharui',
                'status' => $th->getCode(),
            ]);
        }
    }
    public function updateActivitySatker(Request $request, $id) {
        try {
            MonitoringActivityAdendum::where('id', $id)->update([
                'title_activity' => $request->title_activity,
                'implementation_date' => $request->implementation_date,
                'location' => $request->location,
                'description_activities' => $request->description_activities,
                'result_status' => $request->result_status,
            ]);
            return response()->json([
                'messages' => 'Data Berahasil di Perbaharui',
                'status' => 200,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => 'Data Gagal di Perbaharui',
                'status' => $th->getCode(),
            ]);
        }
    }
    public function storeReportGuest(Request $request) {
        try {
            ReportAdendumGuest::updateOrCreate([
                'adendum_guest_id' => $request->id,
            ],
            [
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id,
                'adendum_guest_id' => $request->id,
                'report' => $request->value,
            ]);

            $array = [];
            return response()->json($this->notification->updateSuccess($array));
        } catch (\Throwable $th) {
            return response()->json($this->notification->updateFailed($th));
        }
    }
    public function storeReport(Request $request) {
        try {
            ReportAdendum::updateOrCreate([
                'adendum_id' => $request->id,
            ],
            [
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id,
                'adendum_id' => $request->id,
                'report' => $request->value,
            ]);

            $array = [];
            return response()->json($this->notification->updateSuccess($array));
        } catch (\Throwable $th) {
            return response()->json($this->notification->updateFailed($th));
        }
    }
    public function checkDataGuest($id) {
        try {
            if(ReportAdendumGuest::where('adendum_guest_id', $id)->exists()) {
                $data = ReportAdendumGuest::where('adendum_guest_id', $id)->first();
            } else {
                $data = [];
            }

            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function checkData($id) {
        try {
            if(ReportAdendum::where('adendum_id', $id)->exists()) {
                $data = ReportAdendum::where('adendum_id', $id)->first();
            }

            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
}
