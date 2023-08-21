<?php
include 'connection.php';

//if(isset($_POST['add'])) {   
 
 $fileExistsFlag = 0; 
 $fileName = $_FILES['rdoc']['name'];
 /* 
 *	Checking whether the file already exists in the destination folder 
 */
 
  
 $query = "SELECT FileName FROM publication WHERE FileName='$fileName'"; 
 $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
 while($row = mysqli_fetch_array($result)) {
 if($row['FileName'] == $fileName) {
 $fileExistsFlag = 1;
 } 
 }
 
 if($fileExistsFlag == 0) { 
 $target = "ReportOCGS/"; 
 $fileTarget = $target.$fileName; 
 $tempFileName = $_FILES["rdoc"]["tmp_name"];
 $result = move_uploaded_file($tempFileName,$fileTarget);
 echo $fileTarget;
 }
 
 $rname =$_POST['rname'];
 $sector = $_POST['sector'];
 $abstinf = $_POST['abstinf'];
 $pyear = $_POST['pyear'];
 $dte = $_POST['dte'];
 $dtep = $_POST['pdate'];
// $status = $_POST['status'];
 //$comment = $_POST['comment'];
 
 $filecov = addslashes(file_get_contents($_FILES['rcover']['tmp_name']));
//$fileName = addslashes(file_get_contents($_FILES['rdoc']['name']));
//$filekey = addslashes(file_get_contents($_FILES['kind']['tmp_name']));

 
 //filecov = rand(1000,100000)."-".$_FILES['rcover']['name'];
 //$filerep = rand(1000,100000)."-".$_FILES['rdoc']['name'];
 //$filekey = rand(1000,100000)."-".$_FILES['kind']['name'];
 
 $rnamepyear = $rname." ".$pyear;
 $sectorpyear = $sector." ".$pyear;;
 $rnamesectorpyear = $sector." ".$rname." ".$pyear;
 
 //if(move_uploaded_file($file_loc,$folder.$final_file)){
 $sql ="INSERT INTO `publication`(`Sector`, `Report_Name`, `Year_Published`, `Abstration`, `Cover`, `FileName`, `TypeYear`, `NameYear`, `TypeNameYear`, `Date_Uploaded`, `Date_Published`) VALUES ('$sector','$rname','$pyear','$abstinf','$filecov','$fileName','$sectorpyear','$rnamepyear','$rnamesectorpyear','$dte', '$dtep')";
 
 // $sql="INSERT INTO `tbl_uploads`(`afile`, `atype`, `asize`, `aname`) VALUES('$file', '$file_type', '$file_size', '$file_loc')";
  
  	if (mysqli_query($conn, $sql)) {
	               //header("refresh:0.5; url=http://www.zenjitech/ocgs/adminform2.php");
				   //header("refresh:0.5; url=adminform22.php");
					echo "<script>
						  alert('successfully uploaded');
						   window.location.href='../adminpanel.php';
								</script>";
				} else {		
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}			
//} else {
   //echo "<scrip
 

//} 
?>