<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reciept extends Model
{
    //

    protected $guarded = ['id', 'created_at', 'updated_at'];



    public function getStudent() {
        return $this->belongsTo('App\Students' , 'student_id');
    }

}
