<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "products";
$connec = new mysqli($servername, $username, $password, $dbname);
extract($_GET);
$sql = "SELECT * FROM `hostel_2024`";
$result = $connec->query($sql);
$row = [];
if ($result->num_rows > 0) {
    $row = $result->fetch_all(MYSQLI_ASSOC);
}
echo "<table class='table table-hover table-bordered'>";
echo "<thead>";
echo "<tr>";
echo "<th scope='col'>";
echo "<center>Product Id</center>";
echo "</th>";
echo "<th scope='col'>";
echo "<center>Product Name</center>";
echo "</th>";
echo "<th scope='col'>";
echo "<center>Quantity</center>";
echo "</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";
if (!empty($row))
    foreach ($row as $rows) {
        echo "<tr>";
        echo "<td>";
        echo "<center>";
        echo $rows['pid'];
        echo "</center>";
        echo "</td>";
        echo "<td>";
        echo "<center>";
        echo $rows['pname'];
        echo "</center>";
        echo "</td>";
        echo "<td>";
        echo "<center>";
        echo $rows[$date];
        echo $rows['pkg'];
        echo "</center>";
        echo "</td>";
        echo "</tr>";
    }
echo "<tbody>";
$file_name = "$date _ Totalstock.xls";
header("Content-Disposition: attachment; filename=\"$file_name\"");
header("Content-Type: application/vnd.ms-excel");
?>