<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class feedback extends Model
{
    //
    public function Student()
    {
        return $this->belongsTo('App\Student');
    }
    public function Course()
    {
        return $this->belongsTo('App\Course');
    }
}
