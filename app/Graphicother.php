<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Graphicother extends Model
{
    protected $fillable = [
        'name',
        'month',
        'hours_per_day',
        'number_of_working_days',
        'from',
        'before',
        'rate',
        'date',
        'user_id',
        'myemployee_id',
    ];
}
