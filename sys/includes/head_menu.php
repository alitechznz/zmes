 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <!--<div class="user-panel">-->
      <!--  <div class="pull-left image">-->
      <!--    <img src="../images/<?php //echo $user['ProfileImage'];?>" class="img-circle" alt="User Image">-->
      <!--  </div>-->
      <!--  <div class="pull-left info">-->
      <!--    <p><?php //echo $user['Fullname'];?></p>-->
      <!--    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
      <!--  </div>-->
      <!--</div>-->
       <!-- search form -->
      <!--<form action="#" method="get" class="sidebar-form">-->
      <!--  <div class="input-group">-->
      <!--    <input type="text" name="q" class="form-control" placeholder="Search...">-->
      <!--    <span class="input-group-btn">-->
      <!--          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>-->
      <!--          </button>-->
      <!--        </span>-->
      <!--  </div>-->
      <!--</form>-->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
     
        <li >
          <a href="home.php">
            <i class="fa fa-dashboard"></i> <span>Home</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
	     <?php

         if($user_role['Permission'] =='') {
             $user_role['Permission'] ='audit_delete,audit_edit,audit_add,rep_visual,rep_budget_stake,rep_budget_proj,rep_kra,rep_quarter,rep_annual,rep_stake,rep_project,sms,budg_delete,budg_edit,budg_add,mon_monitor,mon_annual,mon_quarter,mon_resource,mon_kra,mon_workplan,proj_view,proj_delete,proj_edit,proj_add,conf_submit,conf_particular,conf_source,conf_term,stake_lstuser,stake_lstorg,stake_user,stake_org,role_edit,role_add,out_delete,out_edit,out_add,kra_delete,kra_edit,kra_add,ag_delete,ag_edit,ag_add,da_lg,da_pub,da_det,group_head,';
         }
            if(strpos($user_role['Permission'], 'da_det') !== false || strpos($user_role['Permission'], 'da_pub') != false || strpos($user_role['Permission'], 'da_lg') !== false) {
                echo '<li class="header">DASHBOARD MANAGEMENT</li>
                        <li>
                          <a href="medashboard.php">
                            <i style="color:white" class="fa fa-folder-o"></i>
                            <span>M&E Dashboard </span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                          </a>
                        </li>';
            }
            // if($user_role['Name']=='Focal Person' || $user_role['Name']=='FOCAL PERSON'){
            //       echo '<li class="header">CONFIGURATION</li>
            //             <li>
            //               <a href="institution.php">
            //                 <i style="color:white" class="fa fa-folder-o"></i>
            //                 <span>Institution </span>
            //                 <span class="pull-right-container">
            //                   <i class="fa fa-angle-left pull-right"></i>
            //                 </span>
            //               </a>
            //             </li>
            //             <li>
            //               <a href="inst_user.php">
            //                 <i style="color:white" class="fa fa-folder-o"></i>
            //                 <span>Institution User </span>
            //                 <span class="pull-right-container">
            //                   <i class="fa fa-angle-left pull-right"></i>
            //                 </span>
            //               </a>
            //             </li>';
            // }

             if(strpos($user_role['Permission'], 'ag_add') !== false || strpos($user_role['Permission'], 'ag_edit') !== false || strpos($user_role['Permission'], 'ag_delete') !== false || strpos($user_role['Permission'], 'ag_view') !== false
                 || strpos($user_role['Permission'], 'kra_add') !== false || strpos($user_role['Permission'], 'kra_edit') !== false || strpos($user_role['Permission'], 'kra_delete') !== false || strpos($user_role['Permission'], 'kra_view') !== false
                 || strpos($user_role['Permission'], 'asp_add') !== false || strpos($user_role['Permission'], 'asp_edit') !== false || strpos($user_role['Permission'], 'asp_delete') !== false || strpos($user_role['Permission'], 'asp_view') !== false
                 || strpos($user_role['Permission'], 'goal_add') !== false || strpos($user_role['Permission'], 'goal_edit') !== false || strpos($user_role['Permission'], 'goal_delete') !== false || strpos($user_role['Permission'], 'goal_view') !== false
                 || strpos($user_role['Permission'], 'priority_add') !== false || strpos($user_role['Permission'], 'priority_edit') !== false || strpos($user_role['Permission'], 'priority_delete') !== false || strpos($user_role['Permission'], 'priority_view') !== false
                 || strpos($user_role['Permission'], 'kra_add') !== false || strpos($user_role['Permission'], 'kra_edit') !== false || strpos($user_role['Permission'], 'kra_delete') !== false || strpos($user_role['Permission'], 'kra_view') !== false
                 || strpos($user_role['Permission'], 'role_add') !== false || strpos($user_role['Permission'], 'role_edit') !== false
                 || strpos($user_role['Permission'], 'stake_org') !== false || strpos($user_role['Permission'], 'stake_user') !== false || strpos($user_role['Permission'], 'stake_lstorg') !== false || strpos($user_role['Permission'], 'stake_lstuser') !== false
                 || strpos($user_role['Permission'], 'conf_term') !== false || strpos($user_role['Permission'], 'conf_source') !== false || strpos($user_role['Permission'], 'conf_particular') !== false || strpos($user_role['Permission'], 'conf_submit') !== false
             ) {
                 echo '<li class="header">MASTER CONFIGURATION</li>';
             }

            if(strpos($user_role['Permission'], 'ag_add') !== false || strpos($user_role['Permission'], 'ag_edit') !== false || strpos($user_role['Permission'], 'ag_delete') !== false || strpos($user_role['Permission'], 'ag_view') !== false) {
                echo '<li>
                          <a href="agenda.php">
                            <i style="color:white" class="fa fa-folder-o"></i>
                            <span>Plan</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                          </a>
                        </li>';
            }
             if(strpos($user_role['Permission'], 'asp_add') !== false || strpos($user_role['Permission'], 'asp_edit') !== false || strpos($user_role['Permission'], 'asp_delete') !== false || strpos($user_role['Permission'], 'asp_view') !== false) {
                 echo '<li>
                          <a href="aspiration.php">
                            <i style="color:white" class="fa fa-folder-o"></i>
                            <span>Aspiration</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                          </a>
                        </li>';
             }


            if(strpos($user_role['Permission'], 'goal_add') !== false || strpos($user_role['Permission'], 'goal_edit') !== false || strpos($user_role['Permission'], 'goal_delete') !== false || strpos($user_role['Permission'], 'goal_view') !== false) {
                echo '<li>
                        <a href="strategy_area.php">
                          <i style="color:white" class="fa fa-folder-o"></i>
                          <span>Strategy Area|Goal</span>
                          <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                          </span>
                        </a>
                      </li>';
            }
          if(strpos($user_role['Permission'], 'priority_add') !== false || strpos($user_role['Permission'], 'priority_edit') !== false || strpos($user_role['Permission'], 'priority_delete') !== false || strpos($user_role['Permission'], 'priority_view') !== false) {
              echo '<li>
                      <a href="priority_area.php">
                        <i style="color:white" class="fa fa-folder-o"></i>
                        <span>Priority Area</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a>
                    </li>';
          }
    //     if(strpos($user_role['Permission'], 'ag_add') !== false || strpos($user_role['Permission'], 'ag_edit') !== false || strpos($user_role['Permission'], 'ag_delete') !== false){
    //       echo '<li>
    //                 <a href="goal.php">
    //                   <i style="color:white" class="fa fa-folder-o"></i>
    //                   <span>Goal</span>
    //                   <span class="pull-right-container">
    //                     <i class="fa fa-angle-left pull-right"></i>
    //                   </span>
    //                 </a>
    //               </li>';
    //   }

            if(strpos($user_role['Permission'], 'kra_add') !== false || strpos($user_role['Permission'], 'kra_edit') !== false || strpos($user_role['Permission'], 'kra_delete') !== false || strpos($user_role['Permission'], 'kra_view') !== false) {
                echo ' <li>
                          <a href="key_indicator.php">
                            <i class="fa fa-folder-o"></i>
                            <span>KPI</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                          </a>
                        </li>';
            }


            // if(strpos($user_role['Permission'], 'out_add') !== false || strpos($user_role['Permission'], 'out_edit') !== false || strpos($user_role['Permission'], 'out_delete') !== false){
            //     echo ' <li>
            //               <a href="outcome.php">
            //                <i style="color:red" class="fa fa-folder-o"></i>
            //                 <span>KPI Outcome</span>
            //                 <span class="pull-right-container">
            //                   <i class="fa fa-angle-left pull-right"></i>
            //                 </span>
            //               </a>
            //             </li>';
            // }

            if(strpos($user_role['Permission'], 'role_add') !== false || strpos($user_role['Permission'], 'role_edit') !== false) {
                echo '<li>
                      <a href="permission.php">
                       <i class="fa fa-folder-o"></i>
                        <span>Role & Permission</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a>
                    </li>';
            }

            if(strpos($user_role['Permission'], 'stake_org') !== false || strpos($user_role['Permission'], 'stake_user') !== false || strpos($user_role['Permission'], 'stake_lstorg') !== false || strpos($user_role['Permission'], 'stake_lstuser') !== false) {
                echo ' <li>
                          <a href="stakeholder.php">
                           <i class="fa fa-folder-o"></i>
                            <span>User Management</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                          </a>
                        </li>';
            }


            if(strpos($user_role['Permission'], 'conf_term') !== false || strpos($user_role['Permission'], 'conf_source') !== false || strpos($user_role['Permission'], 'conf_particular') !== false || strpos($user_role['Permission'], 'conf_submit') !== false) {
                echo ' <li>
                          <a href="configuration.php">
                           <i class="fa fa-folder-o"></i>
                            <span>Others Configuration</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                          </a>
                        </li>';
            }

             if(strpos($user_role['Permission'], 'proj_add') !== false || strpos($user_role['Permission'], 'proj_edit') !== false || strpos($user_role['Permission'], 'proj_delete') !== false || strpos($user_role['Permission'], 'proj_view') !== false) {
                 echo '<li class="header">PROJECT MANAGEMENT</li>';
             }
             if(strpos($user_role['Permission'], 'proj_add') !== false) {
                 echo '<li class="nav-item">
                              <a href="program.php">
                               <i class="fa fa-folder-o"></i>
                                <span>Program|Project</span>
                                <span class="pull-right-container">
                                  <i class="fa fa-angle-left pull-right"></i>
                                </span>
                              </a>
                            </li>';

             }
            //   if(strpos($user_role['Permission'], 'proj_add') !== false || strpos($user_role['Permission'], 'proj_edit') !== false || strpos($user_role['Permission'], 'proj_delete') !== false) {
            //         echo '<li>
            //                   <a href="localproject.php">
            //                   <i class="fa fa-folder-o"></i>
            //                     <span>LGAs Project</span>
            //                     <span class="pull-right-container">
            //                       <i class="fa fa-angle-left pull-right"></i>
            //                     </span>
            //                   </a>
            //                 </li>';
            //  }
             if(strpos($user_role['Permission'], 'proj_view') !== false) {
                 echo '<li>
                              <a href="list.php">
                               <i class="fa fa-folder-o"></i>
                                <span>Project List</span>
                                <span class="pull-right-container">
                                  <i class="fa fa-angle-left pull-right"></i>
                                </span>
                              </a>
                            </li>';
             }
            //   if(strpos($user_role['Permission'], 'proj_view') !== false && $user_role['Name'] !=='Focal Person') {
            //         echo '<li>
            //                   <a href="lgalist.php">
            //                   <i class="fa fa-folder-o"></i>
            //                     <span>Project List (LGAs)</span>
            //                     <span class="pull-right-container">
            //                       <i class="fa fa-angle-left pull-right"></i>
            //                     </span>
            //                   </a>
            //                 </li>';
            //  }

             if(strpos($user_role['Permission'], 'mon_workplan') !== false || strpos($user_role['Permission'], 'mon_kra') !== false || strpos($user_role['Permission'], 'mon_resource') !== false || strpos($user_role['Permission'], 'mon_quarter') !== false|| strpos($user_role['Permission'], 'mon_annual') !== false || strpos($user_role['Permission'], 'mon_monitor') !== false) {
                 echo ' <li class="header">MONITORING MANAGEMENT </li>
                             <li>
                                  <a href="fplist.php">
                                   <i class="fa fa-folder-o"></i>
                                    <span>Monitoring</span>
                                    <span class="pull-right-container">
                                      <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                  </a>
                                </li>
                               ';
             }


             if(strpos($user_role['Permission'], 'budg_add') !== false || strpos($user_role['Permission'], 'budg_edit') !== false || strpos($user_role['Permission'], 'budg_delete') !== false) {
                 echo '  <li class="header">BUDGET MANAGEMENT </li>
                             <li>
                                  <a href="budget.php">
                                   <i class="fa fa-folder-o"></i>
                                    <span>Project Budget</span>
                                    <span class="pull-right-container">
                                      <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                  </a>
                                </li>
                                <li>
                                  <a href="budget_view.php">
                                   <i class="fa fa-folder-o"></i>
                                    <span>Project Budget List</span>
                                    <span class="pull-right-container">
                                      <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                  </a>
                                </li>';
             }
             if(strpos($user_role['Permission'], 'budg_view') !== false) {
                 echo '  <li class="header">BUDGET MANAGEMENT </li>
                          <li>
                            <a href="budget_view.php">
                             <i class="fa fa-folder-o"></i>
                              <span>Project Budget List</span>
                              <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                              </span>
                            </a>
                          </li>';
             }


              if(strpos($user_role['Permission'], 'rep_project') !== false || strpos($user_role['Permission'], 'rep_stake') !== false || strpos($user_role['Permission'], 'rep_annual') !== false || strpos($user_role['Permission'], 'rep_quarter') !== false ||
                 strpos($user_role['Permission'], 'rep_kra') !== false || strpos($user_role['Permission'], 'rep_budget_stake') !== false || strpos($user_role['Permission'], 'rep_budget_proj') !== false || strpos($user_role['Permission'], 'rep_visual') !== false) {
                  echo '   <li class="header">DATA VISUALIZATION </li>
                                 <li class="treeview">
                                  <a href="#">
                                    <i class="fa fa-files-o"></i>
                                    <span>Reports</span>
                                    <span class="pull-right-container">
                                      <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                  </a>
                        		  <ul class="treeview-menu">';
                  if(strpos($user_role['Permission'], 'rep_project') !== false) {
                      echo '<li><a href="programreport.php"><i class="fa fa-circle-o"></i> Program/Project Report</a></li>';
                  }
                  if(strpos($user_role['Permission'], 'rep_stake') !== false) {
                      echo '<li><a href="stakeholderreport.php"><i class="fa fa-circle-o"></i>Stackholders Report</a></li>';
                  }
                  if(strpos($user_role['Permission'], 'rep_annual') !== false) {
                      echo ' <li><a href="monitoringreport.php"><i class="fa fa-circle-o"></i>Monitoring Report</a></li>';
                  }
                  if(strpos($user_role['Permission'], 'rep_kra') !== false) {
                      echo '<li><a href="financereport.php"><i class="fa fa-circle-o"></i>Financial Report</a></li>';
                  }
                  /*
                        		  if(strpos($user_role['Permission'], 'rep_quarter') !== false ){
                        		      echo ' <li><a href="quarterreport.php"><i class="fa fa-circle-o"></i>Quarter Reports</a></li>';
                        		  }

                        		  if(strpos($user_role['Permission'], 'rep_budget_proj') !== false ){
                        		      echo '<li><a href="#"><i class="fa fa-circle-o"></i>Budget Per Program</a></li>';
                        		  }
                        		  if(strpos($user_role['Permission'], 'rep_budget_stake') !== false ){
                        		      echo '	<li><a href="#"><i class="fa fa-circle-o"></i>Budget Per Stakeholder</a></li>';
                        		  }
                        		  if(strpos($user_role['Permission'], 'rep_visual') !== false ){
                        		      echo '<li><a href="#"><i class="fa fa-circle-o"></i>Data Visualization</a></li>';
                        		  }
                        		  */
                  echo '   </ul>
                                </li>';
              }



      ?>
        <li class="header">OTHER MANAGEMENT </li>
        <li>
          <a href="request.php">
           <i class="fa fa-folder-o"></i>
            <span>Request List</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
        <li>
          <a href="approval.php">
           <i class="fa fa-folder-o"></i>
            <span>Respond List</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
        <?php
       if(strpos($user_role['Permission'], 'audit_add') !== false || strpos($user_role['Permission'], 'audit_edit') !== false || strpos($user_role['Permission'], 'audit_delete') !== false) {
           echo '   <li class="header">AUDIT MANAGEMENT </li>
                             <li>
                                  <a href="audit.php">
                                   <i class="fa fa-folder-o"></i>
                                    <span>System Audit</span>
                                    <span class="pull-right-container">
                                      <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                  </a>
                                </li>';
       }
      ?>
             
        <!-- <li >
          <a href="calendar.php">
            <i class="fa fa-folder-o"></i>
            <span>Calendar</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li> 
       <li>
          <a href="bulksms.php">
           <i class="fa fa-folder-o"></i>
            <span>Bulk SMS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li> -->
        
		<!--li class="treeview">
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
        </li-->
		
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
        <!--END MENU SECTION -->