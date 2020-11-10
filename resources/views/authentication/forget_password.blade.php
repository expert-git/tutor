@extends('app')
@section('content')

<section class="login">
   <div class="container">
      <div class="row">
         <div class="col-md-4 col-md-offset-4 login-tutor">
            <h3 class="login_content">Forget Password</h3>
            <p class="f_account">Don’t have an account? <span><a href="{{route('signup')}}">Sign up for free</a></span></p>
            @include('partials.error_section')
            
						<form action="{{route('send_forget_email')}}" method="post">
							{{csrf_field()}}
							<div class="form-group">
								 <label for="exampleInputEmail1" class="f_label">Email Address</label>
								 <input type="email" name="email" class="form-control select_f f-control">
							</div>
							<!-- <label>Email</label>
							<input type="text" name="email"> -->
							<input type="submit" class="account_form" name="submit" value="Send">
						</form>
         </div>
      </div>
   </div>
</section>

@endsection
