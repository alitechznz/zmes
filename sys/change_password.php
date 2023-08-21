<?php
  session_start();

  if(isset($_SESSION['page_status']) !=TRUE){ 
	  header('location:index.php');
  } 
  
?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition login-page" style="background-color:white;">
           <div class="row" style="text-align: center;">
              
               <h1>ZANZIBAR MONITORING & EVALUATION SYSTEM-(ZMES) </h1>
              
           </div>
           <div class="col-md-12">
               <div class="col-md-4">
                    <?php
                        if(isset($_SESSION['error'])){
                          echo "
                            <div class='alert alert-warning alert-dismissible'>
                              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                              <h4><i class='icon fa fa-warning'></i> Error!</h4>
                              ".$_SESSION['error']."
                            </div>
                          ";
                          unset($_SESSION['error']);
                        }
                        if(isset($_SESSION['success'])){
                          echo "
                            <div class='alert alert-success alert-dismissible'>
                              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                              <h4><i class='icon fa fa-check'></i> Success!</h4>
                              ".$_SESSION['success']."
                            </div>
                          ";
                          unset($_SESSION['success']);
                        }
                    ?>
                    <p style="margin-top:100px;">
                        <b>NOTE:</b>
                        <ul>
                            <li><b>Password should be at least 8 characters in length</b></li>
                            <li><b>should include at least one upper case letter (A-Z)</b></li>
                            <li><b>should include at least one number (0,1,2...9)</b></li>
                            <li><b>should include at least one special character (@#!?/..)</b></li>
                        </ul>
                        
                    </p>
               </div>
               <div class="col-md-8">
                <div class="login-box" style="margin: 100px 3%; height:340px;">
              	    <div class="login-box-body" style="border: 1px solid gray; background-color: #D3D3D3; height:auto;">
            		<img src="images/smz-trans.png" style="width: 40%; margin: 0px 30%;"/><br />
            		<h3 style="text-align:center; color:green;">ZANZIBAR PLANNING COMMISSION</h3>
                	<p class="login-box-msg">Account Setting a new password</p>
                    
                	<form action="includes/controller.php" method="POST">
                	   
                  		<div class="form-group has-feedback">
                    		<input type="text" class="form-control" name="email" placeholder="input email" required autofocus>
                    		<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                  		</div>
                  		<div class="form-group has-feedback">
                    		<input type="password" class="form-control" name="password" placeholder="input new password" required autofocus>
                    		<span class="glyphicon glyphicon-lock form-control-feedback"></span>
                  		</div>
                  		<div class="form-group has-feedback">
                    		<input type="password" class="form-control" name="rep_password" placeholder="input new password again" required autofocus>
                    		<span class="glyphicon glyphicon-lock form-control-feedback"></span>
                  		</div>
                     
                  		<div class="row">
                          <div class="col-xs-7">
                      			<button type="submit" class="btn btn-success btn-block btn-flat" name="change_password"><i class="fa fa-sign-in"></i> Change Password</button>
                    		</div>
                            <div class="col-xs-5">
                                	<a href="index.php" class="btn btn-success btn-block btn-flat">Sign In</a>
                            </div>
                			
                  		</div>
            			 
                	</form>
            		
            		
                    <?php
                        if(isset($_SESSION['error'])){
                            echo "
                                <div class='callout callout-danger text-center mt20'>
                                    <p>".$_SESSION['error']."</p> 
                                </div>
                            ";
                            unset($_SESSION['error']);
                        }
                    ?>
              	</div>
                </div>
               </div>
               
           </div>
      
        
      
<?php include 'includes/scripts.php' ?>
</body>
</html>