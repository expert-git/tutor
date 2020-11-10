<!DOCTYPE html>
<html>
<head>
    <title>Recruitment</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="{{ asset('assets/img/logo.png') }}" type="image/png" sizes="25x25">
 <link rel="stylesheet" href="{{ asset('public/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
 <link rel="stylesheet" href="{{ asset('public/bower_components/font-awesome/css/font-awesome.min.css') }}">
 <link rel="stylesheet" href="{{ asset('public/bower_components/alertify/themes/alertify.default.css') }}">
 <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
</head>
<body>
<div id="wrapper">
        <header>

            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="logo_left"><img src="{{ asset('assets/img/logo.png') }}" class="img-responsive"></div>
                    </div>
                </div>
            </div>
        </header>
        <section class="form_right">
            <div class="container-fluid">
    @include('general_partials.error_section')
                <div class="row">
                    <div class="col-md-8">
                        <div class="login_image"><img src="{{ asset('assets/img/login_image.png') }}" class="img-responsive"></div>
                    </div>
                <form id="signin_form" action="{{route('login_post')}}" method="post">
                    {{csrf_field()}}
                    <div class="col-md-3">
                        <h1 class="signin">Sign In!</h1>
                        <div class="form-group">
                            <label for="exampleInputName">Email:</label>
                            <div class="input-group input-group-lg">
                                <input type="text" class="form-control" name="email" id="useremail" placeholder="Email"><span  class = "input-group-addon" id = "usericonemail"><i class = "glyphicon glyphicon-user"></i></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputName">Password:</label>
                            <div class="input-group input-group-lg">

                                <input type="password" name="password" class="form-control" id="userpassword" placeholder="Password">  <span  class = "input-group-addon" ><i class = "glyphicon glyphicon-lock"></i></span>
                            </div>
                        </div>
                        <h3 class="fotgot">Forgot Password? | 
                       <a href="{{route('register_index')}}"> Sign Up </a></h3>
                        <div class="button_signin">
                            <button type="submit" class="btn">Sign In</button></div>
                    </div>
                </form>
                </div>
            </div>
        </section>

        <footer class="last_footer">
            <div class="container">
                <div class="row">

                    <div class="col-md-12">
                        <div class="nav_footer">

                            <ul>
                                <li>
                                    <a href="#">© 2015 Talento.</a>
                                </li>
                                <li>
                                    <a href="#">Terms</a>
                                </li>
                                <li>
                                    <a href="#">Contact</a>
                                </li>
                                <li>
                                    <a href="#">About</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </footer>
    </div>

<script src="{{ asset('assets/bower_components/jquery/dist/jQuery.min.js') }}"></script>
<script src="{{ asset('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/bower_components/alertify/alertify.min.js') }}"></script>

</body>
</html>


