<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Incoming extends Model
{
    
    protected $fillable = ['metatype_id', 'value', 'due_date', 'paid_date', 'description'];
    protected $dates = ['due_date', 'paid_date'];


    public function type()
    {
        return $this->belongsTo(MetaType::class, 'metatype_id');
    }
    
    public function setDueDateAttribute($value)
    {
        $this->attributes['due_date'] = Carbon::createFromFormat('d/m/Y', $value);
    }
    
    public function setPaidDateAttribute($value)
    {
        $this->attributes['receive_date'] = Carbon::createFromFormat('d/m/Y', $value);
    }
}
