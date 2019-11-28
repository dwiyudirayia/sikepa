<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class DeputiPIC extends Model
{
    protected $table = 'deputi_pic';
    protected $fillable = ['submission_proposal_id','role_id','status'];

    public function proposal() {
        return $this->belongsTo(SubmissionProposal::class);
    }
    public function role() {
        return $this->hasOne(Role::class, 'id');
    }
}
