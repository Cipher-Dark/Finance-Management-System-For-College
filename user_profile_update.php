<?php
include 'php/user_auth.php';


if (isset($_POST['profilesubmit'])) {
    $id = $_SESSION['empid'];
    $father = mysqli_real_escape_string($conn, $_POST['father']);
    $mother = mysqli_real_escape_string($conn, $_POST['mother']);
    $bank = mysqli_real_escape_string($conn, $_POST['b_name']);
    $account = mysqli_real_escape_string($conn, $_POST['account']);
    $ifsc = mysqli_real_escape_string($conn, $_POST['ifsc']);
    $branch = mysqli_real_escape_string($conn, $_POST['branch']);

    if (empty($father) && empty($mother)) {
        $error = "Father and mother are required";
        header("Location:../pro/user_profile.php?error=" . urlencode($error));
        exit();
    } else {
        $stmt = $conn->prepare("UPDATE employee_details SET `father/husband`=?, mother_name=?, B_name=?,accaount_no = ?, ifsc=?, branch=? WHERE Emp_id = ?");
        $stmt->bind_param("ssssssi", $father, $mother, $bank, $account, $ifsc, $branch, $id);
        $stmt->execute();

        if ($stmt->error) {
            $error = "Something went wrong! Try again...";
            header("Location:../pro/user_profile.php?error=" . urlencode($error) . "&emp_id=" . urlencode($id));
            exit();
        } else {
            header("Location:../pro/user_profile.php");
            exit();
        }
    }
}
else{
    echo "Nice Try !!!! ";
}
