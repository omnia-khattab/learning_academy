@extends('admin/layout/layout')
@section('title')
Courses
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
                <h2 class="text-center mt-5">Courses</h2>
                <a href="{{route('admin.course.addcourse')}}" class="btn btn_1">Add new Course</a>
                <div class="border mt-4">
                <table class="table table-striped table-dark table-hover">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Pic</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Category</th>
                            <th scope="col">Trainer</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($courses as $course)
                            <tr>
                            <th scope="row">{{$course->id}}</th>
                            <td><img class="trainer_img rounded-circle" src="{{asset($course->img)}}" alt=""></td>
                            <td>{{$course->name}}</td>
                            <td>${{$course->price}}</td>
                            <td>{{$course->category->name}}</td>
                            <td>{{$course->trainer->name}}</td>
                            <td>
                                <a href="{{route('admin.course.edit',$course->id)}}" class="btn btn-primary mb-3">Edit</a>
                                <a href="{{route('admin.course.delete',$course->id)}}" class="btn btn-danger">Delete</a>
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

