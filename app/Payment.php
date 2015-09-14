<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    
    protected $fillable = ['metatype_id', 'value', 'due_date', 'paid_day', 'description'];
    
    protected $dateFormat = 'd-m-Y H:i:s';

    public function type(){
        return $this->belongsTo(\App\MetaType::class, 'metatype_id');
    }
}
