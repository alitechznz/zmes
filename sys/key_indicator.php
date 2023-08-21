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
        KEY PERFORMANCE INDICATORS (KPI)
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Key Performance Indicators</li>
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
            <form class="form-horizontal" method="POST" action="kpi_print.php">
              <div class="box-header with-border">
                <?php 
                  if(strpos($user_role['Permission'], 'kra_add') !== false) {  
                    echo '<a href="#addkra" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Key Performance Indicators (KPI)</a>';
                  }
                  echo ' <button type="submit" class="btn btn-warning btn-sm btn-flat" name="kpilist"><i class="fa fa-print"></i> KPI List Report</button>';
                  // echo '<a href="kpi_print.php" data-toggle="modal" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-print"></i> KPI List Report</a>';
                ?>
                
              </div>
              <div class="box-body table-responsive">
                <table id="example" class="table table-bordered table-hover table-striped">
                  <thead>
                      <th><input type='checkbox' id='select-all' />&nbsp; All</th>
                      <th>S.N</th>
                      <th>Plan</th>
                      <th>KPI</th>
                      <th>Measurement Unit</th>
                      <th>Status</th>
                      <th>Action</th>
                  </thead>
                  <tbody>
                  <?php 
                      include 'includes/conn.php';
                      $query = "SELECT * FROM `keyarea`"; 
                      $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                      $num = 0;
                      while($row = mysqli_fetch_array($result)) {	
                          $id_get = $row['AgendaID'];
                          $kra_id = $row['IDNo'];
                          $kra = $row['KeyArea'];
                          $kra_about = $row['Comment'];
                          $kra_status = $row['Status'];
                          
                          $kpi_unit = $row['kpi_unit'];
                          $baseline = $row['baseline'];
                          $target  = $row['target']; 
                          
                          $measurement = '';
                          if($row['kpi_unit'] =='Quantity' and $row['kpi_unit'] ==NULL){
                            $measurement = 'Unit:'.$row['kpi_unit'].'-'.$row['kpi_unit_name'];
                          } else {
                            $measurement = 'Unit:'.$row['kpi_unit'].'-'.$row['kpi_unit_name'].', Numerator: '.$row['numerator'].', Denominator: '.$row['denominator'];
                          }

                          $query1 = "SELECT * FROM `agendatb` WHERE `ID`='$id_get'";
                          $result1 = mysqli_query($conn, $query1);
                          if($row1 = mysqli_fetch_array($result1)) {
                                $agenda =$row1['Code'];
                          }

                          $unit ="";
                          if($row['kpi_unit'] ==''){
                            $unit = 'Null';
                          } else {
                            $unit = $row['kpi_unit'];
                          }
                          $num +=1;
                              echo "<tr>
                              <td><input type='checkbox' name='select[]' value='".$kra_id."' /></td>
                              <td>".$num."</td>
                              <td>".$agenda."</td>
                              <td>".$kra."</td>
                              <td>".$unit."</td>
                              
                              <td>
                                  <span class='badge badge-success'>".$kra_status."</span>
                              </td>
                              <td>"; 
                                  if(strpos($user_role['Permission'], 'kra_edit') !== false){
                                    echo "<button class='btn btn-success btn-sm editkra btn-flat' data-id=".$row['IDNo']."><i class='fa fa-edit'></i> Edit</button>";
                                  }
                                  if(strpos($user_role['Permission'], 'kra_delete') !== false){
                                    echo "<button class='btn btn-danger btn-sm deletekra btn-flat' data-id=".$row['IDNo']."><i class='fa fa-trash'></i> Delete</button>";
                                  }
                                  if(strpos($user_role['Permission'], 'kra_add') !== false){
                                    echo "<a href='kpi_baseline.php?xyz=".$row['IDNo']."' class='btn btn-info btn-sm btn-flat'><i class='fa fa-edit'></i> KPI Details</a>";
                                  } 
                                    echo "<a href='kpi_more.php?xyz=".$row['IDNo']."' class='btn btn-info btn-sm btn-flat'><i class='fa fa-edit'></i>More...</a>";
                                
                                  if(strpos($user_role['Permission'], 'kra_print') !== false){
                                    echo "<a href='kpi_print.php?xyz=".$row['IDNo']."' class='btn btn-warning btn-sm  btn-flat' data-id=".$row['IDNo']."><i class='fa fa-print'></i> Print</a>";
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
            </form>
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
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                          columns: [0, 1, 2, 3, 4] // Exclude the last column (index 3)
                        }
                    },
                  {
                    extend: 'csvHtml5',
                    exportOptions: {
                      columns: [0, 1, 2, 3, 4] // Exclude the last column (index 3)
                    }
                  },
                  {
                    extend: 'excelHtml5',
                    exportOptions: {
                      columns: [0, 1, 2, 3, 4] // Exclude the last column (index 3)
                    }
                  }
                   
                ]

            } );
        } );

        function displayBlock(){
          var x = document.getElementById("myDIV");
          if (x.style.display === "none") {
            x.style.display = "block";
          } else {
            x.style.display = "none";
          }
        }

        $(document).ready(function() {
            $('#select-all').click(function() {
                var checked = this.checked;
                $('input[type="checkbox"]').each(function() {
                this.checked = checked;
            });
            })
        });
   </script>
<script>
$(function(){
	$("body").on("click", ".editkra", function(e){
//  $('.edit').click(function(e){
    e.preventDefault();
    $('#editkra').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
  
  $("body").on("click", ".addkra_baseline", function(e){
    e.preventDefault();
    $('#addkra_baseline').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

$("body").on("click", ".deletekra", function(e){
 // $('.delete').click(function(e){
    e.preventDefault();
    $('#deletekra').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

});

function getRow(id){
	//alert('Hi ali');
	//alert(id);
  $.ajax({
    type: 'POST',
    url: 'kra_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.kraid').val(response.IDNo);
      $('.kra_name').html(response.KeyArea);
      $('#edit_kraagenda').val(response.ID);
      $('#edit_strategy_kpi').val(response.goal);
      $('#edit_strategy_kpi').val(response.goal);
      
      $('#edit_kraname').val(response.KeyArea);
      $('#edit_kraabout').val(response.Comment);
      $('#edit_krastatus').val(response.Status);
      $('#edit_priorityarea').val(response.goal);
      
      $('#edit_kpi_name').val(response.KeyArea);
      $('#edit_kraabout').val(response.Comment);
      $('#edit_kpi_unit').val(response.kpi_unit);
      $('#edit_kpi_unit_name').val(response.kpi_unit_name);
      
      $('#edit_numerator').val(response.numerator);
      $('#edit_denominator').val(response.denominator);
      
      
      $('#edit_goal').val(response.goal)
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
