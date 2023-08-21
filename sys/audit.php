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
        System Activities Information
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Audit</li>
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
            <!-- <div class="box-header with-border">
              <a href="#" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-print"></i> Print All</a>
              <a href="#" data-toggle="modal" class="btn btn-info btn-sm btn-flat"><i class="fa fa-file"></i> Export</a>
            </div> -->
               <div class="box-body">
              <table id="example" class="table table-bordered">
                <thead>
                  <th>S.N</th>
                  <th>User</th>
                  <th>Page</th>
                  <th>Activity</th>
                  <th>Device</th>
                  <th>IP Address</th>
                  <th>Date & Time</th>
                  <th>Action</th>
                </thead>
                <tbody>
                <?php 
                    include 'includes/conn.php';
                    $query = "SELECT * FROM audittb INNER JOIN userinfo ON audittb.CreatedBy = userinfo.id WHERE audittb.deleted_status=0 ORDER BY audittb.ID DESC"; 
                    $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                    $num = 0;
                    while($row = mysqli_fetch_array($result)) {	
                        $num +=1;
                            echo "<tr>
                            <td>".$num."</td>
                            <td>".$row['Fullname']."</td>
                            <td>".me_decrypt_data($row['Page'])."</td>
                            <td>".me_decrypt_data($row['Activity'])."</td>
                            <td>".me_decrypt_data($row['device'])."</td>
                            <td>".$row['ip_address']."</td>

                            <td>".$row['Created_on']."</td>";
                            
                            
                            echo "
                            <td>
                                
                                <button class='btn btn-danger btn-sm deleteagenda btn-flat' data-id=".$row['ID']."><i class='fa fa-print'></i> Print</button>
                            </td>
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
</script>
</body>
</html>
