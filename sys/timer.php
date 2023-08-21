 <?php
 $date = date("Y-m-d h:i:sa");
 //echo $date;
 
  date_default_timezone_set('Africa/Nairobi'); // Then call the date functions
		
		 $date = date('Y-m-d H:i:s');
	//	 echo $date;
		 
		 /*
		 //add and decrease time
		 $your_date = strtotime("1 day", strtotime("2016-08-24"));
         $new_date = date("Y-m-d", $your_date);
         
         echo date( "Y-m-d", strtotime( "2009-01-31 +1 month" ) ); // PHP:  2009-03-03
         echo date( "Y-m-d", strtotime( "2009-01-31 +2 month" ) ); // PHP:  2009-03-31
         */
         
         //second example 
         $date = strtotime("+1 day", strtotime("2007-02-28"));
         echo date("Y-m-d", $date);
         echo '<br />';
         $date = strtotime("+1 year", strtotime("2007-02-28"));
          echo date("Y-m-d", $date);
          echo '<br />';
          $date = strtotime("+1 months", strtotime("2007-02-28"));
          echo date("Y-m-d", $date);
         
      
 ?>