@extends('app')
@section('content')

<section class="howitworks">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h3 class="f_maintext">Yes, you can!! Nothing is difficult - it's easy ... We can help you to make it easy.</h3>
            <h3 class="f_maincontent">You can get a perfect tutor, and a perfect instruction in 5 easy steps</h3>
            <p class="p_tutors">Tutors Are Us can match you with the most perfect tutor you need. Let’s improve that grade.
               <br>We are here to help. You don’t have to worry at all.
            </p>
         </div>
      </div>
   </div>
</section>
<section class="tutor_work">
   <div class="container">
      <div class="row">
         <div class="col-md-6">
            <h3 class="f_take">1. <a href="">Take the optional pretest</a></h3>
            <p class="p_take">Take the optional pre test. The pre test let us know the areas <br>that our students need help in. The areas we need to tackle first <br>during tutoring. Our goal is to get our students above grade <br>level in order to succeed academically.</p>
         </div>
         <div class="col-md-6">
            <img src="{{ asset('assets/images/work_image1.png') }}" class="img-responsive f_imgres">
         </div>
      </div>
      <!--Mobile-->
      <div class="row f_xs_view">
         <div class="col-xs-12">
            <h3 class="f_take">2. <a href="{{route('tutors_listing')}}">Tell us your needs</a></h3>
            <p class="p_take">What subjects do you need help with? What location are you meeting the tutor at? Is it in-home, online or at a designated place? Once, this questions are answered. You are all set.. We will match you.</p>
            <img src="{{ asset('assets/images/work_image2.png') }}" class="img-responsive f_imgres">
         </div>
      </div>
      <!--Desktop-->
      <div class="row f_md_view">
         <div class="col-md-6">
            <img src="{{ asset('assets/images/work_image2.png') }}" class="img-responsive f_imgres">
         </div>
         <div class="col-md-6">
            <h3 class="f_take">2.<a href="{{route('tutors_listing')}}"> Tell us your needs</a></h3>
            <p class="p_take">What subjects do you need help with? What location are you meeting the tutor at? Is it in-home, online or at a designated place? Once, this questions are answered. You are all set.. We will match you.</p>
         </div>
      </div>
      <div class="row">
         <div class="col-md-6">
            <h3 class="f_take f_margintop">3.<a href="{{route('tutors_listing')}}"> Pick a tutor that meets your needs</a></h3>
            <p class="p_take">You may contact or chat with your tutor.</p>
         </div>
         <div class="col-md-6">
            <img src="{{ asset('assets/images/work_image3.png') }}" class="img-responsive f_imgres">
         </div>
      </div>
      <!--Mobile-->
      <div class="row">
         <div class="col-md-6">
            <h3 class="f_take f_start f_xs_view">4. <a href="{{route('tutors_listing')}}">Start tutoring</a></h3>
         </div>
      </div>
      <!--Mobile-->
      <!--Desktop-->
      <div class="row f_worklast">
         <div class="col-md-6">
            <img src="{{ asset('assets/images/work_image4.png') }}" class="img-responsive f_imgres">
            <h3 class="f_take f_start f_md_view">4.<a href="{{route('tutors_listing')}}"> Start tutoring</a></h3>
         </div>
         <!--Mobile-->
         <div class="col-md-6">
            <h3 class="f_take f_start f_xs_view">5. Succeed</h3>
         </div>
         <!--Mobile-->
         <div class="col-md-6">
            <img src="{{ asset('assets/images/work_image5.png') }}" class="img-responsive f_imgres">
            <h3 class="f_take f_start f_md_view">5. Succeed</h3>
         </div>
      </div>
      <!--Desktop-->
   </div>
</section>
<section class="logo_f">
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
</section>

@endsection