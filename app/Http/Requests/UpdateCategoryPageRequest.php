<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryPageRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|unique:category_article,name,'.$this->id.',id,deleted_at,NULL,section_id,'.$this->section_id,
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Nama Kategori',
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
            'section_id' => (int) $this->section_id,
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
