<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class CategoryArticle extends Model
{
    use SoftDeletes;

    protected $table = 'category_article';
    protected $fillable = ['created_by', 'updated_by', 'section_id', 'name'];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
    public function section()
    {
        return $this->belongsTo(SectionArticle::class, 'section_id');
    }
}
