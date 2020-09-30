<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Newsletter;
use App\Message;
use App\Course;
use App\Student;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    //
    function newsletter(Request $request){
        //this will redirect back with error if exist i don't need to check if ther's an error
        $date=$request->validate([
            'email'=>'required|email|unique:newsletters'
        ]);

        //add new column in newsletters table 
        Newsletter::create($date);
        
        return back();
    }

    //send contact us data to message table
    function contact(Request $request){
        //this will redirect back with error if exist i don't need to check if ther's an error
        $date=$request->validate([
            'name'=>'required|string|max:100|min:3',
            'email'=>'required|email|unique:messages',
            'msg'=>'required|string|min:3',
            'subject'=>'nullable|string|max:100|min:3'
        ]);

        //add new column in newsletters table 
        Message::create($date);
        
        return back();
    }
    //enroll new student to the course
    function enroll(Request $request,$id){
        //this will redirect back with error if exist i don't need to check if ther's an error
        $date=$request->validate([
            'name'=>'required|string|max:100|min:3',
            'email'=>'required|email|unique:students',
            'specialization'=>'nullable|string|min:3',
        ]);
        
        //extract date from form
        $_name=$request->name;
        $_email=$request->email;
        $_specialization=$request->specialization;
        
        //add the data in the column
        $student=new Student();
        $student->name=$_name;
        $student->email=$_email;
        $student->specialization=$_specialization;

        //check if he is a new student or the student already exist iin DB 
        $old_student=Student::select('id')->where('email',$_email)->first();
        if($old_student == null){
            //save the new column in DB
            $student->save();
            //get the last id inserted in table student
            $student_id=$student->id;
            
        }
        else{
            //get the student id inserted in table student
            $student_id=$old_student->id;
            //if the student updated his speciality
            if($_specialization !== null){
                $old_student->update(['specialization'=>$_specialization]);
            }
        }
        
        
        
        //get the value of course id 
        $course_id=Course::select('id')->where('id',$id)->value('id');
        //add student_id and Course_id in their M to M table
        DB::table('course_student')->insert([
            'course_id'=>$course_id,
            'student_id'=>$student_id,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        return back();
    }
}
