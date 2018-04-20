<nav class="navbar navbar-default navbar-fixed-top" id="menu">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
     <div class="navbar-header">
      <img src="{{asset('/front/img/logo-lc.png')}}" style="width: 150px; height: 70px;">
    </div>
    

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1">
     <div class="navbar-header" >
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    <!-- <a class="navbar-brand" href="#">Brand</a> -->
    </div>
      <ul class="nav navbar-nav">
        <li class="dropdown" id="menuLeft">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">SourceLocum <span class="caret"></span></a>
          <ul class="dropdown-menu" id="dropdown-menu" id="menuLeftDrop">
            <li><a href="{{url('/practice/home')}}">Locums</a></li>
            <li><a href="#">Practices</a></li>
            <li><a href="#">Hubs</a></li>
            <li><a href="{{url('/admin/login')}}">Federation</a></li>
            <li><a href="{{url('/admin/admin')}}">Job Adverties</a></li>
          </ul>
        </li>
      </ul>
       <form class="navbar-form navbar-right">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">

        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right" id="menuRight">
        
        <li><a href="{{url('/')}}">Lucums</a></li>
        <li><a href="{{url('/practice')}}">Practices</a></li>
        <li><a href="{{url('/hub')}}">Hubs</a></li>
        <li><a href="{{url('/federation')}}">Federation</a></li>
        <li><a href="{{url('/all-job')}}">Jobs</a></li>
        <!-- <li id="logBtn"><a href="{{ url('/login-form') }}">Login</a></li> -->
        <!-- <li> <a href="{{ route('register') }}">Register</a> </li> 
                -->
                @guest
                             <li id="logBtn" style="background-color: #50B7D6"><a href="{{ route('login') }}">Login</a></li>
                              <li id="regBtn"  style="background-color: #F44242"><a href="{{url('/registration-one')}}">Registration</a></li>
                                                  
                                              @else
                                                    
                              <li id="logBtn" style="background-color: #50B7D6"><a href="">{{ Auth::user()->first_name }}</a></li>

                                                    <li id="regBtn" style="background-color:#F44242">
                                                      <a href="{{ route('logout') }}"
                                                                  onclick="event.preventDefault();
                                                                           document.getElementById('logout-form').submit();">
                                                                  Logout
                                                              </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                              </li>
                        @endguest
        
      </ul>
     
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
