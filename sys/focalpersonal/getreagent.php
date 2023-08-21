<?php 
$q = $_GET['q'];

include ('includes/conn.php');

$desc ="";
$sql="SELECT * FROM reagenttype WHERE reagentName='$q'";
$sresult = mysqli_query($conn,$sql);
if($srow = mysqli_fetch_array($sresult)) { 
 $desc = $srow['description'];
 $typer = $srow['reagentName'];
}

$sql="SELECT * FROM reagent WHERE type='$q'";
$sresult = mysqli_query($conn,$sql);

//var_dump($sql);
//exit;

  if($srow = mysqli_fetch_array($sresult)) { 
      
     echo '
	            
	         		
			<div class="row">
			  
			   <div class="col-xs-6">
                   <label>Volume/Weight</label>
                   <input type="text" class="form-control"  placeholder="Enter Volume/Weightl" name="volume" value="'.$srow['Volume_Qnt'].'" readonly>
                </div>
                
                <div class="col-xs-6">
                   <label>Unit</label>
                    <input type="text" class="form-control"  placeholder="Enter Unit" name="Vunit" value="'.$srow['Volume_Unit'].'" readonly>
                </div>
              </div>
			  
			  <div class="form-group">
                  <label for="exampleInputEmail1">Batch No </label>
                  <input type="text" class="form-control" id="" placeholder="Name/Batch" name="batch" value="'.$srow['NameBatch'].'" required>
                </div>
			  
				
				 <div class="form-group">
                  <label for="exampleInputEmail1">Contamination </label>
                   <input type="text" class="form-control" id="" placeholder="Enter Contamination" name="contamination" value="'.$srow['Contamination'].'" readonly>
                </div>
				
				
            <div class="row">
			  
			   <div class="col-xs-6">
                   <label>Concentration</label>
                    <input type="text" class="form-control"  placeholder="Concentration" name="concentration" value="'.$srow['Concentration'].'" readonly>
                </div>
                
                <div class="col-xs-6">
                   <label>Units</label>
                    <input type="text" class="form-control"  placeholder="Enter Unit" name="Cunit" value="'.$srow['Cont_Unit'].'" readonly>
                </div>
				
				</div>
				<div class="col-xs-6">
                 <label > Date Created </label>
                  <input type="date" class="form-control" id="date-timepicker1" placeholder="Enter Date Created" name="createdon" value="'.$srow['DateCreated'].'" readonly>
                </div>
				
			   <div class="col-xs-6">
                   <label>Expeiry Date</label>
                <input type="date" class="form-control" id="date-timepicker1" placeholder="Enter Expeiry Date" name="expiry" value="'.$srow['ExpeiryDate'].'" required>
                </div>

                
                   
			   <div class="form-group">
                   <label>Description</label>
                   <textarea class="form-control" placeholder="Enter description ..." name="comment"  required>'.$desc.'</textarea>
                </div>	
				
				<div class="form-group">
                      <label>Comments</label>
                      <textarea class="form-control" placeholder="Enter description ..." name="comment"  required>'.$srow['Comment'].'</textarea>
                    </div>				
								
								';
			
	 }  else {
		   echo '
	        
			  <div class="form-group">
                  <label for="exampleInputEmail1">Batch No </label>
                  <input type="text" class="form-control" id="" placeholder="Name/Batch" name="batch" value="'.$srow['NameBatch'].'" required>
                </div>
			  
			   <div class="form-group">
                   <label>Expeiry Date</label>
                <input type="date" class="form-control" id="date-timepicker1" placeholder="Enter Expeiry Date" name="expiry" value="'.$srow['ExpeiryDate'].'" required>
                </div>
								';
	 }
mysqli_close($conn);
?>