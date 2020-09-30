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
                <a  href="{{route('admin.student.list')}}" class="btn btn_1">back</a>
                <div class="border mt-4">
                <table class="table table-striped table-dark table-hover">
                        <thead>
                            <tr>
                            <th scope="col">Course ID</th>
                            <th scope="col">Course Name</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($courses as $course)
                            <tr>
                            <th scope="row">{{$course->id}}</th>
                            <td>{{$course->name}}</td>
                            <td>
                                @if($course->pivot->status !== 'approve')
                                <a href="{{route('admin.student.approve',[$student->id,$course->id])}}" class="btn btn-success mr-2">Approve</a>
                                @endif

                                @if($course->pivot->status !== 'reject')
                                <a href="{{route('admin.student.reject',[$student->id,$course->id])}}" class="btn btn-danger">Reject</a>
                                @endif
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

