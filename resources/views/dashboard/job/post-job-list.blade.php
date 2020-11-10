@extends('dashboard.dashboard-app')
@section('content')
<div class="container-fluid remove_padding bg_color_gray">
   @include('dashboard.partials.dashboard-sidebar')

	 <div class="col-md-9">
     <div class="edit_profile padding_down_s">
       <h3 class="f_profile_content text-center">Post Job List</h3>
     </div>
     <div class="row">
       <div class="col-md-12">
         <table class="data_table_apply display" width="100%" data-page-length="10" class="table table-dark">
           <thead>
             <tr>
               <th>#</th>
               <th>Subject</th>
               <th>Title</th>
               <th>Action</th>
             </tr>
           </thead>
           <tbody>
             
             @foreach($jobs as $key => $value)
             <tr>
               <td>{{++$key}}</td>
               <td>{{$value->subject}}</td>
               <td>{{$value->title}}</td>
               <td><a class="btn btn-theme btn-sm btn-min-block f_viewjob" href="{{route('post-job-detail', ['id' => $value->id])}}">DETAIL</a></td>
             </tr>             
             @endforeach

           </tbody>
         </table>
       </div>
     </div>


	 </div>
</div>
@endsection
