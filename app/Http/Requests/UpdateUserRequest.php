<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\User;

class UpdateUserRequest extends FormRequest
{
    public function rules()
    {
        Validator::extend('without_spaces', function($attr, $value){
            return preg_match('/^\S*$/u', $value);
        });

        return [

        ];
    }
    public function attributes()
    {
        return [

        ];
    }
    public function messages()
    {
        return [

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
        $user = User::findOrFail($this->id);
        if($this->signature == null || $this->signature == 'null') {
            $pathSignature = '';
        } else {
            if($user->signature == $this->signature) {
                $pathSignature = $user->signature;
            } else {
                $extentionSignature = $this->signature->getClientOriginalExtension();
                $filenameSignature = 'signature'.'-'.date('Y-m-d').'-'.time().'.'.$extentionSignature;
                $pathSignature = $this->signature->storeAs($this->username, $filenameSignature, 'signature_user');
            }
        }

        if($this->photo == null || $this->photo == 'null') {
            $pathPhoto = '';
        } else {
            if($user->photo == $this->photo) {
                $pathPhoto = $user->photo;
            } else {
            $extentionPhoto = $this->photo->getClientOriginalExtension();
            $filenamePhoto = 'photo'.'-'.date('Y-m-d').'-'.time().'.'.$extentionPhoto;
            $pathPhoto = $this->photo->storeAs($this->username, $filenamePhoto, 'photo_user');
            }
        }
        return [
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'jabatan' => $this->jabatan,
            'photo' => $pathPhoto,
            'signature' => $pathSignature,
            'active' => 1
        ];
    }
}
