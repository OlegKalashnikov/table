<?php

namespace App\Http\Controllers;

use App\Absence;
use Illuminate\Http\Request;

class AbsenceController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        return view('settings.absences.show', [
            'absences' => Absence::all()
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request){
        request()->validate([
            'absences' => 'required|max:254',
            'holiday' => 'required',
        ]);

        Absence::create($request->all());

        return redirect()->route('settings.absence')->with('success', 'Вид неявки успешно создан');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request){
        request()->validate([
            'absences' => 'required|max:254',
            'holiday' => 'required',
        ]);

        $absences = Absence::find($request->id);
        $absences->update($request->all());

        return redirect()->route('settings.absence')->with('success', 'Вид неявки успешно обновлен');
    }

    public function destroy(Request $request){
        $absences = Absence::find($request->id);

        $absences->delete();

        return redirect()->route('settings.absence')->with('success', 'Вид неявкиуспешно удален');
    }
}
