@extends('dashboard.dashboard-app')
@section('content')
<div class="container-fluid remove_padding bg_color_gray">
   @include('dashboard.partials.dashboard-sidebar')

	 <div class="col-md-9">
     <div class="edit_profile padding_down_s">
       <h3 class="f_profile_content text-center">Subject Information</h3>
     </div>
		 	@include('partials.error_section')
		 <div class="row">
			 <div class="col-md-12">
				 <form action="{{route('tutor_subject')}}" method="post">
					 {{csrf_field()}}
					 <div class="form-group profile_form s_profile_form col-md-5">
						 <label>Subjects <span>*</label>
						 <br>
						 <select class="form-control span3 " name="subject_name">
							 @foreach($subjects as $subject)
							 <option value="{{$subject->id}}">{{$subject->subject}}</option>
							 @endforeach
						 </select>
					 </div>
					 <div class="form-group profile_form s_profile_form col-md-3">
					 	<input type="submit" value="ADD SUBJECT" class="btn btn-primary s_save">
					 </div>
				 </form>
			 </div>
		 </div><br>
		 <div class="row">
			 <div class="col-md-12">
				 <table class="data_table_apply display" width="100%" data-page-length="10" class="table table-dark">
					 <thead>
						 <tr>
							 <th>#</th>
							 <th>Subject Name</th>
							 <th>Subject Code</th>
							 <th>Action</th>
						 </tr>
					 </thead>
					 <tbody>
						 @if(isset($all_subjects))
						 @foreach($all_subjects as $key => $subject)
						 <tr>
							 <th scope="row">{{$key+1}}</th>
							 <td>{{$subject->subject}}</td>
							 <td>{{$subject->subject_code}}</td>
							 <td>
								 <a href="{{route('subjDel', ['id' => $subject->id])}}" onclick="return confirm('Are you sure? You want to delete this Subject')" class="subjDel" >
									 <i class="fa fa-trash"></i>
								 </a>
							 </td>
						 </tr>
						 @endforeach
						 @endif
					 </tbody>
				 </table>
			 </div>
		 </div>
	 </div>
</div>
@endsection
