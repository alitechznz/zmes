<?php 
    include "php/session_start.php";
    include "header.php"; 
?>
<body class="hold-transition light-skin sidebar-mini theme-primary">
	
<div class="wrapper">

  <?php 
     include "navigator.php"; 
     include "menu.php";
    ?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container">
      <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">New Agenda </h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">new</li>
								<li class="breadcrumb-item active" aria-current="page">Agenda</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>	  
		<!-- Main content -->
		<section class="content">
                <?php
                if(isset($_SESSION['error'])){
                    echo "
                                <div class='alert alert-danger alert-dismissable'>
                                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> 
                                    ".$_SESSION['error']."
                                </div>          
                            ";
                unset($_SESSION['error']);
                }
                if(isset($_SESSION['success'])){
                          echo "
                                    <div class='alert alert-success alert-dismissable'>
                                       <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> 
                                         ".$_SESSION['success']."
                                    </div>";
                unset($_SESSION['success']);
                }
            ?>
			<div class="row">
            <div class="col-12">
			  <div class="box box-default">
				<div class="box-body">
          <div class="row">
             <div class="col-lg-12 col-12">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".addagenda">
                    Add New Agenda
                </button>
              </div>
          </div><br />

					 <div class="row">
                     
                         <div class="col-xl-12 col-12">
                         <div class="table-responsive">
                                    <table id="example5" class="table table-bordered table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Agenda</th>
                                                <th>Explaination</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php 
                                                include 'php/conn.php';

                                                $query = "SELECT * FROM `agendatb`"; 
                                                $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                                $num = 0;
                                                  while($row = mysqli_fetch_array($result)) {	
                                                      $num +=1;
                                                    echo "<tr>
                                                            <td>".me_decrypt_data($row['Code'])."</td>
                                                            <td>".me_decrypt_data($row['Explaination'])."</td>
                                                            <td>".$row['StartDate']."</td>
                                                            <td>".$row['EndDate']."</td>
                                                            
                                                            <td>";
                                                                if(me_decrypt_data($row['Status']) =="Active"){
                                                                    echo "<span class='badge badge-primary-light'>".me_decrypt_data($row['Status'])."</span>";
                                                                } elseif(me_decrypt_data($row['Status']) =="Suspended"){
                                                                    echo "<span class='badge badge-warning-light'>".me_decrypt_data($row['Status'])."</span>";
                                                                } elseif(me_decrypt_data($row['Status']) =="Finished"){
                                                                    echo "<span class='badge badge-danger-light'>".me_decrypt_data($row['Status'])."</span>";
                                                                }
                                                                
                                                            echo "</td>
                                                            <td>
                                                                <a href='modal_edit.php?dataId=".md5($row['ID'])."&type=Agenda' class='btn btn-success btn-sm editagenda'><span class='icon-Write'><span class='path1'></span><span class='path2'></span>Edit</span></a>
                                                                <button class='btn btn-danger btn-sm deleteagenda' data-id='".$row['ID']."' ><span class='icon-Trash1'><span class='path1'></span>Delete</span></button>
                                                            </td>
                                                          </tr>
                                                        ";
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
                                        <tfoot>
                                            <tr>
                                                <th>Agenda</th>
                                                <th>Explaination</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                         </div>
                     </div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->
			</div>
			<!-- /.col -->

            
            
		</section>
		<!-- /.content -->
	  </div>
  </div>



<script>


$("body").on("click", ".deleteagenda", function(e){
    e.preventDefault();
    $('#agendadelete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

function getRow(id) {
  alert(id);
  var txt = 'agenda';
  $.ajax({
    type: 'POST',
    url: 'modal_row.php',
    //data: {id:id, agenda:txt},
    data: {id:id},
    dataType: 'text',
    success: function(response){
      alert('yes');
      try {
            var output = JSON.parse(data);
            alert(output);
        } catch (e) {
            alert("Output is not valid JSON: " + data);
        }
      $('.agenda_name').html(response.Name);
      $('.agendaID').val(response.Name);
      
     // $('#edit_agendaname').val(response.Name);
     // $('#edit_code').val(response.Code);
     // $('#edit_startdate').val(response.StartDate);
     // $('#edit_enddate').val(response.EndDate);
     // $('#edit_about').val(response.Explaination)
     // $('#edit_status').val(response.Status)
      //$('#position_val').val(response.position_id).html(response.Status);
    //  $('#schedule_val').val(response.schedule_id).html(response.time_in+' - '+response.time_out);
    },
      error: function (request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
    }
    
  });
}


  function AgendaFunction() {
    document.getElementById("agendaform").reset();
  }
  
</script>

 <?php 
  include "php/modelpopup.php";
  include "footer.php"; 
 ?>