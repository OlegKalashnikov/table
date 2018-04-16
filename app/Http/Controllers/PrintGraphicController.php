<?php

namespace App\Http\Controllers;

use App\Graphicother;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrintGraphicController extends Controller
{
    public function index(){
        $user_id = Auth::user()->id;
        $grapthics = Graphicother::where('user_id', $user_id)->where('month', 4)->get();
        return view('print.graphic.show', [
            'graphics' => $grapthics,
        ]);
    }
}
