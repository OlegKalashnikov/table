<?php

namespace App\Http\Controllers;

use App\Holiday;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    public function index(){
        return view('settings.holidays.show', [
            'holidays' => Holiday::all(),
            'id' => 1,
        ]);
    }

    public function store(Request $request){
        request()->validate([
            'type' => 'required',
            'date_from' => 'required',
        ]);

        Holiday::create($request->all());

        return redirect()->route('settings.holidays')->with('success', 'Данные успешно добавлены');
    }

    public function update(Request $request){
        $holiday = Holiday::find($request->id);
        request()->validate([
            'type' => 'required',
            'date_from' => 'required',
        ]);
        $holiday->update($request->all());
        return redirect()->route('settings.holidays')->with('success', 'Данные успешно обновлены');
    }

    public function destroy(Request $request){
        $holiday = Holiday::find($request->id);
        $holiday->delete();
        return redirect()->route('settings.holidays')->with('success', 'Данные успешно удалены');
    }
}
