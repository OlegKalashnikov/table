<?php

namespace App\Http\Controllers;

use App\Absence;
use App\Employeeabsence;
use App\Myemployee;
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
            'type' => 1,
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
            'type' => 2,
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
            'type' => 3,
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
            'type' => 4,
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
            'type' => 5,
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
            'type' => 6,
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
            'type' => 7,
            'title' => 'командировка',
            'data' => $data,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showFormCreateSickleave(){
        $user_id = Auth::user()->id;
        return view('absence.create' ,[
            'type' => 1,
            'title' => 'больничного листа',
            'myemployees' => Myemployee::where('user_id', $user_id)->get(),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showFormCreateHoliday(){
        $user_id = Auth::user()->id;
        return view('absence.create' ,[
            'type' => 2,
            'title' => 'отпуска',
            'myemployees' => Myemployee::where('user_id', $user_id)->get(),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showFormCreateAbsenteeism(){
        $user_id = Auth::user()->id;
        return view('absence.create' ,[
            'type' => 3,
            'title' => 'прогула',
            'myemployees' => Myemployee::where('user_id', $user_id)->get(),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showFormCreateWithoutcontent(){
        $user_id = Auth::user()->id;
        return view('absence.create' ,[
            'type' => 4,
            'title' => 'отпуска без содержания',
            'myemployees' => Myemployee::where('user_id', $user_id)->get(),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showFormCreateApprenticeship(){
        $user_id = Auth::user()->id;
        return view('absence.create' ,[
            'type' => 5,
            'title' => 'ученического отпуска',
            'myemployees' => Myemployee::where('user_id', $user_id)->get(),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showFormCreateSpecialization(){
        $user_id = Auth::user()->id;
        return view('absence.create' ,[
            'type' => 6,
            'title' => 'специализация',
            'myemployees' => Myemployee::where('user_id', $user_id)->get(),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showFormCreateBusinesstrip(){
        $user_id = Auth::user()->id;
        return view('absence.create' ,[
            'type' => 7,
            'title' => 'командировка',
            'myemployees' => Myemployee::where('user_id', $user_id)->get(),
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeSickleave(Request $request){
        request()->validate([
            'myemployee_id' => 'required',
            'from' => 'required',
            'before' => 'required'
        ]);

        Employeeabsence::create($request->all());

        return redirect()->route('absence.sickleave.create')->with('success', 'Данные успешно добавленны');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeHoliday(Request $request){
        request()->validate([
            'myemployee_id' => 'required',
            'from' => 'required',
            'before' => 'required'
        ]);

        Employeeabsence::create($request->all());

        return redirect()->route('absence.holiday.create')->with('success', 'Данные успешно добавленны');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeAbsenteeism(Request $request){
        request()->validate([
            'myemployee_id' => 'required',
            'from' => 'required',
            'before' => 'required'
        ]);

        Employeeabsence::create($request->all());

        return redirect()->route('absence.absenteeism.create')->with('success', 'Данные успешно добавленны');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeWithoutcontent(Request $request){
        request()->validate([
            'myemployee_id' => 'required',
            'from' => 'required',
            'before' => 'required'
        ]);

        Employeeabsence::create($request->all());

        return redirect()->route('absence.withoutcontent.create')->with('success', 'Данные успешно добавленны');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeApprenticeship(Request $request){
        request()->validate([
            'myemployee_id' => 'required',
            'from' => 'required',
            'before' => 'required'
        ]);

        Employeeabsence::create($request->all());

        return redirect()->route('absence.apprenticeship.create')->with('success', 'Данные успешно добавленны');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeSpecialization(Request $request){
        request()->validate([
            'myemployee_id' => 'required',
            'from' => 'required',
            'before' => 'required'
        ]);

        Employeeabsence::create($request->all());

        return redirect()->route('absence.specialization.create')->with('success', 'Данные успешно добавленны');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeBusinesstrip(Request $request){
        request()->validate([
            'myemployee_id' => 'required',
            'from' => 'required',
            'before' => 'required'
        ]);

        Employeeabsence::create($request->all());

        return redirect()->route('absence.businesstrip.create')->with('success', 'Данные успешно добавленны');
    }
}
