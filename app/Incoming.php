<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incoming extends Model
{
    public function type(){
        return $this->belongsTo(\App\MetaType::class, 'metatype_id');
    }
}
