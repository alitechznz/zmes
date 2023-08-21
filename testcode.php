<?php 
$my_str = 'The quick brown fox jumps over the lazy dog.';
$get = explode(" ", $my_str);
print_r($get);

$pizza  = "piece1 piece2 piece3 piece4 piece5 piece6";
$pieces = explode(" ", $pizza);
$arrlength = count($pieces);
for($x = 0; $x < $arrlength; $x++) {
    echo $pieces[$x].'<br/>'; // piece1
}

//echo $pieces[1]; // piece2

//$string = "123,456,78,000";  
//$str_arr = preg_split ("/\,/", $string); 
//echo $str_arr;
                            include 'php/conn.php';
                            $sponser = "";
                             $querypsp = "SELECT * FROM `project_financing`"; 
                             $resultpsp = mysqli_query($conn, $querypsp) or die("Error : ".mysqli_error($conn));
                             $iter = 0;
                             while($rowpsp = mysqli_fetch_array($resultpsp)) {	
                                 
                                $sponserID = $rowpsp['SponsorID'];
                                $sponser_amount = number_format($rowpsp['TotalAmount'],2);
                                $currency = $rowpsp['Unittype'];

                                $sponsorID_array = explode(", ",$sponserID);
                                $arrlength = count($sponsorID_array);
                                $temp_name = '';
                                    for($x = 0; $x < $arrlength; $x++) {
                                        $name = '';
                                        $getID = $sponsorID_array[$x]; // piece1
                                        $querypspo = "SELECT * FROM `organizationtb` WHERE `ID` ='$getID'"; 
                                        $resultpspo = mysqli_query($conn, $querypspo) or die("Error : ".mysqli_error($conn));
                                        if($rowpspo = mysqli_fetch_array($resultpspo)) {	
                                            $name = $rowpspo['Name'];
                                        }

                                        if($x == 0){
                                            $temp_name = $name;
                                        } else {
                                            $temp_name = $temp_name .', '.$name;
                                        }
                                    }
                               
                                    $sponser = $temp_name.'('.$sponser_amount.'/'.$currency.')';
                                    echo $sponser.'<br />';

                             }
                             
?>