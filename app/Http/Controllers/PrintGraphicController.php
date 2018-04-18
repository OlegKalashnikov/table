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
        //$viewGraphic;
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
        $graphics = Tabelemployee::where('department_id', $department_id)->where('month', $month)->where('user_id', $user_id)->get();
        $tmp = 0;
        $dataPrint = [];
        foreach($graphics as $key => $graphic){
            if($tmp == $graphic->myemployee_id){
                $dataPrint[$graphic->myemployee_id][] = $graphic->begining_of_the_work_day;
                $dataPrint[$graphic->myemployee_id][] = $graphic->end_of_the_work_day;
                $tmp = $graphic->myemployee_id;
            }else{
                $dataPrint[$graphic->myemployee_id][] = $graphic->begining_of_the_work_day;
                $dataPrint[$graphic->myemployee_id][] = $graphic->end_of_the_work_day;
            }

        }
        dd($dataPrint);
        return view('print.graphic.edit', [
            'graphics' => $dataPrint,
            'department' => Tabelemployee::department($department_id),
            'countDay' => $countDay,
        ]);
    }
}
