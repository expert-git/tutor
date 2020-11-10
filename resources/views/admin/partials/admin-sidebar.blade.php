  <!-- Left side column. contains the logo and sidebar -->

  <aside class="main-sidebar" @if(!isset($login)) style="background-color:#222d32" @endif>
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('public/admin//dist/img/user2-160x160.png') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>@if(Auth::check()){{Auth::user()->first_name}}@endif</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
<!--       <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
          </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>

        <!-- Permissions -->
        @if(Auth::check())
            <!-- <li class="treeview">
              <a href="#">
                <i class="fa fa-share"></i> <span>Permissions</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">

                <li><a href="{{route('permissions.create')}}"><i class="fa fa-circle-o"></i> Add Permission</a></li>

                <li><a href="{{route('permissions.index')}}"><i class="fa fa-circle-o"></i> Permission Management</a></li>

              </ul>
            </li> -->

          <!-- Roles -->
          <!-- <li class="treeview">
            <a href="#">
              <i class="fa fa-share"></i> <span>Roles</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{route('roles.create')}}"><i class="fa fa-circle-o"></i> Add Role</a></li>
              <li><a href="{{route('roles.index')}}"><i class="fa fa-circle-o"></i> Role Management</a></li>
            </ul>
          </li> -->

          <!-- Users -->
          <li class="treeview">
            <a href="#">
              <i class="fa fa-share"></i> <span>Users</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{route('users.create')}}"><i class="fa fa-circle-o"></i> Add User</a></li>
              <li><a href="{{route('users.index')}}"><i class="fa fa-circle-o"></i> User Management</a></li>
            </ul>
          </li>

          <!-- Pages -->
          <!-- <li class="treeview">
            <a href="#">
              <i class="fa fa-share"></i> <span>Pages</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{route('pages.create')}}"><i class="fa fa-circle-o"></i> Add Page</a></li>
              <li><a href="{{route('pages.index')}}"><i class="fa fa-circle-o"></i> Page Management</a></li>
            </ul>
          </li> -->

          <!-- Analytics -->
          <!-- <li class="treeview">
            <a href="{{ route('analytics') }}">
              <i class="fa fa-share"></i> <span>Analytics</span>
            </a>
          </li> -->

        <li class="treeview">
          <a href="{{route('admin_booking')}}">
            <i class="fa fa-share"></i> <span>Booking</span>
          </a>
        </li>

        <!-- Activity Log -->
        <li class="treeview">
          <a href="{{route('admin_transactions')}}">
            <i class="fa fa-share"></i> <span>Transactions</span>
          </a>
        </li>

        <li class="treeview">
          <a href="{{route('admin_withdraws')}}">
            <i class="fa fa-share"></i> <span>Withdraw Requests</span>
          </a>
        </li>

        <!-- Utilities -->
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Utilities</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('todos.index')}}"><i class="fa fa-circle-o"></i> Todolist </a></li>

            <li><a href="{{route('pages.index')}}"><i class="fa fa-circle-o"></i> Calendar </a></li>
            <li> 


            <li><a href="{{route('pages.index')}}"><i class="fa fa-circle-o"></i> Calendar </a></li>

          </ul>
        </li> -->

        <!-- Subjects -->
        <li class="treeview">
          <a href="{{route('subject_admin')}}">
            <i class="fa fa-share"></i> <span>Subjects</span>
          </a>
        </li>
        
        <!-- Subjects -->
        <li class="treeview">
          <a href="{{route('chapters')}}">
            <i class="fa fa-share"></i> <span>Chapters</span>
          </a>
        </li>

        <!-- Subjects -->
        <li class="treeview">
          <a href="{{route('job_requests')}}">
            <i class="fa fa-share"></i> <span>Job Requests</span>
          </a>
        </li>

        <li class="treeview">
          <a href="{{route('job_boards')}}">
            <i class="fa fa-share"></i> <span>Job Boards</span>
          </a>
        </li>

        <li class="treeview">
          <a href="{{route('profile_reviews')}}">
            <i class="fa fa-share"></i> <span>Reviews</span>
          </a>
        </li>

        <li class="treeview">
          <a href="{{route('profile_grades')}}">
            <i class="fa fa-share"></i> <span>Grades</span>
          </a>
        </li>

        <!-- Tests -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Test</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('admin_addtest_index')}}"><i class="fa fa-circle-o"></i> Add Test </a></li>

            <li><a href="{{route('admin_testlist')}}"><i class="fa fa-circle-o"></i>Test List</a></li>
            <!-- <li><a href="{{route('roles.index')}}"><i class="fa fa-circle-o"></i> Role Management</a></li> -->
          </ul>
         </li>

         <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Career Jobs</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('admin_addjob')}}"><i class="fa fa-circle-o"></i> Add Job </a></li>

            <li><a href="{{route('care_all_jobs')}}"><i class="fa fa-circle-o"></i> All Jobs </a></li>
            <li><a href="{{route('care_applications_jobs')}}"><i class="fa fa-circle-o"></i> Job Applications </a></li>
            <!-- <li><a href="{{route('roles.index')}}"><i class="fa fa-circle-o"></i> Role Management</a></li> -->
          </ul>
         </li>

    @endif

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
