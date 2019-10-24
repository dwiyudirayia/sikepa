<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeOfCooperationOneDerivative extends Model
{
    protected $table = 'type_of_cooperation_one_derivative';
    protected $fillable = ['type_of_cooperation_id', 'created_by', 'updated_by', 'name'];

    public function typeOfCooperation()
    {
        return $this->belongsTo(TypeOfCooperation::class);
    }
    public function typeOfCooperationTwoDerivative()
    {
        return $this->hasMany(TypeOfCooperationTwoDerivative::class, 'type_of_cooperation_one_derivative_id');
    }
}
