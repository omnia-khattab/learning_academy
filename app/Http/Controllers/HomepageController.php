<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Feedback;
use App\Trainer;
use App\Student;
class HomepageController extends Controller
{
    //get latest 3 courses and display them also git the feeback
    //count number of courses,trainers,students
    function latest(){
        $courses=Course::orderBy('id','desc')->take(3)->get();
        $feeds=Feedback::get();
        $courses_count=Course::count();
        $trainers_count=Trainer::count();
        $students_count=Student::count();
        return view('front/index',[
            'courses'=>$courses,
            'feeds'=>$feeds,
            'courses_count'=>$courses_count,
            'trainers_count'=>$trainers_count,
            'students_count'=>$students_count
        ]);
    }
}
