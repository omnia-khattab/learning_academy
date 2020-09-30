<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name','email','specialization'];

    //
    public function courses()
    {
        return $this->belongsToMany('App\Course','course_student')->withPivot('status');
    }
    public function feedbacks()
    {
        return $this->hasMany('App\feedback');
    }
}
