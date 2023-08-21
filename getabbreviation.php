<?php 

if(!isset($_SESSION)) { 
    session_start(); 
} 
if(isset($_GET['budget'])){
    include 'php/conn.php';
    $mwaka_budget = $_GET['budget'];
    $query = "SELECT * FROM summary WHERE Mwaka='$mwaka_budget' ORDER BY TaasisiCode";
    $result = mysqli_query($conn, $query);
    echo '<table>
                <thead><tr>
                    <th>Code</th>
                    <th>Institution</th>
                </tr></thead><tbody>';
           
    while($row = mysqli_fetch_array($result)) {
          $code = $row['TaasisiCode'];
          $Institution = $row['Taasisi'];
           echo '<tr>
                    <td>'.$code.'</td>
                    <td>'.$Institution.'</td>
                </tr>';
    }
    
    echo '</tbody></table>';
    //echo $chart_data;
    //mysqli_close($conn);
}
?>