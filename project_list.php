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
					<h3 class="page-title">Projects List </h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Project(s)</li>
								<li class="breadcrumb-item active" aria-current="page">List</li>
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
                    <br />

					 <div class="row">
                         <div class="col-xl-12 col-12">
                         <div class="table-responsive">
                                    <table id="example5" class="table table-bordered table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Project Name</th>
                                                <th>Code</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php 
                                                /*
                                                include 'php/conn.php';

                                                $query = "SELECT * FROM `projecttb`"; 
                                                $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                                $num = 0;
                                                  while($row = mysqli_fetch_array($result)) {	
                                                      $num +=1;
                                                    echo "<tr>
                                                            <td>".me_decrypt_data($row['Short title'])."</td>
                                                            <td>".me_decrypt_data($row['Code'])."</td>
                                                            <td><span class='badge badge-primary-light'>".me_decrypt_data($row['Code'])."</span></td>
                                                            <td>
                                                                <button class='btn btn-success btn-sm fl_proj_details' data-id=".$row['ID']." data-toggle='modal' data-target='.agendaedit'><span class='icon-Write'><span class='path1'></span><span class='path2'></span>Details</span></button>
                                                                <button class='btn btn-success btn-sm fl_proj_annual' data-id=".$row['ID']." data-toggle='modal' data-target='.agendaedit'><span class='icon-Write'><span class='path1'></span><span class='path2'></span></span>Annual</button>
                                                                <button class='btn btn-success btn-sm fl_proj_quarter' data-id=".$row['ID']." data-toggle='modal' data-target='.agendaedit'><span class='icon-Write'><span class='path1'></span><span class='path2'></span>Quarter</span></button>
                                                                <button class='btn btn-danger btn-sm fl_proj_track' data-id=".$row['ID']." data-toggle='modal' data-target='.agendadelete'><span class='icon-Trash1'><span class='path1'></span><span class='path2'></span>Resource</span></button>
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
                                                */
                                                 
                                             ?>
                                             <tr>
                                                 <td>Programu ya Ujenzi wa Afisi za Serikali  Zanzibar</td>
                                                 <td>ZPC-2019/20/04</td>
                                                 <td><span class='badge badge-primary-light'>Ongoing</span></td>
                                                 <td>
                                                    <button class='btn btn-success btn-sm fl_proj_details' data-id="1" data-toggle='modal' data-target='.details'><span class='icon-Write'><span class='path1'></span><span class='path2'></span>Details</span></button>
                                                    <button class='btn btn-warning btn-sm fl_proj_annual' data-id="1" data-toggle='modal' data-target='.annual'><span class='icon-Write'><span class='path1'></span><span class='path2'></span></span>Workplan</button>
                                                    <button class='btn btn-primary btn-sm fl_proj_quarter' data-id="1" data-toggle='modal' data-target='.quarter'><span class='icon-Write'><span class='path1'></span><span class='path2'></span>Budget</span></button>
                                                  
                                                 </td>
                                             </tr>
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Project Name</th>
                                                <th>Code</th>
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
  function AgendaFunction() {
   // document.getElementById("flprojectform").reset();
  }
</script>

 <?php 
  include "php/me_model.php";
  include "footer.php"; 
 ?>