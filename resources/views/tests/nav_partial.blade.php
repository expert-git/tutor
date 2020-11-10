<div class="collapse navbar-collapse" id="myNavbar">
<ul class="nav navbar-nav header-nav">
<li class="">
<!--     -->
<!--<ul class="dropdown-menu">
<li><a href="#">Page 1-1</a></li>
<li><a href="#">Page 1-2</a></li>
<li><a href="#">Page 1-3</a></li>
</ul>-->
<a class="f_dropdown"  data-toggle="dropdown" href="">FIND A TUTOR  <span class="glyphicon glyphicon-chevron-down text-muted f_icon"></span></a>

<ul class="dropdown-menu">
<li><a href="{{route('tutors_listing')}}">See All Tutors</a></li>
<li><a href="{{route('postjob_view')}}">Post Tutoring Jobs</a></li>
</ul>
</li>
<!-- <li class="dropdown">
<a class="dropdown-toggle f_dropdown" data-toggle="dropdown" href="howitworks.php">HOW IT WORKS  <span class="glyphicon glyphicon-chevron-down text-muted f_icon"></span></a>
<ul class="dropdown-menu">
<li><a href="#">Page 1-1</a></li>
<li><a href="#">Page 1-2</a></li>
<li><a href="#">Page 1-3</a></li>
</ul>
</li> -->
<li class="">
<a class="f_dropdown" data-toggle="dropdown" href="">HOW IT WORKS  <span class="glyphicon glyphicon-chevron-down text-muted f_icon"></span></a>
<ul class="dropdown-menu">
<li><a href="{{route('how_it_works')}}">For Students</a></li>
<li><a href="{{route('faqs')}}">FAQ's</a></li>
<li><a href="{{route('testimonials')}}">Testimonials</a></li>
</ul>
</li>
<li class="">
<a class="f_dropdown" data-toggle="dropdown" href="{{route('find_tutor')}}">START TUTORING  <span class="glyphicon glyphicon-chevron-down text-muted f_icon"></span></a>
<ul class="dropdown-menu">
<li><a href="{{route('fulltime_tutor')}}">Apply Now</a></li>
<li><a href="{{route('fulltime_tutor')}}">About Tutoring Jobs</a></li>
<li><a href="{{route('find_tutor')}}">Find Tutoring Jobs</a></li>
<li><a href="{{route('faqs')}}">FAQ's</a></li>
</ul>
</li>
@if(!Auth::check())
<li class="">
<a class="f_dropdown" data-toggle="dropdown" href="{{route('fulltime_tutor')}}">BECOME A TUTOR  <span class="glyphicon glyphicon-chevron-down text-muted f_icon"></span></a>
<ul class="dropdown-menu">
<li>
<a href="{{route('fulltime_tutor')}}">Register to Tutor</a>
</li>
</ul>
</li>
@endif
<li class="">
<a class="f_dropdown" data-toggle="dropdown" href="">PUBLICATIONS  <span class="glyphicon glyphicon-chevron-down text-muted f_icon"></span></a>
<ul class="dropdown-menu">
<li>
<a href="{{route('publications')}}">Publications to help your child</a>
</li>
</ul>
</li>
<li class="">
<a class="f_dropdown" data-toggle="dropdown" href="">ABOUT US  <span class="glyphicon glyphicon-chevron-down text-muted f_icon"></span></a>
<ul class="dropdown-menu">
<li>
<a href="{{route('fulltime_tutor')}}">Full Time Tutors</a>
</li>
<!--  <li>
<a href="{{route('fulltime_tutor')}}">Blogs</a>
</li> -->

<li>
<a href="{{route('aboutus')}}">About Us</a>
</li>
<li>
<a href="{{route('contactus')}}">Contact Us</a>
</li>
<li>
<a href="{{route('avail_jobs')}}">Jobs</a>
</li>
<li>
<a href="{{route('signin')}}">Login</a>
</li>
</ul>
</li>
@if(Auth::check())
<li class="dropdown user_page">
<a class="dropdown-toggle f_dropdown" data-toggle="dropdown" >{{Auth::user()->first_name}}  <span class="glyphicon glyphicon-chevron-down text-muted f_icon"></span></a>
<ul class="dropdown-menu">
@if(Auth::user()->role_id == 1)
<li><a href="{{route('admin-index')}}">Dashboard</a></li>
@else
<li><a href="{{route('dashboard_index')}}">Dashboard</a></li>
@endif
<li><a href="{{route('logout_user')}}">Logout</a></li>
</ul>
</li>
@endif
</ul>
</div>
