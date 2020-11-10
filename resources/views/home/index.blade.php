@extends('app')
@section('content')
<style>
@-webkit-keyframes agujoe {
  0% {background-size: 50%;}
  
  100% {background-size: 100%;}
} 
  
.agujoe{
  
  -webkit-animation-name: agujoe; 
  -webkit-animation-duration: 0s; 
  -webkit-animation-iteration-count: infinite;  
  } 
</style>
<section class="tutor agujoe" style="background-color: #534051; background: url('{{ asset('assets/images/banner2.jpg') }}') no-repeat center; background-size: 100%;transition: background-image 1s;">
   <div class="w3-content">
      <!-- <img class="mySlides img_home" src="{{ asset('assets/images/banner2.jpg') }}" class="img-responsive"> -->
      <!-- <img class="mySlides img_home" src="{{ asset('assets/images/slide1.jpg') }}" class="img-responsive"> -->
      <!-- <img class="mySlides img_home" src="{{ asset('assets/images/timetutor1.jpg') }}" class="img-responsive"> -->
      <!-- <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
      <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button> -->
      <div class="header-text">
         <div class="col-md-12 text-center">
            <h2>
               Online Learning Anytime, Anywhere!
            </h2>
            <br>
            <h3>
              <a href="{{route('tutors_listing')}}">Search</a>  - <a href="{{route('signup')}}">Register</a>  - <a href="">Excel</a>
            </h3>
            <p>Tutors Are US is a subsidiary of Available Group LLC. We are here to meet your needs.  Our teaching philosophy is <br> teaching with fun. We want to create “A” students.  We don’t just tutor, we test the student first</p>
            <br>
            <div class="">
               <a class="btn btn-theme btn-sm btn-min-block f_about f_size f_btnpadding" href="{{route('aboutus')}}">ABOUT US</a>
               <a class="btn btn-theme btn-sm btn-min-block f_about f_size" href="{{route('student_pretest')}}">Pre - Test </a>
            </div>
         </div>
      </div>
   </div>
   <!-- <div class="container-fluid">
      <div class="row">
         <div class="col-md-12 f_padding">
            <div class="img_banner">
               <img src="{{ asset('assets/images/banner2.png') }}" class="img_home">
            </div>
            <div class="header-text">
               <div class="col-md-12 text-center">
                  <h2>
                     Online Learning Anytime, Anywhere!
                  </h2>
                  <br>
                  <h3>
                     Search - Register - Excel
                  </h3>
                  <p>Tutors Are US is a subsidiary of Available Group LLC. We are here to meet your needs. Our teaching philosophy is <br>teaching with fun and to create “A” student. Lets turn you into an A student in 3 easy steps</p>
                  <br>
                  <div class="">
                     <a class="btn btn-theme btn-sm btn-min-block f_about f_size f_iphone" href="#">ABOUT US</a><a class="btn btn-theme btn-sm btn-min-block f_about f_size" href="#">CONTACT US</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div> -->
   <div class="container">
      <div class="row">
         <div class="col-md-12 f_main">
            @include('partials.error_section')
            <h3 class="f_content">What are you looking for?</h3>
            <hr>
            <section id="tabs">
               <nav>
                  <div class="nav nav-tabs nav-fill f_nav" id="nav-tab" role="tablist">
                     <div class="col-md-3 col-sm-3 col-md-offset-1">
                        <a class="nav-item nav-link f_tab active-tab" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fa fa-home f_home" aria-hidden="true"></i>Home Tutoring</a>
                     </div>
                     <div class="col-md-3 col-sm-3 col-md-offset-1">
                        <a class="nav-item nav-link f_tab" id="nav-contact-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fa fa-desktop f_home"></i>Online Tutoring</a>
                     </div>
                     <div class="col-md-3 col-sm-3 col-md-offset-1">
                        <a class="nav-item nav-link f_tab" id="nav-about-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="fa fa-hourglass-half f_home"></i>Full Time</a>
                     </div>
                  </div>
               </nav>
               <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                  <div class="tab-pane fade active in" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                     <form action="{{route('tutors_listing')}}" method="get">

                        <input type="hidden" name="home" value="1">
                        <div class="form-group col-md-6 f_bottom">
                           <select class="form-control f_color" id="course" name="course">
                              <option>Type of Subjects</option>
                              @foreach($subjects as $subject)
                              <option value="{{$subject->id}}">{{$subject->subject}}</option>
                              @endforeach
                           </select>
                        </div>
                        <div class="form-group col-md-3 f_bottom">
                           <select class="form-control f_color" id="location" name="location">
                              <option>Select Location</option>
                              @foreach($countries as $country)
                              <option value="{{$country->id}}">{{$country->name}}</option>
                              @endforeach
                           </select>
                        </div>
                        <div class="col-md-3 f_bottom"><button type="submit" class="btn btn-default f_color button_tour">SEARCH TUTOR</button></div>
                     </form>
                  </div>
                  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-contact-tab">
                     <form action="{{route('tutors_listing')}}" method="get">

                        <input type="hidden" name="home" value="2">
                        <div class="form-group col-md-6 f_bottom">
                           <select class="form-control f_color" id="course" name="course">
                              <option>Type of Subject</option>
                              @foreach($subjects as $subject)
                              <option value="{{$subject->id}}">{{$subject->subject}}</option>
                              @endforeach
                           </select>
                        </div>
                        <div class="form-group col-md-3 f_bottom">
                           <select class="form-control f_color" id="location" name="location">
                              <option>Select Location</option>
                              @foreach($countries as $country)
                              <option value="{{$country->id}}">{{$country->name}}</option>
                              @endforeach
                           </select>
                        </div>
                        <div class="col-md-3 f_bottom"><button type="submit" class="btn btn-default f_color button_tour">SEARCH TOUR</button></div>
                     </form>
                  </div>
                  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-about-tab">
                    <form action="{{route('tutors_listing')}}" method="get">

                     <input type="hidden" name="home" value="3">
                     <div class="form-group col-md-6 f_bottom">
                        <select class="form-control f_color" id="course" name="course">
                           <option>Type of Subject</option>
                           @foreach($subjects as $subject)
                           <option value="{{$subject->id}}">{{$subject->subject}}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="form-group col-md-3 f_bottom">
                        <select class="form-control f_color" id="location" name="location">
                           <option>Select Location</option>
                           @foreach($countries as $country)
                           <option value="{{$country->id}}">{{$country->name}}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="col-md-3 f_bottom"><button type="submit" class="btn btn-default f_color button_tour">SEARCH TOUR</button></div>
                    </form>
                  </div>
              </div>
           </section>
        </div>
      </div>
    </div>
  </section>
    <section class="info" style="margin-top: 100px">
       <div class="container">
          <div class="row">
             <div class="col-md-4 col-md-offset-0 col-sm-6 col-xs-12 text-center">
                <img src="{{ asset('assets/images/image1.png') }}" class="img-responsive info_img">
                <h3 class="f_online">Video and Images</h3>
                <p class="f_meet">we can meet the student online or we can come <br>to your home or designated location. You don’t <br>have to worry. We have tutors ASAP (AS SOON <br>AS POSSIBLE) and PRN (AS needed). We can <br>help you or your child succeed. </p>
             </div>
             <div class="col-md-4 col-sm-6 col-xs-12 text-center">
                <img src="{{ asset('assets/images/image2.png') }}" class="img-responsive info_img">
                <h3 class="f_online">Quality Scores</h3>
                <p class="f_meet">We have highly qualified tutors to meet you or <br>your child’s tutoring needs</p>
             </div>
             <div class="col-md-4 col-sm-6 col-xs-12 text-center col-md-offset-0 col-sm-offset-3 col-xs-offset-0">
                <img src="{{ asset('assets/images/image3.png') }}" class="img-responsive info_img">
                <h3 class="f_online">Reviews & Ratings</h3>
                <p class="f_meet">No more emails, Calls or messaging friends for <br>recommendations - Get Access to real reviews<br>
                   in seconds
                </p>
             </div>
          </div>
       </div>
    </section>
</section>
<div class="clearfix"></div>
<section class="check">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-4 col-md-offset-1">
            <h3 class="f_check">We Got you, <br> We can help!!!</h3>
            <p class="f_per">You do not have to worry at all; we have suggested curriculum that we share with you and our tutors in order to monitor student’s progress. We reward student’s performance at the end of a year when they improve. We are here to motivate our students and we value their progress. </p>
            <br>
            <p class="f_per">
              <strong>Feel free to call us at - 1-877-388- 8677</strong>
            </p>
            <div class="btn_check"><a href="">CHECK ALL SUBJECTS</a></div>
         </div>
         <div class="col-md-7">
            <div class="row">
               <div class="col-md-4" style="padding: 0px;">
                  <div class="bg_green">
                     <div class="f_math">
                        <img src="{{ asset('assets/images/maths.png') }}" class="img-responsive img_math">
                        <p class="math">Mathematics</p>
                     </div>
                  </div>
                  <div class="bg_light_blue">
                     <div class="f_math">
                        <img src="{{ asset('assets/images/language.png') }}" class="img-responsive img_math">
                        <p class="math">Languages</p>
                     </div>
                  </div>
                  <div class="bg_organ">
                     <div class="f_math">
                        <img src="{{ asset('assets/images/atom.png') }}" class="img-responsive img_math">
                        <p class="math">Science</p>
                     </div>
                  </div>
                  <div class="bg_sky_blue">
                     <div class="f_math">
                        <img src="{{ asset('assets/images/bookmark.png') }}" class="img-responsive img_math">
                        <p class="math">Other Subjects</p>
                     </div>
                  </div>
               </div>
               <div class="col-md-8 f_padding1">
                  <img src="{{ asset('assets/images/info_img.png') }}" class="img-responsive f_img1">
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!--Start New Html -->
<section class="quality_scores">
   <div class="container">
      <div class="row">
         <h3 class="f_check text-center">Quality scores</h3>
         <div class="col-md-6 col-sm-6 col-xs-12 ">
          <h3 class="added_course">We have highly qualified tutors to meet you or your child’s tutoring needs.  </h3>
          <p class="sub_heading_qs">We can meet the student online or we can come to your home or designated location. You don’t have to worry. We have tutors ASAP (AS SOON AS POSSIBLE) and PRN (AS needed). We can help you or your child succeed.</p>
         </div>
         <div class="col-md-6 col-sm-6 col-xs-12 text-center">
          <img src="{{ asset('assets/images/qs.jpg') }}" class="img-responsive f_margin">
         </div>
       </div>
   </div>
</section>
<!-- End New Html -->
<section class="images_courses">
   <div class="container">
      <div class="row">
         <h3 class="added_course">Recent Added Subjects</h3>
         <div class="col-md-4 col-sm-4 col-xs-12 text-center">
            <img src="{{ asset('assets/images/images1.png') }}" class="img-responsive f_margin">
            <h3 class="full_time">Full Time Tutoring</h3>
            <p class="f_vul">&nbsp;</p>
         </div>
         <div class="col-md-4 col-sm-4 col-xs-12 text-center">
            <img src="{{ asset('assets/images/images2.png') }}" class="img-responsive f_margin">
            <h3 class="full_time">Science Fair Help</h3>
            <p class="f_vul">&nbsp;</p>
         </div>
         <div class="col-md-4 col-sm-4 col-xs-12 text-center">
            <img src="{{ asset('assets/images/images3.png') }}" class="img-responsive f_margin">
            <h3 class="full_time">Social Studies</h3>
            <p class="f_vul">&nbsp;</p>
         </div>
      </div>
      <div class="row">
         <div class="col-md-4 col-sm-4 col-xs-12 text-center">
            <img src="{{ asset('assets/images/images1.png') }}" class="img-responsive f_margin">
            <h3 class="full_time">French</h3>
            <p class="f_vul">&nbsp;</p>
         </div>
         <div class="col-md-4 col-sm-4 col-xs-12 text-center">
            <img src="{{ asset('assets/images/images2.png') }}" class="img-responsive f_margin">
            <h3 class="full_time">Early Childhood Tutoring</h3>
            <p class="f_vul">&nbsp;</p>
         </div>
         <div class="col-md-4 col-sm-4 col-xs-12 text-center">
            <img src="{{ asset('assets/images/images3.png') }}" class="img-responsive f_margin">
            <h3 class="full_time">Math</h3>
            <p class="f_vul">&nbsp;</p>
         </div>
      </div>
   </div>
</section>
<section class="f_choose">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-6 f_side_padding">
            <img src="{{ asset('assets/images/computer1.png') }}" class="img-responsive">
         </div>
         <div class="col-md-6">
            <h3 class="f_text">Why choose us?</h3>
            <p class="f_tutor">
               <i class="fa fa-check"></i>
               We conduct a <a href="{{route('student_pretest')}}">pretest </a>  to know where the student stands
            </p>
            <br>
            <p class="f_tutor"><i class="fa fa-check"></i>We tutor based on the <a href="{{route('student_pretest')}}">pre test</a> and specific child needs</p>
            <br>
            <p class="f_tutor"><i class="fa fa-check"></i>We have qualified tutors to meet your needs</p>
            <br>
            <div class="btn_check">
              <a href="{{route('how_it_works')}}">HOW DOES THIS WORK</a>
              <a href="{{route('signup')}}">SIGN UP FOR DIAGNOSTIC TEST</a>
            </div>
         </div>
      </div>
   </div>
</section>


<!-- <section class="logo_f">
   <div class="container">
      <h3 class="added_course">Featured on</h3>
      <div class="row">
         <div class="col-md-2 col-sm-6 col-xs-6">
            <img src="{{ asset('assets/images/logo1.png') }}" class="img-responsive f_logo">
         </div>
         <div class="col-md-2 col-sm-6 col-xs-6">
            <img src="{{ asset('assets/images/logo2.png') }}" class="img-responsive f_logo">
         </div>
         <div class="col-md-2 col-sm-6 col-xs-6">
            <img src="{{ asset('assets/images/logo3.png') }}" class="img-responsive f_width f_logo">
         </div>
         <div class="col-md-2 col-sm-6 col-xs-6">
            <img src="{{ asset('assets/images/logo4.png') }}" class="img-responsive f_width1 f_logo">
         </div>
         <div class="col-md-2 col-sm-6 col-xs-6">
            <img src="{{ asset('assets/images/logo5.png') }}" class="img-responsive f_logo">
         </div>
         <div class="col-md-2 col-sm-6 col-xs-6">
            <img src="{{ asset('assets/images/logo6.png') }}" class="img-responsive f_logo">
         </div>
      </div>
   </div>
</section> -->
@endsection
