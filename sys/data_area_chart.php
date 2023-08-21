<?php
//setting header to json
header('Content-Type: application/json');

//database
require('includes/conn.php');
/*define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'inventory');*/

//get connection
/*$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli)*/

//query to get data from the table
$query = sprintf("SELECT DISTINCT month(Submissiondate),year(Submissiondate),CONCAT(left(monthname(Submissiondate),3), ' ', right(year(Submissiondate),2)) as month,count(Submit_ID) as sales 
				  FROM sample_submit 
				  GROUP BY month,month(Submissiondate)
				  ORDER BY year(Submissiondate),month(Submissiondate) asc
				  LIMIT 6");

//execute query
$result = $conn->query($query);

//loop through the returned data
$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

//free memory associated with result
$result->close();

//close connection
$conn->close();

//now print the data
print json_encode($data);
?>