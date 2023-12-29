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

// Build a div for each investor with their name and image
    $investorCards = "";

while ($row = mysqli_fetch_assoc($result)) {
    $investorName = $row['name'];
    $imagePath = $row['image_url'];
    $investorCards .= "<div class='card'>
            <div class='img'><img src='$imagePath' alt='$investorName' height='40px' width='40px'></div>
            <div class='textBox'>$investorName</div>
          </div>";
    // echo "<div class='card'>
    //         <div class='img'><img src='$imagePath' alt='$investorName' height='40px' width='40px'></div>
    //         <div class='textBox'>$investorName</div>
    //       </div>";
}

// Close the database connection
mysqli_close($conn);
    echo $investorCards;

?>


