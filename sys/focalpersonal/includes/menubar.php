<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../dist/img/<?php echo $user['ProfileImage']; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $user['Fullname']; ?></p>
          <a><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">REPORTS</li>
        <li class=""><a href="home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="header">OFFICERS</li>
		 <li><a href="user.php"><i class="fa fa-files-o"></i> <span>User Info</span></a></li>
		 <li><a href="mailbox.php"><i class="fa fa-files-o"></i> <span>MailBox</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
		   <ul class="treeview-menu">
		    <li><a href="driver.php"><i class="fa fa-circle-o"></i> </a></li>
            <li><a href="booking.php"><i class="fa fa-circle-o"></i> Booking</a></li>
		<!--
            <li><a href="employee.php"><i class="fa fa-circle-o"></i> Driver List</a></li>
            <li><a href="overtime.php"><i class="fa fa-circle-o"></i> Booking</a></li>
            <li><a href="cashadvance.php"><i class="fa fa-circle-o"></i> Cash Advance</a></li>
            <li><a href="schedule.php"><i class="fa fa-circle-o"></i> Schedules</a></li>
		-->
			
          </ul>
        </li>
        <!--li><a href="schedule_employee.php"><i class="fa fa-clock-o"></i> <span>Schedule</span></a></li-->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>