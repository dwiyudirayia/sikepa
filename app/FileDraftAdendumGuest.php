<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileDraftAdendumGuest extends Model
{
    protected $table = 'file_draft_adendum_guest';
    protected $fillable = ['adendum_guest_id','created_by','name'];
}
