<?php

namespace App\Http\Controllers;

use App\Alignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Myemployee;

class AlignmentController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $user_id = Auth::user()->id;
        return view('alignment.show', [
            'alignments' => Alignment::where('user_id', $user_id)->get(),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        $user_id = Auth::user()->id;
        return view('alignment.create', [
            'myemployees' => Myemployee::where('user_id', $user_id)->get(),
        ]);
    }

    public function store(Request $request){
        request()->validate([
            'myemployee_id' => 'required',
            'from' => 'required',
            'before' => 'required',
            'percentages' => 'required'
        ]);

        Alignment::create($request->all());

        return redirect()->route('alignment.create')->with('success', 'Данные успешно добавленны');
    }
}
