<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Generic Admin Panel | Log in</title>
      <!-- Tell the browser to be responsive to screen width -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- <link rel="stylesheet" href="{{ asset('assets/img/logo.png') }}" type="image/png" sizes="25x25"> -->
      <!-- <link rel="stylesheet" href="{{ asset('public/bower_components/bootstrap/dist/css/bootstrap.min.css') }}"> -->
      <!-- <link rel="stylesheet" href="{{ asset('public/bower_components/font-awesome/css/font-awesome.min.css') }}"> -->
      <!-- <link rel="stylesheet" href="{{ asset('public/bower_components/alertify/themes/alertify.default.css') }}"> -->
      <!-- <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}"> -->
      
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
      
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

      <!-- Theme style -->
      <link rel="stylesheet" href="{{ asset('public/dist/css/AdminLTE.min.css') }}">

      <!-- iCheck -->
      <link rel="stylesheet" href="{{ asset('public/plugins/iCheck/flat/blue.css') }}">

      <!-- Google Font: Source Sans Pro -->
      <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
      <style type="text/css">
         h1.signin {
         text-align: center;
         }
         form {
         border: 3px solid #f1f1f1;
         }
         /* Full-width inputs */
         input[type=text], input[type=password] {
         width: 100%;
         padding: 12px 20px;
         margin: 8px 0;
         display: inline-block;
         border: 1px solid #ccc;
         box-sizing: border-box;
         }
         /* Set a style for all buttons */
         button {
         background-color: #4CAF50;
         color: white;
         padding: 14px 20px;
         margin: 8px 0;
         border: none;
         cursor: pointer;
         width: 100%;
         }
         /* Add a hover effect for buttons */
         button:hover {
         opacity: 0.8;
         }
         /* Extra style for the cancel button (red) */
         .cancelbtn {
         width: auto;
         padding: 10px 18px;
         background-color: #f44336;
         }
         /* Center the avatar image inside this container */
         .imgcontainer {
         text-align: center;
         margin: 24px 0 12px 0;
         }
         /* Avatar image */
         img.avatar {
         width: 40%;
         border-radius: 50%;
         }
         /* Add padding to containers */
         .container {
         padding: 16px;
         }
         /* The "Forgot password" text */
         span.psw {
         float: right;
         padding-top: 16px;
         }
         /* Change styles for span and cancel button on extra small screens */
         @media screen and (max-width: 300px) {
         span.psw {
         display: block;
         float: none;
         }
         .cancelbtn {
         width: 100%;
         }
         }
      </style>
   </head>
   <body class="hold-transition login-page">
      <div class="login-box">
         <div class="login-logo">
            <a href="../../index2.html"><b>Admin</b>KEBABQ</a>
         </div>
         <!-- /.login-logo -->
         <div class="card">
            <div class="card-body login-card-body">
               <p class="login-box-msg">Sign in to start your session</p>
               <form id="signin_form" action="{{route('login_post')}}" method="post">
                  {{csrf_field()}}
                  <div class="imgcontainer">
                     <img src="{{ asset('public/dist/img/download.jpg') }}" alt="Avatar" class="avatar">
                  </div>
                  <div class="container">
                     <label for="uname"><b>Email</b></label>
                     <input type="text" placeholder="Enter Username" name="email" required>
                     <label for="psw"><b>Password</b></label>
                     <input type="password" placeholder="Enter Password" name="password" required>
                            <input type="hidden" name="_token" value="{{Session::token()}}">                     
                     <button type="submit">Login</button>
                     <!-- <label>
                        <input type="checkbox" checked="checked" name="remember"> Remember me
                        </label> -->
                  </div>
                  <!-- <div class="container" style="background-color:#f1f1f1">
                     <h4>Welcome</h4>
                     <button type="button" class="cancelbtn">Cancel</button>
                     <span class="psw">Forgot <a href="#">password?</a></span>
                     </div> -->
               </form>
               <!-- <form id="signin_form" action="{{ route('login_post') }}" method="post"> -->
               <!--                {{csrf_field()}}
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
                  
                      <div class="button_signin">
                          <button type="submit" class="btn">Sign In</button></div>
                  </div>
                  </form> -->
               <!--  <div class="social-auth-links text-center mb-3">
                  <p>- OR -</p>
                  <a href="#" class="btn btn-block btn-primary">
                    <i class="fa fa-facebook mr-2"></i> Sign in using Facebook
                  </a>
                  <a href="#" class="btn btn-block btn-danger">
                    <i class="fa fa-google-plus mr-2"></i> Sign in using Google+
                  </a>
                  </div> -->
               <!-- /.social-auth-links -->
               <!-- <p class="mb-1">
                  <a href="#">I forgot my password</a>
                  </p>
                  <p class="mb-0">
                  <a href="register.html" class="text-center">Register a new membership</a>
                  </p> -->
            </div>
            <!-- /.login-card-body -->
         </div>
      </div>
      <!-- /.login-box -->
      <!-- jQuery -->
      <script src="{{asset('public/admin_assets/plugins/jquery/jquery.min.js')}}"></script>
      <!-- Bootstrap 4 -->
      <script src="{{asset('public/admin_assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      <!-- iCheck -->
      <script src="{{asset('public/admin_assets/plugins/iCheck/icheck.min.js')}}"></script>
      <script>
         $(function () {
           $('input').iCheck({
             checkboxClass: 'icheckbox_square-blue',
             radioClass   : 'iradio_square-blue',
             increaseArea : '20%' // optional
           })
         })
      </script>
   </body>
</html>