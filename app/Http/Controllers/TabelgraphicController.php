<?php

namespace App\Http\Controllers;

use App\Department;
use App\Graphicother;
use App\Holiday;
use App\Myemployee;
use App\Tabelemployee;
use App\Tabelgraphic;
use App\Type;
use App\User;
use App\Employeeabsence;
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
        $departments = Department::all();
        return view('graphics.other.create', [
            'myemployees' => $myemployees,
            'month' => $month,
            'departments' => $departments,
        ]);
    }

    public function showFormCreateMedicalstaff(){
        $user_id = Auth::user()->id;
        $month = Carbon::now()->format('m');
        $myemployees = Myemployee::where('user_id', $user_id)->get();
        $departments = Department::all();
        return view('graphics.medicalstaff.create', [
            'myemployees' => $myemployees,
            'month' => $month,
            'departments' => $departments,
        ]);

    }

    public function showFormCreateEmployee(){
        $user_id = Auth::user()->id;
        $month = Carbon::now()->format('m');
        $myemployees = Myemployee::where('user_id', $user_id)->get();
        $departments = Department::all();
        return view('graphics.employee.create', [
            'myemployees' => $myemployees,
            'month' => $month,
            'departments' => $departments,
            'selected' => FALSE,
        ]);
    }

    public function showFormCreateEmployeeId($id){
        $user_id = Auth::user()->id;
        $month = Carbon::now()->format('m');
        $myemployees = Myemployee::where('id', $id)->get();
        $departments = Department::all();
        return view('graphics.employee.create', [
            'myemployees' => $myemployees,
            'month' => $month,
            'departments' => $departments,
            'selected' => TRUE,
        ]);
    }

    public function storeEmployee(Request $request){
        request()->validate([
            'department_id' => 'required',
            'month' => 'required',
            'number_of_working_days' => 'required',
            'myemployees' => 'required',
            'monthly_rate_of_hours' => 'required',
            'date' => 'required',
            'hours_per_day' => 'required',
            'from' => 'required',
            'before' => 'required',
        ]);
        foreach($request->date as $value){
            $date[] = explode(',', $value);
        }
        /*
         * id Пользователя, который добавляет запись
         * */
        $user_id = Auth::user()->id;
        $daysInMonth = Carbon::now()->daysInMonth; //Количесто дней в текущем месяце
        $firstDayMonth = Carbon::now()->firstOfMonth(); //Первый день месяца
        $lastDayMonth = Carbon::now()->lastOfMonth()->format('Y-m-d'); //Последний день месяца
        /*
         * Заполняем данными для графиков
         * */
        for($ptr = 0; $ptr < $daysInMonth; $ptr++){ //Проходим по всему месяцу
            $data = new Tabelemployee(); //Создаем новый объект
            foreach($date as $key => $value){
                foreach($value as $item){//проходим по массиву дат полученыых от пользователя
                    if($firstDayMonth->format('Y-m-d') == $item){//сравниваем день месяца с полученным от пользователя днем
                        $data->user_id = $user_id;
                        $data->myemployee_id = $request->myemployees;
                        $data->department_id = $request->department_id;
                        $data->month = $request->month;
                        $data->number_of_working_days = $request->number_of_working_days;
                        $data->monthly_rate_of_hours = $request->monthly_rate_of_hours;
                        $data->hours_per_day = $request->hours_per_day[$key];
                        $data->begining_of_the_work_day = $request->from[$key];
                        $data->end_of_the_work_day = $request->before[$key];
                        $data->date = $firstDayMonth->format('Y-m-d');
                        $data->save();
                    }
                }
            }
            $firstDayMonth->addDay();
        }

        return redirect()->route('my.employee')->with('success', 'Данные успешно добавлены');
    }

    public function storeMedicalstaff(Request $request){
        request()->validate([
            'department_id' => 'required',
            'month' => 'required',
            'myemployees' => 'required',
            'monthly_rate_of_hours' => 'required',
            'from' => 'required',
            'before' => 'required',
            'hours_per_day' => 'required',
            'number_of_working_days' => 'required',
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
         * Предпраздничные и праздничные дни
         * */
        $holidays = DB::table('holidays')->whereBetween('date_from', [$firstDayMonth->format('Y-m-d'), $lastDayMonth])->get();

        /*
         * Заполняем данными для графиков
         * */
        for($ptr = 0; $ptr < $daysInMonth; $ptr++){
            foreach($request->myemployees as $myemployee){ //Обходим массив сотрудников которых выбрали для заполнения
                $data = new Tabelemployee(); //Создаем объект
                $data->myemployee_id = $myemployee; //сотрудник
                $data->user_id = $user_id; //табельщик
                $data->number_of_working_days = $request->number_of_working_days; //кол-во отработанных дней - норма
                $data->department_id = $request->department_id; //подразделение
                $data->month = $request->month; //месяц
                $data->begining_of_the_work_day = $request->from; //начало рабочего дня
                /*
                 * Данные зависящие от ставки сотрудника
                 * */
                $rate = Myemployee::where('id', $myemployee)->value('rate');
                if(!$firstDayMonth->isWeekend()){
                    if($rate == 1){
                        $data->hours_per_day = Tabelemployee::timeForBettingAtEight($request->hours_per_day, 1);//нормя часов от ставки
                        $data->end_of_the_work_day = Tabelemployee::timeForBettingAtEight($request->before, 1); //конец рабочего дня от ставки
                        $data->date = $firstDayMonth->format('Y-m-d');
                        $data->monthly_rate_of_hours = $request->monthly_rate_of_hours;
                    }elseif($rate == 0.75){
                        $data->hours_per_day = Tabelemployee::timeForBettingAtEight($request->hours_per_day, 0.75);//нормя часов от ставки
                        $data->end_of_the_work_day = Tabelemployee::timeForBettingAtEight($request->before, 0.75); //конец рабочего дня от ставки
                        $data->date = $firstDayMonth->format('Y-m-d');
                        $data->monthly_rate_of_hours = $request->monthly_rate_of_hours * 0.75;
                    }elseif($rate == 0.5){
                        $data->hours_per_day = Tabelemployee::timeForBettingAtEight($request->hours_per_day, 0.5);//нормя часов от ставки
                        $data->end_of_the_work_day = Tabelemployee::timeForBettingAtEight($request->before, 0.5); //конец рабочего дня от ставки
                        $data->date = $firstDayMonth->format('Y-m-d');
                        $data->monthly_rate_of_hours = $request->monthly_rate_of_hours * 0.5;
                    }elseif($rate == 0.25){
                        $data->hours_per_day = Tabelemployee::timeForBettingAtEight($request->hours_per_day, 0.25);//нормя часов от ставки
                        $data->end_of_the_work_day = Tabelemployee::timeForBettingAtEight($request->before, 0.25); //конец рабочего дня от ставки
                        $data->date = $firstDayMonth->format('Y-m-d');
                        $data->monthly_rate_of_hours = $request->monthly_rate_of_hours * 0.25;
                    }
                }elseif($firstDayMonth->isWeekend()){
                    if(isset($request->date_weekend) && $firstDayMonth->format('Y-m-d') == $request->date_weekend){
                         $data->date = $firstDayMonth->format('Y-m-d');
                         $data->hours_per_day = $request->hours_per_day_weekend;
                         $data->begining_of_the_work_day = $request->from_weekend;
                         $data->end_of_the_work_day = $request->before_weekend;
                    }else{
                        $data->hours_per_day = '9999';
                        $data->end_of_the_work_day = '9999';
                        $data->begining_of_the_work_day = '9999';
                        $data->date = $firstDayMonth->format('Y-m-d');
                    }
                }
                foreach($holidays as $holiday){
                    if($holiday->type == 1 && $holiday->date_from == $firstDayMonth->format('Y-m-d')){
                        if($rate == 1){
                            $data->hours_per_day = Graphicother::timeForBettingAtEight( $request->hours_per_day, 1, 3600);
                            $data->end_of_the_work_day = Graphicother::timeForBettingAtEight( $request->before, 1, 3600);
                            $data->begining_of_the_work_day = $request->from;
                            $data->date = $firstDayMonth->format('Y-m-d');
                            $data->monthly_rate_of_hours = $request->monthly_rate_of_hours;
                        }elseif($rate == 0.75){
                            $data->hours_per_day = Graphicother::timeForBettingAtEight( $request->hours_per_day, 1, 900);
                            $data->end_of_the_work_day = Graphicother::timeForBettingAtEight( $request->before, 1, 900);
                            $data->begining_of_the_work_day = $request->from;
                            $data->date = $firstDayMonth->format('Y-m-d');
                            $data->monthly_rate_of_hours = $request->monthly_rate_of_hours * 0.75;
                        }elseif($rate == 0.5){
                            $data->hours_per_day = Graphicother::timeForBettingAtEight( $request->hours_per_day, 1, 1800);
                            $data->end_of_the_work_day = Graphicother::timeForBettingAtEight( $request->before, 1, 1800);
                            $data->begining_of_the_work_day = $request->from;
                            $data->date = $firstDayMonth->format('Y-m-d');
                            $data->monthly_rate_of_hours = $request->monthly_rate_of_hours * 0.5;
                        }elseif($rate == 0.25){
                            $data->hours_per_day = Graphicother::timeForBettingAtEight( $request->hours_per_day, 1, 2700);
                            $data->end_of_the_work_day = Graphicother::timeForBettingAtEight( $request->before, 1, 2700);
                            $data->begining_of_the_work_day = $request->from;
                            $data->date = $firstDayMonth->format('Y-m-d');
                            $data->monthly_rate_of_hours = $request->monthly_rate_of_hours * 0.25;
                        }
                    }elseif($holiday->type == 2 && $holiday->date_from == $firstDayMonth->format('Y-m-d')){
                        $data->hours_per_day = '8888';
                        $data->end_of_the_work_day = '8888';
                        $data->begining_of_the_work_day = '8888';
                        $data->date = $firstDayMonth->format('Y-m-d');
                    }

                }
                $data->save();
            }
            $firstDayMonth->addDay();
        }
        return redirect()->route('my.employee')->with('success', 'Данные успешно добавлены');
    }

    public function storeOther(Request $request){
        request()->validate([
            'department_id' => 'required',
            'month' => 'required',
            'myemployees' => 'required',
            'monthly_rate_of_hours' => 'required',
            'from' => 'required',
            'before' => 'required',
            'hours_per_day' => 'required',
            'number_of_working_days' => 'required',
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
        * Предпраздничные и праздничные дни
        * */
        $holidays = DB::table('holidays')->whereBetween('date_from', [$firstDayMonth->format('Y-m-d'), $lastDayMonth])->get();

        /*
         * Заполняем данными для графиков
         * */
        for($ptr = 0; $ptr < $daysInMonth; $ptr++){
            foreach($request->myemployees as $myemployee){ //Обходим массив сотрудников которых выбрали для заполнения
                $data = new Tabelemployee(); //Создаем объект
                $data->myemployee_id = $myemployee; //сотрудник
                $data->user_id = $user_id; //табельщик
                $data->number_of_working_days = $request->number_of_working_days; //кол-во отработанных дней - норма
                $data->department_id = $request->department_id; //подразделение
                $data->month = $request->month; //месяц
                $data->begining_of_the_work_day = $request->from; //начало рабочего дня
                /*
                 * Данные зависящие от ставки сотрудника
                 * */
                $rate = Myemployee::where('id', $myemployee)->value('rate');
                if(!$firstDayMonth->isWeekend()){
                    if($rate == 1){
                        $data->hours_per_day = Tabelemployee::timeForBettingAtEight($request->hours_per_day, 1);//нормя часов от ставки
                        $data->end_of_the_work_day = Tabelemployee::timeForBettingAtEight($request->before, 1); //конец рабочего дня от ставки
                        $data->date = $firstDayMonth->format('Y-m-d');
                        $data->monthly_rate_of_hours = $request->monthly_rate_of_hours;
                    }elseif($rate == 0.75){
                        $data->hours_per_day = Tabelemployee::timeForBettingAtEight($request->hours_per_day, 0.75);//нормя часов от ставки
                        $data->end_of_the_work_day = Tabelemployee::timeForBettingAtEight($request->before, 0.75); //конец рабочего дня от ставки
                        $data->date = $firstDayMonth->format('Y-m-d');
                        $data->monthly_rate_of_hours = $request->monthly_rate_of_hours * 0.75;
                    }elseif($rate == 0.5){
                        $data->hours_per_day = Tabelemployee::timeForBettingAtEight($request->hours_per_day, 0.5);//нормя часов от ставки
                        $data->end_of_the_work_day = Tabelemployee::timeForBettingAtEight($request->before, 0.5); //конец рабочего дня от ставки
                        $data->date = $firstDayMonth->format('Y-m-d');
                        $data->monthly_rate_of_hours = $request->monthly_rate_of_hours * 0.5;
                    }elseif($rate == 0.25){
                        $data->hours_per_day = Tabelemployee::timeForBettingAtEight($request->hours_per_day, 0.25);//нормя часов от ставки
                        $data->end_of_the_work_day = Tabelemployee::timeForBettingAtEight($request->before, 0.25); //конец рабочего дня от ставки
                        $data->date = $firstDayMonth->format('Y-m-d');
                        $data->monthly_rate_of_hours = $request->monthly_rate_of_hours * 0.25;
                    }
                }elseif($firstDayMonth->isWeekend()){
                        $data->hours_per_day = '9999';
                        $data->end_of_the_work_day = '9999';
                        $data->begining_of_the_work_day = '9999';
                        $data->date = $firstDayMonth->format('Y-m-d');
                }
                foreach($holidays as $holiday){
                    if($holiday->type == 1 && $holiday->date_from == $firstDayMonth->format('Y-m-d')){
                        if($rate == 1){
                            $data->hours_per_day = Graphicother::timeForBettingAtEight( $request->hours_per_day, 1, 3600);
                            $data->end_of_the_work_day = Graphicother::timeForBettingAtEight( $request->before, 1, 3600);
                            $data->begining_of_the_work_day = $request->from;
                            $data->date = $firstDayMonth->format('Y-m-d');
                            $data->monthly_rate_of_hours = $request->monthly_rate_of_hours;
                        }elseif($rate == 0.75){
                            $data->hours_per_day = Graphicother::timeForBettingAtEight( $request->hours_per_day, 1, 900);
                            $data->end_of_the_work_day = Graphicother::timeForBettingAtEight( $request->before, 1, 900);
                            $data->begining_of_the_work_day = $request->from;
                            $data->date = $firstDayMonth->format('Y-m-d');
                            $data->monthly_rate_of_hours = $request->monthly_rate_of_hours * 0.75;
                        }elseif($rate == 0.5){
                            $data->hours_per_day = Graphicother::timeForBettingAtEight( $request->hours_per_day, 1, 1800);
                            $data->end_of_the_work_day = Graphicother::timeForBettingAtEight( $request->before, 1, 1800);
                            $data->begining_of_the_work_day = $request->from;
                            $data->date = $firstDayMonth->format('Y-m-d');
                            $data->monthly_rate_of_hours = $request->monthly_rate_of_hours * 0.5;
                        }elseif($rate == 0.25){
                            $data->hours_per_day = Graphicother::timeForBettingAtEight( $request->hours_per_day, 1, 2700);
                            $data->end_of_the_work_day = Graphicother::timeForBettingAtEight( $request->before, 1, 2700);
                            $data->begining_of_the_work_day = $request->from;
                            $data->date = $firstDayMonth->format('Y-m-d');
                            $data->monthly_rate_of_hours = $request->monthly_rate_of_hours * 0.25;
                        }
                    }elseif($holiday->type == 2 && $holiday->date_from == $firstDayMonth->format('Y-m-d')){
                        $data->hours_per_day = '8888';
                        $data->end_of_the_work_day = '8888';
                        $data->begining_of_the_work_day = '8888';
                        $data->date = $firstDayMonth->format('Y-m-d');
                    }

                }
                $data->save();
            }
            $firstDayMonth->addDay();
        }
        return redirect()->route('my.employee')->with('success', 'Данные успешно добавлены');
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
