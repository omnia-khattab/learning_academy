@extends('front/layout/layout')

@section('title')
{{$course->name}}
@endsection

@section('content')
<!-- breadcrumb start-->
<section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2>Course Details</h2>
                            <p>Homepage<span>/</span>Course Details<span>/</span>{{$course->name}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- breadcrumb start-->


<!--================ Start Course Details Area =================-->
<section class="course_details_area section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 course_details_left">
                    <div class="main_image">
                        <img class="img-fluid" src="{{asset($course->img)}}" alt="">
                    </div>
                    <h2 class="my-4">{{$course->name}}</h2>
                    <div class="content_wrapper">
                        <h4 class="title_top">Objectives</h4>
                        <div class="content">
                            {{$course->desc}}
                        </div>

                        <h4 class="title">Course Outline</h4>
                        <div class="content">
                            <ul class="course_list">
                            {!! $course->content !!}
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 right-contents">
                    <div class="sidebar_top">
                        <ul>
                            <li>
                                <a class="justify-content-between d-flex" href="#">
                                    <p>Trainer’s Name</p>
                                    <span class="color">{{$course->trainer->name}}</span>
                                </a>
                            </li>
                            <li>
                                <a class="justify-content-between d-flex" href="#">
                                    <p>Course Fee </p>
                                    <span>{{$course->price}}</span>
                                </a>
                            </li>
                        </ul>
                        
                    </div>

                    <h4 class="title">enroll now</h4>
                    <div class="content">
                        <div class="review-top row pt-40">
                            
                            <div class="col-lg-12">
                                <h6 class="mb-15">Provide Your info</h6>
                                @include ('front.inc.errors')
                                <form class="form-contact contact_form" action="{{route('message.enroll',$course->id)}}" method="post" id="contactForm">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <input class="form-control" name="name"  type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder = 'Enter your name'>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <input class="form-control" name="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder = 'Enter email address'>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <input class="form-control" name="specialization"  type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Your Specialization'" placeholder = 'Enter Your Specialization'>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="form-group mt-3">
                                                <button type="submit" class="button button-contactForm btn_1">enroll now</button>
                                            </div>
                                        </div>
                                </form>
                            </div>    
                        </div>
                    </div>
                        <!--<div class="feedeback">
                            <h6>Your Feedback</h6>
                            <textarea name="feedback" class="form-control" cols="10" rows="10"></textarea>
                            <div class="mt-10 text-right">
                                <a href="#" class="btn_1">Read more</a>
                            </div>
                        </div>-->
                        <div class="comments-area mb-30">
                            @if(isset($feeds))
                            @foreach($feeds as $feed)
                            <div class="comment-list">
                                <div class="single-comment single-reviews justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        
                                        <div class="desc">
                                            <h5>{{$feed->student->name}}</h5>
                                            <p class="comment">
                                            {{$feed->feedback}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Course Details Area =================-->
@endsection