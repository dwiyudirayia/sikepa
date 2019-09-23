<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFAQRequest extends FormRequest
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
            'question' => 'required',
            'answere' => 'required'
        ];
    }
    public function attributes()
    {
        return [
            'question' => 'Pertanyaan',
            'answere' => 'Jawaban'
        ];
    }
    public function messages()
    {
        return [
            'question.requried' => ':attribute Tidak Boleh Kosong',
            'answere.requried' => ':attribute Tidak Boleh Kosong'
        ];
    }
    public function store()
    {
        return [
            'created_by' => 1,
            'question' => $this->question,
            'answere' => $this->answere
        ];
    }
}