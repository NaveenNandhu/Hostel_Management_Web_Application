<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <fieldset>
        <legend>Insert Data</legend>
        <center>
            <h3>Details</h3>
        </center><br>
        <form method="post">
            <center>
                <label>
                    <h4>Product Id:</h4>
                </label>
                <input type="text" placeholder="Enter Id" autofocus required name="proid">
                <br>
                <label>
                    <h4>Product Name:</h4>
                </label>
                <input type="text" placeholder="Enter Product Name" autofocus required name="proname">
                <br>
                <label>
                    <h4>In:</h4>
                </label>
                <input type="text" placeholder="Enter Product scale" autofocus required name="pkg">
                <br>
                <label>
                    <h4>Quantity: </h4>
                </label>
                <input type="number" placeholder="Enter Quantity" autofocus required name="quantity">
                <br>
                <br>
                <input type="submit" value="Insert" name="insertbtn">
            </center>
        </form>
    </fieldset>
    <?php
    if (isset($_POST['insertbtn'])) {
        $pid = $_POST['proid'];
        $productname = $_POST['proname'];
        $productquan = $_POST['quantity'];
        $pkg = $_POST['pkg'];
        $conn = new mysqli('localhost', 'root', '', 'products');
        if ($conn->connect_error) {
            die("Connection failed: "
                . $conn->connect_error);
        }
        $sql = "INSERT INTO `hostel_2024`(`pid`, `pname`,`pkg`,`2024-01-01`) VALUES ('$pid','$productname','$pkg','$productquan')";
        $sql2 = "INSERT INTO `purchase_stock`(`pid`, `pname`,`pkg`,`2024-01-01`) VALUES ('$pid','$productname','$pkg','$productquan')";
        $sql3 = "INSERT INTO `daily_stock`(`pid`, `pname`,`pkg`,`2024-01-01`) VALUES ('$pid','$productname','$pkg','$productquan')";
        if ($conn->query($sql) && $conn->query($sql2) && $conn->query($sql3) === TRUE) {
            echo "<script>alert('Inserted successfully...')</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>
</body>

</html>