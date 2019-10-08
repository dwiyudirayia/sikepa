<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TargetOfCooperation extends Model
{
    use SoftDeletes;
    protected $table = 'target_of_cooperation';
    protected $fillable = ['created_by', 'updated_by', 'name'];

    public function proposal()
    {
        return $this->hasMany(SubmissionProposal::class);
    }
}
