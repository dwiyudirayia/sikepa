<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryArticleRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|unique:category_article,name,'.$this->id.'',
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
            'created_by' => 1,
            'section_id' => $this->section_id,
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
