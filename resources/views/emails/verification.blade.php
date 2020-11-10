<!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
</head>

<style type="text/css">
	.e-container{
		width: 80%;
		margin: auto;
	}
</style>
 
<body>
	<div class="e-container">
		<!-- <img src="{{ asset('assets/images/logo_big.png') }}"> -->
		<img src="https://tutorsareus.org/public/assets/images/tutor_mail_img.png">

		<h3>Dear {{ $user->name }},</h3>
		<h3>Welcome to Tutorsareus family.</h3>
		@if($user->role_id == 2)
		
        <p>Thank you for making a decision for success. You can get started by taking a <a href="{{ route('student_pretest') }}">diagnostic test</a> and contacting tutors. We look forward to  helping you to succeed.</p>

		@else
			<p>Welcome to tutorsareus family. Thank you for joining the family of successful people. We would like to make you successful by tutoring as many students as possible.  </p>
		@endif
		<p>But , first, <a href="{{route('verified_email',['email_token' => $user->email_token])}}">confirm your email here</a></p>
		
		@if($user->role_id == 2)
			<p>
				You can get a copy of  tutors’ background checks  by sending an email to  backgroundcheck@tutorsareus.org.  You can also make some money that will be applied towards your account by referring a friend! You will receive a $10 tutoring credit for every friend you refer after their fifth session. Your friend also receives $10 off of their fifth session. To refer a friend, send an email with your name,  and the name of your friend to  referral@tutorsareus.org 
			</p>
		@else
			<p>Also, don’t forget our referral program. You can make money by referring both students and tutors. To learn more about the referral program <a href="https://tutorsareus.org/faqs">click  here </a>. We encourage all tutors to do a background check to enhance your credibility. You can do your background by <a href="https://tutorsareus.quickapp.pro/">clicking </a>  for a nominal fee of $14. You will receive $10 per every background check request from clients up to  $20 to cover your background check fee.</p>
		@endif

		<p>Once again, welcome to a place where we all succeed!</p><br><br>
		<p>TutorsAreUs</p>
		<p>1 -877 3 TUTORS</p>

	</div>

</body>
 
</html>