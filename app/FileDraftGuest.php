<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileDraftGuest extends Model
{
    protected $table = 'file_draft_guest';
    protected $fillable = ['submission_proposal_guest_id','created_by','name'];
}
