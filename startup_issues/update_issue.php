<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the investor ID from the POST request
    $issueId = $_POST['issueId'];

    // Update the "has_arrived" status in the database
    $host = "localhost"; // Hostname (e.g., "localhost")
    $username = "u331863597_biec"; // Database username
    $password = "psf@BIEC69"; // Database password
    $database = "u331863597_event"; // Database name

    $conn = mysqli_connect($host, $username, $password, $database);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $query = "UPDATE startup_issues SET solved = 1 WHERE id = $issueId";

    if (mysqli_query($conn, $query)) {
        echo "Success";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

