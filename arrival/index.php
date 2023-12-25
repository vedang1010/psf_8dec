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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investors List</title>
    <style>
        table {
            border-collapse: collapse;
            width: 90%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        /* Style for the image column */
        td img {
            max-width: 50px;
            height: auto;
            display: block;
            margin: 0 auto;
        }
        button {
            padding: 5px 10px;
            background-color: #3498db;
            color: #fff;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Investors List</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
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

    <script>
        function markArrived(investorId) {
            // Send an AJAX request to update the "has_arrived" status in the database
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "update_arrival.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    location.reload(); // Reload the page after the update
                }
            };
            xhr.send("investorId=" + investorId);
        }
    </script>
</body>
</html>
