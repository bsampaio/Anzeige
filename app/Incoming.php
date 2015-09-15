<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incoming extends Model
{
    
    protected $dates = ['due_date', 'paid_day'];
    protected $fillable = [];


    public function type()
    {
        return $this->belongsTo(\App\MetaType::class, 'metatype_id');
    }
}
