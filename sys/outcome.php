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
        OUTCOME STATEMENT
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Outcome</li>
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
                if(strpos($user_role['Permission'], 'out_add') !== false) {  
                  echo '<a href="#addoutcome" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Add Outcome Statement</a>';
                }
              ?>
              
            </div>
               <div class="box-body">
              <table id="example" class="display nowrap" style="width:100%">
                <thead>
                    <th>S.N</th>
                    <th>KRA</th>
                    <th>Outcome Statement</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
                <?php 
                    include 'includes/conn.php';
                    $kra_details =" ";
                    $query = "SELECT * FROM `outcometype`"; 
                    $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                    $num = 0;
                      while($row = mysqli_fetch_array($result)) {	
                          $num +=1;
                           $id_get = $row['ID'];
                           $kra_id = $row['KeyArea_ID'];
                           $kra_details = $row['Outcome'];
                           $kra_status =$row['OutStatus'];
                           $query1 = "SELECT * FROM `keyarea` WHERE `IDNo`='$kra_id'";
                          $result1 = mysqli_query($conn, $query1);
                          if($row1 = mysqli_fetch_array($result1)) {
                               $kra_name =$row1['KeyArea'];
                          }
                         
                            echo "<tr>
                            <td>".$num."</td>
                            <td>".$kra_name."</td>
                            <td>".$kra_details."</td>
                            <td>
                                <span class='badge badge-success'>".$kra_status."</span>
                            </td>
                            <td>"; 
                            if(strpos($user_role['Permission'], 'out_edit') !== false){
                              echo " <button class='btn btn-success btn-sm editoutcome btn-flat' data-id=".$id_get."><i class='fa fa-edit'></i> Edit</button>";
                            }
                            if(strpos($user_role['Permission'], 'out_delete') !== false){
                               echo "<button class='btn btn-danger btn-sm deleteoutcome btn-flat' data-id=".$id_get."><i class='fa fa-trash'></i> Delete</button>";
                            }
                            
                        echo    
                            "</td>
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
</script>
</body>
</html>
