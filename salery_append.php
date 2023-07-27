<?php
include 'php/admin_auth.php';

if (isset($_POST['search'])) {
    $empId = $_POST['empId'];
    $name = $_POST['name'];
    $level = $_POST['level'];
    $sublevel = $_POST['sublevel'];

    // Sanitize and escape the input value
    $empId = mysqli_real_escape_string($conn, $empId);
    $name = mysqli_real_escape_string($conn, $name);
    $level = mysqli_real_escape_string($conn, $level);
    $sublevel = mysqli_real_escape_string($conn, $sublevel);
    // Query the database to select the corresponding Emp_id
    $stmt = $conn->prepare("SELECT Emp_id,Emp_name,city,Aadhar_no  FROM employee_details WHERE Emp_id = ? and Emp_name = ?");
    $stmt->bind_param("ss", $empId, $name);
    $stmt->execute();
    if (!$stmt) {
        $error = "Somthing Went Wrong";
        header("Location: ../pro/admin.php?error=" . urlencode($error));
        exit();
    } else {
        $result = $stmt->get_result(); // data from emp_details

        // $lvl =("SELECT *  FROM pay_matrix WHERE Level = '$sublevel'");
        // $lvl = $conn->query($lvl);

        $lvl = $conn->prepare("SELECT *  FROM pay_matrix WHERE Level = ?");

        $lvl->bind_param("i", $sublevel);
        $lvl->execute();
        if (!$lvl) {
            $error = "Somthing Went Wrong";
            header("Location: ../pro/admin.php?error=" . urlencode($error));
            exit();
        } else {
            $result2 = $lvl->get_result(); // data from paymatrix

            $stmt2 = $conn->prepare("SELECT * FROM default_value");
            $stmt2->execute();
            if (!$stmt2) {
                $error = "Somthing Went Wrong";
                header("Location: ../pro/admin.php?error=" . urlencode($error));
                exit();
            } else {
                $result3 = $stmt2->get_result(); // data from default value
                $stmt4 = $conn->prepare("SELECT * FROM allowance");
                $stmt4->execute();
                if (!$stmt4) {
                    $error = "Somthing Went Wrong";
                    header("Location: ../pro/admin.php?error=" . urlencode($error));
                    exit();
                } else {
                    $result4 = $stmt4->get_result(); // data from allowance

                    if ($result && $result->num_rows > 0) {

                        $rowlvl = $result2->fetch_assoc(); //data pay matrix

                        $row = $result->fetch_assoc(); //data of emp_details

                        $row2 = $result3->fetch_assoc(); //data of default value

                        $row3 = $result4->fetch_assoc(); //data of allowance city

                        // assigning the basic salery of the employee 
                        $_SESSION['level'] = $rowlvl[$level];

                        // assigning data from row
                        $_SESSION['name'] = $row['Emp_name'];
                        $_SESSION['id'] = $row['Emp_id'];
                        $_SESSION['aadhar'] = $row['Aadhar_no'];
                        $_SESSION['city'] = $row['city'];
                        $_SESSION['data'] = "Data Found";
                        $_SESSION['laukya'] = $level;
                        // assigning data from Default Value table
                        $_SESSION['da'] = $row2['DearnessAllowance'];
                        $_SESSION['hra'] = $row2['HouseRentAllowance'];
                        $_SESSION['gpf'] = $row2['gpf'];
                        $_SESSION['nps'] = $row2['nps'];
                        $_SESSION['giss'] = $row2['gis_savi'];
                        $_SESSION['gisi'] = $row2['gis_insc'];
                        $cityy = $row['city'];
                        if ($level >= 12) {
                            $_SESSION['sghs'] = 1000;
                        } else {
                            $_SESSION['sghs'] = 650;
                        }

                        // checking allowance city

                        $sql1 = "select * from allowance where border_allowance = '$cityy' ";
                        $sql_border = mysqli_query($conn, $sql1);
                        $sql2 = "select * from allowance WHERE hill_allowance = '$cityy'";
                        $sql_hill = mysqli_query($conn, $sql2);
                        if (!$sql_border) {
                            $_SESSION['ba'] = 'N/A';
                        } else {
                            $_SESSION['hill'] = 'N/A';
                            $_SESSION['ba'] = $row2['BoarderAreaAllowance'];
                        }
                        if (!$sql_hill) {
                            $_SESSION['hill'] = 'N/A';
                        } else {
                            $_SESSION['ba'] = 'N/A';
                            $_SESSION['hill'] = $row2['HillAllowamce'];
                        }
                        //  else {
                        // $error = $_SESSION['ba'];
                        // echo $_SESSION['hill'];
                        // header("Location: ../pro/admin.php?error=" . urlencode($error));
                        // exit();
                        // }
                        header("Location: ../pro/admin.php");
                    } else {
                        $error = "No Such Id or Name";
                        header("Location: ../pro/admin.php?error=" . urlencode($error));
                        exit();
                    }
                    $stmt->close();
                }
            }
        }
    }
} else {
    //nothing happen
}
if (isset($_POST['sal_submit'])) {
    $id = mysqli_real_escape_string($conn, $_POST['Id']);
    $name = mysqli_real_escape_string($conn, $_POST['empname']);
    $basic = mysqli_real_escape_string($conn, $_POST['basic']);
    $da =  mysqli_real_escape_string($conn, $_POST['da']);
    $hra = mysqli_real_escape_string($conn, $_POST['hra']);
    $hilla = mysqli_real_escape_string($conn, $_POST['ha']);
    $baa = mysqli_real_escape_string($conn, $_POST['bora']);
    $gpf = mysqli_real_escape_string($conn, $_POST['gpf']);
    $nps = mysqli_real_escape_string($conn, $_POST['nps']);
    $giss = mysqli_real_escape_string($conn, $_POST['gs']);
    $gisi = mysqli_real_escape_string($conn, $_POST['gi']);
    $sghs = mysqli_real_escape_string($conn, $_POST['sg']);
    $l = $_SESSION['laukya'];

    // checking whether salery request has send already or not

    $year = date('Y'); // Year
    $month = date('m'); // Month
    // Prepare the SQL statement to fetch details from a specific month
    $sql = "SELECT * FROM emp_salery WHERE Emp_id = ? AND Emp_name= ? AND YEAR(currenttime) = ? AND MONTH(currenttime) = ? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssii", $id, $name, $year, $month);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $error = "Data Already Exist";
        header("Location:../pro/admin.php?error=" . urlencode($error));
        exit();
    } else {
        // calculating the salary
        if (($hilla == 'N/A') &&  ($baa == 'N/A')) {
            $hilla = 0;
            $baa = 0;
        } elseif ($hilla == 'N/A') {
            $hilla = 0;
        } elseif ($baa == 'N/A') {
            $baa = 0;
        }
        echo $baa;
        $da = ($da * ($basic / 100));
        $gpf = (($basic + $da) * ($gpf / 100));
        $nps = (($basic + $da) * ($nps / 100));
        $total_sal = ($basic + $da + $hra + $hilla + $baa - $gpf - $nps - $gisi - $giss - $sghs);

        $stmtt = $conn->prepare("INSERT INTO emp_salery (Emp_id, Emp_name, level, Basic, DA, HRA, Hill_a, Borderaa, Gpf, Nps, gis_savings, gis_insc, sghs, Total_sal) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?, ?)");
        $stmtt->bind_param("ssidddddddiiid", $id, $name, $l, $basic, $da, $hra, $hilla, $baa, $gpf, $nps, $giss, $gisi, $sghs, $total_sal);

        if ($stmtt->execute()) {
            $success = "Salary has been assigned";
            $url = "../pro/admin.php?result=" . urlencode($success);
            header("Location: " . $url);
        } else {
            $error = "Fail ...";
            $url = "../pro/admin.php?error=" . urlencode($error);
            header("Location: " . $url);
        }
    }
} else {
    CloseCon($conn);
    $url = "../pro/admin.php";
    header("Location: " . $url);
}
