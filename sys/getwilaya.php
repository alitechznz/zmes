<?php 
include 'includes/conn.php';
$ID_get = $_GET['q'];

 $query = "SELECT * FROM wilayatb WHERE MkoaID ='$ID_get'";
 $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
 $num = 0;
  while($row = mysqli_fetch_array($result)) {
       echo '<option value="'.$row['WilayaID'].'">'.$row['JinaLaWilaya'].'</option>';
  }
                        

?>