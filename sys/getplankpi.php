<?php

include 'includes/conn.php';
$ID_get = $_GET['q'];
//$type = $_GET['p'];


$sql="SELECT * FROM keyarea WHERE AgendaID ='$ID_get'";
$result = mysqli_query($conn, $sql);
echo '<label>Indicator :</label>

    <select class="form-control select2" style="width: 100%;" name="indicator" placeholder=" Enter indicator ..." required>';
echo '<option value="Select">Select ...</option>';
if(mysqli_num_rows($result)==0) {
    echo '<option value="0">None</option>';
} else {
    while($row = mysqli_fetch_array($result)) {
        echo '<option value="'.$row['KeyArea'].'">'.$row['KeyArea'].'</option>';
    }
}
echo '</select>';


?>

