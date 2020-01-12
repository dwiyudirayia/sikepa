<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileNotulenExtensionGuest extends Model
{
    protected $table = 'file_notulen_extension_guest';
    protected $fillable = ['extension_guest_id','created_by','name'];
}
