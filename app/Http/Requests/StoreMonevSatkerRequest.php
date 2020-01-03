<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMonevSatkerRequest extends FormRequest
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
            //
        ];
    }
    public function store() {
        return [
            'mailing_number' => "Surat-".strtotime("now"),
            'title_cooperation' => $this->title_cooperation,
            'type_of_cooperation_one_derivative_id' => $this->type_of_cooperation_one_derivative_id == "null" ? null : $this->type_of_cooperation_one_derivative_id,
            'type_of_cooperation_two_derivative_id' => $this->type_of_cooperation_two_derivative_id == "null" ? null : $this->type_of_cooperation_two_derivative_id,
            'agencies_id' => $this->agencies_id,
            'countries_id' => $this->country_id == "null" ? null : $this->country_id,
            'province_id' => $this->province_id == "null" ? null : $this->province_id,
            'regency_id' => $this->regency_id == "null" ? null : $this->regency_id,
            'postal_code' => $this->postal_code,
            'agency_name' => $this->agency_name,
            'address' => $this->address,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            // 'nominal' => $this->nominal,
            // 'purpose_objectives' => $this->purpose_objectives,
            'background' => $this->background,
            'time_period' => $this->time_period,
            'email' => $this->email,
            'file_pengajuan' => $this->file_pengajuan,
            'status_disposition' => 17,
            'status_proposal' => 1,
        ];
    }
}
