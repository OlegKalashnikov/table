<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){
        return view('settings.roles.show', [
            'roles' => Role::all(),
        ]);
    }

    public function create(){
        return view('settings.roles.create', [
            'roles' => []
        ]);
    }

    public function edit(Request $request, $id){
        return view('settings.roles.edit', [
            'roles' => Role::findOrFail($id)
        ]);
    }

    public function store(Request $request){
        request()->validate([
            'name'          => 'required|max:100',
            'description'   => 'required|max:255'
        ]);

        Role::create($request->all());
        return redirect()->route('settings.role')->with('success', 'Роль успешно создана');
    }

    public function update(Request $request, $id){
        $role = Role::findOrFail($id);
        request()->validate([
            'name'          => 'required|max:100',
            'description'   => 'required|max:255'
        ]);

        $role->update($request->all());
        return redirect()->route('settings.role')->with('success', 'Роль успешно обновлена');
    }

    public function destroy(Request $request){
        $role = Role::findOrFail($request->id);
        $role->delete();
        return redirect()->route('settings.role')->with('success', 'Роль успешно удалена!');
    }
}
