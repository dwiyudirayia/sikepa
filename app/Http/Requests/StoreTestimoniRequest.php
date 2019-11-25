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
        if($this->photo != "")
        {
            $photo = $this->photo;
            $name = time().'.' . explode('/', explode(':', substr($photo, 0, strpos($photo, ';')))[1])[1];
            \Image::make($this->photo)->save(public_path('testimoni/').$name);

            return [
                'created_by' => auth()->user()->id,
                'name' => $this->name,
                'job' => $this->job,
                'testimoni' => $this->testimoni,
                'active' => 0,
                'photo' => $name
            ];
        } else {
            return [
                'created_by' => auth()->user()->id,
                'testimoni' => $this->testimoni,
                'active' => 0,
            ];
        }
    }
}
