<?php 
include 'includes/conn.php';
$ID_get = $_GET['q'];

 $query = "SELECT * FROM shehiatb WHERE WilayaID ='$ID_get'";
 $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
 $num = 0;
  while($row = mysqli_fetch_array($result)) {
        echo '<label>
                   <input type="checkbox" name="shehia[]" value="'.$row['ShehiaID'].'" class="flat-red">'.$row['Name'].'
              </label><br />';
  }
                        

?>