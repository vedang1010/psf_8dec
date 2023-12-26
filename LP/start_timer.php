<?php
session_start();

// Set the initial timer value
$_SESSION['timer'] = 10; // Set the total time in seconds
echo $_SESSION['timer'];
?>
