<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);


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

// Fetch names and image paths of investors who have arrived from the database
$query = "SELECT name, image_url FROM investors WHERE has_arrived = 1";
$result = mysqli_query($conn, $query);

// Build a table of investor names and images
$investorArrivals = "";
while ($row = mysqli_fetch_assoc($result)) {
    $investorName = $row['name'];
    $imagePath = $row['image_url'];
    $investorArrivals .= "<tr><td><img src='$imagePath' alt='$investorName'></td><td>$investorName</td></tr>";
}

// Close the database connection
mysqli_close($conn);

// Send the table of investor names and images as the response
echo $investorArrivals;
?>