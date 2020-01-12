<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NomorExtensionGuest extends Model
{
    protected $table = 'nomor_extension_guest';
    protected $fillable = ['created_by','extension_guest_id','nomor'];
}
