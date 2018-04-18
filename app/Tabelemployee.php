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

    public static function department($department_id){
        return Department::where('id', $department_id)->value('department');
    }

    public static function month($id){
        switch($id){
            case '1': return 'Январь';
            case '2': return 'Февраль';
            case '3': return 'Март';
            case '4': return 'Апрель';
            case '5': return 'Май';
            case '6': return 'Июнь';
            case '7': return 'Июль';
            case '8': return 'Август';
            case '9': return 'Сентябрь';
            case '10': return 'Октябрь';
            case '11': return 'Ноябрь';
            case '12': return 'Декабрь';
        }
    }
}
