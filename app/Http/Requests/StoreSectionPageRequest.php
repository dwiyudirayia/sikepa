<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSectionPageRequest extends FormRequest
{
    public function attributes()
    {
        return [
            'name' => 'Nama Section',
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
            'name' => 'required|unique:section_article,name,NULL,id,deleted_at,NULL',
        ];
    }

    public function store()
    {
        return [
            'created_by' => 1,
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
