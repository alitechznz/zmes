<?php 
  include 'php/conn.php';
  $query = "SELECT * FROM `miradi` ORDER BY MiradiID"; 
  $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
  $num_proj = 0;
  while($row = mysqli_fetch_array($result)) {	
         //insert projecttb
         if($row['Mwaka']=="2021/22"){
            $dt_start = "2021-07-01";
            $dt_end = "2022-06-30";
            $budgeterm = "2021/22";
         } else {
            $dt_start = "2020-07-01";
            $dt_end = "2021-06-30";
            $budgeterm = "2020/21";
         }

         $ptypegroup ='National';
         $project=$row['Mradi'];
         $ptype=$row['pType'];
         $status=$row['Status'];
         $sector=$row['SectorID'];
         $sponser=$row['DonorID'];
         $taasisi=$row['TaasisiID'];
         $total_amount_SMZ=$row['MpangoSMZ'];
         $total_amount_WM=$row['MpangoWM'];
         $disbursed_amount_SMZ=$row['MgaoSMZ'];
         $disbursed_amount_WM=$row['MgaoWM'];

         
         $num_proj +=1;
         $sql = "INSERT INTO `projecttb`(`pTitle`, `StartDate`, `EndDate`, `pType`, `Status`, `Confirmation`,  `SectorID`, `pTypeGroup`, `BudgetTerm`)
                     VALUES('$project', '$dt_start', '$dt_end', '$ptype', '$status', 'Accepted', '$sector', '$ptypegroup', '$budgeterm')";
         $conn->query($sql);

          //insert projecttb_financing
          $sql = "INSERT INTO `project_financing`(`Project`, `Financing`, `ReportFrom`, `ReportTo`, `TotalAmount`, `Disbursed`, `SponsorID`)
                      VALUES('$num_proj', 'SMZ Contribution', '$dt_start', '$dt_end', '$total_amount_SMZ', '$disbursed_amount_SMZ', '$sponser')";
          $conn->query($sql);

          $sql = "INSERT INTO `project_financing`(`Project`, `Financing`, `ReportFrom`, `ReportTo`, `TotalAmount`, `Disbursed`, `SponsorID`)
                      VALUES('$num_proj', 'Grant', '$dt_start', '$dt_end', '$total_amount_WM', '$disbursed_amount_WM', '$sponser')";
          $conn->query($sql);

           //insert projecttb_targetgroup
         $sql = "INSERT INTO `project_targetgroup`(`Project`, `Institution`)
                     VALUES('$num_proj', '$taasisi')";
         $conn->query($sql);

          //insert projecttb_progress
          $dte = date("Y-m-d");
          $progress = 100;
          $sql = "INSERT INTO `project_progress`(`Project`, `Progress`, `CreatedOn`)
                      VALUES('$num_proj', '$progress', '$dte')";
          $conn->query($sql);
  }


?>