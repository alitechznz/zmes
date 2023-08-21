<?php
session_start(); 
include 'conn.php';

//add school details
if(isset($_POST['addagenda'])) { //add national agenda
    $name =mysqli_real_escape_string($conn,$_POST['agendaname']);
    $code =mysqli_real_escape_string($conn,$_POST['code']);
    $startdate = mysqli_real_escape_string($conn,$_POST['startdate']);
    $enddate = mysqli_real_escape_string($conn,$_POST['enddate']);
    $about = mysqli_real_escape_string($conn,$_POST['about']);
    $status = mysqli_real_escape_string($conn,$_POST['status']);
    $category = mysqli_real_escape_string($conn,$_POST['category']);
    
    $_SESSION['action'] = 'Save strategy';
    //$_SESSION['page'] = 'Add agenda';

    $sql ="INSERT INTO `agendatb`(`Name`, `Code`, `StartDate`, `EndDate`, `Explaination`, `Status`, `type`) 
            VALUES('$name', '$code', '$startdate', '$enddate', '$about', '$status', '$category')";

  	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data added successfully';  
        //userActivity();
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header("location: ../agenda.php");   
	} else {		
        $_SESSION['error'] = "Error..Data not added!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to save agenda';
       // userActivity();
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header("location: ../agenda.php");	
	}			
}

elseif(isset($_POST['addsarea'])) { //add national agenda
    $name =mysqli_real_escape_string($conn,$_POST['agendaname']);
    $about = mysqli_real_escape_string($conn,$_POST['about']);
    $status = mysqli_real_escape_string($conn,$_POST['status']);
    $category = mysqli_real_escape_string($conn,$_POST['category']);
   
     $goal_type = mysqli_real_escape_string($conn,$_POST['goal_type']);
     
    $_SESSION['action'] = 'Save strategy area';
    //$_SESSION['page'] = 'Add agenda';
    
     if(isset($_POST['theme'])){
          $theme = mysqli_real_escape_string($conn,$_POST['theme']);
          $sql ="INSERT INTO `strategy_area`(`plan_id`, `strategy_area_name`, `strategy_area_details`, `strategy_status`, `theme`, `goal_type`)
            VALUES('$category', '$name', '$about', '$status', '$theme', '$goal_type')";
     }else {
          $aspiration = mysqli_real_escape_string($conn,$_POST['aspiration']);
          $sql ="INSERT INTO `strategy_area`(`plan_id`, `strategy_area_name`, `strategy_area_details`, `strategy_status`, `aspiration`, `goal_type`)
             VALUES('$category', '$name', '$about', '$status', '$aspiration', '$goal_type')";
     }
    
    

  	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data added successfully';  
        //userActivity();
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header("location: ../strategy_area.php");   
	} else {		
        $_SESSION['error'] = "Error..Data not added!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to save strategy area';
       // userActivity();
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header("location: ../strategy_area.php");	
	}			
}

elseif(isset($_POST['editsarea'])) { //edit school levels
    $name =mysqli_real_escape_string($conn,$_POST['edit_agendaname']);
    $plan =mysqli_real_escape_string($conn,$_POST['category']);
    $about = mysqli_real_escape_string($conn,$_POST['edit_about']);
    $status = mysqli_real_escape_string($conn,$_POST['edit_status']);
    $_SESSION['action'] = 'Updated strategy area';
    $id = $_POST['id'];

    $sql ="UPDATE `strategy_area` SET `plan_id`='$plan',`strategy_area_name`='$name', `strategy_area_details`='$about', `strategy_status`='$status' WHERE `strategy_area_id`='$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data updated successfully';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../strategy_area.php');
    } else {
        $_SESSION['error'] = 'Data not yet updated!';
        $_SESSION['action'] = 'Attempted to update strategy area';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../strategy_area.php');
    }		
}

elseif(isset($_POST['deletesarea'])) {//addd school levels
    $id = $_POST['id'];
    $_SESSION['action'] = 'Deleted strategy area';

    $sql = "DELETE FROM `strategy_area` WHERE `strategy_area_id` = '$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data deleted successfully';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../strategy_area.php');
    } else {
        $_SESSION['error'] = 'Data is not deleted!';
        $_SESSION['action'] = 'Attempted to delete strategy';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../strategy_area.php');
    }
}

elseif(isset($_POST['addparea'])) { //add national agenda
    $name =mysqli_real_escape_string($conn, $_POST['agendaname']);
    $about = mysqli_real_escape_string($conn, $_POST['about']);
    $status = mysqli_real_escape_string($conn,$_POST['status']);
    $strategy = mysqli_real_escape_string($conn, $_POST['strategy']);
    
    $_SESSION['action'] = 'Save priority area';
   
    $sql ="INSERT INTO `priorityarea_goal`(`priorityarea_goal_name`, `priorityarea_goal_details`, `priorityarea_goal_status`, `name_type`, `strategy_area_id`)
         VALUES('$name', '$about', '$status', 'priority name', '$strategy')";

  	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data added successfully';  
        //userActivity();
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header("location: ../priority_area.php");   
	} else {		
        $_SESSION['error'] = "Error..Data not added!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to save priority area';
       // userActivity();
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header("location: ../priority_area.php");	
	}			
}

elseif(isset($_POST['editparea'])) { //edit school levels
    $name =mysqli_real_escape_string($conn,$_POST['edit_agendaname']);
    $strategy =mysqli_real_escape_string($conn,$_POST['strategyarea']);
    $about = mysqli_real_escape_string($conn,$_POST['edit_about']);
    $status = mysqli_real_escape_string($conn,$_POST['edit_status']);
    $_SESSION['action'] = 'Updated priority area';
    $id = $_POST['id'];

    $sql ="UPDATE `priorityarea_goal` SET `priorityarea_goal_name`='$name',`priorityarea_goal_details`='$about', `priorityarea_goal_status`='$status', `strategy_area_id`='$strategy' WHERE `priorityarea_goal_id`='$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data updated successfully';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../priority_area.php');
    } else {
        $_SESSION['error'] = 'Data not yet updated!';
        $_SESSION['action'] = 'Attempted to update priority area';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../priority_area.php');
    }		
}

elseif(isset($_POST['deleteparea'])) {//addd school levels
    $id = $_POST['id'];
    $_SESSION['action'] = 'Deleted priority area';

    $sql = "DELETE FROM `priorityarea_goal` WHERE `priorityarea_goal_id` = '$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data deleted successfully';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../priority_area.php');
    } else {
        $_SESSION['error'] = 'Data is not deleted!';
        $_SESSION['action'] = 'Attempted to delete priority area';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../priority_area.php');
    }
}

elseif(isset($_POST['addgoal'])) { //add national agenda
    $name =mysqli_real_escape_string($conn, $_POST['agendaname']);
    $about = mysqli_real_escape_string($conn, $_POST['about']);
    $status = mysqli_real_escape_string($conn,$_POST['status']);
    $strategy = mysqli_real_escape_string($conn, $_POST['category']);
    
    $_SESSION['action'] = 'Save goal';
   
    $sql ="INSERT INTO `priorityarea_goal`(`priorityarea_goal_name`, `priorityarea_goal_details`, `priorityarea_goal_status`, `name_type`, `plan_id`)
         VALUES('$name', '$about', '$status', 'goal', '$strategy')";

  	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data added successfully';  
        //userActivity();
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header("location: ../goal.php");   
	} else {		
        $_SESSION['error'] = "Error..Data not added!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to save goal';
       // userActivity();
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header("location: ../goal.php");	
	}			
}

elseif(isset($_POST['editgoal'])) { //edit school levels
    $name =mysqli_real_escape_string($conn,$_POST['edit_agendaname']);
    $strategy =mysqli_real_escape_string($conn,$_POST['strategyarea']);
    $about = mysqli_real_escape_string($conn,$_POST['edit_about']);
    $status = mysqli_real_escape_string($conn,$_POST['edit_status']);
    $_SESSION['action'] = 'Updated goal';
    $id = $_POST['id'];

    $sql ="UPDATE `priorityarea_goal` SET `priorityarea_goal_name`='$name',`priorityarea_goal_details`='$about', `priorityarea_goal_status`='$status', `plan_id`='$strategy' WHERE `priorityarea_goal_id`='$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data updated successfully';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../goal.php');
    } else {
        $_SESSION['error'] = 'Data not yet updated!';
        $_SESSION['action'] = 'Attempted to update goal';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../goal.php');
    }		
}

elseif(isset($_POST['deletegoal'])) {//addd school levels
    $id = $_POST['id'];
    $_SESSION['action'] = 'Deleted goal';

    $sql = "DELETE FROM `priorityarea_goal` WHERE `priorityarea_goal_id` = '$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data deleted successfully';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../goal.php');
    } else {
        $_SESSION['error'] = 'Data is not deleted!';
        $_SESSION['action'] = 'Attempted to delete goal';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../goal.php');
    }
}


elseif(isset($_POST['addmeplan'])) { //add m.e plan
    $descr =mysqli_real_escape_string($conn,$_POST['description']);
    $indicator =mysqli_real_escape_string($conn,$_POST['indicator']);
    $definition = mysqli_real_escape_string($conn,$_POST['definition']);
    $baseline = mysqli_real_escape_string($conn,$_POST['baseline']);
    $target = mysqli_real_escape_string($conn,$_POST['target']);
    $source = mysqli_real_escape_string($conn,$_POST['source']);
    $frequency = mysqli_real_escape_string($conn,$_POST['frequency']);
    $res = mysqli_real_escape_string($conn,$_POST['responsible']);
    $project = mysqli_real_escape_string($conn,$_POST['project']);
    $planvalue = mysqli_real_escape_string($conn,$_POST['planvalue']);
      
    $_SESSION['action'] = 'Save project plan';
    //$_SESSION['page'] = 'Add organization';

    $sql ="INSERT INTO `project_plan`(`Description`, `Indicator`, `Definition`, `Baseline`, `Target`, `Source`, `Frequency`, `Responsible`, `Project`, `Value`) 
            VALUES('$descr', '$indicator', '$definition', '$baseline', '$target', '$source', '$frequency', '$res','$project','$planvalue')";

  	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data added successfully';  
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        //userActivity();
        $return = '../m&e.php?id='.$project;
        header('location:'.$return);  
	} else {		
        $_SESSION['error'] = "Error..Data not added!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to save project plan';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        //userActivity();
        $return = '../m&e.php?id='.$project;
        header('location:'.$return);  
	}			
}

elseif(isset($_POST['editmeplan'])) { //add m.e plan
    $id = $_POST['id'];
    $descr =mysqli_real_escape_string($conn,$_POST['description']);
    $indicator =mysqli_real_escape_string($conn,$_POST['indicator']);
    $definition = mysqli_real_escape_string($conn,$_POST['definition']);
    $baseline = mysqli_real_escape_string($conn,$_POST['baseline']);
    $target = mysqli_real_escape_string($conn,$_POST['target']);
    $source = mysqli_real_escape_string($conn,$_POST['source']);
    $frequency = mysqli_real_escape_string($conn,$_POST['frequency']);
    $res = mysqli_real_escape_string($conn,$_POST['responsible']);
    $project = mysqli_real_escape_string($conn,$_POST['project']);
    $planvalue = mysqli_real_escape_string($conn,$_POST['planvalue']);
      
    $_SESSION['action'] = 'Updated project plan';
    //$_SESSION['page'] = 'Add organization';

    $sql ="UPDATE `project_plan` SET `Description`='$descr', `Indicator`='$indicator', `Definition`='$definition', `Baseline`='$baseline', `Target`='$target', `Source`='$source', `Frequency`='$frequency', `Responsible`='$res', `Project`='$project', `Value`='$planvalue' WHERE `IDp`='$id'";

  	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data added successfully';  
        $return = '../m&e.php?id='.$project;
        header('location:'.$return);  
	} else {		
        $_SESSION['error'] = "Error..Data not added!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to update project plan';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        // userActivity();
        $return = '../m&e.php?id='.$project;
        header('location:'.$return);  
	}			
}

elseif(isset($_POST['deletemeplan'])) {//addd school levels
    $id = $_POST['id'];
    $_SESSION['action'] = 'Deleted project plan';
    //$_SESSION['page'] = 'delete project plan';
    $proj_id = $_POST['proj_id'];
    
    $sql = "DELETE FROM `project_plan` WHERE `IDp` = '$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data deleted successfully';
         AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../m&e.php?id='.$proj_id);
    } else {
        $_SESSION['error'] = 'Data is not deleted!';
        $_SESSION['action'] = 'Attempted to deleted project plan';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../m&e.php?id='.$proj_id);
    }

}
elseif(isset($_POST['deletetheme'])) {//addd school levels
    $id = $_POST['id'];
    $_SESSION['action'] = 'Deleted project plan theme';
    
    $sql = "DELETE FROM `themetb` WHERE `theme_id` = '$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data deleted successfully';
         AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../theme.php?id='.$id);
    } else {
        $_SESSION['error'] = 'Data is not deleted!';
        $_SESSION['action'] = 'Attempted to deleted project plan theme';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../theme.php?id='.$id);
    }

}

elseif(isset($_POST['deleteaspiration'])) {//addd school levels
    $id = $_POST['id'];
    $_SESSION['action'] = 'Deleted project plan aspiration';
    
    $sql = "DELETE FROM `themetb` WHERE `theme_id` = '$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data deleted successfully';
         AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../aspiration.php');
    } else {
        $_SESSION['error'] = 'Data is not deleted!';
        $_SESSION['action'] = 'Attempted to deleted project plan theme';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../aspiration.php');
    }

}

elseif(isset($_POST['resource'])) { //add resource
    $project =mysqli_real_escape_string($conn,$_POST['project']);
    $particular =mysqli_real_escape_string($conn,$_POST['particular']);
    $source =mysqli_real_escape_string($conn,$_POST['source']);
    $amount = mysqli_real_escape_string($conn,$_POST['amount']);
    $activity = mysqli_real_escape_string($conn,$_POST['activity']);
    $explaination = mysqli_real_escape_string($conn,$_POST['explaination']);
    $startdate = mysqli_real_escape_string($conn,$_POST['startdate']);
    $enddate = mysqli_real_escape_string($conn,$_POST['enddate']);
    
        $fileName = $_FILES['attachment']['name'];
        $target = "Documents/"; 
        $fileTarget = $target.$fileName; 
        $tempFileName = $_FILES["attachment"]["tmp_name"];
        $result = move_uploaded_file($tempFileName,$fileTarget);
      
    
    $currency = 'TZS';
 
    $_SESSION['action'] = 'Save actual expendicture';
    //$_SESSION['page'] = 'Add resource';

    $sql ="INSERT INTO `project_expendicture`(`Project`, `Particular`, `Source`, `Amount`, `Currency`, `exp_activity`, `exp_attachment`, `exp_explaination`, `startdate`, `enddate`) 
            VALUES('$project', '$particular', '$source', '$amount', '$currency', '$activity', '$fileName', '$explaination', '$startdate', '$enddate')";

  	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data added successfully';  
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        $return = '../resource.php?id='.$project;
        header('location:'.$return); 
	} else {		
        $_SESSION['error'] = "Error..Data not added!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to save actual expendicture';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
         $return = '../resource.php?id='.$project;
        header('location:'.$return); 
      	
	}			
}

elseif(isset($_POST['addtheme'])) { //add resource
    if(isset($_POST['type'])){
        $type =mysqli_real_escape_string($conn,$_POST['type']);
        $aspiration =mysqli_real_escape_string($conn,$_POST['aspiration']);
        $plan =mysqli_real_escape_string($conn,$_POST['plan']);
        $_SESSION['action'] = 'Save the aspiration';
        
        $sql ="INSERT INTO `themetb`(`theme_name`, `theme_details`, `plan_id`, `page_name`) 
            VALUES('$aspiration', '$aspiration', '$plan', '$type')";
            
            $return = '../aspiration.php';
    } else {
        $theme =mysqli_real_escape_string($conn,$_POST['theme']);
        $details =mysqli_real_escape_string($conn,$_POST['details']);
        $plan =mysqli_real_escape_string($conn,$_POST['plan']);
        $_SESSION['action'] = 'Save the theme';
        $sql ="INSERT INTO `themetb`(`theme_name`, `theme_details`, `plan_id`, `page_name`) 
            VALUES('$theme', '$details', '$plan', 'theme')";
            
        $return = '../theme.php?id='.$plan;
    }

  	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data added successfully';  
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        
        header('location:'.$return); 
	} else {		
        $_SESSION['error'] = "Error..Data not added!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to save theme or aspiration';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        //  $return = '../theme.php?id='.$plan;
        header('location:'.$return); 
	}			
}

elseif(isset($_POST['addbudget'])) { //add budgetterm
    $unit = "TZS";
    $months = mysqli_real_escape_string($conn,$_POST['months']);
    $budgeterm =mysqli_real_escape_string($conn,$_POST['budgeterm']);
    $organization = mysqli_real_escape_string($conn,$_POST['organization']);
    $project = mysqli_real_escape_string($conn,$_POST['project']);
    $activity = mysqli_real_escape_string($conn,$_POST['activity']);
    
    $cpsmz = str_replace(',','', $_POST['cpsmz']);
    $cpwm = str_replace(',','', $_POST['cpwm']);
    $cptotal = str_replace(',','', $_POST['cptotal']);
    
    $dsmz = str_replace(',','', $_POST['dsmz']);
    $dwm = str_replace(',','', $_POST['dwm']);
    $dtotal = str_replace(',','', $_POST['dtotal']);
    
     
    $totalsmz = str_replace(',','', $_POST['totalsmz']);
    $totalwm = str_replace(',','', $_POST['totalwm']);
    $overtotal = str_replace(',','', $_POST['overtotal']);
    
    
    $_SESSION['action'] = 'Save project budget';
    //$_SESSION['page'] = 'Add project budget';

    $sql ="INSERT INTO `project_annualbudget`(`BudgetTerm`, `Month`, `organization`, `Project`, `activity`, `PCA_Government`, `PCA_Donor`, `PCA_Total`, `DA_Government`, `DA_Donor`, `DA_Total`, `Per_Government`, `Per_Donor`, `Per_Percentage`)
           VALUES('$budgeterm', '$months', '$organization', '$project',  '$activity', '$cpsmz', '$cpwm', '$cptotal', '$dsmz', '$dwm', '$dtotal','$totalsmz','$totalwm','$overtotal')";
           
           //var_dump($sql);
  	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data added successfully';  
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        
        $return = '../budget.php';
        header('location:'.$return);
       // header("location: ../program.php?xyz=md5($id)");   
	} else {		
        $_SESSION['error'] = "Error..Data not added!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to save program|project budget';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
       $return = '../budget.php';
        header('location:'.$return);
	}			
}
elseif(isset($_POST['addbudgetterm'])) { //add budgetterm
    $term =mysqli_real_escape_string($conn,$_POST['term']);
    $from =mysqli_real_escape_string($conn,$_POST['from']);
    $to =mysqli_real_escape_string($conn,$_POST['to']);
  
 
    $_SESSION['action'] = 'Save budget term';
   // $_SESSION['page'] = 'Add budget term';

    $sql ="INSERT INTO `budgetterm`(`Item`, `Duration`, `Status`, `DurationTo`) 
            VALUES('$term ', '$from', 'Active', '$to')";

  	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data added successfully';  
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        $return = '../configuration.php';
        header('location:'.$return); 
	} else {		
        $_SESSION['error'] = "Error..Data not added!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to save budget term';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
         $return = '../configuration.php';
        header('location:'.$return); 
      	
	}			
}
elseif(isset($_POST['editbudgetterm'])) { //edit school levels
    $term =mysqli_real_escape_string($conn,$_POST['term']);
    $from =mysqli_real_escape_string($conn,$_POST['from']);
    $to = mysqli_real_escape_string($conn,$_POST['to']);
    
    $_SESSION['action'] = 'Updated budget term';
    //$_SESSION['page'] = 'Add budget term';
    $id = $_POST['id'];

    $sql ="UPDATE `budgetterm` SET `Item`='$term',`Duration`='$from', `DurationTo`='$to' WHERE `ID`='$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data updated successfully';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../configuration.php');
    } else {
        $_SESSION['error'] = 'Data not yet updated!';
        $_SESSION['action'] = 'Attempted to update budget term';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../configuration.php');
    }		
}
elseif(isset($_POST['deletebudgetterm'])) {//addd school levels
    $id = $_POST['id'];
    $_SESSION['action'] = 'Deleted budget term';

    $sql = "DELETE FROM `budgetterm` WHERE `ID` = '$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data deleted successfully';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../configuration.php');
    } else {
        $_SESSION['error'] = 'Data is not deleted!';
        $_SESSION['action'] = 'Attempted to delete budget term';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../configuration.php');
    }

}
elseif(isset($_POST['addsource'])) { //add source
    $source =mysqli_real_escape_string($conn,$_POST['source']);
    $status =mysqli_real_escape_string($conn,$_POST['status']);
    $_SESSION['action'] = 'Save source';
    //$_SESSION['page'] = 'Add source';

    $sql ="INSERT INTO `source`(`Item`, `Status`) 
            VALUES('$source', '$status')";

  	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data added successfully';  
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        $return = '../configuration.php';
        header('location:'.$return); 
	} else {		
        $_SESSION['error'] = "Error..Data not added!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to save source';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
         $return = '../configuration.php';
        header('location:'.$return); 
      	
	}			
}
elseif(isset($_POST['editsource'])) { //edit school levels
    $source =mysqli_real_escape_string($conn,$_POST['edit_source']);
    $status =mysqli_real_escape_string($conn,$_POST['edit_sstatus']);
    
    $_SESSION['action'] = 'Updated source';
    //$_SESSION['page'] = 'Add source';
    $id = $_POST['id'];

    $sql ="UPDATE `source` SET `Item`='$source',`Status`='$status' WHERE `ID`='$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data updated successfully';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../configuration.php');
    } else {
        $_SESSION['error'] = 'Data not yet updated!';
        $_SESSION['action'] = 'Attempted to update source';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../configuration.php');
    }		
}
elseif(isset($_POST['deletesource'])) {//addd school levels
    $id = $_POST['id'];
    $_SESSION['action'] = 'Deleted source';

    $sql = "DELETE FROM `source` WHERE `ID` = '$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data deleted successfully';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../configuration.php');
    } else {
        $_SESSION['error'] = 'Data is not deleted!';
        $_SESSION['action'] = 'Attempted to delete source';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../configuration.php');
    }

}
elseif(isset($_POST['addparticular'])) { //add particular
    $particular =mysqli_real_escape_string($conn,$_POST['particular']);
    $status =mysqli_real_escape_string($conn,$_POST['status']);
 
    $_SESSION['action'] = 'Save particular';
    //$_SESSION['page'] = 'Add source';

    $sql ="INSERT INTO `particular`(`Item`, `Status`) 
            VALUES('$particular', '$status')";

  	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data added successfully';  
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        $return = '../configuration.php';
        header('location:'.$return); 
	} else {		
        $_SESSION['error'] = "Error..Data not added!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to save particular';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
         $return = '../configuration.php';
        header('location:'.$return); 
      	
	}			
} 
elseif(isset($_POST['editparticular'])) { //edit school levels
    $particular =mysqli_real_escape_string($conn,$_POST['edit_financep']);
    $status =mysqli_real_escape_string($conn,$_POST['edit_pstatus']);
    
    $_SESSION['action'] = 'Updated finance particular';
    //$_SESSION['page'] = 'Add finance particular';
    $id = $_POST['id'];

    $sql ="UPDATE `particular` SET `Item`='$particular',`Status`='$status' WHERE `ID`='$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data updated successfully';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../configuration.php');
    } else {
        $_SESSION['error'] = 'Data not yet updated!';
        $_SESSION['action'] = 'Attempted to update finance particular';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../configuration.php');
    }		
}
elseif(isset($_POST['deleteparticular'])) {//addd school levels
    $id = $_POST['id'];
    $_SESSION['action'] = 'Deleted particular';

    $sql = "DELETE FROM `particular` WHERE `ID` = '$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data deleted successfully';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../configuration.php');
    } else {
        $_SESSION['error'] = 'Data is not deleted!';
        $_SESSION['action'] = 'Attempted to delete particular';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../configuration.php');
    }

}

elseif(isset($_POST['duedate'])) { //add duedate
    $term =mysqli_real_escape_string($conn,$_POST['term']);
    $dateline =mysqli_real_escape_string($conn,$_POST['dateline']);
    $reporttype =mysqli_real_escape_string($conn,$_POST['reporttype']);
 
    $_SESSION['action'] = 'Save duedate';
    //$_SESSION['page'] = 'Add duedate';
    $sql ="";
    $sql_query ="SELECT * FROM `duedate` WHERE `reporttype`='$reporttype'";
    $result_query = mysqli_query($conn, $sql_query) or die("Error : ".mysqli_error($conn));
    if($row_yake = mysqli_fetch_array($result_query)) {
        $sql ="UPDATE `duedate` SET `dateline`= '$dateline' WHERE `reporttype`='$reporttype'";
    } else {
        $sql ="INSERT INTO `duedate`(`budgetterm`, `dateline`, `reporttype`) 
                VALUES('$term ', '$dateline', '$reporttype')";
    }
   
  	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data added successfully';  
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        $return = '../configuration.php#tab_3';
        header('location:'.$return); 
	} else {		
        $_SESSION['error'] = "Error..Data not added!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to save duedate';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
         $return = '../configuration.php#tab_3';
        header('location:'.$return); 
      	
	}			
} 
elseif(isset($_POST['editduedate'])) { //edit school levels
    $term =mysqli_real_escape_string($conn,$_POST['edit_budgetterm']);
    $dateline =mysqli_real_escape_string($conn,$_POST['edit_dateline']);
    $reporttype =mysqli_real_escape_string($conn,$_POST['edit_reporttype']);
    
    $_SESSION['action'] = 'Updated due date';
    //$_SESSION['page'] = 'Add deadline';
    $id = $_POST['id'];

    $sql ="UPDATE `duedate` SET `budgetterm`='$term',`reporttype`='$reporttype', `dateline`='$dateline' WHERE `ID`='$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data updated successfully';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../configuration.php');
    } else {
        $_SESSION['error'] = 'Data not yet updated!';
        $_SESSION['action'] = 'Attempted to update due date';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../configuration.php');
    }		
}

elseif(isset($_POST['deleteduedate'])) {//addd school levels
    $id = $_POST['id'];
    $_SESSION['action'] = 'Deleted due date';

    $sql = "DELETE FROM `duedate` WHERE `ID` = '$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data deleted successfully';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../configuration.php');
    } else {
        $_SESSION['error'] = 'Data is not deleted!';
        $_SESSION['action'] = 'Attempted to delete due date';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../configuration.php');
    }

}
elseif(isset($_POST['addsector'])) { //add source
    $sector =mysqli_real_escape_string($conn,$_POST['sector']);
    $status =mysqli_real_escape_string($conn,$_POST['status']);
    $organization = mysqli_real_escape_string($conn, $_POST['organization']);

    $_SESSION['action'] = 'Save sector';
   // $_SESSION['page'] = 'Add sector';

    $sql ="INSERT INTO `sector`(`SectorName`, `Status`, `org_id`) 
            VALUES('$sector', '$status', '$organization')";

  	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data added successfully';  
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        $return = '../configuration.php';
        header('location:'.$return); 
	} else {		
        $_SESSION['error'] = "Error..Data not added!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to save sector';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
         $return = '../configuration.php';
        header('location:'.$return); 
      	
	}			
}
elseif(isset($_POST['editsector'])) { //edit school levels
    $sector =mysqli_real_escape_string($conn,$_POST['edit_sector']);
    $status =mysqli_real_escape_string($conn,$_POST['edit_statuss']);
    $organization = mysqli_real_escape_string($conn, $_POST['organization']);

    $_SESSION['action'] = 'Updated sector';
   // $_SESSION['page'] = 'Add sector';
    $id = $_POST['id'];

    $sql ="UPDATE `sector` SET `SectorName`='$sector',`Status`='$status',`org_id`='$organization' WHERE `SectorID`='$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data updated successfully';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../configuration.php');
    } else {
        $_SESSION['error'] = 'Data not yet updated!';
        $_SESSION['action'] = 'Attempted to update sector';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../configuration.php');
    }		
}

elseif(isset($_POST['deletesector'])) {//addd school levels
    $id = $_POST['id'];
    $_SESSION['action'] = 'Deleted sector';

    $sql = "DELETE FROM `sector` WHERE `SectorID` = '$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data deleted successfully';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../configuration.php');
    } else {
        $_SESSION['error'] = 'Data is not deleted!';
        $_SESSION['action'] = 'Attempted to delete sector';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../configuration.php');
    }

}
elseif(isset($_POST['quartely'])) { //add quartely
    $project =mysqli_real_escape_string($conn,$_POST['project']);
    $keyarea =mysqli_real_escape_string($conn,$_POST['keyarea']);
    $keystrategic = mysqli_real_escape_string($conn,$_POST['keystrategic']);
  $plannedactivity = mysqli_real_escape_string($conn,$_POST['plannedactivity']);
    $Outcome = mysqli_real_escape_string($conn,$_POST['Outcome']);
    //$source = $_POST['source'];
    $expquarter = mysqli_real_escape_string($conn,$_POST['expquarter']);
    $disbursement = mysqli_real_escape_string($conn,$_POST['disbursement']);
    $perdisbursement = mysqli_real_escape_string($conn,$_POST['perdisbursement']);
    $plannedactivity = mysqli_real_escape_string($conn,$_POST['plannedactivity']);
    $output = mysqli_real_escape_string($conn,$_POST['output']);
    $quartertarget = mysqli_real_escape_string($conn,$_POST['quartertarget']);
    $annualtarget = mysqli_real_escape_string($conn,$_POST['annualtarget']);
    $implementation = mysqli_real_escape_string($conn,$_POST['implementation']);
    $perimplementation = mysqli_real_escape_string($conn,$_POST['perimplementation']);
    $annual_perimplementation = mysqli_real_escape_string($conn,$_POST['annual_perimplementation']);
    $remarks = mysqli_real_escape_string($conn,$_POST['remarks']);
      
    $_SESSION['action'] = 'Save quartely report';
   // $_SESSION['page'] = 'Add quartely';

    $myuuid = guidv4();

    $sql ="INSERT INTO `project_quarter`(`IDq`,`Project`, `Kra`, `Outcome`,`StrategicAction`, `Activity`, `ExpQuarter`, `Disbursement`, `PerDisburse`, `Output`, `QTarget`, `ATarget`, `QImplementation`, `PerIQmplementation`, `AImplementation`, `Remarks`) 
            VALUES('$myuuid', '$project', '$keyarea', '$Outcome', '$keystrategic','$plannedactivity', '$expquarter', '$disbursement', '$perdisbursement', '$output', '$quartertarget', '$annualtarget', '$implementation','$perimplementation','$annual_perimplementation','$remarks')";

  	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data added successfully';  
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        $return = '../quartely.php?id='.$project;
        header('location:'.$return);  
	} else {		
        $_SESSION['error'] = "Error..Data not added!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to save quartely report';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        $return = '../quartely.php?id='.$project;
        header('location:'.$return);  
	}			
}

elseif(isset($_POST['updatequartely'])) { //add quartely
    $project =mysqli_real_escape_string($conn,$_POST['project']);
    $keyarea =mysqli_real_escape_string($conn,$_POST['keyarea']);
    $keystrategic = mysqli_real_escape_string($conn,$_POST['keystrategic']);
  $plannedactivity = mysqli_real_escape_string($conn,$_POST['plannedactivity']);
    $Outcome = mysqli_real_escape_string($conn,$_POST['Outcome']);
    //$source = $_POST['source'];
    $expquarter = mysqli_real_escape_string($conn,$_POST['expquarter']);
    $disbursement = mysqli_real_escape_string($conn,$_POST['disbursement']);
    $perdisbursement = mysqli_real_escape_string($conn,$_POST['perdisbursement']);
    $plannedactivity = mysqli_real_escape_string($conn,$_POST['plannedactivity']);
    $output = mysqli_real_escape_string($conn,$_POST['output']);
    $quartertarget = mysqli_real_escape_string($conn,$_POST['quartertarget']);
    $annualtarget = mysqli_real_escape_string($conn,$_POST['annualtarget']);
    $implementation = mysqli_real_escape_string($conn,$_POST['implementation']);
    $perimplementation = mysqli_real_escape_string($conn,$_POST['perimplementation']);
    $annual_perimplementation = mysqli_real_escape_string($conn,$_POST['annual_perimplementation']);
    $remarks = mysqli_real_escape_string($conn,$_POST['remarks']);
      
    $id = $_POST['project_quarter'];

    $_SESSION['action'] = 'Updated quartely';
   // $_SESSION['page'] = 'Update quartely';

    $myuuid = guidv4();

    $sql ="UPDATE `project_quarter` SET `Kra`='$keyarea', `Outcome`='$Outcome',`StrategicAction`='$keystrategic', `Activity`='$plannedactivity', `ExpQuarter`='$expquarter', `Disbursement`='$disbursement', `PerDisburse`='$perdisbursement', `Output`='$output', `QTarget`='$quartertarget', `ATarget`='$annualtarget', `QImplementation`='$implementation', `PerIQmplementation`='$perimplementation', `AImplementation`='$annual_perimplementation', `Remarks`='$remarks' WHERE `IDq`='$id'";
    // var_dump($sql);
    // exit();

  	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data updated successfully';  
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        $return = '../quartely.php?id='.$project;
        header('location:'.$return);  
	} else {		
        $_SESSION['error'] = "Error..Data not added!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to updated quartely report';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        $return = '../quartely.php?id='.$project;
        header('location:'.$return);  
	}			
}

elseif(isset($_POST['addannualreport'])) { //add quartely
    $project =mysqli_real_escape_string($conn,$_POST['project']);
    $keyarea =mysqli_real_escape_string($conn,$_POST['keyarea']);
    $outcomeIndicator = mysqli_real_escape_string($conn,$_POST['outcomeIndicator']);
    $definition = mysqli_real_escape_string($conn,$_POST['definition']);
    $Outcome = mysqli_real_escape_string($conn,$_POST['Outcome']);
    $baseline = mysqli_real_escape_string($conn,$_POST['baseline']);
    $datasource = mysqli_real_escape_string($conn,$_POST['datasource']);
    $target = mysqli_real_escape_string($conn,$_POST['target']);
    $status = mysqli_real_escape_string($conn,$_POST['status']);
    $remarks = mysqli_real_escape_string($conn,$_POST['remarks']);
      
    $_SESSION['action'] = 'Save annual report';
    //$_SESSION['page'] = 'Update annual report';

    $sql ="INSERT INTO `project_annual`(`Project`, `Kra`, `Statement`, `Indicator`, `Definition`, `Baseline`, `Source`, `Target`, `Status_an`, `Remarks`)
    VALUES('$project', '$keyarea', '$Outcome', '$outcomeIndicator','$definition', '$baseline', '$datasource', '$target', '$status','$remarks')";
  	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data added successfully';  
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        $return = '../annual.php?id='.$project;
        header('location:'.$return);  
	} else {		
        $_SESSION['error'] = "Error..Data not added!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to save annual report';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        $return = '../annual.php?id='.$project;
        header('location:'.$return);  
	}			
}

elseif(isset($_POST['updateannualreport'])) { //add quartely
    $annual_id = $_POST['annual_id'];

    $project =mysqli_real_escape_string($conn,$_POST['project']);
    $keyarea =mysqli_real_escape_string($conn,$_POST['keyarea']);
    $outcomeIndicator = mysqli_real_escape_string($conn,$_POST['outcomeIndicator']);
    $definition = mysqli_real_escape_string($conn,$_POST['definition']);
    $Outcome = mysqli_real_escape_string($conn,$_POST['Outcome']);
    $baseline = mysqli_real_escape_string($conn,$_POST['baseline']);
    $datasource = mysqli_real_escape_string($conn,$_POST['datasource']);
    $target = mysqli_real_escape_string($conn,$_POST['target']);
    $status = mysqli_real_escape_string($conn,$_POST['status']);
    $remarks = mysqli_real_escape_string($conn,$_POST['remarks']);
      
    if($Outcome==0 || $Outcome==''){
        $Outcome = $_POST['statements'];
    }
    $_SESSION['action'] = 'Updated annual report';
   // $_SESSION['page'] = 'Add annual report';

    $sql ="UPDATE `project_annual` SET `Kra`='$keyarea', `Statement`='$Outcome', `Indicator`='$outcomeIndicator', `Definition`='$definition', `Baseline`='$baseline', `Source`='$datasource', `Target`='$target', `Status_an`='$status', `Remarks`='$remarks' WHERE `IDa`='$annual_id'";
    

  	if(mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data added successfully';  
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        $return = '../annual.php?id='.$project;
        header('location:'.$return);  
	} else {		
        $_SESSION['error'] = "Error..Data not added!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to update annual report';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        $return = '../annual.php?id='.$project;
        header('location:'.$return);  
	}			
}

elseif(isset($_POST['deletequarter'])) {//addd school levels
    $id = $_POST['id'];
    $quarter_id = $_POST['quarter_id'];
    $_SESSION['action'] = 'Deleted quarter report';

    $sql = "DELETE FROM `project_quarter` WHERE `IDq` = '$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data deleted successfully';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../quartely.php?id='.$quarter_id);
    } else {
        $_SESSION['error'] = 'Data is not deleted!';
        $_SESSION['action'] = 'Attempted to delete quarter report';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../quartely.php?id='.$quarter_id);
    }

}

elseif(isset($_POST['editagenda'])) { //edit school levels
    $name =mysqli_real_escape_string($conn,$_POST['edit_agendaname']);
    $code =mysqli_real_escape_string($conn,$_POST['edit_code']);
    $startdate = mysqli_real_escape_string($conn,$_POST['edit_startdate']);
    $enddate = mysqli_real_escape_string($conn,$_POST['edit_enddate']);
    $about = mysqli_real_escape_string($conn,$_POST['edit_about']);
    $status = mysqli_real_escape_string($conn,$_POST['edit_status']);
    $_SESSION['action'] = 'Updated strategy';
    //$_SESSION['page'] = 'Add agenda';
    $id = $_POST['id'];

    $sql ="UPDATE `agendatb` SET `Name`='$name',`Code`='$code', `StartDate`='$startdate', `EndDate`='$enddate',`Explaination`='$about', `Status`='$status' WHERE `ID`='$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data updated successfully';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../agenda.php');
    } else {
        $_SESSION['error'] = 'Data not yet updated!';
        $_SESSION['action'] = 'Attempted to update strategy';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../agenda.php');
    }		
}

elseif(isset($_POST['deleteannual'])) {//addd school levels
    $id = $_POST['id'];
    $annual_id = $_POST['annual_id'];
    $_SESSION['action'] = 'Deleted Annual Report';

    $sql = "DELETE FROM `project_annual` WHERE `IDa` = '$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data deleted successfully';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../annual.php?id='.$annual_id);
    } else {
        $_SESSION['error'] = 'Data is not deleted!';
        $_SESSION['action'] = 'Attempted to delete Annual Report';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../annual.php?id='.$annual_id);
    }

}

elseif(isset($_POST['deleteagenda'])) {//addd school levels
    $id = $_POST['id'];
    $_SESSION['action'] = 'Deleted Strategy';

    $sql = "DELETE FROM `agendatb` WHERE `ID` = '$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data deleted successfully';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../agenda.php');
    } else {
        $_SESSION['error'] = 'Data is not deleted!';
        $_SESSION['action'] = 'Attempted to delete strategy';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../agenda.php');
    }
}

elseif(isset($_POST['addkra'])) {  //addd school term
    $name =mysqli_real_escape_string($conn,$_POST['indicatorname']);
    $agendar =mysqli_real_escape_string($conn,$_POST['agenda']);
    // $about = mysqli_real_escape_string($conn,$_POST['aboutIndicator']);
    $status = mysqli_real_escape_string($conn,$_POST['krastatus']);

    $strategy =mysqli_real_escape_string($conn,$_POST['strategy']);
    $priorityarea = mysqli_real_escape_string($conn,$_POST['priorityarea']);
    
    // $baseline =mysqli_real_escape_string($conn,$_POST['baseline']);
    // $target = mysqli_real_escape_string($conn,$_POST['target']);
    
    $kpi_unit = mysqli_real_escape_string($conn,$_POST['kpi_unit']);
    $kpi_unit_name = mysqli_real_escape_string($conn,$_POST['kpi_unit_name']);
    // $data_source = mysqli_real_escape_string($conn,$_POST['data_source']);
    // $frequency = mysqli_real_escape_string($conn,$_POST['frequency']);
    $goal_type = mysqli_real_escape_string($conn,$_POST['goal_type']);

    $denominator = '';
    $numerator = '';
    if(isset($_POST['denominator']) AND isset($_POST['numerator'])){
        $denominator = mysqli_real_escape_string($conn,$_POST['denominator']);
        $numerator = mysqli_real_escape_string($conn,$_POST['numerator']);
    }
    
    $goal_value="";
    // $goal_type = "";

    $_SESSION['action'] = 'Save key result area';
    //$_SESSION['page'] = 'Add keyarea';

    $sql ="INSERT INTO `keyarea`(`KeyArea`, `AgendaID`,  `Status`, `goal`, `goal_type`, `priority_area`, `kpi_unit`, `numerator`, `denominator`, `kpi_unit_name`) 
            VALUES('$name', '$agendar', '$status', '$strategy', '$goal_type', '$priorityarea', '$kpi_unit', '$numerator', '$denominator', '$kpi_unit_name')";
   
  	if (mysqli_query($conn, $sql)) {
        $id = mysqli_insert_id($conn);
        $_SESSION['success'] = 'Data added successfully';  
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../kpi_baseline.php?xyz='.$id);
	} else {		
        $_SESSION['error'] = "Error..Data not added!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to save KRA';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header("location: ../key_indicator.php");	
	}			
}

elseif(isset($_POST['addkpibaseline'])) {  //addd school term
    $kpi_id =mysqli_real_escape_string($conn,$_POST['kpi_id']);
    $kpi_id_def =mysqli_real_escape_string($conn,$_POST['aboutIndicator']);
    $baseline_name =mysqli_real_escape_string($conn,$_POST['baseline_name']);
    $baseline_value = mysqli_real_escape_string($conn,$_POST['baseline_value']);
    $baseline_unit = mysqli_real_escape_string($conn,$_POST['baseline_unit']);
    $baseline_year =mysqli_real_escape_string($conn,$_POST['baseline_year']);
    $target_value = mysqli_real_escape_string($conn,$_POST['target_value']);
    $target_name = mysqli_real_escape_string($conn,$_POST['target_name']);
    $target_unit = mysqli_real_escape_string($conn,$_POST['target_unit']);
    $target_year = mysqli_real_escape_string($conn,$_POST['target_year']);

    $data_source = mysqli_real_escape_string($conn,$_POST['data_source']);
    $frequency = mysqli_real_escape_string($conn,$_POST['frequency']);
    // $sector = mysqli_real_escape_string($conn,$_POST['frequency_sector']);

    $sector = "";
    if (isset($_POST['frequency_sector'])) {
      $contador = 1;
      foreach($_POST['frequency_sector'] as $idRancho) {
        if($contador > 1){
            $sector .= ":";
        }
        $sector .= $idRancho;
        $contador++;
      }
    }
   
    $_SESSION['action'] = 'Save KPI Baseline';

    $sql ="INSERT INTO `kpi_baseline`(`kpi_id`,`kpi_definition`,`baseline_name`, `baseline`, `baseline_unit`, `baseline_year`, `target_name`, `target`, `target_unit`, `target_year`, `data_source`, `frequency`, `sector`) 
            VALUES('$kpi_id', '$kpi_id_def', '$baseline_name', '$baseline_value','$baseline_unit', '$baseline_year', '$target_name', '$target_value', '$target_unit', '$target_year', '$data_source', '$frequency', '$sector')";
   
  	if(mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data added successfully';  
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header("location: ../kpi_baseline?xyz=".$kpi_id);   
	} else {		
        $_SESSION['error'] = "Error..Data not added!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to save KPI Baseline';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header("location: ../kpi_baseline?xyz=".$kpi_id);	
	}			
}

elseif(isset($_POST['editbaseline'])) {  //addd school term
    $baselineid =mysqli_real_escape_string($conn,$_POST['baselineid']);
    $baseline_name =mysqli_real_escape_string($conn,$_POST['baseline_name']);
    $baseline_value = mysqli_real_escape_string($conn,$_POST['baseline_value']);
    $baseline_unit = mysqli_real_escape_string($conn,$_POST['baseline_unit']);
    $baseline_year =mysqli_real_escape_string($conn,$_POST['baseline_year']);
    
    $target_value = mysqli_real_escape_string($conn,$_POST['target_value']);
    $target_name = mysqli_real_escape_string($conn,$_POST['target_name']);
    $target_unit = mysqli_real_escape_string($conn,$_POST['target_unit']);
    $target_year = mysqli_real_escape_string($conn,$_POST['target_year']);

    $data_source = mysqli_real_escape_string($conn,$_POST['data_source']);
    $frequency = mysqli_real_escape_string($conn,$_POST['frequency']);
    // $frequency_sector = mysqli_real_escape_string($conn,$_POST['frequency_sector']);
    $aboutIndicator = mysqli_real_escape_string($conn,$_POST['aboutIndicator']);

    $sector = "";
    if (isset($_POST['frequency_sector'])) {
      $contador = 1;
      foreach($_POST['frequency_sector'] as $idRancho) {
        if($contador > 1){
            $sector .= ":";
        }
        $sector .= $idRancho;
        $contador++;
      }
    }
    $frequency_sector = $sector;

    $kpi_id =mysqli_real_escape_string($conn,$_POST['kpi_id']);
    $_SESSION['action'] = 'Update KPI Baseline';

    $sql ="UPDATE `kpi_baseline` SET `baseline_name`='$baseline_name', `baseline`='$baseline_value', `baseline_unit`='$baseline_unit', `baseline_year`='$baseline_year', `target_name`='$target_name', `target`='$target_value', `target_unit`='$target_unit', `target_year`='$target_year', `kpi_definition`='$aboutIndicator', `data_source`='$data_source', `frequency`='$frequency', `sector`='$frequency_sector' WHERE `kpi_baseline_id`='$baselineid'";
      
  	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data added successfully';  
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header("location: ../kpi_baseline?xyz=".$kpi_id);   
	} else {		
        $_SESSION['error'] = "Error..Data not added!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to update KPI Baseline';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header("location: ../kpi_baseline?xyz=".$kpi_id);	
	}			
}

elseif(isset($_POST['editkra'])) { //edit kra
    $name =mysqli_real_escape_string($conn,$_POST['edit_kpi_name']);
    $agendar =mysqli_real_escape_string($conn,$_POST['edit_kraagenda']);
    // $about = mysqli_real_escape_string($conn,$_POST['edit_kraabout']);
    $status = mysqli_real_escape_string($conn,$_POST['edit_krastatus']);
   
    $kpi_unit = mysqli_real_escape_string($conn,$_POST['edit_kpi_unit']);
    $strategy =mysqli_real_escape_string($conn,$_POST['strategy']);
    $priorityarea = mysqli_real_escape_string($conn,$_POST['priorityarea']);
    // $baseline =mysqli_real_escape_string($conn,$_POST['edit_baseline']);
    // $target = mysqli_real_escape_string($conn,$_POST['edit_kpi_target']);
    // $datasource = mysqli_real_escape_string($conn,$_POST['edit_datasource']);
    // $frequency = mysqli_real_escape_string($conn,$_POST['edit_frequency']);
    // $sector = mysqli_real_escape_string($conn,$_POST['edit_sector_kpi']);
    $goal_type = mysqli_real_escape_string($conn,$_POST['goal_type']);
    $kpi_unit_name = mysqli_real_escape_string($conn,$_POST['edit_kpi_unit_name']);
    $denominator = '';
    $numerator = '';
    if(isset($_POST['denominator']) AND isset($_POST['numerator'])){
        $denominator = mysqli_real_escape_string($conn,$_POST['denominator']);
        $numerator = mysqli_real_escape_string($conn,$_POST['numerator']);
    }

   
    $goal_value="";
   

    $_SESSION['action'] = 'Updated key result area';
    $id = $_POST['id'];

    $sql ="UPDATE `keyarea` SET `KeyArea`='$name',`AgendaID`='$agendar',`Status`='$status', `goal`='$strategy', `goal_type`='$goal_type', `priority_area`='$priorityarea', `kpi_unit`='$kpi_unit',`kpi_unit_name`='$kpi_unit_name', `denominator`='$denominator', `numerator`='$numerator' WHERE `IDNo`='$id'";
    
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data updated successfully';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../kpi_baseline.php?xyz='.$id);
    } else {
        $_SESSION['error'] = 'Data not yet updated!';
        $_SESSION['action'] = 'Attempted to update key result area';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header("location: ../key_indicator.php");	
    }		
}

elseif(isset($_POST['deletekra'])) {//delete kra 
    $id = $_POST['id'];
    $_SESSION['action'] = 'Deleted strategy kra';

    $sql = "DELETE FROM `keyarea` WHERE `IDNo` = '$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data deleted successfully';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../key_indicator.php');
    } else {
        $_SESSION['error'] = 'Data is not deleted!';
        $_SESSION['action'] = 'Attempt to deleted strategy kra';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../key_indicator.php');
    }

}

elseif(isset($_POST['deletebaseline'])) {//delete kra 
    $baseline_id = $_POST['baseline_id'];
    
    $kpi_id = $_POST['kpi_id'];
    $_SESSION['action'] = 'Deleted KPI Baseline';

    $sql = "DELETE FROM `kpi_baseline` WHERE `kpi_baseline_id` = '$baseline_id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data deleted successfully';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../kpi_baseline.php?xyz='.$kpi_id);
    } else {
        $_SESSION['error'] = 'Data is not deleted!';
        $_SESSION['action'] = 'Attempt to deleted KPI Baseline';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../kpi_baseline.php?xyz='.$kpi_id);
    }

}

elseif(isset($_POST['addoutcome'])) {  //addd school term
    $aboutoutcome =mysqli_real_escape_string($conn,$_POST['outcome']);
    $kra_id =mysqli_real_escape_string($conn,$_POST['kra']);
    $status = mysqli_real_escape_string($conn,$_POST['status']);
    $_SESSION['action'] = 'Save strategy outcome';
    //$_SESSION['page'] = 'Add outcome';

    $sql ="INSERT INTO `outcometype`(`Outcome`, `KeyArea_ID`, `OutStatus`) 
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

elseif(isset($_POST['editoutcome'])) { //edit outcome
    $edit_kraoutcome = mysqli_real_escape_string($conn,$_POST['edit_kraoutcome']);
    $edit_outstatement = mysqli_real_escape_string($conn,$_POST['edit_outstatement']);
    $status = $_POST['edit_outstatus'];

    $_SESSION['action'] = 'Updated strategy outcome';
   // $_SESSION['page'] = 'Edit outcome';
    $id = $_POST['id'];

    $sql ="UPDATE `outcometype` SET `Outcome`='$edit_outstatement',`KeyArea_ID`='$edit_kraoutcome',`OutStatus`='$status' WHERE `ID`='$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data updated successfully';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../outcome.php');
    } else {
        $_SESSION['error'] = 'Data not yet updated!';
        $_SESSION['action'] = 'Attempted to updated strategy outcome';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../outcome.php');
    }		
}

elseif(isset($_POST['deleteoutcome'])) {//delete kra 
    $id = $_POST['id'];
    $_SESSION['action'] = 'Deleted strategy outcome';

    $sql = "DELETE FROM `outcometype` WHERE `ID` = '$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data deleted successfully';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../outcome.php');
    } else {
        $_SESSION['error'] = 'Data is not deleted!';
        $_SESSION['action'] = 'Attempted to delete strategy outcome';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../outcome.php');
    }

}

elseif(isset($_POST['addproject'])) { //add national agenda
    $type = $_POST['type'];
    $program_id = 0;
    if($type=="Program"){
        $program_id = 0;
    } else {
        $program_id =$_POST['program_id'];
    }
    
    $agenda = '';
     foreach($_POST['agenda'] as $selected) {
            $agenda = $selected .','.$agenda;
    }
    
    $projectname =mysqli_real_escape_string($conn,$_POST['projectname']);
    $shorttitle = mysqli_real_escape_string($conn,$_POST['shorttitle']);
    $code = mysqli_real_escape_string($conn,$_POST['code']);
    $duration = mysqli_real_escape_string($conn,$_POST['duration']);
    $duration_period = mysqli_real_escape_string($conn,$_POST['duration_period']);
    $startdate = mysqli_real_escape_string($conn,$_POST['startdate']);
    $enddate = mysqli_real_escape_string($conn,$_POST['enddate']);
    $pstatus = mysqli_real_escape_string($conn,$_POST['pstatus']);
    //$agenda = $_POST['agenda'];
    $description = mysqli_real_escape_string($conn,$_POST['description']);
    
    $phase = mysqli_real_escape_string($conn,$_POST['phase']);
    $sector = mysqli_real_escape_string($conn,$_POST['sector']);
    $sponsertype = mysqli_real_escape_string($conn,$_POST['pstatus_s']);
    
    $userid = mysqli_real_escape_string($conn,$_POST['userID']);
    $orgID = mysqli_real_escape_string($conn,$_POST['orgID']);
    $groupid = mysqli_real_escape_string($conn,$_POST['groupID']);
    $externalcode = mysqli_real_escape_string($conn,$_POST['externalcode']);
    
    $risk = mysqli_real_escape_string($conn,$_POST['risk']);
    $need = mysqli_real_escape_string($conn,$_POST['need']);
    
    // use Ramsey\Uuid\Uuid;
    
    if($pstatus =='IDENTIFICATION'){
        $uuid = gen_uuid();
        $sql1 ="INSERT INTO `projectlist`(`project_title`, `project_type`, `project_code`) 
                VALUES('$projectname', '$type', '$uuid')";
        mysqli_query($conn, $sql1);
    } 
     

    $confirm_status = 'Appending';
    if($groupid == ''){
        $groupid = 0;
    }
    
    $_SESSION['action'] = 'Save project';
   // $_SESSION['page'] = 'Add project';

    $sql ="INSERT INTO `projecttb`(`pTitle`, `Short title`,`pType`, `Code`, `Duration`, `Duration Unit`, `StartDate`, `EndDate`, `Status`, `Description`, `AgendaID`, `UnderProgram`, `Submitted_ID`, `Group_ID`, `Confirmation`, `SectorID`, `SponsorType`, `Phase`, `ExternalCode`, `utility`, `risk_factors`, `project_code`, `project_org`)
    VALUES('$projectname', '$shorttitle', '$type', '$code', '$duration', '$duration_period', '$startdate', '$enddate', '$pstatus', ' $description', '$agenda', '$program_id', '$userid', '$groupid', '$confirm_status', '$sector', '$sponsertype', '$phase', '$externalcode', '$need', '$risk', '$uuid', '$orgID')";


  	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data added successfully';  
        $id = mysqli_insert_id($conn);
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        $return = '../program.php?xyz='.$id;
        header('location:'.$return);
       // header("location: ../program.php?xyz=md5($id)");   
	} else {		
        $_SESSION['error'] = "Error..Data not added!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to save program|project';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header("location: ../program.php");	
	}			
}

elseif(isset($_POST['updateproject'])) { //add national agenda
    $type = $_POST['type'];
    $id = $_POST['projid'];
    $program_id = 0;
    if($type=="Program"){
        $program_id = 0;
    } else {
        $program_id =$_POST['program_id'];
    }
    
    $agenda = '';
     foreach($_POST['agenda'] as $selected) {
            $agenda = $selected .','.$agenda;
    }
    
    $projectname =mysqli_real_escape_string($conn,$_POST['projectname']);
    $shorttitle = mysqli_real_escape_string($conn,$_POST['shorttitle']);
    $code = mysqli_real_escape_string($conn,$_POST['code']);
    $duration = mysqli_real_escape_string($conn,$_POST['duration']);
    $duration_period = mysqli_real_escape_string($conn,$_POST['duration_period']);
    $startdate = mysqli_real_escape_string($conn,$_POST['startdate']);
    $enddate = mysqli_real_escape_string($conn,$_POST['enddate']);
    $pstatus = mysqli_real_escape_string($conn,$_POST['pstatus']);
    //$agenda = $_POST['agenda'];
    $description = mysqli_real_escape_string($conn,$_POST['description']);
    
    $userid = mysqli_real_escape_string($conn,$_POST['userID']);
    $groupid = mysqli_real_escape_string($conn,$_POST['groupID']);
    
    $risk = mysqli_real_escape_string($conn,$_POST['risk']);
    $need = mysqli_real_escape_string($conn,$_POST['need']);
    
    $confirm_status = 'Appending';
    
    $_SESSION['action'] = 'Update project';
   // $_SESSION['page'] = 'Update project';

    $sql ="UPDATE `projecttb` SET `pTitle`='$projectname', `risk_factors`='$risk', `utility`='$need', `Short title`='$shorttitle', `pType`='$type', `Code`='$code', `Duration`='$duration', `Duration Unit`='$duration_period', 
    `StartDate`='$startdate', `EndDate`='$enddate', `Status`='$pstatus', `Description`='$description', `AgendaID`='$agenda', `UnderProgram`='$program_id', `Updated_ID`='$userid' WHERE `ID` = '$id'";
  	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data added successfully';  
        //$id = mysqli_insert_id($conn);
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        
        $return = '../editviewproject.php?xyz='.$id;
        header('location:'.$return);
       // header("location: ../program.php?xyz=md5($id)");   
	} else {		
        $_SESSION['error'] = "Error..Data not added!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to update program|project';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header("location: ../editviewproject.php");	
	}			
}


elseif(isset($_POST['submitproject'])) { //add national agenda
    $id = $_POST['projid'];
    $user_id =mysqli_real_escape_string($conn,$_POST['user_id']);
    $submit_comment = mysqli_real_escape_string($conn,$_POST['submit_comment']);
    $date = date("Y-m-d h:i:s");
    
    $_SESSION['action'] = 'Submit project';
  
    $sql ="UPDATE `projecttb` SET `p_wizara_submit`='1', `p_wizara_submit_by`='$user_id', `p_wizara_submit_date`='$date', `p_wizara_submit_comment`='$submit_comment' WHERE `ID` = '$id'";
  	
  	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data added successfully';  
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        $return = '../list.php';
        header('location:'.$return);
	} else {		
        $_SESSION['error'] = "Error..Data not added!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to submit program|project';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header("location: ../list.php");	
	}			
}


elseif(isset($_POST['verifyProject'])) { //add national agenda
    $id = $_POST['projid'];
    $user_id =mysqli_real_escape_string($conn,$_POST['user_id']);
    $edit_reason = mysqli_real_escape_string($conn,$_POST['edit_reason']);
    $date = date("Y-m-d h:i:s");
    $edit_action = mysqli_real_escape_string($conn,$_POST['edit_action']);
    
    $_SESSION['action'] = 'Verified project';
  
    $sql ="UPDATE `projecttb` SET `p_wizara_approve`='1', `p_wizara_approve_by`='$user_id',`p_wizara_approve_action`='$edit_action', `p_wizara_approve_date`='$date', `p_wizara_approve_comment`='$edit_reason' WHERE `ID` = '$id'";
  	
  	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data added successfully';  
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        $return = '../list.php';
        header('location:'.$return);
	} else {		
        $_SESSION['error'] = "Error..Data not added!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to verify program|project';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header("location: ../list.php");	
	}			
}

elseif(isset($_POST['confirmProject'])) { //add national agenda
    $id = $_POST['projid'];
    $user_id =mysqli_real_escape_string($conn,$_POST['user_id']);
    $confirm_reason = mysqli_real_escape_string($conn,$_POST['confirm_reason']);
    $date = date("Y-m-d h:i:s");
    $edit_action = mysqli_real_escape_string($conn,$_POST['edit_action']);
    
    $_SESSION['action'] = 'Project Confirmation';
  
    $sql ="UPDATE `projecttb` SET `p_wizara_confirm_status`='1', `p_wizara_confirm_by`='$user_id',`p_wizara_confirm_action`='$edit_action', `p_wizara_confirm_date`='$date', `p_wizara_confirm_comment`='$confirm_reason' WHERE `ID` = '$id'";
  	
  	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data added successfully';  
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        $return = '../list.php';
        header('location:'.$return);
	} else {		
        $_SESSION['error'] = "Error..Data not added!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to confirm program|project';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header("location: ../list.php");	
	}			
}

elseif(isset($_POST['sendrequest'])) { //add national agenda
    $id = $_POST['projid'];
    $user_id =mysqli_real_escape_string($conn,$_POST['user_id']);
    $confirm_reason = mysqli_real_escape_string($conn,$_POST['edit_reason']);
    
    $date = date("Y-m-d h:i:s");
    $edit_action = mysqli_real_escape_string($conn,$_POST['edit_action']);
    
      $req_file = $_POST['req_file'];
        $target = "Documents/"; 
        $fileTarget = $target.$req_file; 
        $tempFileName = $_FILES["req_file"]["tmp_name"];
        $result = move_uploaded_file($tempFileName,$fileTarget);
        
    
    $_SESSION['action'] = 'Project Request';
  
    $sql ="INSERT INTO `project_request`(`requested_by`, `requsted_date`, `project_id`, `request_type`, `request_details`, `request_file`, `requset_status`) 
           VALUES('$user_id', '$date', '$id', '$edit_action', '$confirm_reason', '$req_file', 'Pending')";
  	
  	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data added successfully';  
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        $return = '../list.php';
        header('location:'.$return);
	} else {		
        $_SESSION['error'] = "Error..Data not added!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to request program|project';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header("location: ../list.php");	
	}			
}

elseif(isset($_POST['acceptProject'])) { //add national agenda
    $id = $_POST['projid'];
    $user_id =mysqli_real_escape_string($conn,$_POST['user_id']);
    $confirm_reason = mysqli_real_escape_string($conn,$_POST['confirm_reason']);
    $date = date("Y-m-d h:i:s");
    $edit_action = mysqli_real_escape_string($conn,$_POST['edit_action']);
    
    $_SESSION['action'] = 'Project Confirmation';
  
    $sql ="UPDATE `projecttb` SET `p_zpc_approve`='1', `p_zpc_approve_by`='$user_id',`p_zpc_approve_action`='$edit_action', `p_zpc_approve_date`='$date', `p_zpc_approve_comment`='$confirm_reason' WHERE `ID` = '$id'";
  	
  	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data added successfully';  
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        $return = '../list.php';
        header('location:'.$return);
	} else {		
        $_SESSION['error'] = "Error..Data not added!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to confirm program|project';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header("location: ../list.php");	
	}			
}

elseif(isset($_POST['deleteProject'])) {//addd school levels
    $id = $_POST['id'];
    $_SESSION['action'] = 'Deleted project';
   // $_SESSION['page'] = 'delete project';
    
    $sql = "DELETE FROM `projecttb` WHERE `ID` = '$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data deleted successfully';
         AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../list.php');
    } else {
        $_SESSION['error'] = 'Data is not deleted!';
        $_SESSION['action'] = 'Attempted to delete project';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../list.php');
    }

}

elseif(isset($_POST['deletetarget'])) {//addd school levels
    $id = $_POST['id'];
    $projid = $_POST['projid'];
    $_SESSION['action'] = 'Deleted project target';
    //$_SESSION['page'] = 'delete project target';
    
    $sql = "DELETE FROM `project_targetgroup` WHERE `targetID` = '$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data deleted successfully';
         AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        
        $return = '../program.php?xyz='.$projid;
        header('location:'.$return);
       
    } else {
        $_SESSION['error'] = 'Data is not deleted!';
        $_SESSION['action'] = 'Attempted to delete project target';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        $return = '../program.php?xyz='.$projid;
        header('location:'.$return);
       
    }

}

elseif(isset($_POST['confirmProject'])) {//addd school levels
        $id = $_POST['id'];
        $edit_action = mysqli_real_escape_string($conn,$_POST['edit_action']);
        $edit_reason = mysqli_real_escape_string($conn,$_POST['edit_reason']);
    $_SESSION['action'] = 'Confirmed project';
    //$_SESSION['page'] = 'confirm project';
    
    $sql = "UPDATE `projecttb` SET `Confirmation`='$edit_action', `Confirmation_Status`='$edit_reason' WHERE `ID` = '$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data deleted successfully';
         AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../list.php');
    } else {
        $_SESSION['error'] = 'Data is not deleted!';
        $_SESSION['action'] = 'Attempted to confirm project';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../list.php');
    }

}

elseif(isset($_POST['uaddtargetlocation'])) { //add national agenda
    $wilaya = mysqli_real_escape_string($conn,$_POST['districtLGAs']);
    $mkoa =mysqli_real_escape_string($conn,$_POST['region']);
    $coordinate =mysqli_real_escape_string($conn,$_POST['coordinate']);
    
    $pid =$_POST['pid'];
    
    $_SESSION['action'] = 'Save project target location';
    $sql ="INSERT INTO `project_location`(`Project`, `Mkoa`, `Wilaya`, `coordinate_location`) 
        VALUES('$pid', '$mkoa', '$wilaya', '$coordinate')";

  	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data added successfully';  
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        
        $return = '../editviewproject.php?xyz='.$pid;
        header('location:'.$return);
	} else {		
        $_SESSION['error'] = "Error..Data not added!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to save program|project target location';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header("location: ../editviewproject.php?xyz=".$pid);	
	}			
}


elseif(isset($_POST['addtargetlocation'])) { //add national agenda
    $wilaya = mysqli_real_escape_string($conn,$_POST['districtLGAs']);
    $mkoa =mysqli_real_escape_string($conn,$_POST['region']);
    $coordinate =mysqli_real_escape_string($conn,$_POST['coordinate']);
    
    $pid =$_POST['pid'];
    
    $_SESSION['action'] = 'Save project target location';
    $sql ="INSERT INTO `project_location`(`Project`, `Mkoa`, `Wilaya`, `coordinate_location`) 
        VALUES('$pid', '$mkoa', '$wilaya', '$coordinate')";

  	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data added successfully';  
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        
        $return = '../program.php?xyz='.$pid;
        header('location:'.$return);
	} else {		
        $_SESSION['error'] = "Error..Data not added!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to save program|project target location';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header("location: ../program.php?xyz=".$pid);	
	}			
}

elseif(isset($_POST['addtarget'])) { //add national agenda
    $project = mysqli_real_escape_string($conn,$_POST['program']);
    $institution =mysqli_real_escape_string($conn,$_POST['institution']);
    $pms = '';
     foreach($_POST['fplist'] as $selected) {
            $pms =$selected .','.$pms;
    }
 
    $person =$_POST['person'];
   // $from = $_POST['reporting_from'];
   // $to = $_POST['reporting_to'];
    $pid = $_POST['pid'];
    
    $_SESSION['action'] = 'Save project target';
    //$_SESSION['page'] = 'Add project target';

    $sql ="INSERT INTO `project_targetgroup`(`Project`, `Institution`, `FocalPerson`) 
        VALUES('$pid', '$institution', '$pms')";

  	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data added successfully';  
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        
        $return = '../program.php?xyz='.$pid;
        header('location:'.$return);
       // header("location: ../program.php?xyz=md5($id)");   
	} else {		
        $_SESSION['error'] = "Error..Data not added!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to save program|project target';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header("location: ../program.php");	
	}			
}

elseif(isset($_POST['uaddtarget'])) { //add national agenda
    $project = mysqli_real_escape_string($conn,$_POST['program']);
    $institution =mysqli_real_escape_string($conn,$_POST['institution']);
    $fp ='';
    $nm = 0;
    foreach($_POST['fplist'] as $selected) {
        if($nm == 0){
            $fp =$selected;
        } else {
            $fp =$selected .','.$fp;
        }
        $nm +=1;
    }   
    //$from = mysqli_real_escape_string($conn,$_POST['reporting_from']);
    //$to = mysqli_real_escape_string($conn,$_POST['reporting_to']);
    $pid = mysqli_real_escape_string($conn,$_POST['pid']);
    
    $_SESSION['action'] = 'Updated project target';
   // $_SESSION['page'] = 'Add project target';

    $sql ="INSERT INTO `project_targetgroup`(`Project`, `Institution`, `FocalPerson`) 
        VALUES('$pid', '$institution', '$fp')";
    

  	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data added successfully';  
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        
        $return = '../editviewproject.php?xyz='.$pid;
        header('location:'.$return);
       // header("location: ../program.php?xyz=md5($id)");   
	} else {		
        $_SESSION['error'] = "Error..Data not added!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to update program|project target';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        $return = '../editviewproject.php?xyz='.$pid;
        header('location:'.$return);
	}			
}

elseif(isset($_POST['addfinancing'])) { //add national agenda
     $unit = "";
    $typef = mysqli_real_escape_string($conn,$_POST['typef']);
    $currency =mysqli_real_escape_string($conn,$_POST['currency']);
    $r_from = mysqli_real_escape_string($conn,$_POST['r_from']);
    $r_to = mysqli_real_escape_string($conn,$_POST['r_to']);
    $unit = mysqli_real_escape_string($conn,$_POST['unit']);
    $sponser = mysqli_real_escape_string($conn,$_POST['donor']);
    
    $projectcost = $_POST['projectcost'];
     $projectcost = str_replace(',', '', $projectcost);
     
    $disbursed = $_POST['disbursed'];
     $disbursed = str_replace(',', '', $disbursed);
     
    $pid = $_POST['pid'];
    
    
    $_SESSION['action'] = 'Save project financing';
    //$_SESSION['page'] = 'Add project financing';

    $sql ="INSERT INTO `project_financing`(`Project`, `Financing`, `Currency`, `Unittype`, `ReportFrom`, `ReportTo`, `TotalAmount`, `Compensation`, `SponsorID`)
           VALUES('$pid', '$typef', '$currency', '$unit',  '$r_from', '$r_to', '$projectcost', '$disbursed', '$sponser')";
           
           //var_dump($sql);
  	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data added successfully';  
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        
        $return = '../program.php?xyz='.$pid;
        header('location:'.$return);
       // header("location: ../program.php?xyz=md5($id)");   
	} else {		
        $_SESSION['error'] = "Error..Data not added!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to save program|project financing';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
       $return = '../program.php?xyz='.$pid;
        header('location:'.$return);
	}			
}

elseif(isset($_POST['uaddfinancing'])) { //add national agenda
     $unit = "";
    $typef = $_POST['typef'];
    $currency =$_POST['currency'];
    $r_from = $_POST['r_from'];
    $r_to = $_POST['r_to'];
    $unit = $_POST['unit'];
    $projectcost = $_POST['projectcost'];
    $disbursed = $_POST['disbursed'];
    $pid = $_POST['pid'];
    
    
    $_SESSION['action'] = 'Updated project financing';
    //$_SESSION['page'] = 'Add project financing';

    $sql ="INSERT INTO `project_financing`(`Project`, `Financing`, `Currency`, `Unittype`, `ReportFrom`, `ReportTo`, `TotalAmount`, `Compensation`)
           VALUES('$pid', '$typef', '$currency', '$unit',  '$r_from', '$r_to', '$projectcost', '$disbursed')";
           
           //var_dump($sql);
  	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data added successfully';  
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        
        $return = '../editviewproject.php?xyz='.$pid;
        header('location:'.$return);
       // header("location: ../program.php?xyz=md5($id)");   
	} else {		
        $_SESSION['error'] = "Error..Data not added!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to update program|project financing';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        $return = '../editviewproject.php?xyz='.$pid;
        header('location:'.$return);
	}			
}

elseif(isset($_POST['deletefinance'])) {//addd school levels
    $id = $_POST['id'];
    $projid = $_POST['projid'];
    $_SESSION['action'] = 'Deleted project finance';
    //$_SESSION['page'] = 'delete project finance';
    
    $sql = "DELETE FROM `project_financing` WHERE `financing_ID` = '$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data deleted successfully';
         AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        $return = '../program.php?xyz='.$projid;
        header('location:'.$return);
    } else {
        $_SESSION['error'] = 'Data is not deleted!';
        $_SESSION['action'] = 'Attempted to delete project finance';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        $return = '../program.php?xyz='.$projid;
        header('location:'.$return);
    }
}

elseif(isset($_POST['deleteactivity'])) {//addd school levels
    $id = $_POST['id'];
    $projid = $_POST['projid'];
    $_SESSION['action'] = 'Deleted project activity';
   // $_SESSION['page'] = 'delete project activity';
    
    $sql = "DELETE FROM `project_activity` WHERE `activityID` = '$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data deleted successfully';
         AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        $return = '../program.php?xyz='.$projid;
        header('location:'.$return);
    } else {
        $_SESSION['error'] = 'Data is not deleted!';
        $_SESSION['action'] = 'Attempted to delete project activity';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        $return = '../program.php?xyz='.$projid;
        header('location:'.$return);
    }
}

elseif(isset($_POST['deleteattachment'])) {//addd school levels
    $id = $_POST['id'];
    $projid = $_POST['projid'];
    $_SESSION['action'] = 'Delete project attachment';
   // $_SESSION['page'] = 'delete project attachment';
    
    $sql = "DELETE FROM `project_file` WHERE `fileID` = '$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data deleted successfully';
         AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        $return = '../program.php?xyz='.$projid;
        header('location:'.$return);
    } else {
        $_SESSION['error'] = 'Data is not deleted!';
        $_SESSION['action'] = 'Attempted to delete project attachment';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        $return = '../program.php?xyz='.$projid;
        header('location:'.$return);
    }
}

elseif(isset($_POST['udeletetarget'])) {//addd school levels
    $id = $_POST['id'];
    $projid = $_POST['projid'];
    $_SESSION['action'] = 'Deleted project target';
    //$_SESSION['page'] = 'delete project target';
    
    $sql = "DELETE FROM `project_targetgroup` WHERE `targetID` = '$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data deleted successfully';
         AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        
        $return = '../editviewproject.php?xyz='.$projid;
        header('location:'.$return);
       
    } else {
        $_SESSION['error'] = 'Data is not deleted!';
        $_SESSION['action'] = 'Attempted to delete project target';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        $return = '../editviewproject.php?xyz='.$projid;
        header('location:'.$return);
       
    }

}


elseif(isset($_POST['udeletelocation'])) {//addd school levels
    $id = $_POST['id'];
    $projid = $_POST['projid'];
    $_SESSION['action'] = 'Deleted project location';
    //$_SESSION['page'] = 'delete project target';
    
    $sql = "DELETE FROM project_location WHERE LocationID = '$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data deleted successfully';
         AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        
        $return = '../editviewproject.php?xyz='.$projid;
        header('location:'.$return);
       
    } else {
        $_SESSION['error'] = 'Data is not deleted!';
        $_SESSION['action'] = 'Attempted to delete project target';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        $return = '../editviewproject.php?xyz='.$projid;
        header('location:'.$return);
       
    }

}

elseif(isset($_POST['udeletefinance'])) {//addd school levels
    $id = $_POST['id'];
    $projid = $_POST['projid'];
    $_SESSION['action'] = 'Deleted project finance';
   // $_SESSION['page'] = 'delete project finance';
    
    $sql = "DELETE FROM `project_financing` WHERE `financing_ID` = '$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data deleted successfully';
         AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        $return = '../editviewproject.php?xyz='.$projid;
        header('location:'.$return);
    } else {
        $_SESSION['error'] = 'Data is not deleted!';
        $_SESSION['action'] = 'Attempted to delete project finance';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        $return = '../editviewproject.php?xyz='.$projid;
        header('location:'.$return);
    }
}

elseif(isset($_POST['udeleteactivity'])) {//addd school levels
    $id = $_POST['id'];
    $projid = $_POST['projid'];
    $_SESSION['action'] = 'Deleted project activity';
    //$_SESSION['page'] = 'delete project activity';
    
    $sql = "DELETE FROM `project_activity` WHERE `activityID` = '$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data deleted successfully';
         AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        $return = '../editviewproject.php?xyz='.$projid;
        header('location:'.$return);
    } else {
        $_SESSION['error'] = 'Data is not deleted!';
        $_SESSION['action'] = 'Attempted to delete project activity';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        $return = '../editviewproject.php?xyz='.$projid;
        header('location:'.$return);
    }
}

elseif(isset($_POST['udeleteattachment'])) {//addd school levels
    $id = $_POST['id'];
    $projid = $_POST['projid'];
    $_SESSION['action'] = 'Deleted project attachment';
   // $_SESSION['page'] = 'delete project attachment';
    
    $sql = "DELETE FROM `project_file` WHERE `fileID` = '$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data deleted successfully';
         AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        $return = '../editviewproject?xyz='.$projid;
        header('location:'.$return);
    } else {
        $_SESSION['error'] = 'Data is not deleted!';
        $_SESSION['action'] = 'Attempted to delete project attachment';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        $return = '../editviewproject.php?xyz='.$projid;
        header('location:'.$return);
    }
}

elseif(isset($_POST['projectactivity'])) { //add national agenda
    $activity = $_POST['activityname'];
    $resource = $_POST['proj_resource'];
    $amount = $_POST['amount'];
    $amountwm = $_POST['amount_wm'];
    $amount = str_replace(',', '', $amount);
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $unit = $_POST['currency'];
    
    $pid = $_POST['pid'];
   
    $_SESSION['action'] = 'Save project activity';
    //$_SESSION['page'] = 'Add project activity';

    $sql ="INSERT INTO `project_activity`(`Project`, `Activity`, `Amount`, `amountWM`, `Resource`, `StartDate`, `EndDate`, `ActCurrency`) 
           VALUES('$pid', '$activity', '$amount', '$amountwm', '$resource', '$startdate', '$enddate', '$unit')";
           
  	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data added successfully';  
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        
        $return = '../program.php?xyz='.$pid;
        header('location:'.$return);
       // header("location: ../program.php?xyz=md5($id)");   
	} else {		
        $_SESSION['error'] = "Error..Data not added!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to save program|project Activity';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        $return = '../program.php?xyz='.$pid;
        header('location:'.$return);	
	}			
}

elseif(isset($_POST['uprojectactivity'])) { //add national agenda
    $activity = $_POST['activityname'];
    $resource = $_POST['proj_resource'];
    $amount = $_POST['amount'];
    $amountwm = $_POST['amount_wm'];
    $amount = str_replace(',', '', $amount);
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $unit = $_POST['currency'];
    
    $pid = $_POST['pid'];

   
    $_SESSION['action'] = 'Updated project activity';
   // $_SESSION['page'] = 'Add project activity';

    $sql ="INSERT INTO `project_activity`(`Project`, `Activity`, `Amount`, `amountWM`, `Resource`, `StartDate`, `EndDate`, `ActCurrency`) 
           VALUES('$pid', '$activity', '$amount', '$amountwm', '$resource', '$startdate', '$enddate', '$unit')";
           
           //var_dump($sql);
  	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data added successfully';  
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        
        $return = '../editviewproject.php?xyz='.$pid;
        header('location:'.$return);
       // header("location: ../program.php?xyz=md5($id)");   
	} else {		
        $_SESSION['error'] = "Error..Data not added!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to update program|project Activity';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
         $return = '../editviewproject.php?xyz='.$pid;
        header('location:'.$return);
	}			
}

elseif(isset($_POST['addattachment'])) { //add national agenda
    $report = $_POST['reportname'];
    $pid = $_POST['pid'];
    
        $fileExistsFlag = 0; 
        $fileName = $_FILES['file_rep']['name'];
        $query = "SELECT * FROM `project_file` WHERE Filelocation='$fileName'"; 
        $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
        while($row = mysqli_fetch_array($result)) {
        if($row['Filelocation'] == $fileName) {
        $fileExistsFlag = 1;
        } 
        }
        
        if($fileExistsFlag == 0) { 
        $target = "Documents/"; 
        $fileTarget = $target.$fileName; 
        $tempFileName = $_FILES["file_rep"]["tmp_name"];
        $result = move_uploaded_file($tempFileName,$fileTarget);
        //echo $fileTarget;
        }
   
    $_SESSION['action'] = 'Save project attachment';
    //$_SESSION['page'] = 'Add project attachment';

    $sql ="INSERT INTO `project_file`(`Filename`, `Filelocation`, `Project`) VALUES('$report', '$fileName', '$pid')";
           
           //var_dump($sql);
  	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data added successfully';  
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        
        $return = '../program.php?xyz='.$pid;
        header('location:'.$return);
       // header("location: ../program.php?xyz=md5($id)");   
	} else {		
        $_SESSION['error'] = "Error..Data not added!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to save program|project attachment';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        $return = '../program.php?xyz='.$pid;
        header('location:'.$return);
	}			
}

elseif(isset($_POST['uaddattachment'])) { //add national agenda
    $report = $_POST['reportname'];
    $pid = $_POST['pid'];
    
        $fileExistsFlag = 0; 
        $fileName = $_FILES['file_rep']['name'];
        $query = "SELECT * FROM `project_file` WHERE Filelocation='$fileName'"; 
        $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
        while($row = mysqli_fetch_array($result)) {
        if($row['Filelocation'] == $fileName) {
        $fileExistsFlag = 1;
        } 
        }
        
        if($fileExistsFlag == 0) { 
        $target = "Documents/"; 
        $fileTarget = $target.$fileName; 
        $tempFileName = $_FILES["file_rep"]["tmp_name"];
        $result = move_uploaded_file($tempFileName,$fileTarget);
        //echo $fileTarget;
        }
   
    $_SESSION['action'] = 'Updated project attachment';
    //$_SESSION['page'] = 'Add project attachment';

    $sql ="INSERT INTO `project_file`(`Filename`, `Filelocation`, `Project`) VALUES('$report', '$fileName', '$pid')";
           
           //var_dump($sql);
  	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data added successfully';  
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        
        $return = '../editviewproject.php?xyz='.$pid;
        header('location:'.$return);
       // header("location: ../program.php?xyz=md5($id)");   
	} else {		
        $_SESSION['error'] = "Error..Data not added!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to change program|project attachment';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        $return = '../editviewproject.php?xyz='.$pid;
        header('location:'.$return);
	}			
}

elseif(isset($_POST['addorganization'])) { //add national agenda
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $address ="";
    $location =mysqli_real_escape_string($conn,$_POST['address']);
    $country =mysqli_real_escape_string($conn,$_POST['country']);
    $telephone =mysqli_real_escape_string($conn,$_POST['telephone']);
    $postaladdress = mysqli_real_escape_string($conn,$_POST['postaladdress']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    
    $types = mysqli_real_escape_string($conn,$_POST['types']);
    
    $short = mysqli_real_escape_string($conn,$_POST['shortname']);

   $sector = "";
    if (isset($_POST['frequency_sector'])) {
      $contador = 1;
      foreach($_POST['frequency_sector'] as $idRancho) {
        if($contador > 1){
            $sector .= ":";
        }
        $sector .= $idRancho;
        $contador++;
      }
    }
   
    $_SESSION['action'] = 'Registered organization';
   // $_SESSION['page'] = 'Add stakeholder page';

    $sql ="INSERT INTO `organizationtb`(`Name`, `Type`, `Telephone`, `PostalAddress`, `LocationAddress`, `Email_org`, `ShortName`, `org_group`, `org_sector`) 
                VALUES('$name', '$types', '$telephone', '$postaladdress', '$address', '$email', '$short', 'Ministry', '$sector')";


  	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data added successfully';  
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        
        $return = '../stakeholder.php';
        header('location:'.$return);
       // header("location: ../program.php?xyz=md5($id)");   
	} else {		
        $_SESSION['error'] = "Error..Data not added!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to save organization';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header("location: ../stakeholder.php");	
	}			
}

elseif(isset($_POST['addinstitution'])) { //add national agenda
    $name = $_POST['institution'];
    $organization =$_POST['organization'];
    $location =$_POST['address'];
    $status = $_POST['status'];
    $short = $_POST['short_institute'];
   
    $_SESSION['action'] = 'Registered institution';
  
    $sql ="INSERT INTO `organizationtb`(`Name`, `LocationAddress`, `ShortName`, `org_group`, `under_organization`) 
                VALUES('$name', '$location', '$short', 'Institution', '$organization')";

  	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data added successfully';  
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        
        $return = '../stakeholder.php';
        header('location:'.$return);
       // header("location: ../program.php?xyz=md5($id)");   
	} else {		
        $_SESSION['error'] = "Error..Data not added!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to save institution';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header("location: ../stakeholder.php");	
	}			
}

elseif(isset($_POST['change_password'])){
    $password = $_POST['password'];
    $re_password = $_POST['rep_password'];
    $email = $_POST['email'];
    if($password != $re_password){
        $_SESSION['error'] = "Passwords are not matched";
        $_SESSION['action'] = 'Attempt to edit password';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header("location: ../change_password.php");	
    } else {
        // Validate password strength
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);
        
        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
            $_SESSION['error'] = "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.";
            $_SESSION['action'] = 'Attempt to edit password';
            AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
            header("location: ../change_password.php");	
        }else{
            $new_pdf = md5($password);
            $sql ="UPDATE `userinfo` SET `Password`='$new_pdf' WHERE `Email`='$email'";
            	if (mysqli_query($conn, $sql)) {
            	    $_SESSION['error'] = "Password is successfully changed!";
                    $_SESSION['action'] = 'Changed a password';
                    AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
                    header("location: ../home.php");	
            	} else {
            	    $_SESSION['error'] = "Account is not exit. Sorry!";
                    $_SESSION['action'] = 'Attempt to edit password';
                    AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
                    header("location: ../change_password.php");	
            	}
        }
    }
}

elseif(isset($_POST['editorganization'])) { //edit institutions levels
   
    $edit_organization = $_POST['editss_organization'];
    $edit_telephone = $_POST['editss_telephone'];
    $edit_email = $_POST['editss_email'];
    $edit_location = $_POST['editss_location'];
    $edit_status = $_POST['editss_status'];
    
    $sector = "";
    if(isset($_POST['frequency_sector'])) {
      $contador = 1;
      foreach($_POST['frequency_sector'] as $idRancho) {
        if($contador > 1){
            $sector .= ":";
        }
        $sector .= $idRancho;
        $contador++;
      }
    }

    $_SESSION['action'] = 'Edit organization details';
    //$_SESSION['page'] = 'Edit organization details';
    $id = $_POST['id'];

    $sql ="UPDATE `organizationtb` SET `Telephone`='$edit_telephone',`LocationAddress`='$edit_location',`Email_org`='$edit_email',`Org_Status`='$edit_status', `org_sector`='$sector' WHERE `ID`='$id'";
   	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data edited successfully';  
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        
        $return = '../stakeholder.php';
        header('location:'.$return);
       // header("location: ../program.php?xyz=md5($id)");   
	} else {		
        $_SESSION['error'] = "Error..Data not edit!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to edit organization detail';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header("location: ../stakeholder.php");	
	}			
}

elseif(isset($_POST['editinstitution'])) { //edit institutions levels
   
    $edit_organization = $_POST['edit_organization'];
    $edit_Institution = $_POST['edit_Institution'];
    $edit_shortname = $_POST['edit_shortname'];
    $edit_location = $_POST['edit_location'];
    $edit_status = $_POST['edit_status'];
    
    $_SESSION['action'] = 'Edit institution details';
    //$_SESSION['page'] = 'Edit organization details';
    $id = $_POST['id'];

    $sql ="UPDATE `organizationtb` SET `ShortName`='$edit_shortname',`LocationAddress`='$edit_location',`Name`='$edit_Institution',`Org_Status`='$edit_status' WHERE `ID`='$id'";
   	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data edited successfully';  
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        
        $return = '../stakeholder.php';
        header('location:'.$return);
       // header("location: ../program.php?xyz=md5($id)");   
	} else {		
        $_SESSION['error'] = "Error..Data not edit!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to edit institution detail';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header("location: ../stakeholder.php");	
	}			
}

elseif(isset($_POST['deleteOrganization'])) { //delete institution 
    $id = $_POST['id'];
    $_SESSION['action'] = 'Deleted organization';
    $sql = "DELETE FROM `organizationtb` WHERE `ID` = '$id'";
    
   	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data added successfully';  
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        $return = '../stakeholder.php';
        header('location:'.$return);
	} else {		
        $_SESSION['error'] = "Error..Data not added!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to delete organization';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header("location: ../stakeholder.php");	
	}			

}

elseif(isset($_POST['addfocalperson'])) { //add national agenda
    $organization = $_POST['organization'];
    $name = $_POST['name'];
    $address =$_POST['address'];
    $telephone =$_POST['telephone'];
    $roles =$_POST['roles'];
    $department = $_POST['department'];
   
    $password = md5('123456');
    $reppassword = md5('123456');
    
    $_SESSION['action'] = 'Registered focal person';
   // $_SESSION['page'] = 'Add focal person page';
    
        $fileExistsFlag = 0; 
        $fileName = $_FILES['picture']['name'];
        $query = "SELECT * FROM `userinfo` WHERE ProfileImage='$fileName'"; 
        $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
        while($row = mysqli_fetch_array($result)) {
        if($row['ProfileImage'] == $fileName) {
        $fileExistsFlag = 1;
        } 
        }
        
        if($fileExistsFlag == 0) { 
        $target = "../images/"; 
        $fileTarget = $target.$fileName; 
        $tempFileName = $_FILES["picture"]["tmp_name"];
        $result = move_uploaded_file($tempFileName,$fileTarget);
        //echo $fileTarget;
        }

    $sql ="INSERT INTO `userinfo`(`Fullname`, `Email`, `PhoneNumber`, `Role`, `Password`, `ConfirmPassword`, `IsActive`, `Organization`, `ProfileImage`) 
            VALUES('$name', '$address', '$telephone', '$roles', '$password', '$reppassword', 'Active', '$organization', '$fileName')";

  	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data added successfully';  
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        
        $return = '../stakeholder.php';
        header('location:'.$return);
       // header("location: ../program.php?xyz=md5($id)");   
	} else {		
        $_SESSION['error'] = "Error..Data not added!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempted to register focal person';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header("location: ../stakeholder.php");	
	}			
}

elseif(isset($_POST['editme'])) { //edit institutions levels
   
    $me_organization = $_POST['me_organization'];
    $me_name = $_POST['me_name'];
    $me_telephone = $_POST['me_telephone'];
    $me_department = $_POST['me_department'];
    $me_address = $_POST['me_address'];
    $me_role = $_POST['me_role'];
    $me_status = $_POST['me_status'];
    
    $_SESSION['action'] = 'Edit user details';
    //$_SESSION['page'] = 'Edit user details';
    $id = $_POST['id'];



    if($me_status =='Reset'){
        $new_pdf = md5('123456');
        $sql ="UPDATE `userinfo` SET `Password`='$new_pdf' WHERE `id`='$id'";
    } else {
        $sql ="UPDATE `userinfo` SET `Fullname`='$me_name',`Email`='$me_address',`PhoneNumber`='$me_telephone',`Role`='$me_role',`IsActive`='$me_status',`Organization`='$me_organization' WHERE `id`='$id'";
    }

    
   	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data edited successfully';  
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        $return = '../stakeholder.php';
        header('location:'.$return);
       // header("location: ../program.php?xyz=md5($id)");   
	} else {		
        $_SESSION['error'] = "Error..Data not edit!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to edit user';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header("location: ../stakeholder.php");	
	}			
}

elseif(isset($_POST['deleteme'])) { //delete institution 
    $id = $_POST['id'];
    $sql = "DELETE FROM `userinfo` WHERE `id` = '$id'";
      $_SESSION['action'] = 'Deleted system user';
      
   	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data deleted successfully';  
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        $return = '../stakeholder.php';
        header('location:'.$return);
	} else {		
        $_SESSION['error'] = "Error..Data not deleted!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempted to delete system user';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header("location: ../stakeholder.php");	
	}			

}

elseif(isset($_POST['saverole'])) { //add resource
    $name =$_POST['rolename'];
    $pms = '';
    
     foreach($_POST['role'] as $selected) {
            $pms =$selected .','.$pms;
    }
 
    $_SESSION['action'] = 'Saved role permission';
    //$_SESSION['page'] = 'Add role and permission';

    $sql ="INSERT INTO `roletb`(`Name`, `Permission`)
            VALUES('$name', '$pms')";

  	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data added successfully';  
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        $return = '../permission.php';
        header('location:'.$return); 
	} else {		
        $_SESSION['error'] = "Error..Data not added!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to save role';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
         $return = '../permission.php';
        header('location:'.$return); 
      	
	}			
}

elseif(isset($_POST['updaterole'])) { //add resource
    $name =$_POST['RoleName'];
    $pms = '';
    $roleid = $_POST['RoleID'];
    
     foreach($_POST['role'] as $selected) {
            $pms =$selected .','.$pms;
    }
 
    $_SESSION['action'] = 'Updated role permission';
    //$_SESSION['page'] = 'Add role and permission';

    $sql ="UPDATE `roletb` SET `Name`='$name', `Permission`='$pms' WHERE `role_ID`='$roleid'";

  	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Updated permission successfully';  
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        $return = '../permission.php';
        header('location:'.$return); 
	} else {		
        $_SESSION['error'] = "Error..Data not added!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to edit role';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
         $return = '../permission.php' ;
        header('location:'.$return); 
      	
	}			
}

elseif(isset($_POST['addprojectkra'])) { //add national agenda
    $projid = $_POST['projid'];
    $activity =$_POST['activity'];
    $kpi =$_POST['kpi'];
    $plan =$_POST['plan'];
    $user =$_POST['user'];
   
    $_SESSION['action'] = 'Save project KPI';
    //$_SESSION['page'] = 'Add project kra';

    $sql ="INSERT INTO `project_kra`(`Project`, `activity_id`, `KPI`, `plan_id`, `submit_by`) 
                VALUES('$projid', '$activity', '$kpi', '$plan', '$user')";

  	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data added successfully';  
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        
        $return = '../assign_kra.php?id='.$projid;
        header('location:'.$return);
       // header("location: ../program.php?xyz=md5($id)");   
	} else {		
        $_SESSION['error'] = "Error..Data not added!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to save project kra';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
         $return = '../assign_kra.php?id='.$projid;
        header('location:'.$return);
	}			
}

elseif(isset($_POST['editprojectkra'])) { //edit school levels
    $projid = $_POST['proj_id'];
    $budgetterm =$_POST['budgetterm'];
    $kra =$_POST['kra'];
  
    $_SESSION['action'] = 'Edited project kra details';
    //$_SESSION['page'] = 'Edit project kra details';
    $id = $_POST['id'];
    $proj_id = $_POST['proj_id'];

    $sql ="UPDATE `project_kra` SET `Project`='$projid',`BudgetTerm`='$budgetterm', `KRA`='$kra' WHERE `projkraID`='$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data updated successfully';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../assign_kra.php?id='.$proj_id);
    } else {
        $_SESSION['error'] = 'Data not yet updated!';
        $_SESSION['action'] = 'Attempted to edit project kra details';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../assign_kra.php?id='.$proj_id);
    }		
}

elseif(isset($_POST['deleteprojectkra'])) {//addd school levels
    $id = $_POST['id'];
    $proj_id = $_POST['proj_id'];

    $_SESSION['action'] = 'Deleted project KRA';

    $sql = "DELETE FROM `project_kra` WHERE `projkraID` = '$id'";
    var_dump($sql);
    exit();
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data deleted successfully';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../assign_kra.php?id='.$id);
    } else {
        $_SESSION['error'] = 'Data is not deleted!';
        $_SESSION['action'] = 'Attempted to delete project KRA';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../assign_kra.php?id='.$id);
    }

}

elseif(isset($_POST['editprojectrsa'])) { //edit school levels
    $projid = $_POST['proj_id'];

    $particular =$_POST['particular'];
    $source =$_POST['source'];
    $amount =$_POST['amount'];
    $currency =$_POST['currency'];

   
    $_SESSION['action'] = 'Edited project resource details';
   // $_SESSION['page'] = 'Edit project resource details';
    $id = $_POST['id'];
    $proj_id = $_POST['proj_id'];

    $sql ="UPDATE `project_fund` SET `Particular`='$particular',`Source`='$source', `Amount`='$amount', `Currency`='$currency' WHERE `IDf`='$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data updated successfully';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../resource.php?id='.$proj_id);
    } else {
        $_SESSION['error'] = 'Data not yet updated!';
        $_SESSION['action'] = 'Attempted to edit project resource details';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../resource.php?id='.$proj_id);
    }		
}

elseif(isset($_POST['deleteprojectres'])) {//addd school levels
    $id = $_POST['id'];
    $proj_id = $_POST['proj_id'];
    $_SESSION['action'] = 'Deleted project resource';

    $sql = "DELETE FROM `project_expendicture` WHERE `IDf`= '$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data deleted successfully';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../resource.php?id='.$proj_id);
    } else {
        $_SESSION['error'] = 'Data is not deleted!';
        $_SESSION['action'] = 'Attempted to delete project resource';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../resource.php?id='.$proj_id);
    }

}

elseif(isset($_POST['addagendadetails'])) { //add resource
    $name =$_POST['title'];
    $detail = $_POST['description'];
    
     
    $_SESSION['action'] = 'Save strategy details';
    //$_SESSION['page'] = 'Add agenda details';

    $sql ="INSERT INTO `agendadetail`(`Title`, `Explaination`)
            VALUES('$name', '$detail')";

  	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data added successfully';  
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        $return = '../medashboard.php';
        header('location:'.$return); 
	} else {		
        $_SESSION['error'] = "Error..Data not added!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to save strategy details';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
         $return = '../medashboard.php';
        header('location:'.$return); 
      	
	}			
}

elseif(isset($_POST['editdetails'])) { //edit school levels
    $edit_dettitle = $_POST['edit_dettitle'];
    $edit_detstatement = $_POST['edit_detstatement'];
  
    $_SESSION['action'] = 'Edit agenda details';
    //$_SESSION['page'] = 'Add agenda details';
    $id = $_POST['id'];

    $sql ="UPDATE `agendadetail` SET `Title`='$edit_dettitle',`Explaination`='$edit_detstatement' WHERE `detail_ID`='$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data updated successfully';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../medashboard.php');
    } else {
        $_SESSION['error'] = 'Data not yet updated!';
        $_SESSION['action'] = 'Attempt to edit agenda details';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../medashboard.php');
    }		
}

elseif(isset($_POST['deletedetails'])) {//addd school levels
    $id = $_POST['id'];
    $_SESSION['action'] = 'Delete strategy details';

    $sql = "DELETE FROM `agendadetail` WHERE `detail_ID` = '$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data deleted successfully';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../medashboard.php');
    } else {
        $_SESSION['error'] = 'Data is not deleted!';
        $_SESSION['action'] = 'Attempt to delete strategy details';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../medashboard.php');
    }

}

elseif(isset($_POST['addpublication'])) { //add publication
        $fileExistsFlag = 0; 
        $fileName = $_FILES['file_rep']['name'];
        $query = "SELECT * FROM `publication` WHERE FileName='$fileName'"; 
        $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
        while($row = mysqli_fetch_array($result)) {
        if($row['FileName'] == $fileName) {
        $fileExistsFlag = 1;
        } 
        }
        
        if($fileExistsFlag == 0) { 
        $target = "Documents/"; 
        $fileTarget = $target.$fileName; 
        $tempFileName = $_FILES["file_rep"]["tmp_name"];
        $result = move_uploaded_file($tempFileName,$fileTarget);
        }
    $reportname =$_POST['reportname'];
    $status = $_POST['status'];
    $project = $_POST['program_id'];
     
    $_SESSION['action'] = 'Save publication';
    //$_SESSION['page'] = 'Add publication';

    $sql ="INSERT INTO `publication`(`ReportName`, `FileName`, `YearPublished`, `Project`, `Status`) 
            VALUES('$reportname', '$fileName', '', '$project', '$status')";

  	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data added successfully';  
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        $return = '../medashboard.php';
        header('location:'.$return); 
	} else {		
        $_SESSION['error'] = "Error..Data not added!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to save publication';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
         $return = '../medashboard.php';
        header('location:'.$return); 
      	
	}			
}

elseif(isset($_POST['deletepublication'])) {//addd school levels
    $id = $_POST['id'];
    $_SESSION['action'] = 'Delete Publication';
    $sql = "DELETE FROM `publication` WHERE `pub_ID` = '$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Data deleted successfully';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../medashboard.php');
    } else {
        $_SESSION['error'] = 'Data is not deleted!';
        $_SESSION['action'] = 'Attempt to delete publication';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        header('location: ../medashboard.php');
    }

}


//searching report
elseif(isset($_POST['find_kra_report'])) { //add m.e plan
    $program =mysqli_real_escape_string($conn,$_POST['program']);
    $datesearch =$_POST['datesearch'];
    $budgeterm = mysqli_real_escape_string($conn,$_POST['budgeterm']);
    // $baseline = mysqli_real_escape_string($conn,$_POST['baseline']);

    if(!empty($program) && !empty($datesearch) && !empty($budgeterm)){
        $sql ="SELECT * FROM project_kra
                INNER JOIN keyarea ON project_kra.KRA = keyarea.IDNo
                INNER JOIN projecttb ON project_kra.Project = projecttb.ID
                WHERE projecttb.ID='$program' AND projecttb.BudgetTerm='$budgeterm' AND project_kra.submited='$datesearch'";
    } elseif(!empty($program) && !empty($datesearch) && empty($budgeterm)){

    } elseif(!empty($program) && empty($datesearch) && !empty($budgeterm)){

    } elseif(empty($program) && !empty($datesearch) && !empty($budgeterm)){

    } elseif(!empty($program) && empty($datesearch) && empty($budgeterm)){

    } elseif(empty($program) && !empty($datesearch) && empty($budgeterm)){

    } elseif(empty($program) && empty($datesearch) && !empty($budgeterm)){
        
    }
    
    $_SESSION['action'] = 'find kra report';
    //$_SESSION['page'] = 'find_kra_report';

  	if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Data added successfully';  
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
        //userActivity();
        $return = '../m&e.php?id='.$project;
        header('location:'.$return);  
	} else {		
        $_SESSION['error'] = "Error..Data not added!".mysqli_error($conn);
        $_SESSION['action'] = 'Attempt to save organization';
        AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
       // userActivity();
        $return = '../m&e.php?id='.$project;
        header('location:'.$return);  
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
    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://"; 
	$user_ip_address = $_SERVER['REMOTE_ADDR']; 
	$referrer_url = !empty($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:'/'; 
	$user_agent = $_SERVER['HTTP_USER_AGENT']; 

    
    $page =me_encrypt_data($page);
	$activity =me_encrypt_data($activity);
	$method = me_encrypt_data($protocol);
	$ip_address = $user_ip_address;
	$device = me_encrypt_data($user_agent);

    $user = $user;
    //$date = date("Y-m-d h:i:sa");
    date_default_timezone_set('Africa/Nairobi'); // Then call the date functions
    $date = date('Y-m-d H:i:s');
    $sql ="INSERT INTO `audittb`(`Page`, `Activity`, `method`, `device`, `ip_address`, `CreatedBy`)
            VALUES('$page', '$activity', '$method', '$device', '$ip_address', '$user')";
     mysqli_query($conn, $sql);
 }


 function userActivity(){
    include 'conn.php'; 
     // Get current page URL 
    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://"; 
    
    $user_current_url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . $_SERVER['QUERY_STRING']; 
    
    // Get server related info 
    $user_ip_address = $_SERVER['REMOTE_ADDR']; 
    $referrer_url = !empty($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:'/'; 
    $user_agent = $_SERVER['HTTP_USER_AGENT']; 
    
    // Insert visitor activity log into database 
    $sql = "INSERT INTO visitor_activity_logs (user_ip_address, user_agent, page_url, referrer_url, created_on) VALUES ($user_ip_address, $user_agent,$user_current_url,$user_agent ,NOW())"; 
    //var_dump($sql);
    $insert = $conn->query($sql);
 }
 
 function guidv4($data = null) {
    // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
    $data = $data ?? random_bytes(16);
    assert(strlen($data) == 16);

    // Set version to 0100
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    // Set bits 6-7 to 10
    $data[8] = chr(ord($data[8])& 0x3f | 0x80);

    // Output the 36 character UUID.
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}


function gen_uuid() {
    return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        // 32 bits for "time_low"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),

        // 16 bits for "time_mid"
        mt_rand( 0, 0xffff ),

        // 16 bits for "time_hi_and_version",
        // four most significant bits holds version number 4
        mt_rand( 0, 0x0fff ) | 0x4000,

        // 16 bits, 8 bits for "clk_seq_hi_res",
        // 8 bits for "clk_seq_low",
        // two most significant bits holds zero and one for variant DCE1.1
        mt_rand( 0, 0x3fff ) | 0x8000,

        // 48 bits for "node"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
    );
}
?>