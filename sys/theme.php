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
        <?php 
        $get_id =0;
            if(isset($_GET['xyz'])){
                $get_id = $_GET['id'];
                echo 'Theme Information: ('.$_GET['xyz'].')';
            } else {
                echo 'Theme Information';
            }
        ?>
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Theme</li>
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
        <div class="col-xs-4">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="modal-title"><b><span>Add New Theme</span></b></h4>
                </div>
            
                <div class="box-body">
                <form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="plan" name="plan" id="plan_id" value="<?php echo $get_id; ?>">
                    <div class="form-group">
                      	<label for="employee" class="col-sm-3 control-label">Theme Name</label>
                      	<div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Theme name" id="edit_agendaname" name="theme" required>
                      	</div>
                    </div>
                    <div class="form-group">
                        <label for="datepicker_add" class="col-sm-3 control-label">Theme Explaination</label>
                        <div class="col-sm-9"> 
                          <div class="date">
                            <textarea type="text" rows="5" class="form-control" placeholder="Theme explaination" name="details"></textarea>
                        </div>
                        </div>
                    </div>
          	
                  	<div class="modal-footer">
                    	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                    	<button type="submit" class="btn btn-success btn-flat" name="addtheme"><i class="fa fa-check-square-o"></i> Save</button>
            	    </div>
            	</form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
          <div class="box">
            <div class="box-header with-border">
           
            </div>
               <div class="box-body">
              <table id="example" class="display nowrap" style="width:100%">
                <thead>
                  <th>S.N</th>
                  <th>Theme</th>
                  <th>Action</th>
                </thead>
                <tbody>
                <?php 
                    include 'includes/conn.php';
                    $query = "SELECT * FROM `themetb` WHERE `page_name` = 'theme'"; 
                    $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                    $num = 0;
                    while($row = mysqli_fetch_array($result)) {	
                        $num +=1;
                            echo "<tr>
                            <td>".$num."</td>
                            <td>".$row['theme_name']."</td>
                            <td>";
                              if(strpos($user_role['Permission'], 'ag_delete') !== false) {
                                echo " <button class='btn btn-danger btn-sm deletetheme btn-flat' data-id=".$row['theme_id']."><i class='fa fa-trash'></i> Delete</button>";
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
	$("body").on("click", ".editagenda", function(e){
//  $('.edit').click(function(e){
    e.preventDefault();
    $('#editagenda').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

$("body").on("click", ".deletetheme", function(e){
 // $('.delete').click(function(e){
    e.preventDefault();
    $('#deletetheme').modal('show');
    var id = $(this).data('id');
    getRow_theme(id);
  });
  
  
  $("body").on("click", ".addtheme", function(e){
//  $('.edit').click(function(e){
    e.preventDefault();
    $('#addtheme').modal('show');
    var id = $(this).data('id');
    getRow_theme(id);
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
