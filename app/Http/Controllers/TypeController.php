<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        return view('settings.types.show', [
            'types' => Type::all()
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request){
        request()->validate([
            'type' => 'required|max:254'
        ]);

        Type::create($request->all());

        return redirect()->route('settings.type')->with('success', 'Тип графика успешно создан');
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

    public function destroy(Request $request){
        $type = Type::find($request->id);

        $type->delete();

        return redirect()->route('settings.type')->with('success', 'Тип графика успешно удален');
    }
}
