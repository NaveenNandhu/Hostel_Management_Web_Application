<?php
ob_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "products";
$connec = new mysqli($servername, $username, $password, $dbname);
extract($_GET);
$datesarrdb = explode(',', $dates);
$items = explode(',', $items);
$i = array_search($fromdate, $datesarrdb);
$j = array_search($todate, $datesarrdb);
$dateforfilter = array();
$index = 0;
$k;
for ($k = $i; $k <= $j; $k++) {
    $dateforfilter[$index] = $datesarrdb[$k];
    $index++;
}
echo "<table>";
echo "<thead>";
echo "<tr>";
echo "<th>";
echo "<center><b>Product Id</b></center>";
echo "</th>";
echo "<th>";
echo "<center><b>Product Name</b></center>";
echo "</th>";
foreach ($dateforfilter as $datesofdb) {
echo "<th>";
echo "<center><b>";
echo $datesofdb;
echo "</b></center>";
echo "</th>";
}
echo "</tr>";
echo "</thead>";
echo "<tbody>";
$lengthofitems = count($items);
$i;
for ($i = 0; $i < $lengthofitems; $i++) {
$qryfor3c = "SELECT * FROM $tb WHERE pname = '$items[$i]'";
$resfor3c = $connec->query($qryfor3c);
if($resfor3c->num_rows > 0)
{
$row = $resfor3c->fetch_all(MYSQLI_ASSOC);
foreach ($row as $rows)
{
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
$k = 0;
for($j = 0; $j < count($dateforfilter); $j++)
{
echo "<td>";
echo "<center>";
if($rows[$dateforfilter[$k]] == "")
{
echo "0 " . $rows['pkg'];
}
else
{
echo $rows[$dateforfilter[$k]].' '.$rows['pkg'];
}
echo "</center>";
echo "</td>";
$k++;
}
echo "</tr>";
}
$file_name = "$fromdate _to_ $todate.xls";
header("Content-Disposition: attachment; filename=\"$file_name\"");
header("Content-Type: application/vnd.ms-excel");
}
}
echo "</tbody>";
echo "</table>";
echo "</div>";?>