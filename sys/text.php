
<html>
<title></title>
<body style="margin: 20%; border: 1px solid black;">

    <?php
      $a = 'How are you?';
        if (strpos($a, 'are') !== false) {
           // echo 'true';
        }
        // Get current page URL 
        echo $_SERVER['HTTPS'].'<br />';
        echo $_SERVER['SERVER_PORT'].'<br />';
        echo $_SERVER['HTTP_HOST'].'<br />';
        echo $_SERVER['REQUEST_URI'].'<br />';
        echo $_SERVER['QUERY_STRING'].'<br />';
        echo $_SERVER['REMOTE_ADDR'].'<br />';
        echo $_SERVER['HTTP_REFERER'].'<br />';
        echo $_SERVER['HTTP_USER_AGENT'].'<br />';

        $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://"; 
        echo $protocol.'<br />';
        $user_current_url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . $_SERVER['QUERY_STRING']; 
        echo $user_current_url;
        // Get server related info 
        $user_ip_address = $_SERVER['REMOTE_ADDR']; 
        $referrer_url = !empty($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:'/'; 
        $user_agent = $_SERVER['HTTP_USER_AGENT']; 
        echo $user_ip_address.'<br />';
        echo $referrer_url.'<br />';
        echo $user_agent.'<br />';
        
        // // Insert visitor activity log into database 
        // $sql = "INSERT INTO visitor_activity_logs (user_ip_address, user_agent, page_url, referrer_url, created_on) VALUES ($user_ip_address, $user_agent,$user_current_url,$user_agent ,NOW())"; 
        // var_dump($sql);
        // $insert = $conn->query($sql);

        $date = "2022-01-01";
        $newDate = date('Y-m-d', strtotime($date.'+3 days'));
        echo $newDate;
        $newDate = date('Y-m-d', strtotime($date.'+3 months'));
        echo $newDate;
        $newDate = date('Y-m-d', strtotime($date.'+3 years'));
        echo $newDate;
    ?>
   <form  method="post" action="ali.php">
       <input type="text" name="name" id="name" placeholder="name.."/>
		<input type="date" name="mdate" id="mdate" placeholder="Manufacture date.."/>
		<input type="text" name="status" id="status" placeholder="status.."/>
		<input type="Submit" name="save" id="save" value="Submit"/>
   </form>
  
</body>
</html>