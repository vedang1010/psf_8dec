<?php
// Database connection parameters
$conn = mysqli_connect('localhost', 'u331863597_biec', 'psf@BIEC69');
mysqli_select_db($conn, 'u331863597_event');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve values from the AJAX request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedOption = isset($_POST['option']) ? $_POST['option'] : null;
    $username = isset($_POST['username']) ? urldecode($_POST['username']) : null;
    $buttonNo = isset($_POST['buttonNo']) ? $_POST['buttonNo'] : null;
    $rate = isset($_POST['rate']) ? $_POST['rate'] : null;

    if ($selectedOption !== null && $username !== null && $rate !== null) {
        // Check if the username already exists in the database
        $checkQuery = "SELECT pitch$buttonNo FROM LP_audience_database WHERE username = '$username'";
        $checkResult = mysqli_query($conn, $checkQuery);

        if ($checkResult) {
            $row = mysqli_fetch_assoc($checkResult);
            $currentPitchValue = $row["pitch$buttonNo"];

            if ($currentPitchValue != 0) {
                echo json_encode(['status' => 'error', 'message' => 'You have already voted.']);
                // If the pitch$buttonNo value is not 0, the user has already voted
            } else {
                // If the pitch$buttonNo value is 0, proceed with the vote
                $updateQuery = "UPDATE LP_audience_database SET pitch$buttonNo = '$selectedOption', rating$buttonNo = '$rate' WHERE username = '$username'";

                if (mysqli_query($conn, $updateQuery)) {
                    // Successful database update
                    $resultMessage = "Vote updated: Option $selectedOption, Rating: $rate, Username: $username";
                    echo json_encode(['status' => 'success', 'message' => $resultMessage]);
                    // You can remove the alert, as it won't work in an AJAX context
                } else {
                    // Handle database update failure
                    echo json_encode(['status' => 'error', 'message' => 'Error updating data in the database']);
                }
            }
        } else {
            // Handle database query failure
            echo json_encode(['status' => 'error', 'message' => 'Error querying the database']);
        }
    } else {
        // Handle the case where either $selectedOption, $username, or $rate is not set
        echo json_encode(['status' => 'error', 'message' => 'Invalid data received']);
    }
} else {
    // Handle cases where the request method is not POST
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}

// Close the database connection
$conn->close();
?>
