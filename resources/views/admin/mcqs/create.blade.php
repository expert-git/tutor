@extends('admin.admin-app')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Panel
        <small>- Add MCQS</small>
      </h1>
    </section>
    @include('partials.error_section')
    @foreach($errors->all() as $erroring)
                  <li>{{$erroring}}  </li>
                  @endforeach
    <!-- Main content -->
        <section class="content">
     <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add MCQS</h3>
              @include('admin.partials.error_section')
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="#" method="post">
              <div class="box-body">
                <div class="form-group profile_form">
                  <label for="exampleInputGender">Title<span>*</span></label>
                  <input type="text" value="" class="form-control" name="title"/>
                </div>
                <div class="form-group profile_form">
                  <label for="grade">Grade<span>*</span></label>
                  <select id="grade" name="grade" class="form-control" required>
                    <option value="A">A</option>
                    <option value="B">B</option>
                  </select>
                </div>
                <div class="form-group profile_form">
                  <label for="subject">Subject<span>*</span></label>
                  <select id="subject" name="subject" class="form-control" required>
                    <option value="English">English</option>
                    <option value="Urdu">Urdu</option>
                  </select>
                </div>
                <div class="form-group profile_form">
                  <label for="description">Description<span>*</span></label>
                  <textarea id="description" name="description" rows="8" class="form-control" required></textarea>
                </div>

                <div id="add_question">
                  <div class="row question">
                    <div class="col-md-12">
                      <div class="form-group profile_form">
                        <label for="q1">Question 1<span>*</span></label>
                        <label class="pull-right add_newquestion">Add Question</label>
                        <textarea id="q1" name="q1[]" rows="8" class="form-control" required></textarea>
                      </div>
                      <div class="form-group profile_form add_answer">
                        <div class="row">
                          <div class="col-md-8">
                            <label>Answer (Check the correct answer)</label>
                            <label class="pull-right add_mcqs">Add More</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-8">
                            <label class="mcqs_label">1.</label>
                            <input type="text" name="q1[]" class="form-control mcqs_answer">
                            <div class="mcqs_check">
                              <i class="fa fa-times-circle-o fa-lg"></i>
                              <input type="checkbox" name="q1_check[]">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-8">
                            <label class="mcqs_label">2.</label>
                            <input type="text" name="q1[]" class="form-control mcqs_answer">
                            <div class="mcqs_check">
                              <i class="fa fa-times-circle-o fa-lg"></i>
                              <input type="checkbox" name="q1_check[]">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>



              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <input type="hidden" name="_token" value="{{Session::token()}}">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

        </div>

    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
