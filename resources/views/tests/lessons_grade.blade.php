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
<div class="menu__body s_panel">
<ul class="nav">
@foreach($grade->subjects as $subject)
<li class="nav__item">
<a href="{{route('test_mcq_index', ['gradeId'=> $grade->id, 'subjectId'=> $subject->id])}}"
class="nav__item-link" >
<span class="nav__item-text">{{$subject->subject}}</span>
</a>
</li>
@endforeach
</ul>
</div>
</div>
@endforeach
</div>

@if(isset($test_mcq))
<div class="col-md-8">
<h3 class="mcqs_title">{{$test_mcq->heading}}</h3>
<p class="mcqs_content">
{{$test_mcq->description}}
</p>
<form class="" method="POST" action="{{route('submit_test')}}">
@foreach($test_mcq->mcqs as $mcq)
<!-- <form class="mcqTestForm" action="{{route('check_answer')}}" method="post"> -->
<div class="mcqs_option">

<div class="mcqs">
<p class="mcqs_question">{{strip_tags($mcq->question)}}</p>
@foreach($mcq->mcq_options as $key => $mcq_option)
<div class="border_mcqs">
<p class="correct_answer">Correct Answer</p>
<p class="mcqs_answer">
<b>{{++$key}}</b>
<input type="radio" name="choice_{{$mcq->id}}" value="{{$mcq_option->id}}" required>
{{$mcq_option->mcq_option}}
</p>
</div>
@endforeach

<div class="WyzQuizExplanation">
The correct answer here would be <b class="define_option">B</b>.

</div>
</div>

<input type="hidden" value="{{$test_mcq->id}}" name="test_id"/>
<input type="hidden" value="{{$mcq->id}}" name="mcq_id[]"/>

<!-- <button type="submit" class="btn button_mcqs" name="button">Check Answer</button> -->

</div>

@endforeach
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<button type="submit" class="btn button_mcqs" name="button">Submit</button>
</form>
<!-- <div class="mcqs_option">
<div class="mcqs">
<p class="mcqs_question">Please mail that letter.</p>
<p class="mcqs_answer">
<b>A.</b>
<input type="radio" name="r1" value="direct">
direct
</p>
<p class="mcqs_answer">
<b>B.</b>
<input type="radio" name="r1" value="direct">
indirect
</p>
</div>
<button type="button" class="btn button_mcqs" name="button">Check Answer</button>
</div>
<div class="mcqs_option">
<div class="mcqs">
<p class="mcqs_question">Please mail that letter.</p>
<p class="mcqs_answer">
<b>A.</b>
<input type="radio" name="r1" value="direct">
direct
</p>
<p class="mcqs_answer">
<b>B.</b>
<input type="radio" name="r1" value="direct">
indirect
</p>
</div>
<button type="button" class="btn button_mcqs" name="button">Check Answer</button>
</div> -->
<!-- <a class="btn btn-theme btn-sm btn-min-block f_about f_bycourse f_ipad" href="#">Submit MCQ Test</a> -->
</div>

@else
<div class="col-md-8">
<h3 class="mcqs_title">No Test Found.</h3>
</div>
@endif
</div>
</div>
</section>

@endsection
