<?php
include 'php/db_connect.php';
$conn = OpenCon();
$sql = "SELECT * FROM home_page";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$home_title = $row['home_title'];
$home_title_heading = $row['home_title_heading'];
$home_desc = $row['home_desc'];
$home_logoname = $row['home_logoname'];
 
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ManageFund</title>
    <link rel="icon" type="image/x-icon" href="img/ssju-logo_adobe_express.svg">
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="css/index.css" rel="stylesheet" crossorigin="anonymous">
</head>

<body>
    <section class="h-100 gradient-form" style="background-color: #eee ">
        <h2 id="title">
            <?php echo $home_title; ?>
        </h2>
        <div class="container py-3 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-9">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h4 class="mb-4"><?php echo $home_title_heading; ?></h4>
                                    <p class="small mb-0"><?php echo $home_desc; ?></p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">
   
                                    <div class="text-center">
                                        <img src="img/ssju-logo_adobe_express.svg" style="width: 185px;" alt="logo">
                                        <h4 class="mt-1 mb-5 pb-1"><?php echo $home_logoname; ?></h4>
                                    </div>

                                    <form action="php/checklog.php" method="POST" onsubmit="return validate();">
                                        <!-- <legend>Please login to your account</legend> -->


                                        <!-- Error handling for Wrong Input Or Password  -->
                                        <?php
                                        if (isset($_REQUEST['error'])) {
                                            echo "<h5><span class='text-danger border border-3 d-flex justify-content-center'>" . $_REQUEST['error'] . "</span></h5>";
                                        }
                                        ?>
                                        <p>Please login to your account</p>

                                        <div class="form-outline mb-4">
                                            <input name="Username" type="" id="log_username" class="form-control" placeholder="Aadhar Number or Employee id" required />
                                            <label class="form-label" for="Username">UserId</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input name="Password" type="password" id="log_password" class="form-control" required />
                                            <label class="form-label" for="Password">Password</label>
                                        </div>

                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit" id="login_btn">Log
                                                in</button>
                                            <a class="text-muted" href="forgot-password.html">Forgot password?</a>
                                        </div>
                                    </form>

                                    <div class="d-flex align-items-center justify-content-center pb-4">
                                        <p class="mb-0 me-2">Don't have an account?</p>
                                        <button type="button" class="btn btn-outline-danger" onclick="window.location.href = 'register.php';">Create new</button>
                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="js/index.js" crossorigin="anonymous"></script>
    >
</body>

</html>