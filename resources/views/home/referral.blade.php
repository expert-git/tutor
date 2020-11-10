@extends('app')
@section('content')
<section class="signup_faq">
   <div class="container">
      <div class="row">
         <div class="col-md-3">
            <h3 class="f_tutor">FAQ</h3>
            <div class="menu">
               <header class="menu__header">
                  <h1 class="menu__header-title">Related Topics</h1>
               </header>
               <div class="menu__body">
                  <ul class="nav">
                     <li class="nav__item"  id="for_student">
                        <a href="#" class="nav__item-link">
                        <span class="nav__item-text active " >For Student</span>
                        </a>   
                     </li>
                     <li class="nav__item"  id="for_tutor">
                        <a href="#" class="nav__item-link">
                        <span class="nav__item-text " >For Tutor</span>
                        </a>   
                     </li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="col-md-9 student_faq">
            <h3 class="f_course f_student">For Student</h3>
            <div class="panel-group" id="accordion">
               <div class="panel panel-default f_mainfaq">
                  <div class="panel-heading s_border_header">
                     <h4 class="panel-title">
                        <a class="accordion-toggle f_faqcontent collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                        How do I search for tutors?
                        </a>
                     </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse">
                     <div class="panel-body f_body">
                        To search for tutors, select between your choice of  online tutoring and in class tutoring. Then select the course and location, and you will be matched with a  tutor that is a perfect fit.
                     </div>
                  </div>
               </div>
               <div class="panel panel-default f_mainfaq">
                  <div class="panel-heading s_border_header">
                     <h4 class="panel-title">
                        <a class="accordion-toggle f_faqcontent collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                        How do I sign up for tutoring?
                        </a>
                     </h4>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse">
                     <div class="panel-body f_body">
                        Click on Search tutors; we you find a tutor of your choice; the system will require you to sign up. After signing up, you are good to go.
                     </div>
                  </div>
               </div>
               <div class="panel panel-default f_mainfaq">
                  <div class="panel-heading s_border_header">
                     <h4 class="panel-title">
                        <a class="accordion-toggle f_faqcontent collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                        What happens after I sign up?
                        </a>
                     </h4>
                  </div>
                  <div id="collapseThree" class="panel-collapse collapse">
                     <div class="panel-body f_body">
                        You will receive an activation email to activate your account. Then you will be able to search from and pick a tutor of your choice.
                     </div>
                  </div>
               </div>
               <div class="panel panel-default f_mainfaq">
                  <div class="panel-heading s_border_header">
                     <h4 class="panel-title">
                        <a class="accordion-toggle f_faqcontent collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                        Must the student take the pre test?
                        </a>
                     </h4>
                  </div>
                  <div id="collapseFour" class="panel-collapse collapse">
                     <div class="panel-body f_body">
                        Pre test is not mandatory but it is recommended. The pre - test lets both the tutor and the parents/students know where to invest their time and how well to meet the needs of the student.
                     </div>
                  </div>
               </div>
               <div class="panel panel-default f_mainfaq">
                  <div class="panel-heading s_border_header">
                     <h4 class="panel-title">
                        <a class="accordion-toggle f_faqcontent collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                        How much does the pre test cost?
                        </a>
                     </h4>
                  </div>
                  <div id="collapseFive" class="panel-collapse collapse">
                     <div class="panel-body f_body">
                        The pre test cost $40 and includes grading and analyzing the test i order to be used by both the tutor and the student.
                     </div>
                  </div>
               </div>
               <div class="panel panel-default f_mainfaq">
                  <div class="panel-heading s_border_header">
                     <h4 class="panel-title">
                        <a class="accordion-toggle f_faqcontent collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
                        How much does the online class cost?
                        </a>
                     </h4>
                  </div>
                  <div id="collapseSix" class="panel-collapse collapse">
                     <div class="panel-body f_body">
                        There is no distinction between the price of the online session and the price of the  in-home session. 
                     </div>
                  </div>
               </div>
               <div class="panel panel-default f_mainfaq">
                  <div class="panel-heading s_border_header">
                     <h4 class="panel-title">
                        <a class="accordion-toggle f_faqcontent collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">
                        I want to hire a full time or a travel tutor- what do I do?
                        </a>
                     </h4>
                  </div>
                  <div id="collapseSeven" class="panel-collapse collapse">
                     <div class="panel-body f_body">
                        To hire a full time or travel tutor, you will need to contact us at travel@tutorsareus.org; or call us at 1-877-3-tutors
                     </div>
                  </div>
               </div>
               <div class="panel panel-default f_mainfaq">
                  <div class="panel-heading s_border_header">
                     <h4 class="panel-title">
                        <a class="accordion-toggle f_faqcontent collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEight">
                        Do you check the background check of tutors?
                        </a>
                     </h4>
                  </div>
                  <div id="collapseEight" class="panel-collapse collapse">
                     <div class="panel-body f_body">
                        All tutors get a background check. To get a copy of the result of a tutor’s background check, you will need to pay a one time non refundable fee of $20. The document will be sent to you by email, fax or regular mail.
                     </div>
                  </div>
               </div>
               <div class="panel panel-default f_mainfaq">
                  <div class="panel-heading s_border_header">
                     <h4 class="panel-title">
                        <a class="accordion-toggle f_faqcontent collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseNine">
                        How can I get a copy of tutor’s background check?
                        </a>
                     </h4>
                  </div>
                  <div id="collapseNine" class="panel-collapse collapse">
                     <div class="panel-body f_body">
                        You may submit a request to get the background check for your selected tutor. This is optional but you are encouraged to.
                     </div>
                  </div>
               </div>
               <div class="panel panel-default f_mainfaq">
                  <div class="panel-heading s_border_header">
                     <h4 class="panel-title">
                        <a class="accordion-toggle f_faqcontent collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTen">
                        How does the client referral program work?
                        </a>
                     </h4>
                  </div>
                  <div id="collapseTen" class="panel-collapse collapse">
                     <div class="panel-body f_body">
                        The client receives a $10 for every friend that they refer and signs up for tutoring.  The friend also get $10 off of their fifth session or the diagnostic test. 
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-9 tutor_faq">
            <h3 class="f_course f_student">For Tutor</h3>
            <div class="panel-group" id="accordion">
               <div class="panel panel-default f_mainfaq">
                  <div class="panel-heading s_border_header">
                     <h4 class="panel-title">
                        <a class="accordion-toggle f_faqcontent collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseeleven">
                        How do I search for tutors?
                        </a>
                     </h4>
                  </div>
                  <div id="collapseeleven" class="panel-collapse collapse">
                     <div class="panel-body f_body">
                        You can sign up  to be a tutor by  clicking on Apply now and signing up as a tutor
                     </div>
                  </div>
               </div>
               <div class="panel panel-default f_mainfaq">
                  <div class="panel-heading s_border_header">
                     <h4 class="panel-title">
                        <a class="accordion-toggle f_faqcontent collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwelve">
                        What happens after I sign up?
                        </a>
                     </h4>
                  </div>
                  <div id="collapseTwelve" class="panel-collapse collapse">
                     <div class="panel-body f_body">
                        You will receive an activation email to activate your account. Then you will be able to search from and pick a tutor of your choice.
                     </div>
                  </div>
               </div>
               <div class="panel panel-default f_mainfaq">
                  <div class="panel-heading s_border_header">
                     <h4 class="panel-title">
                        <a class="accordion-toggle f_faqcontent collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThirteen">
                        What  are the terms of service?
                        </a>
                     </h4>
                  </div>
                  <div id="collapseThirteen" class="panel-collapse collapse">
                     <div class="panel-body f_body">
                        http://tutorsareus.org/home/terms-and-conditions
                     </div>
                  </div>
               </div>
               <div class="panel panel-default f_mainfaq">
                  <div class="panel-heading s_border_header">
                     <h4 class="panel-title">
                        <a class="accordion-toggle f_faqcontent collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFourteen">
                        Do I pay for background check?
                        </a>
                     </h4>
                  </div>
                  <div id="collapseFourteen" class="panel-collapse collapse">
                     <div class="panel-body f_body">
                        You pay for your background check. The background check is $20 and paid for by the tutor. Clients sometimes pay for copies of background check. You will receive $10 for every copy of background checks that clients print up till $30
                     </div>
                  </div>
               </div>
               <div class="panel panel-default f_mainfaq">
                  <div class="panel-heading s_border_header">
                     <h4 class="panel-title">
                        <a class="accordion-toggle f_faqcontent collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFifteen">
                        How do I get the background money  back?
                        </a>
                     </h4>
                  </div>
                  <div id="collapseFifteen" class="panel-collapse collapse">
                     <div class="panel-body f_body">
                        You will be notified when a client request for a copy of your background check which does not include your contact details. You will receive your money immediately.
                     </div>
                  </div>
               </div>
               <div class="panel panel-default f_mainfaq">
                  <div class="panel-heading s_border_header">
                     <h4 class="panel-title">
                        <a class="accordion-toggle f_faqcontent collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSixteen">
                        Do you report taxes?
                        </a>
                     </h4>
                  </div>
                  <div id="collapseSixteen" class="panel-collapse collapse">
                     <div class="panel-body f_body">
                        Tutors are independent contractors and are not provided with W2. Form 1099 will be provided to tutors at the end of the year.
                     </div>
                  </div>
               </div>
               <div class="panel panel-default f_mainfaq">
                  <div class="panel-heading s_border_header">
                     <h4 class="panel-title">
                        <a class="accordion-toggle f_faqcontent collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSeventeen">
                        Can I refer a tutor?
                        </a>
                     </h4>
                  </div>
                  <div id="collapseSeventeen" class="panel-collapse collapse">
                     <div class="panel-body f_body">
                        You will receive $15 if you refer a tutor. Your $15 is due to you when the tutor completes their 5th session. The new tutor also receives $15 
                     </div>
                  </div>
               </div>
               <div class="panel panel-default f_mainfaq">
                  <div class="panel-heading s_border_header">
                     <h4 class="panel-title">
                        <a class="accordion-toggle f_faqcontent collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEighteen">
                        Can I refer a student?
                        </a>
                     </h4>
                  </div>
                  <div id="collapseEighteen" class="panel-collapse collapse">
                     <div class="panel-body f_body">
                        When a tutor refer a student, they receive 100% of their fee  less $5 service fee  if the student is tutored by the referring tutors. If the student does not get tutored by  the same tutor, they will receive a $10 referral bonus at the end of the first session.
                        <br>
                        Tutorsareus fee structure
                        <br>
                        Tutorsareus takes a percentage from every session listed. Below is Tutorsareus commission 
                        <br>
                        <!-- <p class="f_hour"> Hours Worked</p>                <p class="f_hour">Tutorsareus %</p>
                           0 – 20                                      35
                                                             
                           21 – 50                                     30
                           
                           51 – 200                                    25
                           
                           201 – 400                                   20
                           
                           401+                                        15
                           -->
                        <table class="f_table">
                           <tr>
                              <th class="f_hour">Hours Worked</th>
                              <th class="f_hour">Tutorsareus</th>
                           </tr>
                           <tr>
                              <td class="f_td">0 – 20 </td>
                              <td class="f_td">35</td>
                           </tr>
                           <tr>
                              <td class="f_td">21-50</td>
                              <td class="f_td">30</td>
                           </tr>
                           <tr>
                              <td class="f_td">51-200</td>
                              <td class="f_td">25</td>
                           </tr>
                           <tr>
                              <td class="f_td">201-400</td>
                              <td class="f_td">20</td>
                           </tr>
                           <tr>
                              <td class="f_td">401+</td>
                              <td class="f_td">15</td>
                           </tr>
                        </table>
                        <br>
                        Referral Program
                        <br>
                        Clients making extra money
                        <br>
                        <br>
                        Thank you for using our service. Hope we are serving you the best you 
                        can. You can make money while using our services. You may refer your 
                        friend and get paid. We will pay you $10 for every friend you refer. Not only that, your friend receives $10 off their fifth lesson or diagnostic test.
                        <br>
                        <br>
                        Tutor Referral Program
                        Refer a tutor and get paid. When a tutor refers a tutor, you will receive a $10, referral bonus after the fifth session of the referred tutor. The referred tutor also receives $5. All you need to do is email the name of the tutor to tutors@tutorsareus.org before the referred tutor signs up.
                        <br>
                        If you refer a student and you are the tutor, you will receive 100% of your fee, less $5 service fee per session. If the student does not get tutored by the referring tutor, the referring tutor will receive a $10 referral bonus.
                     </div>
                  </div>
               </div>
               <!--<div class="panel panel-default f_mainfaq">
                  <div class="panel-heading s_border_header">
                     <h4 class="panel-title">
                        <a class="accordion-toggle f_faqcontent collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseNine">
                        How can I get a copy of tutor’s background check?
                        </a>
                     </h4>
                  </div>
                  <div id="collapseNine" class="panel-collapse collapse">
                     <div class="panel-body f_body">
                        Click on Search tutors; we you find a tutor of your choice; the system will require you to sign up. After signing up, you are good to go.
                     </div>
                  </div>
                  </div>
                  <div class="panel panel-default f_mainfaq">
                  <div class="panel-heading s_border_header">
                     <h4 class="panel-title">
                        <a class="accordion-toggle f_faqcontent collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTen">
                        How does the client referral program work?
                        </a>
                     </h4>
                  </div>
                  <div id="collapseTen" class="panel-collapse collapse">
                     <div class="panel-body f_body">
                        Click on Search tutors; we you find a tutor of your choice; the system will require you to sign up. After signing up, you are good to go.
                     </div>
                  </div>
                  </div>-->
            </div>
         </div>
      </div>
   </div>
</section>
@endsection