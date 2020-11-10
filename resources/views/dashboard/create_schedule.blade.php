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
       <div class="col-md-6 color_padding">
         <span class="box_color_green"></span>
         <span class="color_status">Available</span>
         <span class="box_color_white"></span>
         <span class="color_status">Not Available</span>
         <span class="box_color_red"></span>
         <span class="color_status">Booked</span>
       </div>
     </div>
		 <div class="row">
			 <div class="col-md-12">
         <div class="table-responsive table-bordered">
          <table id="s-table" class="table s_table">
            <thead>
              <tr>
                 <th></th>
                @foreach($day as $key => $value)
                 <th>{{$value}}</th>
                @endforeach
              </tr>
            </thead>
            <tbody>
                @foreach($time_array as $key => $time)                 
              <tr>
                <td>
                    {{$time}}
                </td>
                @foreach($day as $key => $date)
                 <td>
                    <div class="create_schedule" data-href="{{route('post_scheduling')}}" data-status="0" data-time="{{ $time }}" data-date="{{ $date }}" data-tutor_id="{{ Auth::user()->id }}" data-toggle="tooltip" title="Not Available"></div>
                 </td>
                @endforeach

              </tr>
                @endforeach
            </tbody>
          </table>
         </div>
       </div>
		 </div>
	  </div>
  </div>
</div>

@endsection
