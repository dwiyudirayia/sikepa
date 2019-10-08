<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryProposal extends Model
{
    use SoftDeletes;

    protected $table = 'category_proposal';
    protected $fillable = ['created_by', 'updated_by', 'name'];

    public function proposal()
    {
        return $this->hasMany(SubmissionProposal::class);
    }
}
