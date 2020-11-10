@extends('app')
@section('content')

<section class="search">
   <div class="container">
      <div class="row">
         <div class="col-md-10 col-md-offset-1">

            <h1 class="s_available_position">Available Positions</h1>

            <form action="#" method="get" class="form-horizontal">
               <input type="hidden" name="limit" value="10">
               <div class="form-group">
                  <div class="col-md-9">
                     <div class="icon-addon addon-lg">
                        <input type="text" placeholder="Search Job ......" class="form-control select_f f_paddingright" id="Name" name="name">
                        <label class="glyphicon glyphicon-search" rel="tooltip" title="email"></label>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <button type="submit" class="btn btn_search" data-toggle="#jobInfo" name="q" value="search">SEARCH</button>
                  </div>
               </div>
            </form>

            <div class="row f_mainborder">
              <div class="position latest">
                <div class="col-md-2">
                  <date>
                    <span>apply by</span>
                    <day>31</day>
                    <month>July</month>
                  </date>
                </div>
                <div class="col-md-8">
                  <div class="row">
                    <div class="col-sm-8">
                      <position>
                        <h3>PASHTO SPEAKER</h3>
                        <span></span>
                      </position>
                    </div>
                    <div class="col-sm-4">
                      <location>
                        <h3>karachi</h3>
                        <span></span>
                      </location>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-10">
                      <p>
                        Job Description Answer calls professionally to provide information about products and services, take/ cancel orders, or obtain details of complaints.
                        Keep records of customer interactions, recording details...
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-md-2 text-center">
                  <a href="#" class="btn btn-gradient">
                    <span>Apply Now</span>
                    <i class="fa fa-arrow-right"></i>
                  </a>
                </div>
              </div>
            </div>

            <div class="row f_mainborder">
              <div class="position latest">
                <div class="col-md-2">
                  <date>
                    <span>apply by</span>
                    <day>31</day>
                    <month>July</month>
                  </date>
                </div>
                <div class="col-md-8">
                  <div class="row">
                    <div class="col-sm-8">
                      <position>
                        <h3>PASHTO SPEAKER</h3>
                        <span></span>
                      </position>
                    </div>
                    <div class="col-sm-4">
                      <location>
                        <h3>karachi</h3>
                        <span></span>
                      </location>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-10">
                      <p>
                        Job Description Answer calls professionally to provide information about products and services, take/ cancel orders, or obtain details of complaints.
                        Keep records of customer interactions, recording details...
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-md-2 text-center">
                  <a href="#" class="btn btn-gradient">
                    <span>Apply Now</span>
                    <i class="fa fa-arrow-right"></i>
                  </a>
                </div>
              </div>
            </div>
            
            <div class="row f_mainborder">
              <div class="position latest">
                <div class="col-md-2">
                  <date>
                    <span>apply by</span>
                    <day>31</day>
                    <month>July</month>
                  </date>
                </div>
                <div class="col-md-8">
                  <div class="row">
                    <div class="col-sm-8">
                      <position>
                        <h3>PASHTO SPEAKER</h3>
                        <span></span>
                      </position>
                    </div>
                    <div class="col-sm-4">
                      <location>
                        <h3>karachi</h3>
                        <span></span>
                      </location>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-10">
                      <p>
                        Job Description Answer calls professionally to provide information about products and services, take/ cancel orders, or obtain details of complaints.
                        Keep records of customer interactions, recording details...
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-md-2 text-center">
                  <a href="#" class="btn btn-gradient">
                    <span>Apply Now</span>
                    <i class="fa fa-arrow-right"></i>
                  </a>
                </div>
              </div>
            </div>

            <div class="f_resultbtn">
               <button type="button" id="ref_butn" class="btn btn_result" data-toggle="#jobInfo" data-result="10">SHOW MORE RESULTS</button>
            </div>

        </div>
      </div>
   </div>
</section>

@endsection
