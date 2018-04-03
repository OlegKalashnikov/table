<?php

namespace App\Http\Controllers;

use App\Position;
use Illuminate\Http\Request;

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
}
