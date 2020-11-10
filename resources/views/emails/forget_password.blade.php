<!DOCTYPE html>
<html>
<head>
    <title>Forget Password</title>
</head>
 
<body>
	<img src="https://tutorsareus.org/public/assets/images/tutor_mail_img.png">

	<h3>Welcome back to the place where we all succeed!!! </h3>
	<br>
	<a href="{{route('set_new_password',$user->token)}}">Retrieve your password here.</a>

	<br><br>
	<p>TutorsAreUs </p>
	<p>1 -877 3 TUTORS</p>
</body>
 
</html>