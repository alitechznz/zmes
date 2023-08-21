<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/head_menu.php'; ?>

 <script language="JavaScript">
 function checkFluency()
{
  var checkbox = document.getElementById('chk_project');
  if (checkbox.checked != true)
  {
    alert("you need to be fluent in English to apply for the job");
  }
}

function sample2(num) {
  	    // alert(num);
         var rep_num = num.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

 window.onload = function(){
    var num = document.getElementById("total_cost").value;
    var rep_num = num.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    document.getElementById("total_cost").value = rep_num;
 }
 
  function validateDateRange() {
          var startDate =document.getElementsByClassName("start-date").value;
          var endDate = document.getElementsByClassName("end-date").value;
          var err_msg = "Input date is outside the range";
        
          if(startDate <= endDate) {
            // alert("Input date is within the range.");
          } else {
            alert(err_msg);
          }
      } 
// window.onload = function(){ 
//     var str = document.getElementById("project_id_get").value;
//     alert(str);
//     if (str == "") {
//       document.getElementById("get_total_cost").innerHTML = "";
//       return;
//     } else {
//       if (window.XMLHttpRequest) {
//                 // code for IE7+, Firefox, Chrome, Opera, Safari
//         xmlhttp = new XMLHttpRequest();
//       } else {
//                 // code for IE6, IE5
//          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
//       }
//      xmlhttp.onreadystatechange = function() {
//         if (this.readyState == 4 && this.status == 200) {
//             document.getElementById("get_total_cost").innerHTML = this.responseText;
//         }
//      };
//             xmlhttp.open("GET","gettotalcost.php?q="+str,true);
//             xmlhttp.send();
//     }
// }
     
</script>
  <!-- Content Wrapper. Contains page content -->

   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <?php 
        include 'includes/conn.php'; 
        if(isset($_GET['xyz'])){
            $getid =$_GET['xyz'];
        } else {
            $getid =0;
        }
                            		
            $ptitle ="";
            $short = "";
            $status ="";
            $duration = "";
            $d_unit = "";
            $type = "";
            $description = "";
            $code = "";
            $StartDate = "";
            $EndDate = "";
            $agenda = "";
            $query = "SELECT * FROM `projecttb` WHERE `ID`='$getid'"; 
            $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
            $num = 0;
                if($row = mysqli_fetch_array($result)) {	
                    $ptitle =$row['pTitle'];
                    $short = $row['Short title'];
                    $status = $row['Status'];
                    $duration = $row['Duration'];
                    $d_unit = $row['Duration Unit'];
                    $type = $row['pType'];
                    $description = $row['Description'];
                    $code = $row['Code'];
                    $StartDate = $row['StartDate'];
                    $EndDate = $row['EndDate'];
                    $agenda = $row['AgendaID'];
                    
                    $submitted_date=$row['p_wizara_submit_date']; 
                    $submitted_comment=$row['p_wizara_submit_comment'];
                    
                    $verified_date=$row['p_zpc_approve_date']; 
                    $verified_comment=$row['p_zpc_approve_comment'];
                    $verified_action=$row['p_zpc_approve_action'];
                    
                    $confirmed_date=$row['p_wizara_confirm_date']; 
                    $confirmed_comment=$row['p_wizara_confirm_comment'];
                    $confirmed_action = $row['p_wizara_confirm_action'];
                    
                    $accepted_date = $row['p_zpc_approve_date'];
                    $accepted_comment = $row['p_zpc_approve_comment'];
                    
                    $submitted_name=$row['p_wizara_submit_by'];
                    $verified_name=$row['p_wizara_approve_by'];
                    $confirmed_name=$row['p_wizara_confirm_by'];
                    $accepted_name=$row['p_zpc_approve_by'];
                    
                    $tz = new DateTimeZone('UTC');
                    $dt1 = new DateTime($submitted_date, $tz);
                    $dt2 = new DateTime($verified_date, $tz);
                    $difference1 = $dt1->diff($dt2)->format('%r%y years, %m months, %d days, %h hours, %i minutes, %s seconds');
                    
                    $dt2 = new DateTime($confirmed_date, $tz);
                    $dt1 = new DateTime($verified_date, $tz);
                    $difference2 = $dt1->diff($dt2)->format('%r%y years, %m months, %d days, %h hours, %i minutes, %s seconds');
                    
                    $dt1 = new DateTime($confirmed_date, $tz);
                    $dt2 = new DateTime($accepted_date, $tz);
                    $difference3 = $dt1->diff($dt2)->format('%r%y years, %m months, %d days, %h hours, %i minutes, %s seconds');
                    
                    $querys = "SELECT * FROM `userinfo`"; 
                    $results = mysqli_query($conn, $querys) or die("Error : ".mysqli_error($conn));
                    while($rows = mysqli_fetch_array($results)) {
                        if($rows['id']==$submitted_name){
                            $submitted_name = $rows['Fullname'];
                        } 
                        if($rows['id']==$verified_name){
                            $verified_name = $rows['Fullname'];
                        } 
                        if($rows['id']==$confirmed_name){
                            $confirmed_name = $rows['Fullname'];
                        } 
                        if($rows['id']==$accepted_name){
                            $accepted_name = $rows['Fullname'];
                        }
                    }
                }
     ?>  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Timeline
        <small><?php echo $ptitle; ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Project</a></li>
        <li class="active">Timeline</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
          <p>Project Duration: &nbsp; Started Date:<?php echo $StartDate; ?>   &nbsp;Expected EndDate: <?php echo $EndDate ; ?>
                    </p>
      </div>
      <!-- row -->
      <div class="row">
        <div class="col-md-6">
          <!-- The time line -->
          <ul class="timeline">
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-blue">
                    <?php echo $submitted_date; ?>
                  </span>
            </li>
            <li>
              <i class="fa fa-user bg-blue"></i>

              <div class="timeline-item">
                <!--<span class="time"><i class="fa fa-clock-o"></i> 12:05</span>-->

                <h3 class="timeline-header"><a href="#">Submitted by (FP)</a> <?php echo $submitted_name; ?></h3>
              </div>
            </li>
            <li>
              <i class="fa fa-comments bg-aqua"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> started</span>

                <h3 class="timeline-header no-border"><?php echo $submitted_comment; ?></h3>
              </div>
            </li>
            
            <li class="time-label">
                  <span class="bg-red">
                    <?php echo $verified_date; ?>
                  </span>
            </li>
            <li>
              <i class="fa fa-user bg-blue"></i>

              <div class="timeline-item">
                <!--<span class="time"><i class="fa fa-clock-o"></i> 12:05</span>-->

                <h3 class="timeline-header"><a href="#">Verified by (DPPR)</a> <?php echo $verified_name; ?>, &nbsp; <span class="btn btn-primary btn-xs"><?php echo $verified_action; ?></span></h3>
              </div>
            </li>
            <li>
              <i class="fa fa-comments bg-aqua"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> <?php  echo $difference1;  ?> mins ago</span>

                <h3 class="timeline-header no-border"> Comment: <?php echo $verified_comment; ?></h3>
              </div>
            </li>
            
            <li class="time-label">
                  <span class="bg-orange">
                    <?php echo $confirmed_date; ?>
                  </span>
            </li>
            <li>
              <i class="fa fa-user bg-blue"></i>

              <div class="timeline-item">
                <h3 class="timeline-header"><a href="#">Confirmed by (PS)</a> <?php echo $confirmed_name; ?>, &nbsp; <span class="btn btn-primary btn-xs"><?php echo $confirmed_action; ?></span></h3>
              </div>
            </li>
            <li>
              <i class="fa fa-comments bg-aqua"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> <?php  echo $difference2;  ?> mins ago</span>

                <h3 class="timeline-header no-border"> Comment: <?php echo $confirmed_comment; ?></h3>
              </div>
            </li>
            
            <li class="time-label">
                  <span class="bg-green">
                     <?php echo $accepted_date; ?>
                  </span>
            </li>
            <li>
              <i class="fa fa-user bg-blue"></i>

              <div class="timeline-item">
                <h3 class="timeline-header"><a href="#">Confirmed by (ZPC)</a> <?php echo $accepted_name; ?>, &nbsp; <span class="btn btn-primary btn-xs"><?php echo $accepted_action; ?></span></h3>
              </div>
            </li>
            <li>
              <i class="fa fa-comments bg-aqua"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> <?php  echo $difference3;  ?> mins ago</span>

                <h3 class="timeline-header no-border"> Comment: <?php echo $accepted_comment; ?></h3>
              </div>
            </li>
          </ul>
        </div>
        <!--<div class="col-md-6">-->
          <!-- The time line -->
        <!--  <ul class="timeline">-->
            <!-- timeline time label -->
        <!--    <li class="time-label">-->
        <!--          <span class="bg-red">-->
        <!--            10 Feb. 2014-->
        <!--          </span>-->
        <!--    </li>-->
            <!-- /.timeline-label -->
            <!-- timeline item -->
        <!--    <li>-->
        <!--      <i class="fa fa-envelope bg-blue"></i>-->

        <!--      <div class="timeline-item">-->
        <!--        <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>-->

        <!--        <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>-->

        <!--        <div class="timeline-body">-->
        <!--          Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,-->
        <!--          weebly ning heekya handango imeem plugg dopplr jibjab, movity-->
        <!--          jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle-->
        <!--          quora plaxo ideeli hulu weebly balihoo...-->
        <!--        </div>-->
        <!--        <div class="timeline-footer">-->
        <!--          <a class="btn btn-primary btn-xs">Read more</a>-->
        <!--          <a class="btn btn-danger btn-xs">Delete</a>-->
        <!--        </div>-->
        <!--      </div>-->
        <!--    </li>-->
            <!-- END timeline item -->
            <!-- timeline item -->
        <!--    <li>-->
        <!--      <i class="fa fa-user bg-aqua"></i>-->

        <!--      <div class="timeline-item">-->
        <!--        <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>-->

        <!--        <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request</h3>-->
        <!--      </div>-->
        <!--    </li>-->
            <!-- END timeline item -->
            <!-- timeline item -->
        <!--    <li>-->
        <!--      <i class="fa fa-comments bg-yellow"></i>-->

        <!--      <div class="timeline-item">-->
        <!--        <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>-->

        <!--        <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>-->

        <!--        <div class="timeline-body">-->
        <!--          Take me to your leader!-->
        <!--          Switzerland is small and neutral!-->
        <!--          We are more like Germany, ambitious and misunderstood!-->
        <!--        </div>-->
        <!--        <div class="timeline-footer">-->
        <!--          <a class="btn btn-warning btn-flat btn-xs">View comment</a>-->
        <!--        </div>-->
        <!--      </div>-->
        <!--    </li>-->
            <!-- END timeline item -->
            <!-- timeline time label -->
        <!--    <li class="time-label">-->
        <!--          <span class="bg-green">-->
        <!--            3 Jan. 2014-->
        <!--          </span>-->
        <!--    </li>-->
            <!-- /.timeline-label -->
            <!-- timeline item -->
        <!--    <li>-->
        <!--      <i class="fa fa-camera bg-purple"></i>-->

        <!--      <div class="timeline-item">-->
        <!--        <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>-->

        <!--        <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>-->

        <!--        <div class="timeline-body">-->
        <!--          <img src="http://placehold.it/150x100" alt="..." class="margin">-->
        <!--          <img src="http://placehold.it/150x100" alt="..." class="margin">-->
        <!--          <img src="http://placehold.it/150x100" alt="..." class="margin">-->
        <!--          <img src="http://placehold.it/150x100" alt="..." class="margin">-->
        <!--        </div>-->
        <!--      </div>-->
        <!--    </li>-->
            <!-- END timeline item -->
            <!-- timeline item -->
        <!--    <li>-->
        <!--      <i class="fa fa-video-camera bg-maroon"></i>-->

        <!--      <div class="timeline-item">-->
        <!--        <span class="time"><i class="fa fa-clock-o"></i> 5 days ago</span>-->

        <!--        <h3 class="timeline-header"><a href="#">Mr. Doe</a> shared a video</h3>-->

        <!--        <div class="timeline-body">-->
        <!--          <div class="embed-responsive embed-responsive-16by9">-->
        <!--            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/tMWkeBIohBs"-->
        <!--                    frameborder="0" allowfullscreen></iframe>-->
        <!--          </div>-->
        <!--        </div>-->
        <!--        <div class="timeline-footer">-->
        <!--          <a href="#" class="btn btn-xs bg-maroon">See comments</a>-->
        <!--        </div>-->
        <!--      </div>-->
        <!--    </li>-->
            <!-- END timeline item -->
        <!--    <li>-->
        <!--      <i class="fa fa-clock-o bg-gray"></i>-->
        <!--    </li>-->
        <!--  </ul>-->
        <!--</div>-->
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row" style="margin-top: 10px;">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-code"></i> Timeline Markup</h3>
            </div>
            <div class="box-body">
                  <pre style="font-weight: 600;">

                  </pre>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  
    
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/agenda_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- date-range-picker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>

<script>
$(function(){
    //Initialize Select2 Elements
    $('.select2').select2()
    //Date range picker
    $('#reservation').daterangepicker()

     //iCheck for checkbox and radio inputs
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

$("body").on("click", ".deletetarget", function(e){
    e.preventDefault();
    $('#udeletetarget').modal('show');
    var id = $(this).data('id');
    getRow_target(id);
  });
  
  
  $("body").on("click", ".deletelocation", function(e){
    e.preventDefault();
    $('#udeletelocation').modal('show');
    var id = $(this).data('id');
    getRow_location(id);
  });
  
  $("body").on("click", ".deletefinance", function(e){
    e.preventDefault();
    $('#udeletefinance').modal('show');
    var id = $(this).data('id');
    getRow_finance(id);
  });
  
   $("body").on("click", ".deleteactivity", function(e){
    e.preventDefault();
    $('#udeleteactivity').modal('show');
    var id = $(this).data('id');
    getRow_activity(id);
  });
  
  $("body").on("click", ".deleteattachment", function(e){
    e.preventDefault();
    $('#udeleteattachment').modal('show');
    var id = $(this).data('id');
    getRow_attachment(id);
  });
  
}); 
  

function getRow_target(id){
  $.ajax({
    type: 'POST',
    url: 'target_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.tarid').val(response.targetID);
      $('.projid').val(response.Project);
      $('.tar_name').html(response.targetID)
      
    }, 
    error:function(x,e) {
        if (x.status==0) {
            alert('You are offline!!\n Please Check Your Network.');
        } else if(x.status==404) {
            alert('Requested URL not found.');
        } else if(x.status==500) {
            alert('Internel Server Error.');
        } else if(e=='parsererror') {
            alert('Error.\nParsing JSON Request failed.');
        } else if(e=='timeout'){
            alert('Request Time out.');
        } else {
            alert('Unknow Error.\n'+x.responseText);
        }
    }
  });
}


function getRow_location(id){
   
  $.ajax({
    type: 'POST',
    url: 'location_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.tarid').val(response.LocationID);
      $('.projid').val(response.Project);
      $('.tar_name').html(response.Name)
      
    }, 
    error:function(x,e) {
        if (x.status==0) {
            alert('You are offline!!\n Please Check Your Network.');
        } else if(x.status==404) {
            alert('Requested URL not found.');
        } else if(x.status==500) {
            alert('Internel Server Error.');
        } else if(e=='parsererror') {
            alert('Error.\nParsing JSON Request failed.');
        } else if(e=='timeout'){
            alert('Request Time out.');
        } else {
            alert('Unknow Error.\n'+x.responseText);
        }
    }
  });
}

function getRow_finance(id){
  $.ajax({
    type: 'POST',
    url: 'finance_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.financeid').val(response.financing_ID);
      $('.projid').val(response.Project);
      $('.finance_name').html(response.Financing)
      
    }, 
    error:function(x,e) {
        if (x.status==0) {
            alert('You are offline!!\n Please Check Your Network.');
        } else if(x.status==404) {
            alert('Requested URL not found.');
        } else if(x.status==500) {
            alert('Internel Server Error.');
        } else if(e=='parsererror') {
            alert('Error.\nParsing JSON Request failed.');
        } else if(e=='timeout'){
            alert('Request Time out.');
        } else {
            alert('Unknow Error.\n'+x.responseText);
        }
    }
  });
}

function getRow_activity(id){
  $.ajax({
    type: 'POST',
    url: 'activity_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.activityid').val(response.activityID);
      $('.projid').val(response.Project);
      $('.activity_name').html(response.Activity)
      
    }, 
    error:function(x,e) {
        if (x.status==0) {
            alert('You are offline!!\n Please Check Your Network.');
        } else if(x.status==404) {
            alert('Requested URL not found.');
        } else if(x.status==500) {
            alert('Internel Server Error.');
        } else if(e=='parsererror') {
            alert('Error.\nParsing JSON Request failed.');
        } else if(e=='timeout'){
            alert('Request Time out.');
        } else {
            alert('Unknow Error.\n'+x.responseText);
        }
    }
  });
}

function getRow_attachment(id){
  $.ajax({
    type: 'POST',
    url: 'attachment_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.attachmentid').val(response.fileID);
      $('.projid').val(response.Project);
      $('.attachment_name').html(response.Filename)
    }, 
    error:function(x,e) {
        if (x.status==0) {
            alert('You are offline!!\n Please Check Your Network.');
        } else if(x.status==404) {
            alert('Requested URL not found.');
        } else if(x.status==500) {
            alert('Internel Server Error.');
        } else if(e=='parsererror') {
            alert('Error.\nParsing JSON Request failed.');
        } else if(e=='timeout'){
            alert('Request Time out.');
        } else {
            alert('Unknow Error.\n'+x.responseText);
        }
    }
  });
}
</script>
</body>
</html>
