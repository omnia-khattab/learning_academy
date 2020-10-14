<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <link rel="icon" href="{{asset('asset/img/favicon.png')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('asset/css/bootstrap.min.css')}}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{asset('asset/css/animate.css')}}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{asset('asset/css/style.css')}}">
</head>

<body>
    <div class="container py-5">
        <h5 class="text-center contact-title font-weight-bolder">Login</h5>
        <div class="row m-5 border">
            <div class='col-12 my-5 '>
                @include('admin.inc.errors')
                <form class="form-contact contact_form " action="{{route('admin.handleLogin')}}" method="POST" id="contactForm">
                @csrf
                    <div class="col-12">
                        <div class="form-group">
                            <input class="form-control" name="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder = 'Enter email address'>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <input class="form-control" name="password" type="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Password'" placeholder = 'Enter Password'>
                        </div>
                    </div>
                    <div class="form-group mt-3 ml-3">
                        <button type="submit" class="button button-contactForm btn_1">Login</button>
                    </div>
                    <!--<div class="form-group mt-3 ml-3">
                        <a href="" type="submit" class="btn btn-dark">Login with Github</a>
                    </div>-->
                </form>
            </div>
        </div>
    </div>
<!-- jquery plugins here-->
    <!-- jquery -->
    <script src="{{asset('asset/js/jquery-3.5.1.min.js')}}"></script>
    <!-- popper js -->
    <script src="{{asset('asset/js/popper.min.js')}}"></script>
    <!-- bootstrap js -->
    <script src="{{asset('asset/js/bootstrap.min.js')}}"></script>

</body>

</html>