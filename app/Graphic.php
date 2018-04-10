<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Graphic extends Model
{
    protected $fillable = ['myemployee_id', 'monthly_rate', 'date', 'from', 'before'];
}
