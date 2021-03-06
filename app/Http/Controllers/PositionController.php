<?php

namespace App\Http\Controllers;

use App\Position;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PositionController extends Controller
{
    public function index(){
        return view('directory.positions.show', [
            'positions' => Position::all(),
        ]);
    }

    public function uploadForm(){
        return view('directory.positions.uploadForm');
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
                Position::create([
                    'position' => $insert->position,
                    'category' => $insert->category,
                ]);
                $ptr++;
            }
        }

        return redirect()->route('directory.position')->with([
            'success'   => 'Данные успешно загружены',
            'log'       => $ptr
        ]);

    }

    public function create(){
        return view('directory.positions.create');
    }

    public function store(Request $request){
        request()->validate([
            'position' => 'required|max:100',
            'category' => 'required|max:254'
        ]);

        Position::create($request->all());

        return redirect()->route('directory.position')->with('success', 'Должность успешно создана');
    }

    public function edit($id){
        return view('directory.positions.edit', [
            'positions' => Position::find($id)
        ]);
    }

    public function update(Request $request, $id){
        request()->validate([
            'position' => 'required|max:100',
            'category' => 'required|max:254'
        ]);

        $position = Position::find($id);
        $position->update($request->all());

        return redirect()->route('directory.position')->with('success', 'Должность успешно обновлена');
    }

    public function destroy(Request $request){
        $position = Position::find($request->id);
        $position->delete();
        return back()->with('success', 'Должность успешно удалена');
    }
}
