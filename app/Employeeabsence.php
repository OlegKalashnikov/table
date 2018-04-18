<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employeeabsence extends Model
{
    protected $fillable = [
        'absence_id',
        'myemployee_id',
        'from',
        'before',
        'user_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function absence(){
        return $this->hasOne('App\Absence', 'id', 'absence_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function myemployee(){
        return $this->hasOne('App\Myemployee', 'id', 'myemployee_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public static function reduction($id){
        return Absence::where('id', $id)->value('reduction');
    }
}
