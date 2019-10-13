<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAgencyRequest extends FormRequest
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
            'name' => 'required',
            // 'latitude' => 'required|regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/',
            // 'longitude' => 'required|regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Nama Instansi',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => ':attribute Harus di Isi',
            'latitude.required' => ':attribute Harus di Isi',
            'latitude.regex' => ':attribute Tidak Sesuai',
            'longitude.required' => ':attribute Harus di Isi',
            'longitude.regex' => ':attribute Tidak Sesuai',
        ];
    }
    public function update()
    {
        return [
            'updated_by' => 1,
            'name' => $this->name,
            'address' => $this->address,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
        ];
    }
}
