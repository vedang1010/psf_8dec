<?php
$conn = mysqli_connect('localhost', 'u331863597_psf', 'psf@BIEC69');
mysqli_select_db($conn, 'u331863597_feedback');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$subject = mysqli_real_escape_string($conn, $_POST['subject']);
$message = mysqli_real_escape_string($conn, $_POST['message']);


$sql = "INSERT INTO startup_feedback (name, email, feedback_type, feedback) VALUES ('$name', '$email', '$subject', '$message')";

if (mysqli_query($conn, $sql)) {
    echo '<script type="text/javascript">alert("Feedback submitted.");</script>';
        // Redirect to buttons.html
    header("Location: startup_feedback.html");
    exit();
    // echo '<script type="text/javascript">window.location.href = "buttons.php";</script>';
} else {
    $errorMsg = "Feedback not sent: " . mysqli_error($conn);
    echo '<script type="text/javascript">alert("' . $errorMsg . '");</script>';
    echo '<script type="text/javascript">window.location.href = "startup_feedback.html";</script>';
}

mysqli_close($conn);
?>
