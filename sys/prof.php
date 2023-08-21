<?php
//Include database configuration file
//include_once 'dbConfig.php';

//Get current user ID from session
//$userId = $_SESSION['user_id'];

//Get user data from database
//$result = $db->query("SELECT * FROM users WHERE id = $userId");
//$row = $result->fetch_assoc();

//User profile picture
//$userPicture = !empty($row['picture'])?$row['picture']:'no-image.png';
$userPicture ='avatar.png';
$userPictureURL = 'dist/img/'.$userPicture;
?>
<style>
    .container{width: 100%;}
.user-box {
    width: 100px;
    border-radius: 0 0 3px 3px;
    padding: 10px;
    position: relative;
}
.user-box .name {
    word-break: break-all;
    padding: 10px 10px 10px 10px;
    background: #EEEEEE;
    text-align: center;
    font-size: 20px;
}
.user-box form{display: inline;}
.user-box .name h4{margin: 0;}
.user-box img#imagePreview{width: 100%;}

.editLink {
    position:absolute;
    top:50px;
    margin-left:120px;
    opacity:1;
    transition: all 0.3 ease-in-out 0s;
    -mox-transition: all 0.3s ease-in-out 0s;
    -webkit-transition: all 0.3s ease-in-out 0s;
    background:rgba(255,255,255,0.2);
}
.img-relative:hover .editLink{opacity:1;}
.overlay{
    position: absolute;
    left: 0;
    top: 0;
    right: 0;
    bottom: 0;
    z-index: 2;
    background: rgba(255,255,255,0.7);
}
.overlay-content {
    position: absolute;
    transform: translateY(-50%);
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    top: 50%;
    left: 0;
    right: 0;
    text-align: center;
    color: #555;
}
.uploadProcess img{
    max-width: 207px;
    border: none;
    box-shadow: none;
    display: inline;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    document.getElementById("imagedisplay").style.display = "none";
    $('.editLink').style.display ="none";
    document.getElementById("imagePreview").style.display = "block";
});

function readFile(input) {
    //alert(input);
  var file = input.files[0];
  var reader = new FileReader();

  reader.readAsDataURL(file);
  reader.onload = function() {
   // console.log(reader.result);
    //alert(reader.result);
    document.getElementById("imagePreview").style.display = "none";
    document.getElementById("imagedisplay").style.display = "block";
    $('#imagedisplay').css('background-image', 'url(' + reader.result + ')', 'background-repeat', 'no-repeat').addClass('hasImage');
   // document.getElementById('imagedisplay').style.background-repeat = "no-repeat";
  };

  reader.onerror = function() {
   // console.log(reader.error);
  };

}

/*
$(document).ready(function () {
    //If image edit link is clicked
    $(".editLink").on('click', function(e){
        e.preventDefault();
        $("#fileInput:hidden").trigger('click');
    });

    //On select file to upload
    $("#fileInput").on('change', function(){
        var myJavascriptVar ="dist/img/upload.jpg";
        var image = $('#fileInput').val();
        var img_ex = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
        var img_url ='<?php 
                       // echo $_FILES["picture"]["tmp_name"]; 
                    ?>';
        
        //validate file type
        if(!img_ex.exec(image)){
            alert('Please upload only .jpg/.jpeg/.png/.gif file.');
            $('#fileInput').val('');
            return false;
        }else{
            
            $('.uploadProcess').show();
            $('#uploadForm').hide();
            myJavascriptVar = img_url;
            document.cookie = "myJavascriptVar = " + myJavascriptVar;
            //$( "#picUploadForm" ).submit();
        }
    });
});

//After completion of image upload process
function completeUpload(success, fileName) {
    if(success == 1){
        $('#imagePreview').attr("src", "");
        $('#imagePreview').attr("src", fileName);
        $('#fileInput').attr("value", fileName);
        $('.uploadProcess').hide();
    }else{
        $('.uploadProcess').hide();
        alert('There was an error during file upload!');
    }
    return true;
}
*/
</script>

<?php 
   //$userPictureURL= $_COOKIE['myJavascriptVar'];
   //echo $userPictureURL;
?>

<div class="container input-group">
    <div class="user-box">
        <div class="img-relative">
            <!-- Loading image -->
            <div class="overlay uploadProcess" style="display: none;">
                <div class="overlay-content"><img src="dist/img/avatar.png" width= "2%"/></div>
            </div>
            <!-- Hidden upload form -->
            <!--form method="post" action="upload.php" enctype="multipart/form-data" -->
                <!--input type="file" name="picture" id="fileInput"  style="display:none"/-->
                <input type="file" name="picture" onchange="readFile(this)" id="fileInput" />
            <!--/form-->
            <iframe id="uploadTarget" name="uploadTarget" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
            <!-- Image update link -->
            <a class="editLink" href="javascript:void(0);">User's Profile Picture</a>
            <!-- Profile image -->
             <img src="" style="width:100px; height: 100px; border: 1px solid antiquewhite;" id="imagedisplay" />
             <img src="<?php echo $userPictureURL; ?>" id="imagePreview" style="margin-top: -120px;">
        </div>
        <div class="name">
            <h4><?php //echo $row['name']; ?></h3>
        </div>
    </div>
</div>