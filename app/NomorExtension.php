<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NomorExtension extends Model
{
    protected $table = 'nomor_extension';
    protected $fillable = ['created_by','extension_id','nomor'];
}
