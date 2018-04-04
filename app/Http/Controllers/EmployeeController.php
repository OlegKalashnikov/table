<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{
    public function index(){
        return view('settings.employee.show', [
            'employees' => Employee::all(),
        ]);
    }

    public function uploadForm(){
        return view('settings.employee.uploadForm');
    }

    public function upload(Request $request){
        request()->validate([
            'upload' => 'required|file|max:2048'
        ]);

        $path = $request->file('upload')->getRealPath();
        $data = Excel::load($path, function ($reader){})->get();
        $ptr = 0;
        if(!empty($data)){
            foreach ($data as $insert){
                Employee::create([
                    'employee' => $insert->employee,
                ]);
                $ptr++;
            }
        }

        return redirect()->route('settings.employee')->with([
            'success'   => 'Данные успешно загружены',
            'log'       => $ptr
        ]);

    }

    public function create(){
        return view('settings.employee.create');
    }

    public function store(Request $request){
        request()->validate([
            'employee' => 'required|max:254',
        ]);

        Employee::create($request->all());

        return redirect()->route('settings.employee')->with('success', 'Сотрудник успешно создан');
    }

    public function edit($id){
        return view('settings.employee.edit', [
            'employees' => Employee::find($id)
        ]);
    }

    public function update(Request $request, $id){
        request()->validate([
            'employee' => 'required|max:254',
        ]);

        $employee = Employee::find($id);
        $employee->update($request->all());

        return redirect()->route('settings.employee')->with('success', 'Сотрудник успешно обновлен');
    }

    public function destroy(Request $request){
        $employee = Employee::find($request->id);
        $employee->delete();
        return back()->with('success', 'Сотрудник успешно удален');
    }

}
