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
    MONITORING REPORT
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Monitoring Report</li>
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
        <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
                <!-- <form class="form-horizontal" method="POST" action="includes/controller.php"> -->
                  <div class="col-md-12" style="background-color: #DCDCDC;">
                    <!-- <form action="" method="post"> -->
                      <div class="col-md-3">
                          <div class="form-group">
                              <label>Search by Budget term :</label>
                                <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-building"></i>
                                </div>
                              <select class="form-control select2" name="budgeterm" id="budgeterm" required>
                                                      <option value="">Select</option>
                                            <?php 
                                                  include 'includes/conn.php'; 
                                                  
                                                      $query = "SELECT * FROM `budgetterm`"; 
                                                      $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                                      $num = 0;
                                                      while($row = mysqli_fetch_array($result)) {	
                                                          echo '<option value="'.$row['Item'].'">'.$row['Item'].'</option>';
                                                      }  
                                                      
                                              ?>  
                                          </select>
                              </div>
                              <!-- /.input group -->       
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                              <label>Report Type :</label>
                                <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-building"></i>
                                </div>
                                <select class="form-control select2" name="report_type" id="report_type" required>
                                    <option value="">Select....</option>
                                    <option value="Q1">Quarter 1 (Q1)</option>
                                    <option value="Q2">Quarter 2 (Q2)</option>
                                    <option value="Q3">Quarter 3 (Q3)</option>
                                    <option value="Annual">Annualy Report</option>       
                                </select>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                                <label>Search by Organization :</label>
                                <div class="input-group">
                                        <div class="input-group-addon">
                                        <i class="fa fa-building"></i>
                                        </div>
                                        <select class="form-control select2" name="organization_mon" id="organization_mon">
                                                     
                                            <?php 
                                                  include 'includes/conn.php';
                                                  $user_id = $_SESSION['user'];
                                                  $user_org = $_SESSION['user_org'];
                                        
                                                  if($user_role['Name']=="Focal Person"){ 
                                                    $query = "SELECT * FROM `organizationtb` WHERE `ID`='$user_org'"; 
                                                    $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                                      $num = 0;
                                                      if($row = mysqli_fetch_array($result)) {	
                                                          echo '<option value="'.$row['ID'].'">'.$row['Name'].'</option>';
                                                      }  
                                                  } else {
                                                    echo '<option value="">Select</option>';
                                                    $query = "SELECT * FROM `organizationtb` WHERE `org_group`='Ministry' AND `Type`='Government'"; 
                                                    $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                                      $num = 0;
                                                      while($row = mysqli_fetch_array($result)) {	
                                                          echo '<option value="'.$row['ID'].'">'.$row['Name'].'</option>';
                                                      }  
                                                  }
                                                  
                                                      
                                                      
                                                      
                                              ?>  
                                          </select>
                                      </div>
                          </div>
                      </div>
                   

                        <div class="col-md-3">
                          <div class="form-group">
                            <div class="input-group" style="margin-top:22px;">
                              <button class="btn btn-primary btn-flat" onclick="monitorSearch()"><i class="fa fa-search"></i> Search</button>
                                <form action="redirect_report.php" method="get">
                                  <input type="hidden" id="get_monitor_type" name="report_type"/>
                                  <button type="submit" class="btn btn-danger btn-flat"><i class="fa fa-print"></i> Print</button> 
                                </form>
                            </div>
                          </div>
                        </div>
                     
                                                
                    <!-- </form> -->
                  </div>
                  <br />
                <!-- </form> -->
                 <!-- <div class="col-md-12">
                     <div class="col-md-2">
                         <div class="form-group">
                             <label>Action :</label>
                              <div class="input-group">
                                  <!-- <a href='viewprojectreport.php?id=".$row['ID']."'><button class='btn btn-info btn-sm'><i class='fa fa-print'></i> Print</button></a>
                                  <a href='viewprojectreport.php?id=".$row['ID']."'><button class='btn btn-primary btn-sm'><i class='fa fa-edit'></i> Export</button></a> -->
                              <!-- </div>
                        </div>
                     </div>
                    <div class="col-md-6">
                        
                    </div>
                     <div class="col-md-4">
                          <div class="form-group">
                            <label>Number of Result(s) :</label>
                              <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-building"></i>
                              </div>
                              <input type="text" class="form-control pull-right" readonly>
                            </div>
                            <!-- /.input group -->       
                        <!-- </div>
                     </div>
                    
                     
                 </div> --> 
            <div class="col-md-12" style="margin-top:50px;">
                <table id="example2s" class="table table-bordered table-hover display" style="width:100%">
                  <thead>
                    <th>S.N</th>
                    <th>Title</th>
                    <th>Date Submitted</th>
                    <th>Project Status</th>
                  </thead>
                  <tbody id="get_monitoring_report">
               
                     
                 
                  </tbody>
              </table></div>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/agenda_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>

<script>
  $(document).ready(function() {
    $('#example2s').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );

    // $('#exampless').DataTable( {
    //     dom: 'Bfrtip',
    //     buttons: [
    //         'copyHtml5',
    //         'excelHtml5',
    //         'csvHtml5',
    //         'pdfHtml5'
    //     ]
    // } );
} );

function monitorSearch(){
  var str_year = document.getElementById("budgeterm").value;
  var str_type = document.getElementById("report_type").value;
  var str_org = document.getElementById("organization_mon").value;
  
  document.getElementById("get_monitor_type").value = str_type;

      if (str_org == "") {
            document.getElementById("get_monitoring_report").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("get_monitoring_report").innerHTML = this.responseText;
                }
            };

            xmlhttp.open("GET","getmonitoringreport.php?str_year="+str_year+"&str_type="+str_type+"&str_org="+str_org,true);
            xmlhttp.send();
        }
}

function monitorPrint(){
  var str_year = document.getElementById("budgeterm").value;
  var str_type = document.getElementById("report_type").value;
  var str_org = document.getElementById("organization_mon").value;
   if(str_type =="Annual"){

   } else {

   }
}
</script>

<script>
$(function(){
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
      $('#edit_kraoutcome').val(response.IDNo);
      $('#edit_outstatement').val(response.Outcome);
      $('#edit_outstatus').val(response.OutStatus)
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

function ReportSearch(str) {
   
    var program = document.getElementById("program").value;
    var dateRange = document.getElementById("reservation").value;
    var budget = document.getElementById("budgeterm").value;
    // alert(str);
    // alert(program);
    // alert(budget);
    // alert(dateRange);

    var buffer_date = dateRange.split('-');
    var FromDate = buffer_date[0];
    var ToDate = buffer_date[1];
    // alert(FromDate);
    // alert(ToDate);

   if (str.length > 0) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("get_monitoring_report").innerHTML = this.responseText;
            }
        };
       
        xmlhttp.open("GET", "getmonitoringreport.php?from=" + FromDate +"&to="+ ToDate+"&type="+str+"&program="+program+"&budget="+budget, true);
        xmlhttp.send();
    }
    
}
</script>
</body>
</html>
