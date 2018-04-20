 <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Lucum</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
            </a>
            
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
           <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              @php($readNotify = Auth::guard('web')->user()->readNotifications)
              @php($unreadNotify = Auth::guard('web')->user()->unreadNotifications)
              @if($unreadNotify->count() > 0)
              <span class="label label-warning">
                  {{$unreadNotify->count()}}
              </span>
              @endif
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have {{$unreadNotify->count()}} Notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  
                
                   @foreach ($unreadNotify as  $value)            
                    <li>
                      <a href="{{url('user-job/practice-job-detail/'.$value->data['job']['id'])}}">
                        <i class="fa fa-users text-aqua"></i> {!! $value->data['job']['applicant_name']!!}
                        {!! $value->data['job']['job_title']!!}
                      </a>
                    </li> 
                    @endforeach 
                    @foreach ($readNotify as  $value)            
                    <li>
                      <a href="{{url('user-job/practice-job-detail/'.$value->data['job']['id'])}}">
                        <i class="fa fa-users text-aqua"></i> {!! $value->data['job']['applicant_name']!!}
                        {!! $value->data['job']['job_title']!!}
                      </a>
                    </li> 
                    @endforeach  
                </ul>
              </li>
              <!-- <li class="footer"><a href="#">View all</a></li> -->
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
            </a>
           
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
             <!--  <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
              <span class="hidden-xs">{{ Auth::user('web')->first_name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"> -->

                <p>
                  Alexander Pierce - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                  <!-- <a href="#" class="btn btn-default btn-flat">Sign out</a> -->
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>