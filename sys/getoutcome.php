<?php

include 'includes/conn.php';
$ID_get = $_GET['q'];
$sql="SELECT * FROM outcometype WHERE KeyArea_ID='$ID_get'";
//echo '<input type="hidden" value="'.$sql.'"/>';
//var_dump($sql);

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result)==0) {
        echo '<option value="0">None</option>';
   } else {
     while($row = mysqli_fetch_array($result)) {	
            echo '<option value="'.$row['ID'].'">'.$row['Outcome'].'</option>';
    }  
}

?>