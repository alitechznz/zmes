<?php include 'includes/session.php'; ?>
<?php include 'includes/header2.php'; ?>
<body onload="window.print();"> 
<!--div class="wrapper"-->

 <section class="invoice2">
  <!-- Content Wrapper. Contains page content -->
  <!--div class="content-wrapper"-->
 <?php include "includes/conn.php"; ?>
<section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
             <img src="header_1.png" />
            
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
    

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
        <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				  <th>Sample Code</th>
                  <th>Sample Name</th>
				  <th>Submitted By</th>
				  <th>Date Submitted</th>
                  <th>Assigned To</th>
                  <th>Date Remarked</th>
                 
                </tr>
                </thead>
               <tbody>
				 <?php
					require('includes/conn.php');
					$sql = "SELECT * FROM `sample_submit` ORDER BY Submit_ID DESC";
                    $query = $conn->query($sql);
					$Lstatus ="";
					$rdate ="";
                    while($row = $query->fetch_assoc()) {
                            $SID = $row['SampleCode'];
					    	$sql1 = "SELECT * FROM `lab_remark` WHERE `SampleCode` ='$SID'";
                            $query1 = $conn->query($sql1);
                            if($row1 = $query1->fetch_assoc()) {
                                $rdate = $row1['ReceivingDate'];
                                $Lstatus = $row1['ConditionStatus'];
                            }
					  ?>
				<tr>
					<td><?php echo $row['SampleCode']; ?></td>
                          <td><?php echo $row['CommonName']; ?></td>
                          <td><?php echo $row['Officer']; ?></td>
                          <td><?php echo $row['Submissiondate']; ?></td>
                          <td><?php echo $row['HeadofLab']; ?></td>
						  <td><?php echo $rdate; ?></td>
					
							 
				</tr>
			<?php
			 }
			?>						
													
			</tbody>
               
              </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- /.row -->
      <div class="row">
    
      </div>
      <!-- /.row -->
      <div class="row">
           <hr>
        <!-- accepted payments column -->
        <div class="col-xs-6" style="text-align: left;">
             P.O.Box 3595, Mombasa Area, Changu Road, Zanzibar <br>
             Tel: +255 24 2233959, Website www.zfda.go.tz, <br >
               Email : info@zfda.go.tz
            
        </div>
        <div class="col-xs-6" style="text-align: right">
            <?php
            $barcodeText = "ZFDA".$user['Fullname'];
            $barcodeType="code128";
            $barcodeDisplay="horizontal";
            $barcodeSize= 50;
            $printText=  "false";
            if($barcodeText != '') {
                    echo '<img class="barcode" alt="'.$barcodeText.'" src="barcode/barcode.php?text='.$barcodeText.'&codetype='.$barcodeType.'&orientation='.$barcodeDisplay.'&size='.$barcodeSize.'&print='.$printText.'"/>';
            } else {
                    echo '<div class="alert alert-danger">Enter product name or number to generate barcode!</div>';
            }

            ?>
        </div>
     </div>

     
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  <!--/div-->
 </section>
  <!-- /.content-wrapper >
</dIV-->
<!-- ./wrapper -->


</body>
</html>
