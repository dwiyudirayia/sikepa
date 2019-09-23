<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SectionArticle extends Model
{
    use SoftDeletes;
    
    protected $table = 'section_article';
    protected $fillable = ['created_by', 'updated_by', 'name'];
    
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
    public function categories()
    {
        return $this->hasMany(CategoryArticle::class);
    }
}
