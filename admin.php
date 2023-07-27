<!DOCTYPE html>
<?php
include 'php/admin_auth.php';

?>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="extra_matt/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/admin.min.css" rel="stylesheet">
    <link href="css/bootstrap/bootstrap.css" rel="stylesheet">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3"><?php echo $_SESSION['empid'] ?> </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="admin.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>

            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" name="table" href="tables.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>All Employees Details</span></a>


            </li>
            <!-- Nav Item - Pages Collapse Menu -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Saley Status and more</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>

                        <a class="collapse-item" href="index.php">Login</a>
                        <a class="collapse-item" href="salery_status.php">Emp Salery Status </a>
                        <button type="button" class="btn btn-sm collapse-item" data-toggle="modal" data-target="#changepass">
                            Change Password
                        </button>

                    </div>
                </div>
            </li>



            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">MR. Admin </span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <div class="dropdown-divider"> </div>
                                <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>

                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <?php
                    if (isset($_REQUEST["changesucess"])) {
                        $msg = "Password Changed Successfully";
                        echo "<div class='alert alert-success' role='alert'>";
                        echo "<p>$msg</p>";
                        echo "</div>";
                    } elseif (isset($_REQUEST['errorp'])) {
                        $error = $_REQUEST['errorp'];
                        echo "<div class='alert alert-danger' role='alert'>";
                        echo "<p>$error</p>";
                        echo "</div>";
                    }
                    ?>
                    <div>
                        <!-- <input type="text" id =editt disabled > -->
                        <p>
                            Welcome to the Dashboard! Here you can manage your account and view all information about your transactions.
                        </p>

                        <div class="border border-primary ">
                            <h5 class="d-flex justify-content-center">Total Employees --- <p class=" text-success font-weight-bold text-justify text-xxl-start">
                                    <?php
                                    $sql = "SELECT COUNT(Emp_sno) AS total FROM employee_details";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    // Get the count value
                                    $num_rows = $row['total'];

                                    echo  $num_rows;
                                    ?>
                                </p>
                            </h5>

                        </div>
                        <div class="border border-primary py-4 my-5">
                            <form class="pb-md-5" action="salery_append.php" method="post">
                                <div class="row gx-3 mb-3">

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputaadhar">Employee ID</label>
                                        <input type="text" class="form-control " name="empId" placeholder="Enter Emp_id" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLocation">Employee Name</label>
                                        <input class="form-control " name="name" id="inputLocation" type="text" placeholder="Enter name" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLocation">Enter Employee level</label>
                                        <select class="form-select form-control " name="level">
                                            <option selected>Select Level</option>
                                            <?php
                                            for ($i = 1; $i <= 17; $i++) {
                                                echo '<option value="' . $i . '">' . $i . '</option>';
                                            }
                                            ?>

                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLocation">Enter sub level</label>
                                        <select class="form-select form-control " name="sublevel">
                                            <option selected>Select sub Level</option>
                                            <?php
                                            for ($i = 1; $i <= 40; $i++) {
                                                echo '<option value="' . $i . '">' . $i . '</option>';
                                            }
                                            ?>

                                        </select>
                                    </div>
                                </div>
                                <input class="form-control " type="submit" name="search">
                            </form>

                            <?php
                            if (isset($_REQUEST['error'])) {
                                $err = $_REQUEST['error'];
                                echo "<div class='alert alert-danger d-flex justify-content-center' role='alert'>";
                                echo "<h4 class = 'alert-heading'> $err </h4> ";
                                echo  "</div>";
                            } elseif (isset($_REQUEST['result'])) {
                                echo "<div class='alert alert-success d-flex justify-content-center' role='alert'>";
                                $suces = $_REQUEST['result'];
                                echo "<h4 class = 'alert-heading'> $suces  </h4> ";
                                echo  "</div>";
                            } elseif (isset($_SESSION['data'])) {
                                $id = $_SESSION['id'];
                                $name = $_SESSION['name'];
                                $da = $_SESSION['da'];
                                $hra = $_SESSION['hra'];
                                $ha = $_SESSION['hill'];
                                $bora = $_SESSION['ba'];
                                $gpf = $_SESSION['gpf'];
                                $nps = $_SESSION['nps'];
                                $basic = $_SESSION['level'];
                                $aadhar = $_SESSION['aadhar'];
                                $giss = $_SESSION['giss'];
                                $gisi = $_SESSION['gisi'];
                                $sghs = $_SESSION['sghs'];

                                echo "<form method='POST' action='salery_append.php'>";
                                echo "<div class='row gx-3 mb-3'>";
                                echo "<div class='form-group col-md-6'>";
                                echo "<label for='empId'>Employee ID :</label>";
                                echo "<input type='text' class='form-control editt' name='Id' value='$id' disabled>";
                                echo "</div>";
                                echo "<div class='form-group col-md-6'>";
                                echo "<label for='empname'>Employee Name :</label>";
                                echo "<input type='text' class='form-control editt' name='empname' value='$name' disabled>";
                                echo "</div>";
                                echo "<div class='form-group col-md-6'>";
                                echo "<label for='empname'>Employee Aadhar No :</label>";
                                echo "<input type='text' class='form-control editt' name='aadhar' value='$aadhar' disabled>";
                                echo "</div>";


                                echo "<div class='form-group col-md-6'>";
                                echo "<label for='sal'>Salary:</label>";
                                echo "<input type='text' class='form-control editt' name='basic' id='sal' value='$basic' disabled >";
                                echo "</div>";
                                echo "<div class='form-group col-md-6'>";
                                echo "<label for='empname'>Dearness Allowance:</label>";
                                echo "<input type='text' class='form-control editt' name='da' value='$da' disabled>";
                                echo "</div>";
                                echo "<div class='form-group col-md-6'>";
                                echo "<label for='empname'>House Rent Allowance:</label>";
                                echo "<input type='text' class='form-control editt' name='hra' value='$hra' disabled>";
                                echo "</div>";
                                echo "<div class='form-group col-md-6'>";
                                echo "<label for='empname'>Hill Allowance:</label>";
                                echo "<input type='text' class='form-control editt' name='ha' value='$ha' disabled>";
                                echo "</div>";
                                echo "<div class='form-group col-md-6'>";
                                echo "<label for='empname'>Boarder Area Allowance:</label>";
                                echo "<input type='text' class='form-control editt' name='bora' value='$bora' disabled>";
                                echo "</div>";
                                echo "<div class='form-group col-md-6'>";
                                echo "<label for='empname'>GIS savings:</label>";
                                echo "<input type='text' class='form-control editt' name='gs' value='$giss' disabled>";
                                echo "</div>";
                                echo "<div class='form-group col-md-6'>";
                                echo "<label for='empname'>GIS Insurance:</label>";
                                echo "<input type='text' class='form-control editt' name='gi' value='$gisi' disabled>";
                                echo "</div>";
                                echo "<div class='form-group col-md-6'>";
                                echo "<label for='empname'>NPS emp % :</label>";
                                echo "<input type='text' class='form-control editt' name='gpf' value='$gpf' disabled>";
                                echo "</div>";
                                echo "<div class='form-group col-md-6'>";
                                echo "<label for='empname'>NPS Employer %:</label>";
                                echo "<input type='text' class='form-control editt' name='nps' value='$nps' disabled>";
                                echo "</div>";
                                echo "<div class='form-group col-md-6'>";
                                echo "<label for='empname'>SGHS:</label>";
                                echo "<input type='text' class='form-control editt' name='sg' value='$sghs' disabled>";
                                echo "</div>";
                                echo "</div>";
                                echo "<button type='submit' id='editButton' class='btn btn-primary  col-md-6' name='sal_submit'>Submit</button>";
                                echo "</div>";
                                echo "</form>";
                            }
                            ?>

                        </div>

                    </div>

                </div>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; <?php
                                                echo  date("Y");
                                                ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="php/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Change Password Model -->
    <div class="modal fade" id="changepass" tabindex="-1" role="dialog" aria-labelledby="changepass" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="changepass.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="changepass">Change Password </h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="row gx-5 mb-4">

                            <div class=" mb-5">
                                <label class="small mb-1" for="input1">Enter Current Password </label>
                                <input class="form-control" id="input1" name="Password" type="password" placeholder="Current Password :" />
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="input1">New Password <sub>(atleast 8 characters )</label>
                                <input class="form-control" id="input1" name="newpass" type="password" placeholder="New Password :" />
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="input2">Confirm Password </label>
                                <input class="form-control" id="input2" name="newcpass" type="password" placeholder="Confirm New Password :" />
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="pass_submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Change passwerd model end -->



    <script src="extra_matt/jquery/jquery.min.js"></script>
    <script src="extra_matt/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="extra_matt/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/admin.min.js"></script>

    <!-- Page level plugins -->
    <script src="extra_matt/datatables/jquery.dataTables.min.js"></script>
    <script src="extra_matt/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/enable_edit.js"></script>
</body>

</html>
<!DOCTYPE html>