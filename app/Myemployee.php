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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function position(){
        return $this->hasOne('App\Position', 'id', 'position_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function department(){
        return $this->hasOne('App\Department', 'id', 'department_id');
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function printGraphicEmployee($id){
        $id_employee = Myemployee::where('id', $id)->value('employee_id');
        return Employee::where('id', $id_employee)->value('employee');
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function printGraphicPosition($id){
        $id_position = Myemployee::where('id', $id)->value('position_id');
        return Position::where('id', $id_position)->value('position');
    }

}
