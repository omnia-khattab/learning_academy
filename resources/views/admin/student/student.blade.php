@extends('admin/layout/layout')
@section('title')
Students
@endsection

@section('styles')
<style>
.trainer_img{
    width:50px;
    height:50px;
}
</style>
@endsection

@section('content')
    <div class="container py-5">
        <div class="row my-5 d-flex justify-content-center">
            <div class="col-10 ">
                <h2 class="text-center mt-5">Students</h2>
                <a href="{{route('admin.student.addstudent')}}" class="btn btn_1">Add new Student</a>
                <div class="border mt-4">
                <table class="table table-striped table-dark table-hover">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Specialization</th>
                            <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $student)
                            <tr>
                            <th scope="row">{{$student->id}}</th>
                            <td>{{$student->name}}</td>
                            <td>{{$student->email}}</td>
                            <td>{{$student->specialization}}</td>
                            <td>
                                <a href="{{route('admin.student.show',$student->id)}}" class="btn btn-info mr-2">show courses</a>
                                <a href="{{route('admin.student.enroll',$student->id)}}" class="btn btn-success mr-2">Enroll</a>
                                <a href="{{route('admin.student.edit',$student->id)}}" class="btn btn-primary mr-2">Edit</a>
                                <a href="{{route('admin.student.delete',$student->id)}}" class="btn btn-danger">Delete</a>
                            </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

