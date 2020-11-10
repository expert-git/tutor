<!-- <?php $base_url = 'http://site.startupbug.net:6888/tutorsarewe/frontend/'?> -->
<?php $base_url = 'http://localhost/tutorareus_assets/tutorsarewe/'?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">

      <!-- Session Token -->
      <meta name="_token" content="{{ Session::token() }}"/>
            
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <title>TutorAreUs</title>
      <!-- Bootstrap -->
      <link href="{{ asset('public/dashboard/assets/css/bootstrap.min.css') }}" rel="stylesheet">
      <!-- FontAwesome -->
      <link href="{{ asset('public/dashboard/assets/css/font-awesome.min.css') }}" rel="stylesheet">
      <!-- UI Jquery -->
      <link href="{{ asset('public/dashboard/assets/css/jquery-ui.css') }}" rel="stylesheet">
      <!-- UI Jquery -->
      <link href="{{ asset('public/dashboard/assets/css/bootstrap-slider.min.css') }}" rel="stylesheet">
      <!-- Animate -->
      <link href="{{ asset('public/dashboard/assets/css/animate.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/css/alertify.min.css') }}" rel="stylesheet">
      <!-- Owl Slider -->
      <link href="{{ asset('public/dashboard/assets/css/owl.carousel.css') }}" rel="stylesheet">
      <!-- Owl Slider Theme -->
      <link href="{{ asset('public/dashboard/assets/css/owl.theme.css') }}" rel="stylesheet">
      <!--Jquery Validation -->
      <link href="{{ asset('public/dashboard/assets/css/validationEngine.jquery.css') }}" rel="stylesheet">
      <!--Jquery custom Validation -->
      <link href="{{ asset('public/dashboard/assets/css/custom_validatiion.css') }}" rel="stylesheet">
      <link href="{{ asset('public/dashboard/assets/css/dashboard.css') }}" rel="stylesheet">
      <!--Mobile menu -->
      <!--  <link href="assets/plugins/menu/css/hamburgers.css') }}" rel="stylesheet">
         <link href="assets/plugins/menu/css/jquery.mmenu.all.css') }}" rel="stylesheet">
         <link href="assets/plugins/menu/css/jquery.mhead.css') }}" rel="stylesheet"> -->
      <!-- Animation CSS -->
      <!-- <link rel="stylesheet" type="text/css" href="assets/css/default.css') }}" />
         <link rel="stylesheet" type="text/css" href="assets/css/component.css') }}" /> -->
      <!-- AOS Animation -->
      <link rel="stylesheet" href="{{ asset('public/dashboard/assets/css/jquery.dataTables.min.css') }}">
      <link rel="stylesheet" href="{{ asset('public/dashboard/assets/css/w3.css') }}">

      <link href="{{ asset('public/dashboard/assets/css/aos.css') }}" rel="stylesheet">
      <!-- style.css') }} -->
      <link href="{{ asset('public/dashboard/assets/css/style.css') }}" rel="stylesheet">
      <!-- custom Css Lins -->
      <link href="{{ asset('public/dashboard/assets/css/custom.css') }}" rel="stylesheet">
      <!-- Responsive -->
      <link href="{{ asset('public/dashboard/assets/css/responsive.css') }}" rel="stylesheet">
      
      <!-- Toastr CSS -->
      <link href="{{ asset('public/admin/css/toastr.css') }}" rel="stylesheet">

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
                     <li><i class="fa fa-phone f_phone" aria-hidden="true"></i>:  1-877-3- TUTORS (1-877-388- 8677)</li>
                     <a href="{{route('tutors_listing')}}"><li class="f_right"><i class="fa fa-search f_phone"></i>: Search For Tutors</li></a>
                   <!--   <li class="f_right"><i class="fa fa-user f_phone"></i><a href="login.php">: Login</a>/<a href="signup_faq.php">Register</a></li> -->
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
         @if(Auth::user()->verified == 0)
           <div class="alert alert-danger s_alert">
              Please verify your Email address to avail all features
           </div>
         @endif

      </header>
