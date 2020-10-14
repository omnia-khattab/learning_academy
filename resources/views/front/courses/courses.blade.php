@extends('front/layout/layout')
@section('title')
Courses
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
                            <p>Homepage<span>/</span>Courses</p>
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

                        <!-- Search box Start-->
                        <div class="input-group my-5">
                            <input type="text" id="keyword" class="form-control" placeholder='search course name'
                                    onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'search course name'">
                        </div>
                        <!-- Search box End-->


                    </div>
                </div>
            </div>

            

            <div class="row" id="allcourses">

                    @foreach($courses as $course)

                    <div class="col-sm-6 col-lg-4 mb-4">
                        <div class="single_special_cource">
                            <img src="{{asset($course->img)}}" class="special_img" alt="">

                            <div class="special_cource_text">

                                <a href="{{route('course.category',$course->category_id)}}" class="btn_4">{{$course->category->name}}</a>
                                
                                <h4>${{$course->price}}</h4>
                                
                                <a href="{{route('course.details',$course->id)}}"><h3>{{$course->name}}</h3></a>
                                
                                <p>{{substr($course->desc, 0, 200)}}</p>
                            </div>
                        </div>
                    </div>

                    @endforeach

                </div>
        </div>
    </section>
<!--::blog_part end::-->
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

<script>
    $('#keyword').keyup(function(){
        
        let keyword = $(this).val();
        var url="{{ route('course.search') }}" + "?keyword=" + keyword;
        console.log(url);
        $.ajax({
            url:url,
            type: "GET",
            contentType: false,
            processData: false,
        
            success:function(data)
            {
                console.log(data);

                $('#allcourses').empty();

                for (course of data)
                    {
                        $('#allcourses').append(`

                            <div class="col-sm-6 col-lg-4 mb-4">
                                <div class="single_special_cource">
                                    <img src="{{asset('${course.img}')}}" class="special_img" alt="">
                                    
                                    <div class="special_cource_text">
                                        
                                        <a href="{{url('/courses/category')}}/${course.category_id}" class="btn_4">
                                            ${course.category.name}
                                        </a>
                                        
                                        <h4>$ ${course.price}</h4>
                                        
                                        <a href="{{url('/courses/details')}}/${course.id}"><h3>${course.name}</h3></a>
                                        
                                        <p>${course.desc.substring( 0, 200)}</p>
                                    </div>
                                </div>
                            </div>
                        `);
                    }
            }

        });

    });

        
        
        

        
    
</script>
@endsection