<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DepartmentController extends Controller
{
    public function index(){
        return view('directory.department.show', [
            'departments' => Department::all(),
        ]);
    }

    public function uploadForm(){
        return view('directory.department.uploadForm');
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
                Department::create([
                    'department' => $insert->department,
                ]);
                $ptr++;
            }
        }

        return redirect()->route('directory.department')->with([
            'success'   => 'Данные успешно загружены',
            'log'       => $ptr
        ]);

    }

    public function create(){
        return view('directory.department.create');
    }

    public function store(Request $request){
        request()->validate([
            'department' => 'required|max:254',
        ]);

        Department::create($request->all());

        return redirect()->route('directory.department')->with('success', 'Подразделение успешно создано');
    }

    public function edit($id){
        return view('directory.department.edit', [
            'departments' => Department::find($id)
        ]);
    }

    public function update(Request $request, $id){
        request()->validate([
            'department' => 'required|max:254',
        ]);

        $department = Department::find($id);
        $department->update($request->all());

        return redirect()->route('directory.department')->with('success', 'Подразделение успешно обновлено');
    }

    public function destroy(Request $request){
        $department = Department::find($request->id);
        $department->delete();
        return back()->with('success', 'Подразделение успешно удалено');
    }

}
