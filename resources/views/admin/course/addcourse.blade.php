@extends('admin/layout/layout')
@section('title')
add course
@endsection

@section('content')
    <div class="container py-5">
    <h5 class="text-center contact-title font-weight-bolder mt-5">Add Course</h5>
    <div class="row m-5 border">
        <div class="col-12 my-5">
        @include('admin.inc.errors')
            <form action="{{url(route('admin.course.create'))}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" value="{{old('name')}}" name="name" class="form-control" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Price</label>
                    <input type="text" value="{{old('price')}}" name="price" class="form-control" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Category</label>
                    <select class="form-control" name="category_id">
                        <option disabled="disabled" selected="selected">Select Category</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Trainer</label>
                    <select class="form-control" name="trainer_id">
                        <option disabled="disabled" selected="selected">Select Trainer</option>
                        @foreach($trainers as $trainer)
                        <option value="{{$trainer->id}}">{{$trainer->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">content</label>
                    <input type="text" value="{{old('content')}}" name="content" class="form-control" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea class="form-control w-100" name="desc" cols="30" rows="9">{{old('desc')}}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Image</label>
                    <input type="file" name="img" class="form-control" aria-describedby="emailHelp">
                </div>
                <button type="submit" class="btn btn_1">Add Course</button>
            </form>
        </div>
    </div>
    </div>
@endsection

