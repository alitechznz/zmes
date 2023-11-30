<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
    define('SESSION_TIMEOUT', 120); // 3 minute
    $_SESSION['last_activity'] = time();
    if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > SESSION_TIMEOUT)) {
        session_unset(); // Unset all session data
        session_destroy(); // Destroy the session
        header('Location: index.php'); // Redirect to the login page
        exit();
    }

    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://"; 
	$user_current_url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . $_SERVER['QUERY_STRING']; 
  	$_SESSION['page'] = $user_current_url;
} 
    include 'conn.php';
    $idget="";
    
   if(isset($_SESSION['user'])){
          $idget = $_SESSION['user'];
    } else {
         header('location: ../index.php');
    }

            $project_name ="";
            $get_id = 0;
              if(isset($_GET['id'])){
                        $get_id = $_GET['id'];
                    } else {
                        $get_id = 0;
                    }
             $query = "SELECT * FROM `projecttb` WHERE ID='$get_id'"; 
            $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
             $num = 0;
            if($row = mysqli_fetch_array($result)) {	
                 $project_name = $row['pTitle'].':-'.$row['Short title'];
            }  


$sql = "SELECT * FROM userinfo WHERE ID = '".$idget."'";
$query = $conn->query($sql);
$user = $query->fetch_assoc();

if($user['Role'] != 0){
    $sql_role = "SELECT * FROM roletb WHERE role_ID = '".$user['Role']."'";
    $query_role = mysqli_query($conn, $sql_role); 
    $user_role = mysqli_fetch_array($query_role);
} 
	
?>