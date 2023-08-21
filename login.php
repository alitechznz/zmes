
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="icon" href="images/smz-trans.png">
    <title>ZPC-M&E</title>
  
	<!-- Vendors Style-->
	<link rel="stylesheet" href="main/css/vendors_css.css">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="main/css/style.css">
	<link rel="stylesheet" href="main/css/skin_color.css">	

</head>
<?php include 'php/session_start.php'; ?>
	
<body class="hold-transition theme-primary bg-img" style="background-image: url(images/auth-bg/map1.jpg)">
	
	<div class="container h-p100" style=" margin: 0px 0% 0px 30% !important;">
		<div class="row align-items-center justify-content-md-center h-p100">	
			
			<div class="col-12">
				<div class="row justify-content-center no-gutters">
					<div class="col-lg-5 col-md-5 col-12">
						<div class="bg-white rounded30 shadow-lg">
							<div class="content-top-agile p-20 pb-0">
                                <img src="images/smz-logo.png" width="30%"/>
                                <h2 class="text-primary">ZANZIBAR PLANNING COMMISSION</h2>
								<p class="mb-0">Sign in Monitoring & Evaluation System</p>							
							</div>
							<div class="p-40">
                            <form action="php/login_process.php" method="post">
									<div class="form-group">
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
											</div>
											<input type="text" class="form-control pl-15 bg-transparent" name="username" placeholder="Username" required>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text  bg-transparent"><i class="ti-lock"></i></span>
											</div>
											<input type="password" class="form-control pl-15 bg-transparent" placeholder="Password" name="password" required>
										</div>
									</div>
									  <div class="row">
										<div class="col-6">
										  <div class="checkbox">
											<input type="checkbox" id="basic_checkbox_1" >
											<label for="basic_checkbox_1">Remember Me</label>
										  </div>
										</div>
										<!-- /.col -->
										<div class="col-6">
										 <div class="fog-pwd text-right">
											<a href="javascript:void(0)" class="hover-warning"><i class="ion ion-locked"></i> Forgot pwd?</a><br>
										  </div>
										</div>
										<!-- /.col -->
										<div class="col-12 text-center">
											<button type="submit" name="login" class="btn btn-primary mt-11">SIGN IN</button>
											<a href="index.php" class="btn btn-dark btn-outline">DASHBOARD</a>
											
                                        </div>
										<!-- /.col -->
									  </div>
								</form>	
								
								<div class="text-center">
                                     
									<p class="mt-15 mb-0"> Don't have an account?  <a href="auth_register.html" class="text-warning ml-5">Request Now</a></p>
								</div>	
							</div>						
						</div>
						<div class="text-center">
						  <p class="mt-20 text-white">- Sign With -</p>
						  <p class="gap-items-2 mb-20">
							  <a class="btn btn-social-icon btn-round btn-facebook" href="https://www.facebook.com/MipangoZanzibar/?ref=page_internal"><i class="fa fa-facebook"></i></a>
							  <a class="btn btn-social-icon btn-round btn-twitter" href="#"><i class="fa fa-twitter"></i></a>
							  <a class="btn btn-social-icon btn-round btn-instagram" href="#"><i class="fa fa-instagram"></i></a>
							</p>	
						</div>
					</div>
				</div>
			</div>
			<?php
                if(isset($_SESSION['error'])){
                    echo "
                                <div class='alert alert-danger alert-dismissable'>
                                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> 
                                    ".$_SESSION['error']."
                                </div>          
                            ";
                unset($_SESSION['error']);
                }
              
            ?>
		</div>
	</div>


	<!-- Vendor JS -->
	<script src="main/js/vendors.min.js"></script>
    <script src="assets/icons/feather-icons/feather.min.js"></script>	

</body>
</html>
