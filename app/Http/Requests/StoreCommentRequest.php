<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
{

    public function messages()
    {
        return [
            'name.required' => 'Nama Harus di Isi',
            'email.required' => 'Email Harus di Isi',
            'comment.required' => 'Komentar Harus di Isi',
        ];
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'comment' => 'required',
        ];
    }

    public function store()
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'comment' => $this->comment,
        ];
    }

    public function authorize()
    {
        return true;
    }
}
