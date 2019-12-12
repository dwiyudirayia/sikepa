<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDeputiInformationRequest extends FormRequest
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

        ];
    }
    public function update() {
        return [
            'title' => $this->title,
            'url' => Str::slug($this->title, '-'),
            'text_contact' => $this->text_contact,
            'full_text_information' => $this->full_text_information,
            'text_information' => $this->text_information,
            'text_requirement' => $this->text_requirement,
            'text_video' => $this->text_video,
        ];
    }
}
