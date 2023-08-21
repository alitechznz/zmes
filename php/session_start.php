<?php 
// if(!isset($_SESSION)) 
//{ 
    session_start(); 
//} 
include 'conn.php';
     $idget="";
   if(isset($_SESSION['user'])){
          $idget = $_SESSION['user'];
    } else {
         header('location: login.php');
    }


$sql = "SELECT * FROM userinfo WHERE ID = '".$idget."'";
$query = $conn->query($sql);
$user = $query->fetch_assoc();

?>
