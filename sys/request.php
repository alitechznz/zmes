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
        Request Information
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Request</li>
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
            <div class="box-header with-border">
            <?php 
                // if(strpos($user_role['Permission'], 'ag_add') !== false) {  
                //   echo '<a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Register New Plan</a>';
                // }
            ?>
            </div>
               <div class="box-body">
              <table id="example" class="display" style="width:100%">
                <thead>
                  <th>Request ID</th>
                  <th>Request Type</th>
                  <th>Date Requested</th>
                  <th>Project</th>
                  <th>Respond status</th>
                  <th></th>
                </thead>
                <tbody>
                <?php 
                    include 'includes/conn.php';
                    $user_id = $_SESSION['user'];
                    $user_org = $_SESSION['user_org'];

                    $query = "SELECT * FROM project_request WHERE requested_by='$user_id' OR organization_id='$user_org'"; 
                    $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                    $num = 0;
                    while($row = mysqli_fetch_array($result)) {	
                        $num +=1;
                            echo "<tr>
                            <td>".$row['request_id']."</td>
                            <td>".$row['request_type']." Extension</td>
                            <td>".$row['requsted_date']."</td>
                            <td>".$row['project_id']."</td>
                            <td>";
                                if($row['requset_status'] == "Finished"){
                                   echo  "<span class='badge badge-success'>".$row['requset_status']."</span>";
                                } elseif($row['requset_status'] == "Active"){
                                  echo  "<span class='badge badge-primary'>".$row['requset_status']."</span>";
                                } elseif($row['requset_status'] == "Suspended"){
                                  echo  "<span class='badge badge-primary-light'>".$row['requset_status']."</span>";
                                }
                                echo "</td>";
                            if(strpos($user_role['Permission'], 'ag_edit') !== false || strpos($user_role['Permission'], 'ag_delete') !== false) {      
                              echo "<td>";
                                // if(strpos($user_role['Permission'], 'ag_edit') !== false) {
                                //     echo " <button class='btn btn-success btn-sm editagenda btn-flat' data-id=".$row['ID']."><i class='fa fa-edit'></i> Edit</button>";
                                // }
                                // if(strpos($user_role['Permission'], 'ag_delete') !== false) {
                                //   echo " <button class='btn btn-danger btn-sm deleteagenda btn-flat' data-id=".$row['ID']."><i class='fa fa-trash'></i> Delete</button>";
                                // }
                              
                                // if(strpos($user_role['Permission'], 'ag_add') !== false) {  
                                //   echo "&nbsp;<a href='theme.php?id=".$row['ID']."&xyz=".$row['Name']."' class='btn btn-primary btn-sm btn-flat'><i class='fa fa-pencil'></i> Theme</a>";
                                // }
                              echo    "</td>";
                            }
                        echo "
                        </tr>";
                    }
                     function me_decrypt_data($data_x){
                        $ciphering = "AES-128-CTR"; 
                        $options = 0; 
                        $decryption_iv = '1234567891011121'; 
                        $decryption_key = "ZPCME@ali@2020"; 
                        $decryption=openssl_decrypt ($data_x, $ciphering, 
                        $decryption_key, $options, $decryption_iv); 
                        return $decryption;
                    }            
                ?>
                                            
                 
                </tbody>
              </table>
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
            $('#example').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
        } );
   </script>
<script>
$(function(){
	$("body").on("click", ".editagenda", function(e){
//  $('.edit').click(function(e){
    e.preventDefault();
    $('#editagenda').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

$("body").on("click", ".deleteagenda", function(e){
 // $('.delete').click(function(e){
    e.preventDefault();
    $('#deleteagenda').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
  
  
  $("body").on("click", ".addtheme", function(e){
//  $('.edit').click(function(e){
    e.preventDefault();
    $('#addtheme').modal('show');
    var id = $(this).data('id');
    getRow_theme(id);
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
    url: 'agenda_row.php',
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


function getRow_theme(id){
	//alert('Hi ali');
	//alert(id);
  $.ajax({
    type: 'POST',
    url: 'agenda_row.php',
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
</body>
</html>
