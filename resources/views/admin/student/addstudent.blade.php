@extends('admin/layout/layout')
@section('title')
add Student
@endsection

@section('content')
    <div class="container py-5">
    <h5 class="text-center contact-title font-weight-bolder mt-5">Add Student</h5>
    <div class="row m-5 border">
        <div class="col-12 my-5">
        @include('admin.inc.errors')
            <form action="{{url(route('admin.student.create'))}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" value="{{old('name')}}" name="name" class="form-control" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" value="{{old('email')}}" name="email" class="form-control" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Specialization</label>
                    <input type="text" value="{{old('specialization')}}" name="specialization" class="form-control" aria-describedby="emailHelp">
                </div>
                <button type="submit" class="btn btn_1">Add Student</button>
            </form>
        </div>
    </div>
    </div>
@endsection

