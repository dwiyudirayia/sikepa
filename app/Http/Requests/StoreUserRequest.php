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
            // 'email' => 'required|email|unique:users,email|regex:/(^[A-Za-z0-9 ]+$)+/',
            // 'password' => 'required|min:6|confirmed'
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
            'email.required' => ':attribute Harus di Isi',
            'email.email' => 'Format :attribute Tidak Sesuai',
            'password.required' => ':attribute Harus di Isi',
            'password.min' => 'Minimal :attribute :values',
        ];
    }

    public function store()
    {
        $extentionSignature = $this->signature->getClientOriginalExtension();
        $filenameSignature = 'file-page'.'-'.date('Y-m-d').'-'.time().'.'.$extentionSignature;
        $pathSignature = $this->signature->storeAs($this->username, $filenameSignature, 'signature_user');

        $extentionPhoto = $this->photo->getClientOriginalExtension();
        $filenamePhoto = 'file-page'.'-'.date('Y-m-d').'-'.time().'.'.$extentionPhoto;
        $pathPhoto = $this->signature->storeAs($this->username, $filenamePhoto, 'signature_user');

        return [
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'jabatan' => $this->jabatan,
            'photo' => $pathPhoto,
            'signature' => $pathSignature
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
