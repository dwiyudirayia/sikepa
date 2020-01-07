<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreMonevActivitySatkerGuestRequest extends FormRequest
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
            //
        ];
    }
    public function store() {
        return [
            'title_activity' => $this->title_activity,
            'implementation_date' => $this->implementation_date,
            'location' => $this->location,
            'description_activities' => $this->description_activities,
            'result_status' => (int) $this->result_status,
        ];
    }
}
