<?php
$conn = mysqli_connect('localhost', 'u331863597_biec', 'psf@BIEC69');
mysqli_select_db($conn, 'u331863597_event');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$contact = mysqli_real_escape_string($conn, $_POST['contact']);

// Check if the username already exists
$checkUsernameQuery = "SELECT username FROM LP_audience_database WHERE username = '$username'";
$checkUsernameResult = mysqli_query($conn, $checkUsernameQuery);

if (mysqli_num_rows($checkUsernameResult) > 0) {
    // Username already exists, handle accordingly
    echo '<script type="text/javascript">alert("Username already exists. Please choose a different username.");</script>';
    echo '<script type="text/javascript">window.location.href = "index.html";</script>';
    exit();
}

// If username is unique, proceed with the registration
$sql = "INSERT INTO LP_audience_database (fullname, username, contact, password, email) 
        VALUES ('$fullname', '$username', '$contact', '$password', '$email')";

if (mysqli_query($conn, $sql)) {
    echo '<script type="text/javascript">alert("Registration successful.");</script>';
     session_start();
        $_SESSION['username'] = $username;

        // Redirect to buttons.html
        header("Location: buttons.php");
        exit();
    // echo '<script type="text/javascript">window.location.href = "buttons.php";</script>';
} else {
    $errorMsg = "Registration Failed: " . mysqli_error($conn);
    echo '<script type="text/javascript">alert("' . $errorMsg . '");</script>';
    echo '<script type="text/javascript">window.location.href = "index.html";</script>';
}

mysqli_close($conn);
?>
