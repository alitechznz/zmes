<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
         <form action="reagent_edit.php" method="POST">
             <input type="hidden" class="empid" name="id">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span class="employee_id"></span></b></h4>
          	</div>
          	
          	<div class="modal-body">
            
            <div class="form-group">
                  <label for="exampleInputEmail1">Reagent Type </label>
                   <select class="form-control select2" id="editType" name="reagenttype">
                         <option selected="selected"></option>
                         <?php 
										 require('includes/conn.php');
											$query="SELECT * FROM reagentType";
											$result=mysqli_query($conn, $query);
											while ($row=mysqli_fetch_array($result)){
												echo '<option value='.$row['reagentName'].'>'.$row['reagentName'].'</option>';
											}
											mysqli_close($conn);
									  ?>
						</select>
            </div>
            <div class="row">
			  
			   <div class="col-xs-6">
                   <label>Volume/Weight</label>
                   <input type="text" class="form-control" id="editVolume" name="volume">
                </div>
                
                <div class="col-xs-6">
                   <label>Unit</label>
                    <input type="text" class="form-control"  id="editUnit" name="unit">
                </div>
            </div>
            
            <div class="form-group">
                  <label for="exampleInputEmail1">Name/Batch </label>
                  <input type="text" class="form-control" id="editBatch" name="batch">
            </div>   
            
            <div class="form-group">
                  <label for="exampleInputEmail1">Created By </label>
                  <input type="text" class="form-control"  placeholder="Created By" name="createdby" value ='<?php echo $user['Fullname']; ?>' required>
            </div>
				
			<div class="form-group">
                  <label for="exampleInputEmail1">Contamination </label>
                   <input type="text" class="form-control" id="editContamination" name="contamination">
            </div>
            
            <div class="row">
			  
			   <div class="col-xs-6">
                   <label>Concentration</label>
                    <input type="text" class="form-control"  id="editConcentration" name="concentration">
                </div>
                
                <div class="col-xs-6">
                   <label>Units</label>
                    <input type="text" class="form-control"  id="editUnitCon" name="conUnit">
                </div>
				
			</div>
			
            <div class="row">
			   <div class="col-xs-6">
                   <label>Manufactured Date</label>
                <input type="date" class="form-control" id="editManufacturedDate" name="manufacturedDate">
                </div>
			</div>
            
            <div class="row">
			   <div class="col-xs-6">
                   <label>Expeiry Date</label>
                <input type="date" class="form-control" id="editExpiryDate" name="expiryDate">
                </div>
			</div>
			
			<div class="form-group">
                <label>Comments</label>
                <textarea class="form-control" id="editComment" name="comment" required></textarea>
            </div>
			
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
            	
          	</div>
          	</form>
        </div>
    
    </div>
    
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span class="employee_id"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="reagent_delete.php">
            		<input type="hidden" class="empid" name="id">
            		<div class="text-center">
	                	<p>DELETE REAGENT?</p>
	                	<h2 class="bold del_employee_name"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- View info -->
<div class="modal fade" id="view">
    <div class="modal-dialog">
        <div class="modal-content">
         <form action="reagent_edit.php" method="POST">
             <input type="hidden" class="empid" name="id">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span class="employee_id"></span></b></h4>
          	</div>
          	
          	<div class="modal-body">
            
            <div class="form-group">
                  <label for="exampleInputEmail1">Reagent Type </label>
                  <input type="text" class="form-control" readonly="" id="viewType" name="type">
            </div>
            <div class="row">
			  
			   <div class="col-xs-6">
                   <label>Volume/Weight</label>
                   <input type="text" class="form-control" readonly="" id="viewVolume" name="volume">
                </div>
                
                <div class="col-xs-6">
                   <label>Unit</label>
                    <input type="text" class="form-control"  readonly="" id="viewUnit" name="unit">
                </div>
            </div>
            
            <div class="form-group">
                  <label for="exampleInputEmail1">Name/Batch </label>
                  <input type="text" class="form-control" readonly="" id="viewBatch" name="batch">
            </div>   
            
            <div class="form-group">
                  <label for="exampleInputEmail1">Created By </label>
                  <input type="text" class="form-control"  readonly="" placeholder="Created By" name="createdby" value ='<?php echo $user['Fullname']; ?>' required>
            </div>
				
			<div class="form-group">
                  <label for="exampleInputEmail1">Contamination </label>
                   <input type="text" class="form-control" readonly="" id="viewContamination" name="contamination">
            </div>
            
            <div class="row">
			  
			   <div class="col-xs-6">
                   <label>Concentration</label>
                    <input type="text" class="form-control"  readonly="" id="viewConcentration" name="concentration">
                </div>
                
                <div class="col-xs-6">
                   <label>Units</label>
                    <input type="text" class="form-control"  readonly=""  id="viewUnitCon" name="conUnit">
                </div>
				
			</div>
			
            <div class="row">
			   <div class="col-xs-6">
                   <label>Manufactured Date</label>
                <input type="date" class="form-control" readonly="" id="viewManufacturedDate" name="manufacturedDate">
                </div>
			</div>
            
            <div class="row">
			   <div class="col-xs-6">
                   <label>Expeiry Date</label>
                <input type="date" class="form-control" readonly="" id="viewExpiryDate" name="expiryDate">
                </div>
			</div>
			
			<div class="form-group">
                <label>Comments</label>
                <textarea class="form-control" readonly="" id="viewComment" name="comment" required></textarea>
            </div>
			
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
          	</div>
          	</form>
        </div>
    
    </div>
    
</div>