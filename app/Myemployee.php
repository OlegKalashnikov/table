<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Myemployee extends Model
{
    protected $fillable = ['employee_id', 'position_id', 'department_id', 'rate', 'user_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function employee(){
        return $this->hasOne('App\Employee', 'id', 'employee_id');
    }

    public function position(){
        return $this->hasOne('App\Position', 'id', 'position_id');
    }

    public function department(){
        return $this->hasOne('App\Department', 'id', 'department_id');
    }

}
