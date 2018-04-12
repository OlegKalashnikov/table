<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alignment extends Model
{
    protected $fillable = [
        'percentages',
        'myemployee_id',
        'from',
        'before',
        'user_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function myemployee(){
        return $this->hasOne('App\Myemployee', 'id', 'myemployee_id');
    }
}
