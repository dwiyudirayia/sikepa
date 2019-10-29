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
            'email' => 'required|email|unique:users,email',
            'nip' => 'required',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Nama',
            'email' => 'Alamat Email',
            'password' => 'Password',
            'username' => 'Username',
            'nip' => 'NIP'
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
            'password.confirmed' => ':attribute Tidak Sama Dengan Password Konfirmasi',
            'nip.required' => ':attribute Harus di Isi',
        ];
    }

    public function store()
    {
        if($this->signature == null || $this->signature == 'null') {
            $pathSignature = '';
        } else {
            $extentionSignature = $this->signature->getClientOriginalExtension();
            $filenameSignature = 'signature'.'-'.date('Y-m-d').'-'.time().'.'.$extentionSignature;
            $pathSignature = $this->signature->storeAs($this->username, $filenameSignature, 'signature_user');

        }

        if($this->photo == null || $this->photo == 'null') {
            $pathPhoto = '';
        } else {
            $extentionPhoto = $this->photo->getClientOriginalExtension();
            $filenamePhoto = 'photo'.'-'.date('Y-m-d').'-'.time().'.'.$extentionPhoto;
            $pathPhoto = $this->signature->storeAs($this->username, $filenamePhoto, 'photo_user');
        }
        return [
            'created_by' => request()->user()->id,
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'nip' => $this->nip,
            'jabatan' => $this->jabatan,
            'photo' => $pathPhoto,
            'signature' => $pathSignature,
            'active' => 1
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
