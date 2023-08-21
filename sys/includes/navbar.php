<header class="main-header" >
    <!-- Logo -->
    <a href="index2.html" class="logo"  style="background-color: #3f9f45; color: white;">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>M</b>E</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>ZMES</b>(SYSTEM)</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top"  style="background-color: #3f9f45; color: white;">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
		          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu"  style="background-color: #3f9f45; color: white;">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">0</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header"  style="background-color: #3f9f45; color: white;">You have 0 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li  style="background-color: #3f9f45; color: white;"><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="../images/<?php echo $user['ProfileImage']; ?>" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Proud of Zanzibar?</p>
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
                  if($user['ProfileImage'] != ''){
                      echo '<img src="../images/'.$user['ProfileImage'].'" class="user-image" alt="User Image">';
                  } else {
                       echo '<img src="../images/smz-trans.png" class="user-image" alt="User Image">';
                  }
                ?>
             
              <span class="hidden-xs"><?php echo $user['Fullname']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header"  style="background-color: #3f9f45; color: white;">
                <?php 
                  if($user['ProfileImage'] != ''){
                      echo '<img src="../images/'.$user['ProfileImage'].'" class="img-circle" alt="User Image">';
                  } else {
                       echo '<img src="../images/smz-trans.png" class="img-circle" alt="User Image">';
                  }
                ?>
               

                <p>
                  <?php echo $user['Fullname']; ?>
                  <small>Member since <?php echo date('M. Y', strtotime($user['CreatedOn'])); ?></small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profile.php" class="btn btn-default btn-flat" id="admin_profile"><strong>Update</strong></a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat"><strong>Sign out</strong></a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
