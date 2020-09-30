<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Course;
use App\Trainer;

class CourseController extends Controller
{
    //
    function courseList(){
        $courses=Course::get();
        return view('admin.course.course',[
            'courses'=>$courses
        ]);
    }
    //add Course
    function course(){
        $categories=Category::get();
        $trainers=Trainer::get();
        return view('admin.course.addcourse',[
            'categories'=>$categories,
            'trainers'=>$trainers
        ]);
    }
    //insert Course in DB
    function create(Request $request){
        $data=$request->validate([
            'name'=>'required|string|max:100|min:3',
            'price'=>'required|numeric|max:100',
            'category_id'=>'required|exists:categories,id',
            'trainer_id'=>'required|exists:trainers,id',
            'content'=>'required|string|max:100|min:3',
            'desc'=>'required|string|min:3',
            'img'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        //handle image
        if ($request->hasFile('img'))
        {
            $image = $request->file('img'); 
            $name = time().\Str::random(30).'.'.$image->getClientOriginalExtension(); 
            $destinationPath = public_path('asset/img/'); 
            $image->move($destinationPath, $name);
            $imageName='asset/img/'.$name; 
        }
        //extract data from form
        $_name=$request->name;
        $_price=$request->price;
        $_category_id=$request->category_id;
        $_trainer_id=$request->trainer_id;
        $_content=$request->content;
        $_desc=$request->desc;

        //insert data into DB
        $course=new Course();
        $course->name=$_name;
        $course->price=$_price;
        $course->category_id=$_category_id;
        $course->trainer_id=$_trainer_id;
        $course->content=$_content;
        $course->desc=$_desc;
        $course->img=$imageName;
        
        $course->save();
        return redirect(route('admin.course.list'));
    }

    //Edit Course
    function edit($id){
        $course=Course::findOrFail($id);
        $categories=Category::get();
        $trainers=Trainer::get();
        return view('admin.course.editcourse',[
            'course'=>$course,
            'categories'=>$categories,
            'trainers'=>$trainers
        ]);
    }
    //insert the update Course in DB
    function update(Request $request,$id){
        $data=$request->validate([
            'name'=>'required|string|max:100|min:3',
            'price'=>'required|max:100',
            'category_id'=>'required|exists:categories,id',
            'trainer_id'=>'required|exists:trainers,id',
            'content'=>'required|string|max:100|min:3',
            'desc'=>'required|string|min:3',
            'img'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        //extract data from form
        $_name=$request->name;
        $_price=$request->price;
        $_category_id=$request->category_id;
        $_trainer_id=$request->trainer_id;
        $_content=$request->content;
        $_desc=$request->desc;

        //insert data into DB
        $course=Course::findOrFail($id);
        $course->name=$_name;
        $course->price=$_price;
        $course->category_id=$_category_id;
        $course->trainer_id=$_trainer_id;
        $course->content=$_content;
        $course->desc=$_desc;
        //handle image
        if ($request->hasFile('img'))
        {
            $image = $request->file('img'); 
            $name = time().\Str::random(30).'.'.$image->getClientOriginalExtension(); 
            $destinationPath = public_path('asset/img/'); 
            $image->move($destinationPath, $name);
            $imageName='asset/img/'.$name;
            //check if has image 
            if(isset($course->img)){
                unlink($course->img);
            }
            $course->img=$imageName;  
        }
        $course->save();
        return redirect(route('admin.course.list'));
    }

    //delete course
    function delete($id){
        $course=Course::findOrFail($id);

        if(isset($course->img)){
            unlink($course->img);
        }
        
        $course->delete();
        return back();
    }
}
