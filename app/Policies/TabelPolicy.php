<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TabelPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * @return bool
     */
    public function settings(){
        $user_role = DB::table('users')
                            ->join('roles', 'users.role_id', '=', 'roles.id')
                            ->where('users.id', Auth::user()->id)
                            ->select('users.*', 'roles.name as role')
                            ->get();
        foreach($user_role as $role){
            if($role->role === 'admin' || $role->role === 'Admin'){
                return TRUE;
            }
        }
        return FALSE;
    }

    public function action(){
        $user_role = DB::table('users')
            ->join('roles', 'users.role_id', '=', 'roles.id')
            ->where('users.id', Auth::user()->id)
            ->select('users.*', 'roles.name as role')
            ->get();
        foreach($user_role as $role){
            if($role->role === 'admin' || $role->role === 'Admin'){
                return TRUE;
            }
        }
        return FALSE;
    }
}
