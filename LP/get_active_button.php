<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection parameters
$host = "localhost"; // Hostname (e.g., "localhost")
$username = "u331863597_psf"; // Database username
$password = "psf@BIEC69"; // Database password
$database = "u331863597_feedback"; // Database name

// Create a database connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch the first id of an investor who has arrived from the database
$query = "SELECT id FROM activate_buttons WHERE active = 1 LIMIT 1";
$result = mysqli_query($conn, $query);

// Check if the query was successful
if ($result) {
    // Fetch the first row
    $row = mysqli_fetch_assoc($result);

    // Get the id (if available)
    $firstId = $row ? $row['id'] : null;

    // Close the database connection
    mysqli_close($conn);

    // Echo the id
    echo $firstId;
} else {
    // Handle the case where the query failed
    echo "Query failed: " . mysqli_error($conn);
}
?>
