<?php

namespace App\Http\Controllers;

use App\Employeeabsence;
use App\Holiday;
use App\Printgraphic;
use App\Tabelemployee;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PrintGraphicController extends Controller
{
    public function index(){
        $user_id = Auth::user()->id;
        $month = Carbon::now()->format('m');
        $grapthics = DB::table('tabelemployees')
                        ->select('department_id', 'month')
                        ->where('user_id', $user_id)
                        ->where('month', $month*1)
                        ->groupBy('department_id', 'month')->get();
        return view('print.graphic.show', [
            'graphics' => $grapthics,
        ]);
    }

    public function showGraphic($department_id, $month){
        $user_id = Auth::user()->id;
        $date = Carbon::createFromDate(2018, $month, 01);
        $countDay = $date->daysInMonth;
        $firstDay = $date->firstOfMonth()->format('Y-m-d');
        $endDay = $date->lastOfMonth()->format('Y-m-d');
        $graphics = Tabelemployee::where('department_id', $department_id)->where('month', $month)->where('user_id', $user_id)->get();
        $absences = Employeeabsence::where('from', '>=', $firstDay)->where('before', '<=', $endDay)->where('user_id', $user_id)->get();
        foreach($graphics as $graphic){
            foreach($absences as $absence){
                if($absence->from <= $graphic->date && $absence->before >= $graphic->date && $absence->myemployee_id == $graphic->myemployee_id){
                    $data = Tabelemployee::find($graphic->id);
                    $data->update([
                        'hours_per_day' => Employeeabsence::reduction($absence->absence_id),
                    ]);
                }
            }
        }
        $graphics = Tabelemployee::select('myemployee_id', 'department_id', 'begining_of_the_work_day', 'end_of_the_work_day')->where('department_id', $department_id)->where('month', $month)->where('user_id', $user_id)->get();
        print("<pre>");
        print_r($graphics);
        print("</pre>");
//        foreach($graphics as $graphic){
//            //$tmp[$graphic->myemployee_id][] = $graphic->department_id;
////            $tmp[$graphic->myemployee_id][] = $graphic->month;
////            $tmp[$graphic->myemployee_id][] = $graphic->hours_per_day;
////            $tmp[$graphic->myemployee_id][] = $graphic->number_of_working_days;
//            $tmp[$graphic->myemployee_id][$graphic->date][] = $graphic->begining_of_the_work_day;
//            $tmp[$graphic->myemployee_id][$graphic->date][] = $graphic->end_of_the_work_day;
////            $tmp[$graphic->myemployee_id][] = $graphic->monthly_rate_of_hours;
//        }
//        dd($tmp);
//        return view('print.graphic.edit', [
//            'graphics' => $graphics,
//            'department' => Tabelemployee::department($department_id),
//            'countDay' => $countDay,
//            'number' => 1,
//        ]);
    }
}
