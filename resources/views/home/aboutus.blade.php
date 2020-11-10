@extends('app')
@section('content')

<section class="aboutus">
   <div class="container">
      <div class="row">
         <div class="col-md-8">
            <h3 class="about_us">About Us</h3>
            <p class="about_content" >
              TutorsAreUs is a subsidiary of Available Group LLC which started as Available Tutors in August 2007 in the Washington DC metropolitan area.The company is based on the efficacy of one on one learning, versus learning in groups. We started as an in home tutoring company that matched students with tutors. We wanted families to be able to spend more time together and not have to stress about homework, projects, school work and so on. Our goal is for students to have straight “ As” and we have achieved this by working with students and families to let this happen. We believe that every child can learn and our teaching philosophy is teaching with fun. We have a standard that tutors follow and we do background checks for all Tutors. 
            </p>
            <p class="about_content">
              We decided to go online some of our students move out of DC metro and we could not meet their needs. We are ready to provide our excellent service, with the same vigour all over the world. We want to make our students successful and take away worry from our students. their parents and family. We can do this together, so RELAX. This company is not money driven but success driven.

            </p>
            <p class="about_content">
              Convenience - Parents, you don’t need to worry at all. All you need to do is relax and spend time with your family. We will help with all homework and project.

            </p>
            <p class="about_content">
              We don’t leave you hanging. We have team leaders that tutors report to who would help make sure that the student grades are improving.

            </p>
            <p class="about_content">
              We celebrate your success. We motivate our students. Improve your grades for 3 quarters and 3 grade periods and we give you a price.

            </p>
            <p class="about_content">
              Background checks - Our tutors are background checked. You may request a copy of the background check for a small fee. <a href="http://tutorsareus.org/contactus">Request a copy now.</a>
            </p>
            <p class="about_content">
              We are clients’ success Driven not money driven. Straight “As” goal
            </p>

            <div class="f_aboutbtn">
              <a class="btn btn-theme btn-sm btn-min-block f_about f_bycourse f_ipad" href="{{route('tutors_listing')}}">TUTORS BY SUBJECTS</a>
              <a class="btn btn-theme btn-sm btn-min-block f_about f_bylocation" href="{{route('tutors_listing')}}">TUTORS BY LOCATION</a>
            </div>
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
