<?php
session_start();
if (($_SESSION['global_user'] == 'true')) {
    include 'php/db_connect.php';
    $conn = OpenCon();
    $username = $_SESSION['empid'];
    $cred = "select * from emp_register where Emp_id ='$username' ";
    $result = $conn->query($cred);
    if (!$result) {
        die("Some Error: " . mysqli_error($conn));
    } else {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            // Assigning the user data to Sessio
            $_SESSION['UserID'] = $row['Emp_id'];
            $_SESSION['UserName'] = $row['Emp_name'];
            $_SESSION['UserEmail'] = $row['Emp_mail'];
            $_SESSION['UserMob'] = $row['Emp_mobile_number'];
        } else {
            echo "No data found.";
        }
    }
} else {
    session_unset();
    session_destroy();
    header("location:index.php");
}