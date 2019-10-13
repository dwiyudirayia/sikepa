<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubmissionProposal extends Model
{
    protected $table = 'submission_proposal';
    protected $fillable = ['created_by', 'updated_by', 'mailing_number', 'type_of_cooperation_id','substance_cooperation_id','cooperastion_target_id','target_of_cooperation_id','category_id','agencies_id','nominal','name','ktp','npwp','siup','no_telp','email','purpose_objectives','background','status_proposal','status_disposition','time_period_of','time_period_to','agency_profile','proposal'];


}
