<!DOCTYPE html>
<?php
include 'php/user_auth.php';
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="extra_matt/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/admin.min.css" rel="stylesheet">
    <link href="css/bootstrap/bootstrap.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="user.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3"> <?php echo $_SESSION['UserID'] ?></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="user.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span> Dashboard </span></a>
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

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" name="table" href="user_profile.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Complete profile </span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>More...</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <button type="button" class="btn btn-sm collapse-item" data-toggle="modal" data-target="#changemail">
                            Change Password
                        </button>
                        <button type="button" class="btn btn-sm collapse-item" data-toggle="modal" data-target="#changemail">
                            Change Email or Mobile No
                        </button>
                    </div>
                </div>
            </li>


            <!-- Nav Item - Tables -->

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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['UserName']; ?></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="user_profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
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
                        <a  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#generatereport"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
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
                    }elseif (isset($_REQUEST['error'])) {
                        $error = $_REQUEST['error'];
                        echo "<div class='alert alert-danger' role='alert'>";
                        echo "<p>$error</p>";
                        echo "</div>";
                    }
                    ?>
                    <div class="border border-primary py-4 my-5">
                        <p>
                            <a class="btn btn-primary" data-toggle="collapse" href="#collapse" role="button" aria-expanded="false" aria-controls="collapse">
                                Show Salery Slip by month
                            </a>
                        </p>
                        <?php
                        $month = date('m');
                        $idd = $_SESSION['UserID'];
                        // Query To get Details
                        $stmt2 = $conn->prepare("SELECT * FROM emp_salery WHERE Emp_id = ? and MONTH(currenttime) = ? and status = 'approved' ");
                        $stmt2->bind_param('si', $idd, $month);
                        $stmt2->execute();
                        // Now assigning the resukt
                        $result2 = $stmt2->get_result();
                        // Now accessing the array and saving to a variable
                        if (mysqli_num_rows($result2) > 0) {
                            $row = $result2->fetch_assoc();
                            $found = 'true';
                            $id = $row['Emp_id'];
                            $name = $row['Emp_name'];
                            $basic = $row['Basic'];
                            $da = $row['DA'];
                            $hra = $row['HRA'];
                            $hilla = $row['Hill_a'];
                            $bora = $row['Borderaa'];
                            $gpf = $row['Gpf'];
                            $nps = $row['Nps'];
                            $giss = $row['gis_savings'];
                            $gisi = $row['gis_insc'];
                            $sghs = $row['sghs'];
                            $total = $row['Total_sal'];
                        } else {
                            $found = 'false';
                            $id = $_SESSION['UserID'];
                            $name = $_SESSION['UserName'];
                            $basic1 = '';
                            $da1 = '';
                            $hra1 = '';
                            $hilla1 = '';
                            $bora1 = '';
                            $gpf1 = '';
                            $nps1 = '';
                            $giss = '';
                            $gisi = '';
                            $sghs = '';
                            $total1 = '';
                        }
                        ?>
                        <div class="collapse" id="collapse">
                            <div class="card card-body">

                                <div class="card card-body">
                                    <!-- Top Line -->
                                    <div class="d-flex justify-content-center border border-dark ">
                                        <h5><strong> L.S.M. Govt. PG College, Pithoragarh </strong></h5>
                                    </div>
                                    <div class="d-flex justify-content-center border border-dark mt-1">
                                        <h5><strong> Salery Slip for month <?php echo $month; ?> </strong></h5>
                                    </div>
                                    <!--  Seconf=d Line -->
                                    <div class="border border-dark my-1">
                                        <div class="row">
                                            <div class="col-sm-3  font-weight-bold">
                                                <p class="mb-0">Full Name</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p> <?php echo $name; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3  font-weight-bold">
                                                <p class="mb-0">Employee Id </p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p> <?php echo $id; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  Table of Salery  Start  -->
                                    <div class="border border-dark my-1">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <table class="table">
                                                        <!-- First table content goes here -->
                                                        <table class="table table-bordered" style="float: left;">
                                                            <thead>
                                                                <th colspan="3">
                                                                    
                                                                </th>
                                                                <tr>
                                                                    <th scope="col">S.No</th>
                                                                    <th scope="col">Salery Head</th>
                                                                    <th scope="col">Amount</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th scope="row">1</th>
                                                                    <td>Basic</td>
                                                                    <td><?php
                                                                        if ($found == 'true') {
                                                                            echo $basic;
                                                                        } else {
                                                                            echo $basic1;
                                                                        }
                                                                        ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">2</th>
                                                                    <td>Dearness Allowance</td>
                                                                    <td><?php
                                                                        if ($found == 'true') {
                                                                            echo $da;
                                                                        } else {
                                                                            echo $da1;
                                                                        }
                                                                        ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">3</th>
                                                                    <td>House Rent Allowance</td>
                                                                    <td><?php
                                                                        if ($found == 'true') {
                                                                            echo $hra;
                                                                        } else {
                                                                            echo $hra1;
                                                                        }
                                                                        ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">4</th>
                                                                    <td>Hill Allowamce</td>
                                                                    <td><?php
                                                                        if ($found == 'true') {
                                                                            echo $hilla;
                                                                        } else {
                                                                            echo $hilla1;
                                                                        }
                                                                        ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">5</th>
                                                                    <td>Boarder Area Allowance</td>
                                                                    <td><?php
                                                                        if ($found == 'true') {
                                                                            echo $bora;
                                                                        } else {
                                                                            echo $bora1;
                                                                        }
                                                                        ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </table>
                                                </div>
                                                <div class="col-md-6">
                                                    <table class="table">
                                                        <!-- Second table content goes here -->
                                                        <table class="table table-bordered" style="float: left;">
                                                            <thead>
                                                                <th colspan="3">
                                                                    <p class=" d-flex justify-content-center">Deduction</p>
                                                                </th>
                                                                <tr>
                                                                    <th scope="col">S.No</th>
                                                                    <th scope="col">Salery Head</th>
                                                                    <th scope="col">Amount</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th scope="row">1</th>
                                                                    <td>GPF</td>
                                                                    <td><?php
                                                                        if ($found == 'true') {
                                                                            echo $gpf;
                                                                        } else {
                                                                            echo $gpf1;
                                                                        }
                                                                        ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">2</th>
                                                                    <td>NPS</td>
                                                                    <td><?php
                                                                        if ($found == 'true') {
                                                                            echo $nps;
                                                                        } else {
                                                                            echo $nps1;
                                                                        }
                                                                        ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">2</th>
                                                                    <td>GIS Savings</td>
                                                                    <td><?php
                                                                        if ($found == 'true') {
                                                                            echo $giss;
                                                                        } else {
                                                                            echo $giss;
                                                                        }
                                                                        ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">2</th>
                                                                    <td>GIS Insurance</td>
                                                                    <td><?php
                                                                        if ($found == 'true') {
                                                                            echo $gisi;
                                                                        } else {
                                                                            echo $gisi;
                                                                        }
                                                                        ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">2</th>
                                                                    <td>SGHS</td>
                                                                    <td><?php
                                                                        if ($found == 'true') {
                                                                            echo $sghs;
                                                                        } else {
                                                                            echo $sghs;
                                                                        }
                                                                        ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <table class="table">
                                                        <!-- First table content goes here -->
                                                        <?php if ($found == 'true') {
                                                            $gross = ($basic + $da + $hra + $hilla + $bora);
                                                        } ?>

                                                        <table class="table table-bordered">
                                                            <tr>
                                                                <td>Gross Salery</td>
                                                                <td><?php
                                                                    if ($found == 'true') {
                                                                        echo $gross;
                                                                    }
                                                                    ?></td>
                                                            </tr>
                                                        </table>
                                                        <table class="table table-bordered">
                                                            <tr>
                                                                <td>Net Salery</td>
                                                                <td><?php
                                                                    if ($found == 'true') {
                                                                        echo $total;
                                                                    }
                                                                    ?></td>
                                                            </tr>
                                                        </table>
                                                    </table>
                                                </div>
                                                <div class="col-md-6">
                                                    <table class="table">
                                                        <!-- Second table content goes here -->
                                                        <?php if ($found == 'true') {
                                                            $deduct = ($gpf + $nps+$gisi+$giss+$sghs);
                                                        } ?>
                                                        <table class="table table-bordered">
                                                            <tr>
                                                                <td>Total Deduction </td>
                                                                <td><?php
                                                                    if ($found == 'true') {
                                                                        echo $deduct;
                                                                    }
                                                                    ?></td>
                                                            </tr>
                                                        </table>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
    <!-- Change mail Model -->
    <div class="modal fade" id="changemail" tabindex="-1" role="dialog" aria-labelledby="changemail" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="#" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="changemail">Change Mail or Mobile no  </h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="row gx-5 mb-4">

                            <div class="col-md-6">
                                <label class="small mb-1" for="input1">New mail</label>
                                <input class="form-control" id="input1" name="newmail" type="password" placeholder="New Password :" />
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="input2">Confirm mail </label>
                                <input class="form-control" id="input2" name="newcmail" type="password" placeholder="Confirm New Password :" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="mail_submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Change passwerd model end -->


    <!-- Report Generate Model -->
    <div class="modal fade" id="generatereport" tabindex="-1" role="dialog" aria-labelledby="generatereport" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="generate_report.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="changemail">Download Salery Slip   </h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="row gx-5 mb-4">
                            <div class="col-md-6">
                                <label class="small mb-1" for="input11">Select Month</label>
                                <input class="form-control" id="input11" name="month" type="month" placeholder="New Password :" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="generate_report" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--  Report Generate Modell end -->

</body>
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

</html>