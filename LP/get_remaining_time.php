<?php
$conn = mysqli_connect('localhost', 'u331863597_biec', 'psf@BIEC69');
mysqli_select_db($conn, 'u331863597_event');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch remaining time from the database
$sql = "SELECT remaining_time FROM timer_table"; // Assuming your timer data is in a table named 'timer_table' with 'remaining_time' column
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo $row['remaining_time'];
} else {
    echo "0"; // Return 0 if no data found (or handle it as per your requirement)
}

$conn->close();
?>
