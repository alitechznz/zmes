<?php 
   $get_redirect = $_GET['report_type'];
   if($get_redirect == 'Annual'){
        header("location: report_annual.php");	
   } else {
        header("location: report_quarter.php");	
   }

?>