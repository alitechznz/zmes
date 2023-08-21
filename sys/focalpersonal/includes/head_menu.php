 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/<?php echo $user['ProfileImage']; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $user['Fullname']; ?></p>
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
        <li >
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Home</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
		 <li >
          <a href="user.php">
            <i class="fa fa-user-plus"></i>
            <span>System User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li> 
		<li>
          <a href="department.php">
            <i style="color:white" class="fa fa-university"></i>
            <span>Department</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
		
        <li class="treeview">
          <a href="#">
            <i style="color:yellow" class="fa fa-folder-o"></i>
            <span>Samples</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
		    <li><a href="Samplelist.php"><i class="fa fa-circle-o"></i>Sample List</a></li>
			<li><a href="laboratory_remark.php"><i class="fa fa-circle-o"></i>Laboratory Remark</a></li>
            <li><a href="sample_analysis.php"><i class="fa fa-circle-o"></i>Sample Analysis</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
           <i style="color:red" class="fa fa fa-medkit"></i>
            <span>Method/Specification</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
				<li><a href="add_method.php"><i class="fa fa-circle-o"></i> Add Method</a></li>
                <li><a href="add_reagent.php"><i class="fa fa-circle-o"></i> Add Reagent</a></li>
          </ul>
        </li>
       
       
         <li class="treeview">
          <a href="#">
           <i class="fa fa-flask"></i>
            <span>Matrials</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			 <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Equipments
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="add_sample.php"><i class="fa fa-circle-o"></i> Add Equipments</a></li>
				
              </ul>
            </li>
			
			
			<li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Reagent
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="reagent_type.php"><i class="fa fa-circle-o"></i> Add Reagent Type</a></li>
                <li><a href="add_reagent.php"><i class="fa fa-circle-o"></i> Add Reagent</a></li>
				
              </ul>
            </li>
			
			<li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Containers 
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="reagent_type.php"><i class="fa fa-circle-o"></i> Containers Designer</a></li>
                <li><a href="add_container.php"><i class="fa fa-circle-o"></i> Add Containers</a></li>
				
              </ul>
            </li>
			
			
			 
			<li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Friedge & Cabinet 
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="reagent_type.php"><i class="fa fa-circle-o"></i> Friedge Designer</a></li>
                <li><a href="add_fridge.php"><i class="fa fa-circle-o"></i> Add Friedge</a></li>
				
              </ul>
            </li>
			 
          </ul>
        </li>
		
		
        
       <li class="treeview">
          <a href="#">
           <i class="fa fa-thermometer-full"></i>
            <span>Result</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
         
        </li>
       
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
         
        </li>
        
		<li class="treeview">
          <a href="#">
           <i class="fa fa-phone-square"></i>
            <span>SMS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
         
        </li>
		
		<li class="treeview">
          <a href="#">
           <i class="fa fa-phone-square"></i>
            <span>Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
		
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
        <!--END MENU SECTION -->