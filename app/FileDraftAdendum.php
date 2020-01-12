<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileDraftAdendum extends Model
{
    protected $table = 'file_draft_adendum';
    protected $fillable = ['adendum_id','created_by','name'];
}
