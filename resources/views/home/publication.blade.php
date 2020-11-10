@extends('app')
@section('content')

<section class="publication">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h3 class="f_public">
               Buy our books
            </h3>
         </div>
      </div>
      <div class="row">
         <div class="col-md-5 col-md-offset-1 f_publicborder">
            <img src="{{ asset('assets/images/publicimage1.png') }}" class="img-responsive img_public">
            <h3 class="f_book">My book of my dreams</h3>
            <p class="f_does">Does your child need motivation? Does your child need to <br>prepare for the future by recognizing your potential. This book <br>uses stories to teach both children and adults about their <br>potential and talents. Buy - My book of my dream</p>
         </div>
         <div class="col-md-6">
            <img src="{{ asset('assets/images/publicimage2.png') }}" class="img-responsive img_public">
            <h3 class="f_book">My mother says Share</h3>
            <p class="f_does">This book teaches early learners the concept of fractions. It is <br>an easy to read book that your child will love.</p>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12">
            <h3 class="f_book">Buy ISBN - We can sell you an ISBN number for your publication if you need one.</h3>
            <h3 class="f_public">
               It is only $30 each
            </h3>
         </div>
      </div>
   </div>
</section>

@endsection
