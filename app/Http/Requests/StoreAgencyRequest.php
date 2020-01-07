<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAgencyRequest extends FormRequest
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
            'status' => 'required',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Nama Instansi',
            'status' => 'Status',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => ':attribute Harus di Isi',
            'status.required' => ':attribute Harus di Isi',
        ];
    }
    public function store()
    {
        return [
            'created_by' => auth()->user()->id,
            'name' => $this->name,
            'status' => $this->status,
        ];
    }
}
