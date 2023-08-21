<?php

include 'connection.php';

// confirm that the 'id' variable has been set
$id = $_GET['id'];
//echo $id;
$results = mysqli_query($conn,"DELETE FROM `leveltable` WHERE levelId = $id");
if($results){
// redirect user after delete is successful
header("refresh:1; url=../AddLevel.php");
}else{
header("refresh:1; url=../AddLevel.php");
}




?>