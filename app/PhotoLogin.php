<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotoLogin extends Model
{
    protected $table = 'front_photo_login';
    protected $filable = ['created_by','updated_by','image_path'];
}
