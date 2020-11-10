@extends('app')
@section('content')

<section class="login">
   <div class="container">
      <div class="row">
         <div class="col-md-4 col-md-offset-4 login-tutor">
            <h3 class="login_content">New Password</h3>
            @include('partials.error_section')
            @foreach($errors->all() as $erroring)
                  <li>{{$erroring}}  </li>
                  @endforeach
						<form action="{{route('new_password',$user->email)}}" method="post">
							{{csrf_field()}}
							<div class="form-group">
								 <label for="password" class="f_label">New Password</label>
								 <input type="password" name="password" id="password" class="form-control select_f f-control">
							</div>
							<div class="form-group">
								 <label for="old_pass" class="f_label">Confirm Password</label>
								 <input type="password" name="password_confirmation" id="old_pass" class="form-control select_f f-control">
							</div>
							<input type="submit" class="account_form" name="submit" value="Submit">
						</form>
         </div>
      </div>
   </div>
</section>

@endsection

<!-- <!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="{{route('new_password',$user->email)}}" method="post">
		{{csrf_field()}}
		<label>new password</label>
		<input type="password" name="new_pass">
		<label>confirm password</label>
		<input type="password" name="old_pass">
		<input type="submit" name="submit">
	</form>
</body>
</html> -->
