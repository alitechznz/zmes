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
					<h3 class="page-title">Organization Information Form</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Form</li>
								<li class="breadcrumb-item active" aria-current="page">Organization</li>
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
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profile8" role="tab"><span><i class="ion-home mr-15"></i>Register Organization</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#focaldetails" role="tab"><span><i class="ion-person mr-15"></i>M&E Focal Person</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#home8" role="tab"><span><i class="ion-home mr-15"></i>Organization's List</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#focalperson" role="tab"><span><i class="ion-person mr-15"></i>List of Focal Person</span></a> </li>
                    </ul>
					<!-- Tab panes -->
					<div class="tab-content tabcontent-border">
						
						<div class="tab-pane active" id="profile8" role="tabpanel">
							<div class="p-15">
                                <div class="col-lg-12 col-12">
                                    <div class="box">
                                        <div class="box-header with-border">
                                        <h4 class="box-title">Organization Registration</h4>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-4 col-form-label">Name of Institution</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control" type="text" placeholder="Name of Institution" id="example-text-input">
                                                    </div>
                                                    </div>
                                                    <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-4 col-form-label">Office Telephone</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control" type="text" placeholder="Office Telephone" id="example-text-input">
                                                    </div>
                                                    </div>
                                                    <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-4 col-form-label">Postal Address</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control" type="text" placeholder="Postal Address" id="example-text-input">
                                                    </div>
                                                    </div>
                                                    <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-4 col-form-label">Location Address</label>
                                                    <div class="col-sm-8">
                                                            <textarea name="shortDescription" id="shortDescription2 " rows="6" class="form-control"></textarea>
                                                    </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-4 col-form-label">Type of Instituion</label>
                                                    <div class="col-sm-8">
                                                        <div class="demo-radio-button">
                                                                <input name="group5" type="radio" id="radio_t1" class="with-gap radio-col-primary" checked />
                                                                <label for="radio_t1">Government</label>
                                                        </div>
                                                        <div class="checkbox">
                                                                <input name="group5" type="radio" id="radio_t2" class="with-gap radio-col-primary"/>
                                                                <label for="radio_t2">CSOs</label>
                                                        </div>
                                                        <div class="checkbox">
                                                                <input name="group5" type="radio" id="radio_t3" class="with-gap radio-col-primary"/>
                                                                <label for="radio_t3">Private Sector</label>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-sm-4 col-form-label">Office Email</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="email" placeholder="xxxx@hhhh.com" id="example-date-input">
                                                        </div>
                                                    </div>
                                                
                                                </div>
                                              
                                            </div>
                                        <!-- /.row -->
                                            <div class="row">
                                                    <div class="col-9"></div>
                                                    <div class="col-3">
                                                        <button type="submit" class="btn btn-rounded btn-info">Clear</button>
                                                        <button type="submit" class="btn btn-rounded btn-primary pull-right">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- /.box-body -->
                                    </div>
                                </div>
                            </div>
						</div>
                      
                        <div class="tab-pane" id="focaldetails" role="tabpanel">
							<div class="p-15">
                                <div class="col-lg-12 col-12">

                                    <div class="box box-default">
                                            <!-- /.box-header -->
                                            <div class="box-body wizard-content">
                                                <form action="#" class="tab-wizard vertical wizard-circle">
                                                    <!-- Step 1 -->
                                                    <h6>M&E Focal Personal</h6>
                                                    <section>
                                                         
                                                        <div class="row">
                                                             <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label>Organization</label>
                                                                    <select class="form-control select2" style="width: 100%;">
                                                                        <option selected="selected">OCGS</option>
                                                                        <option>ZFDA</option>
                                                                        <option>ZPC</option>
                                                                        <option>Delaware</option>
                                                                        <option>Tennessee</option>
                                                                        <option>Texas</option>
                                                                        <option>Washington</option>
                                                                    </select>
                                                                </div>
                                                            <!-- /.form-group -->
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="jobTitle6">Name :</label>
                                                                    <input type="text" class="form-control" id="jobTitle6"> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="jobTitle6">Email Address :</label>
                                                                    <input type="text" class="form-control" id="jobTitle6"> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="jobTitle6">Telephone :</label>
                                                                    <input type="text" class="form-control" id="jobTitle6"> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="jobTitle6">Period of Reporting :</label>
                                                                    <input type="text" class="form-control" id="jobTitle6"> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="jobTitle6">Date of Submission of the Form :</label>
                                                                    <input type="date" class="form-control" id="jobTitle6"> 
                                                                </div>
                                                            </div>
                                                        
                                                        </div>
                                                    </section>
                                                    <!-- Step 2 -->
                                                    <h6>Create Login Info</h6>
                                                    <section>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="jobTitle6">Username :</label>
                                                                    <input type="text" class="form-control" id="jobTitle6"> </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="videoUrl2">Password :</label>
                                                                    <input type="password" class="form-control" id="videoUrl2">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="shortDescription2">Repeat Password :</label>
                                                                    <input type="password" class="form-control" id="videoUrl2">
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </section>
                                                    <!-- Step 3 -->
                                                    <h6>Permission</h6>
                                                    <section>
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <div class="form-group">
                                                                    <div class="demo-checkbox">
                                                                            <input type="checkbox" id="basic_checkbox_mp1" checked />
                                                                            <label for="basic_checkbox_mp1">Configure KPIs</label>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-9">
                                                                    <div class="demo-checkbox">
                                                                        <input type="checkbox" id="basic_checkbox_mp1s1" />
                                                                        <label for="basic_checkbox_mp1s1" style="min-width: 100px;">Add</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp1s2"/>
                                                                        <label for="basic_checkbox_mp1s2" style="min-width: 100px;">Edit</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp1s3"/>
                                                                        <label for="basic_checkbox_mp1s3" style="min-width: 100px;">Delete</label>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <div class="form-group">
                                                                    <div class="demo-checkbox">
                                                                            <input type="checkbox" id="basic_checkbox_mp2" checked />
                                                                            <label for="basic_checkbox_mp2">Unit</label>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-9">
                                                                    <div class="demo-checkbox">
                                                                        <input type="checkbox" id="basic_checkbox_mp2s1" />
                                                                        <label for="basic_checkbox_mp2s1" style="min-width: 100px;">Add</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp2s2"/>
                                                                        <label for="basic_checkbox_mp2s2" style="min-width: 100px;">Edit</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp2s3"/>
                                                                        <label for="basic_checkbox_mp2s3" style="min-width: 100px;">Delete</label>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <div class="form-group">
                                                                    <div class="demo-checkbox">
                                                                            <input type="checkbox" id="basic_checkbox_mp3" checked />
                                                                            <label for="basic_checkbox_mp3">Disaggregation</label>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-9">
                                                                    <div class="demo-checkbox">
                                                                        <input type="checkbox" id="basic_checkbox_mp3s1" />
                                                                        <label for="basic_checkbox_mp3s1" style="min-width: 100px;">Add</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp3s2"/>
                                                                        <label for="basic_checkbox_mp3s2" style="min-width: 100px;">Edit</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp3s3"/>
                                                                        <label for="basic_checkbox_mp3s3" style="min-width: 100px;">Delete</label>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <div class="form-group">
                                                                    <div class="demo-checkbox">
                                                                            <input type="checkbox" id="basic_checkbox_mp4" checked />
                                                                            <label for="basic_checkbox_mp4">Project</label>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-9">
                                                                    <div class="demo-checkbox">
                                                                        <input type="checkbox" id="basic_checkbox_mp4s1" />
                                                                        <label for="basic_checkbox_mp4s1" style="min-width: 100px;">Add</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp4s2"/>
                                                                        <label for="basic_checkbox_mp4s2" style="min-width: 100px;">Edit</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp4s3"/>
                                                                        <label for="basic_checkbox_mp4s3" style="min-width: 100px;">Delete</label>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <div class="form-group">
                                                                    <div class="demo-checkbox">
                                                                            <input type="checkbox" id="basic_checkbox_mp5" checked />
                                                                            <label for="basic_checkbox_mp5">Workplan</label>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-9">
                                                                    <div class="demo-checkbox">
                                                                        <input type="checkbox" id="basic_checkbox_mp5s1" />
                                                                        <label for="basic_checkbox_mp5s1" style="min-width: 100px;">Add</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp5s2"/>
                                                                        <label for="basic_checkbox_mp5s2" style="min-width: 100px;">Edit</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp5s3"/>
                                                                        <label for="basic_checkbox_mp5s3" style="min-width: 100px;">Delete</label>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <div class="form-group">
                                                                    <div class="demo-checkbox">
                                                                            <input type="checkbox" id="basic_checkbox_mp6" checked />
                                                                            <label for="basic_checkbox_mp6">Budget</label>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-9">
                                                                    <div class="demo-checkbox">
                                                                        <input type="checkbox" id="basic_checkbox_mp6s1" />
                                                                        <label for="basic_checkbox_mp6s1" style="min-width: 100px;">Add</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp6s2"/>
                                                                        <label for="basic_checkbox_mp6s2" style="min-width: 100px;">Edit</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp6s3"/>
                                                                        <label for="basic_checkbox_mp6s3" style="min-width: 100px;">Delete</label>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <div class="form-group">
                                                                    <div class="demo-checkbox">
                                                                            <input type="checkbox" id="basic_checkbox_mp7" checked />
                                                                            <label for="basic_checkbox_mp7">Project Indicator</label>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-9">
                                                                    <div class="demo-checkbox">
                                                                        <input type="checkbox" id="basic_checkbox_mp7s1" />
                                                                        <label for="basic_checkbox_mp7s1" style="min-width: 100px;">Add</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp7s2"/>
                                                                        <label for="basic_checkbox_mp7s2" style="min-width: 100px;">Edit</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp7s3"/>
                                                                        <label for="basic_checkbox_mp7s3" style="min-width: 100px;">Delete</label>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <div class="form-group">
                                                                    <div class="demo-checkbox">
                                                                            <input type="checkbox" id="basic_checkbox_mp8" checked />
                                                                            <label for="basic_checkbox_mp7">Audit</label>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-9">
                                                                    <div class="demo-checkbox">
                                                                        <input type="checkbox" id="basic_checkbox_mp8s1" />
                                                                        <label for="basic_checkbox_mp8s1" style="min-width: 100px;">Add</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp8s2"/>
                                                                        <label for="basic_checkbox_mp8s2" style="min-width: 100px;">Edit</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp8s3"/>
                                                                        <label for="basic_checkbox_mp8s3" style="min-width: 100px;">Delete</label>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <div class="form-group">
                                                                    <div class="demo-checkbox">
                                                                            <input type="checkbox" id="basic_checkbox_mp9" checked />
                                                                            <label for="basic_checkbox_mp9">Indicator Performance</label>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-9">
                                                                    <div class="demo-checkbox">
                                                                        <input type="checkbox" id="basic_checkbox_mp9s1" />
                                                                        <label for="basic_checkbox_mp9s1" style="min-width: 100px;">View</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp9s2"/>
                                                                        <label for="basic_checkbox_mp9s2" style="min-width: 100px;">Print</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp9s3"/>
                                                                        <label for="basic_checkbox_mp9s3" style="min-width: 100px;">Download</label>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <div class="form-group">
                                                                    <div class="demo-checkbox">
                                                                            <input type="checkbox" id="basic_checkbox_mp10" checked />
                                                                            <label for="basic_checkbox_mp10">Workplan & Budget</label>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-9">
                                                                    <div class="demo-checkbox">
                                                                        <input type="checkbox" id="basic_checkbox_mp10s1" />
                                                                        <label for="basic_checkbox_mp10s1" style="min-width: 100px;">View</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp10s2"/>
                                                                        <label for="basic_checkbox_mp10s2" style="min-width: 100px;">Print</label>
                                                                        <input type="checkbox" id="basic_checkbox_mp10s3"/>
                                                                        <label for="basic_checkbox_mp10s3" style="min-width: 100px;">Download</label>
                                                                    </div>
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
                        </div>

                        <div class="tab-pane" id="home8" role="tabpanel">
							<div class="p-15">
                                <div class="table-responsive">
                                    <table id="example5" class="table table-bordered table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Organization name</th>
                                                <th>Type</th>
                                                <th>Office Telephone</th>
                                                <th>Office Email</th>
                                                <th>Address</th>
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
                                                <td>
                                                     <a href="#" class="btn"><span class="icon-Write"><span class="path1"></span><span class="path2"></span></span></a>
                                                    <a href="#" class="waves-effect waves-light btn btn-danger-light btn-circle"><span class="icon-Trash1 font-size-18"><span class="path1"></span><span class="path2"></span></span></a>
                                                </td>
                                                
                                            </tr>
                                
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Organization name</th>
                                                <th>Type</th>
                                                <th>Office Telephone</th>
                                                <th>Office Email</th>
                                                <th>Address</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
							</div>
                        </div>

                        <div class="tab-pane" id="focalperson" role="tabpanel">
							<div class="p-15">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Organization</th>
                                                <th>Focal Person</th>
                                                <th>Telephone</th>
                                                <th>Email</th>
                                                <th>Status</th>
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
                                                <td>
                                        
                                                    <a href="#" class="btn"><span class="icon-Write"><span class="path1"></span><span class="path2"></span></span></a>
                                                    <a href="#" class="waves-effect waves-light btn btn-danger-light btn-circle"><span class="icon-Trash1 font-size-18"><span class="path1"></span><span class="path2"></span></span></a>
                                                </td>
                                                
                                            </tr>
                                
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Organization</th>
                                                <th>Focal Person</th>
                                                <th>Telephone</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
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