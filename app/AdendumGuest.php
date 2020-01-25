<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdendumGuest extends Model
{
    protected $table = 'adendum_proposal_guest';
    protected $fillable = ['submission_proposal_guest_id','mailing_number','title_cooperation','type_of_cooperation_one_derivative_id','type_of_cooperation_two_derivative_id','agencies_id','countries_id','province_id','regency_id','postal_code','address','latitude','longitude','name','department','ktp','npwp','siup','no_telp','agency_name','address','email','background','status_proposal','status_disposition','time_period','agency_profile','proposal','status_barcode','reject_dana', 'expired_at'];
    // protected $fillable = ['type_guest_id','mailing_number','title_cooperation','type_of_cooperation_id','type_of_cooperation_one_derivative_id','type_of_cooperation_two_derivative_id','agencies_id','countries_id','province_id','regency_id','postal_code','address','latitude','longitude','nominal','name','department','ktp','npwp','siup','no_telp','agency_name','address','email','purpose_objectives','background','status_proposal','status_disposition','time_period','agency_profile','proposal','status_barcode','reject_dana'];

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
    public function draft() {
        return $this->hasMany(FileDraftAdendumGuest::class);
    }
    public function notulen() {
        return $this->hasMany(FileNotulenAdendumGuest::class);
    }
    public function typeOfCooperationOne() {
        return $this->belongsTo(TypeOfCooperationOneDerivative::class, 'type_of_cooperation_one_derivative_id');
    }
    public function typeOfCooperationTwo() {
        return $this->belongsTo(TypeOfCooperationTwoDerivative::class, 'type_of_cooperation_two_derivative_id');
    }
    public function deputi() {
        return $this->hasMany(DeputiPICAdendumGuest::class);
    }
    public function tracking() {
        return $this->hasMany(TrackingAdendumGuest::class);
    }
    public function nomor() {
        return $this->hasMany(NomorAdendumGuest::class);
    }
    public function monevActivity() {
        return $this->hasMany(MonitoringActivityAdendumGuest::class);
    }
    public function report() {
        return $this->hasOne(ReportAdendumGuest::class);
    }
    public function mou() {
        return $this->belongsTo(SubmissionProposalGuest::class, 'submission_proposal_guest_id');
    }
}
