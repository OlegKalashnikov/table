<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tabelemployee extends Model
{
    protected $fillable = [
      'user_id',
      'myemployee_id',
      'department_id',
      'month',
      'hours_per_day',
      'number_of_working_days',
      'begining_of_the_work_day',
      'end_of_the_work_day',
      'monthly_rate_of_hours',
      'date',
    ];
}
