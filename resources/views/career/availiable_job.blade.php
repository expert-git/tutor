@extends('app')
@section('content')

<section class="search">
   <div class="container">
      <div class="row">
         <div class="col-md-10 col-md-offset-1">

            <h1 class="s_available_position">Available Positions</h1>

            <form action="{{route('search_jobs')}}" method="get" class="form-horizontal">
               <!-- <input type="hidden" name="limit" value="10"> -->
               <div class="form-group">
                  <div class="col-md-9">
                     <div class="icon-addon addon-lg">
                        <input type="text" placeholder="Search Job ......" 
                        class="form-control select_f f_paddingright" id="Name" name="query">
                        <label class="glyphicon glyphicon-search" rel="tooltip" title="email"></label>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <button type="submit" class="btn btn_search" data-toggle="#jobInfo">SEARCH</button>
                  </div>
               </div>
            </form>

                @foreach($career_jobs as $career_job)

                            <div class="row f_mainborder">
                            <div class="position latest">
                                <div class="col-md-2">
                                <date>
                                    <span>Apply by</span>

                                    <?php
                                        $monthNum  = date('m', strtotime($career_job->job_apply_date));
                                        $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                                        $monthName = $dateObj->format('F');
                                    ?>
                                    <day>{{ date('d', strtotime($career_job->job_apply_date)) }} </day>
                                    <month>{{ $monthName }}</month>
                                </date>
                                </div>
                                <div class="col-md-8">
                                <div class="row">
                                    <div class="col-sm-8">
                                    <position>
                                        <h3>{{$career_job->job_heading}}</h3>
                                        <span></span>
                                    </position>
                                    </div>
                                    <div class="col-sm-4">
                                    <location>
                                        <h3>{{ $career_job->job_city }}</h3>
                                        <span></span>
                                    </location>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-10">
                                    <p> {!! str_limit($career_job->job_desc, 50) !!}
                                    </p>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-2 text-center">
                                <a href="{{route('apply_job_index', ['jobid' => $career_job->id])}}"
                                    target="_blank" class="btn btn-gradient">
                                    <span>Apply Now</span>
                                    <i class="fa fa-arrow-right"></i>
                                </a>
                                </div>
                            </div>
                            </div>

                @endforeach

            <div class="f_resultbtn">
                {{$career_jobs->links()}}
               <!-- <button type="button" id="ref_butn" class="btn btn_result" data-toggle="#jobInfo" data-result="10">SHOW MORE RESULTS</button> -->
            </div>

        </div>
      </div>
   </div>
</section>

@endsection
