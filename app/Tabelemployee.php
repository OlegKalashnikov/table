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

    /*
     * Расчет при 8 часовом рабочем дне и 5 дневной рабочей недели
     * */
    public static function timeForBettingAtEight($time, $rate, $preholiday = 0){
        $functionTime = explode(':', $time);
        if($rate == 1){//норма 8 часов
            $temp[0] = $functionTime[0] * 60 * 60; //часы
            $temp[1] = $functionTime[1] * 60; //минуты
            return date("H:i", mktime(0,0,$temp[0]+$temp[1] - $preholiday));
        }elseif($rate == 0.75){
            $temp[0] = $functionTime[0] * 60 * 60 - 7200; //часы
            $temp[1] = $functionTime[1] * 60; //минуты
            return date("H:i", mktime(0,0,$temp[0]+$temp[1] - $preholiday));
        }elseif($rate == 0.5){
            $temp[0] = $functionTime[0] * 60 * 60 - 14400; //часы
            $temp[1] = $functionTime[1] * 60; //минуты
            return date("H:i", mktime(0,0,$temp[0]+$temp[1] - $preholiday));
        }elseif($rate == 0.25){
            $temp[0] = $functionTime[0] * 60 * 60 - 21600; //часы
            $temp[1] = $functionTime[1] * 60; //минуты
            return date("H:i", mktime(0,0,$temp[0]+$temp[1] - $preholiday));
        }
    }
}
