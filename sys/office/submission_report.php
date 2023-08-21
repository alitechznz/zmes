<?php include 'includes/session.php'; ?>
<?php include 'includes/header2.php'; ?>
<body class="hold-transition skin-blue sidebar-mini animsition site-navbar-small">
<div class="wrapper">


   <?php include 'includes/navbarhome.php'; ?>
  <?php include 'includes/office_menu.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        SUBMISSION REPORT 
        <small>#<?php echo $_GET['sample']; ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Report</a></li>
        <li class="active">Submission</li>
      </ol>
    </section>

    <!--div class="pad margin no-print">
      <div class="callout callout-info" style="margin-bottom: 0!important;">
        <h4><i class="fa fa-info"></i> Note:</h4>
        This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
      </div>
    </div-->

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
             <img src="header_1.png" />
            
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info" style="text-format: Times New Roman;">
        <div class="col-sm-12 invoice-col">
            <?php
                $get_ID = $_GET['sample'];
                $sql = "SELECT * FROM `sample_submit` WHERE SampleCode='$get_ID'";
                $query = $conn->query($sql);
                if($row = $query->fetch_assoc()){
            ?>
          <b>To:</b>&nbsp;<?php echo $row['HeadofLab']; ?>
        
            <p style="text-format: Times New Roman;">I, &nbsp;&nbsp;<?php echo $row['Officer']; ?>&nbsp;&nbsp; have this &nbsp;&nbsp; <?php echo $row['DateSubmission']; ?> &nbsp;&nbsp;received sample of the hereunder detailed product
               under powers vested in me under Section 103 of the Zanzibar Food, Drugs and Cosmetics Act No.2/ 2006 for further examination.</p>
            <strong>DETAILS OF THE SAMPLE</strong><br>
            <br />
            <strong>Sample code number: </strong>&nbsp; <?php echo $row['SampleCode']; ?><br>
            <strong>Common Name: </strong>&nbsp;<?php echo $row['CommonName']; ?><br>
            
         
        </div>
        <!-- /.col -->
       
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Quantity/Number</th>
              <th>Batch /Lot Number</th>
              <th>Man. Date </th>
              <th>Expiry Date</th>
             
            </tr>
            </thead>
            <tbody>
            <tr>
              <td><?php echo $row['Quantity']; ?></td>
              <td><?php echo $row['Batch']; ?></td>
              <td><?php echo $row['Mandate']; ?></td>
              <td><?php echo $row['Expirydate']; ?></td>
            </tr>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      
      <div class="row">
        <div class="col-xs-12 table-responsive">
            <p>I consider it necessary to be analyzed by Analyst with the following tests; </p>
           <table class="table table-striped">
            <thead>
             <tr>
              <th>S/N</th>
              <th>Test Requested</th>
             </tr>
            </thead>
            <tbody>
                <?php 
                   $get_ID = $_GET['sample'];
                   $sql1 = "SELECT * FROM `lab_testsrequested` WHERE SampleID='$get_ID'";
                   $query1 = $conn->query($sql1);
                   $num = 1;
                   while($row1 = $query1->fetch_assoc()){
                      echo  '<tr>
                                <td>'.$num.'</td>
                                <td>'.$row1['Tests'].'</td>
                            </tr>';
                             $num = $num + 1;
                   }
                ?>
           
           </tbody>
          </table>
            <p><b>Submission Date & time:</b>&nbsp;<?php echo $row['Submissiondate']; ?></p><br />
                <?php 
                   $get_ID = $_GET['sample'];
                   $sql11 = "SELECT * FROM `custodian` WHERE SampleCode='$get_ID'";
                   $query11 = $conn->query($sql11);
                   if($row11 = $query11->fetch_assoc()){
                      echo  '<p><b>Name of Custodian: </b>&nbsp;'.$row11['Custodian'].'</p>
                             <p><b>Receiving Date & Time:</b>&nbsp;'.$row11['DateIn'].'&nbsp;<span class="pull-right">Signature: &nbsp;....................</span></p><br />';
                   }
                ?>
               
        </div>
        <!-- /.col -->
        
      </div>
      <!-- /.row -->
      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-12">
          <p><strong>LABORATORY REMARKS</strong></p>
         
            <?php
                   $get_ID = $_GET['sample'];
                   $sql11 = "SELECT * FROM `lab_remark` WHERE SampleCode='$get_ID'";
                   $query11 = $conn->query($sql11);
                   if($row11 = $query11->fetch_assoc()){
                      echo  '<p>I&nbsp;'.$row11['ConditionStatus'].'&nbsp;to carry out tests specified above. </p>';
                        if($row11['ConditionStatus'] =="Reject") {
                           echo '<p>Reason(s) (in case of rejection):<br></p>
                                 <p>'.$row11['Reasons'].'</p>';
                        } 
                        echo '<p><strong>Name of Head of Laboratory Services:</strong>&nbsp;'.$row11['HeadName'].'&nbsp;<strong class="pull-center" style="margin-left: 15%;">Date: &nbsp;'.$row11['ReceivingDate'].'</strong> <span class="pull-right">Signature: &nbsp;....................</span></p>';
             ?>
        
            <?php
               }
            ?>
        </div>
        <!-- /.col -->
       <?php
                }
       ?>
      
      </div>
      <!-- /.row -->
      <div class="row">
           <hr>
        <!-- accepted payments column -->
        <div class="col-xs-12" style="text-align: center;">
             P.O.Box 3595, Mombasa Area, Changu Road, Zanzibar <br>
             Tel: +255 24 2233959, Website www.zfda.go.tz, <br >
               Email : info@zfda.go.tz
            
        </div>
     </div>

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="s_print.php?sample=<?php echo $get_ID; ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <!--button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
          </button-->
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  <!-- /.content-wrapper -->
 <footer class="main-footer no-print">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2018-2019 <a href="https://adminlte.io"> Zanzibar Food And Drug Agency</a>.</strong> All rights
    reserved.
  </footer>

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
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
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
            <a href="javascript:void(0)">
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
            <a href="javascript:void(0)">
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
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
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
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>
