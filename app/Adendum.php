<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adendum extends Model
{
    protected $table = 'adendum_proposal';
    protected $fillable = ['submission_proposal_id','created_by','updated_by','mailing_number','title_cooperation','type_of_cooperation_one_derivative_id','type_of_cooperation_two_derivative_id','agencies_id','countries_id','province_id','regency_id','postal_code','agency_name','address','latitude','longitude','background','status_proposal','status_disposition','time_period','agency_profile','proposal', 'expired_at'];
    // protected $fillable = ['type_id', 'created_by','updated_by','mailing_number','title_cooperation','type_of_cooperation_id','type_of_cooperation_one_derivative_id','type_of_cooperation_two_derivative_id','agencies_id','countries_id','province_id','regency_id','postal_code','agency_name','address','latitude','longitude','nominal','purpose_objectives','background','status_proposal','status_disposition','time_period','agency_profile','proposal'];

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
    // public function typeOfCooperation() {
    //     return $this->belongsTo(TypeOfCooperation::class);
    // }
    public function typeOfCooperationOne() {
        return $this->belongsTo(TypeOfCooperationOneDerivative::class, 'type_of_cooperation_one_derivative_id');
    }
    public function typeOfCooperationTwo() {
        return $this->belongsTo(TypeOfCooperationTwoDerivative::class, 'type_of_cooperation_two_derivative_id');
    }
    public function tracking() {
        return $this->hasMany(TrackingAdendum::class);
    }
    public function deputi() {
        return $this->hasMany(DeputiPICAdendum::class);
    }
    public function monevActivity() {
        return $this->hasMany(MonitoringActivityAdendum::class);
    }
    public function draft() {
        return $this->hasMany(FileDraftAdendum::class);
    }
    public function notulen() {
        return $this->hasMany(FileNotulenAdendum::class);
    }
    public function nomor() {
        return $this->hasMany(NomorAdendum::class);
    }
    public function report() {
        return $this->hasOne(ReportAdendum::class);
    }
    public function mou() {
        return $this->belongsTo(SubmissionProposal::class, 'submission_proposal_id');
    }
}
