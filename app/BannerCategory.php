<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BannerCategory extends Model
{
    protected $table = 'banner_category';
    protected $fillable = ['created_by', 'updated_by', 'name'];

    public function banners()
    {
        return $this->hasMany(Banner::class);
    }
}
