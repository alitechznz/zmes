<?php
include 'includes/conn.php';
$ID_get = $_GET['q'];
$sql="SELECT * FROM userinfo WHERE Organization=$ID_get";
//var_dump($sql);
$result = mysqli_query($conn, $sql) or die("Error : ".mysqli_error($conn));

 while($row = mysqli_fetch_array($result)) {
          $status ="";
       // echo '<option value="'.$row['id'].'">'.$row['Fullname'].'</option>';
          $roleid = $row['Role'];
          $name =  "<button class='btn btn-sm targetstatus btn-flat' data-id=".$row['id'].">".$row['Fullname']."</button>";
          $role ="";
          
          $sqlr ="SELECT * FROM roletb WHERE role_ID ='$roleid'";
          $resultr = mysqli_query($conn, $sqlr);
          if($rowr = mysqli_fetch_array($resultr)) {
              $role = $rowr['Name'];
          }
          
          $sqlt ="SELECT * FROM project_targetgroup";
          $resultt = mysqli_query($conn, $sqlt);
          while($rowt = mysqli_fetch_array($resultt)) {
              $fplistvalue = $rowt['FocalPerson'];
              if(strpos($fplistvalue, $row['id']) !== false){
                  $project = $rowt['Project'];
                  //checking status
                  $sqlp ="SELECT * FROM projecttb WHERE ID='$project'";
                  $resultp = mysqli_query($conn, $sqlp);
                   if($rowp = mysqli_fetch_array($resultt)) {
                       $stget = $rowp['Status'];
                       if($stget =='COMPLETION'){
                           $status = 'Available';
                       } else {
                           $status = 'Unavailable';
                       }
                   }
              } else {
                  $status = 'Available';
              }
             
          }
          $phone = '<span class="blink">'.$status.'</span>';
          
          $userfp = $name.'('.$role.')'.'-'.$phone;
         echo '<label>
                   <input type="checkbox" name="fplist[]" value="'.$row['id'].'" class="flat-red">'.$userfp.'
              </label><br />';
}  
//echo 'Ali Omar Ali';

?>
