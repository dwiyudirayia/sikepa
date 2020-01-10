<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileDraft extends Model
{
    protected $table = 'file_draft';
    protected $fillable = ['submission_proposal_id','created_by','name'];
}
