@extends('app')
@section('content')
<section class="aboutus">
 @include('partials.error_section')
   <div class="container">
      <div class="row">
         <div class="col-md-8">
            <h3 class="about_text">Contact Us</h3>
            <p class="f_contact s-margin-bottom-0">We are here to help</p>
            <p class="f_contact s-margin-bottom-0">Contact us by Phone - We are not automated!!!</p>
            <p class="f_contact">1 -877-3-TUTORS</p>
            <form class="main_form" action="{{route('contactus_post')}}" method="post">
               {{csrf_field()}}
               <div class="row">
                  <div class="col-xs-6">
                     <div class="form-group f_contact_group">
                        <label>Full Name</label>
                        <input type="type" class="form-control f_control_contact" name="full_name" placeholder="(required)">
                     </div>
                  </div>
                  <div class="col-xs-6">
                     <div class="form-group f_contact_group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control f_control_contact" placeholder="(required)">
                     </div>
                  </div>
                  <div class="col-xs-6">
                     <div class="form-group f_contact_group">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control f_control_contact" placeholder="(required)">
                     </div>
                  </div>
                  <div class="col-xs-6">
                     <div class="form-group f_contact_group">
                        <label>Subject</label>
                        <input type="type" name="subject_description" class="form-control f_control_contact" placeholder="(required)">
                     </div>
                  </div>
                  <div class="col-xs-12">
                     <div class="form-group f_contact_group">
                        <label>Your Message</label>
                        <textarea class="form-control f_control_contact" rows="6" name="message_description"></textarea>
                     </div>
                  </div>
                  <div class="col-xs-12">
                     <div class="form-group f_contact_group">
                        <button type="submit" class="btn btn-default f_submit_contact">SUBMIT</button>
                     </div>
                  </div>
               </div>
            </form>
         </div>
     <div class="col-md-4">
            <h3 class="f_tutor">New to Tutor are us?</h3>
            <div class="menu">
               <header class="menu__header">
                  <h1 class="menu__header-title">Get to know us</h1>
               </header>
               <div class="menu__body">
                  <ul class="nav">
                     <li class="nav__item">
                        <a href="{{route('aboutus')}}" class="nav__item-link">
                           <span class="nav__item-text">About Us</span>
                        </a>
                     </li>
                     <li class="nav__item">
                        <a href="{{route('terms')}}" class="nav__item-link">
                           <span class="nav__item-text">Terms And Conditions</span>
                        </a>
                     </li>
                     <li class="nav__item">
                        <a href="{{route('privacy')}}" class="nav__item-link">
                        <span class="nav__item-text">Privacy Policy</span>
                        </a>   
                     </li>
                     <li class="nav__item">
                        <a href="{{route('referral')}}" class="nav__item-link">
                        <span class="nav__item-text">Referral</span>
                        </a>   
                     </li>
                     <li class="nav__item">
                        <a href="{{route('tutors_listing')}}" class="nav__item-link">
                           <span class="nav__item-text">Search For A Tutor</span>
                        </a>
                     </li>
                     <!-- <li class="nav__item">
                        <a href="#" class="nav__item-link">
                           <span class="nav__item-text">Search For A Student</span>
                        </a>
                     </li> -->
                     <li class="nav__item">
                        <a href="{{route('fulltime_tutor')}}" class="nav__item-link">
                           <span class="nav__item-text">Become A Tutor</span>
                        </a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

@endsection
