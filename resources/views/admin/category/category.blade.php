@extends('admin/layout/layout')
@section('title')
Add Category
@endsection

@section('content')
    <div class="container py-5">
        <div class="row my-5 d-flex justify-content-center">
            <div class="col-10 ">
                <h2 class="text-center mt-5">Categories</h2>
                <a href="{{route('admin.category.addcategory')}}" class="btn btn_1">Add new Category</a>
                <div class="border mt-4">
                    <table class="table table-striped table-dark table-hover">
                            <thead>
                                <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $categorie)
                                <tr>
                                <th scope="row">{{$categorie->id}}</th>
                                <td>{{$categorie->name}}</td>
                                <td>
                                    <a href="{{route('admin.category.editcategory',$categorie->id)}}" class="btn btn-primary mr-3">Edit</a>
                                    <a href="{{route('admin.category.delete',$categorie->id)}}" class="btn btn-danger">Delete</a>
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

