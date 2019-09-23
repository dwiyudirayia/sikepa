<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    protected $table = 'faq';
    protected $fillable = ['created_by', 'updated_by', 'question', 'answere'];
}
