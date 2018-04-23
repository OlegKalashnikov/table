<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'login', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function role(){
        return User::where('id', Auth::user()->id)->value('role_id');
    }

    public static function roles($id){
        $roles = DB::table('users')
                    ->join('roles', 'roles.id', '=', 'users.role_id')
                    ->select('users.*', 'roles.name')
                    ->where('users.id', '=', $id)
                    ->get();

        return $roles;
    }

    public static function nameUser($id){
        return User::where('id', $id)->value('name');
    }

}
