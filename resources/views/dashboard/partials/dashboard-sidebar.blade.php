 <div class="col-md-3 border_left f_padding bg_color_white">


        <div class="profile-pic">
        
          @if(!empty(Auth::user()->profile->profile_pic) && isset(Auth::user()->profile->profile_pic))
            <img class="img-circle" src="{{asset('public/dashboard/assets/images/profile/' . Auth::user()->profile->profile_pic)}}">
             @else
             <img alt="" class="img-circle" src="{{asset('public/dashboard/assets/images/dashboard_img.png')}}">
          @endif

          <div class="edit-profile-pic">
             <form id="change_profile_pic_file" action="{{route('imageUpload')}}" method="post" enctype="multipart/form-data">
               {{csrf_field()}}
                     <input name="user_id" value="{{Auth::user()->id}}" type="hidden">
                <div class="camera_image">
                  <i class="fa fa-camera fa-2x" aria-hidden="true"></i>
                  <input name="profile_pic" id="change_profile_pic_file" type="file">
                </div>
             </form>
          </div>
        </div>
        <!-- <img src="{{ asset('public/dashboard/assets/images/dashboard_img.png') }}" class="img-responsive f_dashimg"> -->
        <h3 class="f_name">

        {{ Auth::user()->first_name }} (@if(Auth::user()->role_id == 2) Student
         @elseif( Auth::user()->role_id == 3) Tutor @endif )

         </h3>
      <!--  <p class="user_f">
          User Login: 25/04/2018 05:53:40
        </p> -->
        <p class="user_f">
          <a href="{{ route('my_balance') }}">Balance $: {{ $wallet->balance}}</a>
        </p>

        <div class="vertical-menu">
          <div class="s_nav_menu">
            <a href="{{ route('dashboard_index') }}" class="active"><i class="fa fa-tachometer f_icon_menu"></i>Dashboard</a>
          </div>
             @if(Auth::user()->role_id==2)
          <div class="s_nav_menu">
            <a href="{{route('tutors_listing')}}"><i class="fa fa-user f_icon_menu" aria-hidden="true"></i>My Tutor</a>
          </div>
            @endif 
          @role('student')
          <div class="s_nav_menu">
            <a href="{{route('post-job-list')}}"><i class="fa fa-user f_icon_menu" aria-hidden="true"></i>My Jobs</a>
          </div>
          @endrole
          @if(Auth::user()->role_id==3)
          <div class="s_nav_menu">
            <a href="{{route('subjects')}}"><i class="fa fa-user f_icon_menu" aria-hidden="true"></i>Subjects</a>
          </div>
          <div class="s_nav_menu">
            <a href="{{route('tutor_earnings')}}"><i class="fa fa-user f_icon_menu" aria-hidden="true"></i>Earnings </a>
          </div>

          @endif 

          @if(Auth::user()->role_id==2)
          <div class="s_nav_menu">
            <a href="{{route('student_pretest')}}"><i class="fa fa-user f_icon_menu" aria-hidden="true"></i>Pre-test </a>
          </div>          
          @endif  

         @if(Auth::user()->role_id==2)
          <div class="s_nav_menu">
            <a href="{{route('my_result')}}"><i class="fa fa-file f_icon_menu" aria-hidden="true"></i>My Result </a>
          </div>          
          @endif  
		  
	
              
          

          <div class="s_nav_menu">
            <a href="{{route('invite_friend')}}"><i class="fa fa-user-plus f_icon_menu"></i>Invite Friends</a>
          </div>
          <div class="s_nav_menu">
            <a href="{{route('chat_box')}}"><i class="fa fa-envelope f_icon_menu" aria-hidden="true"></i>Messages</a>
          </div>
          <div class="s_nav_menu">
            <a href="{{route('bookings_list')}}"><i class="fa fa-calendar-check-o f_icon_menu"></i>Booking</a>
          </div>
          <div class="s_nav_menu">
            <a href="{{route('my_transactions')}}"><i class="fa fa-credit-card f_icon_menu"></i>Transaction</a>
          </div>
          
          @if(Auth::user()->role_id==3)
            <div class="s_nav_menu">
              <a href="{{route('create_schedule')}}"><i class="fa fa-credit-card f_icon_menu"></i>Scheduling</a>
            </div> 

            <div class="s_nav_menu">
              <a href="https://tutorsareus.vedamo.com/login" target="_blank"><i class="fa fa-credit-card f_icon_menu" ></i>Class Room</a>
            </div>          
          @endif

          <div class="s_nav_menu">
            <a href="{{route('my_balance')}}"><i class="fa fa-credit-card f_icon_menu"></i>My Wallet</a>
          </div>
		  
		   <div class="s_nav_menu">
            <a href="{{route('contact_admin')}}"><i class="fa fa-file f_icon_menu" aria-hidden="true"></i>Contact Admin </a>
          </div>     
		  
          <div class="s_nav_menu">
            <a><i class="fa fa-cog f_icon_menu"></i>Settings <span class="glyphicon glyphicon-chevron-down"></span></a>
            <div class="s_sub_menu hidden">
              <a href="{{route('change_pass_index',Auth::user()->id)}}"><i class="fa fa-cog f_icon_menu"></i>Change Password</a>
              <!-- <a href="#"><i class="fa fa-cog f_icon_menu"></i>Settings</a>
              <a href="#"><i class="fa fa-cog f_icon_menu"></i>Settings</a> -->
            </div>
          </div>
          <div class="s_nav_menu">
            <a href="{{route('logout_user')}}"><i class="fa fa-sign-out f_icon_menu" aria-hidden="true"></i>Logout</a>
          </div>
        </div>

      </div>
