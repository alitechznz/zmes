<?php
  session_start();
  	$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://"; 
	$user_current_url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . $_SERVER['QUERY_STRING']; 
  	$_SESSION['page'] = $user_current_url;
?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition login-page" style="background-color:white;">
           <div class="row" style="text-align: center;">
              
               <h1>ZANZIBAR MONITORING & EVALUATION SYSTEM-(ZMES) </h1>
              
           </div>
           <div class="col-md-12" >
              
               <div class="col-md-6">
                     <div class="login-box" style="margin: 100px 20%; height:340px;">
              	<div class="login-box-body" style="border: 1px solid gray; background-color: #D3D3D3; height:440px;">
            		<img src="images/smz-trans.png" style="width: 40%; margin: 0px 30%;"/><br />
            		<h3 style="text-align:center; color:green;">ZANZIBAR PLANNING COMMISSION</h3>
                	<p class="login-box-msg">Sign in to start your session</p>
            
                	<form action="login_process.php" method="POST">
                  		<div class="form-group has-feedback">
                    		<input type="text" class="form-control" name="email" placeholder="input Username" required autofocus>
                    		<span class="glyphicon glyphicon-user form-control-feedback"></span>
                  		</div>
                      <div class="form-group has-feedback">
                        <input type="password" class="form-control" name="password" placeholder="input Password" required>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                      </div>
                  		<div class="row">
            			    <div class="col-xs-8">
            				  <div class="form-group">
            					<label>
            					  <input type="checkbox" class="minimal-red" checked> Remember Me
            					</label>
            				  </div>
            				</div>
                			<div class="col-xs-4">
                      			<button type="submit" class="btn btn-success btn-block btn-flat" name="login"><i class="fa fa-sign-in"></i> Sign In</button>
                    		</div>
                  		</div>
            			 <div class="text-center">
            			  <a href="forgot.php">I forgot my password</a><br>
            			  </div>
                	</form>
            		
            		<div class="social-auth-links text-center">
            			<a href="../" class="btn btn-success btn-block btn-flat">DASHBOARD</a>
            		</div>
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
			<div class="col-md-6">
                   <img src="images/visiwabg.png" style="margin: 10px 0%; width:100%; height: 460px;"/>
               </div>
           </div>
      
        
      
<?php include 'includes/scripts.php' ?>
</body>
</html>