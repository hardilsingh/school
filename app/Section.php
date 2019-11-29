<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    //

    protected $guarded = ['id', 'created_at', 'updated_at'];



    public function grade() {
        return $this->belongsTo('App\Grade' , 'grade_id');
    }


    

}
