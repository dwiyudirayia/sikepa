<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'article';
    protected $fillable = ['created_by', 'updated_by', 'section_id', 'category_id', 'title', 'url', 'content', 'image', 'seo_title', 'seo_meta_key', 'seo_meta_desc', 'publish', 'approved'];

    public function category()
    {
        return $this->belongsTo(CategoryArticle::class);
    }
    public function section()
    {
        return $this->belongsTo(SectionArticle::class);
    }
}
