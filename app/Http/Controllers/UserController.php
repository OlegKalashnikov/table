<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('settings.users.show', [
            'users' => User::all(),
        ]);
    }

    public function create(){
        return view('settings.users.create');
    }
}
