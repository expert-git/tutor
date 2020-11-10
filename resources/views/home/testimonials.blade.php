@extends('app')
@section('content')
<section class="testimonial">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h3 class="f_tutor">What our client says about us</h3>
            <div class="time_click f_test">
               <a href="#jobRequestModal"  data-toggle="modal">WRITE A REVIEW</a>
            </div>
         </div>
      </div>
   </div>
   <div class="container">
      <div class="row">
        @foreach($testimonials as $testimonial)

         <div class="col-md-12">
            <div class="border_testimonial">
               <i class="fa fa-quote-left f_iconcomma"></i>
               <h3 class="f_joy">{{$testimonial->username}}</h3>
               <p class="content_testimonial">{{$testimonial->comment}}.</p> 
               <p class="right_f">{{$testimonial->username}}, {{$testimonial->name}}</p>
            </div>
         </div>
        @endforeach

      </div>
   </div>
</section>
<!-- Subject Edit Modal -->
<div class="modal fade" id="jobRequestModal" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" 
                       data-dismiss="modal">
                           <span aria-hidden="true">&times;</span>
                           <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        <span class="subjModalHeading"></span> Testimonial
                    </h4>
                </div>
            
                <!-- Modal Body -->
                <div class="modal-body">
                    <form role="form" id="sendRequestTestimonial" action="{{route('write_testimonial')}}" method="post">
                     {{csrf_field()}}
                      <div class="form-group">
                        <label for="task">Comment</label>
                          <textarea class="form-control" name="comment" rows="4" id="testComment" minlength="30"  required></textarea>
                      </div>           
                </div>
            
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="submit" name="submit" class="btn f_viewjob ">
                        <span class="subjModalHeading"></span> Submit
                    </button>
                </div>
             </form>
        </div>
    </div>
</div>
@endsection
