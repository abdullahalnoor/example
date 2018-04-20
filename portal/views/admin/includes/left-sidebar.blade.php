  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div> -->
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div> -->
      <!-- </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">User</li>
        <li><a href="{{url('/admin/practice-list')}}"><i class="fa fa-circle-o"></i>All Practices</a></li>
        <li><a href="{{url('/admin/lucum-list')}}"><i class="fa fa-circle-o"></i> All Lucums</a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Menu</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i>Menus</a></li>
            <li><a href="{{url('/admin/add-menu')}}"><i class="fa fa-circle-o"></i>Add Menu</a></li>        
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Sub-Menu</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i>Sub-Menus</a></li>
            <li><a href="{{url('/admin/add-sub-menu')}}"><i class="fa fa-circle-o"></i>Add Sub-Menu</a></li>        
          </ul>
        </li>
        
         <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Page Lucums</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li> -->
             <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Modern Tool
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href=" {{url('/admin/view-tool-info')}}"><i class="fa fa-circle-o"> View Modern Tool </i> </a></li>
                <li><a href="{{url('/admin/add-tool-info')}}"><i class="fa fa-circle-o"> Add Modern Tool</i> </a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Tool Benefit
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href=" {{url('/admin/')}}"><i class="fa fa-circle-o"> View Tool Benefit</i> </a></li>
                <li><a href="{{url('/admin/add-benefit-info')}}"><i class="fa fa-circle-o"> Add  Tool Benefit</i> </a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Partnership 
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href=" {{url('/admin/')}}"><i class="fa fa-circle-o"> View Partnership </i> </a></li>
                <li><a href="{{url('/admin/add-partnership-info')}}"><i class="fa fa-circle-o"> Add Partnership</i> </a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Feature  
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href=" {{url('/admin/')}}"><i class="fa fa-circle-o"> View Feature </i> </a></li>
                <li><a href="{{url('/admin/add-feature-info')}}"><i class="fa fa-circle-o"> Add Feature</i> </a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Community Section
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href=" {{url('/admin/view-community')}}"><i class="fa fa-circle-o"> View Community </i> </a></li>
                <li><a href="{{url('/admin/add-community')}}"><i class="fa fa-circle-o"> Add Community</i> </a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o">  Contact Section</i>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href=""><i class="fa fa-circle-o"></i> View Contact</a></li>
                <li><a href="{{url('/admin/add-contact')}}"><i class="fa fa-circle-o"></i> Add Contact</a></li>
                
              </ul>
            </li>
            <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li> -->
          </ul>
        </li>
        <!-- end of lucum menu -->
          <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Page Practice</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li> -->
             <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Network & GPs
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href=" {{url('/admin/')}}"><i class="fa fa-circle-o"> View Modern Tool </i> </a></li>
                <li><a href="{{url('/admin/add-network-info')}}"><i class="fa fa-circle-o"> Add Network</i> </a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Network Benefit
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href=" {{url('/admin/')}}"><i class="fa fa-circle-o"> View Network Benefit</i> </a></li>
                <li><a href="{{url('/admin/add-network-benefit-info')}}"><i class="fa fa-circle-o"> Add  Network Benefit</i> </a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Practice Partnership 
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href=" {{url('/admin/')}}"><i class="fa fa-circle-o"> View Practice Partnership </i> </a></li>
                <li><a href="{{url('/admin/add-practice-partnership-info')}}"><i class="fa fa-circle-o"> Add Practice Partnership</i> </a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Client  
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href=" {{url('/admin/')}}"><i class="fa fa-circle-o"> View Client </i> </a></li>
                <li><a href="{{url('/admin/add-client-info')}}"><i class="fa fa-circle-o"> Add Client</i> </a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Practice Maneger
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href=" {{url('/admin/view-practice-maneger-info')}}"><i class="fa fa-circle-o"> View  Practice Maneger </i> </a></li>
                <li><a href="{{url('/admin/add-practice-maneger-info')}}"><i class="fa fa-circle-o"> Add Practice Maneger  </i> </a></li>
              </ul>
            </li>
           
            <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li> -->
          </ul>
        </li>
        <!-- end of Practice menu -->
         <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Page Hub</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li> -->
             <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i>Hub Advantage
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href=" {{url('/admin/')}}"><i class="fa fa-circle-o"> View Advantage  </i> </a></li>
                <li><a href="{{url('/admin/add-hub-advantage-info')}}"><i class="fa fa-circle-o"> Add Advantage</i> </a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Hub Facility 
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href=" {{url('/admin/')}}"><i class="fa fa-circle-o"> View Hub Facility</i> </a></li>
                <li><a href="{{url('/admin/add-hub-facility-info')}}"><i class="fa fa-circle-o"> Add Hub Facility</i> </a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Hub Sppech 
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href=" {{url('/admin/')}}"><i class="fa fa-circle-o"> View Hub Sppech  </i> </a></li>
                <li><a href="{{url('/admin/add-hub-speech-info')}}"><i class="fa fa-circle-o"> Add Hub Sppech </i> </a></li>
              </ul>
            </li>
            <!-- <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Client  
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href=" {{url('/admin/')}}"><i class="fa fa-circle-o"> View Client </i> </a></li>
                <li><a href="{{url('/admin/add-client-info')}}"><i class="fa fa-circle-o"> Add Client</i> </a></li>
              </ul>
            </li> -->
           
           
            <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li> -->
          </ul>
        </li>
        <!-- End of HubMenu -->
         <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Page Federation</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li> -->
             <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i>Federation Advantage
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href=" {{url('/admin/')}}"><i class="fa fa-circle-o"> View Federation Advantage  </i> </a></li>
                <li><a href="{{url('/admin/add-federation-advantage-info')}}"><i class="fa fa-circle-o"> Add Federation Advantage</i> </a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Federation Facility 
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href=" {{url('/admin/')}}"><i class="fa fa-circle-o"> View Federation Facility</i> </a></li>
                <li><a href="{{url('/admin/add-federation-facility-info')}}"><i class="fa fa-circle-o"> Add Federation Facility</i> </a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Federation Sppech 
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href=" {{url('/admin/')}}"><i class="fa fa-circle-o"> View Federation Sppech  </i> </a></li>
                <li><a href="{{url('/admin/add-federation-speech-info')}}"><i class="fa fa-circle-o"> Add Federation Sppech </i> </a></li>
              </ul>
            </li>
            <!-- <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Client  
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href=" {{url('/admin/')}}"><i class="fa fa-circle-o"> View Client </i> </a></li>
                <li><a href="{{url('/admin/add-client-info')}}"><i class="fa fa-circle-o"> Add Client</i> </a></li>
              </ul>
            </li> -->
           
           
            <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li> -->
          </ul>
        </li>
        <!-- End of Federations -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span> Footer</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li> -->
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Address
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href=" {{url('/admin/')}}"><i class="fa fa-circle-o"> View Address </i> </a></li>
                <li><a href="{{url('/admin/add-address')}}"><i class="fa fa-circle-o">Add Address</i> </a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o">  About-Menu </i>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href=""><i class="fa fa-circle-o"></i> View About-Us</a></li>
                <li><a href="{{url('/admin/add-about-menu')}}"><i class="fa fa-circle-o"></i> Add About-Us</a></li>
                
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"> Lucum Menu</i>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href=""><i class="fa fa-circle-o"></i> View Lucum Menu</a></li>
                <li><a href="{{url('/admin/add-lucum-menu')}}"><i class="fa fa-circle-o"></i> Add Lucum Menu</a></li>
                
              </ul>
            </li>
             <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"> Practice Menu</i>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href=""><i class="fa fa-circle-o"></i> View Practice Menu</a></li>
                <li><a href="{{url('/admin/add-practice-menu')}}"><i class="fa fa-circle-o"></i> Add Practice Menu</a></li>
                
              </ul>
            </li>
            <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li> -->
          </ul>
        </li>
      
      
       <!--  <li><a href="{{url('user-cv/upload-cv')}}"><i class="fa fa-circle-o"></i> Upload CV</a></li> -->
       <!--  <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Practice</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
         
        </li> -->
           
        
       
      
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>