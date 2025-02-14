<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSectionArticleRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|unique:section_article,name,'.$this->id.',id,deleted_at,null',
        ];
    }
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

    public function update()
    {
        return [
            'updated_by' => auth()->user()->id,
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
