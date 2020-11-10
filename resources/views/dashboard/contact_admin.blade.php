@extends('dashboard.dashboard-app')
@section('content')

<section class="profile">

   <div class="container-fluid remove_padding bg_color_gray">
  		@include('dashboard.partials.dashboard-sidebar')
      

      <div class="col-md-9 f_padding bg_color">
      	<div class="edit_profile">
      	<h3 class="f_profile_content" style="text-align:center;">Contact Admin</h3>
        @include('partials.error_section')
        @foreach($errors->all() as $erroring)
                  <li>{{$erroring}}  </li>
                  @endforeach
      <!-- 	<p class="f_text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, elium totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.</p> -->

      </div>

  
   <div class="col-md-2"></div>
   <div class="col-md-8">
  <form action="#" method="post" enctype="multipart/form-data">

 <div class="form-group">
    <label>Name</label>
    <br>
    <input type="text" name="name" class="form-control">
</div>

<div class="form-group">
    <label>Email Id</label>
    <br>
    <input type="text" name="email_id"  class="form-control">
</div>

<div class="form-group">
    <label>Message</label>
    <br>
    <textarea name="message"  class="form-control"></textarea>
</div>
 
                                             
<input type="hidden" name="_token" value="{{Session::token()}}">
<input type="submit" value="Submit" class="btn btn-info">
    <div class="clearfix"></div>
   
  
 </form>
 </div>
  <div class="col-md-2"></div>
 
 
</div>
</div>
</section>


@endsection
