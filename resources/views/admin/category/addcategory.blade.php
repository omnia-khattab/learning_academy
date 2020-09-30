@extends('admin/layout/layout')
@section('title')
Add Category
@endsection

@section('content')
<div class="container py-5">
    <h5 class="text-center contact-title font-weight-bolder mt-5">Add Category</h5>
    <div class="row m-5 border">
        <div class="col-12 my-5">
        @include('admin.inc.errors')
            <form action="{{url(route('admin.category.create'))}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" value="{{old('name')}}" name="name" class="form-control" aria-describedby="emailHelp">
                </div>
                <button type="submit" class="btn btn_1">Add Category</button>
            </form>
        </div>
    </div>
</div>
@endsection

