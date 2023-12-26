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
$query = "SELECT startup_name, image_url,stall_no,contact,issue,description FROM startup_issues WHERE solved = 1";
// startup_name	image_url	stall_no	contact	issue	description	solved	

$result = mysqli_query($conn, $query);

// Build a table of investor names and images
// $investorArrivals = "";
// while ($row = mysqli_fetch_assoc($result)) {
//     $investorName = $row['name'];
//     $imagePath = $row['image_url'];
//     $investorArrivals .= "<tr><td><img src='$imagePath' alt='$investorName'></td><td>$investorName</td></tr>";
// }
$startupArrivals = "";
while ($row = mysqli_fetch_assoc($result)) {
    $startupName = $row['startup_name']; // Use the correct column name 'startup_name'
    $imagePath = $row['image_url']; // Use the correct column name 'image_url'
    $stallNo = $row['stall_no'];
    $contact = $row['contact'];
    $issue = $row['issue'];
    // $description = $row['description'];

    // You can add these values to your table row as needed
    $startupArrivals .= "<tr><td><img src='$imagePath' alt='$startupName'></td><td>$startupName</td><td>$stallNo</td><td>$contact</td><td>$issue</td></tr>";
}

// Close the database connection
mysqli_close($conn);

// Send the table of investor names and images as the response
echo $startupArrivals;
?>