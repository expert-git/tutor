@extends('dashboard.dashboard-app')
@section('content')





<section class="profile">
	<div class="container-fluid remove_padding bg_color_gray">
	@include('dashboard.partials.dashboard-sidebar')
	<div class="col-md-9 bg_color">
		<!--<form action="{{ route('invite_request') }}" method="post" class="form-groups">
			{{ csrf_field() }}
			
			<label>Email</label>
			
			<input type="email" class="form-control" name="email" placeholder="Enter Email Address">
			
			<input type="submit" name="submit">
			
			</form>-->
			<div class="row">
				<div class="col-md-12">
					<h2 class="f_up">Invite Your Friend</h2>
					<p class="f_content">

               <div class="panel panel-default f_mainfaq">
                  <div class="panel-heading s_border_header">
                     <h4 class="panel-title">
                        <a class="accordion-toggle f_faqcontent collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSeventeen" aria-expanded="false">
                      Can I refer a tutor?

                        </a>
                     </h4>
                  </div>
                  <div id="collapseSeventeen" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                     <div class="panel-body f_body">
                       You will receive $10 if you refer a tutor. Your $10 is due to you when the tutor completes their 5th session. The new tutor also receives $5 
 
                     </div>
                  </div>
               </div>

					
               <div class="panel panel-default f_mainfaq">
                  <div class="panel-heading s_border_header">
                     <h4 class="panel-title">
                        <a class="accordion-toggle f_faqcontent collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseNine" aria-expanded="false">
                        Can I refer a student?
                        </a>
                     </h4>
                  </div>
                  <div id="collapseNine" class="panel-collapse collapse" aria-expanded="false">
                     <div class="panel-body f_body">
                      When a tutor refer a student, they receive 10% of their fee  less 7% service fee  if the student is tutored by the referring tutors. If the student does not get tutored by  the same the tutor, they will receive a $10 referral bonus at the end of the first session.
                       
                     </div>
                  </div>
               </div>
               <div class="panel panel-default f_mainfaq">
                  <div class="panel-heading s_border_header">
                     <h4 class="panel-title">
                        <a class="accordion-toggle f_faqcontent collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapsetwolow" aria-expanded="false">
                      What is the fee structure?

                        </a>
                     </h4>
                  </div>
                  <div id="collapsetwolow" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                     <div class="panel-body f_body">
                       <br>
                       Tutorsareus fee structure
                        <br>
                        TutorsAreUS takes a commission of 25% from every lesson listed. 
                        <br>
                       
                        <!--<table class="f_table">
                           <tbody><tr>
                              <th class="f_hour">Hours Worked</th>
                              <th class="f_hour">Tutorsareus %</th>
                           </tr>
                           <tr>
                              <td class="f_td">0 – 20 </td>
                              <td class="f_td">25</td>
                           </tr>
                           <tr>
                              <td class="f_td">21-50</td>
                              <td class="f_td">25</td>
                           </tr>
                           <tr>
                              <td class="f_td">51-200</td>
                              <td class="f_td">25</td>
                           </tr>
                           <tr>
                              <td class="f_td">201-400</td>
                              <td class="f_td">25</td>
                           </tr>
                           <tr>
                              <td class="f_td">401+</td>
                              <td class="f_td">25</td>
                           </tr>
                        </tbody></table> -->
                        <br>
                        Referral Program
                        <br>
                       Clients making extra money
                        <br>
                        <br>
                        Thank you for using our service. Hope we are serving you the best you can. You can make money while using our services. You may refer your friend and get paid. We will pay you $10 for every friend you refer. Not only that, your friend receives $10 off their fifth lesson or diagnostic test.

                        <br>
                        <br>
                       Tutor Referral Program
                       <br>

                       Refer a tutor and get paid. When a tutor refers a tutor, you will receive a $10, referral bonus after the fifth session of the referred tutor. The referred tutor also receives $5. All you need to do is email the name of the tutor to referral@tutorsareus.org.
                        <br>
                        If you refer a student and you are the tutor, you will receive 100% of your fee, less 7% service fee per session. If the student does not get tutored by the referring tutor, the referring tutor will receive a $10 referral bonus.

 
                     </div>
                  </div>
               </div>
               <div class="panel panel-default f_mainfaq">
                  <div class="panel-heading s_border_header">
                     <h4 class="panel-title">
                        <a class="accordion-toggle f_faqcontent collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTen" aria-expanded="false">
                        How does the client referral program work?
                        </a>
                     </h4>
                  </div>
                  <div id="collapseTen" class="panel-collapse collapse" aria-expanded="false">
                     <div class="panel-body f_body">
                        The client receives a $10 for every friend that they refer and signs up for tutoring.  The friend also get $10 off of their fifth session or the diagnostic test. 
                     </div>
                  </div>
               </div>
            </div>
					 </p>
					<img src="{{ asset('public/dashboard/assets/images/invite_friends.jpg') }}" class="img-responsive">
				</div>
				<div class="col-md-12">
					<form class="invite-form" action="{{route('invite_request')}}" method="POST">
						{{csrf_field()}}
						<div class="form-group f_group">
							<input type="email" name="email"  class="form-control my-input" id="email" placeholder="Email">
						</div>
						<div class="text-center f_center">
							<button type="submit" class=" btn btn-block send-button tx-tfm btn_send"><i class="fa fa-envelope env_icon"></i>Send</button>
						</div>
					</form>
				</div>
			</div>
		<hr>
		</div>
	</div>
</section>
@endsection()