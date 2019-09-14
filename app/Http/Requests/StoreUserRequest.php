<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Validator;

class StoreUserRequest extends FormRequest
{
    public function rules()
    {
        Validator::extend('without_spaces', function($attr, $value){
            return preg_match('/^\S*$/u', $value);
        });

        return [
            'name' => 'required',
            'username' => 'required|without_spaces|unique:users,username|regex:/(^[A-Za-z0-9]+$)+/',
            'email' => 'required|email|unique:users,email|regex:/(^[A-Za-z0-9 ]+$)+/',
            'password' => 'required|min:6|confirmed'
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Nama',
            'email' => 'Alamat Email',
            'password' => 'Password',
            'username' => 'Username'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => ':attribute Harus di Isi',
            'username.required' => ':attribute Harus di Isi',
            'username.without_spaces' => ':attribute Jangan Ada Spasi',
            'username.unique' => ':attribute Tersebut Sudah Ada',
            'username.regex' => ':attribute Tidak Boleh Ada Symbol',
            'email.required' => ':attribute Harus di Isi',
            'email.email' => 'Format :attribute Tidak Sesuai',
            'email.unique' => ':attribute Sudah Ada',
            'email.regex' => ':attribute Tidak Boleh Ada Simbol',
            'password.required' => ':attribute Harus di Isi',
            'password.min' => 'Minimal :attribute :values',
            'password.confirmed' => ':attribute Tidak Sama Dengan Password Confirmation'
        ];
    }

    public function store()
    {
        return [
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'jabatan' => $this->jabatan,
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
