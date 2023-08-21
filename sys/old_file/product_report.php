<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Product Report</title>
	<link rel="shortcut icon" href="../images/111.jpg">
	</head>
	<body>
			<script type="text/javascript">
        function PrintDiv() {
            var contents = document.getElementById("dvContents").innerHTML;
            var frame1 = document.createElement('iframe');
            frame1.name = "frame1";
            frame1.style.position = "absolute";
            frame1.style.top = "-1000000px";
            document.body.appendChild(frame1);
            var frameDoc = frame1.contentWindow ? frame1.contentWindow : frame1.contentDocument.document ? frame1.contentDocument.document : frame1.contentDocument;
            frameDoc.document.open();
            //frameDoc.document.write('<html><head><title>Hammy Co Ltd</title>');
            frameDoc.document.write('</head><body>');
            frameDoc.document.write(contents);
            frameDoc.document.write('</body></html>');
            frameDoc.document.close();
            setTimeout(function () {
                window.frames["frame1"].focus();
                window.frames["frame1"].print();
                document.body.removeChild(frame1);
            }, 500);
            return false;
        }
    </script>
	<script>
	    function getvalue(str) {
		  //alert(str);
			if (str == "") {
				document.getElementById("txtHint").innerHTML = "";
				return;
			} else {
				if (window.XMLHttpRequest) {
					// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp = new XMLHttpRequest();
				} else {
					// code for IE6, IE5
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("printer").innerHTML = this.responseText;
					}
				};
				xmlhttp.open("GET","getuser.php?q="+str,true);
				xmlhttp.send();
			}
	}
	</script>	
	<style type="text/css">
.styled-button-8 {
	background: #25A6E1;
	background: -moz-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
	background: -webkit-gradient(linear,left top,left bottom,color-stop(0%,#25A6E1),color-stop(100%,#188BC0));
	background: -webkit-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
	background: -o-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
	background: -ms-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
	background: linear-gradient(top,#25A6E1 0%,#188BC0 100%);
	filter: progid: DXImageTransform.Microsoft.gradient( startColorstr='#25A6E1',endColorstr='#188BC0',GradientType=0);
	width:60px;
	height:30px;
	color:#000;
	font-family:'Helvetica Neue',sans-serif;
	font-size:13px;
	border-radius:4px;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border:1px solid #1A87B9
}
</style>
<?php
//$name = $_GET['name'];
?>
	<div style = "height:360px; width:850px; margin-left:150px;">
		<div id="dvContents">
		  <center>
		  <div style = "margin-left:30px; margin-top:10px">
			  <img src="download.jfif"   width="15%" height="120px" style="margin-left:-600px;">
				<address style = "margin-left:600px; margin-top:-100px;text-align:right;">
					<!--strong>Hammy co ltd.</strong--><br>
					<br>
					  
<br>
					FO1/LSD/SOP/004REV.#:01<br>
				</address>
			</div>
		 </center>
		 <br>
		  <br>
		   
	
	
	<table>
	   <tr>
	    <td><h3 style = "margin-left:200px;margin-top:0px">SAMPLE ANALYSIS REQUEST FORM</h3></td>	
	    
		
		
	
	</table>				
	<form >  
	
	<?php
		require('includes/conn.php');
		$id = $_GET['id'];
		$query="SELECT * FROM sample WHERE md5(id)='$id'";
		$result=mysqli_query($conn, $query);
		$row1=mysqli_fetch_array($result);
		
													
	      //<option value="" ><?php echo $row1['name'];</option>
	
	?>			
				<table border="0" cellspacing="10" cellpadding="10" width="600px" style="margin-left:0px">


<tr>
<td> <b>Sample assigned to:</b></td>

</tr>				
<tr>

<td> Name&nbsp&nbsp&nbsp<?php echo $row1['sample_to'];?> <strong></td>
<td> Date&nbsp&nbsp&nbsp<?php echo $row1['date1'];?> <strong></td>
</tr>

<tr>
<td><b> Sample assigned by:</b></td>

</tr>

<tr>


<td> Name&nbsp&nbsp&nbsp<?php echo $row1['sample_by'];?> <strong></td>
<td> Signature&nbsp&nbsp&nbsp<?php echo $row1['signature1'];?> <strong></td>
<tr>
<td>Head of Laboratory Services Department</td>

</tr>
</tr>
	
<tr>
<td><b> Sample issued by:</b></td>

</tr>
	
<tr>
<td> Name&nbsp&nbsp&nbsp<?php echo $row1['sample_issue'];?> <strong></td>
<td> Date&nbsp&nbsp&nbsp<?php echo $row1['date2'];?> <strong></td>
</tr>
									
<tr>
<td> Signature&nbsp&nbsp&nbsp<?php echo $row1['signature2'];?> <strong></td>

</tr>
								
</table>
								

	
	
	<table width="100%" align="left" border="1px" cellpadding="0" cellspacing="0">
    
      <tr height="30px">
       
       
		
		 <th style="border-bottom:1px solid #333;">S. code No.</th>
        <th style="border-bottom:1px solid #333;">Lab Code No</th>
		 <th style="border-bottom:1px solid #333;">Product / Sample Name</th>
        <th style="border-bottom:1px solid #333;">Tests Requested</th>
		
      </tr>
	  
	  <?php
require('includes/conn.php');
		$id = $_GET['id'];
		$query="SELECT * FROM sample WHERE md5(id)='$id'";
$resulte=mysqli_query($conn, $query);
$row1=mysqli_fetch_array($result);
while ($row1=mysqli_fetch_array($resulte)){
//var_dump($row1); 
 ?>
     
      <tr align="center" style="height:35px">
		
        <td style="border-bottom:1px solid #333;"><?php echo $row1['s.code']; ?> </td>
		<td style="border-bottom:1px solid #333;"><?php echo $row1['l.code']; ?> </td>
        <td style="border-bottom:1px solid #333;"><?php echo $row1['ps']; ?> </td>
		<td style="border-bottom:1px solid #333;"><?php echo $row1['tr']; ?> </td>
      </tr>
 
      
<?php
  } ?>
     
   
  </table>
  
  <br />
  
  <?php
require('includes/conn.php');
		$id = $_GET['id'];
		$query="SELECT * FROM sample WHERE md5(id)='$id'";
$resulte=mysqli_query($conn, $query);
$row1=mysqli_fetch_array($result);
while ($row1=mysqli_fetch_array($resulte)){
//var_dump($row1); 
 ?>
  
					<table border="0" cellspacing="10" cellpadding="10" width="600px" style="margin-left:0px">
						
						<tr>
							<td><b>
							HLSD comment(s) if any</b> </br> &nbsp <?php echo $row1 ['hlsd'];?> &nbsp
							&nbsp <?php echo $row1 ['hlsd'];?>
							</td>
						</tr>
						<tr>
							<td><b>
							Analyst comment(s) if any </b></br> &nbsp <?php echo $row1 ['ac'];?>
							</td>
						</tr>
						
						<tr>
							<td><b>
							Analysis done by </b> &nbsp <?php echo $row1 ['ad'];?>
							</td>
						</tr>
						
						
						<tr>
							<td><b>
							Date of completion of analysis</b>  &nbsp <?php echo $row1 ['date3'];?> &nbsp 
							<b>Signature </b>&nbsp <?php echo $row1 ['signature3'];?>
							</td>
						</tr>
				<?php
}
				?>
					</table>
  <br /><table>
	   <br /><br /><tr>
	    <br />
      

  

	
  
  
  
  
  		<br>
			<div style="margin-left:80px;margin-top:230px;">
				<a href="sample_analysis.php"><input type = "button" style = "background: #transparent; width:60px;height:30px;" value="Back"/></a>
				<button type="button" style = "background: #transparent; width:60px;height:30px;" onclick="PrintDiv();">Print</button>
			</div>
			<br>
	</div>