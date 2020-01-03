<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;
class StoreSubmissionProposalRequest extends FormRequest
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
            'agencies_id' => 'required',
            'country_id' => 'required',
            'postal_code' => 'required',
            'address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            // 'nominal' => 'required',
            // 'purpose_objectives' => 'required',
            'background' => 'required',
            'time_period' => 'required',
            'agency_profile' => 'required',
            'proposal' => 'required',
        ];
    }
    public function store()
    {
        if($this->hasFile('agency_profile')) {
            $extention = $this->agency_profile->getClientOriginalExtension();
            $fileName = 'agency-profile'.'-'.date('Y-m-d').'-'.time().'.'.$extention;
            $pathAgency = $this->agency_profile->storeAs(strtotime("now"), $fileName, 'agency_profile_cooperation');
        }
        if($this->hasFile('proposal')) {
            $extention = $this->proposal->getClientOriginalExtension();
            $fileName = 'proposal-cooperation'.'-'.date('Y-m-d').'-'.time().'.'.$extention;
            $pathProposal = $this->proposal->storeAs(strtotime("now"), $fileName, 'proposal_cooperation');
        }

        return [
            'created_by' => auth()->user()->id,
            'mailing_number' => "Surat-".strtotime("now"),
            'title_cooperation' => $this->title_cooperation,
            'type_of_cooperation_one_derivative_id' => $this->type_of_cooperation_one_derivative_id == 'null' ? null : $this->type_of_cooperation_one_derivative_id,
            'type_of_cooperation_two_derivative_id' => $this->type_of_cooperation_two_derivative_id == 'null' ? null : $this->type_of_cooperation_two_derivative_id,
            'agencies_id' => $this->agencies_id,
            'countries_id' => $this->country_id,
            'province_id' => $this->province_id == 'null' ? null : $this->province_id,
            'regency_id' => $this->regency_id == 'null' ? null : $this->regency_id,
            'postal_code' => $this->postal_code,
            'agency_name' => $this->agency_name,
            'address' => $this->address,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            // 'nominal' => $this->nominal,
            // 'purpose_objectives' => $this->purpose_objectives,
            'background' => $this->background,
            'status_proposal' => 1,
            'status_disposition' => 3,
            'time_period' => $this->time_period,
            // 'time_period_of' => $this->time_period_of,
            // 'time_period_to' => $this->time_period_to,
            'agency_profile' => $pathAgency,
            'proposal' => $pathProposal,
        ];
    }
}
