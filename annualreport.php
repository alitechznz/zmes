<?php include "header.php"; ?>
<body class="hold-transition light-skin sidebar-mini theme-primary">
	
<div class="wrapper">

  <?php 
    include "navigator.php"; 
    include "menu.php";
    ?>
  
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container">
      <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Annual Monitoring Form</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Form</li>
								<li class="breadcrumb-item active" aria-current="page">Annual Monitoring</li>
							</ol>
						</nav>
					</div>
				</div>
				
			</div>
		</div>	  
		<!-- Main content -->
		<section class="content">
			<div class="row">
            <div class="col-12">
			  <div class="box box-default">
				<div class="box-body">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profile8" role="tab"><span><i class="ion-home mr-15"></i>ANNEX 1 FORM </span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#home8" role="tab"><span><i class="ion-home mr-15"></i>Confirmation of Annex 1 form</span></a> </li>
                    </ul>
					<!-- Tab panes -->
					<div class="tab-content tabcontent-border">
						
						<div class="tab-pane active" id="profile8" role="tabpanel">
							<div class="p-15">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">Implementation status of Institutional Interventions as Per MKUZA III (Please fill in for indicators that are relevant to your organization)</h4>
                                    </div>   
                                            <div class="box-body pb-0">
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>Key Result Area</label>
                                                    <select class="form-control select2" style="width: 100%;">
                                                    <option selected="selected">Select..</option>
                                                    <?php 
                                                        include '';

                                                    ?>
                                                    <option>Alaska</option>
                                                    </select>
                                                </div>
                                                <!-- /.form-group -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>Outcome Statement</label>
                                                    <select class="form-control select2" disabled="disabled" style="width: 100%;">
                                                    <option selected="selected">Select</option>
                                                    <option>Alaska</option>
                                                    <option>California</option>
                                                    <option>Delaware</option>
                                                    <option>Tennessee</option>
                                                    <option>Texas</option>
                                                    <option>Washington</option>
                                                    </select>
                                                </div>
                                                <!-- /.form-group -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>Outcome Indicator</label>
                                                    <input class="form-control" type="text" placeholder="Postal Address" id="example-text-input" style="width: 100%;">
                                                    
                                                </div>
                                                <!-- /.form-group -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>Definition</label>
                                                    <textarea name="shortDescription" id="shortDescription2 " rows="6" class="form-control"></textarea>
                                                </div>
                                                <!-- /.form-group -->
                                                </div>
                                                <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>Baseline (Year)</label>
                                                    <input class="form-control" type="text" placeholder="Postal Address" id="example-text-input">
                                                </div>
                                                <!-- /.form-group -->
                                                </div>
                                                <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>Data Source</label>
                                                    <input class="form-control" type="text" placeholder="Postal Address" id="example-text-input">
                                                </div>
                                                <!-- /.form-group -->
                                                </div>
                                                <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>Target</label>
                                                    <input class="form-control" type="text" placeholder="Postal Address" id="example-text-input">
                                                </div>
                                                <!-- /.form-group -->
                                                </div>
                                                <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <input class="form-control" type="text" placeholder="Postal Address" id="example-text-input">
                                                </div>
                                                <!-- /.form-group -->
                                                </div>
                                                <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>Remarks</label>
                                                    <input class="form-control" type="text" placeholder="Postal Address" id="example-text-input">
                                                </div>
                                                <!-- /.form-group -->
                                                </div>
                                                <div class="col-12 text-center">
                                                    <button type="submit" name="login" class="btn btn-primary mt-11">Save</button>
                                                    <a href="index.php" class="btn btn-dark btn-outline">Clear</a>
                                                    
                                                </div>
                                            </div>
                                            <!-- /.row -->
                                            </div>
                                            <!-- /.box-body -->
                                            <br /><br />
				
                                            <div class="table-responsive">
                                    <table id="example5" class="table table-bordered table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>key result area</th>
                                                <th>Outcome Indicator</th>
                                                <th>Definition</th>
                                                <th>Baseline</th>
                                                <th>Data Source</th>
                                                <th>Target</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                            <tr>
                                                <td>North Unguja</td>
                                                <td>Fishering</td>
                                                <td>Green Economics</td>
                                                <td>SMZ & UN</td>
                                                <td><span class="badge badge-primary-light">Approved</span></td>
                                                <td><span class="badge badge-primary-light">Approved</span></td>
                                                <td>
                                                     <a href="#" class="btn"><span class="icon-Write"><span class="path1"></span><span class="path2"></span></span></a>
                                                    <a href="#" class="waves-effect waves-light btn btn-danger-light btn-circle"><span class="icon-Trash1 font-size-18"><span class="path1"></span><span class="path2"></span></span></a>
                                                </td>
                                                
                                            </tr>
                                
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                            <th>key result area</th>
                                                <th>Outcome Indicator</th>
                                                <th>Definition</th>
                                                <th>Baseline</th>
                                                <th>Data Source</th>
                                                <th>Target</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                              
                            </div>
						</div>
                       
                        <div class="tab-pane" id="home8" role="tabpanel">
							<div class="p-15">
                                <div class="col-md-12 obox-header with-border">
                                    <h4 class="box-title">Approved by Head of Organization:</h4>
                                 </div>    
                                 <div class="box-body pb-0">
                                    <div class="row">   
                                    <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input class="form-control" type="text" placeholder="Postal Address" id="example-text-input">
                                                </div>
                                                <!-- /.form-group -->
                                                </div>
                                                <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <input class="form-control" type="text" placeholder="Postal Address" id="example-text-input">
                                                </div>
                                                <!-- /.form-group -->
                                                </div>   
                                                <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label>Date</label>
                                                    <input class="form-control" type="date" placeholder="Postal Address" id="example-text-input">
                                                </div>
                                                <!-- /.form-group -->
                                                </div> 
                                                <input type="checkbox" id="basic_checkbox_1" />
						                        <label for="basic_checkbox_1">I verify that the information in the form is accurate and based on the records kept by my organization</label>      
                                                <div class="col-12 text-center">
                                                    <button type="submit" name="login" class="btn btn-primary mt-11">Submit</button>
                                                    <a href="index.php" class="btn btn-dark btn-outline">Clear</a>
                                                    
                                                </div>
                                            </div>
                                </div>
							</div>
                        </div>
					
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->
			</div>
			<!-- /.col -->

            
            
		</section>
		<!-- /.content -->
	  </div>
  </div>
 <?php include "footer2.php"; ?>