<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubmissionProposal extends Model
{
    protected $table = 'submission_proposal';
    protected $fillable = ['created_by','updated_by','mailing_number','type_of_cooperation_id','type_of_cooperation_one_derivative_id','type_of_cooperation_two_derivative_id','agencies_id','countries_id','province_id','regency_id','postal_code','agency_name','address','latitude','longitude','nominal','purpose_objectives','background','status_proposal','status_disposition','time_period_of','time_period_to','agency_profile','proposal'];

    public function typeOfCooperation() {
        return $this->belongsTo(TypeOfCooperation::class);
    }
    public function typeOfCooperationOne() {
        return $this->belongsTo(TypeOfCooperationOneDerivative::class, 'type_of_cooperation_one_derivative_id');
    }
    public function typeOfCooperationTwo() {
        return $this->belongsTo(TypeOfCooperationTwoDerivative::class, 'type_of_cooperation_two_derivative_id');
    }
}
