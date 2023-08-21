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
         Monitoring
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Programm|Project</li>
      </ol>
      <p>(<?php echo $project_name; ?>)</p>
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
      <?php include 'progress_mon.php'; ?>
      
        <?php 
            include 'includes/conn.php'; 
                $ptitle ="";
                $status ="";
                $query = "SELECT * FROM `projecttb` WHERE `ID`='$getid'"; 
                $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                $num = 0;
                if($row = mysqli_fetch_array($result)) {	
                   $ptitle =$row['pTitle'];
                   $status = $row['Status'];
                }  
                                                    
        ?>  
      <!-- ------->
    <div class="row">
        <div class="col-xs-12">
         
		    <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab"><b>PLANNING</b></a></li>
                    <li><a href="#tab_2" data-toggle="tab"><b>IMPLEMENTATION</b></a></li>
                    <li><a href="#tab_3" data-toggle="tab"><b>RESULT</b></a></li>
                    <li><a href="#tab_4" data-toggle="tab"><b>CHALLENGES</b></a></li>
                    <li><a href="#tab_5" data-toggle="tab"><b>LESSON LEARNT & RECOMMENDATION</b></a></li>
                </ul>
			<div class="tab-content">
                <div class="tab-pane active" id="tab_1">
					<div class="row">
                      <form action="includes/controller.php" method="post">
                          <div class="col-md-12">
                              <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Bugdet Term :</label>
                                  </div>
                              </div>
                              <div class="col-md-7">
                                    <div class="form-group">
                                        <div class="input-group">
                                          <select class="form-control select2" style="width: 100%;">
                                           <?php 
                                                    include 'includes/conn.php'; 
                                                        $query = "SELECT * FROM `budgetterm`"; 
                                                        $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                                        $num = 0;
                                                        echo '<option value="0">Select...</option>';
                                                        while($row = mysqli_fetch_array($result)) {	
                                                            echo '<option value="'.$row['Item'].'">'.$row['Item'].'</option>';
                                                        }  
                                                    
                                            ?>  
                                        </select>
                                        </div>
                                  </div>
                              </div>
                             
                          </div>
                          <div class="col-md-12">
                              <div class="col-md-5">
                                    <div class="form-group">
                                        <label>P1: What are the result expected  to be achieved by your  project/programme :</label>
                                  </div>
                              </div>
                              <div class="col-md-7">
                                    <div class="form-group">
                                        <div class="input-group">
                                                
                                            <textarea type="text" class="form-control" cols="70" name="definition" placeholder="Enter result expected  to be achieved by your  project/programme....." ></textarea>
                                        </div>
                                  </div>
                              </div>
                             
                          </div>
                            <div class="col-md-12">
                              <div class="col-md-5">
                                    <div class="form-group">
                                        <label>P2: What are the activities planned for project intended to implement :</label>
                                  </div>
                              </div>
                              <div class="col-md-7">
                                    <div class="form-group">
                                        <div class="input-group">
                                                
                                            <textarea type="text" class="form-control" cols="70" name="definition" placeholder="Enter result expected  to be achieved by your  project/programme....." ></textarea>
                                        </div>
                                  </div>
                              </div>
                             
                          </div>
                      
                          <div class="col-md-12">
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                              <button type="submit" class="btn btn-primary btn-flat" name="addmonitoring_form_problem"><i class="fa fa-save"></i> Save</button>
                            </div>
                          </div>
                          
                       </form>
                    </div><!-- /.row -->
                    
                </div> <!-- /.tab-pane -->
                
                <div class="tab-pane" id="tab_2">
					 	<div class="row">
                      <form action="includes/controller.php" method="post">
                          <div class="col-md-12">
                              <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Bugdet Term :</label>
                                  </div>
                              </div>
                              <div class="col-md-7">
                                    <div class="form-group">
                                        <div class="input-group">
                                          <select class="form-control select2" style="width: 100%;">
                                           <?php 
                                                    include 'includes/conn.php'; 
                                                        $query = "SELECT * FROM `budgetterm`"; 
                                                        $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                                        $num = 0;
                                                        echo '<option value="0">Select...</option>';
                                                        while($row = mysqli_fetch_array($result)) {	
                                                            echo '<option value="'.$row['Item'].'">'.$row['Item'].'</option>';
                                                        }  
                                                    
                                            ?>  
                                        </select>
                                        </div>
                                  </div>
                              </div>
                             
                          </div>
                          <div class="col-md-12">
                              <div class="col-md-5">
                                    <div class="form-group">
                                        <label>I1: What is the actual implementation to date :</label>
                                  </div>
                              </div>
                              <div class="col-md-7">
                                    <div class="form-group">
                                        <div class="input-group">
                                                
                                            <textarea type="text" class="form-control" cols="70" name="definition" placeholder="Enter ........" ></textarea>
                                        </div>
                                  </div>
                              </div>
                             
                          </div>
                            <div class="col-md-12">
                              <div class="col-md-5">
                                    <div class="form-group">
                                        <label>I2: What activities have you planned to implement 2017/18 but you have not yet implemented</label>
                                  </div>
                              </div>
                              <div class="col-md-7">
                                    <div class="form-group">
                                        <div class="input-group">
                                                
                                            <textarea type="text" class="form-control" cols="70" name="definition" placeholder="Enter ........" ></textarea>
                                        </div>
                                  </div>
                              </div>
                             
                          </div>
                            <div class="col-md-12">
                              <div class="col-md-5">
                                    <div class="form-group">
                                        <label>I3: If not implemented Why?</label>
                                  </div>
                              </div>
                              <div class="col-md-7">
                                    <div class="form-group">
                                        <div class="input-group">
                                                
                                            <textarea type="text" class="form-control" cols="70" name="definition" placeholder="Enter ........" ></textarea>
                                        </div>
                                  </div>
                              </div>
                             
                          </div>
                        <div class="col-md-12">
                              <div class="col-md-5">
                                    <div class="form-group">
                                        <label>I4: Which activities that you have not planned to implement in 2017/18 but  they implemented </label>
                                  </div>
                              </div>
                              <div class="col-md-7">
                                    <div class="form-group">
                                        <div class="input-group">
                                                
                                            <textarea type="text" class="form-control" cols="70" name="definition" placeholder="Enter ........" ></textarea>
                                        </div>
                                  </div>
                              </div>
                             
                          </div>
                          <div class="col-md-12">
                              <div class="col-md-5">
                                    <div class="form-group">
                                        <label>I5: If   implemented Why? </label>
                                  </div>
                              </div>
                              <div class="col-md-7">
                                    <div class="form-group">
                                        <div class="input-group">
                                                
                                            <textarea type="text" class="form-control" cols="70" name="definition" placeholder="Enter ........" ></textarea>
                                        </div>
                                  </div>
                              </div>
                             
                          </div>
                          <div class="col-md-12">
                              <div class="col-md-5">
                                    <div class="form-group">
                                        <label>I6: What is the Strategic action undertaken to ensure the activities have you planned to implement 2017/ 18  but you have not yet to achieve the target </label>
                                  </div>
                              </div>
                              <div class="col-md-7">
                                    <div class="form-group">
                                        <div class="input-group">
                                                
                                            <textarea type="text" class="form-control" cols="70" name="definition" placeholder="Enter ........" ></textarea>
                                        </div>
                                  </div>
                              </div>
                             
                          </div>
                          <div class="col-md-12">
                              <div class="col-md-5">
                                    <div class="form-group">
                                        <label>I7: Does the implementation of project activities follow the timeframe outlined in the implementation plan?  </label>
                                  </div>
                              </div>
                              <div class="col-md-7">
                                    <div class="form-group">
                                        <div class="input-group">
                                                
                                            <textarea type="text" class="form-control" cols="70" name="definition" placeholder="Enter ........" ></textarea>
                                        </div>
                                  </div>
                              </div>
                             
                          </div>
                          <div class="col-md-12">
                              <div class="col-md-5">
                                    <div class="form-group">
                                        <label>I8:	If not why  </label>
                                  </div>
                              </div>
                              <div class="col-md-7">
                                    <div class="form-group">
                                        <div class="input-group">
                                                
                                            <textarea type="text" class="form-control" cols="70" name="definition" placeholder="Enter .........." ></textarea>
                                        </div>
                                  </div>
                              </div>
                             
                          </div>
                          <div class="col-md-12">
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                              <button type="submit" class="btn btn-primary btn-flat" name="addmonitoring_form_implement"><i class="fa fa-save"></i> Save</button>
                            </div>
                          </div>
                          
                       </form>
                    </div><!-- /.row -->
                  
                </div> <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_3">
					<div class="row">
                      <form action="includes/controller.php" method="post">
                          <div class="col-md-12">
                              <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Bugdet Term :</label>
                                  </div>
                              </div>
                              <div class="col-md-7">
                                    <div class="form-group">
                                        <div class="input-group">
                                          <select class="form-control select2" style="width: 100%;">
                                           <?php 
                                                    include 'includes/conn.php'; 
                                                        $query = "SELECT * FROM `budgetterm`"; 
                                                        $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                                        $num = 0;
                                                        echo '<option value="0">Select...</option>';
                                                        while($row = mysqli_fetch_array($result)) {	
                                                            echo '<option value="'.$row['Item'].'">'.$row['Item'].'</option>';
                                                        }  
                                                    
                                            ?>  
                                        </select>
                                        </div>
                                  </div>
                              </div>
                             
                          </div>
                          <div class="col-md-12">
                              <div class="col-md-5">
                                    <div class="form-group">
                                        <label>R1: Have the implemented activities led to the planned output(s) and outcomes? </label>
                                  </div>
                              </div>
                              <div class="col-md-7">
                                    <div class="form-group">
                                        <div class="input-group">
                                                
                                            <textarea type="text" class="form-control" cols="70" name="definition" placeholder="Enter ........" ></textarea>
                                        </div>
                                  </div>
                              </div>
                             
                          </div>
                            <div class="col-md-12">
                              <div class="col-md-5">
                                    <div class="form-group">
                                        <label>R2: If not why?</label>
                                  </div>
                              </div>
                              <div class="col-md-7">
                                    <div class="form-group">
                                        <div class="input-group">
                                                
                                            <textarea type="text" class="form-control" cols="70" name="definition" placeholder="Enter ........" ></textarea>
                                        </div>
                                  </div>
                              </div>
                             
                          </div>
                            <div class="col-md-12">
                              <div class="col-md-5">
                                    <div class="form-group">
                                        <label>R3: What outputs/results have been produced so far?</label>
                                  </div>
                              </div>
                              <div class="col-md-7">
                                    <div class="form-group">
                                        <div class="input-group">
                                                
                                            <textarea type="text" class="form-control" cols="70" name="definition" placeholder="Enter ........" ></textarea>
                                        </div>
                                  </div>
                              </div>
                             
                          </div>
                       
                          <div class="col-md-12">
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                              <button type="submit" class="btn btn-primary btn-flat" name="addmonitoring_form_result"><i class="fa fa-save"></i> Save</button>
                            </div>
                          </div>
                          
                       </form>
                    </div><!-- /.row -->
                </div> <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_4">
                    	<div class="row">
                      <form action="includes/controller.php" method="post">
                          <div class="col-md-12">
                              <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Bugdet Term :</label>
                                  </div>
                              </div>
                              <div class="col-md-7">
                                    <div class="form-group">
                                        <div class="input-group">
                                          <select class="form-control select2" style="width: 100%;">
                                           <?php 
                                                    include 'includes/conn.php'; 
                                                        $query = "SELECT * FROM `budgetterm`"; 
                                                        $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                                        $num = 0;
                                                        echo '<option value="0">Select...</option>';
                                                        while($row = mysqli_fetch_array($result)) {	
                                                            echo '<option value="'.$row['Item'].'">'.$row['Item'].'</option>';
                                                        }  
                                                    
                                            ?>  
                                        </select>
                                        </div>
                                  </div>
                              </div>
                             
                          </div>
                          <div class="col-md-12">
                              <div class="col-md-5">
                                    <div class="form-group">
                                        <label>C1: What challenges  faced during the implementation </label>
                                  </div>
                              </div>
                              <div class="col-md-7">
                                    <div class="form-group">
                                        <div class="input-group">
                                                
                                            <textarea type="text" class="form-control" cols="70" name="definition" placeholder="Enter ........" ></textarea>
                                        </div>
                                  </div>
                              </div>
                             
                          </div>
                            <div class="col-md-12">
                              <div class="col-md-5">
                                    <div class="form-group">
                                        <label>C2: Which measure did you take to overcome challenges</label>
                                  </div>
                              </div>
                              <div class="col-md-7">
                                    <div class="form-group">
                                        <div class="input-group">
                                                
                                            <textarea type="text" class="form-control" cols="70" name="definition" placeholder="Enter ........" ></textarea>
                                        </div>
                                  </div>
                              </div>
                             
                          </div>
                           
                       
                          <div class="col-md-12">
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                              <button type="submit" class="btn btn-primary btn-flat" name="addmonitoring_form_challenge"><i class="fa fa-save"></i> Save</button>
                            </div>
                          </div>
                          
                       </form>
                    </div><!-- /.row -->
                </div>
                <div class="tab-pane" id="tab_5">
                    <div class="row">
                      <form action="includes/controller.php" method="post">
                          <div class="col-md-12">
                              <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Bugdet Term :</label>
                                  </div>
                              </div>
                              <div class="col-md-7">
                                    <div class="form-group">
                                        <div class="input-group">
                                          <select class="form-control select2" style="width: 100%;">
                                           <?php 
                                                    include 'includes/conn.php'; 
                                                        $query = "SELECT * FROM `budgetterm`"; 
                                                        $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                                        $num = 0;
                                                        echo '<option value="0">Select...</option>';
                                                        while($row = mysqli_fetch_array($result)) {	
                                                            echo '<option value="'.$row['Item'].'">'.$row['Item'].'</option>';
                                                        }  
                                                    
                                            ?>  
                                        </select>
                                        </div>
                                  </div>
                              </div>
                             
                          </div>
                          <div class="col-md-12">
                              <div class="col-md-5">
                                    <div class="form-group">
                                        <label>L1: What were the Lessons Learnt during the implementation of the project/programme </label>
                                  </div>
                              </div>
                              <div class="col-md-7">
                                    <div class="form-group">
                                        <div class="input-group">
                                                
                                            <textarea type="text" class="form-control" cols="70" name="definition" placeholder="Enter ........" ></textarea>
                                        </div>
                                  </div>
                              </div>
                             
                          </div>
                            <div class="col-md-12">
                              <div class="col-md-5">
                                    <div class="form-group">
                                        <label>L2: What is your recommendation?</label>
                                  </div>
                              </div>
                              <div class="col-md-7">
                                    <div class="form-group">
                                        <div class="input-group">
                                                
                                            <textarea type="text" class="form-control" cols="70" name="definition" placeholder="Enter ........" ></textarea>
                                        </div>
                                  </div>
                              </div>
                             
                          </div>
                           
                       
                          <div class="col-md-12">
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                              <button type="submit" class="btn btn-primary btn-flat" name="addmonitoring_form_rec"><i class="fa fa-save"></i> Save</button>
                            </div>
                          </div>
                          
                       </form>
                    </div><!-- /.row -->
                </div>
              <!-- /.tab-pane -->
              <hr />
                       
            </div>
            </div>
		</div>
	</div>	
	
      <!-- /.row -->
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/agenda_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- date-range-picker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>

<script>
$(function(){
    //Initialize Select2 Elements
    $('.select2').select2()
    //Date range picker
    $('#reservation').daterangepicker()

     //iCheck for checkbox and radio inputs
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

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
      $('#edit_kraoutcome').val(response.KeyArea_ID);
      $('#edit_outname').val(response.AgendaID);
      $('#edit_outstatus').val(response.Status)
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
