<!DOCTYPE html>
<html>
<?php 
 include 'includes/session.php';
include 'head.php'; 
     
?>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
   <?php 
   
      include 'header.php'; 
   ?>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
   <?php 
	    include 'menu.php';   
   
   ?>   <!-- /.search form -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        LABORATORY INFORMATION MANAGEMENT SYSTEM -LIMS
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">ZFDA-LIMS</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
	    <?php 
		  $tnum =0;
		  $cnum =0;
		  $fnum =0;
		  $onum =0;
		  $anal=0;
		  $check =0;
		?>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-hourglass-half"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Sample</span>
              <?php 
                    include 'includes/conn.php';
                     $num = 0;
					  $getname =$user['Fullname'];
				      $checker ="";
                    $sql = "SELECT * FROM `sample_submit` WHERE Analyst='$getname' OR Checker='$getname'";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                         $tnum +=1;
						 if($row['FHead_Status'] == '1') {
							     $cnum +=1;
						 } 

						 if($row['FHead_Comment'] == 'Fail') {
						         $fnum +=1;
						  } 

						  if($row['FHead_Status'] == '1' and  $row['FAnalyst_Status'] == '1' ) {
							     $onum +=1;
						  }

						  if($row['Checker'] == $getname) {
							   $check +=1;
						  } 
						  
						  if($row['Analyst'] == $getname) {
							   $anal +=1;
						  } 
							 
                    }
                      echo '<span class="info-box-number">'.$tnum.'</span>';
              ?>
            
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ionicons ion-erlenmeyer-flask-bubbles"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Completed Sample(s)</span>
              <?php
                   echo '<span class="info-box-number">'.$cnum.'</span>';
              ?>
           
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-ambulance"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Failed Sample</span>
               <?php
               
                   echo '<span class="info-box-number">'.$fnum.'</span>';
              ?>
           
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-user-md"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">ON PROGRESS</span>
               <?php
                
                   echo '<span class="info-box-number">'.$onum.'</span>';
              ?>
           
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
	  
	   <div class="row">
        <div class="col-md-6">
           <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Method/Specification List</h3>

              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered">
                  <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Name</th>
                    <th>Comments|Specification</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                       <?php
                         include 'includes/conn.php';
                         $num = 0;
                         $sql ="SELECT * FROM lab_method";
                         $result = mysqli_query($conn, $sql);
                         while($row = mysqli_fetch_array($result)){
                             $num +=1;
                             echo ' <tr>
                                        <td>'.$num.'</td>
                                        <td>'.$row['Method'].'</td>
                                        <td>'.$row['Specification'].'</td>';
                                       
                                      echo '</tr>';
                         }
                      ?>
           
                 
                 
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              
              
            </div>
            <!-- /.box-footer -->
          </div>
          
        </div>
		 <div class="col-md-6">
           <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Product Specification List</h3>

             
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Name</th>
                    <th>Specification</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                       <?php
                         include 'includes/conn.php';
                         $num = 0;
                         $sql ="SELECT * FROM productspecification";
                         $result = mysqli_query($conn, $sql);
                         while($row = mysqli_fetch_array($result)){
                             $num +=1;
                             echo ' <tr>
                                        <td>'.$num.'</td>
                                        <td>'.$row['Product'].'</td>
										<td>'.$row['Comment'].'</td>';
                                      echo '</tr>';
                         }
                      ?>
           
                 
                 
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            
            <!-- /.box-footer -->
          </div>
          
        </div>
      </div>
	  	   <div class="row">
        <div class="col-md-4">
           <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Reagent Type</h3>

             
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered">
                  <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Name</th>
                    <th>Description</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                       <?php
                         include 'includes/conn.php';
                         $num = 0;
                         $sql ="SELECT * FROM reagenttype";
                         $result = mysqli_query($conn, $sql);
                         while($row = mysqli_fetch_array($result)){
                             $num +=1;
                             echo ' <tr>
                                        <td>'.$num.'</td>
                                        <td>'.$row['reagentName'].'</td>
                                        <td>'.$row['description'].'</td>';
                                       
                                      echo '</tr>';
                         }
                      ?>
           
                 
                 
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
           
            <!-- /.box-footer -->
          </div>
          
        </div>
		 <div class="col-md-8">
           <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Reagent List</h3>

              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Name</th>
                    <th>Batch No</th>
                    <th>Contamination</th>
					<th>Expiry Date</th>
					
                  </tr>
                  </thead>
                  <tbody>
                       <?php
                         include 'includes/conn.php';
                         $num = 0;
                         $sql ="SELECT * FROM reagent";
                         $result = mysqli_query($conn, $sql);
                         while($row = mysqli_fetch_array($result)){
                             $num +=1;
                             echo ' <tr>
                                        <td>'.$num.'</td>
                                        <td>'.$row['Type'].'</td>
										<td>'.$row['NameBatch'].'</td>
										<td>'.$row['Contamination'].'</td>
										<td>'.$row['ExpeiryDate'].'</td>';
                                      echo '</tr>';
                         }
                      ?>
           
                 
                 
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
           
            <!-- /.box-footer -->
          </div>
          
        </div>
      </div>
	  
	     <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
          <!-- MAP & BOX PANE -->
         
          <!-- /.row -->

          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Equipment Lists</h3>

             
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Name</th>
                    <th>Code Number</th>
                    <th>Calibration Status</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                       <?php
                         include 'includes/conn.php';
                         $num = 0;
                         $sql ="SELECT * FROM equipment";
                         $result = mysqli_query($conn, $sql);
                         while($row = mysqli_fetch_array($result)){
                             $num +=1;
                             echo ' <tr>
                                        <td>'.$num.'</td>
                                        <td>'.$row['Name'].'</td>
                                        <td>'.$row['CodeNumber'].'</td>
                                         <td>'.$row['CalibrationStatus'].'</td>';
                                       
                                       
                                      echo '</tr>';
                         }
                      ?>
           
                 
                 
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
         
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">
          <!-- Info Boxes Style 2 -->
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Analyst</span>
              <?php
               
                   echo '<span class="info-box-number">'.$anal.'</span>';
              ?>
            
		

              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
              
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Checker</span>
              <?php
                
                   echo '<span class="info-box-number">'.$check.'</span>';
              ?>

              <div class="progress">
                <div class="progress-bar" style="width: 20%"></div>
              </div>
              
            </div>
            <!-- /.info-box-content -->
          </div>

          <!--div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Direct Messages</span>
              <span class="info-box-number">163,921</span>

              <div class="progress">
                <div class="progress-bar" style="width: 40%"></div>
              </div>
              <span class="progress-description">
                    40% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div-->
          <!-- /.info-box -->

     

          <!-- PRODUCT LIST -->
         
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
	  
  	<?php include 'includes/footer.php'; ?>

</div>
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="bower_components/chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script>
$(function(){
  var barChartCanvas = $('#barChart').get(0).getContext('2d')
  var barChart = new Chart(barChartCanvas)
  var barChartData = {
    labels  : <?php echo $months; ?>,
    datasets: [
      {
        label               : 'Late',
        fillColor           : 'rgba(210, 214, 222, 1)',
        strokeColor         : 'rgba(210, 214, 222, 1)',
        pointColor          : 'rgba(210, 214, 222, 1)',
        pointStrokeColor    : '#c1c7d1',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(220,220,220,1)',
        data                : <?php echo $late; ?>
      },
      {
        label               : 'Ontime',
        fillColor           : 'rgba(60,141,188,0.9)',
        strokeColor         : 'rgba(60,141,188,0.8)',
        pointColor          : '#3b8bba',
        pointStrokeColor    : 'rgba(60,141,188,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data                : <?php echo $ontime; ?>
      }
    ]
  }
  barChartData.datasets[1].fillColor   = '#00a65a'
  barChartData.datasets[1].strokeColor = '#00a65a'
  barChartData.datasets[1].pointColor  = '#00a65a'
  var barChartOptions                  = {
    //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
    scaleBeginAtZero        : true,
    //Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines      : true,
    //String - Colour of the grid lines
    scaleGridLineColor      : 'rgba(0,0,0,.05)',
    //Number - Width of the grid lines
    scaleGridLineWidth      : 1,
    //Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,
    //Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines  : true,
    //Boolean - If there is a stroke on each bar
    barShowStroke           : true,
    //Number - Pixel width of the bar stroke
    barStrokeWidth          : 2,
    //Number - Spacing between each of the X value sets
    barValueSpacing         : 5,
    //Number - Spacing between data sets within X values
    barDatasetSpacing       : 1,
    //String - A legend template
    legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
    //Boolean - whether to make the chart responsive
    responsive              : true,
    maintainAspectRatio     : true
  }

  barChartOptions.datasetFill = false
  var myChart = barChart.Bar(barChartData, barChartOptions)
  document.getElementById('legend').innerHTML = myChart.generateLegend();
});
</script>
<script>
$(function(){
  $('#select_year').change(function(){
    window.location.href = 'home.php?year='+$(this).val();
  });
});
</script>
</body>
</html>
