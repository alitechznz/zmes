<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  	<?php include 'includes/navbar.php'; ?>
  	<?php include 'includes/head_menu.php'; ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../images/<?php echo $user['ProfileImage']; ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $user['Fullname']; ?></h3>

              <p class="text-muted text-center"><?php echo $user['Email']; ?></p>

             
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-phone margin-r-5"></i> Phone Number</strong>

              <p class="text-muted" style="padding-left:10%;">
               <?php echo $user['PhoneNumber']; ?>
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Organization</strong>

              <p class="text-muted" style="padding-left:4%;">
                <?php
                  include 'includes/conn.php';
$getid = $user['Organization'];
$query = "SELECT * FROM `organizationtb` WHERE `ID`='$getid'";
$result = mysqli_query($conn, $query) or die("Error : " . mysqli_error($conn));
$num = 0;
if($row = mysqli_fetch_array($result)) {
    echo $row['Name'];
} else {
    echo '';
}
?>
              </p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Position</strong>

              <p style="padding-left:10%;">
                <?php
  include 'includes/conn.php';
$getid = $user['Role'];
$query = "SELECT * FROM `roletb` WHERE `role_ID`='$getid'";
$result = mysqli_query($conn, $query) or die("Error : " . mysqli_error($conn));
$num = 0;
if($row = mysqli_fetch_array($result)) {
    echo $row['Name'];
} else {
    echo '';
}

?>
              </p>

              <hr>

             
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Profile</a></li>
             
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
			     <form class="form-horizontal" method="POST" action="profile_update.php?return=<?php echo basename($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
				   <h3> PROFILE IMAGE </h3>
                   <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo:</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo" required>
                    </div>
                </div>
                   <input type="hidden" id="userid" name="userid" value="<?php echo $user['id']; ?>" >
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> I agree to make change
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" name="image" class="btn btn-danger">Update</button>
                    </div>
                  </div>
                </form>
			    <hr />
                <form class="form-horizontal" method="POST" action="profile_update.php?return=<?php echo basename($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
				   <h3> SETTING </h3>
				    <input type="hidden" id="userid" name="userid" value="<?php echo $user['id']; ?>" >
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email<span style="color:red;"> *</span></label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Old Password<span style="color:red;"> *</span></label>

                    <div class="col-sm-10">
                      <input type="password" class="form-control" name ="password" id="password" placeholder="password" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label" >New Password</label>

                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="newpassword" placeholder="New password" name="curr_password" required>
                    </div>
                  </div>
				     <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label" >Repeat New Password</label>

                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="repnewpassword" placeholder="Repeat New password" name="repnewpassword" required>
                    </div>
                  </div>
                
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> I agree to make change
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" name="setting" class="btn btn-danger">Update</button>
                    </div>
                  </div>
                </form>
             
              </div>
             
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  	<?php include 'includes/footer.php'; ?>
</div>
<!-- ./wrapper -->

 <!-- jQuery 3 -->
<script src="../sys/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../sys/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../sys/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../sys/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../sys/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../sys/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../sys/dist/js/adminlte.min.js"></script>
     <!-- iCheck 1.0.1 -->
<!-- <script src="../plugins/iCheck/icheck.min.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<script>
         $(function () {
             $('#example1').DataTable();

             //iCheck for checkbox and radio inputs
            //  $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            //      checkboxClass: 'icheckbox_minimal-blue',
            //      radioClass: 'iradio_minimal-blue'
            //  })
            //  //Red color scheme for iCheck
            //  $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            //      checkboxClass: 'icheckbox_minimal-red',
            //      radioClass: 'iradio_minimal-red'
            //  })
            //  //Flat red color scheme for iCheck
            //  $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            //      checkboxClass: 'icheckbox_flat-green',
            //      radioClass: 'iradio_flat-green'
            //  })
         });
</script>
</body>
</html>
