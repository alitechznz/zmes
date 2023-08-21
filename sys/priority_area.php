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
        Priority Area Information
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Priority Area</li>
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
                  echo '<a href="#addparea" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Register New Priority Area</a>';
                }
            ?>
            </div>
               <div class="box-body">
              <table id="example" class="display " style="width:100%">
                <thead>
                  <th>S.N</th>
                  <th>Priority Area</th>
                  <!--<th>Explaination</th>-->
                  <th>Strategy Area</th>
                  <th>Status</th>
                  <?php 
                    if(strpos($user_role['Permission'], 'priority_edit') !== false || strpos($user_role['Permission'], 'priority_delete') !== false) {
                        echo '<th>Action</th>';
                    }
                  ?>
                </thead>
                <tbody>
                <?php 
                    include 'includes/conn.php';
                    $query = "SELECT * FROM `priorityarea_goal`, `strategy_area` WHERE priorityarea_goal.strategy_area_id = strategy_area.strategy_area_id"; 
                    $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                    $num = 0;
                    while($row = mysqli_fetch_array($result)) {	
                        $num +=1;
                            echo "<tr>
                            <td>".$num."</td>
                            <td>".$row['priorityarea_goal_name']."</td>
                           
                            <td>".$row['strategy_area_name']."</td>
                            <td>";
                                if($row['priorityarea_goal_status'] == "Finished"){
                                   echo  "<span class='badge badge-success'>".$row['priorityarea_goal_status']."</span>";
                                } elseif($row['priorityarea_goal_status'] == "Active"){
                                  echo  "<span class='badge badge-primary'>".$row['priorityarea_goal_status']."</span>";
                                } elseif($row['priorityarea_goal_status'] == "Suspended"){
                                  echo  "<span class='badge badge-primary-light'>".$row['priorityarea_goal_status']."</span>";
                                }
                              
                            echo "</td>";
                            if(strpos($user_role['Permission'], 'priority_edit') !== false || strpos($user_role['Permission'], 'priority_delete') !== false) {
                              echo "<td>";
                              if(strpos($user_role['Permission'], 'priority_edit') !== false) {
                                  echo " <button class='btn btn-success btn-sm editparea btn-flat' data-id=".$row['priorityarea_goal_id']."><i class='fa fa-edit'></i> Edit</button>";
                              }
                              if(strpos($user_role['Permission'], 'priority_delete') !== false) {
                                echo " <button class='btn btn-danger btn-sm deleteparea btn-flat' data-id=".$row['priorityarea_goal_id']."><i class='fa fa-trash'></i> Delete</button>";
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
	$("body").on("click", ".editparea", function(e){
//  $('.edit').click(function(e){
    e.preventDefault();
    $('#editparea').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

$("body").on("click", ".deleteparea", function(e){
 // $('.delete').click(function(e){
    e.preventDefault();
    $('#deleteparea').modal('show');
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
    url: 'parea_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.pagendaid').val(response.priorityarea_goal_id);
      $('.pagenda_name').html(response.priorityarea_goal_name);
      $('#pedit_agendaname').val(response.priorityarea_goal_name);
      $('#pedit_about').val(response.priorityarea_goal_details);
      $('#pedit_status').val(response.priorityarea_goal_status)
      $('#strategy_area').val(response.strategy_area_id)
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
