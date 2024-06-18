<?php
if (isset($_GET['savechanges'])) {
    $id = $_GET['update_id'];
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, 'products');
    $date2[] = $_SESSION['d'];
    $newdate1 = $date2[0];
    $quaa = $_GET['updatequan'];
    $quaa= (float)$quaa;
    $sql = "SELECT `$newdate1` FROM `hostel_2024` WHERE `S.No`=$id";
    $result = $connection->query($sql);
    $row = [];
    if ($result->num_rows > 0){
        $row = $result->fetch_all(MYSQLI_ASSOC);
    }
    $text = implode("",$row[0]);
    $text = (float)$text;
    if($quaa<0)
    {
        header("Location: grocerypurc.php?dateinput=$date2[0]&fetchbtn=");
    }
    else{
        $sql2 = "SELECT `$newdate1` FROM `purchase_stock` WHERE `S.No`=$id";
        $result2 = $connection->query($sql2);
        $row2 = [];
        if ($result2->num_rows > 0){
            $row2 = $result2->fetch_all(MYSQLI_ASSOC);
        }
        $text2 = implode("",$row2[0]);
        $text2 = (float)$text2;
        $text2+=$quaa;
        $query_pur_tab = "UPDATE `purchase_stock` SET `$newdate1`='$text2' WHERE `S.No`='$id'";
    $query_run_pur_tab = mysqli_query($connection, $query_pur_tab);
    $text+=$quaa;

    $query = "UPDATE `hostel_2024` SET `$newdate1`='$text' WHERE `S.No`='$id'";
    $query_run = mysqli_query($connection, $query);
    if ($query_run)
    {
        header("Location: grocerypurc.php?dateinput=$date2[0]&fetchbtn=");
        ob_clean();
    } 
    else
    {
        echo '<script> alert("Problem With Updating the Quantity");</script>';
    }
    }
}
?>