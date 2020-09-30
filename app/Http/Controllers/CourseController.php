<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Feedback;
use App\Category;

class CourseController extends Controller
{
    //All Courses
    function list(){
        //show courses as paginate not all of them in the same page
        //$courses=Course::paginate(6);
        $courses=Course::get();
        return view('front.courses.courses',[
            'courses'=>$courses
        ]);
    }
    //search Course name
    function search(Request $request){
        $keyword=$request->keyword;
        $courses=Course::where('name','LIKE',"%$keyword%")->get();
        return response()->json($courses);
    }
    //see Course Details
    function course_details($id){
        $course=Course::findOrfail($id);
        $feeds=Feedback::where('course_id',$id)->get();
        return view('front.courses.course_details',[
            'course'=>$course,
            'feeds'=>$feeds
        ]);
    }
    //find course by category
    function category($id){
        $category=Category::findOrfail($id);
        $courses=Course::where('category_id',$id)->paginate(3);
        return view('front.courses.category',[
            'category'=>$category,
            'courses'=>$courses
        ]);
    }

    
}
