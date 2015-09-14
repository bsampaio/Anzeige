<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MetaType extends Model
{
    protected $table = 'metatypes';
    protected $fillable = ['value', 'type'];
}
