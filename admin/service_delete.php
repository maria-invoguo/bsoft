<?php
session_start();
require_once 'db.php';
if (!isset($_SESSION['username'])) {
    echo "<script>window.location.href = 'login.php';</script>";
    exit();
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM Service WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    echo "<script>window.location.href = 'service_view.php';</script>";
    exit();
}
?>
