<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTestimoniRequest extends FormRequest
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
            'testimoni' => 'required'
        ];
    }
    public function attributes()
    {
        return [
            'testimoni' => 'Komentar'
        ];
    }
    public function messages()
    {
        return [
            'testimoni.requried' => ':attribute Tidak Boleh Kosong'
        ];
    }
    public function store()
    {
        return [
            'user_id' => auth()->user()->id,
            'testimoni' => $this->testimoni,
            'active' => 0
        ];
    }
}
