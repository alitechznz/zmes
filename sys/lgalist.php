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
      Projects List (LGAs)
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Projects List (LGAs)</li>
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
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab"><b>PROJECT</b></a></li>
                  <li><a href="#tab_2" data-toggle="tab"><b>PROGRAM</b></a></li>
                </ul>
			    <div class="tab-content">
			         <div class="tab-pane active" id="tab_1">
			              <div class="box">
                             <div class="box-body">
                              <table id="exampless"  class="display" style="width:100%">
                                <thead>
                                  <th>S.N</th>
                                  <th>Title</th>
                                  <th>Start Date</th>
                                  <th>End Date</th>
                                  <th>Progress</th>
                                  <th>Status</th>
                                  <th>Action</th>
                                </thead>
                                <tbody>
                               
                                <?php 
                                    include 'includes/conn.php';
                                    $groupid =$user['groupID'];
                                    //$query = "SELECT * FROM `projecttb` WHERE `Group_ID`='$groupid' AND `pType` ='Project'";
                                    $user_id = $_SESSION['user'];
                                    $user_org = $_SESSION['user_org'];
                                  if($user_role['Name']== "Focal Person"){
                                    $query = "SELECT * FROM projecttb, project_targetgroup WHERE projecttb.ID=project_targetgroup.Project AND project_targetgroup.Institution='$user_org' AND projecttb.pTypeGroup ='LGA'";
                                  } else {
                                    $query = "SELECT * FROM `projecttb` WHERE `pType` ='Project' AND projecttb.pTypeGroup ='LGA'";
                                  }
    
                                      
                                    $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                    $num = 0;
                                    while($row = mysqli_fetch_array($result)) {	
                                        $num +=1;
                                            echo "<tr>
                                            <td>".$num."</td>
                                            <td>".$row['pTitle']."</td>
                                            <td>".$row['StartDate']."</td>
                                            <td>".$row['EndDate']."</td>
                                             
                                              <td>";
                                                 if($row['Status'] == "IDENTIFICATION"){
                                                           echo  "<span class='label label-primary'>".$row['Status']."</span>";
                                                        } elseif($row['Status'] == "IMPLEMENTATION"){
                                                          echo  "<span class='label label-info'>".$row['Status']."</span>";
                                                        } elseif($row['Status'] == "COMPLETION"){
                                                          echo  "<span class='label label-success'>".$row['Status']."</span>";
                                                        }  elseif($row['Status'] == "CANCELLED"){
                                                            echo  "<span class='label label-danger'>".$row['Status']."</span>";
                                                        }
                                                            elseif($row['Status'] == "SUSPENDED"){
                                                            echo  "<span class='label label-warning'>".$row['Status']."</span>";
                                                        }
                                                        
                                                        if($row['Confirmation'] == "Appending"){
                                                             echo "<td><span class='label label-info'>".$row['Confirmation']."</span></td>";
                                                        } elseif($row['Confirmation'] == "Accepted"){
                                                            echo "<td><span class='label label-success'>".$row['Confirmation']."</span></td>";
                                                        } elseif($row['Confirmation'] == "Rejected"){
                                                            echo "<td><span class='label label-danger'>".$row['Confirmation']."</span></td>";
                                                        }
                                                   
                                            echo "
                                                  
                                                  <td>";
                                                     if(strpos($user_role['Permission'], 'group_head') !== false || $row['Submitted_ID'] == $user['id']) {
                                                         echo "<a href='editviewproject.php?xyz=".$row['ID']."'><button class='btn btn-info btn-sm editagenda btn-flat'><i class='fa fa-eye'></i> View|Edit</button></a>
                                                          <button class='btn btn-danger btn-sm delete_proj btn-flat' data-id=".$row['ID']."><i class='fa fa-trash'></i> Delete</button>
                                                         ";
                                                     } else {
                                                         echo "<a href='viewproject.php?xyz=".$row['ID']."'><button class='btn btn-info btn-sm editagenda btn-flat'><i class='fa fa-eye'></i> View|Edit</button></a>";
                                                     }
                                                     if(strpos($user_role['Permission'], 'group_head') !== false) {
                                                         echo "<button class='btn btn-success btn-sm confirm_proj btn-flat' data-id=".$row['ID']."><i class='fa fa-edit'></i> Confirm</button>";
                                                     } 
                                                   
                                                   echo "</td>
                                        </tr>";
                                    }
                                   
                                    ?>
                                                            
                                 
                                </tbody>
                              </table>
                            </div>
                          </div>
			         </div>
			         <div class="tab-pane" id="tab_2">
			             <div class="box">
                             <div class="box-body">
                              <table id="examples"  class="display" style="width:100%">
                                <thead>
                                  <th>S.N</th>
                                  <th>Title</th>
                                  <th>Start Date</th>
                                  <th>End Date</th>
                                  <th>Progress</th>
                                  <th>Status</th>
                                  <th>Action</th>
                                </thead>
                                <tbody>
                               
                                <?php 
                                    include 'includes/conn.php';
                                    $groupid =$user['groupID'];

                                    $user_id = $_SESSION['user'];
                                    $user_org = $_SESSION['user_org'];
                                    if($user_role['Name']== "Focal Person"){
                                      $query = "SELECT * FROM projecttb, project_targetgroup WHERE projecttb.ID=project_targetgroup.Project AND project_targetgroup.Institution='$user_org' AND projecttb.pType='Program' AND projecttb.pTypeGroup ='LGA'";
                                    } else {
                                      $query = "SELECT * FROM `projecttb` WHERE `pType` ='Program' AND projecttb.pTypeGroup ='LGA'";
                                    }
                                    //$query = "SELECT * FROM `projecttb` WHERE `Group_ID`='$groupid' AND `pType` ='Program'"; 
                                    // $query = "SELECT * FROM `projecttb` WHERE `pType` ='Program'"; 
                                    $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                    $num = 0;
                                    while($row = mysqli_fetch_array($result)) {	
                                        $num +=1;
                                            echo "<tr>
                                            <td>".$num."</td>
                                            <td>".$row['pTitle']."</td>
                                            <td>".$row['StartDate']."</td>
                                            <td>".$row['EndDate']."</td>
                                             
                                              <td>";
                                                 if($row['Status'] == "IDENTIFICATION"){
                                                           echo  "<span class='label label-primary'>".$row['Status']."</span>";
                                                        } elseif($row['Status'] == "IMPLEMENTATION"){
                                                          echo  "<span class='label label-info'>".$row['Status']."</span>";
                                                        } elseif($row['Status'] == "COMPLETION"){
                                                          echo  "<span class='label label-success'>".$row['Status']."</span>";
                                                        }  elseif($row['Status'] == "CANCELLED"){
                                                            echo  "<span class='label label-danger'>".$row['Status']."</span>";
                                                        }
                                                            elseif($row['Status'] == "SUSPENDED"){
                                                            echo  "<span class='label label-warning'>".$row['Status']."</span>";
                                                        }
                                                        
                                                        if($row['Confirmation'] == "Appending"){
                                                             echo "<td><span class='label label-info'>".$row['Confirmation']."</span></td>";
                                                        } elseif($row['Confirmation'] == "Accepted"){
                                                            echo "<td><span class='label label-success'>".$row['Confirmation']."</span></td>";
                                                        } elseif($row['Confirmation'] == "Rejected"){
                                                            echo "<td><span class='label label-danger'>".$row['Confirmation']."</span></td>";
                                                        }
                                                   
                                            echo "
                                                  
                                                  <td>";
                                                     if(strpos($user_role['Permission'], 'group_head') !== false || $row['Submitted_ID'] == $user['id']) {
                                                         echo "<a href='editviewproject.php?xyz=".$row['ID']."'><button class='btn btn-info btn-sm editagenda btn-flat'><i class='fa fa-eye'></i> View|Edit</button></a>
                                                          <button class='btn btn-danger btn-sm delete_proj btn-flat' data-id=".$row['ID']."><i class='fa fa-trash'></i> Delete</button>
                                                         ";
                                                     } else {
                                                         echo "<a href='viewproject.php?xyz=".$row['ID']."'><button class='btn btn-info btn-sm editagenda btn-flat'><i class='fa fa-eye'></i> View|Edit</button></a>";
                                                     }
                                                     if(strpos($user_role['Permission'], 'group_head') !== false) {
                                                         echo "<button class='btn btn-success btn-sm confirm_proj btn-flat' data-id=".$row['ID']."><i class='fa fa-edit'></i> Confirm</button>";
                                                     } 
                                                   
                                                   echo "</td>
                                        </tr>";
                                    }
                                   
                                    ?>
                                                            
                                 
                                </tbody>
                              </table>
                            </div>
                          </div>
			         </div>
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
    $('#examples').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );

    $('#exampless').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );
</script>





<script>

$(function(){
	$("body").on("click", ".delete_proj", function(e){
//  $('.edit').click(function(e){
    e.preventDefault();
    $('#delete_proj').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
  
  	$("body").on("click", ".confirm_proj", function(e){
//  $('.edit').click(function(e){
    e.preventDefault();
    $('#confirm_proj').modal('show');
    var id = $(this).data('id');
    getRow_confirm(id);
  });

});

function getRow(id){
	//alert('Hi ali');
	
  $.ajax({
    type: 'POST',
    url: 'project_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.projid').val(response.ID);
      $('.proj_name').html(response.pTitle);
      $('.del_proj_name').html(response.pTitle)
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


function getRow_confirm(id){
	//alert('Hi ali');
	
  $.ajax({
    type: 'POST',
    url: 'project_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.confid').val(response.ID);
      $('#edit_project').val(response.pTitle);
      
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
</body>
</html>
