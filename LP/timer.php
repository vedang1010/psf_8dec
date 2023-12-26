<?php
$conn = mysqli_connect('localhost', 'u331863597_biec', 'psf@BIEC69');
mysqli_select_db($conn, 'u331863597_event');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Decrement the timer in the database
$sql = "UPDATE timer_table SET remaining_time = GREATEST(0, remaining_time - 1)"; // Assuming your timer data is in a table named 'timer_table' with 'remaining_time' column
$conn->query($sql);

$conn->close();
?>
