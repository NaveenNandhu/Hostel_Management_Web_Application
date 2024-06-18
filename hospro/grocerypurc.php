<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Stock</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
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
    <form method="get">
        <input type="date" class="btn btn-primary" style="position: absolute; top: 105px; left: 190px;" name="dateinput"
            required id="fetbtndate">
        <button type="submit" class="btn btn-success" style="position: absolute;left:375px;"
            name="fetchbtn">Pick</button>
    </form>
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Quantity</h5>
                </div>
                <form method="get">
                    <div class="modal-body">
                        <br>
                        <input type="hidden" name="update_id" id="update_id">
                        <input type="text" class="form-control" id="quanidinput" placeholder="Quantity"
                            name="updatequan" required id="editmodel">
                        <script>
                            $(document).ready(function () {
                                $("#editmodal").on('shown.bs.modal', function (event) {
                                    $(this).find('input[type="text"]').focus();
                                });
                            });
                        </script>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="savechanges" id="savechangesedit" onclick="close_window();return false;">Save
                            changes</button>
                            <script>
                                $("#savechangesedit").on('click', function (event) {
                                    window.close();
                                });
                            </script>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
                <button class="btn bg-warning dropdown-toggle " type="button" id="dropdownMenuButton"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Stock Options
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="monthlystock.php">Monthly Stock</a>
                    <a class="dropdown-item active" href="#">Grocery Purchase</a>
                    <a class="dropdown-item" href="dailystock.php">Daily Stock</a>
                    <a class="dropdown-item" href="filteritems.php">Filter Stock</a>
                    <a class="dropdown-item" href="#">Help</a>
                </div>
            </div>
        </div>
    </nav>
    <br>
    <br>
    <center>
        <h3 style="user-select: none; cursor: pointer;">Purchase Stock</h3>
    </center>
    <div class="container" style="overflow:scroll;height:450px;width: 1000px;margin-top:50px;" id="scrollable-div">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th scope="col" width="10px">
                        <center>S.No</center>
                    </th>
                    <th scope="col" width="100px">
                        <center>PID</center>
                    </th>
                    <th scope="col">
                        <center>Product Name</center>
                    </th>
                    <th scope="col">
                        <center>Quantity</center>
                    </th>
                    <th scope="col">
                        <center>Action</center>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'fetchforplus.php';
                include 'updateitems.php';
                ?>
            </tbody>
        </table>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            var scrollableDiv = document.getElementById('scrollable-div');
            if (scrollableDiv) {
                var scrollPos = localStorage.getItem('divScrollPos');
                if (scrollPos) {
                    scrollableDiv.scrollTop = parseInt(scrollPos, 10);
                    console.log("Restored scroll position to:", scrollPos);
                }
            } else {
                console.log("Div not found");
            }
        });

        window.addEventListener('beforeunload', function() {
            var scrollableDiv = document.getElementById('scrollable-div');
            if (scrollableDiv) {
                localStorage.setItem('divScrollPos', scrollableDiv.scrollTop);
                console.log("Saved scroll position:", scrollableDiv.scrollTop);
            } else {
                console.log("Div not found");
            }
        });
    </script>
    <script>
        //$("#savechanges").on('click', function (event) {
        //event.preventDefault();
        $(document).ready(function () {
            $('.deletebtn').on('click', function () {
                $('#deletetodmodal').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#delete_id').val(data[0]);
                $('fetbtndate').val(date[1]);
            });
        });
        //});
    </script>
    <script>
        $(document).ready(function () {
            $('.editbtn').on('click', function () {

                $('#editmodal').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();
                $('#update_id').val(data[0]);
            });
        });
    </script>
</body>

</html>