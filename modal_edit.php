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
					<h3 class="page-title">Update <?php echo $_GET['type']; ?> </h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Update</li>
								<li class="breadcrumb-item active" aria-current="page"><?php echo $_GET['type']; ?></li>
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
                    <?php 
                       if(isset($_GET['type'])){
                            $ciphering = "AES-128-CTR"; 
                            $options = 0; 
                            $decryption_iv = '1234567891011121'; 
                            $decryption_key = "ZPCME@ali@2020"; 
                           if($_GET['type'] == "Agenda"){
                               include 'php/conn.php';
                               
                                $getID = $_GET['dataId'];
                                $query = "SELECT * FROM `agendatb` WHERE md5(ID)='$getID'"; 
                                $agenda_name ="";
                                $agenda_code ="";
                                $agenda_about ="";
                                $agenda_status = "";
                                $start_date = '';
                                $end_date = '';
                                
                                $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                while($row = mysqli_fetch_array($result)) {	
                                    $start_date  = $row['StartDate'];
                                    $end_date = $row['EndDate'];
                                    $agenda_name = openssl_decrypt ($row['Name'], $ciphering, 
                                        $decryption_key, $options, $decryption_iv);
                                    $agenda_code =openssl_decrypt ($row['Code'], $ciphering, 
                                        $decryption_key, $options, $decryption_iv);
                                    $agenda_about =openssl_decrypt ($row['Explaination'], $ciphering, 
                                        $decryption_key, $options, $decryption_iv);
                                    $agenda_status =openssl_decrypt ($row['Status'], $ciphering, 
                                        $decryption_key, $options, $decryption_iv);
                                    $getID = $row['ID'];
                                }
                                
                               
                               	echo '<div class="row">
                                       <div class="col-xl-12 col-12">
                                            <form class="form" method="POST" action="php/model.php" id="editagendaform">
                            				    <div class="modal-body">
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <input type="hidden" class="form-control" value="'.$getID.'" id="edit_agendaID" name="agendaID">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Agenda Name:</label>
                                                            <input type="text" class="form-control" value="'.$agenda_name.'" placeholder="Agenda Name" name="edit_agendaname" id="edit_agendaname"  required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Abbreviation Name|Code ID:</label>
                                                            <input type="text" class="form-control" value="'.$agenda_code.'" placeholder="Agenda code" name="edit_code" id="edit_code" required>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Start Date:</label>
                                                                    <input type="date" class="form-control"  value="'.$start_date.'" name="edit_startdate" id="edit_startdate" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Expected End Date:</label>
                                                                    <input type="date" class="form-control" value="'.$end_date.'" name="edit_enddate" id="edit_enddate" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                                  
                                                        <div class="form-group">
                                                            <label>About Agenda</label>
                                                            <textarea rows="5" class="form-control" value="'.$agenda_about.'" placeholder="About agenda" name="edit_about" id="edit_about">'.$agenda_about.'</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Status</label>
                                                            <select class="form-control" name="edit_status" id="edit_status" required>
                                                                <option value="'.$agenda_status.'">'.$agenda_status.'</option>
                                                                <option value="Active">Active</option>
                                                                <option value="Suspended">Suspended</option>
                                                                <option value="Finished">Finished</option>
                                                                          
                                                            </select>
                                                        </div>
                                                    </div>
                                                                <!-- /.box-body -->        
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary float-right" name="editagenda">Save changes</button>
                                                    <a href="agenda.php" class="btn btn-danger" data-dismiss="modal">Close</a>
                                                </div>
                                            </form>
                                         </div>
                                     </div>';
                           } elseif($_GET['type'] == "KRA"){
                           
                           } elseif($_GET['type'] == "Outcome"){
                               
                           } else {
                               
                           }
                       }
                    ?>

				
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
 
 <?php 
  include "php/modelpopup.php";
  include "footer.php"; 
 ?>