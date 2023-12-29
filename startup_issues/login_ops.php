<?php
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Database connection parameters
    $host = "localhost";
    $dbUsername = "u331863597_biec";
    $dbPassword = "psf@BIEC69";
    $dbName = "u331863597_event"; // Replace with your database name

    // Create a database connection
    $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);

    // Check if the connection was successful

    // Check if the connection was successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Query to check user credentials
    $query = "SELECT id, username, password FROM ops_users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $storedPassword = $row['password'];

        // Verify the password (without hashing)
        if ($password === $storedPassword) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
                        header("Location: https://punestartupfest.in/startup_issues/ops-main.html");

            // header("Location: welcome.php"); // Redirect to a welcome page on successful login
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "User not found.";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
