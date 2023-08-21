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
					<h3 class="page-title">General Project Form</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Forms</li>
								<li class="breadcrumb-item active" aria-current="page">Projects</li>
							</ol>
						</nav>
					</div>
				</div>
				
			</div>
		</div>	  
		<!-- Main content -->
		<section class="content">
			<div class="row">
             <div class="col-lg-12 col-12">


					<!-- Basic Forms -->
					  <div class="box">
						<div class="box-header with-border">
						  <h4 class="box-title">New Project</h4>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
						  <div class="row">
							<div class="col-6">
								<div class="form-group row">
								  <label for="example-text-input" class="col-sm-4 col-form-label">Project title</label>
								  <div class="col-sm-8">
									<input class="form-control" type="text" placeholder="Project title" id="example-text-input">
								  </div>
                                </div>
                                <div class="form-group row">
								  <label for="example-text-input" class="col-sm-4 col-form-label">Short title</label>
								  <div class="col-sm-8">
									<input class="form-control" type="text" placeholder="Short title" id="example-text-input">
								  </div>
                                </div>
                                <div class="form-group row">
								  <label for="example-text-input" class="col-sm-4 col-form-label">Code</label>
								  <div class="col-sm-8">
									<input class="form-control" type="text" placeholder="Code" id="example-text-input">
								  </div>
								</div>
								
                            </div>
                            <div class="col-6">
								<div class="form-group row">
								  <label for="example-text-input" class="col-sm-3 col-form-label">Duration</label>
								  <div class="col-sm-4">
									<input class="form-control" type="number" value="Johen Doe" id="example-text-input">
                                  </div>
                                  <div class="col-sm-5">
                                    <select class="form-control">
                                            <option value="months">months</option>
                                            <option value="years">years</option>
                                    </select>
								  </div>
                                </div>
                                <div class="form-group row">
								  <label for="example-text-input" class="col-sm-3 col-form-label">Start Date</label>
								  <div class="col-sm-9">
                                    <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
								  </div>
                                </div>
                                <div class="form-group row">
								  <label for="example-text-input" class="col-sm-3 col-form-label">End Date</label>
								  <div class="col-sm-9">
                                     <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
								  </div>
								</div>
								
								
							</div>
							<!-- /.col -->
						  </div>
						  <!-- /.row -->
						</div>
						<!-- /.box-body -->
					  </div>
                      <!-- /.box -->
                      <div class="box box-default">
                            <!-- /.box-header -->
                            <div class="box-body wizard-content">
                                <form action="#" class="tab-wizard vertical wizard-circle">
                                    <!-- Step 1 -->
                                    <h6>Description</h6>
                                    <section>
                                         <div class="row">
                                               <!-- Nav tabs -->
                                               <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-top:-2px;">
                                                            <li class="nav-item"> <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home5" role="tab" aria-controls="home5" aria-expanded="true"><span class="hidden-sm-up"><i class="ion-home"></i></span> <span class="hidden-xs-down">General Information</span></a> </li>
                                                           
                                                            <li class="nav-item"> <a class="nav-link" id="dropdown1-tab" data-toggle="tab" href="#dropdown1" role="tab" aria-controls="profile"><span class="hidden-sm-up"><i class="ion-person"></i></span> <span class="hidden-xs-down">Description</span></a></li>
                                         
                                                        </ul>
                                                        <!-- Tab panes -->
                                                        <div class="tab-content tabcontent-border p-15" id="myTabContent">
                                                            <div role="tabpanel" class="tab-pane fade show active" id="home5" aria-labelledby="home-tab" style="width:100%">
                                                                <div class="form-group">
                                                                    
                                                                        <div class="form-group row">
                                                                            <label for="example-text-input" class="col-sm-4 col-form-label">Assign to the Project Agenda</label>
                                                                            <div class="col-sm-8">
                                                                                <select class="form-control">
                                                                                    <option value="days" selected>SDGs</option>
                                                                                        <option value="weeks">Agenda 2030</option>
                                                                                        <option value="months">Agenda 2063</option>
                                                                                        <option value="years">ZSGRP</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    
                                                                    <div class="row">
                                                                        <h5>Project Status:</h5>
                                                                    </div>
                                                                
                                                                    <div class="radio">
                                                                        <input name="group1" type="radio" id="Option_1" checked>
                                                                        <label for="Option_1"><b>IDENTIFICATION:</b>&mdash;The project is being scoped or planned</label>                    
                                                                    </div>
                                                                    <div class="radio">
                                                                        <input name="group1" type="radio" id="Option_2" >
                                                                        <label for="Option_2"><b>IMPLEMENTATION:</b>&mdash;The project is currently being implemented</label>   
                                                                    </div>
                                                                    <div class="radio">
                                                                        <input name="group1" type="radio" id="Option_3" >
                                                                        <label for="Option_3"><b>COMPLETION:</b>&mdash;Physical activity is complete or the final disbursement has been made. </label>   
                                                                    </div>
                                                                    <div class="radio">
                                                                        <input name="group1" type="radio" id="Option_4">
                                                                        <label for="Option_4"><b>POST-COMPLETION:</b>&mdash;Physical activity is complete or the final disbursement has been made, but the activity remains open pending financial sign off or M&E</label>                    
                                                                    </div>
                                                                    <div class="radio">
                                                                        <input name="group1" type="radio" id="Option_5" >
                                                                        <label for="Option_5"><b>CANCELLED:</b>&mdash;The project has been cancelled</label>   
                                                                    </div>
                                                                    <div class="radio">
                                                                        <input name="group1" type="radio" id="Option_6" >
                                                                        <label for="Option_6"><b>SUSPENDED:</b>&mdash;The project has been temporarily suspended</label>   
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <h5>Funding Type:</h5>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col-sm-12" style="">
                                                                        
                                                                        <div class="form-group">
                                                                            <div class="checkbox">
                                                                                <input type="checkbox" id="Checkbox_1">
                                                                                <label for="Checkbox_1">Government</label>
                                                                            </div>

                                                                            <div class="checkbox">
                                                                                <input type="checkbox" id="Checkbox_2">
                                                                                <label for="Checkbox_2">Donor</label>
                                                                            </div>

                                                                            <div class="checkbox">
                                                                                <input type="checkbox" id="Checkbox_3">
                                                                                <label for="Checkbox_3">Donor & Government</label>                      
                                                                            </div>
                                                                           
                                                                        </div>
                                                                    </div>
                                                                 
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="profile5" role="tabpanel" aria-labelledby="profile-tab">
                                                                <br/><p>Write your project description in details.</p>
                                                            </div>
                                                            <div class="tab-pane fade" id="dropdown1" role="tabpanel" aria-labelledby="dropdown1-tab">
                                                                <div class="row"> 
                                                                        <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="shortDescription2">Job Description :</label>
                                                                            <textarea name="shortDescription" id="shortDescription2" rows="6" class="form-control"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <p>Donec vitae laoreet neque, id convallis ante. Phasellus a tellus molestie, varius massa in, suscipit diam. Nulla vulputate, nisi eget porttitor semper, quam justo volutpat lacus, in pretium augue tortor at leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi at nisl fringilla, malesuada quam eu, eleifend odio. Nulla nunc orci, aliquam quis ligula vel, porttitor tempus nibh. Praesent semper fermentum massa. Proin id maximus metus, vitae ultricies ante. Duis tempus, arcu a vulputate congue, purus ex rutrum elit, at imperdiet nisi nibh at purus. Nunc in fringilla erat.</p>
                                                            </div>
                                                          
                                                        </div>
                                        </div>
                                    </section>
                                    <!-- Step 2 -->
                                    <h6>Target Group</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="jobTitle6">Target Group :</label>
                                                    <input type="text" class="form-control" id="jobTitle6"> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="videoUrl2">Type :</label>
                                                    <input type="text" class="form-control" id="videoUrl2">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="shortDescription2">Location(s) :</label>
                                                    <textarea name="shortDescription" id="shortDescription2" rows="6" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="box">
                                                    <div class="box-header with-border">
                                                    <h4 class="box-title">Project Map Location</h4>
                                                    </div>
                                                    <!-- /.box-header -->
                                                    <div class="box-body">
                                                        <div id="world-map-markers" style="height: 400px"></div>
                                                    </div>
                                                    <!-- /.box-body -->
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <!-- Step 3 -->
                                  
                                    <!-- Step 4 -->
                                    <h6>Partners</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <h5>INSTITUTION</h5>
                                                <div class="form-group">
                                                    <label for="behName2">Name :</label>
                                                    <input type="text" class="form-control" id="behName2">
                                                </div>
                                                <div class="form-group">
                                                    <label for="participants5">Role :</label>
                                                    <input type="text" class="form-control" id="participants5">
                                                </div>
                                                <div class="form-group">
                                                    <label for="participants5">Address :</label>
                                                    <textarea name="decisions" id="decisions3" rows="4" class="form-control"></textarea>
                                                </div><br />
                                                <h5>PERSONAL</h5>
                                                <div class="form-group">
                                                    <label for="behName2">Name :</label>
                                                    <input type="text" class="form-control" id="behName2">
                                                </div>
                                                <div class="form-group">
                                                    <label for="behName2">Job Title :</label>
                                                    <input type="text" class="form-control" id="behName2">
                                                </div>
                                                <div class="form-group">
                                                    <label for="behName2">Mobile :</label>
                                                    <input type="text" class="form-control" id="behName2">
                                                </div>
                                                <div class="form-group">
                                                    <label for="behName2">Workphone :</label>
                                                    <input type="text" class="form-control" id="behName2">
                                                </div>
                                                <div class="form-group">
                                                    <label for="behName2">Email :</label>
                                                    <input type="text" class="form-control" id="behName2">
                                                </div>
                                                <div class="box-footer">
                                                    <button type="button" class="btn btn-rounded btn-warning btn-outline mr-1">
                                                        <i class="ti-trash"></i> Clear
                                                    </button>
                                                    <button type="submit" class="btn btn-rounded btn-primary btn-outline">
                                                        <i class="ti-save-alt"></i> ADD
                                                    </button>
                                                </div>  
                                                
                                            </div>
                                            <div class="col-md-8">
                                                <div class="table-responsive">
                                                    <table id="example5" class="table table-bordered table-striped" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Institution</th>
                                                                <th>Role</th>
                                                                <th>Address</th>
                                                                <th>Focal Personal</th>
                                                                <th>Action</th>
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        
                                                            <tr>
                                                                <td>North Unguja</td>
                                                                <td>Fishering</td>
                                                                <td>Green Economics</td>
                                                                <td>SMZ & UN</td>
                                                                
                                                                <td>
                                                                    <a href="#" class="waves-effect waves-light btn btn-primary-light btn-circle mx-5"><span class="icon-Write"><span class="path1"></span><span class="path2"></span></span></a>
                                                                    <a href="#" class="waves-effect waves-light btn btn-primary-light btn-circle"><span class="icon-Trash1 font-size-18"><span class="path1"></span><span class="path2"></span></span></a>
                                                                </td>
                                                                
                                                            </tr>
                                                            <tr>
                                                                <td>Unguja</td>
                                                                <td>Tourism</td>
                                                                <td>Promote Tourism for all</td>
                                                                <td>SMZ</td>
                                                            
                                                                <td>
                                                                    <a href="#" class="waves-effect waves-light btn btn-primary-light btn-circle mx-5"><span class="icon-Write"><span class="path1"></span><span class="path2"></span></span></a>
                                                                    <a href="#" class="waves-effect waves-light btn btn-primary-light btn-circle"><span class="icon-Trash1 font-size-18"><span class="path1"></span><span class="path2"></span></span></a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Pemba</td>
                                                                <td>Agriculture</td>
                                                                <td>Increasing Cloves</td>
                                                                <td>SMZ</td>
                                        
                                                                <td>
                                                                    <a href="#" class="waves-effect waves-light btn btn-primary-light btn-circle mx-5"><span class="icon-Write"><span class="path1"></span><span class="path2"></span></span></a>
                                                                    <a href="#" class="waves-effect waves-light btn btn-primary-light btn-circle"><span class="icon-Trash1 font-size-18"><span class="path1"></span><span class="path2"></span></span></a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Zanzibar</td>
                                                                <td>Women Agenda</td>
                                                                <td>Women Participation</td>
                                                                <td>UNSF</td>
                                                                
                                                                <td>
                                                                    <a href="#" class="waves-effect waves-light btn btn-primary-light btn-circle mx-5"><span class="icon-Write"><span class="path1"></span><span class="path2"></span></span></a>
                                                                    <a href="#" class="waves-effect waves-light btn btn-primary-light btn-circle"><span class="icon-Trash1 font-size-18"><span class="path1"></span><span class="path2"></span></span></a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Unguja</td>
                                                                <td>Tourism</td>
                                                                <td>Promote Tourism for all</td>
                                                                <td>SMZ</td>
                                                            
                                                                <td>
                                                                    <a href="#" class="waves-effect waves-light btn btn-primary-light btn-circle mx-5"><span class="icon-Write"><span class="path1"></span><span class="path2"></span></span></a>
                                                                    <a href="#" class="waves-effect waves-light btn btn-primary-light btn-circle"><span class="icon-Trash1 font-size-18"><span class="path1"></span><span class="path2"></span></span></a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Pemba</td>
                                                                <td>Agriculture</td>
                                                                <td>Increasing Cloves</td>
                                                                <td>SMZ</td>
                                                            <td>
                                                                    <a href="#" class="waves-effect waves-light btn btn-primary-light btn-circle mx-5"><span class="icon-Write"><span class="path1"></span><span class="path2"></span></span></a>
                                                                    <a href="#" class="waves-effect waves-light btn btn-primary-light btn-circle"><span class="icon-Trash1 font-size-18"><span class="path1"></span><span class="path2"></span></span></a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Zanzibar</td>
                                                                <td>Women Agenda</td>
                                                                <td>Women Participation</td>
                                                                <td>UNSF</td>
                                                                
                                                                <td>
                                                                    <a href="#" class="waves-effect waves-light btn btn-primary-light btn-circle mx-5"><span class="icon-Write"><span class="path1"></span><span class="path2"></span></span></a>
                                                                    <a href="#" class="waves-effect waves-light btn btn-primary-light btn-circle"><span class="icon-Trash1 font-size-18"><span class="path1"></span><span class="path2"></span></span></a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                            <th>Institution</th>
                                                                <th>Role</th>
                                                                <th>Address</th>
                                                                <th>Focal Personal</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                             
                                            </div>
                                           
                                        </div><br />
                                       
                                    </section>
                                    <!-- Step 4 -->
                                    <h6>Funding</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <h5>Funding Details</h5>
                                                <div class="form-group">
                                                    <label for="behName2">Financial Code :</label>
                                                    <input type="text" class="form-control" id="behName2" placeholder="Financial Code">
                                                </div>
                                                <div class="form-group">
                                                    <label for="participants5">Funder</label>
                                                    <input type="text" class="form-control" id="participants5" placeholder="Funder">
                                                </div>
                                                <div class="form-group">
                                                    <label for="participants5">Budget Line</label>
                                                    <input type="text" class="form-control" id="participants5" placeholder="Budget Line">
                                                </div>
                                                <div class="form-group">
                                                    <label for="participants5">Amount</label>
                                                    <input type="text" class="form-control" id="participants5" placeholder="Amount">
                                                </div>
                                                <div class="form-group">
                                                    <label for="participants5">Percentage of Budget</label>
                                                    <input type="text" class="form-control" id="participants5" placeholder="Percentage of Budget">
                                                </div>
                                                <div class="form-group">
                                                    <label for="participants5">Date of Approval by founder</label>
                                                    <input type="date" class="form-control" id="participants5" placeholder="Percentage of Budget">
                                                </div>
                                                <div class="form-group">
                                                    <label for="participants5">Start date of Contract</label>
                                                    <input type="date" class="form-control" id="participants5" placeholder="Start date of Contract">
                                                </div>
                                                <div class="form-group">
                                                    <label for="participants5">Deadline</label>
                                                    <input type="date" class="form-control" id="participants5" placeholder="Deadline">
                                                </div>
                                                <div class="form-group">
                                                    <label for="participants5">Type</label>
                                                    <input type="text" class="form-control" id="participants5" placeholder="Type">
                                                </div>
                                                <div class="form-group">
                                                    <label for="participants5">Description</label>
                                                    <textarea type="text" row="4" class="form-control" id="participants5" placeholder="Type"></textarea>
                                                </div>
                                                <div class="box-footer">
                                                    <button type="button" class="btn btn-rounded btn-warning btn-outline mr-1">
                                                        <i class="ti-trash"></i> Clear
                                                    </button>
                                                    <button type="submit" class="btn btn-rounded btn-primary btn-outline">
                                                        <i class="ti-save-alt"></i> ADD
                                                    </button>
                                                </div>  
                                            </div>
                                            <div class="col-md-8">
                                                <div class="table-responsive">
                                                    <table id="example6" class="table table-bordered table-striped" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Funder</th>
                                                                <th>Amount</th>
                                                                <th>Type</th>
                                                                <th>Description</th>
                                                                <th>Action</th>
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        
                                                            <tr>
                                                                <td>North Unguja</td>
                                                                <td>Fishering</td>
                                                                <td>Green Economics</td>
                                                                <td>SMZ & UN</td>
                                                                
                                                                <td>
                                                                    <a href="#" class="waves-effect waves-light btn btn-primary-light btn-circle mx-5"><span class="icon-Write"><span class="path1"></span><span class="path2"></span></span></a>
                                                                    <a href="#" class="waves-effect waves-light btn btn-primary-light btn-circle"><span class="icon-Trash1 font-size-18"><span class="path1"></span><span class="path2"></span></span></a>
                                                                </td>
                                                                
                                                            </tr>
                                                            <tr>
                                                                <td>Unguja</td>
                                                                <td>Tourism</td>
                                                                <td>Promote Tourism for all</td>
                                                                <td>SMZ</td>
                                                            
                                                                <td>
                                                                    <a href="#" class="waves-effect waves-light btn btn-primary-light btn-circle mx-5"><span class="icon-Write"><span class="path1"></span><span class="path2"></span></span></a>
                                                                    <a href="#" class="waves-effect waves-light btn btn-primary-light btn-circle"><span class="icon-Trash1 font-size-18"><span class="path1"></span><span class="path2"></span></span></a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Pemba</td>
                                                                <td>Agriculture</td>
                                                                <td>Increasing Cloves</td>
                                                                <td>SMZ</td>
                                        
                                                                <td>
                                                                    <a href="#" class="waves-effect waves-light btn btn-primary-light btn-circle mx-5"><span class="icon-Write"><span class="path1"></span><span class="path2"></span></span></a>
                                                                    <a href="#" class="waves-effect waves-light btn btn-primary-light btn-circle"><span class="icon-Trash1 font-size-18"><span class="path1"></span><span class="path2"></span></span></a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Zanzibar</td>
                                                                <td>Women Agenda</td>
                                                                <td>Women Participation</td>
                                                                <td>UNSF</td>
                                                                
                                                                <td>
                                                                    <a href="#" class="waves-effect waves-light btn btn-primary-light btn-circle mx-5"><span class="icon-Write"><span class="path1"></span><span class="path2"></span></span></a>
                                                                    <a href="#" class="waves-effect waves-light btn btn-primary-light btn-circle"><span class="icon-Trash1 font-size-18"><span class="path1"></span><span class="path2"></span></span></a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Unguja</td>
                                                                <td>Tourism</td>
                                                                <td>Promote Tourism for all</td>
                                                                <td>SMZ</td>
                                                            
                                                                <td>
                                                                    <a href="#" class="waves-effect waves-light btn btn-primary-light btn-circle mx-5"><span class="icon-Write"><span class="path1"></span><span class="path2"></span></span></a>
                                                                    <a href="#" class="waves-effect waves-light btn btn-primary-light btn-circle"><span class="icon-Trash1 font-size-18"><span class="path1"></span><span class="path2"></span></span></a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Pemba</td>
                                                                <td>Agriculture</td>
                                                                <td>Increasing Cloves</td>
                                                                <td>SMZ</td>
                                                            <td>
                                                                    <a href="#" class="waves-effect waves-light btn btn-primary-light btn-circle mx-5"><span class="icon-Write"><span class="path1"></span><span class="path2"></span></span></a>
                                                                    <a href="#" class="waves-effect waves-light btn btn-primary-light btn-circle"><span class="icon-Trash1 font-size-18"><span class="path1"></span><span class="path2"></span></span></a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Zanzibar</td>
                                                                <td>Women Agenda</td>
                                                                <td>Women Participation</td>
                                                                <td>UNSF</td>
                                                                
                                                                <td>
                                                                    <a href="#" class="waves-effect waves-light btn btn-primary-light btn-circle mx-5"><span class="icon-Write"><span class="path1"></span><span class="path2"></span></span></a>
                                                                    <a href="#" class="waves-effect waves-light btn btn-primary-light btn-circle"><span class="icon-Trash1 font-size-18"><span class="path1"></span><span class="path2"></span></span></a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Funder</th>
                                                                <th>Amount</th>
                                                                <th>Type</th>
                                                                <th>Description</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <!-- Step 4 -->
                                    <h6>Monitoring deadline</h6>
                                    <section>
                                        <div class="row b-groove">
                                            <div class="col-md-4">
                                                
                                                <div class="form-group">
                                                    <label for="behName2">Category :</label>
                                                    <select class="custom-select form-control" id="participants6" name="location">
                                                        <option value="">Impact Measurement Frequency</option>
                                                        <option value="Selected">Effect Measurement Frequency</option>
                                                        <option value="Rejected">Result Measurement Frequency</option>
                                                        <option value="Call Second-time">Progress Measurement Frequency</option>
                                                        <option value="">Risk Monitoring Frequency</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                               
                                                <div class="form-group">
                                                    <label for="behName2">Set Target :</label>
                                                    <select class="custom-select form-control" id="participants6" name="location">
                                                        <option value="">Select Result</option>
                                                        <option value="Selected">Single target</option>
                                                        <option value="Rejected">Yearly target</option>
                                                        <option value="Call Second-time">Twice yearly target</option>
                                                        <option value="Selected">Quartely target</option>
                                                        <option value="Rejected">Monthly target</option>
                                                        <option value="Rejected">User defined target</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="decisions3">Starting:</label>
                                                    <input type="date" name="decisions" id="decisions3" class="form-control" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="decisions3">Ending:</label>
                                                    <input type="date" name="decisions" id="decisions3" class="form-control" />
                                                </div>
                                                <div class="box-footer">
                                                    <button type="submit" class="btn btn-rounded btn-primary btn-outline">
                                                        <i class="ti-save-alt"></i> ADD
                                                    </button>
                                                </div>  
                                            </div>
                                         
                                        </div><br />
                                
                                        <div class="row">
                                        <div class="table-responsive">
                                                    
                                                    <table id="example1" class="table table-bordered table-striped" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Category</th>
                                                                <th>Target</th>
                                                                <th>Starting</th>
                                                                <th>Ending</th>
                                                                <th>Action</th>
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        
                                                            <tr>
                                                                <td>North Unguja</td>
                                                                <td>Fishering</td>
                                                                <td>Green Economics</td>
                                                                <td>SMZ & UN</td>
                                                                
                                                                <td>
                                                                    <a href="#" class="waves-effect waves-light btn btn-primary-light btn-circle mx-5"><span class="icon-Write"><span class="path1"></span><span class="path2"></span></span></a>
                                                                    <a href="#" class="waves-effect waves-light btn btn-primary-light btn-circle"><span class="icon-Trash1 font-size-18"><span class="path1"></span><span class="path2"></span></span></a>
                                                                </td>
                                                                
                                                            </tr>
                                                            <tr>
                                                                <td>Unguja</td>
                                                                <td>Tourism</td>
                                                                <td>Promote Tourism for all</td>
                                                                <td>SMZ</td>
                                                            
                                                                <td>
                                                                    <a href="#" class="waves-effect waves-light btn btn-primary-light btn-circle mx-5"><span class="icon-Write"><span class="path1"></span><span class="path2"></span></span></a>
                                                                    <a href="#" class="waves-effect waves-light btn btn-primary-light btn-circle"><span class="icon-Trash1 font-size-18"><span class="path1"></span><span class="path2"></span></span></a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Pemba</td>
                                                                <td>Agriculture</td>
                                                                <td>Increasing Cloves</td>
                                                                <td>SMZ</td>
                                        
                                                                <td>
                                                                    <a href="#" class="waves-effect waves-light btn btn-primary-light btn-circle mx-5"><span class="icon-Write"><span class="path1"></span><span class="path2"></span></span></a>
                                                                    <a href="#" class="waves-effect waves-light btn btn-primary-light btn-circle"><span class="icon-Trash1 font-size-18"><span class="path1"></span><span class="path2"></span></span></a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Zanzibar</td>
                                                                <td>Women Agenda</td>
                                                                <td>Women Participation</td>
                                                                <td>UNSF</td>
                                                                
                                                                <td>
                                                                    <a href="#" class="waves-effect waves-light btn btn-primary-light btn-circle mx-5"><span class="icon-Write"><span class="path1"></span><span class="path2"></span></span></a>
                                                                    <a href="#" class="waves-effect waves-light btn btn-primary-light btn-circle"><span class="icon-Trash1 font-size-18"><span class="path1"></span><span class="path2"></span></span></a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Unguja</td>
                                                                <td>Tourism</td>
                                                                <td>Promote Tourism for all</td>
                                                                <td>SMZ</td>
                                                            
                                                                <td>
                                                                    <a href="#" class="waves-effect waves-light btn btn-primary-light btn-circle mx-5"><span class="icon-Write"><span class="path1"></span><span class="path2"></span></span></a>
                                                                    <a href="#" class="waves-effect waves-light btn btn-primary-light btn-circle"><span class="icon-Trash1 font-size-18"><span class="path1"></span><span class="path2"></span></span></a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Pemba</td>
                                                                <td>Agriculture</td>
                                                                <td>Increasing Cloves</td>
                                                                <td>SMZ</td>
                                                            <td>
                                                                    <a href="#" class="waves-effect waves-light btn btn-primary-light btn-circle mx-5"><span class="icon-Write"><span class="path1"></span><span class="path2"></span></span></a>
                                                                    <a href="#" class="waves-effect waves-light btn btn-primary-light btn-circle"><span class="icon-Trash1 font-size-18"><span class="path1"></span><span class="path2"></span></span></a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Zanzibar</td>
                                                                <td>Women Agenda</td>
                                                                <td>Women Participation</td>
                                                                <td>UNSF</td>
                                                                
                                                                <td>
                                                                    <a href="#" class="waves-effect waves-light btn btn-primary-light btn-circle mx-5"><span class="icon-Write"><span class="path1"></span><span class="path2"></span></span></a>
                                                                    <a href="#" class="waves-effect waves-light btn btn-primary-light btn-circle"><span class="icon-Trash1 font-size-18"><span class="path1"></span><span class="path2"></span></span></a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Category</th>
                                                                <th>Target</th>
                                                                <th>Starting</th>
                                                                <th>Ending</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                        </div>
                                    </section>
                                </form>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                 
				</div>
            </div>
            
		</section>
		<!-- /.content -->
	  </div>
  </div>
 <?php include "footer2.php"; ?>