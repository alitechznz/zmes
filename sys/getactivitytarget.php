<?php

include 'includes/conn.php';
$ID_get = $_GET['q'];
$sql="SELECT * FROM project_activity WHERE Project='$ID_get'";
$result = mysqli_query($conn, $sql);
 while($row = mysqli_fetch_array($result)) {	
         echo '<label>
                   <input type="checkbox" name="fpactivity[]" value="'.$row['activityID'].'" class="flat-red" checked>'.$row['Activity'].'
              </label><br />';
}  

?>