<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTypeOfCooperationRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Nama Jenis Kerjasama',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => ':attribute Harus di Isi',
        ];
    }

    public function update()
    {
        return [
            'updated_by' => 1,
            'name' => $this->name,
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
