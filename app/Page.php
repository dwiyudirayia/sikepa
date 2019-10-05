<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'page';
    protected $fillable = ['created_by', 'updated_by', 'section_id', 'category_id', 'title', 'url', 'short_content', 'content', 'image', 'seo_title', 'seo_meta_key', 'seo_meta_desc', 'publish', 'approved'];

    public function category()
    {
        return $this->belongsTo(CategoryPage::class);
    }
    public function section()
    {
        return $this->belongsTo(SectionPage::class);
    }
    public function files()
    {
        return $this->hasMany(FilePage::class, 'page_id');
    }
}
