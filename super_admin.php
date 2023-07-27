<!DOCTYPE html>
<?php
include 'php/super_admin_auth.php';

$year = date('Y'); // Year
$month = date('m'); // Month
// Prepare the SQL statement to fetch details from a specific month
$sql1 = "SELECT * FROM emp_salery WHERE YEAR(currenttime) = ? AND MONTH(currenttime) = ? AND status = 'pending'";
$stmt1 = $conn->prepare($sql1);
$stmt1->bind_param("ii", $year, $month);
$stmt1->execute();
$result1 = $stmt1->get_result();
// if ($result1->num_rows > 0) {
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Super Admin Dashboard</title>
    <link rel="icon" type="image/x-icon" href="img/ssju-logo_adobe_express.svg">
    <link href="extra_matt/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/admin.min.css" rel="stylesheet">
    <link href="css/bootstrap/bootstrap.css" rel="stylesheet">
</head>

<body id="page-top">

    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input name="" type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-info" name="search" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form action="salery_append.php" method="post" class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input name="empId" type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-info" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">MR. Admin </span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                                <button type="button" class="btn btn-sm dropdown-item" data-toggle="modal" data-target="#changepass">
                                    Change Password
                                </button>
                            </div>
                        </li>
                    </ul>
                </nav>
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>
                    <div>
                        <p>
                            Welcome to the Dashboard! Here you can control transactions .
                        </p>
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
                        <div class="border border-info ">
                            <h5 class="d-flex justify-content-center">Total Employee's Salery pending --- <p class=" text-success font-weight-bold text-justify text-xxl-start">
                                    <?php
                                    $sql = "SELECT COUNT(status) AS total FROM emp_salery where status = 'pending' ";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    $num_rows = $row['total'];
                                    echo  $num_rows;
                                    ?>
                                </p>
                            </h5>
                        </div>
                        <?php
                        if (isset($_REQUEST['error'])) {
                            $err = $_REQUEST['error'];
                            echo "<div class='alert alert-danger d-flex justify-content-center' role='alert'>";
                            echo "<h4 class = 'alert-heading'> $err </h4> ";
                            echo  "</div>";
                        } elseif (isset($_REQUEST['status'])) {
                            echo "<div class='alert alert-success d-flex justify-content-center' role='alert'>";
                            $suces = $_REQUEST['status'];
                            echo "<h4 class = 'alert-heading'> $suces  </h4> ";
                            echo  "</div>";
                        }
                        ?>
                        <div class="border border-primary py-4 my-5">


                            <!-- Hello Main Body -->
                            <table id="dataTable" class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Emp ID</th>
                                        <th>Name</th>
                                        <th>Salery</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <?php
                                while ($row1 = mysqli_fetch_assoc($result1)) {
                                    $UserID = $row1['Emp_id'];
                                    $sno = $row1['Sno'];
                                    $UserName = $row1['Emp_name'];
                                    $sal = $row1['Total_sal'];
                                    $status = $row1['status'];
                                ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $UserID ?></td>
                                            <td><?php echo $UserName ?></td>
                                            <td><?php echo $sal ?></td>
                                            <td><?php if ($status == 'pending') {
                                                    echo "<button  class='btn btn-warning'>$status</button>";
                                                } elseif ($status == 'accept') {
                                                    echo "<button  class='btn btn-success'>$status</button>";
                                                } else {
                                                    echo "<button  class='btn btn-danger'>$status</button>";
                                                }  ?></td>
                                            <td>
                                                <form action="approve.php" method="post">
                                                    <select name="opt" class="form-select form-select-lg mb-3">hii
                                                        <option selected>...</option>
                                                        <option class=" text-success" value="approved"> Approve</option>
                                                        <option class=" text-danger" value="rejected"> Reject</option>
                                                    </select>
                                                    <input type="text" name="id" value=" <?php echo $UserID ?>" hidden>
                                                    <input type="text" name="sno" value=" <?php echo $sno ?>" hidden>
                                                    <input type="submit" name="approv_sal" value="Submit">
                                                </form>

                                            </td>
                                        </tr>
                                    </tbody>
                                <?php
                                }
                                ?>
                                <tfoot>
                                    <tr>
                                        <th>Emp ID</th>
                                        <th>Name</th>
                                        <th>Salery</th>
                                        <th>Status</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; <?php
                                                echo  date("Y");
                                                ?></span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
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