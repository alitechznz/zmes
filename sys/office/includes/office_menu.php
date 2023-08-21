 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
		 <div class="pull-left image">
		        <?php 
		           if($user['ProfileImage'] =="") {
		               echo  '<img src="../download.jfif" class="img-circle" alt="User Image">';
		           } else {
		               echo  '<img src="../images/'.$user['ProfileImage'].'" class="img-circle" alt="User Image">';
		           }
		        ?>
				 
		</div>
        <div class="pull-left info">
          <p><?php echo $user['Fullname']; ?></p>
          <a><i class="fa fa-circle text-success"></i> Online</a>
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
					  <a href="customer.php">
					   <i style="color:white" class="fa fa-file"></i>
						<span>Customer Info</span>
						<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					</li>
		 <li >
		 <?php 
		    if($user['Role'] =='Food') {
				echo '<a href="submit.php">
				       <i class="fa fa-user-plus"></i>
						<span>Sample</span>
						<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					</li> 
					<li>
					  <a href="submissionreport.php">
					   <i style="color:white" class="fa fa-file"></i>
						<span>Sample Submission</span>
						<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					</li>
					<li>
					  <a href="summary.php">
					   <i style="color:white" class="fa fa-file"></i>
						<span>Summary Report</span>
						<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					</li>';
					  
			} else {
				echo '<a href="drug.php">
				       <i class="fa fa-user-plus"></i>
						<span>Sample</span>
						<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					</li> 
					<li>
					  <a href="dsubmissionreport.php">
					   <i style="color:white" class="fa fa-file"></i>
						<span>Sample Submission</span>
						<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					</li>
					<li>
					  <a href="summary.php">
					   <i style="color:white" class="fa fa-file"></i>
						<span>Summary Report</span>
						<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					</li>';
			}
		 ?>
          
      
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
        <!--END MENU SECTION -->