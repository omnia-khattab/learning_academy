@extends('admin/layout/layout')
@section('title')
Learning Academy
@endsection

@section('content')
<div>
    <div class="container py-5">
        <div class="row my-5 py-5 d-flex justify-content-center align-items-center">
            <div class="col-3 py-5 ">
                <a href="{{route('admin.category.addcategory')}}" class="btn btn_1">Add Category</a>
            </div>
            <div class="col-3 py-5">
                <a href="{{route('admin.course.addcourse')}}" class="btn btn_1">Add Course</a>
            </div>
            <div class="col-3 py-5">
                <a href="{{route('admin.trainer.addtrainer')}}" class="btn btn_1">Add Trainer</a>
            </div>
            <div class="col-3 py-5">
                <a href="{{route('admin.student.addstudent')}}" class="btn btn_1">Add Student</a>
            </div>
        </div>
    </div>
</div>
@endsection