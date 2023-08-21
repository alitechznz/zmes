<?php

$startdate = $_GET['q'];
$duration = $_GET['dur'];
$unit = $_GET['unit'];

// $dateto=date_create($startdate);
// $date = date_format($startdate,"d-m-Y");
$date = $startdate;
// echo $date;
if($unit =='Year'){
    $value = date('Y-m-d', strtotime($date.'+'.$duration.' years'));
} elseif($unit =='day'){
    $value = date('Y-m-d', strtotime($date.'+'.$duration.' days'));
}else {
    $value = date('Y-m-d', strtotime($date.'+ '.$duration.' months'));
}
// echo $value;
// $value = $date;
// $end_date = strtotime($value, strtotime($startdate));

 echo '<input type="date"  name="enddate" value='.$value.' class="form-control pull-right" id="datepicker1" readonly>';

?>