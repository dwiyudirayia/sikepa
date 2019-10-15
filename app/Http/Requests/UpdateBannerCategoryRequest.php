<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBannerCategoryRequest extends FormRequest
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
            'name' => 'Nama Kategori Banner',
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
            'updated_by' => request()->user()->id,
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
