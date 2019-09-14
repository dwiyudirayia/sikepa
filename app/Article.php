<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    protected $fillable = ['created_by', 'updated_by', 'category_id', 'title', 'url', 'content', 'seo_title', 'seo_meta_key', 'seo_meta_desc', 'publish', 'approved'];

    public function category()
    {
        return $this->belongsTo(CategoryArticleModel::class);
    }
}
