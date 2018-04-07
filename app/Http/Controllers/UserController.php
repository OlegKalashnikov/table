<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = DB::table('users')
            ->leftJoin('roles', 'users.role_id', '=', 'roles.id')
            ->select('users.*','roles.description as role')
            ->get();

        return view('settings.users.show', [
            'users' => $users,
        ]);
    }

    public function create(){
        return view('settings.users.create',[
            'roles' => Role::all(),
        ]);
    }

    public function store(Request $request){
        request()->validate([
            'name' => 'required|string|max:255',
            'login' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role_id' => 'required',
        ]);

        User::create([
            'name' => $request['name'],
            'login' => $request['login'],
            'password' => Hash::make($request['password']),
            'role_id' => $request['role_id'],
        ]);

        return redirect()->route('settings.user')->with('success', 'Пользователь успешно создан');
    }

}
