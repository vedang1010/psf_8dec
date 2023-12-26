<?php
// Database connection parameters

$host = "localhost"; // Hostname (e.g., "localhost")
$username = "u331863597_biec"; // Database username
$password = "psf@BIEC69"; // Database password
$database = "u331863597_event"; // Database name

// Create a database connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch investor data including image URL from the database
$query = "SELECT id, name, image_url, has_arrived FROM investors";
$result = mysqli_query($conn, $query);

// Close the database connection
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap Order Details Table with Search Filter</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        body {
            color: #566787;
            background: #001247;
            font-family: 'Varela Round', sans-serif;
            font-size: 17px;
        }



        .table-responsive {
            margin: 60px 0;
        }

        .table-wrapper {
            min-width: 1000px;
            background: #fff;
            padding: 20px 25px;
            border-radius: 30px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        }

        .table-wrapper .btn {
            float: right;
            color: #333;
            background-color: #fff;
            border-radius: 3px;
            border: none;
            outline: none !important;
            margin-left: 10px;
        }

        .table-wrapper .btn:hover {
            color: #333;
            background: #f2f2f2;
        }

        .table-wrapper .btn.btn-primary {
            color: black;
            background: #bfcfff;
            size: 12px;
        }

        .table-wrapper .btn.btn-primary:hover {
            background: #fff;
        }

        .table-title .btn {
            font-size: 13px;
            border: none;
        }

        .table-title .btn i {
            float: left;
            font-size: 21px;
            margin-right: 5px;
        }

        .table-title .btn span {
            float: left;
            margin-top: 2px;
        }

        .table-title {
            color: black;
            background: #bfcfff;
            padding: 16px 25px;
            margin: -20px -25px 10px;
            border-radius: 3px 3px 0 0;
        }

        .table-title h2 {
            margin: 5px 0 0;
            font-size: 24px;
        }

        .show-entries select.form-control {
            width: 60px;
            margin: 0 5px;
        }

        .table-filter .filter-group {
            float: right;
            margin-left: 15px;
        }

        .table-filter input,
        .table-filter select {
            height: 34px;
            border-radius: 3px;
            border-color: #ddd;
            box-shadow: none;
        }

        .table-filter {
            padding: 5px 0 15px;
            border-bottom: 1px solid #e9e9e9;
            margin-bottom: 5px;
        }

        .table-filter .btn {
            height: 34px;
        }

        .table-filter label {
            font-weight: normal;
            margin-left: 10px;
        }

        .table-filter select,
        .table-filter input {
            display: inline-block;
            margin-left: 5px;
        }

        .table-filter input {
            width: 200px;
            display: inline-block;
        }

        .filter-group select.form-control {
            width: 110px;
        }

        .filter-icon {
            float: right;
            margin-top: 7px;
        }

        .filter-icon i {
            font-size: 18px;
            opacity: 0.7;
        }

        .table img {
            max-width: 60px;
            height: 60px;
            border-radius: 10%;
            overflow: hidden;
        }


        table.table tr th,
        table.table tr td {
            border-color: #bfcfff;
            /*#e9e9e9*/
            padding: 12px 15px;
            vertical-align: middle;
            text-align: center;
        }

        table.table tr th:first-child {
            width: 60px;
        }

        table.table tr th:last-child {
            width: 80px;
        }

        table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #bfcfff;
        }

        table.table-striped.table-hover tbody tr:hover {
            background: #f5f5f5;
        }

        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }

        table.table td a {
            font-weight: bold;
            color: #566787;
            display: inline-block;
            text-decoration: none;
        }

        table.table td a:hover {
            color: #2196F3;
        }

        table.table td a.view {
            width: 15px;
            height: 15px;
            color: #2196F3;
            border: 2px solid;
            border-radius: 8px;
            text-align: center;
        }

        table.table td a.view i {
            font-size: 22px;
            margin: 2px 0 0 1px;
        }

        table.table .avatar {
            border-radius: 12%;
            vertical-align: middle;
            margin-right: 10px;
            size: 15px;
        }

        h1 {

            font-family: Garamond, serif;

        }

        .circle {
            width: 60px;
            height: 60px;
            border-radius: 10%;
            overflow: hidden;
        }

        .circle img {
            width: 110%;
            height: 110%;
            object-fit: cover;
        }

        .status {
            font-size: 30px;
            margin: 2px 2px 0 0;
            display: inline-block;
            vertical-align: middle;
            line-height: 10px;
        }

        .text-success {
            color: #10c469;
        }

        .text-info {
            color: #62c9e8;
        }

        .text-warning {
            color: #FFC107;
        }

        .text-danger {
            color: #ff5b5b;
        }

        .hint-text {
            float: left;
            margin-top: 10px;
            font-size: 13px;
        }
    </style>
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-4">
                            <h1><b>Investors list</b></h1>
                        </div>
                        <div class="col-sm-8">
                            <a href="#" class="btn btn-primary"><i class="material-icons">&#xE863;</i> <span>
                                    <h6>Refresh List</h6>
                                </span></a>

                        </div>
                    </div>
                </div>
                <div class="table-filter">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="show-entries">

                            </div>
                        </div>
                        <div class="col-sm-9">
                            <button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
                            <div class="filter-group">
                                <label>Name</label>
                                <input type="text" class="form-control">
                            </div>

                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th></th>
                            <th>Image</th>
                            <th>Name</th>
                            <!-- <th>Arrived</th>                      -->
                            <!-- <th>Status</th>                     
                        <th>Net Amount</th>-->
                            <th>Arrived</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td><img src='" . $row['image_url'] . "' alt='" . $row['name'] . "' width='50'></td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>";
                if ($row['has_arrived']) {
                    echo "Yes";
                } else {
                    echo "<button onclick='markArrived(" . $row['id'] . ")'>Arrived</button>";
                }
                echo "</td>";
                echo "</tr>";
            }
            ?>
                    </tbody>
                </table>
                <div class="clearfix">
                    <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>

                </div>
            </div>
        </div>
    </div>
    <script>
        function markArrived(investorId) {
            // Send an AJAX request to update the "has_arrived" status in the database
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "update_arrival.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    location.reload(); // Reload the page after the update
                }
            };
            xhr.send("investorId=" + investorId);
        }
    </script>
</body>

</html>