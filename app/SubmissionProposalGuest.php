<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubmissionProposalGuest extends Model
{
    protected $table = 'submission_proposal_guest';
    protected $fillable = ['type_guest_id','mailing_number','title_cooperation','type_of_cooperation_id','type_of_cooperation_one_derivative_id','type_of_cooperation_two_derivative_id','agencies_id','countries_id','province_id','regency_id','postal_code','address','latitude','longitude','nominal','name','department','ktp','npwp','siup','no_telp','agency_name','address','email','purpose_objectives','background','status_proposal','status_disposition','time_period','agency_profile','proposal','status_barcode'];

    public function deputi() {
        return $this->hasMany(DeputiPICGuest::class);
    }
    public function tracking() {
        return $this->hasOne(TrackingSubmissionProposalGuest::class);
    }

}
