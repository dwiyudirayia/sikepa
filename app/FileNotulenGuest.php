<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileNotulenGuest extends Model
{
    protected $table = 'file_notulen_guest';
    protected $fillable = ['submission_proposal_guest_id','created_by','name'];
}
