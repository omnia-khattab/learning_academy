@extends('admin/layout/layout')
@section('title')
Edit {{$category->name}}
@endsection

@section('content')
<div class="container py-5">
    <h5 class="text-center contact-title font-weight-bolder mt-5">Edit Category</h5>
    <div class="row m-5 border">
        <div class="col-12 my-5">
        @include('admin.inc.errors')
            <form action="{{url(route('admin.category.Update',$category->id))}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" value="{{$category->name}}" name="name" class="form-control" aria-describedby="emailHelp">
                </div>
                <button type="submit" class="btn btn_1">Edit Category</button>
            </form>
        </div>
    </div>
</div>
@endsection

