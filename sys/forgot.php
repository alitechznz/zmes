<?php
  session_start();
  /*
  if(isset($_SESSION['admin'])){
   // header('location:home.php');
  }  else if(isset($_SESSION['Reservation'])){
	  header('location:reservation/index.php');
  } if(isset($_SESSION['Coordinator'])){
	    header('location:coordinator/index.php');
  } if(isset($_SESSION['Management'])){ 
	  header('location:management/index.php');
  }  if(isset($_SESSION['Driver'])){ 
	  header('location:driver/index.php');
  } else {
	   header('location:reservation/index.php');
  }
  
  */
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
                	<p class="login-box-msg">Account Recovering session</p>
            
                	<form action="login_process.php" method="POST">
                  		<div class="form-group has-feedback">
                    		<input type="text" class="form-control" name="email" placeholder="input email" required autofocus>
                    		<span class="glyphicon glyphicon-user form-control-feedback"></span>
                  		</div>
                     
                  		<div class="row">
                          <div class="col-xs-4">
                      			<button type="submit" class="btn btn-success btn-block btn-flat" name="forgot"><i class="fa fa-sign-in"></i> Submit</button>
                    		</div>
                            <div class="col-xs-4"></div>
                            <div class="col-xs-4">
                            <a href="index.php" class="btn btn-success btn-block btn-flat" name="forgot"><i class="fa fa-sign-in"></i> Sign In</a>
            				</div>
                			
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