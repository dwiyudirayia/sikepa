<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExtensionGuest extends Model
{
    protected $table = 'extension_proposal_guest';
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
        return $this->hasMany(FileDraftExtensionGuest::class);
    }
    public function notulen() {
        return $this->hasMany(FileNotulenExtensionGuest::class);
    }
    public function typeOfCooperationOne() {
        return $this->belongsTo(TypeOfCooperationOneDerivative::class, 'type_of_cooperation_one_derivative_id');
    }
    public function typeOfCooperationTwo() {
        return $this->belongsTo(TypeOfCooperationTwoDerivative::class, 'type_of_cooperation_two_derivative_id');
    }
    public function deputi() {
        return $this->hasMany(DeputiPICExtensionGuest::class);
    }
    public function tracking() {
        return $this->hasMany(TrackingExtensionGuest::class);
    }
    public function nomor() {
        return $this->hasMany(NomorApprovalSubmissionCooperationGuest::class);
    }
    public function law() {
        return $this->hasOne(LawFileSubmissionProposalGuest::class);
    }
    public function monevActivity() {
        return $this->hasMany(MonitoringActivityExtensionGuest::class);
    }
}
