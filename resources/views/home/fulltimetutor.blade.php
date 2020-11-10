@extends('app')
@section('content')

<section class="fulltime_tutor">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h3 class="f_public">
               Full Time Tutor
            </h3>
            <p class="f_time">Do you need a full time tutor, a traveling tutor or someone to tutor your child full time. We can post the job here We can help to find full <br>time tutors. We will pre screen and interview them and give you an opportunity to interview qualified applicants that meet your needs</p>
         </div>
      </div>
   </div>
   <div class="fulltime_content">
      <div class="container">

         <div class="row">
            <div class="col-md-6">
               <h3 class="f_register">Online Tutor</h3>
               <div class="time_click"><a href="{{ route('signup') }}">REGISTER HERE</a></div>
            </div>
            <div class="col-md-6">
               <img src="{{ asset('assets/images/timetutor1.jpg') }}" class="img-responsive fulltime_img">
            </div>
         </div>
         <!-- Mobile Html -->
         <div class="row f_xs_view">
            <div class="col-xs-12 text-center">
               <h3 class="f_register">Offline Tutor</h3>
               <div class="time_click"><a href="{{ route('signup') }}">REGISTER HERE</a></div>
               <img src="{{ asset('assets/images/timetutor3.png') }}" class="img-responsive fulltime_img">
            </div>
         </div>
         <!-- Desktop Html -->
         <div class="row f_md_view">
            <div class="col-md-6">
               <img src="{{ asset('assets/images/timetutor3.png') }}" class="img-responsive fulltime_img">
            </div>
            <div class="col-md-6">
               <h3 class="f_register">Offline Tutor</h3>
               <div class="time_click"><a href="{{ route('signup') }}">REGISTER HERE</a></div>
            </div>
         </div>


         <div class="row">
            <div class="col-md-6">
               <h3 class="f_register">Register for full time tutors and<br>we can start the process.</h3>
            </div>
            <div class="col-md-6">
               <img src="{{ asset('assets/images/timetutor1.jpg') }}" class="img-responsive fulltime_img">
            </div>
         </div>
         <!-- Mobile Html -->
         <div class="row f_xs_view">
            <div class="col-xs-12 text-center">
               <h3 class="f_register">Interested in becoming a<br>full time tutor</h3>
               <div class="time_click"><a href="route{{('full_time_tutor')}}">SEND EMAIL</a></div>
               <img src="{{ asset('assets/images/timetutor3.png') }}" class="img-responsive fulltime_img">
            </div>
         </div>
         <!-- Desktop Html -->
         <div class="row f_md_view">
            <div class="col-md-6">
               <img src="{{ asset('assets/images/timetutor3.png') }}" class="img-responsive fulltime_img">
            </div>
            <div class="col-md-6">
               <h3 class="f_register">Interested in becoming a<br>full time tutor</h3>
               <div class="time_click"><a href="{{route('contactus')}}">SEND EMAIL</a></div>
            </div>
         </div>
      </div>
   </div>
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12 f_padding">
            <div class="img_last"><img src="{{ asset('assets/images/fulltime_image.png') }}" class="img-responsive" style="width: 100%;"></div>
            <div class="header-text f_margintop">
               <div class="col-md-12 text-center">
                  <h2>
                     There are 0 Lessons taught already!
                  </h2>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

@endsection