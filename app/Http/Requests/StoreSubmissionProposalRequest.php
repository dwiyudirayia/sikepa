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
            'type_of_cooperation_id' => 'required',
            'type_of_cooperation_one_derivative_id' => 'required',
            'type_of_cooperation_two_derivative_id' => 'required',
            'substance_cooperation_id' => 'required',
            'cooperastion_target_id' => 'required',
            'target_of_cooperation_id' => 'required',
            'agencies_id' => 'required',
            'country_id' => 'required',
            'province_id' => 'required',
            'regency_id' => 'required',
            'postal_code' => 'required',
            'address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'nominal' => 'required',
            'name' => 'required',
            'ktp' => 'required',
            'npwp' => 'required',
            'siup' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'purpose_objectives' => 'required',
            'background' => 'required',
            'status_proposal' => 'required',
            'status_disposition' => 'required',
            'time_period_of' => 'required',
            'time_period_to' => 'required',
            'agency_profile' => 'required',
            'proposal' => 'required',
        ];
    }
    public function store()
    {
        return [
            'created_by' => request()->user()->id,
            'mailing_number' => "Surat".strototime(date('d-m-Y')),
            'type_of_cooperation_id' => $this->type_of_cooperation_id,
            'type_of_cooperation_one_derivative_id' => $this->type_of_cooperation_one_derivative_id,
            'type_of_cooperation_two_derivative_id' => $this->type_of_cooperation_two_derivative_id,
            'substance_cooperation_id' => $this->substance_cooperation_id,
            'cooperastion_target_id' => $this->cooperastion_target_id,
            'target_of_cooperation_id' => $this->target_of_cooperation_id,
            'agencies_id' => $this->agencies_id,
            'country_id' => $this->country_id,
            'province_id' => $this->province_id,
            'regency_id' => $this->regency_id,
            'postal_code' => $this->postal_code,
            'address' => $this->address,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'nominal' => $this->nominal,
            'name' => $this->name,
            'ktp' => $this->ktp,
            'npwp' => $this->npwp,
            'siup' => $this->siup,
            'no_telp' => $this->no_telp,
            'email' => $this->email,
            'purpose_objectives' => $this->purpose_objectives,
            'background' => $this->background,
            'status_proposal' => $this->status_proposal,
            'status_disposition' => $this->status_disposition,
            'time_period_of' => $this->time_period_of,
            'time_period_to' => $this->time_period_to,
            'agency_profile' => $this->agency_profile,
            'proposal' => $this->proposal,
        ];
    }
}
