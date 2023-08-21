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
        PROGRAM|PROJECT BUDGET
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Budget</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <?php //include 'progress_mon.php'; ?>
      
        <?php 
            include 'includes/conn.php'; 
                $ptitle ="";
                $status ="";
                if(isset($_GET['id'])){
                  $getid = $_GET['id'];
                } else {
                  $getid = 0;
                }
                
                $query = "SELECT * FROM `projecttb` WHERE `ID`='$getid'"; 
                $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                $num = 0;
                if($row = mysqli_fetch_array($result)) {	
                   $ptitle =$row['pTitle'];
                   $status = $row['Status'];
                }  
                                                    
        ?>  
      <!-- ------->
    <div class="row">
        
    <script>
    
           $(function(){
               
               document.getElementById("months").disabled = false;
           });
           
           function radioControl(){
               if(document.getElementById('rannual').checked) { 
                   //alert("yes ali");
               }
           }
           
			function plannedfn() {
				var psmz = parseFloat(document.getElementById("psmz").value);
				var pwm = parseFloat(document.getElementById("pwm").value);
				
				var dsmz = parseFloat(document.getElementById("dsmz").value);
				var dwm = parseFloat(document.getElementById("dwm").value);
				
				// var ptotal = psmz + pwm;
				// document.getElementById("ptotal").value = ptotal;
				
				var dtotal = dsmz + dwm;
				document.getElementById("dtotal").value = dtotal;
				
				// var smz_per = parseInt((dsmz/psmz)*100);
				// var wm_per = parseInt((dwm/pwm)*100);
				// var over_per = parseInt((dtotal/ptotal)*100);
				
				// document.getElementById("totalsmz").value = smz_per;
				// document.getElementById("totalwm").value = wm_per;
				// document.getElementById("overtotal").value = over_per;
			}
			
		
	</script>
          <div class="col-xs-12">
		    	  <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab"><b>BUDGET PER MONTHY</b></a></li>
                  <!-- <li><a href="#tab_2" data-toggle="tab"><b>BUDGET PER PROJECT</b></a></li>
                  <li><a href="#tab_3" data-toggle="tab"><b>BUDGET PER ACTIVITY</b></a></li> -->
              </ul>
              <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                      <div class="row">
                        <form action="includes/controller.php" method="post">
                            <div class="col-md-12">
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label>Type:</label> &nbsp;	&nbsp;
                                    <label class="input-group">
                                      <input type="radio" name="type" id="rmonths" value="Months" class="flat-red"  checked>Months
                                      </label>
                                      <!--<label class="input-group">-->
                                      <!-- <input type="radio" name="type" id="rannual" value="Annual" class="flat-red" onclick="radioControl()">Annual-->
                                      <!--</label>-->
                                  </div>
                                </div>
                                
                                <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Bugdet Term :</label>
                                          <select class="form-control select2" style="width: 100%;" name="budgeterm" id="budgeterm" onchange="showproj_org(this.value)">
                                            <?php 
                                                      include 'includes/conn.php'; 
                                                          $query = "SELECT * FROM `budgetterm`"; 
                                                          $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                                          $num = 0;
                                                          echo '<option value="0">Select...</option>';
                                                          while($row = mysqli_fetch_array($result)) {	
                                                              echo '<option value="'.$row['Item'].'">'.$row['Item'].'</option>';
                                                          }  
                                                      
                                              ?>  
                                          </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                      <div class="form-group">
                                          <div class="input-group">
                                            <label>Organization|Institution :</label>
                                            <select class="form-control select2"  id="taasisilist" name="organization" onchange="showproject(this.value)">
                                            <?php 
                                                      include 'includes/conn.php'; 
                                                          $query = "SELECT * FROM `organizationtb`"; 
                                                          $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                                          $num = 0;
                                                          echo '<option value="0">Select...</option>';
                                                          while($row = mysqli_fetch_array($result)) {	
                                                              echo '<option value="'.$row['ID'].'">'.$row['Name'].'</option>';
                                                          }  
                                                      
                                              ?>  
                                          </select>
                                          </div>
                                    </div>
                                </div>
                              
                            </div>
                            <div class="col-md-12">
                              <div class="col-md-4">
                                      <div class="form-group">
                                          <div class="input-group">
                                            <label>Project :</label>
                                            <select class="form-control select2" style="width: 100%;" id="getprojectlist" name="project" onchange="showproj_activity(this.value)">
                                              <option value=" ">-- Select --</option>
                                            
                                            </select>
                                          </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                      <div class="form-group">
                                          <div class="input-group">
                                            <label>Project's Activity :</label>
                                            <select class="form-control select2" id="getactivity" name="activity" onchange="showproj_finance(this.value)"  required>
                                                <option value=" ">-- Select --</option>
                                              </select>
                                          </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Months</label> 
                                        <select class="form-control select2 col-md-6" style="width: 100%;" name="months" id="getmonths" onchange="showproj_finance(this.value)" >
                                                  <option value="January">January</option>
                                                  <option value="February">February</option>
                                                  <option value="March">March</option>
                                                  <option value="April">April</option>
                                                  <option value="May">May</option>
                                                  <option value="June">June</option>
                                                  <option value="July">July</option>
                                                  <option value="August">August</option>
                                                  <option value="September">September</option>
                                                  <option value="October">October</option>
                                                  <option value="November">November</option>
                                                  <option value="December">December</option>
                                          </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="get_project_budget">
                              
                            
                        </form>
                      </div><!-- /.row -->
                  </div>
                  <div class="tab-pane" id="tab_2">

                  </div>
              </div>
            </div>
		      </div>
	</div>	
	
      <!-- /.row -->
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/agenda_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- date-range-picker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>

<script>
$(function(){
    //Initialize Select2 Elements
    $('.select2').select2()
    //Date range picker
    $('#reservation').daterangepicker()

     //iCheck for checkbox and radio inputs
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

	$("body").on("click", ".editoutcome", function(e){
//  $('.edit').click(function(e){
    e.preventDefault();
    $('#editoutcome').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

$("body").on("click", ".deleteoutcome", function(e){
 // $('.delete').click(function(e){
    e.preventDefault();
    $('#deleteoutcome').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'outcome_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.outcomeid').val(response.ID);
      $('.outcome_name').html(response.Outcome);
      $('#edit_kraoutcome').val(response.KeyArea_ID);
      $('#edit_outname').val(response.AgendaID);
      $('#edit_outstatus').val(response.Status)
    }, 
    error:function(x,e) {
        if (x.status==0) {
            alert('You are offline!!\n Please Check Your Network.');
        } else if(x.status==404) {
            alert('Requested URL not found.');
        } else if(x.status==500) {
            alert('Internel Server Error.');
        } else if(e=='parsererror') {
            alert('Error.\nParsing JSON Request failed.');
        } else if(e=='timeout'){
            alert('Request Time out.');
        } else {
            alert('Unknow Error.\n'+x.responseText);
        }
    }
  });
}

function GetItemInBudget(str){
  alert(str);
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
               document.getElementById("taasisilist").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "getitem.php?budget=" + str, true);
        xmlhttp.send();
}
</script>
</body>
</html>
