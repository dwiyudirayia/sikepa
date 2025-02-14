<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class SectionPage extends Model
{
    use SoftDeletes;

    protected $table = 'section_page';
    protected $fillable = ['created_by', 'updated_by', 'name'];

    public function categories()
    {
        return $this->hasMany(CategoryPage::class, 'section_id');
    }
    public function pages()
    {
        return $this->hasMany(Page::class);
    }
}
