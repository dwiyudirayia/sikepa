<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeOfCooperation extends Model
{
    use SoftDeletes;
    protected $table = 'type_of_cooperation';
    protected $fillable = ['created_by', 'updated_by', 'name'];

    public function proposal()
    {
        return $this->hasMany(SubmissionProposal::class);
    }
}
