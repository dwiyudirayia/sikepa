<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class SubmissionProposalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'type_of_cooperation' => $this->typeOfCooperationOne->name,
            'type_of_application' => $this->typeOfCooperationTwo->name,
            'title_cooperation' => $this->title_cooperation,
            'country_name' => $this->country->country_name,
            'agencies' => $this->agencies->name,
            'agency_name' => $this->agency_name,
            'time_period' => $this->time_period,
            'year_duration' => (int) Carbon::createFromDate($this->created_at->format('Y'), $this->created_at->format('m'), $this->created_at->format('d'))->diff($this->expired_at)->format('%y'),
            'duration' => Carbon::createFromDate($this->created_at->format('Y'), $this->created_at->format('m'), $this->created_at->format('d'))->diff($this->expired_at)->format('%y Tahun %m Bulan dan %d Hari'),
            'status_disposition' => $this->status_disposition,
            'check_report' => $this->report()->exists(),
        ];
    }
}
