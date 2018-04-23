<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dismissal extends Model
{
    protected $fillable = [
        'date',
        'user_id',
        'myemployee_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function myEmployee(){
        return $this->hasOne('App\Myemployee', 'id', 'myemployee_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }

}
