<?php
include 'db_connect.php';

$conn = OpenCon();

$id = mysqli_real_escape_string($conn, $_POST['Username']);
$password1 = mysqli_real_escape_string($conn, $_POST['Password']);
$id = strtoupper($id);


$cred = "select * from users where username = '$id' ";
$result = $conn->query($cred);

// Check if the query was successful and returned a row
if ($result && $result->num_rows > 0) {

	// Fetch the password
	$row = $result->fetch_assoc();

	// Verifing the passwor
	if (password_verify($password1, $row['password'])) {
		session_start();

		if ($id === "ADMIN") {
			$_SESSION["global_admin"] = "true";
			$_SESSION["empid"] = "$id";
			header("Location:../admin.php");
		}elseif($id === "SUPERADMIN"){
			$_SESSION["global_super_admin"] = "true";
			$_SESSION["empid"] = "$id";
			header("Location:../super_admin.php");
		} else {
			$_SESSION["global_user"] = "true";
			$_SESSION["empid"] = "$id";

			header("Location:../user.php");
		}
	} else {
		$error = "UserId or Password Wrong";
		header("Location:../index.php?error=" . urlencode($error));
		exit();
	}
} else {
	$error = "UserId or Password Wrong";
	header("Location:../index.php?error=" . urlencode($error));
	exit();
}
