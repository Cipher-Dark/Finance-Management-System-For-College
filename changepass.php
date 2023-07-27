<?php
session_start();
include 'php/db_connect.php';
$conn = OpenCon();
if (isset($_POST["pass_submit"])) {
    $id = $_SESSION['empid'];
    $loca = strtoupper($id);

    if ($loca === "ADMIN") {
        $loc = 'admin.php';
    } elseif ($loca === "SUPERADMIN") {
        $loc = 'super_admin.php';
    } else {
        $loc = 'user.php';
    }

    $newpass = mysqli_real_escape_string($conn, $_POST['newpass']);
    $conpass = mysqli_real_escape_string($conn, $_POST['newcpass']);

    if (empty($newpass) && empty($conpass)) {
        $error = "New password is empty";
        header("Location: ../pro/$loc?errorp=" . urlencode($error));
        exit();
    } elseif ($newpass !== $conpass) {
        $error = "New password and confirm password do not match";
        header("Location: ../pro/$loc?errorp=" . urlencode($error));
        exit();
    } elseif (strlen($newpass) < 8) {
        $error = "New password must be at least 8 characters long";
        header("Location: ../pro/$loc?errorp=" . urlencode($error));
        exit();
    } else {
        $pass = mysqli_real_escape_string($conn, $_POST['Password']);

        // Retrieve the user's record from the database
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Verify the old password
            if (password_verify($pass, $row['password'])) {
                // Generate a new hashed password
                $enc_pass = password_hash($newpass, PASSWORD_DEFAULT);

                // Update the user's password in the database
                $stmt = $conn->prepare("UPDATE users SET `password` = ? WHERE username = ?");
                $stmt->bind_param("ss", $enc_pass, $id);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    // Password changed successfully
                    header("Location: ../pro/$loc?changesuccess");
                    exit();
                } else {
                    $error = "Password change failed. Please try again.";
                    header("Location: ../pro/$loc?errorp=" . urlencode($error));
                    exit();
                }
            } else {
                $error = "Old password is incorrect. Please check and try again.";
                header("Location: ../pro/$loc?errorp=" . urlencode($error));
                exit();
            }
        } else {
            $error = "No user data found.";
            header("Location: ../pro/$loc?errorp=" . urlencode($error));
            exit();
        }
    }
}
else{
    //nothing
}
