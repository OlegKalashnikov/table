<?php

namespace App\Http\Controllers;

use App\Tabelemployee;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PrintGraphicController extends Controller
{
    public function index(){
        $user_id = Auth::user()->id;
        $month = Carbon::now()->format('m');
        $grapthics = DB::table('tabelemployees')
                        ->select('department_id', 'month')
                        ->where('user_id', $user_id)
                        ->where('month', $month*1)
                        ->groupBy('department_id', 'month')->get();
        dump($grapthics);
        return view('print.graphic.show', [
            'graphics' => $grapthics,
        ]);
    }
}
