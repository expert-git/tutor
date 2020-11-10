@extends('dashboard.dashboard-app')
@section('content')
<div class="container-fluid remove_padding bg_color_gray">
@include('dashboard.partials.dashboard-sidebar')
<?php
use App\TestAnswers;
?>
<div class="edit_profile">
<h3 class="f_profile_content text-center">My Result</h3>
</div>
<div class="col-md-9">
@include('partials.error_section')
<div class="row padding_top">
<div class="col-md-12">
<table class="data_table_apply display" width="100%" data-page-length="10" class="table table-dark">
<thead>
<tr>
<th>#</th>
<th>Test Name</th>
<th>Grade</th>
<th>Subject</th>
<th>Chapter</th>
<th>Question Count</th>
<th>Marks</th>
</tr>
</thead>
<tbody>
@foreach ($data as $key => $value)	
<tr>
<td>{{ ++$key }}</td>	
<td>{{ $value->heading }}</td>
<td>{{ $value->grade }}</td>
<td>{{ $value->subject }}</td>
<td>{{ $value->chapter_name }}</td>
<td>{{TestAnswers::getQuestionCount(['test_id'=>$value->test_id,'chapter_id'=>$value->chapter_id])}}</td>
<td>{{TestAnswers::getMarks(['test_id'=>$value->test_id,'chapter_id'=>$value->chapter_id])}}</td>	
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
</div>
</div>
@endsection
