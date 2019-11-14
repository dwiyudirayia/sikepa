<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTypeOfCooperationTwoDerivative extends FormRequest
{
    public function attributes()
    {
        return [
            'name' => 'Nama Turunan Jenis Kerjasama',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => ':attribute Harus di Isi',
        ];

    }
    public function rules()
    {
        return [
            'name' => 'required'
        ];
    }

    public function update()
    {
        return [
            'updated_by' => auth()->user()->id,
            'type_of_cooperation_id' => $this->type_of_cooperation_id,
            'type_of_cooperation_one_derivative_id' => $this->type_of_cooperation_one_derivative_id,
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
