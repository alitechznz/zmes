<?php

include 'includes/conn.php';
$ID_get = $_GET['q'];
$sql="SELECT * FROM usergroup WHERE Organization='$ID_get'";

$result = mysqli_query($conn, $sql);
   if (mysqli_num_rows($result)==0) {
        echo '<option value="0">None</option>';
   } else {
        while($row = mysqli_fetch_array($result)) {	
                echo '<option value="'.$row['group_ID'].'">'.$row['Name_department'].'</option>';
        }  
        
   }
?>