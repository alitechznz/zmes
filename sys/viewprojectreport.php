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
      View Program Details
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Project List</li>
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
                   <a href="" class="btn btn-info btn-sm pull-right" onclick="printInfo('div_print');" style="margin-bottom: 5px"><i class="f fa-print"></i>Print</a>
                   
                <?php
                    if(isset($_GET['id'])){
                      $id = $_GET['id'];
                    } else {
                      $id = 0;
                    }
                      
                    include 'includes/conn.php';
                    $query = "SELECT * FROM `projecttb`where ID = $id"; 
                    $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                    $row = mysqli_fetch_array($result);
                    
                ?>
              <div id="div_print">
                  
                        <style>
        #tbl{
            width:100%;
            
        }
        #tbl tr{
            height:30px;
        }
        
        #tbl th{
            border:1px solid;
            border-color:#dddddd;
        }
        #tbl td{
            border:1px solid;
            border-color:#dddddd;
        }
      
      </style>
              
              <table id="tbl">
                <thead>
                <tr>
                <th colspan="9"><h4 align="center">Description</h4></th>
                </tr>
                <tr>
                  <th>Title</th>
                  <th>Code</th>
                  <th>Duration</th>
                  <th>Description</th>
                  <th>Agenda</th>
                  <th>Type</th>
                  <th>Start Date</th>
                  <th>Expected End Date</th>
                  <th>Status</th>
                 </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?php echo $row['pTitle']." ";$row['Short title'];?></td>
                    <td><?php echo $row['Code'];?></td>
                    <td><?php echo $row['Duration']." ".$row['Duration Unit']."(s)";?></td>
                    <td><?php echo $row['Description'];?></td>
                    <td><?php echo $row['AgendaID'];?></td>
                    <td><?php echo $row['pType'];?></td>
                    <td><?php echo $row['StartDate'];?></td>
                    <td><?php echo $row['EndDate'];?></td>
                    <td><?php echo $row['Status'];?></td>
                </tr>
                    
                </tbody>
                 </table>
    
              <?php
                    $query = "SELECT * FROM project_targetgroup, organizationtb where Institution = ID and Project = $id"; 
                    $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));

                    $num = mysqli_num_rows($result);
                    if($num == 0){
                        echo '<h3 align="center" style="margin-top:30px;">Implimenters</h3><center><font color="red">There is no Implimenter for this program</font></center>';
                    }else{
                    
                ?>
              
              <table id="tbl" style="margin-top:30px;">
                <thead>
                <tr>
                <th colspan="9"><h4 align="center">Implimenters</h4></th>
                </tr>
                  <th>S.N</th>
                  <th>Implimenter's Name</th>
                  <th>Type</th>
                  <th>Location</th>
                  <th>Map Location</th>
                  <th>Institution</th>
                  <th>Focal Person</th>
                  <th>ReportFrom</th>
                  <th>Report To</th>
                  </tr>
                </thead>
                <tbody>
                    
                <?php
                    $c = 1;

                    while($row = mysqli_fetch_array($result)){
                    
                ?>
                
                <tr>
                
                    <td><?php echo $c;?></td>
                    <td><?php echo $row['Target Group'];?></td>
                    <td><?php echo $row['Type'];?></td>
                    <td><?php echo $row['Location'];?></td>
                    <td><?php echo $row['Map Location'];?></td>
                    <td><?php echo $row['Name'];?></td>
                    <td><?php echo $row['FocalPerson'];?></td>
                    <td><?php echo $row['ReportFrom'];?></td>
                    <td><?php echo $row['ReportTo'];?></td>
                    
                
               
                </tr>
                <?php
                    $c++;
                    }
                ?>
                </tbody>
                 </table>
                 <?php
                    }
                ?>
                
                 <?php
                    $query = "SELECT * FROM project_financing where Project = $id"; 
                    $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));

                    $num = mysqli_num_rows($result);
                    if($num == 0){
                        echo '<h3 align="center" style="margin-top:30px;">Financing</h3><center><font color="red">There is no Finance for this program</font></center>';
                    }else{
                    
                ?>
              
              <table id="tbl" style="margin-top:30px;">
                <thead>
                <tr>
                <th colspan="8"><h4 align="center">Financing</h4></th>
                </tr>
                  <th>S.N</th>
                  <th>Financing's Name</th>
                  <th>Currency</th>
                  <th>Unit type</th>
                  <th>Total Amount</th>
                  <th>Disbursed</th>
                  <th>ReportFrom</th>
                  <th>Report To</th>
                  </tr>
                </thead>
                <tbody>
                    
                <?php
                    $c = 1;

                    while($row = mysqli_fetch_array($result)){
                    
                ?>
                
                <tr>
                
                    <td><?php echo $c;?></td>
                    <td><?php echo $row['Financing'];?></td>
                    <td><?php echo $row['Currency'];?></td>
                    <td><?php echo $row['Unittype'];?></td>
                    <td><?php echo $row['TotalAmount'];?></td>
                    <td><?php echo $row['Disbursed'];?></td>
                    <td><?php echo $row['ReportFrom'];?></td>
                    <td><?php echo $row['ReportTo'];?></td>
                    
                
               
                </tr>
                <?php
                    $c++;
                    }
                ?>
                </tbody>
                 </table>
                 <?php
                    }
                ?>
                
                
                                 <?php
                    $query = "SELECT * FROM project_activity where Project = $id"; 
                    $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));

                    $num = mysqli_num_rows($result);
                    if($num == 0){
                        echo '<h3 align="center" style="margin-top:30px;">Activity</h3><center><font color="red">There is no any Activity for this program</font></center>';
                    }else{
                    
                ?>
              
              <table id="tbl" style="margin-top:30px;">
                <thead>
                <tr>
                <th colspan="8"><h4 align="center">Activity</h4></th>
                </tr>
                  <th>S.N</th>
                  <th>Activity Name</th>
                  </tr>
                </thead>
                <tbody>
                    
                <?php
                    $c = 1;

                    while($row = mysqli_fetch_array($result)){
                    
                ?>
                
                <tr>
                
                    <td><?php echo $c;?></td>
                    <td><?php echo $row['Activity'];?></td>
                    
                
               
                </tr>
                <?php
                    $c++;
                    }
                ?>
                </tbody>
                 </table>
                 <?php
                    }
                ?>
              
              
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
 <?php include 'includes/list_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
	$("body").on("click", ".editagenda", function(e){
//  $('.edit').click(function(e){
    e.preventDefault();
    $('#editagenda').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

$("body").on("click", ".reports", function(e){
 // $('.delete').click(function(e){
    e.preventDefault();
    $('#reports').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

$("body").on("click", ".photo", function(e){
 // $('.photo').click(function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

});

function getRow(id){
	//alert('Hi ali');
	//alert(id);
  $.ajax({
    type: 'POST',
    url: '',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.agendaid').val(response.ID);
      $('.agenda_name').html(response.Name);
      $('#edit_code').val(response.Code);
      $('#edit_agendaname').val(response.Name);
      $('#edit_startdate').val(response.StartDate);
      $('#edit_enddate').val(response.EndDate);
      $('#edit_about').val(response.Explaination);
      $('#edit_status').val(response.Status)
      //$('#position_val').val(response.position_id).html(response.Status);
    //  $('#schedule_val').val(response.schedule_id).html(response.time_in+' - '+response.time_out);
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
</script>
<script>
    function printInfo(div_print) {
     var printContents = document.getElementById(div_print).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
    }
</script>
</body>
</html>
