<?php

namespace App\Http\Controllers;

use App\Department;
use App\Employee;
use App\Myemployee;
use App\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyemployeeController extends Controller
{
    public function index(){
        return view('employee.show', [
            'myEmployees' => Myemployee::where('user_id', Auth::user()->id)->get()
        ]);
    }

    public function create(){
        $user_id = Auth::user()->id;
        $myEpmloyee = Myemployee::where('user_id', $user_id)->get();
           // dd($myEpmloyee);
        return view('employee.create', [
            'employees'     => Employee::all(),
            'positions'     => Position::all(),
            'departments'   => Department::all(),
            'myEmployees'    => $myEpmloyee
        ]);
    }

    public function store(Request $request){
        request()->validate([
            'employee_id' => 'required',
            'position_id' => 'required',
            'department_id' => 'required',
            'rate' => 'required',
        ]);

        $user_id = Auth::user()->id;

        Myemployee::create([
            'employee_id'   => $request->employee_id,
            'position_id'   => $request->position_id,
            'department_id' => $request->department_id,
            'rate'          => $request->rate,
            'user_id'       => $user_id
        ]);

        return back();
    }

    public function edit($id){
        $myEmployee = Myemployee::find($id);
        return view('employee.edit', [
            'myEmployees' => $myEmployee,
            'employees'     => Employee::all(),
            'positions'     => Position::all(),
            'departments'   => Department::all(),
        ]);
    }

    public function update(Request $request, $id){
        request()->validate([
            'employee_id' => 'required',
            'position_id' => 'required',
            'department_id' => 'required',
            'rate' => 'required',
        ]);

        $myEmployee = Myemployee::find($id);
        $user_id = Auth::user()->id;

        $myEmployee->update([
            'employee_id'   => $request->employee_id,
            'position_id'   => $request->position_id,
            'department_id' => $request->department_id,
            'rate'          => $request->rate,
            'user_id'       => $user_id
        ]);

        return redirect()->route('my.employee')->with('success', 'Данные успешно обновленны');
    }

    public function destroy(Request $request){
        $myEmployee = Myemployee::find($request->id);
        $myEmployee->delete();

        return redirect()->route('my.employee')->with('success', 'Данные успешно удалены');
    }
}