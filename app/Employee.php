<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['employee'];

    public function myEmployee(){
        return $this->belongsTo('App\Myemployee');
    }
}
