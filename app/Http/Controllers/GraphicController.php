<?php

namespace App\Http\Controllers;

use App\Graphic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GraphicController extends Controller
{
    public function index(){
        return view('graphics.show', [
            'graphics' => Graphic::where('user_id', Auth::user()->id)->get()
        ]);
    }
}
