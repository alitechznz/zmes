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
          KPI Information
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"></li>
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
                    if(isset($_GET['xyz'])){
                        $get_id = $_GET['xyz'];
                    } else {
                        $get_id = 0;
                    }
                ?>
                <a href="kpi_print.php?xyz=<?php echo $get_id; ?>" data-toggle="modal" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-print"></i> KPI Details</a>
            </div>
              <div class="box-body table-responsive">
              <table id="examples" class="display table" style="width:100%">
                <thead>
                  <th>S.N</th>
                  <th>KPI</th>
                  <th>KPI Definition</th>
                  <th>Basline Name</th>
                  <th>Basline Year</th>
                  <th>Target Name</th>
                  <th>Target Year</th>
                  <th>Data Source</th>
                  <th>Frequency</th>
                  <th>Responsible Sector</th>
                </thead>
                <tbody>
                <?php 
                    include 'includes/conn.php';
                    	if(isset($_GET['xyz'])){
                            $get_id = $_GET['xyz'];
                		} else {
                		    $get_id = 0;
                		}
                		
                    $query = "SELECT * FROM kpi_baseline, keyarea WHERE kpi_baseline.kpi_id = keyarea.IDNo AND keyarea.IDNo='$get_id'"; 
                    $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                    $num = 0;
                    while($row = mysqli_fetch_array($result)) {	
                        $num +=1;
                        $SectorName ='';
                        $sector_temp = '';
                        $num_array = 0;
                        $array = explode(':', $row['sector']);

                        foreach ($array as $values) {
                          $query2 = "SELECT * FROM organizationtb WHERE ID = '$values'"; 
                          $result2 = mysqli_query($conn, $query2) or die("Error : ".mysqli_error($conn));
                          if($row2 = mysqli_fetch_array($result2)){
                            if($num_array == 0){
                              $SectorName = $row2['Name'];
                              $sector_temp = $SectorName;
                            } else {
                              
                              if($row2['Name'] != $sector_temp){
                                $sector_temp = $row2['Name'];
                                $SectorName = $SectorName.', '.$row2['Name'];
                              }
                              
                            }
                            $num_array +=1;
                          }
                          
                        }
                            echo "<tr>
                            <td>".$num."</td>
                            <td>".$row['KeyArea']."</td>
                            <td>".$row['kpi_definition']."</td>
                            <td>".$row['baseline_name']."</td>
                            <td>".$row['baseline_year']."</td>
                            <td>".$row['target_name']."</td>
                            <td>".$row['target_year']."</td>
                            <td>".$row['data_source']."</td>
                            <td>".$row['frequency']."</td>
                            <td>".$SectorName."</td>";
                             
                           echo "</tr>";
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
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                          columns: [0, 1, 2, 3, 4, 5, 6, 7, 8] // Exclude the last column (index 3)
                        }
                    },
                  {
                    extend: 'csvHtml5',
                    exportOptions: {
                      columns: [0, 1, 2, 3, 4, 5, 6, 7, 8] // Exclude the last column (index 3)
                    }
                  },
                  {
                    extend: 'excelHtml5',
                    exportOptions: {
                      columns: [0, 1, 2, 3, 4, 5, 6, 7, 8] // Exclude the last column (index 3)
                    }
                  }
                   
                ]
            } );
        } );
   </script>
<script>
$(function(){

$("body").on("click", ".deletebaseline", function(e){
    e.preventDefault();
    $('#deletebaseline').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
  
  
  $("body").on("click", ".updatebaseline", function(e){
    e.preventDefault();
    $('#updatebaseline').modal('show');
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

  $.ajax({
    type: 'POST',
    url: 'baseline_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.krabaselineid').val(response.kpi_baseline_id);
      $('.del_baseline_name').html(response.baseline_name);
      $('#base_kpi_id').val(response.kpi_id);
      $('#baseline_id').val(response.kpi_baseline_id);
      
    
      $('#base_id').val(response.kpi_baseline_id);
      $('#kpi_id_base').val(response.kpi_id);
      
      $('#baseline_name').val(response.baseline_name);
      $('#baseline_value').val(response.baseline);
      $('#baseline_unit').val(response.baseline_unit);
      $('#baseline_year').val(response.baseline_year);
      
      $('#target_name').val(response.target_name)
      $('#target_value').val(response.target);
      $('#target_unit').val(response.target_unit);
      $('#target_year').val(response.target_year);
  
      $('#edit_kpi_definition').val(response.target_name)
      $('#edit_data_source').val(response.data_source);
      $('#edit_frequency').val(response.frequency);
      $('#frequency_sector').val(response.sector);


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
  $.ajax({
    type: 'POST',
    url: 'theme_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.themeid').val(response.theme_id);
      $('.del_theme_name').html(response.theme_name);
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
