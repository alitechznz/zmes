<?php

include 'includes/conn.php';
$agenda = $_GET['q'];
$query = "SELECT * FROM keyarea WHERE AgendaID='$agenda'";
$result = mysqli_query($conn, $query);
echo '<option value="0">Select...</option>';
while($row = mysqli_fetch_array($result)) {
    echo '<option value="'.$row['IDNo'].'">'.$row['KeyArea'].'</option>';
}
