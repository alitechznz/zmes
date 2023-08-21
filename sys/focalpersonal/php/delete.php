<?php

// connect to the database
include 'connection.php';

// confirm that the 'id' variable has been set
if (isset($_GET['id']) && is_numeric($_GET['id']))
{
// get the 'id' variable from the URL
$id = $_GET['id'];

// delete record from database
//if ($stmt = $mysqli->prepare("DELETE FROM `publication` WHERE ID = ? LIMIT 1"))
//{
//$stmt->bind_param("i",$id);
//$stmt->execute();
//$stmt->close();
//}

$results = mysqli_query($conn,"DELETE FROM `publication` WHERE ID ='$id'");
if($results){
// redirect user after delete is successful
 header("refresh:1; url=../adminform.php");
		echo "<script>
			alert('successfully deleted');
			</script>";
}else{
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
//$mysqli->close();


}
else
// if the 'id' variable isn't set, redirect the user
{
 header("refresh:1; url=../adminform.php");
}

?>