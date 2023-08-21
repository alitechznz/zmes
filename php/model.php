<?php
session_start(); 
include 'conn.php';

//add school details
if(isset($_POST['addschooldetails'])) {
        $fileExistsFlag = 0; 
        $fileName = $_FILES['logo']['name'];
        //$fileName = $dete."".$fileNm;
        $query = "SELECT * FROM `schoolinfo` WHERE Schoollogo='$fileName'"; 
        $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
        while($row = mysqli_fetch_array($result)) {
        if($row['Schoollogo'] == $fileName) {
        $fileExistsFlag = 1;
        } 
        }
        
        if($fileExistsFlag == 0) { 
        $target = "ImageSave/"; 
        $fileTarget = $target.$fileName; 
        $tempFileName = $_FILES["logo"]["tmp_name"];
        $result = move_uploaded_file($tempFileName,$fileTarget);
        //echo $fileTarget;
        }
        
        $name =$_POST['name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $pobox = $_POST['pobox'];
        $slogan = $_POST['slogan'];
        $status = $_POST['status'];
       
        $sql ="INSERT INTO `schoolinfo`(`SchoolName`, `Address`, `PhoneNo`, `Slogan`, `POBox`, `Schoollogo`) 
                VALUES ('$name','$address','$phone','$slogan','$pobox','$fileName')";
        
            if (mysqli_query($conn, $sql)) {
                $_SESSION['success'] = 'Data added successfully';    
                header("location: ../SchoolInfo.php");    
            } else {	
                $_SESSION['error'] = "Error..Data not added!";
                header("location: ../SchoolInfo.php");	
             }			
} 
elseif(isset($_POST['addagenda'])) { //add national agenda
    $name =me_encrypt_data($_POST['agendaname']);
    $code =me_encrypt_data($_POST['code']);
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $about = me_encrypt_data($_POST['about']);
    $status = me_encrypt_data($_POST['status']);
    $_SESSION['action'] = 'Save agenda';
    $_SESSION['page'] = 'Add agenda';

    $sql ="INSERT INTO `agendatb`(`Name`, `Code`, `StartDate`, `EndDate`, `Explaination`, `Status`) 
            VALUES('$name', '$code', '$startdate', '$enddate', '$about', '$status')";
    //var_dump($sql);
    //exit;
  	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data added successfully';  
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header("location: ../agenda.php");   
	} else {		
        $_SESSION['error'] = "Error..Data not added!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to save agenda';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header("location: ../agenda.php");	
	}			

}
elseif(isset($_POST['editagenda'])) { //edit school levels
    $name =me_encrypt_data($_POST['edit_agendaname']);
    $code =me_encrypt_data($_POST['edit_code']);
    $startdate = $_POST['edit_startdate'];
    $enddate = $_POST['edit_enddate'];
    $about = me_encrypt_data($_POST['edit_about']);
    $status = me_encrypt_data($_POST['edit_status']);
    $_SESSION['action'] = 'Edit agenda';
    $_SESSION['page'] = 'Add agenda';
    $get_ID = $_POST['agendaID'];
    $sql ="UPDATE `agendatb` SET `Name`='$name',`Code`='$code', `Explaination`='$about', `Status`='$status', `StartDate`='$startdate', `EndDate`='$enddate' WHERE `ID`='$get_ID'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data updated successfully';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../modal_edit.php?dataId='.md5($get_ID).'&type=Agenda');
    } else {
        $_SESSION['error'] = 'Data not yet updated!';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../modal_edit.php?dataId='.md5($get_ID).'&type=Agenda');
    }		
}


elseif(isset($_POST['deleteagenda'])) {//addd school levels
    $id = $_POST['id'];
    $sql = "DELETE FROM `leveltable` WHERE `levelId` = '$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data deleted successfully';
        header('location: ../AddLevel.php');
    } else {
        $_SESSION['error'] = 'Data is not deleted!';
        header('location: ../AddLevel.php');
    }

}

   
elseif(isset($_POST['addindicator'])) {  //addd school term
    $name =me_encrypt_data($_POST['indicatorname']);
    $agendar =$_POST['agenda'];
    $about = me_encrypt_data($_POST['aboutIndicator']);
    $status = me_encrypt_data($_POST['status']);
    $_SESSION['action'] = 'Save key area';
    $_SESSION['page'] = 'Add keyarea';

    $sql ="INSERT INTO `keyarea`(`KeyArea`, `AgendaID`, `Comment`, `Status`) 
            VALUES('$name', '$agendar', '$about','$status')";
   
  	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data added successfully';  
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header("location: ../indicator.php");   
	} else {		
        $_SESSION['error'] = "Error..Data not added!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to save agenda';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header("location: ../indicator.php");	
	}			
}

elseif(isset($_POST['addoutcome'])) {  //addd school term
    $aboutoutcome =me_encrypt_data($_POST['aboutoutcome']);
    $kra_id =$_POST['kra_name'];
    $status = me_encrypt_data($_POST['status']);
    $_SESSION['action'] = 'Save outcome';
    $_SESSION['page'] = 'Add outcome';

    $sql ="INSERT INTO `outcometype`(`Outcome`, `KeyArea_ID`, `Status`) 
            VALUES('$aboutoutcome', '$kra_id','$status')";
   
  	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data added successfully';  
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header("location: ../outcome.php");   
	} else {		
        $_SESSION['error'] = "Error..Data not added!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to save outcome';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header("location: ../outcome.php");	
	}			
}



elseif(isset($_POST['editschoolterm'])) { //edit school term
    $name =$_POST['edit_term'];
    $level =$_POST['edit_level'];
    $status = $_POST['status'];
    $id = $_POST['id'];

    $sql ="UPDATE `termtb` SET `termname`='$name',`Status`='$status' WHERE `termId`='$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data updated successfully';
        header('location: ../AddLevel.php');
    } else {
        $_SESSION['error'] = 'Data not yet updated!';
        header('location: ../AddLevel.php');
    }		
}


elseif(isset($_POST['deleteschoolterm'])) { //delete school term
    $id = $_POST['id'];
    $sql = "DELETE FROM `termtb` WHERE `termId` = '$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data deleted successfully';
        header('location: ../AddLevel.php');
    } else {
        $_SESSION['error'] = 'Data is not deleted!';
        header('location: ../AddLevel.php');
    }
} 
elseif(isset($_POST['addschoolclass'])) { //addd school term
    $name =$_POST['name'];
    $level =$_POST['level'];
    $status = $_POST['status'];
    $year = $_POST['year'];
    $abrev = $_POST['abrev'];

    $sql ="INSERT INTO `classinfo`(`LevelID`, `ClassName`, `AcademicYear`, `Abbreviation`, `Status`) 
            VALUES ('$level', '$name','$year', '$abrev', '$status')";
    
  	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data added successfully';    
        header("location: ../AddClass.php");   
	} else {		
        $_SESSION['error'] = "Error..Data is not added!";
        header("location: ../AddClass.php");	
	}			

} 
elseif(isset($_POST['editschoolclass'])) { //edit school class
    $name =$_POST['edit_classname'];
    $level =$_POST['level'];
    $status = $_POST['status'];
    $year = $_POST['edit_year'];
    $abrev = $_POST['edit_abbreviation'];

    $id = $_POST['id'];

    $sql ="UPDATE `classinfo` SET `LevelID`='$level', `ClassName`='$name', `AcademicYear`='$year', `Abbreviation`='$abrev', `Status`='$status' WHERE `classID`='$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data updated successfully';
        header('location: ../AddClass.php');
    } else {
        $_SESSION['error'] = 'Data not yet updated!';
        header('location: ../AddClass.php');
    }		
} 
elseif(isset($_POST['deleteschoolclass'])) { //delete school class
    $id = $_POST['id'];
    $sql = "DELETE FROM `classinfo` WHERE `classID` = '$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data deleted successfully';
        header('location: ../AddClass.php');
    } else {
        $_SESSION['error'] = 'Data is not deleted!';
        header('location: ../AddClass.php');
    }
}
elseif(isset($_POST['addschoolstream'])) { //addd school stream
    $stream =$_POST['stream'];
    $level =$_POST['level'];
    $status = $_POST['status'];

    $sql ="INSERT INTO `streamtb`(`stream`, `Status`, `levelId`) 
            VALUES ('$stream','$status','$level')";
    
  	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data added successfully';    
        header("location: ../AddClass.php");   
	} else {		
        $_SESSION['error'] = "Error..Data is not added!";
        header("location: ../AddClass.php");	
	}			

} 
elseif(isset($_POST['editschoolstream'])) { //edit school stream
    $stream =$_POST['stream'];
    $level =$_POST['edit_level'];
    $status = $_POST['status'];
    $id = $_POST['id'];

    $sql ="UPDATE `streamtb` SET `levelId`='$level', `stream`='$stream', `Status`='$status' WHERE `streamID`='$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data updated successfully';
        header('location: ../AddClass.php');
    } else {
        $_SESSION['error'] = 'Data not yet updated!';
        header('location: ../AddClass.php');
    }		
} 
elseif(isset($_POST['deleteschoolstream'])) { //delete school stream
    $id = $_POST['id'];
    $sql = "DELETE FROM `streamtb` WHERE `streamID` = '$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data deleted successfully';
        header('location: ../AddClass.php');
    } else {
        $_SESSION['error'] = 'Data is not deleted!';
        header('location: ../AddClass.php');
    }
}

elseif(isset($_POST['addschoolsubject'])) { //addd school subject
    $class =$_POST['class'];
    $year =$_POST['year'];
    $status = $_POST['status'];
    $subject = $_POST['subject'];

    $sql ="INSERT INTO `subjectinfo`(`Class`, `Status`, `AcademicYear`, `Subject`) 
            VALUES('$class','$status','$year', '$subject')";
    
  	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data added successfully';    
        header("location: ../AddSubject.php");   
	} else {		
        $_SESSION['error'] = "Error..Data is not added!";
        header("location: ../AddSubject.php");	
	}			

} 

elseif(isset($_POST['editschoolsubject'])) { //edit school subject
    $class =$_POST['edit_class'];
    $year =$_POST['edit_year'];
    $status = $_POST['status'];
    $subject = $_POST['edit_subject'];
    $id = $_POST['id'];

    $sql ="UPDATE `subjectinfo` SET `Class`='$class',`Status`='$status',`AcademicYear`='$year',`Subject`='$subject' WHERE `SubjectID`='$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data updated successfully';
        header("location: ../AddSubject.php");
    } else {
        $_SESSION['error'] = 'Data not yet updated!';
        header("location: ../AddSubject.php");
    }		
} 

elseif(isset($_POST['deleteschoolsubject'])) { //delete school subject
    $id = $_POST['id'];
    $sql = "DELETE FROM `subjectinfo` WHERE `SubjectID`= '$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data deleted successfully';
        header("location: ../AddSubject.php");
    } else {
        $_SESSION['error'] = 'Data is not deleted!';
        header("location: ../AddSubject.php");
    }
}

elseif(isset($_POST['addschoolgrade'])) { //addd school grade
    $level =$_POST['level'];
    $grade =$_POST['grade'];
    $from = $_POST['from'];
    $to = $_POST['to'];
    $remark = $_POST['remark'];

    $sql ="INSERT INTO `gradetable`(`ClassLevel`, `Grade`, `FromMarks`, `ToMarks`, `Remark`) 
            VALUES('$level','$grade','$from', '$to', '$remark')";
    
  	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data added successfully';    
        header("location: ../AddGrade.php");   
	} else {		
        $_SESSION['error'] = "Error..Data is not added!";
        header("location: ../AddGrade.php");	
	}			

} 

elseif(isset($_POST['editschoolgrade'])) { //edit school subject
    $level =$_POST['edit_level'];
    $grade =$_POST['edit_grade'];
    $from = $_POST['edit_from'];
    $to = $_POST['edit_to'];
    $remark = $_POST['edit_remark'];
    $id = $_POST['id'];

    $sql ="UPDATE `gradetable` SET `ClassLevel`='$level',`Grade`='$grade',`FromMarks`='$from',`ToMarks`='$to',`Remark`='$remark' WHERE `No`='$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data updated successfully';
        header("location: ../AddGrade.php");
    } else {
        $_SESSION['error'] = 'Data not yet updated!';
        header("location: ../AddGrade.php");
    }		
} 

elseif(isset($_POST['deleteschoolgrade'])) { //delete school grade
    $id = $_POST['id'];
    $sql = "DELETE FROM `gradetable` WHERE `No`= '$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data deleted successfully';
        header("location: ../AddGrade.php");
    } else {
        $_SESSION['error'] = 'Data is not deleted!';
        header("location: ../AddGrade.php");
    }
}

function me_encrypt_data($data_x){
        $ciphering = "AES-128-CTR"; 
        $iv_length = openssl_cipher_iv_length($ciphering); 
        $options = 0; 
        $encryption_iv = '1234567891011121'; 
        $encryption_key = "ZPCME@ali@2020"; 
        $encryption = openssl_encrypt($data_x, $ciphering, 
                    $encryption_key, $options, $encryption_iv); 
        return $encryption;
 }


 function me_decrypt_data($data_x){
    $ciphering = "AES-128-CTR"; 
    $options = 0; 
    $decryption_iv = '1234567891011121'; 
    $decryption_key = "ZPCME@ali@2020"; 
    $decryption=openssl_decrypt ($data_x, $ciphering, 
            $decryption_key, $options, $decryption_iv); 
    
    return $decryption_key;
 }

 function AuditActivity($page, $activity, $user){
    include 'conn.php';
    $page =me_encrypt_data($page);
    $activity =me_encrypt_data($activity);
    $user = $user;
    $date = date("Y-m-d");
    $sql ="INSERT INTO `audittb`(`Page`, `Activity`, `CreatedBy`, `CreatedOn`)
            VALUES('$page', '$activity', '$user', '$date')";
     mysqli_query($conn, $sql);
 }
 
?>