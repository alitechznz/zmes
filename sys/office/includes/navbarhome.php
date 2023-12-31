<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>ZFDA</b>LIMS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>ZFDA</b>(LIMS)</span>
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
                        <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php 
		           if($user['ProfileImage'] =="") {
		               echo  '<img src="../download.jfif" class="user-image" alt="User Image">';
		           } else {
		               echo  '<img src="../images/'.$user['ProfileImage'].'" class="user-image" alt="User Image">';
		           }
		        ?>    
		       
              <span class="hidden-xs"><?php echo $user['Fullname']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                     <?php 
		           if($user['ProfileImage'] =="") {
		               echo  '<img src="../download.jfif" class="img-circle" alt="User Image">';
		           } else {
		               echo  '<img src="../images/'.$user['ProfileImage'].'" class="img-circle" alt="User Image">';
		           }
		        ?>
              

                <p>
                  <?php echo $user['Fullname']; ?>
                  <small>Member since <?php echo date('M. Y', strtotime($user['CreatedOn'])); ?></small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                    <a href="profile.php" class="btn btn-default btn-flat" id="admin_profile">Update</a>
                </div>
                <div class="pull-right">
                  <a href="../logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <?php include '../includes/profile_modal.php'; ?>