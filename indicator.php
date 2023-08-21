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
					<h3 class="page-title">Key Result Area (KRA)</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">new</li>
								<li class="breadcrumb-item active" aria-current="page">KRA</li>
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
                               		  
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".addindicator">
                                 Add New KRA
                            </button>
                                        
                        </div><!-- /.col -->
                    </div><br />
					         <div class="row">
                         <div class="col-xl-12 col-12">
                         <div class="table-responsive">
                                    <table id="example5" class="table table-bordered table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>S.N</th>
                                                <th>Agenda</th>
                                                <th>KRA</th>
                                                <th>Explaination</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php 
                                                include 'php/conn.php';

                                                $query = "SELECT * FROM `keyarea`"; 
                                                $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                                $num = 0;
                                                $id_get = 0;
                                                  while($row = mysqli_fetch_array($result)) {
                                                      $id_get = $row['AgendaID'];
                                                      $kra_id = $row['IDNo'];
                                                      $kra = $row['KeyArea'];
                                                      $kra_about = $row['Comment'];
                                                      $kra_status = $row['Status'];
                                                      $query1 = "SELECT * FROM `agendatb` WHERE `ID`='$id_get'";
                                                      $result1 = mysqli_query($conn, $query1);
                                                      if($row1 = mysqli_fetch_array($result1)) {
                                                            $agenda =$row1['Code'];
                                                      }
                                                      $num +=1;
                                                    echo "<tr>
                                                            <td>".$num."</td>
                                                            <td>".me_decrypt_data($agenda)."</td>
                                                            <td>".me_decrypt_data($kra)."</td>
                                                            <td>".me_decrypt_data($kra_about)."</td>
                                                            <td><span class='badge badge-primary-light'>".me_decrypt_data($kra_status)."</span></td>
                                                            <td>
                                                                <button class='btn btn-success btn-sm edit' data-id=".$kra_id." data-toggle='modal' data-target='.indicatoredit'><span class='icon-Write'><span class='path1'></span><span class='path2'></span>Edit</span></button>
                                                                <button class='btn btn-danger btn-sm delete' data-id=".$kra_id." data-toggle='modal' data-target='.indicatordelete'><span class='icon-Trash1'><span class='path1'></span><span class='path2'></span>Delete</span></button>
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
                                            <th>S.N</th>
                                                <th>Agenda</th>
                                                <th>KRA</th>
                                                <th>Explaination</th>
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
 

 <?php 
 include "php/modelpopup.php";
 include "footer.php"; 
 ?>