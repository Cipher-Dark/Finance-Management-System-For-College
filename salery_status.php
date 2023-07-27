<?php
include 'php/admin_auth.php';
$year = date('Y'); // Year
$month = date('m'); // Month
// Prepare the SQL statement to fetch details from a specific month
$sql = "SELECT * FROM emp_salery WHERE YEAR(currenttime) = ? AND MONTH(currenttime) = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $year, $month);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Salery Status </title>
        <link rel="icon" type="image/x-icon" href="img/ssju-logo_adobe_express.svg">
        <link href="extra_matt/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="css/admin.min.css" rel="stylesheet">
        <link href="css/bootstrap/bootstrap.css" rel="stylesheet">

        <link href="extra_matt/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    </head>

    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
            <div id="content-wrapper" class="d-flex flex-column">

                <div id="content">
                    <div class="container-fluid bg-muted">
                        <div class="container">
                            <div class="row">
                                <div class="col m-auto">
                                    <div class="card mt-5">
                                        <div class="table-responsive bg-white">
                                            <div class="container">
                                                <div class="ticker">

                                                    <div class="news bg-white">
                                                        <marquee class="news-content ">
                                                            <p class=" text-primary"> Salery slip Status Will Change
                                                                When Passed/Acceped Or Rejected </p>
                                                        </marquee>
                                                    </div>
                                                </div>
                                            </div>
                                            <table id="dataTable" class="table table-bordered" width="100%" cellspacing="0">
                                                <?php
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $UserID = $row['Emp_id'];
                                                    $UserName = $row['Emp_name'];
                                                    $sal = $row['Total_sal'];
                                                    $status = $row['status'];
                                                    $status1 = strtoupper($status);
                                                ?>
                                                    <thead>
                                                        <tr>
                                                            <th> Emp ID</th>
                                                            <th>Name</th>
                                                            <th>Salery</th>
                                                            <th>Status</th>
                                                            <th><?php if ($status == 'approved') {
                                                                    echo "Pay";
                                                                } ?>

                                                                </td>
                                                            </th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <?php echo $UserID ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $UserName ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $sal ?>
                                                            </td>

                                                            <td>
                                                                <?php if ($status == 'pending') {
                                                                    echo "<button  class='btn btn-warning'> $status1</button>";
                                                                } elseif ($status == 'approved') {
                                                                    echo "<button  class='btn btn-success'>$status1</button>";
                                                                } else {
                                                                    echo "<button  class='btn btn-danger'>$status1</button>";
                                                                }  ?>
                                                            </td>

                                                            <td>
                                                                <?php if ($status == 'approved') {
                                                                    echo " Now Pay The Salery";
                                                                } ?>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                <?php
                                                }
                                                ?>
                                                <tfoot>
                                                    <tr>
                                                        <th> Emp ID</th>
                                                        <th>Name</th>
                                                        <th>Salery</th>
                                                        <th>Status</th>
                                                        <th><?php if ($status == 'approved') {
                                                                echo "Pay";
                                                            } ?>

                                                            </td>
                                                        </th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                            <div class="d-flex justify-content-center  mb-4">
                                                <a href="admin.php" class="btn btn-secondary btn-sm  mx-3" role="button" aria-pressed="true">Home</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

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
                <div class="modal fade bg-muted" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
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
                <footer class="sticky-footer bg-muted">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy;
                                <?php
                                echo  date("Y");
                                ?>
                            </span>
                        </div>
                    </div>
                </footer>
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
<?php
} else {
    $error = "No Salary has been added for approval or No data found";
    header("Location: ../pro/admin.php?error=" . urlencode($error));
    exit();
}
?>