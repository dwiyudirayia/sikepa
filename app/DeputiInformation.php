<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeputiInformation extends Model
{
    protected $table = 'deputi_information';
    protected $fillable = ['title','url','photo_contact','text_contact','photo_information','full_text_information', 'text_information','photo_requirement','text_requirement','type_video', 'photo_video','text_video'];

    public function file() {
        return $this->hasMany(FileDeputiInformation::class);
    }
}
