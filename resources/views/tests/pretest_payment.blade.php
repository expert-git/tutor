@extends('app')
@section('content')

<section class="aboutus">
   <div class="container">
      <div class="row">
        <div class="col-md-3">
           @foreach($grades as $grade)
                 <div class="menu menu_width">
                     <header class="menu__header s_accordion">
                         <h1 class="menu__header-title">{{$grade->grade}}</h1>
                     </header>
                 </div>
           @endforeach
        </div>
      @if($flag == 1)

         <div class="col-md-9">
              <h3 class="about_us"> Hello, {{Auth::user()->first_name}}. take the pretest to proceed.  You will be charged $40 
 </h3>
              <!--<p class="about_content">The Pretest costs $40 to Proceed further for payment from your Wallet</p>-->
              <div class="btn_check">
                <a href="{{route('pay_pretest_student')}}">Proceed</a>
              </div>

         </div>

      @elseif($flag == 3)
         <div class="col-md-9">
              @include('partials.error_section')
              <br>
              <h3 class="about_us">
                Click The Link below to go to your Test Page
                <a class="about_us_a" href="{{route('student_pretest')}}">Pre-Test</a>
              </h3>
         </div>
      @elseif($flag=4)
          @include('partials.error_section')
          <div class="col-md-9">
            <h3 class="about_us">
              <a target="_blank" href="{{route('my_balance')}}">Go to My Wallet</a>
            </h3>
          </div>
      @endif






      </div>
   </div>
</section>

@endsection
