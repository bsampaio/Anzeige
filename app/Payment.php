<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Carbon\Carbon;

class Payment extends Model
{
    protected $fillable = ['metatype_id', 'value', 'due_date', 'paid_date', 'description'];
    protected $dates = ['due_date', 'paid_date'];

    public function type(){
        return $this->belongsTo(\App\MetaType::class, 'metatype_id');
    }
    
    public function setDueDateAttribute($value)
    {
        $this->attributes['due_date'] = Carbon::createFromFormat('d/m/Y', $value);
    }
    
    public function setPaidDateAttribute($value)
    {
        $this->attributes['paid_date'] = Carbon::createFromFormat('d/m/Y', $value);
    }
}
