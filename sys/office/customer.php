<?php include 'includes/session.php'; ?>
<?php include 'includes/header2.php'; ?>
<body class="hold-transition skin-blue sidebar-mini animsition site-navbar-small">
<div class="wrapper">

  <?php include 'includes/navbarhome.php'; ?>
  <?php include 'includes/office_menu.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        CUSTOMER REGISTRATION 
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Customer</li>
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
              <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New Customer</a>
            </div>
               <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				  <th>S/N</th>
                  <th> Name</th>
				  <th> Address</th>
                  <th> Phone Number</th>
                  <th> Date Registered</th>
                  <th> Status</th>
				  <th> Action</th>
                </tr>
                </thead>
               <tbody>
				 <?php
					require('includes/conn.php');
					$num = 0;
					$sql = "SELECT * FROM `customer` ORDER BY CustomerID DESC";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()) {
						 $num  +=1;
					?>
					 
					  
				<tr>
					<td><?php echo $num; ?></td>
                          <td><a href="viewcustomer.php?id="<?php echo $row['CustomerID']; ?>"><?php echo $row['Name']; ?></a></td>
                          <td><?php echo $row['Address']; ?></td>
                          <td><?php echo $row['PhoneNo']; ?></td>
						  <td><?php echo $row['DateRegistered']; ?></td>
						  <td><?php echo $row['Status']; ?></td>
						  
							  <td>
								<button class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $row['CustomerID']; ?>"><i class="fa fa-edit"></i> Edit</button>
								<button class="btn btn-danger btn-sm delete btn-flat" data-id="<?php echo $row['CustomerID']; ?>"><i class="fa fa-edit"></i> Delete</button>
							  
							  </td>
				</tr>
			<?php
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
  <?php include 'includes/customer_modal.php'; ?>
</div>
<?php include 'includes/script2.php'; ?>
<style>
a .disabled {
  pointer-events: none;
  cursor: not-allowed;
}
    
</style>
<script>

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

$(function(){
	$("body").on("click", ".edit", function(e){
  //$('.edit').click(function(e){
	//  alert(3);
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

$("body").on("click", ".delete", function(e){
 // $('.assign').click(function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

$("body").on("click", ".photo", function(e){
  //$('.photo').click(function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

});

function getRow(id){
   //alert(id);
  $.ajax({
    type: 'POST',
    url: 'customer_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.empid').val(response.CustomerID);
      $('#edit_name').val(response.Name);
      $('#edit_phone').val(response.PhoneNo);
      $('#edit_address').val(response.Address);
      $('#edit_status').val(response.Status);
    } 
	
  });
}
</script>
</body>
</html>
