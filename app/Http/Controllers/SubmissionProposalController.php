<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubmissionProposalRequest;
use App\SubmissionProposal;
use App\Repositories\Interfaces\NotificationRepositoryInterfaces;
use App\TypeOfCooperation;
use App\TypeOfCooperationOneDerivative;
use App\TypeOfCooperationTwoDerivative;
use App\User;
use Spatie\Permission\Models\Permission;
use App\CooperationTarget;
use App\Agency;
use App\Country;
use App\Province;
use App\ReasonSubmissionCooperation;
use App\Regency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubmissionCooperationApprove;
use App\Mail\SubmissionCooperationReject;

class SubmissionProposalController extends Controller
{
    private $notification;

    public function __construct(NotificationRepositoryInterfaces $notification)
    {
        $this->notification = $notification;
    }
    public function index() {
        try {
            $user = request()->user();
            $data['approval'] = SubmissionProposal::with('typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('status_proposal', 1)->where('status_disposition', $user->roles[0]->id)->get();
            $data['you'] = SubmissionProposal::where('created_by', $user->id)->get();

            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function create() {
        try {
            $data['typeof'] = TypeOfCooperation::where('id', 2)->get();
            $data['cooperation'] = CooperationTarget::all();
            $data['agency'] = Agency::all();
            $data['country'] = Country::all();
            $data['province'] = Province::all();

            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function store(StoreSubmissionProposalRequest $request) {
        try {
            $user = request()->user();

            SubmissionProposal::create($request->store());

            $data['approval'] = SubmissionProposal::with('typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('status_proposal', 1)->whereIn('status_disposition', $user['permissions'])->get();
            $data['you'] = SubmissionProposal::where('created_by', $user->id)->get();

            return response()->json($this->notification->storeSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->storeFailed($th));
        }
    }
    public function changeSelectOneDerivative($id) {
        try {
            $data = TypeOfCooperationOneDerivative::where('type_of_cooperation_id', $id)->get();
            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function changeSelectTwoDerivative($id) {
        try {
            $data = TypeOfCooperationTwoDerivative::where('type_of_cooperation_one_derivative_id', $id)->get();
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
            $data = SubmissionProposal::with('agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo', 'country', 'province', 'regency')->findOrFail($id);
            return response()->json($this->notification->showSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->showFailed($th));
        }
    }
    public function approve(Request $request) {
        try {
            $user = request()->user();
            ReasonSubmissionCooperation::create([
                'created_by' => request()->user()->id,
                'updated_by' => request()->user()->id,
                'submission_proposal_id' => $request->id,
                'reason' => $request->reason,
                'status' => request()->user()->roles[0]->id
            ]);

            $updateDisposisi = SubmissionProposal::findOrFail($request->id);
            $updateDisposisi->status_disposition = (int) $updateDisposisi->status_disposition + 1;
            $updateDisposisi->save();

            $getEmail = User::findOrFail($updateDisposisi->created_by);

            $data['approval'] = SubmissionProposal::with('typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('status_proposal', 1)->where('status_disposition', $user->roles[0]->id)->get();
            $data['you'] = SubmissionProposal::where('created_by', $user->id)->get();

            Mail::to($getEmail->email)->send(new SubmissionCooperationApprove($updateDisposisi));

            return response()->json($this->notification->updateSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->updateFailed($th));
        }
    }
    public function reject(Request $request) {
        try {
            ReasonSubmissionCooperation::create([
                'created_by' => request()->user()->id,
                'updated_by' => request()->user()->id,
                'submission_proposal_id' => $request->id,
                'reason' => $request->reason,
                'status' => request()->user()->roles[0]->id
            ]);

            $updateDisposisi = SubmissionProposal::findOrFail($request->id);
            $updateDisposisi->status_proposal = 0;
            $updateDisposisi->save();

            $getEmail = User::findOrFail($updateDisposisi->created_by);

            $user = request()->user();
            $data['approval'] = SubmissionProposal::with('typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->where('status_proposal', 1)->where('status_disposition', $user->roles[0]->id)->get();
            $data['you'] = SubmissionProposal::where('created_by', $user->id)->get();

            Mail::to($getEmail)->send(new SubmissionCooperationReject($updateDisposisi));

            return response()->json($this->notification->updateSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->updateFailed($th));
        }
    }
}

