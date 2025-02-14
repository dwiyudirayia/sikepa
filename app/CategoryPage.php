<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryPage extends Model
{
    use SoftDeletes;

    protected $table = 'category_page';
    protected $fillable = ['created_by', 'updated_by', 'section_id', 'name'];

    public function pages()
    {
        return $this->hasMany(Page::class, 'category_id');
    }
    public function section()
    {
        return $this->belongsTo(SectionPage::class, 'section_id');
    }
}
