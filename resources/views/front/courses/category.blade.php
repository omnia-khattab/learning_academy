@extends('front/layout/layout')
@section('title')
{{$category->name}} Category
@endsection

@section('content')
<!-- breadcrumb start-->
<section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2>Our Courses</h2>
                            <p>Homepage<span>/</span>Courses<span>/</span>category<span>/</span>{{$category->name}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<!-- breadcrumb start-->
<section class="special_cource padding_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <div class="section_tittle text-center">
                        <p>our courses</p>
                        <h2>All Courses</h2>
                    </div>
                </div>
            </div>

            <div id="allCourses">
            <div class="row">
            @foreach($courses as $course)
                <div class="col-sm-6 col-lg-4 mb-4">
                    <div class="single_special_cource">
                        <img src="{{asset($course->img)}}" class="special_img" alt="">
                        <div class="special_cource_text">
                            <a href="{{route('course.category',$course->category->id)}}" class="btn_4">{{$course->category->name}}</a>
                            <h4>${{$course->price}}</h4>
                            <a href="{{route('course.details',$course->id)}}"><h3>{{$course->name}}</h3></a>
                            <p>Which whose darkness saying were life unto fish wherein all fish of together called</p>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
            <!--start Pagination-->
            <div class="d-flex justify-content-center w-100 mb-5">
                {!! $courses->render() !!}
            </div>
            <!--End Pagination-->
            </div>
        </div>
    </section>
<!--::blog_part end::-->
@endsection

