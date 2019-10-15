<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCooperationTargetRequest extends FormRequest
{
    public function attributes()
    {
        return [
            'name' => 'Nama Target Kerjasama',
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

    public function store()
    {
        return [
            'created_by' => request()->user()->id,
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
