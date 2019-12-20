<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    //

    protected $guarded = ['id', 'created_at', 'updated_at'];



    public function father_name()
    {
        return $this->belongsTo('App\Father' , 'father');
    }


    public function section_name()
    {
        return $this->belongsTo('App\Section' , 'section');
    }

    public function grade()
    {
        return $this->belongsTo('App\Grade', 'class');
    }


    public function streamName() {
        return $this->belongsTo('App\Stream' , 'stream');
    }

    public function stationName() {
        return $this->belongsTo('App\Station' , 'station');
    }

    public function casteName() {
        return $this->belongsTo('App\Caste' , 'cast_category');
    }
    
    public function religionName() {
        return $this->belongsTo('App\Religion' , 'religion');
    }

    
}
