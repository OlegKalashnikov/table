<?php

namespace App\Http\Controllers;

use App\Dismissal;
use App\Myemployee;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DismissalController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        foreach(User::roles(Auth::user()->id) as $user){
            if($user->name === 'admin'){
                $dismassals = Dismissal::all();
            }else{
                $dismassals = Dismissal::where('user_id', Auth::user()->id)->get();
            }
        }

        return view('dismassal.show', [
            'dismassals' => $dismassals,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        $user_id = Auth::user()->id;
        return view('dismassal.create', [
            'myemployees' => Myemployee::where('user_id', $user_id)->get(),
        ]);
    }

    public function createEmployee($id){
        return view('dismassal.createEmployee', [
            'myemployee' => Myemployee::find($id),
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request){
        request()->validate([
            'myemployee_id' => 'required',
            'date' => 'required',
        ]);

        Dismissal::create($request->all());

        return redirect()->route('dismissal.create')->with('success', 'Сотрудник уволен');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id){
        return view('dismassal.edit', [
            'dismissal' => Dismissal::find($id),
            'myemployees' => Myemployee::where('user_id', Auth::user()->id)->get(),
        ]);
    }

    public function update(Request $request, $id){
        request()->validate([
            'myemployee_id' => 'required',
            'date' => 'required',
        ]);

        $dismissall = Dismissal::find($id);
        $dismissall->update($request->all());
        return redirect()->route('dismissal.create')->with('success', 'Данные обновлены');
    }
}
