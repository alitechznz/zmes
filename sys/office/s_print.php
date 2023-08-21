<?php include 'includes/session.php'; ?>
<?php include 'includes/header2.php'; ?>
<body onload="window.print();"> 
<!--div class="wrapper"-->

 <section class="invoice2">
  <!-- Content Wrapper. Contains page content -->
  <!--div class="content-wrapper"-->
 <?php include "includes/conn.php"; ?>
    <!-- Main content -->
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
      <div class="row" style="text-format: Times New Roman;">
        <div class="col-sm-12">
            <?php
                $get_ID = $_GET['sample'];
                $sql = "SELECT * FROM `sample_submit` WHERE SampleCode='$get_ID'";
                $query = $conn->query($sql);
                if($row = $query->fetch_assoc()){
            ?>
          <b>To:</b>&nbsp;<?php echo $row['HeadofLab']; ?>
        
            <p style="text-format: Times New Roman;">I, &nbsp;&nbsp;<?php echo $row['Officer']; ?>&nbsp;&nbsp; have this &nbsp;&nbsp; <?php echo $row['DateSubmission']; ?> &nbsp;&nbsp;received sample of the hereunder detailed product
               under powers vested in me under Section 103 of the Zanzibar Food, Drugs and Cosmetics Act No.2/ 2006 for further examination.</p>
            <strong>DETAILS OF THE SAMPLE</strong><br>
            <br />
            <strong>Sample code number: </strong>&nbsp; <?php echo $row['SampleCode']; ?><br>
            <strong>Common Name: </strong>&nbsp;<?php echo $row['CommonName']; ?><br>
            
         
        </div>
        <!-- /.col -->
       
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Quantity/Number</th>
              <th>Batch /Lot Number</th>
              <th>Man. Date </th>
              <th>Expiry Date</th>
             
            </tr>
            </thead>
            <tbody>
            <tr>
              <td><?php echo $row['Quantity']; ?></td>
              <td><?php echo $row['Batch']; ?></td>
              <td><?php echo $row['Mandate']; ?></td>
              <td><?php echo $row['Expirydate']; ?></td>
            </tr>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      
      <div class="row">
        <div class="col-xs-12 table-responsive">
            <p>I consider it necessary to be analyzed by Analyst with the following tests; </p>
           <table class="table table-striped">
            <thead>
             <tr>
              <th>S/N</th>
              <th>Test Requested</th>
             </tr>
            </thead>
            <tbody>
                <?php 
                   $get_ID = $_GET['sample'];
                   $sql1 = "SELECT * FROM `lab_testsrequested` WHERE SampleID='$get_ID'";
                   $query1 = $conn->query($sql1);
                   $num = 1;
                   while($row1 = $query1->fetch_assoc()){
                      echo  '<tr>
                                <td>'.$num.'</td>
                                <td>'.$row1['Tests'].'</td>
                            </tr>';
                             $num = $num + 1;
                   }
                ?>
           
           </tbody>
          </table>
            <p><b>Submission Date & time:</b>&nbsp;<?php echo $row['Submissiondate']; ?></p><br />
                <?php 
                   $get_ID = $_GET['sample'];
                   $sql11 = "SELECT * FROM `custodian` WHERE SampleCode='$get_ID'";
                   $query11 = $conn->query($sql11);
                   if($row11 = $query11->fetch_assoc()){
                      echo  '<p><b>Name of Custodian: </b>&nbsp;'.$row11['Custodian'].'</p>
                             <p><b>Receiving Date & Time:</b>&nbsp;'.$row11['DateIn'].'&nbsp;<span class="pull-right">Signature: &nbsp;....................</span></p><br />';
                   }
                ?>
               
        </div>
        <!-- /.col -->
        
      </div>
      <!-- /.row -->
      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-12">
          <p><strong>LABORATORY REMARKS</strong></p>
         
            <?php
                   $get_ID = $_GET['sample'];
                   $sql11 = "SELECT * FROM `lab_remark` WHERE SampleCode='$get_ID'";
                   $query11 = $conn->query($sql11);
                   if($row11 = $query11->fetch_assoc()){
                      echo  '<p>I&nbsp;'.$row11['ConditionStatus'].'&nbsp;to carry out tests specified above. </p>';
                        if($row11['ConditionStatus'] =="Reject") {
                           echo '<p>Reason(s) (in case of rejection):<br></p>
                                 <p>'.$row11['Reasons'].'</p>';
                        } 
                        echo '<p><strong>Name of Head of Laboratory Services:</strong>&nbsp;'.$row11['HeadName'].'&nbsp;<strong class="pull-center" style="margin-left: 15%;">Date: &nbsp;'.$row11['ReceivingDate'].'</strong> <span class="pull-right">Signature: &nbsp;....................</span></p>';
             ?>
        
            <?php
               }
            ?>
        </div>
        <!-- /.col -->
       <?php
                }
       ?>
      
      </div>
      <!-- /.row -->
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
            $barcodeText = $_GET['sample'];
            $barcodeType="code128";
            $barcodeDisplay="horizontal";
            $barcodeSize= 50;
            $printText=  "true";
            if($barcodeText != '') {
                    echo '<img class="barcode" alt="'.$barcodeText.'" src="barcode/barcode.php?text='.$barcodeText.'&codetype='.$barcodeType.'&orientation='.$barcodeDisplay.'&size='.$barcodeSize.'&print='.$printText.'"/>';
            } else {
                    echo '<div class="alert alert-danger">Enter product name or number to generate barcode!</div>';
            }

            ?>
        </div>
     </div>
      <!-- this row will not appear when printing -->
    
    </section>
    <div class="clearfix"></div>
  <!--/div-->
 </section>
  <!-- /.content-wrapper >
</dIV-->
<!-- ./wrapper -->


</body>
</html>
