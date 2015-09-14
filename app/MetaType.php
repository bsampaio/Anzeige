<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MetaType extends Model
{
    protected $table = 'metatypes';
    protected $fillable = ['value', 'type'];
    
    public function payments(){
        return $this->hasMany(\App\Payment::class, 'metatype_id');
    }
    
    public function incomings(){
        return $this->hasMany(\App\Incoming::class, 'metatype_id');
    }
}
