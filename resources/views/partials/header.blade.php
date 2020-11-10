<?php //$base_url = 'http://site.startupbug.net:6888/tutorsarewe/frontend/'?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <title>TutorAreUs</title>
      <!-- Bootstrap -->
      <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

      <!-- Session Token -->
      <meta name="_token" content="{{ Session::token() }}"/>

      <!-- FontAwesome -->
      <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">
      <!-- UI Jquery -->
      <link href="{{ asset('assets/css/jquery-ui.css') }}" rel="stylesheet">
      <!-- UI Jquery -->
      <link href="{{ asset('assets/css/bootstrap-slider.min.css') }}" rel="stylesheet">
      <!-- Animate -->
      <link href="{{ asset('assets/css/alertify.min.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/css/alertify.min.css') }}" rel="stylesheet">
      <!-- Owl Slider -->
      <link href="{{ asset('assets/css/owl.carousel.css') }}" rel="stylesheet">
      <!-- Owl Slider Theme -->
      <link href="{{ asset('assets/css/owl.theme.css') }}" rel="stylesheet">
      <!--Jquery Validation -->
      <link href="{{ asset('assets/css/validationEngine.jquery.css') }}" rel="stylesheet">
      <!--Jquery custom Validation -->
      <link href="{{ asset('assets/css/custom_validatiion.css') }}" rel="stylesheet">
      <!--Mobile menu -->
      <!--  <link href="{{ asset('assets/plugins/menu/css/hamburgers.css') }}" rel="stylesheet">
         <link href="{{ asset('assets/plugins/menu/css/jquery.mmenu.all.css') }}" rel="stylesheet">
         <link href="{{ asset('assets/plugins/menu/css/jquery.mhead.css') }}" rel="stylesheet"> -->
      <!-- Animation CSS -->
      <!-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/default.css') }}" />
         <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/component.css') }}" /> -->
      <!-- AOS Animation -->
      <link rel="stylesheet" href="{{ asset('assets/css/w3.css') }}">

      <link href="{{ asset('assets/css/aos.css') }}" rel="stylesheet">
      <!-- style.css') }} -->
      <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
      <!-- custom Css Lins -->
      <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
      <!-- Tutor Profile Css By Fareha -->
      <link href="{{ asset('dashboard/assets/css/f_custom.css') }}" rel="stylesheet">
      <!-- Responsive -->
      <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">

        <!-- Toastr CSS -->
        <link href="{{ asset('admin/css/toastr.css') }}" rel="stylesheet">

   </head>

   <?php
      $uri = explode('/', $_SERVER['REQUEST_URI']);
      $class = trim(end($uri), ".php");
   ?>
   <body class="<?php echo $class ? $class : 'index'; ?>">
      <div id="wrapper">
      <header>
         <div class="container">
            <div class="row">
               <div class="top-header">
                  <ul class="top-header-nav">
                     <li><i class="fa fa-phone f_phone" aria-hidden="true"></i>: 1-877-3- TUTORS (1-877-388- 8677)</li>
                     <a href="{{route('tutors_listing')}}"><li class="f_right"><i class="fa fa-search f_phone"></i>: Search For Tutors</a></li>
                     @if(!Auth::check())
                           <li class="f_right"><i class="fa fa-user f_phone"></i><a href="{{route('signin')}}">: Login</a>/<a href="{{route('signup')}}">Register</a></li>
                     @endif
                  </ul>
               </div>
               <div class="col-md-12 col-sm-12 col-xs-12">
                  <nav class="navbar navbar-inverse">
                     <div class="container-fluid">
                        <div class="navbar-header">
                           <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                           </button>
                           <a href="{{route('home')}}"><img src="{{ asset('assets/images/logo.png') }}" alt="tutorareus Logo" class="img-responsive"></a>
                        </div>                        
                        @include('partials.nav_partial')
                     </div>
                  </nav>
               </div>
            </div>
         </div>
      </header>