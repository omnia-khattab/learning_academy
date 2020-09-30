@extends('admin/layout/layout')
@section('title')
Edit {{$trainer->name}}
@endsection

@section('content')
    <div class="container py-5">
    <h5 class="text-center contact-title font-weight-bolder mt-5">Add Trainer</h5>
    <div class="row m-5 border">
        <div class="col-12 my-5">
        @include('admin.inc.errors')
            <form action="{{url(route('admin.trainer.update',$trainer->id))}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" value="{{$trainer->name}}" name="name" class="form-control" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input type="text" value="{{$trainer->phone}}" name="phone" class="form-control" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">specialization</label>
                    <input type="text" value="{{$trainer->specialization}}" name="specialization" class="form-control" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Image</label>
                    <input type="file" name="img" class="form-control" aria-describedby="emailHelp">
                </div>
                <button type="submit" class="btn btn_1">Edit Trainer</button>
            </form>
        </div>
    </div>
    </div>
@endsection

