<?php

namespace App\Http\Controllers;

use App\Position;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PositionController extends Controller
{
    public function index(){
        return view('settings.positions.show', [
            'positions' => Position::all(),
        ]);
    }

    public function uploadForm(){
        return view('settings.positions.uploadForm');
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

        return redirect()->route('settings.position')->with([
            'success'   => 'Данные успешно загружены',
            'log'       => $ptr
        ]);

    }

    public function create(){
        return view('settings.positions.create');
    }

    public function store(Request $request){
        request()->validate([
            'position' => 'required|max:100',
            'category' => 'required|max:254'
        ]);

        Position::create($request->all());

        return redirect()->route('settings.position')->with('success', 'Должность успешно создана');
    }
}
