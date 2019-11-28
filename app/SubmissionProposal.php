<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubmissionProposal extends Model
{
    protected $table = 'submission_proposal';
    protected $fillable = ['type_id', 'created_by','updated_by','mailing_number','title_cooperation','type_of_cooperation_id','type_of_cooperation_one_derivative_id','type_of_cooperation_two_derivative_id','agencies_id','countries_id','province_id','regency_id','postal_code','agency_name','address','latitude','longitude','nominal','purpose_objectives','background','status_proposal','status_disposition','time_period','agency_profile','proposal'];

    public function user() {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function country() {
        return $this->belongsTo(Country::class, 'countries_id');
    }
    public function province() {
        return $this->belongsTo(Province::class, 'province_id');
    }
    public function regency() {
        return $this->belongsTo(Regency::class, 'regency_id');
    }
    public function agencies() {
        return $this->belongsTo(Agency::class);
    }
    public function typeOfCooperation() {
        return $this->belongsTo(TypeOfCooperation::class);
    }
    public function typeOfCooperationOne() {
        return $this->belongsTo(TypeOfCooperationOneDerivative::class, 'type_of_cooperation_one_derivative_id');
    }
    public function typeOfCooperationTwo() {
        return $this->belongsTo(TypeOfCooperationTwoDerivative::class, 'type_of_cooperation_two_derivative_id');
    }
    public function tracking() {
        return $this->hasOne(TrackingSubmissionProposal::class);
    }
    public function law() {
        return $this->hasOne(LawFileSubmissionProposal::class);
    }
    public function nomor() {
        return $this->hasMany(NomorApprovalSubmissionCooperation::class);
    }
    public function deputi() {
        return $this->hasMany(DeputiPIC::class);
    }
}
