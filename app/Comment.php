<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $table = 'comment';
    protected $fillable = ['created_by', 'updated_by', 'name', 'email', 'comment'];
}
