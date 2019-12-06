<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class StoreSubmissionProposalGuestRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

        ];
    }
    public function store() {
        if($this->hasFile('agency_profile')) {
            $extention = $this->agency_profile->getClientOriginalExtension();
            $fileName = 'agency-profile'.'-'.date('Y-m-d').'-'.time().'.'.$extention;
            $pathAgency = $this->agency_profile->storeAs(strtotime("now"), $fileName, 'agency_profile_cooperation_guest');
        }

        if($this->hasFile('proposal')) {
            $extention = $this->proposal->getClientOriginalExtension();
            $fileName = 'proposal-cooperation'.'-'.date('Y-m-d').'-'.time().'.'.$extention;
            $pathProposal = $this->proposal->storeAs(strtotime("now"), $fileName, 'proposal_cooperation_guest');
        }

        if($this->hasFile('ktp')) {
            $extention = $this->ktp->getClientOriginalExtension();
            $fileName = 'ktp-guest'.'-'.date('Y-m-d').'-'.time().'.'.$extention;
            $pathKTP = $this->ktp->storeAs(strtotime("now"), $fileName, 'ktp_guest');
        }

        if($this->hasFile('npwp')) {
            $extention = $this->npwp->getClientOriginalExtension();
            $fileName = 'npwp-guest'.'-'.date('Y-m-d').'-'.time().'.'.$extention;
            $pathNPWP = $this->npwp->storeAs(strtotime("now"), $fileName, 'npwp_guest');
        }

        if($this->hasFile('siup')) {
            $extention = $this->siup->getClientOriginalExtension();
            $fileName = 'siup-guest'.'-'.date('Y-m-d').'-'.time().'.'.$extention;
            $pathSIUP = $this->siup->storeAs(strtotime("now"), $fileName, 'siup_guest');
        }

        if($this->type_of_cooperation_id == 1) {
            $reject = Carbon::now()->addMinutes(10);
        } else {
            $reject = null;
        }

        return [
            'type_guest_id' => $this->type_guest_id,
            'mailing_number' => "Surat-".strtotime("now"),
            'title_cooperation' => $this->title_cooperation,
            'type_of_cooperation_id' => $this->type_of_cooperation_id,
            'type_of_cooperation_one_derivative_id' => $this->type_of_cooperation_one_derivative_id,
            'type_of_cooperation_two_derivative_id' => $this->type_of_cooperation_two_derivative_id,
            'agencies_id' => $this->agencies_id,
            'countries_id' => $this->countries_id,
            'province_id' => $this->province_id,
            'regency_id' => $this->regency_id,
            'postal_code' => $this->postal_code,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'nominal' => $this->nominal,
            'name' => $this->agency_name,
            'department' => $this->department,
            'ktp' => $pathKTP,
            'npwp' => $pathNPWP,
            'siup' => $pathSIUP,
            'no_telp' => $this->no_telp,
            'agency_name' => $this->agency_name,
            'address' => $this->address,
            'email' => $this->email,
            'purpose_objectives' => $this->purpose_objectives,
            'background' => $this->background,
            'status_proposal' => 1,
            'status_disposition' => 2,
            'time_period' => 1,
            'agency_profile' => $pathAgency,
            'proposal' => $pathProposal,
            'reject_dana' => $reject,
        ];

    }
}
