<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMonevActivitySatkerRequest extends FormRequest
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
            'submission_proposal_id' => $this->id,
            'budget' => $this->budget == "null" ? 0 : $this->budget,
            'target' => $this->target,
            'reach' => $this->reach,
            'problem' => $this->problem,
            'problem_solving' => $this->problem_solving,
            'report' => $this->report,
        ];
    }
}
