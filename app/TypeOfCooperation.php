<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeOfCooperation extends Model
{
    use SoftDeletes;
    protected $table = 'type_of_cooperation';
    protected $fillable = ['submission_type_id','created_by', 'updated_by', 'name'];

    public function proposal()
    {
        return $this->hasMany(SubmissionProposal::class);
    }
    public function typeOfCooperationOneDerivative()
    {
        return $this->hasMany(TypeOfCooperationOneDerivative::class, 'type_of_cooperation_id');
    }
}
