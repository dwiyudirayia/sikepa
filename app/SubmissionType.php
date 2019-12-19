<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubmissionType extends Model
{
    protected $table = 'submission_type';
    protected $fillable = ['created_by','updated_by','name'];

    public function typeCooperation() {
        return $this->hasMany(TypeOfCooperation::class);
    }
}
