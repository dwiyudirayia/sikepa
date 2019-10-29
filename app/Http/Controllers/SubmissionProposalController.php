<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubmissionProposalRequest;
use App\SubmissionProposal;
use App\Repositories\Interfaces\NotificationRepositoryInterfaces;
use App\TypeOfCooperation;
use App\TypeOfCooperationOneDerivative;
use App\TypeOfCooperationTwoDerivative;
use Spatie\Permission\Models\Permission;
use App\CooperationTarget;
use App\Agency;
use App\Country;
use App\Province;
use App\Regency;

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
            $permissions = [];

            foreach (Permission::all() as $permission) {
                if (request()->user()->can($permission->name)) {
                    $permissions[] = $permission->id;
                }
            }

            $user['permission'] = $permission;
            $data['approval'] = SubmissionProposal::with('typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->whereIn('status_disposition', $user['permissions'])->get();
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

            $data['approval'] = SubmissionProposal::with('typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->whereIn('status_disposition', $user['permissions'])->get();
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
}

