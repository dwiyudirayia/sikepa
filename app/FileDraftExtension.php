<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileDraftExtension extends Model
{
    protected $table = 'file_draft_extension';
    protected $fillable = ['extension_id','created_by','name'];
}
