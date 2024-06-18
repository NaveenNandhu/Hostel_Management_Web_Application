<?php ob_start();
session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter Items</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/795f84a4de.js" crossorigin="anonymous"></script>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</head>
<style>
    body {
        background: url('bg3.jpg');
        background-attachment: fixed;
        background-size: cover;
    }
</style>

<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="https://gascgobi.ac.in/">
                <img src="https://storage.googleapis.com/ezap-prod/colleges/9071/gobi-arts-and-science-college-gobichettipalayam-logo.png"
                    alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
                GOBI ARTS AND SCIENCE COLLEGE
            </a>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "products";
            $connectt = new mysqli($servername, $username, $password, $dbname);
            $find_last_column = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'hostel_2024' ORDER BY ORDINAL_POSITION DESC LIMIT 1";
            $result_of_lastcol = $connectt->query($find_last_column);
            $rowoflast = mysqli_fetch_array($result_of_lastcol);
            $last_updated_date = $rowoflast[0];
            echo "<h4 style='position:relative;right:200px;user-select:none;cursor:pointer'>Last Update: $last_updated_date</h4>";
            ?>
            <div class="dropdown" style="position: absolute; right: 30px;">
                <button class="btn btn-warning dropdown-toggle " type="button" id="dropdownMenuButton"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Stock Options
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="monthlystock.php">Monthly Stock</a>
                    <a class="dropdown-item" href="grocerypurc.php">Grocery Purchase</a>
                    <a class="dropdown-item" href="dailystock.php">Daily Stock</a>
                    <a class="dropdown-item active" href="#">Filter Stock</a>
                    <a class="dropdown-item" href="#">Help</a>
                </div>
            </div>
        </div>
    </nav>
    <br>
    <br>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="date" class="btn btn-primary" style="position: absolute; top: 105px; left: 200px;" name="fromdate"
            required>
        <input type="date" class="btn btn-primary" style="position: absolute; top: 105px; left: 400px;" name="todate"
            required>
        <button type="button" class="btn btn-primary" style="position: absolute; top: 105px; left: 600px;"
            data-toggle="modal" data-target="#exampleModalLong" id="slct_btn"><i class="fa-solid fa-check"></i>
            Select Items
        </button>
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Select Items</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="checkall" id="checkall"
                                onClick="toggle(this)">
                            <label class="form-check-label" for="checkall">
                                Check All
                            </label>
                            <script>
                                function toggle(source) {
                                    checkboxes = document.getElementsByName('options[]');
                                    for (var i = 0, n = checkboxes.length; i < n; i++) {
                                        checkboxes[i].checked = source.checked;
                                    }
                                }
                            </script>
                        </div>
                        <br>
                        <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "products";
                        $conne = new mysqli($servername, $username, $password, $dbname);
                        $find_last_column = "SELECT * FROM `hostel_2024`";
                        $result_of_lastcol = $conne->query($find_last_column);
                        $row = [];
                        if ($result_of_lastcol->num_rows > 0) {
                            $row = $result_of_lastcol->fetch_all(MYSQLI_ASSOC);
                        }
                        foreach ($row as $rows) {
                            ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="<?php echo $rows['pname'] ?>"
                                    id="<?php echo $rows['pname'] ?>" name="options[]">
                                <label class="form-check-label" for="<?php echo $rows['pname'] ?>">
                                    <?php echo $rows['pname']; ?>
                                </label>
                            </div>
                            <br>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" style="width:100px;" data-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
        <select style="position: absolute; top: 105px; left: 770px;height:40px;border-radius:5px;outline:none;"
            name="status">
            <option>Total Stock</option>
            <option>Purchased Items</option>
            <option>Used Items</option>
        </select>
        <input type="submit" class="btn btn-success" style="position: absolute; top: 105px; left: 950px;" id="chkbtn"
            value="FETCH" name="fetchbtn">
    </form>
    <br>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        ?>
        <style>
            .table-container {
                width: 90%;
                height: 400px;
                overflow-x: scroll;
                overflow-y: scroll;
                border: 1px solid #ccc;
            }

            table {
                position: absolute;
                top: 0px;
                width: 100%;
                border-collapse: collapse;
            }

            th {
                padding: 8px 5px;
                border: 1px solid #ddd;
                text-align: left;
            }

            thead {
                width: 100%;
                background-color: #f9f9f9;
            }
        </style>
        <div class="table-container" style="position:relative;top:30px;left:69px">
            <table class="table table-bordered" style="margin:0px;">
                <thead style="background-color: #EFEFEF;">
                    <tr>
                        <th style="min-width: 150px; height: 25px; border: dashed 1px lightblue;">
                            <center>Product Id</center>
                        </th>
                        <th style="min-width: 100px; height: 25px; border: dashed 1px lightblue;">
                            <center>Product Name</center>
                        </th>
                        <?php
                        $selectedOptions = [];
                        $items = array();
                        $i = 0;
                        if (!empty($_POST['options'])) {
                            foreach ($_POST['options'] as $selectedOption) {
                                $items[$i] = $selectedOption;
                                $i++;
                            }

                            $itemsinstr = implode(',', $items);
                            echo "<br>";
                            if (in_array("Check All", $items)) {
                                array_splice($items, $pos, 1);
                            }
                            $fromdate = $_POST['fromdate'];
                            $todate = $_POST['todate'];
                            $option = $_POST['status'];
                        } else {
                            echo "<script>console.log('No options selected');</script>";
                        }
                        //check for database
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "products";
                        $connec = new mysqli($servername, $username, $password, $dbname);
                        $sqlselect = "SELECT COLUMN_NAME
                     FROM INFORMATION_SCHEMA.COLUMNS
                     WHERE TABLE_SCHEMA = 'products' AND TABLE_NAME = 'hostel_2024'";
                        $plainString = "";
                        $columnName = 'COLUMN_NAME';
                        $resultselect = $connec->query($sqlselect);
                        if ($resultselect->num_rows > 0) {
                            $row = $resultselect->fetch_all(MYSQLI_ASSOC);
                            foreach ($row as $rows) {
                                $plainString .= $rows[$columnName] . ",";
                            }
                        } else {
                            echo "<script>console.log('Error in connection');</script>";
                        }
                        $plainString = trim($plainString);
                        $slicedString = substr($plainString, 19);
                        $slicedString = substr($slicedString, 0, strlen($slicedString) - 1);
                        $datesarrdb = explode(',', $slicedString);
                        if (in_array($fromdate, $datesarrdb) and in_array($todate, $datesarrdb) and array_search($fromdate, $datesarrdb) < array_search($todate, $datesarrdb) and $option == "Total Stock") {
                            $i = array_search($fromdate, $datesarrdb);
                            $j = array_search($todate, $datesarrdb);
                            $dateforfilter = array();
                            $index = 0;
                            $k;
                            for ($k = $i; $k <= $j; $k++) {
                                $dateforfilter[$index] = $datesarrdb[$k];
                                $index++;
                            }
                            $datesofdb;
                            foreach ($dateforfilter as $datesofdb) {
                                ?>
                                <th scope="col" style="min-width: 100px; height: 25px; border: dashed 1px lightblue;">
                                    <center><?php echo $datesofdb; ?></center>
                                </th>
                                <?php
                            }
                            ?>
                        </tr>
                    </thead>
                    <?php
                    ?>
                    <tbody style="overflow-y: scroll;overflow-x: scroll;height: 25px;border: 1px solid #ddd;">
                        <?php
                        $lengthofitems = count($items);
                        $i;
                        for ($i = 0; $i < $lengthofitems; $i++) {
                            $qryfor3c = "SELECT * FROM hostel_2024 WHERE pname = '$items[$i]'";
                            $resfor3c = $connec->query($qryfor3c);
                            if ($resfor3c->num_rows > 0) {
                                $row = $resfor3c->fetch_all(MYSQLI_ASSOC);
                                foreach ($row as $rows) {
                                    ?>
                                    <tr style="border:1px solid #ddd">
                                        <td style="border:1px solid #ddd">
                                            <center><?php echo $rows['pid'] ?></center>
                                        </td>
                                        <td style="border:1px solid #ddd">
                                            <center><?php echo $rows['pname'] ?></center>
                                        </td>
                                        <?php
                                        $k = 0;
                                        for ($j = 0; $j < count($dateforfilter); $j++) {
                                            ?>
                                            <td style="border:1px solid #ddd">
                                                <center><?php echo $rows[$dateforfilter[$k]] . " " . $rows['pkg'] ?></center>
                                            </td>
                                            <?php
                                            $k++;
                                        }
                                        ?>
                                    </tr>
                                    <?php

                                }
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <?php
            $tabname1 = "hostel_2024";
            echo "<a href='export.php?fromdate=$fromdate&todate=$todate&option=$option&dates=$slicedString&items=$itemsinstr&tb=$tabname1' class='btn btn-lg btn-success' style='position: absolute; top: 105px; left: 1050px;height:40px;'><i class='fa-solid fa-file-export'>
                        Export</i></a>";
            ?>
            <?php

                        }
                        /////2nd if condition and else condition
                        else if (in_array($fromdate, $datesarrdb) and in_array($todate, $datesarrdb) and array_search($fromdate, $datesarrdb) < array_search($todate, $datesarrdb) and $option == "Purchased Items") {
                            $i = array_search($fromdate, $datesarrdb);
                            $j = array_search($todate, $datesarrdb);
                            $dateforfilter = array();
                            $index = 0;
                            $k;
                            for ($k = $i; $k <= $j; $k++) {
                                $dateforfilter[$index] = $datesarrdb[$k];
                                $index++;
                            }
                            $datesofdb;
                            foreach ($dateforfilter as $datesofdb) {
                                ?>
                    <th scope="col" style="min-width: 100px; height: 25px; border: dashed 1px lightblue;">
                        <center><?php echo $datesofdb; ?></center>
                    </th>
                <?php
                            }
                            ?>
                </tr>
                </thead>
                <?php
                ?>
                <tbody style="overflow-y: scroll;overflow-x: scroll;height: 25px;border: 1px solid #ddd;">
                    <?php
                    $lengthofitems = count($items);
                    $i;
                    for ($i = 0; $i < $lengthofitems; $i++) {
                        $qryfor3c = "SELECT * FROM purchase_stock WHERE pname = '$items[$i]'";
                        $resfor3c = $connec->query($qryfor3c);
                        if ($resfor3c->num_rows > 0) {
                            $row = $resfor3c->fetch_all(MYSQLI_ASSOC);
                            foreach ($row as $rows) {
                                ?>
                                <tr style="border:1px solid #ddd">
                                    <td style="border:1px solid #ddd">
                                        <center><?php echo $rows['pid'] ?></center>
                                    </td>
                                    <td style="border:1px solid #ddd">
                                        <center><?php echo $rows['pname'] ?></center>
                                    </td>
                                    <?php
                                    $k = 0;
                                    for ($j = 0; $j < count($dateforfilter); $j++) {
                                        ?>
                                        <td style="border:1px solid #ddd">
                                            <center><?php if ($rows[$dateforfilter[$k]] == "") {
                                                echo "0 " . $rows['pkg'];
                                            } else {
                                                echo $rows[$dateforfilter[$k]] . " " . $rows['pkg'];
                                            } ?></center>
                                        </td>
                                        <?php
                                        $k++;
                                    }
                                    ?>
                                </tr>
                            <?php

                            }
                        }
                    }
                    ?>
                </tbody>
                </table>
                </div>
                <?php
                $tabname1 = "purchase_stock";
                echo "<a href='export.php?fromdate=$fromdate&todate=$todate&option=$option&dates=$slicedString&items=$itemsinstr&tb=$tabname1' class='btn btn-lg btn-success' style='position: absolute; top: 105px; left: 1050px;height:40px;'><i class='fa-solid fa-file-export'>
                        Export</i></a>";
                ?>
            <?php
                        }
                        //3rd if for daily stock 
                        else if (in_array($fromdate, $datesarrdb) and in_array($todate, $datesarrdb) and array_search($fromdate, $datesarrdb) < array_search($todate, $datesarrdb) and $option == "Used Items") {
                            $i = array_search($fromdate, $datesarrdb);
                            $j = array_search($todate, $datesarrdb);
                            $dateforfilter = array();
                            $index = 0;
                            $k;
                            for ($k = $i; $k <= $j; $k++) {
                                $dateforfilter[$index] = $datesarrdb[$k];
                                $index++;
                            }
                            $datesofdb;
                            foreach ($dateforfilter as $datesofdb) {
                                ?>
                        <th scope="col" style="min-width: 100px; height: 25px; border: dashed 1px lightblue;">
                            <center><?php echo $datesofdb; ?></center>
                        </th>
                <?php
                            }
                            ?>
                    </tr>
                    </thead>
                <?php
                ?>
                    <tbody style="overflow-y: scroll;overflow-x: scroll;height: 25px;border: 1px solid #ddd;">
                    <?php
                    $lengthofitems = count($items);
                    $i;
                    for ($i = 0; $i < $lengthofitems; $i++) {
                        $qryfor3c = "SELECT * FROM daily_stock WHERE pname = '$items[$i]'";
                        $resfor3c = $connec->query($qryfor3c);
                        if ($resfor3c->num_rows > 0) {
                            $row = $resfor3c->fetch_all(MYSQLI_ASSOC);
                            foreach ($row as $rows) {
                                ?>
                                    <tr style="border:1px solid #ddd">
                                        <td style="border:1px solid #ddd">
                                            <center><?php echo $rows['pid'] ?></center>
                                        </td>
                                        <td style="border:1px solid #ddd">
                                            <center><?php echo $rows['pname'] ?></center>
                                        </td>
                                    <?php
                                    $k = 0;
                                    for ($j = 0; $j < count($dateforfilter); $j++) {
                                        ?>
                                            <td style="border:1px solid #ddd">
                                                <center><?php if ($rows[$dateforfilter[$k]] == "") {
                                                    echo "0 " . $rows['pkg'];
                                                } else {
                                                    echo $rows[$dateforfilter[$k]] . " " . $rows['pkg'];
                                                } ?></center>
                                            </td>
                                        <?php
                                        $k++;
                                    }
                                    ?>
                                    </tr>
                            <?php

                            }
                        }
                    }
                    ?>
                    </tbody>
                    </table>
                    </div>
                <?php
                $tabname1 = "daily_stock";
                echo "<a href='export.php?fromdate=$fromdate&todate=$todate&option=$option&dates=$slicedString&items=$itemsinstr&tb=$tabname1' class='btn btn-lg btn-success' style='position: absolute; top: 105px; left: 1050px;height:40px;'><i class='fa-solid fa-file-export'>
                        Export</i></a>";
                ?>
            <?php
                        } else {
                            echo "<script>alert('Check Your Inputed Dates whether it is Correct or Wrong or items checked...');</script>";
                        }
                        ?>
        <?php
    }
    ?>
</body>

</html>