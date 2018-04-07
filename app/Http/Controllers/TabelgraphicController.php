<?php

namespace App\Http\Controllers;

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
            $graphic = Tabelgraphic::all();
        }else{
            $graphic = Tabelgraphic::where('user_id', Auth::user()->id)->get();
        }

        return view('settings.graphic.show', [
            'graphics' => $graphic,
            'types' => Type::all(),
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request){
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
        ]);

        return redirect()->route('settings.graphic')->with('success', 'График успешно создан');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request){
        request()->validate([
            'type' => 'required|max:254'
        ]);

        $type = Type::find($request->id);
        $type->update($request->all());

        return redirect()->route('settings.type')->with('success', 'Тип графика успешно обновлен');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request){
        $tabelgrapthic = Tabelgraphic::find($request->id);

        $tabelgrapthic->delete();

        return redirect()->route('settings.graphic')->with('success', 'График успешно удален');
    }    //
}
