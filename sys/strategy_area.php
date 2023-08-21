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
        Strategy Area Information
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Strategy Area</li>
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
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
            <?php 
                if(strpos($user_role['Permission'], 'ag_add') !== false) {  
                  echo '<a href="#addsarea" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Register New Strategy Area</a>';
                }
            ?>
            </div>
               <div class="box-body">
              <table id="example" class="display table-responsive" style="width:100%">
                <thead>
                  <th>S.N</th>
                  <th>Name</th>
                  <th>Category</th>
                  <th>Plan</th>
                  <th>Explaination</th>
                  <th>Status</th>
                  <?php 
                    if(strpos($user_role['Permission'], 'ag_edit') !== false || strpos($user_role['Permission'], 'ag_delete') !== false) {
                        echo '<th>Action</th>';
                    }
                  ?>
                  
                </thead>
                <tbody>
                <?php 
                    include 'includes/conn.php';
                    $query = "SELECT * FROM `strategy_area`, `agendatb` WHERE strategy_area.plan_id=agendatb.ID"; 
                    $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                    $num = 0;
                    while($row = mysqli_fetch_array($result)) {	
                        $num +=1;
                        $get_theme ="";
                        $get_id_theme = $row['theme'];
                        
                                $query1 = "SELECT * FROM themetb WHERE theme_id='$get_id_theme'"; 
                                $result1 = mysqli_query($conn, $query1) or die("Error : ".mysqli_error($conn));
                                if($row1 = mysqli_fetch_array($result1)){
                                    $get_theme =$row1['theme_name']; 
                                }
                            echo "<tr>
                            <td>".$num."</td>
                            <td>".$row['strategy_area_name']."</td>
                            <td>".ucfirst($row['goal_type'])."</td>
                            <td>".$row['Name']."</td>
                            <td>".$row['strategy_area_details']."</td>
                            <td>";
                                if($row['Status'] == "Finished"){
                                   echo  "<span class='badge badge-success'>".$row['Status']."</span>";
                                } elseif($row['Status'] == "Active"){
                                  echo  "<span class='badge badge-primary'>".$row['Status']."</span>";
                                } elseif($row['Status'] == "Suspended"){
                                  echo  "<span class='badge badge-primary-light'>".$row['Status']."</span>";
                                }
                              
                            echo "</td>";
                             if(strpos($user_role['Permission'], 'ag_edit') !== false || strpos($user_role['Permission'], 'ag_delete') !== false) {
                                echo "<td>";
                                if(strpos($user_role['Permission'], 'ag_edit') !== false) {
                                    echo " <button class='btn btn-success btn-sm editsarea btn-flat' data-id=".$row['strategy_area_id']."><i class='fa fa-edit'></i> Edit</button>";
                                }
                                if(strpos($user_role['Permission'], 'ag_delete') !== false) {
                                  echo " <button class='btn btn-danger btn-sm deletesarea btn-flat' data-id=".$row['strategy_area_id']."><i class='fa fa-trash'></i> Delete</button>";
                                }
                               echo "</td>";
                             }
                            echo    
                            "</tr>";
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
	$("body").on("click", ".editsarea", function(e){
//  $('.edit').click(function(e){
    e.preventDefault();
    $('#editsarea').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

$("body").on("click", ".deletesarea", function(e){
 // $('.delete').click(function(e){
    e.preventDefault();
    $('#deletesarea').modal('show');
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
    url: 'sarea_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.sagendaid').val(response.strategy_area_id);
      $('.sagenda_name').html(response.strategy_area_name);
      $('#sedit_agendaname').val(response.strategy_area_name);
      $('#sedit_about').val(response.strategy_area_details);
      $('#sedit_status').val(response.strategy_status)
      $('#scategory').val(response.plan_id)
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
