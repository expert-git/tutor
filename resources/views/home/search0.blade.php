@extends('app')
@section('content')

<section class="search">
   <div class="container">
      <div class="row">
         <div class="col-md-12">

           <form action="#" method="get" class="form-horizontal">
             <input type="hidden" name="limit" value="10">
             <div class="form-group">
               <div class="col-md-9">
                 <div class="icon-addon addon-lg">
                   <input type="text" placeholder="Search Job ......" class="form-control select_f f_paddingright" id="Name" name="name">
                   <label class="glyphicon glyphicon-search" rel="tooltip" title="email"></label>
                 </div>
               </div>
               <div class="col-md-3">
                 <button type="submit" class="btn btn_search" data-toggle="#jobInfo" name="q" value="search">SEARCH</button>
               </div>
             </div>
           </form>

           <section class="job-listing">
              <div class="container">
                 <div class="row">
                    <div class="col-md-9">
                       <h2>Medical Representative</h2>
                       <location>karachi</location>
                       <div id="applyForm_container" class="careers-form">
                          <form name="applyForm" id="applyForm" method="post" action="" enctype="multipart/form-data">
                             <fieldset>
                               <div class="row">
                                 <div class="col-md-12">
                                   <div class="attach-box">
                                      <input type="file" name="upload" id="upload" class="inputfile inputfile-6" required="">
                                      <label for="upload">
                                         <strong>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                                               <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path>
                                            </svg>
                                            Attach Resume
                                         </strong>
                                         <span id="selected_file"></span>
                                      </label>
                                      <p>Maximum upload size 3mb<span id="upload_msg" class="status-msg"></span></p>
                                   </div>
                                </div>
                               </div>
                               <div class="row">
                                 <div class="col-md-6">
                                   <div class="input-group">
                                     <label for="">Full Name</label>
                                     <input type="text" name="caller_name" id="caller_name" value="" required="">
                                     <div id="caller_name_msg" class="status-msg"></div>
                                   </div>
                                 </div>
                                 <div class="col-md-6">
                                   <div class="input-group">
                                     <label for="">Age</label>
                                     <input type="number" name="age" id="age" value="">
                                   </div>
                                 </div>
                                 <div class="col-md-6">
                                   <div class="input-group select">
                                     <label for="">Select Gender</label>
                                     <select name="gender" id="gender" required="">
                                       <option value="Gender">Select Gender</option>
                                       <option value="Male">Male</option>
                                       <option value="Female">Female</option>
                                     </select>
                                     <div id="gender_msg" class="status-msg"></div>
                                   </div>
                                 </div>
                                 <div class="col-md-6">
                                   <div class="input-group">
                                     <label for="">Education</label>
                                     <input type="text" name="education" id="education" value="">
                                   </div>
                                 </div>
                                 <div class="col-md-6">
                                   <div class="input-group">
                                     <label for="">CNIC Number</label>
                                     <input type="text" name="cnic" id="cnic" value="" required="" maxlength="15">
                                     <div id="cnic_msg" class="status-msg"></div>
                                   </div>
                                 </div>
                                 <div class="col-md-6">
                                   <div class="input-group">
                                     <label for="">Language</label>
                                     <input type="text" name="language" id="language" value="">
                                   </div>
                                 </div>
                                 <div class="col-md-6">
                                   <div class="input-group">
                                     <label for="">Contact Number</label>
                                     <input type="tel" name="contact_number" id="contact_number" maxlength="12" value="" required="">
                                     <div id="contact_number_msg" class="status-msg"></div>
                                   </div>
                                 </div>
                                 <div class="col-md-6">
                                   <div class="input-group">
                                     <label for="">Email Address</label>
                                     <input type="email" name="caller_email" id="caller_email" value="" required="">
                                     <div id="caller_email_msg" class="status-msg"></div>
                                   </div>
                                 </div>
                                 <div class="col-md-6">
                                   <div class="input-group select">
                                     <label for="">select preferred Shift</label>
                                     <select name="shift_availability" id="shift_availability" required="">
                                       <option value="" selected="">Select Preferred Shift</option>
                                       <option value="all-shifts">All Shifts</option>
                                       <option value="evening">Evening Only</option>
                                       <option value="evening-night">Evening/Night</option>
                                       <option value="morning-only">Morning Only</option>
                                       <option value="morning-evening">Morning/Evening</option>
                                       <option value="night">Nights Only</option>
                                     </select>
                                     <div id="shift_availability_msg" class="status-msg"></div>
                                   </div>
                                 </div>
                                 <div class="col-md-6">
                                   <div class="input-group select">
                                     <label for="">Select Location</label>
                                     <select name="field4" id="field4" required="">
                                       <option value="" selected="">Select Location</option>
                                       <option value="islamabad">Islamabad</option>
                                       <option value="karachi">Karachi</option>
                                       <option value="lahore">Lahore</option>
                                     </select>
                                     <div id="field4_msg" class="status-msg"></div>
                                   </div>
                                 </div>
                                 <div class="col-md-6">
                                   <div class="input-group select">
                                     <label for="">Select Source</label>
                                     <select id="source" name="source" required="">
                                       <option value="" selected="">Select Source</option>
                                       <option value="Advertisements">Advertisements</option>
                                       <option value="BPO Suite">BPO Suite</option>
                                       <option value="Called In">Called In</option>
                                       <option value="Email">Email</option>
                                       <option value="Institutes">Institutes</option>
                                       <option value="Internal Referral">Internal Referral</option>
                                       <option value="Job Portal">Job Portal</option>
                                       <option value="Others">Others</option>
                                       <option value="Referral Box">Referral Box</option>
                                       <option value="Social Media">Social Media</option>
                                       <option value="University">University</option>
                                       <option value="Walk In">Walk In</option>
                                     </select>
                                     <div id="source_msg" class="status-msg"></div>
                                   </div>
                                 </div>
                                 <div class="col-md-6 source_details" style="display: none;">
                                   <div class="input-group select">
                                      <label for="source_details">Select Source Detail</label>
                                      <select id="source_details" name="source_details"></select>
                                   </div>
                                </div>
                               </div>
                             </fieldset>
                          </form>
                       </div>
                       <div class="job-details">
                          <h3>Job Description</h3>
                          <ul class="job-list">
                             <li>Inbound calls of the Patients/their relative and Health Care Providers along with dialing the provided leads for follow up on regular basis. </li>
                             <li>To make adherence calls to patients according to approved scripts provided.</li>
                             <li>Providing Virtual Medical Education to patient and Caregivers based on guidelines</li>
                             <li>Provide Medical or Treatment Information to patients and other customers in a way that avoids giving treatment, medical or personal advice.</li>
                             <li>Coordinate with different branches of distributors all the Pakistan (e-mail/telephonically) to fulfill request of patients</li>
                          </ul>
                          <h3>Job Specification</h3>
                          <ul class="job-list">
                             <li>Proficient with MS Office particularly MS Excel (Spreadsheet)</li>
                             <li>Possess Knowledge of Call Centre Operations</li>
                             <li>Must be flexible to work in shifts</li>
                             <li>Excellent communication skills</li>
                             <li>Product knowledge and FAQs.</li>
                          </ul>
                          <h3>Qualification</h3>
                          <ul class="job-list">
                             <li>Pharm D</li>
                          </ul>
                          <!-- <h3>Additional Information</h3>
                          <ul class="info-list">
                             <li>
                                <i class="icon-Numbers-of-Vacancies fa fa-users"></i>
                                <h4>01</h4>
                                <span>Number of Vacancies</span>
                             </li>
                             <li>
                                <i class="fa fa-clock-o"></i>
                                <h4>09</h4>
                                <span>Working Hours</span>
                             </li>
                             <li>
                                <i class="fa fa-hourglass-half"></i>
                                <h4>30</h4>
                                <span>Required Maximum Age</span>
                             </li>
                             <li>
                                <i class="fa fa-map-marker"></i>
                                <h4>Karachi</h4>
                                <span>Location</span>
                             </li>
                             <li>
                                <i class="fa fa-history"></i>
                                <h4>On Rotation</h4>
                                <span>Job Shift</span>
                             </li>
                          </ul> -->
                       </div>
                    </div>
                    <div class="col-md-3">
                       <div class="job-sidebar" style="width: 100%; position: relative; top: auto;">
                          <div class="job-header">
                             <button id="btn_apply_now">
                               <span>Apply Now</span>
                               <i class="fa fa-arrow-right"></i>
                             </button>
                             <button id="btn_submit_now">
                               <span>Submit Now</span>
                               <i class="fa fa-arrow-right"></i>
                             </button>
                             <p>Please contact us if you need any information or assistance regarding the recruitment process.</p>
                          </div>
                          <div class="job-content">
                             <h5>Perks</h5>
                             <ul class="job-list">
                                <li>Medical Insurance</li>
                                <li>Permanent Employment Status</li>
                                <li>PF &amp; Overtime provided</li>
                                <li>Internal Job Posting</li>
                                <li>Annual Leaves</li>
                                <li>Leaves Encashment</li>
                                <li>Referral Bonus</li>
                             </ul>
                          </div>
                       </div>
                    </div>
                 </div>
                 <article class="row">
                    <div class="col-sm-12">
                       <hr class="job-hr">
                       <h2>Other Jobs at Tutors Are Us</h2>
                       <ul class="other-jobs-list">
                          <li>
                             <div class="job">
                                <a href="#">
                                   <location>karachi</location>
                                   <h3>PASHTO SPEAKER</h3>
                                   <p>Job Description
                                      Answer calls professionally to provide information about products and...
                                   </p>
                                   Apply Now <i class="fa fa-arrow-right"></i>
                                </a>
                             </div>
                          </li>
                          <li>
                             <div class="job">
                                <a href="#">
                                   <location>Newyork</location>
                                   <h3>Training and Development Executive</h3>
                                   <p>Job Description:
                                      Responsible for delivery of relevant information and training the...
                                   </p>
                                   Apply Now <i class="fa fa-arrow-right"></i>
                                </a>
                             </div>
                          </li>
                          <li>
                             <div class="job">
                                <a href="#">
                                   <location>karachi</location>
                                   <h3>International Sales Executive</h3>
                                   <p>Job Description
                                      Inbound/outbound calls to promote and sell the product/service.
                                      Consolidate existing...
                                   </p>
                                   Apply Now <i class="fa fa-arrow-right"></i>
                                </a>
                             </div>
                          </li>
                       </ul>
                    </div>
                 </article>
              </div>
           </section>

        </div>
      </div>
   </div>
</section>

@endsection
