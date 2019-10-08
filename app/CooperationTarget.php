<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CooperationTarget extends Model
{
    use SoftDeletes;

    protected $table = 'cooperation_target';
    protected $fillable = ['created_by', 'updated_by', 'name'];

    public function proposal()
    {
        return $this->hasMany(SubmissionProposal::class);
    }
}
