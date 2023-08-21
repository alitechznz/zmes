<?php

    include 'includes/conn.php';
    $agenda = $_GET['q'];
    $query = "SELECT * FROM keyarea WHERE AgendaID='$agenda' ORDER BY KeyArea";
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result)) {
        echo '<option value="'.$row['IDNo'].'">'.$row['KeyArea'].'</option>';
    }

?>