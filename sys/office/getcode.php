<?php
$aina = $_GET['q'];
						    require('includes/conn.php');
							$rowcount =0;
							$year = date('Y');
							   $query="SELECT * FROM sample_submit WHERE Year='$year'";
											if($result=mysqli_query($conn, $query)) {;
											    $count=mysqli_num_rows($result) + 1;
												if($count < 10) {
													$rowcount = "000".$count;
												} elseif($count < 100) {
													$rowcount = "00".$count;
												} elseif($count < 1000) {
													$rowcount = "0".$count;
												} else {
													$rowcount = $count;
												}
												if($aina =="Drug") {
													echo "<input type='text' class='form-control' id='code' name='code' value='ZFDA-D/".$year."/".$rowcount."' readonly />";
												} else if($aina =="Cosmetics") {
													echo "<input type='text' class='form-control' id='code' name='code' value='ZFDA-C/".$year."/".$rowcount."' readonly />";
												}
												
												// Free result set
												mysqli_free_result($result);
												
											}
											mysqli_close($conn);
?>
