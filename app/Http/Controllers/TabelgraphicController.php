<?php

namespace App\Http\Controllers;

use App\Graphicother;
use App\Holiday;
use App\Myemployee;
use App\Tabelgraphic;
use App\Type;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TabelgraphicController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        if(User::role() == 1){
            $graphic = Tabelgraphic::orderBy('user_id', 'asc')->get();
        }else{
            $graphic = Tabelgraphic::where('user_id', Auth::user()->id)->get();
        }

        return view('graphics.show', [
            'graphics' => $graphic,
            'types' => Type::all(),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showFormCreateOther(){
        $user_id = Auth::user()->id;
        $month = Carbon::now()->format('m');
        $myemployees = Myemployee::where('user_id', $user_id)->get();
        return view('graphics.other.create', [
            'myemployees' => $myemployees,
            'month' => $month,
        ]);
    }

    public function storeOther(Request $request){
        //dd($request->all());
        request()->validate([
            'name' => 'required',
            'month' => 'required',
            'hours_per_day' => 'required',
            'number_of_working_days' => 'required',
            'from' => 'required',
            'before' => 'required',
        ]);

        /*
         * id Пользователя, который добавляет запись
         * */
        $user_id = Auth::user()->id;
        /*
         * Начало рабочего дня
         * */
        $from = $request->from;
        /*
         * Конец рабочего дня
         * */
        $before = $request->before;
        $daysInMonth = Carbon::now()->daysInMonth; //Количесто дней в текущем месяце
        $firstDayMonth = Carbon::now()->firstOfMonth(); //Первый день месяца
        $lastDayMonth = Carbon::now()->lastOfMonth()->format('Y-m-d'); //Последний день месяца
        /*
         * Предпраздничный день
         * */
        $preholiday = DB::table('holidays')->whereBetween('date_from', [$firstDayMonth->format('Y-m-d'), $lastDayMonth])->where('type', '1')->get();
        /*
         * Праздничные дни
         * */
        $holiday = DB::table('holidays')->whereBetween('date_from', [$firstDayMonth->format('Y-m-d'), $lastDayMonth])->where('type', '2')->get();
        /*
         * Больничные листы за текущий месяц
         * */
        $sickleave = DB::table('employeeabsences')
                        ->where('absence_id', '=','1')
                        ->where('from', '>', $firstDayMonth->format('Y-m-d'))
                        ->where('before', '<', $lastDayMonth)
                        ->where('user_id', $user_id)
                        ->get();

        /*
         * Отпуск за текущий месяц
         * */
        $otpusk = DB::table('employeeabsences')
                        ->where('absence_id', '=','2')
                        ->where('from', '>', $firstDayMonth->format('Y-m-d'))
                        ->where('before', '<', $lastDayMonth)
                        ->where('user_id', $user_id)
                        ->get();

        /*
         * Прогул за текущий месяц
         * */
        $absenteeism = DB::table('employeeabsences')
                        ->where('absence_id', '=','3')
                        ->where('from', '>', $firstDayMonth->format('Y-m-d'))
                        ->where('before', '<', $lastDayMonth)
                        ->where('user_id', $user_id)
                        ->get();

        /*
         * Без содержания за текущий месяц
         * */
        $withoutcontent = DB::table('employeeabsences')
                        ->where('absence_id', '=','4')
                        ->where('from', '>', $firstDayMonth->format('Y-m-d'))
                        ->where('before', '<', $lastDayMonth)
                        ->where('user_id', $user_id)
                        ->get();

        /*
         * Больничные листы за текущий месяц
         * */
        $apprenticeship = DB::table('employeeabsences')
                        ->where('absence_id', '=','5')
                        ->where('from', '>', $firstDayMonth->format('Y-m-d'))
                        ->where('before', '<', $lastDayMonth)
                        ->where('user_id', $user_id)
                        ->get();

        /*
         * Специализация за текущий месяц
         * */
        $specialization = DB::table('employeeabsences')
                        ->where('absence_id', '=','6')
                        ->where('from', '>', $firstDayMonth->format('Y-m-d'))
                        ->where('before', '<', $lastDayMonth)
                        ->where('user_id', $user_id)
                        ->get();

        /*
         * Командировка за текущий месяц
         * */
        $businesstrip = DB::table('employeeabsences')
                        ->where('absence_id', '=','7')
                        ->where('from', '>', $firstDayMonth->format('Y-m-d'))
                        ->where('before', '<', $lastDayMonth)
                        ->where('user_id', $user_id)
                        ->get();

        dump($request->all());
//        foreach($request->myemployees as $myemployee){
//            $firstDayMonth = Carbon::now()->firstOfMonth(); //Первый день месяца
//            for($ptr = 0; $ptr < $daysInMonth; $ptr++){
//                dump($firstDayMonth->format('Y-m-d'));
//                $firstDayMonth->addDay();
//            }
//
//        }
        for($ptr = 0; $ptr < $daysInMonth; $ptr++){
            foreach($request->myemployees as $myemployee) {
                $tabelother = new Graphicother();
                $tabelother->name = $request->name;
                $tabelother->month = $request->month;
                //$tabelother->hours_per_day = $request->hours_per_day;
                $tabelother->number_of_working_days = $request->number_of_working_days;
                $tabelother->from = $request->from;
                //$tabelother->before = $request->before;
                //$tabelother->date = $firstDayMonth->format('Y-m-d');
                $tabelother->myemployee_id = $myemployee;
                $tabelother->user_id = $user_id;
                /*
                 * Получаем ставку текущего сотрудника для автоматического сохранения месячной ставки
                 * */
                $rate = Myemployee::where('id', $myemployee)->value('rate');
                if($rate == 1){
                    $tabelother->rate = $request->monthly_rate_of_hours_01;
                }
                if($rate == 0.75){
                    $tabelother->rate = $request->monthly_rate_of_hours_075;
                }
                if($rate == 0.5){
                    $tabelother->rate = $request->monthly_rate_of_hours_05;
                }
                if($rate == 0.25){
                    $tabelother->rate = $request->monthly_rate_of_hours_025;
                }

                /*
                 * Проверка на предпраздничные дни
                 * */
                foreach($preholiday as $value){
                    if(($value->date_from == $firstDayMonth->format('Y-m-d'))){
                        $temp = explode(':', $request->hours_per_day);
                        $temp1 = explode(':', $request->before);
                        if($rate == 1){ //норма 8 часов
                            /*
                             * Количество отработанных часов
                             * */
                            $time[0] = $temp[0] * 60 * 60;
                            $time[1] = $temp[1] * 60;
                            /*
                             * Конец рабочего дня
                             * */
                            $time[2] = $temp1[0] * 60 * 60;
                            $time[3] = $temp1[1] * 60;
                            $work_time = $time[0] + $time[1] - 3600;
                            $end_workday = $time[2] + $time[3] - 3600;
                            $tabelother->hours_per_day = date("H:i", mktime(0,0,$work_time));
                            $tabelother->before = date("H:i", mktime(0,0,$end_workday));
                        }
                        if($rate == 0.75){ //норма 6 часов
                            $time[0] = ($temp[0] * 60 * 60) - 7200;
                            $time[1] = $temp[1] * 60;
                            /*
                             * Конец рабочего дня
                             * */
                            $time[2] = ($temp1[0] * 60 * 60) - 7200;
                            $time[3] = $temp1[1] * 60;
                            $work_time = $time[0] + $time[1] - 900;
                            $end_workday = $time[2] + $time[3] - 900;
                            $tabelother->hours_per_day  = date("H:i", mktime(0,0,$work_time));
                            $tabelother->before = date("H:i", mktime(0,0,$end_workday));
                        }
                        if($rate == 0.5){ //норма 4 часа
                            $time[0] = ($temp[0] * 60 * 60) - 14400;
                            $time[1] = $temp[1] * 60;
                            /*
                             * Конец рабочего дня
                             * */
                            $time[2] = ($temp1[0] * 60 * 60) - 14400;
                            $time[3] = $temp1[1] * 60;
                            $work_time = $time[0] + $time[1] - 1800;
                            $end_workday = $time[2] + $time[3] - 1800;
                            $tabelother->hours_per_day  = date("H:i", mktime(0,0,$work_time));
                            $tabelother->before = date("H:i", mktime(0,0,$end_workday));
                        }
                        if($rate == 0.25){ //норма 2 часа
                            $time[0] = ($temp[0] * 60 * 60) - 21600;
                            $time[1] = $temp[1] * 60;
                            /*
                             * Конец рабочего дня
                             * */
                            $time[2] = ($temp1[0] * 60 * 60) - 21600;
                            $time[3] = $temp1[1] * 60;
                            $work_time = $time[0] + $time[1] - 2700;
                            $end_workday = $time[2] + $time[3] - 2700;
                            $tabelother->hours_per_day  = date("H:i", mktime(0,0,$work_time));
                            $tabelother->before = date("H:i", mktime(0,0,$end_workday));
                        }
                    }else{
                        $temp = explode(':', $request->hours_per_day);
                        $temp1 = explode(':', $request->before);
                        if($rate == 1){ //норма 8 часов
                            /*
                             * Количество отработанных часов
                             * */
                            $time[0] = $temp[0] * 60 * 60;
                            $time[1] = $temp[1] * 60;
                            /*
                             * Конец рабочего дня
                             * */
                            $time[2] = $temp1[0] * 60 * 60;
                            $time[3] = $temp1[1] * 60;
                            $work_time = $time[0] + $time[1];
                            $end_workday = $time[2] + $time[3];
                            $tabelother->hours_per_day = date("H:i", mktime(0,0,$work_time));
                            $tabelother->before = date("H:i", mktime(0,0,$end_workday));
                        }
                        if($rate == 0.75){ //норма 6 часов
                            $time[0] = ($temp[0] * 60 * 60) - 7200;
                            $time[1] = $temp[1] * 60;
                            /*
                             * Конец рабочего дня
                             * */
                            $time[2] = ($temp1[0] * 60 * 60) - 7200;
                            $time[3] = $temp1[1] * 60;
                            $work_time = $time[0] + $time[1];
                            $end_workday = $time[2] + $time[3];
                            $tabelother->hours_per_day  = date("H:i", mktime(0,0,$work_time));
                            $tabelother->before = date("H:i", mktime(0,0,$end_workday));
                        }
                        if($rate == 0.5){ //норма 4 часа
                            $time[0] = ($temp[0] * 60 * 60) - 14400;
                            $time[1] = $temp[1] * 60;
                            /*
                             * Конец рабочего дня
                             * */
                            $time[2] = ($temp1[0] * 60 * 60) - 14400;
                            $time[3] = $temp1[1] * 60;
                            $work_time = $time[0] + $time[1];
                            $end_workday = $time[2] + $time[3];
                            $tabelother->hours_per_day  = date("H:i", mktime(0,0,$work_time));
                            $tabelother->before = date("H:i", mktime(0,0,$end_workday));
                        }
                        if($rate == 0.25){ //норма 2 часа
                            $time[0] = ($temp[0] * 60 * 60) - 21600;
                            $time[1] = $temp[1] * 60;
                            /*
                             * Конец рабочего дня
                             * */
                            $time[2] = ($temp1[0] * 60 * 60) - 21600;
                            $time[3] = $temp1[1] * 60;
                            $work_time = $time[0] + $time[1];
                            $end_workday = $time[2] + $time[3];
                            $tabelother->hours_per_day  = date("H:i", mktime(0,0,$work_time));
                            $tabelother->before = date("H:i", mktime(0,0,$end_workday));
                        }
                    }
                }
//                $tabelother->date = $firstDayMonth->format('Y-m-d');
//                $tabelother->save();
                /*
                 * Проверка на выходные и праздничные дни
                 * */
                if(!($firstDayMonth->isWeekend())){
                    foreach($holiday as $value){
                        if(($value->date_from == $firstDayMonth->format('Y-m-d'))){
                            $tabelother->date = $firstDayMonth->format('Y-m-d');
                            $tabelother->before = '';
                            $tabelother->from = '';
                            $tabelother->hours_per_day  = '';
                            $tabelother->save();
                        }
                    }

                    $tabelother->date = $firstDayMonth->format('Y-m-d');
                    $tabelother->save();
                }
                foreach($holiday as $value){
                    if(($value->date_from == $firstDayMonth->format('Y-m-d'))){

                    }
                }
                //dump($rate);

            }
            $firstDayMonth->addDay();
        }


    }


    public function create(){
        $user_id = Auth::user()->id;
        $myemployees = Myemployee::where('user_id', $user_id)->get();
        return view('graphics.create', [
            'myemployees' => $myemployees,
        ]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request){
        dd($request->all());

        request()->validate([
            'name' => 'required',
            'type_id' => 'required',
            'working_hours' => 'required',
            'monthly_rate' => 'required',
        ]);

        Tabelgraphic::create([
            'name' => $request->name,
            'working_hours' => $request->working_hours,
            'monthly_rate' => $request->monthly_rate,
            'type_id' => $request->type_id,
            'user_id' => Auth::user()->id,
            'from' => $request->from,
            'before' => $request->before,
        ]);

        return redirect()->route('graphic')->with('success', 'График успешно создан');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request){
        request()->validate([
            'name' => 'required',
            'type_id' => 'required',
            'working_hours' => 'required',
            'monthly_rate' => 'required',
        ]);

        $type = Tabelgraphic::find($request->id);
        $type->update([
            'name' => $request->name,
            'working_hours' => $request->working_hours,
            'monthly_rate' => $request->monthly_rate,
            'type_id' => $request->type_id,
            'user_id' => Auth::user()->id,
            'from' => $request->from,
            'before' => $request->before,
        ]);

        return redirect()->route('graphic')->with('success', 'График успешно обновлен');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request){
        $tabelgrapthic = Tabelgraphic::find($request->id);

        $tabelgrapthic->delete();

        return redirect()->route('graphic')->with('success', 'График успешно удален');
    }    //
}
