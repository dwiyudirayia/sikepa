<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class DeputiPICGuest extends Model
{
    protected $table = 'deputi_pic_guest';
    protected $fillable = ['submission_proposal_guest_id','role_id','status', 'approval', 'reason'];

    public function proposal() {
        return $this->belongsTo(SubmissionProposal::class);
    }
    public function role() {
        return $this->belongsTo(Role::class);
    }
}
