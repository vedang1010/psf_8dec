<?php
// Create connection
$conn = mysqli_connect('localhost', 'u331863597_biec', 'psf@BIEC69');
mysqli_select_db($conn, 'u331863597_event');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Perform a SQL query to check user credentials
    $sql = "SELECT * FROM LP_audience_database WHERE username = '$username' AND password = '$password'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Successful login
        // Use session to store the username
        session_start();
        $_SESSION['username'] = $username;

        // Redirect to buttons.html
        header("Location: buttons.php");
        exit();
    } else {
        // Failed login
        // You can display an error message or redirect back to the login page
        // For example:
        $errorMsg = "Login Failed";

        // Display an alert and then redirect
        echo '<script type="text/javascript">alert("Invalid username or password. Please try again.");';
        echo 'window.location.href = "index.html";</script>';
        exit();
    }
}

mysqli_close($conn);
?>
