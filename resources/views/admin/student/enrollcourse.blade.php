@extends('admin/layout/layout')
@section('title')
enroll {{$student->name}} to new course
@endsection

@section('content')
    <div class="container py-5">
    <h5 class="text-center contact-title font-weight-bolder mt-5">Enroll to Course</h5>
    <div class="row m-5 border">
        <div class="col-12 my-5">
        @include('admin.inc.errors')
            <form action="{{url(route('admin.student.enrolled',$student->id))}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" disabled="disabled" value="{{$student->name}}" name="name" class="form-control" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" disabled="disabled" value="{{$student->email}}" name="email" class="form-control" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Specialization</label>
                    <input type="text" disabled="disabled" value="{{$student->specialization}}" name="specialization" class="form-control" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Course</label>
                    <select class="form-control" name="course_id">
                        <option disabled="disabled" selected="selected">Select Course</option>
                        @foreach($courses as $course)
                        <option value="{{$course->id}}">{{$course->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn_1">Enroll</button>
            </form>
        </div>
    </div>
    </div>
@endsection

