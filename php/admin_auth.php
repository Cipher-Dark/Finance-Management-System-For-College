<?php
session_start();
if (($_SESSION['global_admin'] == 'true')) {
    
    include 'db_connect.php';
    $conn = OpenCon();
} else {
    session_unset();
    session_destroy();
    header("Location:../index.php");
}
?>
