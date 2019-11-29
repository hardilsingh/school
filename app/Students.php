<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    //

    protected $guarded = ['id', 'created_at', 'updated_at'];



    public function grade()
    {
        return $this->belongsTo('App\Grade', 'class');
    }
}
