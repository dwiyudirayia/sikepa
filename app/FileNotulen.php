<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileNotulen extends Model
{
    protected $table = 'file_notulen';
    protected $fillable = ['submission_proposal_id','created_by','name'];
}
