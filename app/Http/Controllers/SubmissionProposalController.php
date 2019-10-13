<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubmissionProposalRequest;
use App\SubmissionProposal;
use App\Repositories\Interfaces\NotificationRepositoryInterfaces;

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

            $data = SubmissionProposal::where('created_by', $user->id)->get();

            return response()->json($this->notification->generalSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->generalFailed($th));
        }
    }
    public function store(StoreSubmissionProposalRequest $request) {
        try {
            SubmissionProposal::create($request->store());
            $data = SubmissionProposal::all();
            return response()->json($this->notification->storeSuccess($data));
        } catch (\Throwable $th) {
            return response()->json($this->notification->storeFailed($th));
        }
    }
}

