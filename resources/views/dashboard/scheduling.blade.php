@extends('dashboard.dashboard-app')
@section('content')
<div class="container-fluid remove_padding bg_color_gray">
   @include('dashboard.partials.dashboard-sidebar')
   <div class="col-md-9">
      <div class="edit_profile padding_down_s">
         <h3 class="f_profile_content text-center">Scheduling</h3>
      </div>
      @include('partials.error_section')
      <div class="row">
         <div class="col-md-12">
            <div class="table-responsive table-bordered">
               <table class="table s_table">
                  <thead>
                     <tr>
                        <th></th>
                        <th>2018-06-25</th>
                        <th>2018-06-26</th>
                        <th>2018-06-27</th>
                        <th>2018-06-28</th>
                        <th>2018-06-29</th>
                        <th>2018-06-30</th>
                        <th>2018-07-01</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>
                           12:00 am
                        </td>
                        <td class="available">
                           <div class="custom-tooltip" data-id="1" data-toggle="tooltip" title="Available: 2018-06-25, 00:00:00"></div>
                        </td>
                        <td class="available">
                           <div class="custom-tooltip" data-id="2" data-toggle="tooltip" title="Available: 2018-06-26, 00:00:00"></div>
                        </td>
                        <td>
                           <div class="custom-tooltip" data-id="3" data-toggle="tooltip" title="Not Available: 2018-06-27, 00:00:00"></div>
                        </td>
                        <td>
                           <div class="custom-tooltip" data-id="4" data-toggle="tooltip" title="Not Available: 2018-06-28, 00:00:00"></div>
                        </td>
                        <td>
                           <div class="custom-tooltip" data-id="5" data-toggle="tooltip" title="Not Available: 2018-06-29, 00:00:00"></div>
                        </td>
                        <td>
                           <div class="custom-tooltip" data-id="6" data-toggle="tooltip" title="Not Available: 2018-06-30, 00:00:00"></div>
                        </td>
                        <td>
                           <div class="custom-tooltip" data-id="7" data-toggle="tooltip" title="Not Available: 2018-07-01, 00:00:00"></div>
                        </td>
                     </tr>
                     <tr>
                        <td>
                           12:30 am
                        </td>
                        <td>
                           <div class="custom-tooltip" data-id="8" data-toggle="tooltip" title="Not Available: 2018-06-25, 00:30:00"></div>
                        </td>
                        <td>
                           <div class="custom-tooltip" data-id="9" data-toggle="tooltip" title="Not Available: 2018-06-26, 00:30:00"></div>
                        </td>
                        <td>
                           <div class="custom-tooltip" data-id="10" data-toggle="tooltip" title="Not Available: 2018-06-27, 00:30:00"></div>
                        </td>
                        <td class="available">
                           <div class="custom-tooltip" data-id="11" data-toggle="tooltip" title="Available: 2018-06-28, 00:30:00"></div>
                        </td>
                        <td>
                           <div class="custom-tooltip" data-id="12" data-toggle="tooltip" title="Not Available: 2018-06-29, 00:30:00"></div>
                        </td>
                        <td>
                           <div class="custom-tooltip" data-id="13" data-toggle="tooltip" title="Not Available: 2018-06-30, 00:30:00"></div>
                        </td>
                        <td>
                           <div class="custom-tooltip" data-id="14" data-toggle="tooltip" title="Not Available: 2018-07-01, 00:30:00"></div>
                        </td>
                     </tr>
                     <tr>
                        <td>
                           1:00 am
                        </td>
                        <td>
                           <div class="custom-tooltip" data-id="15" data-toggle="tooltip" title="Not Available: 2018-06-25, 01:00:00"></div>
                        </td>
                        <td>
                           <div class="custom-tooltip" data-id="16" data-toggle="tooltip" title="Not Available: 2018-06-26, 01:00:00"></div>
                        </td>
                        <td>
                           <div class="custom-tooltip" data-id="17" data-toggle="tooltip" title="Not Available: 2018-06-27, 01:00:00"></div>
                        </td>
                        <td>
                           <div class="custom-tooltip" data-id="18" data-toggle="tooltip" title="Not Available: 2018-06-28, 01:00:00"></div>
                        </td>
                        <td>
                           <div class="custom-tooltip" data-id="19" data-toggle="tooltip" title="Not Available: 2018-06-29, 01:00:00"></div>
                        </td>
                        <td class="available">
                           <div class="custom-tooltip" data-id="20" data-toggle="tooltip" title="Available: 2018-06-30, 01:00:00"></div>
                        </td>
                        <td>
                           <div class="custom-tooltip" data-id="21" data-toggle="tooltip" title="Not Available: 2018-07-01, 01:00:00"></div>
                        </td>
                     </tr>
                     <tr>
                        <td>
                           1:30 am
                        </td>
                        <td>
                           <div class="custom-tooltip" data-id="22" data-toggle="tooltip" title="Not Available: 2018-06-25, 01:30:00"></div>
                        </td>
                        <td>
                           <div class="custom-tooltip" data-id="23" data-toggle="tooltip" title="Not Available: 2018-06-26, 01:30:00"></div>
                        </td>
                        <td class="available">
                           <div class="custom-tooltip" data-id="24" data-toggle="tooltip" title="Available: 2018-06-27, 01:30:00"></div>
                        </td>
                        <td>
                           <div class="custom-tooltip" data-id="25" data-toggle="tooltip" title="Not Available: 2018-06-28, 01:30:00"></div>
                        </td>
                        <td>
                           <div class="custom-tooltip" data-id="26" data-toggle="tooltip" title="Not Available: 2018-06-29, 01:30:00"></div>
                        </td>
                        <td>
                           <div class="custom-tooltip" data-id="27" data-toggle="tooltip" title="Not Available: 2018-06-30, 01:30:00"></div>
                        </td>
                        <td>
                           <div class="custom-tooltip" data-id="28" data-toggle="tooltip" title="Not Available: 2018-07-01, 01:30:00"></div>
                        </td>
                     </tr>
                     <tr>
                        <td>
                           2:00 am
                        </td>
                        <td>
                           <div class="custom-tooltip" data-id="29" data-toggle="tooltip" title="Not Available: 2018-06-25, 02:00:00"></div>
                        </td>
                        <td>
                           <div class="custom-tooltip" data-id="30" data-toggle="tooltip" title="Not Available: 2018-06-26, 02:00:00"></div>
                        </td>
                        <td class="available">
                           <div class="custom-tooltip" data-id="31" data-toggle="tooltip" title="Available: 2018-06-27, 02:00:00"></div>
                        </td>
                        <td>
                           <div class="custom-tooltip" data-id="32" data-toggle="tooltip" title="Not Available: 2018-06-28, 02:00:00"></div>
                        </td>
                        <td>
                           <div class="custom-tooltip" data-id="33" data-toggle="tooltip" title="Not Available: 2018-06-29, 02:00:00"></div>
                        </td>
                        <td>
                           <div class="custom-tooltip" data-id="34" data-toggle="tooltip" title="Not Available: 2018-06-30, 02:00:00"></div>
                        </td>
                        <td class="available">
                           <div class="custom-tooltip" data-id="35" data-toggle="tooltip" title="Available: 2018-07-01, 02:00:00"></div>
                        </td>
                     </tr>
                     <tr>
                        <td>
                           2:30 am
                        </td>
                        <td>
                           <div class="custom-tooltip" data-id="36" data-toggle="tooltip" title="Not Available: 2018-06-25, 02:30:00"></div>
                        </td>
                        <td class="available">
                           <div class="custom-tooltip" data-id="37" data-toggle="tooltip" title="Available: 2018-06-26, 02:30:00"></div>
                        </td>
                        <td>
                           <div class="custom-tooltip" data-id="38" data-toggle="tooltip" title="Not Available: 2018-06-27, 02:30:00"></div>
                        </td>
                        <td>
                           <div class="custom-tooltip" data-id="39" data-toggle="tooltip" title="Not Available: 2018-06-28, 02:30:00"></div>
                        </td>
                        <td>
                           <div class="custom-tooltip" data-id="40" data-toggle="tooltip" title="Not Available: 2018-06-29, 02:30:00"></div>
                        </td>
                        <td class="available">
                           <div class="custom-tooltip" data-id="41" data-toggle="tooltip" title="Available: 2018-06-30, 02:30:00"></div>
                        </td>
                        <td>
                           <div class="custom-tooltip" data-id="42" data-toggle="tooltip" title="Not Available: 2018-07-01, 02:30:00"></div>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
@endsection