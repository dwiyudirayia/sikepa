<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilePage extends Model
{
    protected $table = 'file_page';
    protected $fillable = ['created_by', 'updated_by', 'name', 'file'];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
