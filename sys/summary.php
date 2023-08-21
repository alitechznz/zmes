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
        Summary Report
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Summary Report</li>
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
           
             <div class="box-body">
			     <div class="input-group" style="margin-left: 30%;">
				 
                   <div class="input-group">
				  <a  class="btn btn-danger btn-sm btn-flat" onclick="printsummary()"><i class="fa fa-print"></i> Print</a>&nbsp;
                  <input type="button" class="btn btn-default pull-right" id="daterange-btn" onchange="DateSearch(this.value)">
                    <span>
                      <i class="fa fa-calendar"></i> Search by Date Range &nbsp;
                    </span>
                    <i class="fa fa-caret-down"></i>
                  </input>
                </div>
                </div>
				
				<div class="row" id="example11" style="text-align: center;">
				
				</div>
				
				
			
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/headsample_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
function printsummary() {
 // alert("hiii");
   var x = document.getElementById("daterange-btn").value; 
   ///alert(x);
  
     var dateRange = x.split('-');
     var FromDate = dateRange[0];
     var ToDate = dateRange[1];
	 
	 window.open("printsummary.php?from=" + FromDate +"&to="+ ToDate);
}

function DateSearch(str) {
     var dateRange = str.split('-');
     var FromDate = dateRange[0];
     var ToDate = dateRange[1];

   if (str.length > 0) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("example11").innerHTML = this.responseText;
            }
        };
       
        xmlhttp.open("GET", "sgetsearch.php?from=" + FromDate +"&to="+ ToDate, true);
        xmlhttp.send();
    }
    
}


$(function(){
  //$('.assign').click(function(e){
  $("body").on("click", ".ssign", function(e){
    e.preventDefault();
    $('#assign').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
  
   $("body").on("click", ".edit", function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  //$('.delete').click(function(e){
	$("body").on("click", ".delete", function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

$("body").on("click", ".view", function(e){
//$('.view').click(function(e){
    e.preventDefault();
    $('#view').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

});

function getRow(id){
	//alert('Hi ali');
	//alert(id);
  $.ajax({
    type: 'POST',
    url: 'headsample_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
    $('.empid').val(response.Submit_ID);
    //$('#submit_id').val(response.Submit_ID);
      //$('.del_employee_name').html(response.Fullname);
      
       $('#ass_head').val(response.Officer);
      $('#ass_code').val(response.SampleCode);
      $('#ass_samplename').val(response.CommonName);
      $('#ass_quantity').val(response.Quantity);
      $('#ass_batch').val(response.Batch);
       $('#ass_manu_date').val(response.Mandate);
         $('#ass_expirydate').val(response.Expirydate);
         $('#ass_duedate').val(response.DueDate);
         
      $('#edit_head').val(response.Officer);
      $('#edit_code').val(response.SampleCode);
      $('#edit_samplename').val(response.CommonName);
      $('#edit_quantity').val(response.Quantity);
      $('#edit_batch').val(response.Batch);
       $('#edit_manu_date').val(response.Mandate);
         $('#edit_expirydate').val(response.Expirydate);
         $('#edit_duedate').val(response.DueDate);
         
   
     
    }
  });
}
</script>
</body>
</html>
