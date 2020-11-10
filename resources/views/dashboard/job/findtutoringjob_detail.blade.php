@extends('dashboard.dashboard-app')
@section('content')
<div class="container-fluid remove_padding bg_color_gray">
   @include('dashboard.partials.dashboard-sidebar')

	 <div class="col-md-9">
     <div class="edit_profile padding_down_s">
       <h3 class="job_detail_heading">View Job Detail</h3>
     </div>
     <div class="row">
       <div class=" col-md-8" style="padding:  0  0 0 25px;">
         <h3 class="f_course">Accusamus et iusto odio dignissimos ducimus qui blanditiis</h3>
         <p class="f_findcontent">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga</p>
         <h3 class="f_course">Subject : English</h3>
         <p class="f_posted s_posted"><b>- Posted by Tony</b>, 10 hours ago</p>
       </div>
     </div>

     <div class="tutor_heading">
       <h3 class="about_us">Request</h3>
     </div>
     <div class="row">
       <div class="col-md-10">
         <form action="" method="post">
           {{csrf_field()}}
           <div class="form-group profile_form s_profile_form">
             <label>Message <span>*</span></label>
             <br>
             <textarea name="description" rows="8" cols="80" class="form-control span3" required></textarea>
           </div>
           <div class="form-group col-md-offset-9 col-md-3">
             <input type="submit" value="Send Message" class="btn s_send_message">
           </div>
         </form>
       </div>
     </div>
	 </div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title s-modal-header">Welcome to Message</h4>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          {{csrf_field()}}
          <div class="form-group profile_form s_profile_form">
            <label>Message <span>*</span></label>
            <br>
            <textarea name="description" rows="8" cols="80" class="form-control span3" required></textarea>
          </div>
          <div class="form-group">
           <input type="submit" value="Send Message" class="btn s_save">
          </div>
        </form>
      </div>
    </div>

  </div>
</div>
@endsection
