@extends('admin/layout/layout')
@section('title')
Trainers
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
                <h2 class="text-center mt-5">Trainers</h2>
                <a href="{{route('admin.trainer.addtrainer')}}" class="btn btn_1">Add new Trainer</a>
                <div class="border mt-4">
                <table class="table table-striped table-dark table-hover">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Pic</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">speciality</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($trainers as $trainer)
                            <tr>
                            <th scope="row">{{$trainer->id}}</th>
                            <td><img class="trainer_img rounded-circle" src="{{asset($trainer->img)}}" alt=""></td>
                            <td>{{$trainer->name}}</td>
                            <td>{{$trainer->phone}}</td>
                            <td>{{$trainer->specialization}}</td>
                            <td>
                                <a href="{{route('admin.trainer.edit',$trainer->id)}}" class="btn btn-primary mr-3">Edit</a>
                                <a href="{{route('admin.trainer.delete',$trainer->id)}}" class="btn btn-danger">Delete</a>
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

