@extends('dashboard.dashboard-app')
@section('content')
<div class="container-fluid remove_padding bg_color_gray">
@include('dashboard.partials.dashboard-sidebar')

<div class="edit_profile">
<h3 class="f_profile_content text-center">Refer Bookings</h3>
</div>
<div class="col-md-9">
@include('partials.error_section')
<div class="row padding_top">
<div class="col-md-12">

<div class="col-md-3"></div>

<?php $c_url=URL::current();
      $exp= explode("/",$c_url);
      $bid=$exp[5];      
  ?>



<div class="col-md-6">
@if (session()->has('message'))
    <div class="alert alert-info">
        {{ session('message') }}
    </div>
@endif

 <form action="{{route('book_refer_insert')}}" method="POST">
    <div class="form-group">
      <label for="email">Tutor Name:</label>
     <select class="form-control" name="refer_to" required="">
    <option selected disabled>--Select--</option>
   @foreach ($users as $key => $value)	
    <option value="{{$value->id}}">{{$value->first_name}}</option>
    @endforeach
  </select>
    </div>
   <input type="hidden" name="book_id" value="{{$bid}}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">


    <button type="submit" class="btn btn-success">Submit</button>
  </form>

</div>
<div class="col-md-3"></div>
</div>
</div>
</div>
</div>
@endsection
