<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SatisfactionSurvey extends Model
{
    protected $table = 'satisfaction_survey';
    protected $fillable = ['email','survey','verified', 'token'];
}
