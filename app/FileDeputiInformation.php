<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileDeputiInformation extends Model
{
    protected $table = 'file_deputi_information';
    protected $fillable = ['deputi_information_id','name','file'];

    public function deputyInformation() {
        return $this->belongsTo(DeputiInformation::class);
    }
}
