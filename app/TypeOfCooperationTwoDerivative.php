<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeOfCooperationTwoDerivative extends Model
{
    protected $table = 'type_of_cooperation_two_derivative';
    protected $fillable = ['type_of_cooperation_one_derivative_id', 'created_by', 'updated_by', 'name'];

    public function typeOfCooperationOneDerivative()
    {
        return $this->belongsTo(TypeOfCooperationOneDerivative::class);
    }
}
