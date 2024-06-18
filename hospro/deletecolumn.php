<?php
ob_start();
session_start();
?>
<?php
if (isset($_POST['deletecol']))
{
    $date1[] = $_SESSION['d'];
    $newdate3 = $date1[0];
    $today = $date1[0];
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, 'products');
    $sql = "ALTER TABLE `hostel_2024` DROP COLUMN `$today`";
    $result = $connection->query($sql);
    $sql2 = "ALTER TABLE `purchase_stock` DROP COLUMN `$today`";
    $result2 = $connection->query($sql2);
    $sql3 = "ALTER TABLE `daily_stock` DROP COLUMN `$today`";
    $result3 = $connection->query($sql3);
    header("Location: monthlystock.php");
    ob_clean();
}
?>