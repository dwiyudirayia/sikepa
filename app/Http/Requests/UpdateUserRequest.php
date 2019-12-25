<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Validator;

class UpdateUserRequest extends FormRequest
{
    public function rules()
    {
        Validator::extend('without_spaces', function($attr, $value){
            return preg_match('/^\S*$/u', $value);
        });

        return [
            'name' => 'required',
            'username' => 'required|without_spaces|unique:users,username,'.$this->id.'',
            'email' => 'required|email|unique:users,email,'.$this->id.'',
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
            'username.unique' => ':attribute Sudah Digunakan',
            'email.required' => ':attribute Harus di Isi',
            'email.email' => 'Format :attribute Tidak Sesuai',
            'email.unique' => ' attribute Sudah Digunakan',
            'password.required' => ':attribute Harus di Isi',
            'password.min' => 'Minimal :attribute :values',
            'nip.required' => ':attribute Harus di Isi',
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

    public function update()
    {
        // if($this->signature == null || $this->signature == 'null') {
        //     $pathSignature = '';
        // } else {
        //     if($user->signature == $this->signature) {
        //         $pathSignature = $user->signature;
        //     } else {
        //         $extentionSignature = $this->signature->getClientOriginalExtension();
        //         $filenameSignature = 'signature'.'-'.date('Y-m-d').'-'.time().'.'.$extentionSignature;
        //         $pathSignature = $this->signature->storeAs($this->username, $filenameSignature, 'signature_user');
        //     }
        // }

        if($this->hasFile('photo')) {
            $extentionPhoto = $this->photo->getClientOriginalExtension();
            $filenamePhoto = 'photo'.'-'.date('Y-m-d').'-'.time().'.'.$extentionPhoto;
            $pathPhoto = $this->photo->storeAs($this->username, $filenamePhoto, 'photo_user');

            return [
                'updated_by' => auth()->user()->id,
                'name' => $this->name,
                'username' => $this->username,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'jabatan' => $this->jabatan,
                'photo' => $pathPhoto,
                // 'signature' => $pathSignature,
                'nip' => $this->nip,
            ];
        } else {
            return [
                'updated_by' => auth()->user()->id,
                'name' => $this->name,
                'username' => $this->username,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'jabatan' => $this->jabatan,
                // 'signature' => $pathSignature,
                'nip' => $this->nip,
            ];
        }
    }
}
