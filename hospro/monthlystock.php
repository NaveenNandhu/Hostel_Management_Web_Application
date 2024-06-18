<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<!-- data-bs-theme="dark" -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MonthlyStock</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                    <a class="dropdown-item active" href="#">Monthly Stock</a>
                    <a class="dropdown-item" href="grocerypurc.php">Grocery Purchase</a>
                    <a class="dropdown-item" href="dailystock.php">Daily Stock</a>
                    <a class="dropdown-item" href="filteritems.php">Filter Stock</a>
                    <a class="dropdown-item" href="#">Help</a>
                </div>
            </div>
        </div>
    </nav>
    <br>
    <br>
    <form method="post">
        <input type="date" class="btn btn-primary" style="position: absolute; top: 105px; left: 200px;" name="dateinput"
            required>
        <button type="submit" class="btn btn-success" style="position: absolute;left:375px;" name="fetchbtn"
            hidden>Fetch</button>
    </form>
    <center>
        <h3 style="user-select: none; cursor: pointer;">Monthly Stock
    </center>
    <br><br><br>
    <div class="container" style="overflow:scroll;height:448px;width: 1000px;margin-top:-35px;">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th scope="col">
                        <center>Product Id</center>
                    </th>
                    <th scope="col">
                        <center>Product Name</center>
                    </th>
                    <th scope="col">
                        <center>Quantity</center>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_POST['fetchbtn'])) {
                    $date = $_POST['dateinput'];
                    $_SESSION['d'] = $date;
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "products";
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_errno) {
                        echo "Failed to connect to MySQL: " . $conn->connect_error;
                        exit();
                    }
                    $sql = "SELECT * FROM `hostel_2024`";
                    $result = $conn->query($sql);
                    $row = [];
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_all(MYSQLI_ASSOC);
                    }
                    if (!empty($row))
                        foreach ($row as $rows) {
                            ?>
                            <tr>
                                <td>
                                    <center>
                                        <?php echo $rows['pid']; ?>
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        <?php echo $rows['pname']; ?>
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        <?php echo $rows[$date]; ?>
                                        <?php echo $rows['pkg']; ?>
                                    </center>
                                </td>
                            </tr>
                        <?php }
                        ?>
                        <form method='post' action='deletecolumn.php'>
                        <button type='submit' class='btn btn-danger' style='position: absolute;left:860px;top:104px' name='deletecol'><i class='fa-solid fa-trash'></i> Delete Data</button>
                        </form>
                        <?php
                        echo "<a href='export_monthly.php?date=$date' class='btn btn-success' style='height: 35px;width: 150px;position: absolute; top: 105px; right: 180px;'><i class='fa-solid fa-file-export'></i> Export</a>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>