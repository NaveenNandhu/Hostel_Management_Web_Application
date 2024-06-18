<?php
ob_start();
session_start();
?>
<?php
if (isset($_POST['deletetdybtn'])) {
    $id = $_POST['delete_id'];
    $today[] = $_SESSION['d'];
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, 'products');
    $sql = "SELECT `$today[0]` FROM `daily_stock` WHERE `S.No`=$id";
    $result = $connection->query($sql);
    $row2 = [];
    if($result->num_rows > 0){
        $row2 = $result->fetch_all(MYSQLI_ASSOC);
    }
    $pur_value = implode("",$row2[0]);
    $pur_value = (float)$pur_value;
    $sql2 = "SELECT `$today[0]` FROM `hostel_2024` WHERE `S.No`=$id";
    $result2 = $connection->query($sql2);
    $row3 = [];
    if($result2->num_rows > 0){
        $row3 = $result2->fetch_all(MYSQLI_ASSOC);
    }
    $hos_val = implode("",$row3[0]);
    $hos_val = (float)$hos_val;
    $total = $hos_val+$pur_value;
    $zero = 0;
    $sql3 = "UPDATE `hostel_2024` SET `$today[0]`='$total' WHERE `S.No`='$id'";
    $result3 =  $connection->query($sql3);
    $sql4 = "UPDATE `daily_stock` SET `$today[0]`='$zero' WHERE `S.No`='$id'";
    $result4 =  $connection->query($sql4);
    header("Location: dailystock.php?dateinput=$today[0]&fetchbtn=");
        ob_clean();
}
?>