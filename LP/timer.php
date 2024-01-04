<?php
// Assuming you have a database connection here

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the end time from the request
    $endTime = isset($_POST['endTime']) ? intval($_POST['endTime']) : 0;

    // Update the database with the end time
    // Replace the following lines with your database update logic
$conn = mysqli_connect('localhost', 'u331863597_biec', 'psf@BIEC69');
mysqli_select_db($conn, 'u331863597_event');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE timer_table SET remaining_time = $endTime"; // Modify this query based on your table structure

    if ($conn->query($sql) === TRUE) {
        echo "Timer updated successfully.";
    } else {
        echo "Error updating timer: " . $conn->error;
    }

    $conn->close();
}
?>
