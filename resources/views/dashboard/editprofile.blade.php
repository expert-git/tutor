@extends('dashboard.dashboard-app')
@section('content')

<section class="profile">

   <div class="container-fluid remove_padding bg_color_gray">
  		@include('dashboard.partials.dashboard-sidebar')
      <!--<div class="col-md-3 border_left f_padding">
      	<img src="assets/images/dashboard_img.png" class="img-responsive f_dashimg">
      	<h3 class="f_name">JOHN DOE</h3>
      	<p class="user_f">User Login: 25/04/2018 05:53:40 <br>Balance $: 0</p>
      	<div class="vertical-menu">
  <a href="#" class="active">Dashboard</a>
  <a href="#">Search Tutor</a>
  <a href="#">My Tutor</a>
  <a href="#">Invite Friends</a>
  <a href="#">Messages</a>
  <a href="#">Booking</a>
  <a href="#">Transaction</a>
  <a href="#">Settings</a>
  <a href="#">Logout</a>
</div>

      </div>-->

      <div class="col-md-9 f_padding bg_color">
      	<div class="edit_profile">
      	<h3 class="f_profile_content">Edit Profile</h3>
        @include('partials.error_section')
        @foreach($errors->all() as $erroring)
                  <li>{{$erroring}}  </li>
                  @endforeach
      <!-- 	<p class="f_text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, elium totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.</p> -->

      </div>

  <div class="col-md-6">
  	<form action="{{ route('edit_profile') }}" method="post" enctype="multipart/form-data">
  		 <div class="form-group profile_form">
    <label>First Name <span>*</span></label>
    <br>
    <input type="text" name="first_name" value="{{ isset($user->first_name) ? $user->first_name : '' }}" class="span3" required>
  </div>
   <div class="form-group profile_form">
      <label>Last Name <span>*</span></label>
      <br>
      <input type="text" name="last_name" value="{{ isset($user->last_name) ? $user->last_name : '' }}" class="span3" required>
  </div>

  @if(Auth::user()->role_id == 3)
   <div class="form-group profile_form">
      <label>Rates / Hour <span>*</span></label>
      <br>
      <input type="text" name="tution_per_hour" value="{{ isset($user->tution_per_hour) ? $user->tution_per_hour : '' }}" class="span3" >
   </div>
  @endif

 <div class="form-group profile_form">
    <label>Bio <span>*</span></label>
    <br>
    <textarea name="bio" class="span3 form-control" >{{ isset($user->bio) ? $user->bio : '' }}</textarea>
    <!-- <input type="text" name="bio" value="{{ isset($user->tution_per_hour) ? $user->tution_per_hour : '' }}" class="span3"> -->
</div>

  <div class="form-group profile_form">
    <label>Age <span>*</span></label>
    <br>
    <input type="number" name="age" id="exampleInputage" value="{{$user->age}}" class="span3">
  </div>

  <div class="form-group profile_form">
    <label>Qualifications <span>*</span></label>
    <br>
    <input type="text" name="qualifications" id="exampleInputage" value="{{$user->qualifications}}" class="span3">
  </div>

  <div class="form-group profile_form">
    <label>Qualifications From <span>*</span></label>
    <br>
    <input type="text" name="qualification_from" id="exampleInputage" value="{{$user->qualification_from}}" class="span3">
  </div>

 <div class="form-group profile_form">
  <label>Gender</label>
   <select class="form-control select_f span3" id="gender" name="gender">
               <option value="male" @if($user->gender=="male") selected @endif>Male</option>
               <option value="female" @if($user->gender=="female") selected @endif>female</option>
   </select>
  </div>


 <div class="form-group profile_form">
    <label>Profile picture <span>*</span></label>
    <br>
    <input type="file" name="profile_pic" id="profile_pic" class="span3">
</div>

<!--  <div class="form-group profile_form">
    <label>Email <span>*</span></label>
    <br>
    <input type="email" name="email"  class="span3">
</div> -->
<!--  <div class="form-group profile_form">
    <label>Username</label>
    <br>
    <input type="text" name="username" class="span3">
</div> -->
<!--  <div class="form-group profile_form">
    <label>Password <span>*</span> (Must Be Atleast 6 Characters):</label>
    <br>
    <input type="password" name="password" class="span3">
</div>
 <div class="form-group profile_form">
    <label>Confirm Password <span>*</span></label>
    <br>
    <input type="password" name="password" class="span3">
</div> -->


  </div>

  <div class="col-md-6">


  		 <div class="form-group account_f_form">
    <label>Address</label>
    <br>
    <input type="text" name="address" value="{{ isset($user->address) ? $user->address : '' }}" class="span3">
</div>
 <div class="form-group account_f_form">
    <label>Zip Code</label>
    <br>
    <input type="text" name="zipcode" value="{{ isset($user->zipcode) ? $user->zipcode : '' }}" class="span3">
</div>
 

            <div class="form-group">
              <label for="exampleInputlesson" class="f_label">Lesson Type</label>
              <select class="form-control select_f" id="lesson" name="lesson_type" data-url="{{route('profile_register.ajax')}}">
                 <option>Select</option>
                 @foreach($lessons as $lesson)
                    <option value="{{$lesson->id}}" @if($lesson->id == $user->lesson_type)  selected @endif >  {{$lesson->type}}</option>
                 @endforeach
              </select>
            </div>
                
            <div class="form-group">
              <label for="exampleInputcountry" class="f_label">Country</label>
              <select class="form-control select_f" id="country" name="profile_country" data-url="{{route('profile_register.ajax')}}">
                 <option>Select</option>
                 @foreach($countries as $country)
                    <option value="{{$country->id}}" @if($country->id == $user->country_id)  selected @endif>{{$country->name}}</option>
                 @endforeach
              </select>
            </div>

               <div class="form-group">
                  <label for="exampleInputstate" class="f_label">City</label>
                  <select class="form-control select_f" id="city" name="city" >
                     <option>Select</option>
                     <div id="cityDropdown">
                           
                     </div>
                  <!--    @foreach($states as $state)
                        <option value="{{$state->id}}">{{$state->name}}</option>
                     @endforeach -->
                  </select>
               </div>
 <div class="form-group account_f_form">
    <label>Phone Number <span>*</span></label>
    <br>
    <div class="row">
      <div class="col-md-6">
        <!--<input type="phonenum" name="phonenum" class="span3">-->

<div class="date">

<select class="form-control select_f" id="" name="countryCode">
                 <option>Select</option>
                 @foreach($countries as $country)
                    <option value="{{$country->id}}" @if($country->id == $user->country_id)  selected @endif>{{$country->name}}</option>
                 @endforeach
              </select>
                       </div>

        <!-- <div class="date">
          <select name="countryCode" id="" class="span3">
             <option data-countryCode="GB" value="44" Selected><span class="country_f">United States +1</span></option>
             <option data-countryCode="US" value="1">USA (+1)</option>
             <optgroup label="Other countries">
                <option data-countryCode="DZ" value="213">Algeria (+213)</option>
                <option data-countryCode="AD" value="376">Andorra (+376)</option>
                <option data-countryCode="AO" value="244">Angola (+244)</option>
                <option data-countryCode="AI" value="1264">Anguilla (+1264)</option>
                <option data-countryCode="AG" value="1268">Antigua & Barbuda (+1268)</option>
             <option data-countryCode="ZW" value="263">Zimbabwe (+263)</option>
             </optgroup>
          </select>
        </div> -->
      </div>

      <div class="col-md-6">
          <input type="phonenum1" name="phonenum1" value="{{ isset($user->phone_no) ? $user->phone_no: '' }}" class="span3" placeholder="Phone Number">
      </div>
    </div>
  </div>



<input type="hidden" name="user_id" value="{{$user->user_id}}">

<input type="hidden" name="_token" value="{{Session::token()}}">
<input type="submit" value="SAVE CHANGES" class="btn btn-primary f_save">
    <div class="clearfix"></div>
    </form>
  </div>

</div>
</div>
</section>


@endsection
