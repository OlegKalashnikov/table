<?php

namespace App\Http\Controllers;

use App\Myemployee;
use App\Tabelgraphic;
use App\Type;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TabelgraphicController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        if(User::role() == 1){
            $graphic = Tabelgraphic::orderBy('user_id', 'asc')->get();
        }else{
            $graphic = Tabelgraphic::where('user_id', Auth::user()->id)->get();
        }

        return view('graphics.show', [
            'graphics' => $graphic,
            'types' => Type::all(),
        ]);
    }

    public function create(){
        $user_id = Auth::user()->id;
        $myemployees = Myemployee::where('user_id', $user_id)->get();
        return view('graphics.create', [
            'myemployees' => $myemployees,
        ]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request){
        dd($request->all());

        request()->validate([
            'name' => 'required',
            'type_id' => 'required',
            'working_hours' => 'required',
            'monthly_rate' => 'required',
        ]);

        Tabelgraphic::create([
            'name' => $request->name,
            'working_hours' => $request->working_hours,
            'monthly_rate' => $request->monthly_rate,
            'type_id' => $request->type_id,
            'user_id' => Auth::user()->id,
            'from' => $request->from,
            'before' => $request->before,
        ]);

        return redirect()->route('graphic')->with('success', 'График успешно создан');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request){
        request()->validate([
            'name' => 'required',
            'type_id' => 'required',
            'working_hours' => 'required',
            'monthly_rate' => 'required',
        ]);

        $type = Tabelgraphic::find($request->id);
        $type->update([
            'name' => $request->name,
            'working_hours' => $request->working_hours,
            'monthly_rate' => $request->monthly_rate,
            'type_id' => $request->type_id,
            'user_id' => Auth::user()->id,
            'from' => $request->from,
            'before' => $request->before,
        ]);

        return redirect()->route('graphic')->with('success', 'График успешно обновлен');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request){
        $tabelgrapthic = Tabelgraphic::find($request->id);

        $tabelgrapthic->delete();

        return redirect()->route('graphic')->with('success', 'График успешно удален');
    }    //
}
