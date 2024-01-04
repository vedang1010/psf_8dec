<?php
$conn = mysqli_connect('localhost', 'u331863597_biec', 'psf@BIEC69');
mysqli_select_db($conn, 'u331863597_event');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch remaining time from the database
$sql = "SELECT remaining_time FROM timer_table"; // Modify this query based on your table structure
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $remainingTime = $row['remaining_time']; // Use the same name as in the JSON response
    echo json_encode(['end_time' => $remainingTime]);
} else {
    echo json_encode(['end_time' => 0]);
}

$conn->close();
?>
