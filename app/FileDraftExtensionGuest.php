<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileDraftExtensionGuest extends Model
{
    protected $table = 'file_draft_extension_guest';
    protected $fillable = ['extension_guest_id','created_by','name'];
}
