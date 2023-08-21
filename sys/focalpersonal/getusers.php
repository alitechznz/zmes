<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);
/*
$con = mysqli_connect('localhost','peter','abc123','my_db');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
*/
include ('php/connection.php');

mysqli_select_db($conn,"ocgs");
$sql="SELECT * FROM publication WHERE Year_Published = '".$q."'";
$result = mysqli_query($conn,$sql);

echo "<table>
<tr>
<th>ID</th>
<th>Year Published</th>
<th>Report Name</th>
<th>Description</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['ID'] . "</td>";
    echo "<td>" . $row['Year_Published'] . "</td>";
    echo "<td>" . $row['Report_Name'] . "</td>";
    echo "<td>" . $row['Abstration'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($conn);
?>
</body>
</html>