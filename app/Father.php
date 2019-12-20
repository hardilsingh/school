<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Father extends Model
{
    //

    protected $guarded = ['id', 'created_at', 'updated_at'];


    public function father() {
        return $this->belongsTo('App\Students' , 'father');
    }

}

