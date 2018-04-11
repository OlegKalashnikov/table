<?php

namespace App\Http\Controllers;

use App\Absence;
use App\Employeeabsence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'absence' => 'required|max:254',
            'reduction' => 'required|max:5',
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
            'absence' => 'required|max:254',
            'reduction' => 'required|max:5',
        ]);

        $absences = Absence::find($request->id);
        $absences->update($request->all());

        return redirect()->route('settings.absence')->with('success', 'Вид неявки успешно обновлен');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request){
        $absences = Absence::find($request->id);

        $absences->delete();

        return redirect()->route('settings.absence')->with('success', 'Вид неявки успешно удален');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showFormSickleave(){
        $user_id = Auth::user()->id;
        $data = Employeeabsence::where('user_id', $user_id)->where('absence_id', 1)->get();
        return view('absence.show', [
            'title' => 'больничного листа',
            'data' => $data,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showFormHoliday(){
        $user_id = Auth::user()->id;
        $data = Employeeabsence::where('user_id', $user_id)->where('absence_id', 2)->get();
        return view('absence.show', [
            'title' => 'отпуска',
            'data' => $data,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showFormAbsenteeism(){
        $user_id = Auth::user()->id;
        $data = Employeeabsence::where('user_id', $user_id)->where('absence_id', 3)->get();
        return view('absence.show', [
            'title' => 'прогула',
            'data' => $data,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showFormWithoutcontent(){
        $user_id = Auth::user()->id;
        $data = Employeeabsence::where('user_id', $user_id)->where('absence_id', 4)->get();
        return view('absence.show', [
            'title' => 'отпуска без содержания',
            'data' => $data,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showFormApprenticeship(){
        $user_id = Auth::user()->id;
        $data = Employeeabsence::where('user_id', $user_id)->where('absence_id', 5)->get();
        return view('absence.show', [
            'title' => 'ученического отпуска',
            'data' => $data,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showFormSpecialization(){
        $user_id = Auth::user()->id;
        $data = Employeeabsence::where('user_id', $user_id)->where('absence_id', 6)->get();
        return view('absence.show', [
            'title' => 'специализация',
            'data' => $data,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showFormBusinesstrip(){
        $user_id = Auth::user()->id;
        $data = Employeeabsence::where('user_id', $user_id)->where('absence_id', 7)->get();
        return view('absence.show', [
            'title' => 'командировка',
            'data' => $data,
        ]);
    }

    public function showFormCreate(){
        return view('absence.create');
    }

}
