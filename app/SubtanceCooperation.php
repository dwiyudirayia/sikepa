<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubtanceCooperation extends Model
{
    use SoftDeletes;
    protected $table = 'substance_cooperation';
    protected $fillable = ['created_by', 'updated_by', 'name'];

    public function proposal()
    {
        return $this->hasMany(SubmissionProposal::class);
    }
}
