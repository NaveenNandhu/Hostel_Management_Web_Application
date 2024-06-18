<?php
if (isset($_GET['fetchbtn'])) {
    $_SESSION['d'] = $_GET['dateinput'];
    $date1[] = $_SESSION['d'];
    $newdate3 = $date1[0];
    $today = $date1[0];
    $newdate3 = str_ireplace("-", "", $newdate3);
    $newdate3 = "tab_" . $newdate3;
    $tyear = substr($today, 0, 4);
    $tdum = substr($today, 5);
    $tmonth = substr($tdum, 0, 2);
    $tdate = substr($today, 8);
    $m = date($tmonth);
    $de = date($tdate);
    $y = date($tyear);
    $yester = date('Y-m-d', mktime(0, 0, 0, $m, ($de - 1), $y));
    $connection = mysqli_connect("localhost", "root", "");
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "products";
    echo "<center><h5 style='position:absolute;top:110px;left:1010px;'>Date: $date1[0]</h5></center>";
    $connec = new mysqli($servername, $username, $password, $dbname);
    if ($connec->connect_errno) {
        echo "Failed to connect to MySQL: " . $connec->connect_error;
        exit();
    }
    $sqlselect = "SELECT `$today` FROM `hostel_2024`";
    $resultselect = $connec->query($sqlselect);
    $sqlselect2 = "SELECT `$today` FROM `daily_stock`";
    $resultselect2 = $connec->query($sqlselect2);
    $sqlselect3 = "SELECT `$today` FROM `purchase_stock`";
    $resultselect3 = $connec->query($sqlselect3);
    if (!$resultselect2) {
        $create1 = "ALTER TABLE `daily_stock` ADD COLUMN `$today` FLOAT(15);";
        $res_cr1 = $connec->query($create1);
    }
    if (!$resultselect3) {
        $create2 = "ALTER TABLE `purchase_stock` ADD COLUMN `$today` FLOAT(15);";
        $res_cr2 = $connec->query($create2);
    }
    if ($resultselect) {
        $sqlselect = "SELECT * FROM `hostel_2024`";
        $resultselect = $connec->query($sqlselect);
        $row = [];
        if ($resultselect->num_rows > 0) {
            $row = $resultselect->fetch_all(MYSQLI_ASSOC);
        }
        foreach ($row as $rows) {
            ?>
            <tr>
                <td>
                    <center>
                        <?php
                        echo $rows['S.No'];
                        ?>
                    </center>
                </td>
                <td>
                    <center>
                        <?php
                        echo $rows['pid']; ?>
                    </center>
                </td>
                <td>
                    <center>
                        <?php echo $rows['pname']; ?>
                    </center>
                </td>
                <td>
                    <center>
                        <?php echo $rows[$today]; ?>
                        <?php echo $rows['pkg']; ?>
                    </center>
                </td>
                <td>
                    <center>
                        <a href="#editmodal" class="btn btn-lg btn-danger editbtn" data-toggle="modal"
                            style='height: 35px;width: 150px;font-size:16px;text-align:center;'><i class="fa-solid fa-circle-minus">
                                Used</i></a>
                                <a href="#deletetodmodal" class="btn btn-lg btn-warning deletebtn" data-toggle="modal"
                            style='height: 35px;width: 50px;font-size:16px;text-align:center;margin-bottom:0px;'>
                            <i class="fa-solid fa-trash"></i></a>
                        <div class="modal fade" id="deletetodmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Delete Item</h5>
                                    </div>
                                    <form method="post" action="deletetdydaily.php">
                                        <div class="modal-body">
                                            <input type="hidden" name="delete_id" id="delete_id">
                                            Do you Want to Delete the Quantity of the Item?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-danger" name="deletetdybtn">Delete</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </center>
                    </center>
                </td>
            </tr>
            <?php
        }
    } else {
        //Find the Last Column of the Table in mySQL
        $find_last_column = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'hostel_2024' ORDER BY ORDINAL_POSITION DESC LIMIT 1";
        $result_of_lastcol = $connec->query($find_last_column);
        $rowoflast = mysqli_fetch_array($result_of_lastcol);
        $last_updated_date = $rowoflast[0];
        //Then use that column name to create the current column
        $query_dup_col = "ALTER TABLE `hostel_2024` ADD `$today` float(15);";
        $query_dup_col2 = "UPDATE `hostel_2024` SET `$today` = `$last_updated_date`";
        $res_query_dup_col = $connec->query($query_dup_col);
        $res_query_dup_col2 = $connec->query($query_dup_col2);
        $sqlselect = "SELECT * FROM `hostel_2024`";
        $resultselect = $connec->query($sqlselect);
        $row = [];
        if ($resultselect->num_rows > 0) {
            $row = $resultselect->fetch_all(MYSQLI_ASSOC);
        }
        foreach ($row as $rows) {
            ?>
            <tr>
                <td>
                    <center>
                        <?php
                        echo $rows['S.No'];
                        ?>
                    </center>
                </td>
                <td>
                    <center>
                        <?php
                        echo $rows['pid']; ?>
                    </center>
                </td>
                <td>
                    <center>
                        <?php echo $rows['pname']; ?>
                    </center>
                </td>
                <td>
                    <center>
                        <?php echo $rows[$today]; ?>
                        <?php echo $rows['pkg']; ?>
                    </center>
                </td>
                <td>
                    <center>
                        <a href="#editmodal" class="btn btn-lg btn-danger editbtn" data-toggle="modal"
                            style='height: 35px;width: 150px;font-size:16px;text-align:center;'><i class="fa-solid fa-circle-minus">
                                Used</i></a>
                                <a href="#deletetodmodal" class="btn btn-lg btn-warning deletebtn" data-toggle="modal"
                            style='height: 35px;width: 50px;font-size:16px;text-align:center;margin-bottom:0px;'>
                            <i class="fa-solid fa-trash"></i></a>
                        <div class="modal fade" id="deletetodmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Delete Item</h5>
                                    </div>
                                    <form method="post" action="deletetdydaily.php">
                                        <div class="modal-body">
                                            <input type="hidden" name="delete_id" id="delete_id">
                                            Do you Want to Delete the Quantity of the Item?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-danger" name="deletetdybtn">Delete</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </center>
                    </center>
                </td>
            </tr>
            <?php
        }
    }
}
?>