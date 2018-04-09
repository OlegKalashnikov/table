<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tabelgraphic extends Model
{
    protected $fillable = ['user_id', 'name', 'type_id', 'working_hours', 'monthly_rate', 'from', 'before'];
    public $timestamps = false;

    public function type(){
        return $this->hasOne('App\Type','id','type_id');
    }
    public function user(){
        return $this->hasOne('App\User','id','user_id');
    }

}
