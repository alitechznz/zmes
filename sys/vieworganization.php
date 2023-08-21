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
        VIEW ORGANIZATION
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Stakeholder</a></li>
        <li class="active">view organization</li>
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
              <!-- <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Add New Strategy</a> -->
            </div>
            <div class="box-body">
            <?php 
              include 'includes/conn.php'; 
              if(isset($_GET['id'])){
                $getid = $_GET['id'];
              } else {
                $getid = 0;
              }
               $name = '';
               $short = '';
               $phone = '';
               $address = '';
               $country ='';
               $type = '';
               $location = '';
               $email = '';
               $status = '';

                $query = "SELECT * FROM `organizationtb` WHERE `ID`='$getid'"; 
                $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                $num = 0;
                  if($row = mysqli_fetch_array($result)) {	
                    $name = $row['Name'];
                    $short = $row['ShortName'];
                    $phone = $row['Telephone'];
                    $address = $row['PostalAddress'];
                    $country =$row['LocationAddress'];
                    $type = $row['Type'];
                    $location = $row['LocationAddress'];
                    $email = $row['Email_org'];
                    $status = $row['Org_Status'];
                  }  
                                                    
            ?>  
                <div class="row">
                  <div class="col-md-12">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Institution Name:</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-building"></i>
                          </div>
                            <input type="text" name="name" class="form-control pull-right" placeholder="Enter Institution name..."  value="<?php echo $name; ?>" readonly/>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Short Tittle:</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-building"></i>
                          </div>
                          <input type="text" name="name" class="form-control pull-right" placeholder="Enter Institution name..."  value="<?php echo $short; ?>" readonly/>
                        </div>
                      </div>
                      <div class="form-group">
                          <label>Office Telephone :</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-building"></i>
                            </div>
                            <input type="text" class="form-control" placeholder="Enter Office Telephone..." name="telephone" value="<?php echo $phone; ?>"  readonly/>
                          </div>
                      </div>
                      <div class="form-group">
                        <label>Postal Address :</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-building"></i>
                          </div>
                          <input type="text" class="form-control" placeholder="Enter Postal Address..." name="postaladdress" value="<?php echo $address; ?>"  readonly/>
                        </div>
                      </div>                
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Type of Instituion :</label>
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter Postal Address..." name="postaladdress" value="<?php echo $type; ?>"  readonly/>                 
                          </div>
                      </div>
                      <div class="form-group">
                        <label>Office Email :</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-building"></i>
                          </div>
                          <input type="text" class="form-control" placeholder="Enter office email..." name="email" value="<?php echo $email; ?>"  readonly/>
                        </div>
                      </div>
                      <div class="form-group" id="NotshowCountry">
                        <label>Location Address :</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-building"></i>
                          </div>
                          <textarea row="5" type="text" class="form-control" placeholder="Location Address" name="address" value="<?php echo $location; ?>" readonly></textarea>
                        </div>
                      </div>
                      <div class="form-group" style="display:none;" id="showCountry">
                        <label>Country :</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-building"></i>
                          </div>
                          <textarea row="5" type="text" class="form-control" placeholder="Country" name="country" value="<?php echo $country; ?>" readonly></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Status :</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-building"></i>
                          </div>
                          <select class="form-control select2" name="status" id="status" readonly>
                          <?php 
                             if($status =='Active'){
                              echo '<option value="Active" selected>Active</option>
                                    <option value="Suspended">Suspended</option>
                                    <option value="Inactive">Inactive</option>';  
                             } else if($status =='Suspended') {
                              echo '<option value="Active" >Active</option>
                                    <option value="Suspended" selected>Suspended</option>
                                    <option value="Inactive">Inactive</option>';  
                             } else if($status =='Inactive') {
                              echo '<option value="Active" >Active</option>
                                    <option value="Suspended" >Suspended</option>
                                    <option value="Inactive" selected>Inactive</option>';  
                            }
                          ?>
                            
                                              
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
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
