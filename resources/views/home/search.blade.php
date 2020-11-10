@extends('app')
@section('content')

<section class="search">
   <div class="container">
      <div class="row">
         <div class="col-md-3">
            <h3 class="f_tutor">Filters</h3>
            <form action="{{route('tutors_listing')}}" method="get">
               <h3 class="f_class">Hourly rate: $10 -$200+</h3>
               <input id="ex2" type="text" class="span2" name="tution_per_hour" data-slider-min="10" data-slider-max="1000" data-slider-step="5" data-slider-value="[10,450]"/>
               <input type="hidden" name="limit" value="10">
               <!--<div id="slider"></div>-->
               <h3 class="f_class">Availability</h3>
               @foreach($days as $key => $day)
               <input type="checkbox" name="available_day" value="{{$key+1}}" class="checkbox_search"><span class="days">{{$day->days}}</span><br>
               @endforeach

               <div class="form-group">
                  <label for="exampleInputcourse" class="f_label f_course">Subject</label>
                  <select class="form-control select_f" id="courseFrom" name="subject">
                     <option value="0" disabled="">Select</option>
                     @foreach($subjects as $value)
                     <option value="{{$value->id}}">{{$value->subject}}</option>
                     @endforeach()
                  </select>
               </div>

               
               <!-- <div class="form-group">
                  <label for="exampleInputlocation" class="f_label f_course">Location</label>
                  <input type="text" name="address" class="form-control select_f" id="locationFrom">
               </div> -->

  
                  <!-- <select class="form-control select_f" id="locationFrom" name="locationFrom">
                     <option>Select</option>
                     <option value="Sergio Rodriguez|sergio.rodriguez@tix.com">Sergio</option>
                     <option value="Silvia Mahoney|silvia.mahoney@tix.com">Silvia</option>
                     <option value="Steve Moore|steve.moore@tix.com">Steve Moore</option>
                     <option value="Luke Perria|luke.perria@tix.com">Adam Hettinger</option>
                     <option value="Luke Perria|luke.perria@tix.com">Luke Perea</option>
                  </select> -->







               <div class="form-group">
                  <label for="exampleInputstate" class="f_label f_course">Rating</label>
                   
                  <select class="form-control select_f" id="stateFrom" name="rating">
                     <option value="0" disabled="">Select</option>
                     <option value="1">1 Star</option>
                     <option value="2">2 Star</option>
                     <option value="3">3 Star</option>
                     <option value="4">4 Star</option>
                     <option value="5">5 Star</option>
                  </select>
               </div>
               <div class="form-group">
                  <label for="exampleInputtype" class="f_label f_course">Type</label>
                  <select class="form-control select_f" id="typeFrom" name="online_status">
                     <option value="0" disabled="">Select</option>
                     <option value="1">Online</option>
                     <option value="0">Offline</option>
                  </select>
               </div>
               <div class="form-group">
                  <button type="submit" class="btn btn_search" data-toggle="#jobInfo" name="q" value="search">SEARCH</button>
               </div>
            </form>
         </div>
         <div class="col-md-9">
            <form id="togglingForm" action="{{route('tutors_listing')}}" method="get" class="form-horizontal">
               <input type="hidden" name="limit" value="10">
               <div class="form-group">
                  <div class="col-md-9">
                     <div class="icon-addon addon-lg">
                        <input type="text" placeholder="Name" class="form-control select_f f_paddingright" id="Name" name="name" value="" onkeyup="filterFunction()">
                        <div id="myDropdown" class="dropdown-content" style="width: 100%;">
                         @foreach($listing as $value)
                         <a href="#tools">{{$value->first_name}} {{$value->last_name}}</a>
                         @endforeach()
                        </div>
                        <label for="email" class="glyphicon glyphicon-search" rel="tooltip" title="email"></label>
                     </div>
                     <!--<input type="text" class="searchField">
                        <label for="search" class="glyphicon glyphicon-search"></label>-->

                     @if(isset($by_subj) || isset($by_country) && $count == 0)
                     <p class="f_fit">No Tutors Found for this Subject</p>
                     @else
                      <p class="f_fit">{{$count}} tutors fit your Search</p>            
                     @endif                                        

                  </div>
                  <div class="col-md-3">
                     <button type="submit" class="btn btn_search" data-toggle="#jobInfo" name="q" value="search">SEARCH</button>
                  </div>
               </div>
            </form>
            <!--<div class="row f_mainborder">
               <div class="col-md-2">
                  <img src="{{ asset('assets/images/search_img.png') }}" class="img-responsive img_searchresp">
               <div class="col-md-7 border_search">
                  <h3 class="search_name">Alex. S.</h3>
                  <h3 class="f_course">Computer Programming, Karate,<br> Music, and General Ed Tutor</h3>
                  <p class="f_findcontent">As a professional Karate instructor for five years <br>with a second degree black belt in Wado <br>Karate, I have experience tutoring students of <br>all ages, both in large groups and individually.
                     <br>As a high...
                  </p>
                  <a href="#" class="f_detail">Read More</a>
               </div>
               <div class="col-md-3">
                  <h3 class="search_name">$70/hour</h3>
                  <ul class="search_list">
                     <li><i class="fa fa-star f_star"></i></li>
                     <li><i class="fa fa-star f_star"></i></li>
                     <li><i class="fa fa-star f_star"></i></li>
                     <li><i class="fa fa-star f_star"></i></li>
                     <li><i class="fa fa-star f_star"></i></li>
                     <li>
                        <h3 class="search_name">5.0(367)</h3>
                     </li>
                  </ul>
                  <ul class="search_list">
                     <li><i class="fa fa-clock-o f_clock"></i></li>
                     <li>
                        <h3 class="search_name ">1,722 <span>hours tutoring</span></h3>
                     </li>
                  </ul>
               </div>
               </div>-->
            <!-- Foreach Starting -->
            @foreach($listing as $key => $value)
            <div class="row f_mainborder">
               <div class="col-md-2">
                  @if(isset($value->profile_pic))
                  <img src="{{ asset('public/dashboard/assets/images/profile/'.$value->profile_pic) }}" class="img-responsive img_searchresp" style="height:100px; width: 150px;">
                  @else
                  <img src="{{ asset('public/dashboard/assets/images/no-img.jpg') }}" class="img-responsive img_searchresp" style="height:100px; width: 150px;">
                  @endif
               </div>
             
               <div class="col-md-7 border_search">
                  <h3 class="search_name">{{$value->first_name}} {{  substr($value->last_name, 0, 1) }}</h3>
                  <h3 class="f_course">
                     @foreach($tutor_subjects[$value->user_id] as $subject)
                        {{$subject->subject->subject}},
                     @endforeach
                  </h3>
                  <p class="f_findcontent">  @if(isset($value->bio)){{$value->bio}}@endif
                  </p>
                  <a href="{{route('tutor_profile',['name' => $value->username])}}" class="f_detail">Read More</a>
               </div>
               <div class="col-md-3">
                  <h3 class="search_name"> @if(isset($value->profile->tution_per_hour))${{$value->profile->tution_per_hour}}/hour
                  @else Hours not available @endif</h3>
                  
                  <ul class="search_list">
                      <!-- Desperate time desperate measures -->
                      @php
                        $rating = App\User::getTutorRating($value->tutor_id)
                        @endphp
                      @for($i=0; $i<=$rating-1; $i++)
                      <li><i class="fa fa-star f_star"></i></li>
                      @endfor
                  
                     <li>
                        <h3 class="search_name f_iphone">
                        @if($rating == 0)
                            not rated
                        @else
                        ({{$rating}})
                        @endif
                       
                        
                        </h3>
                     </li>
                  </ul>
                  <!-- <ul class="search_list">
                     <li><i class="fa fa-clock-o f_clock"></i></li>
                     <li>
                        <h3 class="search_name ">1,722 <span>hours tutoring</span></h3>
                     </li>
                  </ul> -->
               </div>
            </div>
            @endforeach()
            <div id="results"></div>
            <!-- Foreach Ending -->
            <div class="f_resultbtn">
               <button type="button" id="ref_butn" class="btn btn_result" data-toggle="#jobInfo" data-result="15">SHOW MORE RESULTS</button>
            </div>
        </div>
      </div>
   </div>
</section>

@endsection
