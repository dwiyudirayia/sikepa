<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryArticle extends Model
{
    protected $table = 'category_articles';
    protected $fillable = ['created_by', 'updated_by', 'name'];

    public function articles()
    {
        return $this->hasMany(ArticleModel::class);
    }
}
