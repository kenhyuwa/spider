<?php

namespace Kenhyuwa\Spider\Html;

use BadMethodCallException;
use Illuminate\Support\HtmlString;

class Spider
{

    /**
     * The HTML builder instance.
     *
     * @var \Collective\Html\HtmlBuilder
     */
    protected $html;

    /**
     * Transform the string to an Html serializable object
     *
     * @param $html
     *
     * @return \Illuminate\Support\HtmlString
     */
    protected function toHtmlString($html)
    {
        return new HtmlString($html);
    }

    public function __call($method, $parameters)
    {
        try {
            return $this->componentCall($method, $parameters);
        } catch (BadMethodCallException $e) {
            //
        }

        try {
            return $this->macroCall($method, $parameters);
        } catch (BadMethodCallException $e) {
            //
        }

        throw new BadMethodCallException("Method {$method} does not exist.");
    }

    public function bodyOpen()
    {
    	return $this->toHtmlString('
    		<body class="hold-transition skin-blue sidebar-mini">
    			<div class="wrapper">');
    }

    public function bodyClose()
    {
    	return $this->toHtmlString('
    			</div>
    		</body>');
    }

    public function header($miniLogo = null, $userLogOn = null)
    {
    	if($miniLogo=='') {
    		$miniLogo = '<b>A</b>LT';
    	}else{
    		$miniLogo = $miniLogo;
    	}

    	if($userLogOn=='') {
    		$userLogOn = $this->userLogOn();
    	}else{
    		$userLogOn = $userLogOn;
    	}
    	return $this->toHtmlString('
    		<header class="main-header">

		        <!-- Logo -->
		        <a href="index2.html" class="logo">
		          <!-- mini logo for sidebar mini 50x50 pixels -->
		          <span class="logo-mini">'.$miniLogo.'</span>
		          <!-- logo for regular state and mobile devices -->
		          <span class="logo-lg"><b>Admin</b>LTE</span>
		        </a>

		        <!-- Header Navbar: style can be found in header.less -->
		        <nav class="navbar navbar-static-top" role="navigation">
		          <!-- Sidebar toggle button-->
		          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
		            <span class="sr-only">Toggle navigation</span>
		          </a>
		          <!-- Navbar Right Menu -->
		          <div class="navbar-custom-menu">
		            <ul class="nav navbar-nav">
		              <!-- Messages: style can be found in dropdown.less-->
		              <li class="dropdown messages-menu">
		                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
		                  <i class="fa fa-envelope-o"></i>
		                  <span class="label label-success">4</span>
		                </a>
		                <ul class="dropdown-menu">
		                  <li class="header">You have 4 messages</li>
		                  <li>
		                    <!-- inner menu: contains the actual data -->
		                    <ul class="menu">
		                      <li><!-- start message -->
		                        <a href="#">
		                          <div class="pull-left">
		                            <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
		                          </div>
		                          <h4>
		                            Support Team
		                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
		                          </h4>
		                          <p>Why not buy a new awesome theme?</p>
		                        </a>
		                      </li><!-- end message -->
		                      <li>
		                        <a href="#">
		                          <div class="pull-left">
		                            <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
		                          </div>
		                          <h4>
		                            AdminLTE Design Team
		                            <small><i class="fa fa-clock-o"></i> 2 hours</small>
		                          </h4>
		                          <p>Why not buy a new awesome theme?</p>
		                        </a>
		                      </li>
		                      <li>
		                        <a href="#">
		                          <div class="pull-left">
		                            <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
		                          </div>
		                          <h4>
		                            Developers
		                            <small><i class="fa fa-clock-o"></i> Today</small>
		                          </h4>
		                          <p>Why not buy a new awesome theme?</p>
		                        </a>
		                      </li>
		                      <li>
		                        <a href="#">
		                          <div class="pull-left">
		                            <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
		                          </div>
		                          <h4>
		                            Sales Department
		                            <small><i class="fa fa-clock-o"></i> Yesterday</small>
		                          </h4>
		                          <p>Why not buy a new awesome theme?</p>
		                        </a>
		                      </li>
		                      <li>
		                        <a href="#">
		                          <div class="pull-left">
		                            <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
		                          </div>
		                          <h4>
		                            Reviewers
		                            <small><i class="fa fa-clock-o"></i> 2 days</small>
		                          </h4>
		                          <p>Why not buy a new awesome theme?</p>
		                        </a>
		                      </li>
		                    </ul>
		                  </li>
		                  <li class="footer"><a href="#">See All Messages</a></li>
		                </ul>
		              </li>
		              <!-- Notifications: style can be found in dropdown.less -->
		              <li class="dropdown notifications-menu">
		                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
		                  <i class="fa fa-bell-o"></i>
		                  <span class="label label-warning">10</span>
		                </a>
		                <ul class="dropdown-menu">
		                  <li class="header">You have 10 notifications</li>
		                  <li>
		                    <!-- inner menu: contains the actual data -->
		                    <ul class="menu">
		                      <li>
		                        <a href="#">
		                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
		                        </a>
		                      </li>
		                      <li>
		                        <a href="#">
		                          <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the page and may cause design problems
		                        </a>
		                      </li>
		                      <li>
		                        <a href="#">
		                          <i class="fa fa-users text-red"></i> 5 new members joined
		                        </a>
		                      </li>
		                      <li>
		                        <a href="#">
		                          <i class="fa fa-shopping-cart text-green"></i> 25 sales made
		                        </a>
		                      </li>
		                      <li>
		                        <a href="#">
		                          <i class="fa fa-user text-red"></i> You changed your username
		                        </a>
		                      </li>
		                    </ul>
		                  </li>
		                  <li class="footer"><a href="#">View all</a></li>
		                </ul>
		              </li>
		              <!-- Tasks: style can be found in dropdown.less -->
		              <li class="dropdown tasks-menu">
		                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
		                  <i class="fa fa-flag-o"></i>
		                  <span class="label label-danger">9</span>
		                </a>
		                <ul class="dropdown-menu">
		                  <li class="header">You have 9 tasks</li>
		                  <li>
		                    <!-- inner menu: contains the actual data -->
		                    <ul class="menu">
		                      <li><!-- Task item -->
		                        <a href="#">
		                          <h3>
		                            Design some buttons
		                            <small class="pull-right">20%</small>
		                          </h3>
		                          <div class="progress xs">
		                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
		                              <span class="sr-only">20% Complete</span>
		                            </div>
		                          </div>
		                        </a>
		                      </li><!-- end task item -->
		                      <li><!-- Task item -->
		                        <a href="#">
		                          <h3>
		                            Create a nice theme
		                            <small class="pull-right">40%</small>
		                          </h3>
		                          <div class="progress xs">
		                            <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
		                              <span class="sr-only">40% Complete</span>
		                            </div>
		                          </div>
		                        </a>
		                      </li><!-- end task item -->
		                      <li><!-- Task item -->
		                        <a href="#">
		                          <h3>
		                            Some task I need to do
		                            <small class="pull-right">60%</small>
		                          </h3>
		                          <div class="progress xs">
		                            <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
		                              <span class="sr-only">60% Complete</span>
		                            </div>
		                          </div>
		                        </a>
		                      </li><!-- end task item -->
		                      <li><!-- Task item -->
		                        <a href="#">
		                          <h3>
		                            Make beautiful transitions
		                            <small class="pull-right">80%</small>
		                          </h3>
		                          <div class="progress xs">
		                            <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
		                              <span class="sr-only">80% Complete</span>
		                            </div>
		                          </div>
		                        </a>
		                      </li><!-- end task item -->
		                    </ul>
		                  </li>
		                  <li class="footer">
		                    <a href="#">View all tasks</a>
		                  </li>
		                </ul>
		              </li>
		              '.$userLogOn.'
		              <!-- Control Sidebar Toggle Button -->
		              <li>
		                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
		              </li>
		            </ul>
		          </div>

		        </nav>
		      </header>');
    }

    public function userLogOn($name = null, $urlProfile = null, $urlLogout = null, $userImage = null)
    {
    	if($name=='') {
    		$name = 'Wahyu dhira Ashandy';
    	}else{
    		$name = $name;
    	}
    	if($userImage=='') {
    		$userImage = 'https://s22.postimg.org/7g51o0iep/user2_160x160.jpg';
    	}else{
    		$userImage = $userImage;
    	}
    	if($urlProfile=='') {
    		$urlProfile = '#';
    	}else{
    		$urlProfile = $urlProfile;
    	}
    	if($urlLogout=='') {
    		$urlLogout = '#';
    	}else{
    		$urlLogout = $urlLogout;
    	}
    	return $this->toHtmlString('
    		<!-- User Account: style can be found in dropdown.less -->
		              <li class="dropdown user user-menu">
		                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
		                  <img src="'.$userImage.'" class="user-image" alt="User Image">
		                  <span class="hidden-xs">'.$name.'</span>
		                </a>
		                <ul class="dropdown-menu">
		                  <!-- User image -->
		                  <li class="user-header">
		                    <img src="'.$userImage.'" class="img-circle" alt="User Image">
		                    <p>
		                      '.$name.'
		                    </p>
		                  </li>
		                  <!-- Menu Footer-->
		                  <li class="user-footer">
		                    <div class="pull-left">
		                      <a href="'.$urlProfile.'" class="btn btn-default btn-flat">Profile</a>
		                    </div>
		                    <div class="pull-right">
		                      <a href="'.$urlLogout.'" class="btn btn-default btn-flat">Sign out</a>
		                    </div>
		                  </li>
		                </ul>
		              </li>');
    }

    public function sidebar($name = null, $userImage = null, $sidebar)
    {
    	if($name=='') {
    		$name = 'Wahyu dhira Ashandy';
    	}else{
    		$name = $name;
    	}
    	if($userImage=='') {
    		$userImage = 'https://s22.postimg.org/7g51o0iep/user2_160x160.jpg';
    	}else{
    		$userImage = $userImage;
    	}
    	return $this->toHtmlString('
    		<!-- Left side column. contains the logo and sidebar -->
		      <aside class="main-sidebar">
		        <!-- sidebar: style can be found in sidebar.less -->
		        <section class="sidebar">
		          <!-- Sidebar user panel -->
		          <div class="user-panel">
		            <div class="pull-left image">
		              <img src="'.$userImage.'" class="img-circle" alt="User Image">
		            </div>
		            <div class="pull-left info">
		              <p>'.$name.'</p>
		              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
		            </div>
		          </div>
		          <!-- search form -->
		          <form action="#" method="get" class="sidebar-form">
		            <div class="input-group">
		              <input type="text" name="q" class="form-control" placeholder="Search...">
		              <span class="input-group-btn">
		                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
		              </span>
		            </div>
		          </form>
		          <!-- /.search form -->
		          '.$sidebar.'
		        </section>
		        <!-- /.sidebar -->
		      </aside>');
    }

    public function footer()
    {
    	return $this->toHtmlString('
    		<footer class="main-footer">
		        <div class="pull-right hidden-xs">
		          <b>Version</b> 2.3.0
		        </div>
		        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
		    </footer>');
    }

    public function controlSidebar()
    {
    	return $this->toHtmlString('
    		<!-- Control Sidebar -->
		      <aside class="control-sidebar control-sidebar-dark">
		        <!-- Create the tabs -->
		        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
		          <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
		          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
		        </ul>
		        <!-- Tab panes -->
		        <div class="tab-content">
		          <!-- Home tab content -->
		          <div class="tab-pane" id="control-sidebar-home-tab">
		            <h3 class="control-sidebar-heading">Recent Activity</h3>
		            <ul class="control-sidebar-menu">
		              <li>
		                <a href="javascript::;">
		                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
		                  <div class="menu-info">
		                    <h4 class="control-sidebar-subheading">Langdon\'s Birthday</h4>
		                    <p>Will be 23 on April 24th</p>
		                  </div>
		                </a>
		              </li>
		              <li>
		                <a href="javascript::;">
		                  <i class="menu-icon fa fa-user bg-yellow"></i>
		                  <div class="menu-info">
		                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
		                    <p>New phone +1(800)555-1234</p>
		                  </div>
		                </a>
		              </li>
		              <li>
		                <a href="javascript::;">
		                  <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
		                  <div class="menu-info">
		                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
		                    <p>nora@example.com</p>
		                  </div>
		                </a>
		              </li>
		              <li>
		                <a href="javascript::;">
		                  <i class="menu-icon fa fa-file-code-o bg-green"></i>
		                  <div class="menu-info">
		                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
		                    <p>Execution time 5 seconds</p>
		                  </div>
		                </a>
		              </li>
		            </ul><!-- /.control-sidebar-menu -->

		            <h3 class="control-sidebar-heading">Tasks Progress</h3>
		            <ul class="control-sidebar-menu">
		              <li>
		                <a href="javascript::;">
		                  <h4 class="control-sidebar-subheading">
		                    Custom Template Design
		                    <span class="label label-danger pull-right">70%</span>
		                  </h4>
		                  <div class="progress progress-xxs">
		                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
		                  </div>
		                </a>
		              </li>
		              <li>
		                <a href="javascript::;">
		                  <h4 class="control-sidebar-subheading">
		                    Update Resume
		                    <span class="label label-success pull-right">95%</span>
		                  </h4>
		                  <div class="progress progress-xxs">
		                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
		                  </div>
		                </a>
		              </li>
		              <li>
		                <a href="javascript::;">
		                  <h4 class="control-sidebar-subheading">
		                    Laravel Integration
		                    <span class="label label-warning pull-right">50%</span>
		                  </h4>
		                  <div class="progress progress-xxs">
		                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
		                  </div>
		                </a>
		              </li>
		              <li>
		                <a href="javascript::;">
		                  <h4 class="control-sidebar-subheading">
		                    Back End Framework
		                    <span class="label label-primary pull-right">68%</span>
		                  </h4>
		                  <div class="progress progress-xxs">
		                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
		                  </div>
		                </a>
		              </li>
		            </ul><!-- /.control-sidebar-menu -->

		          </div><!-- /.tab-pane -->

		          <!-- Settings tab content -->
		          <div class="tab-pane" id="control-sidebar-settings-tab">
		            <form method="post">
		              <h3 class="control-sidebar-heading">General Settings</h3>
		              <div class="form-group">
		                <label class="control-sidebar-subheading">
		                  Report panel usage
		                  <input type="checkbox" class="pull-right" checked>
		                </label>
		                <p>
		                  Some information about this general settings option
		                </p>
		              </div><!-- /.form-group -->

		              <div class="form-group">
		                <label class="control-sidebar-subheading">
		                  Allow mail redirect
		                  <input type="checkbox" class="pull-right" checked>
		                </label>
		                <p>
		                  Other sets of options are available
		                </p>
		              </div><!-- /.form-group -->

		              <div class="form-group">
		                <label class="control-sidebar-subheading">
		                  Expose author name in posts
		                  <input type="checkbox" class="pull-right" checked>
		                </label>
		                <p>
		                  Allow the user to show his name in blog posts
		                </p>
		              </div><!-- /.form-group -->

		              <h3 class="control-sidebar-heading">Chat Settings</h3>

		              <div class="form-group">
		                <label class="control-sidebar-subheading">
		                  Show me as online
		                  <input type="checkbox" class="pull-right" checked>
		                </label>
		              </div><!-- /.form-group -->

		              <div class="form-group">
		                <label class="control-sidebar-subheading">
		                  Turn off notifications
		                  <input type="checkbox" class="pull-right">
		                </label>
		              </div><!-- /.form-group -->

		              <div class="form-group">
		                <label class="control-sidebar-subheading">
		                  Delete chat history
		                  <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
		                </label>
		              </div><!-- /.form-group -->
		            </form>
		          </div><!-- /.tab-pane -->
		        </div>
		      </aside><!-- /.control-sidebar -->
		      <!-- Add the sidebar\'s background. This div must be placed
		           immediately after the control sidebar -->
		      <div class="control-sidebar-bg"></div>');
    }
}


