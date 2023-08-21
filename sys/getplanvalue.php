<?php

include 'includes/conn.php';
$ID_get = $_GET['p'];
$type = $_GET['q'];

if($type =="Activity") {
    $sql="SELECT * FROM project_activity WHERE Project ='$ID_get'";
    $result = mysqli_query($conn, $sql);
    echo ' <label>Project Activity :</label><select class="form-control select2" style="width: 100%;" name="planvalue">';
    if (mysqli_num_rows($result)==0) {
            echo '<option value="0">None</option>';
       } else {
         while($row = mysqli_fetch_array($result)) {	
                echo '<option value="'.$row['Activity'].'">'.$row['Activity'].'</option>';
        }  
    }
    echo '</select>';
} else {
    echo '<label>Name :</label><input type="text" class="form-control"  id="planvalue" name="planvalue" />';
}
?>

