<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['username'])) {
    echo '<script>window.location.href = "login.php";</script>';
    exit();
}

// Unset the session variable
unset($_SESSION['username']);

// Redirect to login.php using JavaScript
echo '<script>window.location.href = "login.php";</script>';
exit();
?>
