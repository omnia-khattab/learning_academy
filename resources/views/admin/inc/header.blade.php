<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="icon" href="{{asset('asset/img/favicon.png')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('asset/css/bootstrap.min.css')}}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{asset('asset/css/animate.css')}}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{asset('asset/css/style.css')}}">
    
    @yield('styles')
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu home_menu mb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand"  href="{{route('admin.home')}}"> <img src="{{asset('asset/img/logo.png')}}" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item justify-content-end"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav align-items-center">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{route('admin.home')}}">Home</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{route('admin.category.list')}}">Categories</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{route('admin.course.list')}}">Courses</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{route('admin.trainer.list')}}">Trainers</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{route('admin.student.list')}}">Students</a>
                                </li>
                                
                                <!--<li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Trainer
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="">Add Trainer</a>
                                        <a class="dropdown-item" href="">Edit Trainer</a>
                                    </div>
                                </li>-->
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{route('admin.logout')}}">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->