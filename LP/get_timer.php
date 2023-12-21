<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if (isset($_SESSION['timer'])) {
    echo $_SESSION['timer'];
} else {
    echo 'Timer not started';
}
?>
