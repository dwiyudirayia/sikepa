<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BannerLandingPage extends Model
{
    protected $table = 'front_banner_landing_page';
    protected $filable = ['created_by','updated_by','image_path'];
}
