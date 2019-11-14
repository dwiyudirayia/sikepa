<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMonevActivityRequest extends FormRequest
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
            'created_by' => auth()->user()->id,
            'approval_old_submission_cooperation_id' => (int)$this->approval_old_submission_cooperation_id,
            'implementation_of_activity_reports' => $this->implementation_of_activity_reports,
            'activity_result' => $this->activity_result,
            'year' => $this->year,
            'budget' => $this->budget,
            'target' => $this->target,
            'achievements' => $this->achievements,
            'the_problem' => $this->the_problem,
            'problem_solving_efforts' => $this->problem_solving_efforts,
            'field_trip_information' => $this->field_trip_information,
            'evaluation' => $this->evaluation,
            'recomendation' => $this->recomendation,
        ];
    }
}
