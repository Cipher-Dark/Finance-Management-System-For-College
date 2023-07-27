<?php 

session_start();
unset($_SESSION['global']);
session_unset();
session_destroy();
header("Location:../index.php");

?>