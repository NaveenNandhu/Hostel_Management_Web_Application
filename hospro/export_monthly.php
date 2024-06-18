<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "products";
$connec = new mysqli($servername, $username, $password, $dbname);

if ($connec->connect_error) {
    die("Connection failed: " . $connec->connect_error);
}

extract($_GET);

$sql = "SELECT * FROM `hostel_2024`";
$result = $connec->query($sql);

$row = [];
if ($result->num_rows > 0) {
    $row = $result->fetch_all(MYSQLI_ASSOC);
}

// Set headers for the download
$file_name = $date . "_Totalstock.xls";
header("Content-Disposition: attachment; filename=\"$file_name\"");
header("Content-Type: application/vnd.ms-excel");

// Start output buffering
ob_start();

echo "<table>";
echo "<thead>";
echo "<tr>";
echo "<th>Product Id</th>";
echo "<th>Product Name</th>";
echo "<th>Quantity</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

if (!empty($row)) {
    foreach ($row as $rows) {
        echo "<tr>";
        echo "<td>" . $rows['pid'] . "</td>";
        echo "<td>" . $rows['pname'] . "</td>";
        echo "<td>" . $rows[$date] . $rows['pkg'] . "</td>";
        echo "</tr>";
    }
}

echo "</tbody>";
echo "</table>";

// Flush the output buffer
ob_end_flush();
?>
