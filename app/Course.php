<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function trainer()
    {
        return $this->belongsTo('App\Trainer');
    }

    public function students()
    {
        return $this->belongsToMany('App\Student','course_student');
    }
    public function feedbacks()
    {
        return $this->hasMany('App\feedback');
    }
}
