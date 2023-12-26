<?php
// Start the session to access the stored username
session_start();

// Check if the username is set in the session
if (isset($_SESSION['username'])) {
    // Retrieve the username from the session
    $username = $_SESSION['username'];
} else {
    // If the username is not set, you might want to handle it or redirect to the login page
    $errorMsg = "Username not found";
    // Redirect to the login page
    header("Location: index.html");
    exit();
}

// Check if the buttonValue is set in the POST data
if (isset($_POST['buttonValue'])) {
    // Retrieve the buttonValue from the POST data
    $buttonValue = $_POST['buttonValue'];

    // Store the buttonValue in the session
    $_SESSION['buttonNo'] = $buttonValue;

    // Redirect to the second PHP file
    header("Location: poll.php");
    exit();
} else {
    // Handle the case where buttonValue is not provided in the POST data
    echo "Error: Button value not provided.";
    // You might want to add additional error handling or redirect the user
    exit();
}
?>
