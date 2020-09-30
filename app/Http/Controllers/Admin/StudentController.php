<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Student;
use App\Course;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    //
    function studentList(){
        $students=Student::get();
        return view('admin.student.student',[
            'students'=>$students
        ]);
    }
    //add new student
    function student(){
        return view('admin.student.addstudent');
    }
    function create(Request $request){
        $data=$request->validate([
            'name'=>'required|string|max:100|min:3',
            'email'=>'required|string|max:100|email|unique:students',
            'specialization'=>'nullable|max:100|string|min:3'
        ]);
        $student=Student::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'specialization'=>$request->specialization
        ]);
        return redirect(route('admin.student.list'));
    }

    //Edit student
    function edit($id){
        $student=Student::findOrFail($id);
        return view('admin.student.editstudent',[
            'student'=>$student
        ]);
    }

    function update(Request $request,$id){
        $data=$request->validate([
            'name'=>'required|string|max:100|min:3',
            'email'=>'required|string|max:100|email|unique:students',
            'specialization'=>'nullable|max:100|string|min:3'
        ]);
        $student=Student::findOrFail($id);
        $student->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'specialization'=>$request->specialization
        ]);
        return redirect(route('admin.student.list'));
    }

    //delete Student
    function delete($id){
        $student=Student::findOrFail($id);
        $student->delete();
        return back();
    }

    //show the enrolled course for every student
    function showCourses($id){
        $student=Student::findOrFail($id);
        $courses=Student::findOrFail($id)->courses;
        return view('admin.student.allcourses',[
            'student'=>$student,
            'courses'=>$courses
        ]);
    }
    //change course status to approve in pivot table
    function approveCourses($id,$c_id){
        $course=Course::findOrFail($c_id);
        $course->students()->updateExistingPivot($id,['status'=>'approve']);
        return back();
    }
     //change course status to reject in pivot table
    function rejectCourses($id,$c_id){
        $course=Course::findOrFail($c_id);
        $course->students()->updateExistingPivot($id,['status'=>'reject']);
        return back();
    }

    //enroll student to new course
    function enroll($id){
        $student=Student::findOrFail($id);
        $courses=Course::select('id','name')->get();
        return view('admin.student.enrollcourse',[
            'student'=>$student,
            'courses'=>$courses
        ]);
    }

    function enrollcourse($id,Request $request){
        $data=$request->validate([
            'course_id'=>'required|exists:courses,id'
        ]);
        DB::table('course_student')->insert([
            'course_id'=>$request->course_id,
            'student_id'=>$id,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        return rediect(route('admin.student.allcourses'));
    }
}
