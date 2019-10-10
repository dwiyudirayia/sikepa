<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banner';
    protected $fillable = ['created_by','updated_by','category_id','image_path','description'];

    public function category() {
        return $this->belongsTo(BannerCategory::class);
    }
}
