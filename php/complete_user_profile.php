<!DOCTYPE html>
<?php
include 'admin_auth.php';

if (isset($_POST["submit"])) {

    $id = $_SESSION['UserID'];
    $name = mysqli_real_escape_string($conn, $_REQUEST['name']);
    $dob = mysqli_real_escape_string($conn, $_REQUEST['dob']);
    $gender = mysqli_real_escape_string($conn, $_REQUEST['gender']);
    $aadhar = mysqli_real_escape_string($conn, $_REQUEST['aadhar']);
    $pan = mysqli_real_escape_string($conn, $_REQUEST['pan']);
    $street = mysqli_real_escape_string($conn, $_REQUEST['address']);
    $city = mysqli_real_escape_string($conn, $_REQUEST['city']);
    $city = strtoupper($city);
    $state = mysqli_real_escape_string($conn, $_REQUEST['state']);
    $district = mysqli_real_escape_string($conn, $_REQUEST['district']);
    $pincode = mysqli_real_escape_string($conn, $_REQUEST['pincode']);
    $emptype = mysqli_real_escape_string($conn, $_REQUEST['emp_type']);
    $department = mysqli_real_escape_string($conn, $_REQUEST['department']);

    if (empty($name)) {
        $error = "Fill all Details";
        header("Location:../view_employee.php?error=" . urlencode($error) . "&emp_id=" . urlencode($id));
        exit();
    } else if (empty($dob)) {
        $error = "Fill all Details";
        header("Location:../view_employee.php?error=" . urlencode($error) . "&emp_id=" . urlencode($id));
        exit();
    } else if (empty($gender)) {
        $error = "Fill all Details";
        header("Location:../view_employee.php?error=" . urlencode($error) . "&emp_id=" . urlencode($id));
        exit();
    } else if (empty($aadhar)) {
        $error = "Fill all Details";
        header("Location:../view_employee.php?error=" . urlencode($error) . "&emp_id=" . urlencode($id));
        exit();
    } else if (empty($pan)) {
        $error = "Fill all Details";
        header("Location:../view_employee.php?error=" . urlencode($error) . "&emp_id=" . urlencode($id));
        exit();
    } else if (empty($city)) {
        $error = "Fill all Details";
        header("Location:../view_employee.php?error=" . urlencode($error) . "&emp_id=" . urlencode($id));
        exit();
    } else if (empty($pincode)) {
        $error = "Fill all Details";
        header("Location:../view_employee.php?error=" . urlencode($error) . "&emp_id=" . urlencode($id));
        exit();
    } else {
        $query = "INSERT INTO employee_details (Emp_id, Emp_name, Emp_DOB, gender, Aadhar_no, `pan/pran`, street, city, state, district, `pin-code`, Emp_type, Emp_dept) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Prepare the statement
        $stmt = $conn->prepare($query);

        // Bind the parameters with the values
        $stmt->bind_param("ssssisssssiss", $id, $name, $dob, $gender, $aadhar, $pan, $street, $city, $state, $district, $pincode, $emptype, $department);

        // Execute the statement
        $stmt->execute();

        if (!$stmt) {
            $error = "Somthing Went Wrong! Try again...";
            header("Location:../view_employee.php?error=" . urlencode($error) . "&emp_id=" . urlencode($id));
            exit();
        } else {
            header("Location:../view_employee.php?emp_id=" . urlencode($id));
            exit();
        }
    }
} elseif (isset($_POST['update_submit'])) {
    $id = mysqli_real_escape_string($conn, $_REQUEST['userid']);
    $name = mysqli_real_escape_string($conn, $_REQUEST['name']);
    $dob = mysqli_real_escape_string($conn, $_REQUEST['dob']);
    $gender = mysqli_real_escape_string($conn, $_REQUEST['gender']);
    $aadhar = mysqli_real_escape_string($conn, $_REQUEST['aadhar']);
    $pan = mysqli_real_escape_string($conn, $_REQUEST['pan']);
    $street = mysqli_real_escape_string($conn, $_REQUEST['address']);
    $city = mysqli_real_escape_string($conn, $_REQUEST['city']);
    $city = strtoupper($city);
    $state = mysqli_real_escape_string($conn, $_REQUEST['state']);
    $district = mysqli_real_escape_string($conn, $_REQUEST['district']);
    $pincode = mysqli_real_escape_string($conn, $_REQUEST['pincode']);
    $emptype = mysqli_real_escape_string($conn, $_REQUEST['emp_type']);
    $department = mysqli_real_escape_string($conn, $_REQUEST['department']);

    $stmt = $conn->prepare("UPDATE employee_details SET Emp_id=?, Emp_name=?, Emp_DOB=?, gender=?, Aadhar_no=?, `pan/pran`=?, street=?, city=?, state=?, district=?, `pin-code`=?, Emp_type=?, Emp_dept=? WHERE Emp_id = $id");

    $stmt->bind_param("ssssisssssiss", $id, $name, $dob, $gender, $aadhar, $pan, $street, $city, $state, $district, $pincode, $emptype, $department);
    $stmt->execute();

    if (!$stmt) {
        $error = "Somthing Went Wrong! Try again...";
        header("Location:../view_employee.php?error=" . urlencode($error) . "&emp_id=" . urlencode($id));
        exit();
    } else {
        header("Location:../view_employee.php?emp_id=" . urlencode($id));
        exit();
    }
} else {
    //nothing Thanku
}
?>