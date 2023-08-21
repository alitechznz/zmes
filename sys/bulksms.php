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
     Sms
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Sms</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
   
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
              
            <div class="box-header with-border">
             Setting Connection <font style="float:right"></font>
            </div>
               <div class="box-body">
                   <div class="container">
                       <div class="row">
                   <div class="col-sm-5">
                       <form method="POST" action="controller.php">
             <div class="form-group">
                    <label for="exampleInputEmail1">Api key</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Scret Code</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                         <div class="form-group">
                    <label for="exampleInputEmail1">Sender Name</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">URL Link</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <BR>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Connected/disconnected" readonly>
                </form>
                </div>
                   
            <form method="POST">
            <div class="col-sm-6">
              <div class="custom-control custom-radio">
                      <label>Type</label>
                      <br>
                        <label for="customCheckbox2" >Individual </label >  
                          <input class="custom-control-input" type="radio" id="customRadio2" name="customRadio" checked>
                          <label for="customCheckbox2" style="padding:4px" >Group </label>  <input class="custom-control-input" type="radio" id="customRadio2" name="customRadio" checked>
                        </div>
             <div class="form-group">
                        <label>Select User</label>
                        <select multiple class="form-control">
                          <option>option 1</option>
                          <option>option 2</option>
                          <option>option 3</option>
                          <option>option 4</option>
                          <option>option 5</option>
                        </select>
                      </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Sms</label>
                    <Textarea class="form-control"></Textarea>
                  </div>
                  <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </div>
                </form>
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
  <?php include 'includes/user_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
	$("body").on("click", ".edit", function(e){
//  $('.edit').click(function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

$("body").on("click", ".delete", function(e){
 // $('.delete').click(function(e){
    e.preventDefault();
    $('#delete').modal('show');
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
    url: 'user_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.empid').val(response.id);
      $('.employee_id').html(response.Fullname);
      //$('.del_employee_name').html(response.Fullname);
      $('#employee_name').html(response.Fullname);
      $('#edit_name').val(response.Fullname);
      $('#edit_address').val(response.Address);
      $('#edit_contact').val(response.PhoneNumber);
      $('#edit_position').val(response.Role)
      //$('#position_val').val(response.position_id).html(response.Status);
    //  $('#schedule_val').val(response.schedule_id).html(response.time_in+' - '+response.time_out);
    }
  });
}
</script>
</body>
</html>
