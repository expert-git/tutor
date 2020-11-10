@extends('dashboard.dashboard-app')
@section('content')
<section class="profile">
   <div class="container-fluid f_padding">
      @include('dashboard.partials.dashboard-sidebar')

      <div class="col-md-9 f_padding bg_color">
        @include('partials.error_section')
         <div class="edit_profile">
            <h3 class="f_profile_content text-center">Change Password</h3>
         </div>
         <div class="col-md-6 col-md-offset-3">
            <form action="{{route('change_newpassword',$user_id)}}" method="post">
              <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
              <div class="form-group profile_form">
                <label>Current Password <span>*</label>
                <br>
                <input type="password" name="current_password" class="span3">
              </div>
              <div class="form-group profile_form">
                <label>Password <span>*</span> (Must Be Atleast 6 Characters)</label>
                <br>
                <input type="password" name="password" class="span3">
              </div>
              <div class="form-group profile_form">
                <label>Confirm Password <span>*</span></label>
                <br>
                <input type="password" name="password_confirmation" class="span3">
              </div>
              <input type="submit" value="SAVE CHANGES" class="btn btn-primary f_save">
              <div class="clearfix"></div>
            </form>
         </div>
      </div>
   </div>
</section>
@endsection
