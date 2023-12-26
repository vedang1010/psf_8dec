<?php
// Database connection parameters
$conn = mysqli_connect('localhost', 'u331863597_psf', 'psf@BIEC69');
mysqli_select_db($conn, 'u331863597_feedback');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve values from the AJAX request
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // $selectedOption = isset($_POST['correctAnswer']) ? $_POST['correctAnswer'] : null;
    // $username = isset($_POST['username']) ? urldecode($_POST['username']) : null;
    $buttonNo = isset($_POST['optionNumber']) ? $_POST['optionNumber'] : null;

    if ($buttonNo !== null) {
        // Check if the username already exists in the database
        // $checkQuery = "SELECT pitch$buttonNo FROM LP_audience_database";
        // $checkResult = mysqli_query($conn, $checkQuery);

        // if ($checkResult) {
            // $row = mysqli_fetch_assoc($checkResult);
            // $currentPitchValue = $row["pitch$buttonNo"];

            // if ($currentPitchValue != 0) {
            //     echo json_encode(['status' => 'error', 'message' => 'You have already voted.']);
            //     // If the pitch$buttonNo value is not 0, the user has already voted
            // } else {
                // If the pitch$buttonNo value is 0, proceed with the vote
                 $updateQuery = "UPDATE activate_buttons SET active = 0";
            $updateQuery2 = "UPDATE activate_buttons SET active = 1 WHERE id = '$buttonNo'";

                if (mysqli_query($conn, $updateQuery) && mysqli_query($conn, $updateQuery2)) {
                    // Successful database update
                    $resultMessage = "Deactivated all buttons and Activated button no $buttonNo";
                    echo json_encode(['status' => 'success', 'message' => $resultMessage]);
                    // You can remove the alert, as it won't work in an AJAX context
                } else {
                    // Handle database update failure
                    echo json_encode(['status' => 'error', 'message' => 'Error updating data in the database']);
                }
                

                // if (mysqli_query($conn, $updateQuery)) {
                //     // Successful database update
                //     $resultMessage = "Activated button no $buttonNo";
                //     echo json_encode(['status' => 'success', 'message' => $resultMessage]);
                //     // You can remove the alert, as it won't work in an AJAX context
                // } else {
                //     // Handle database update failure
                //     echo json_encode(['status' => 'error', 'message' => 'Error updating data in the database']);
                // }
            // }
        // } else {
        //     // Handle database query failure
        //     echo json_encode(['status' => 'error', 'message' => 'Error querying the database']);
        // }
    } else {
        // Handle the case where either $selectedOption or $username is not set
        echo json_encode(['status' => 'error', 'message' => 'Invalid data received']);
    }
} else {
    // Handle cases where the request method is not POST
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}

// Close the database connection
$conn->close();
?>
