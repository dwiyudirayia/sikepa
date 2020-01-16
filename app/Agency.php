<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    protected $table = 'agencies';
    protected $fillable = ['created_by','updated_by','name', 'status'];

    public function mou() {
        return $this->hasMany(SubmissionProposal::class, 'agencies_id');
    }
    public function mouGuest() {
        return $this->hasMany(SubmissionProposalGuest::class, 'agencies_id');
    }
    public function adendum() {
        return $this->hasMany(Adendum::class, 'agencies_id');
    }
    public function adendumGuest() {
        return $this->hasMany(AdendumGuest::class, 'agencies_id');
    }
    public function extension() {
        return $this->hasMany(Extension::class, 'agencies_id');
    }
    public function extensionGuest() {
        return $this->hasMany(ExtensionGuest::class, 'agencies_id');
    }
}
