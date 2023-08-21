 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo '../images/' . $user['ProfileImage']; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo  $user['Fullname']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
       <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
		    <?php 
			 
   if($user['Role'] == "Head") {
	     echo '<a href="../home.php">';
   } else {
	    echo '<a href="home.php">';
   }
  ?>
         
            <i class="active fa fa-dashboard"></i><span>Home</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
		 <li >
          <a href="index.php">
            <i class="fa fa-files-o"></i>
            <span>Sample</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
      
        </li>
		 <?php 
		    if($user['Role'] =='CustAnalyst') {
				echo '
		   <li >
          <a href="../custodian/receivedsample.php">
            <i class="fa fa-user-plus"></i>
            <span>Custodian Page</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          </li>'; 
       	}
		 ?>
		
		<li class="treeview">
          <a>
            <i class="fa fa-files-o"></i>
            <span>Report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
		  <ul class="treeview-menu">
                <li><a href="headreport.php"><i class="fa fa-circle-o"></i>Sample List</a></li>
				<li><a href="summary.php"><i class="fa fa-circle-o"></i>Summary Report</a></li>
             </ul>
        </li>
        
		  <!--li> 
	    <a href="../home.php">
            <i class="active fa fa-dashboard"></i><span>Calender</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
		<li> 
	    <a href="../home.php">
            <i class="active fa fa-dashboard"></i><span>Message</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li-->
	
		
		
		
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
        <!--END MENU SECTION -->