<?php
include 'php/super_admin_auth.php';

if (isset($_POST['approv_sal'])) {
    // Get the sanitized values from the form
    $status = mysqli_real_escape_string($conn, $_POST['opt']);
    $salaryID = mysqli_real_escape_string($conn, $_POST['id']);
    $sno = mysqli_real_escape_string($conn, $_POST['sno']);

    // Prepare and execute the update query
    $stmt = $conn->prepare("UPDATE emp_salery SET status = ? WHERE Sno = ?");
    $stmt->bind_param("si", $status,$sno);

    if ($stmt->execute()) {
        $aprove = "Salary request status updated successfully.";
        header("Location: ../pro/super_admin.php?status=" . urlencode($aprove));
        exit();
    } else {
        $error = "Somthing Went Wrong";
        header("Location: ../pro/super_admin.php?error=" . urlencode($error));
        exit();
    }
} else {
    $error = "Somthing Went Wrong! Try again...";
    header("Location: ../pro/super_admin.php?error=" . urlencode($error));
    exit();
}
