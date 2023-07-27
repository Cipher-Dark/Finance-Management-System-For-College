<!doctype html>

<?php
include 'php/db_connect.php';
$conn = OpenCon();


if (isset($_POST['submit_btn'])) {
  $id = mysqli_real_escape_string($conn, $_POST['Empid']);
  $cid = mysqli_real_escape_string($conn, $_POST['Cempid']);
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $mob = mysqli_real_escape_string($conn, $_POST['mob']);
  $mail = mysqli_real_escape_string($conn, $_POST['email']);
  $pass = mysqli_real_escape_string($conn, $_POST['Password']);
  $cpass = mysqli_real_escape_string($conn, $_POST['Cpassword']);

  //check empty fields
  if (empty($id)) {
    $error = "UserId is Mendatory ";
  } else if ($id != $cid) {
    $error = "UserID Does not match ";
  } else if (empty($mob)) {
  } else if (empty($name)) {
    $error = "EmpName is Mendatory ";
  } else if (empty($mob)) {
    $error = "Mobile Number is Mendatory";
  } else if (strlen($mob) != 10) {
    $error = "Mobile No. is Invalid, Please Check it !";
  } else if (empty($mail)) {
    $error = "Email ID is Mendatory";
  } else if (empty($pass)) {
    $error = "Password is empty";
  } else if (($pass != $cpass)) {
    $error = "Password does not match";
  } else if ((strlen($pass) < 8)) {
    $error = "Password must be 8 or more ";
  } else {
    $chech_data = "SELECT * from emp_register where Emp_id='$id'";
    $data = mysqli_query($conn, $chech_data);
    $fetch = mysqli_fetch_array($data);
    if ($fetch > 0) {
      $error = "Emp-ID  already exist";
    } else {
      $enc_pass = password_hash($pass, PASSWORD_DEFAULT);
      $details_data = "INSERT INTO emp_register (Emp_id, Emp_name,Emp_mail,Emp_mobile_number) VALUES ('$id','$name', '$mail','$mob')";
      $user_data = "INSERT INTO users (username, password) VALUES ('$id','$enc_pass')";
      $query = mysqli_query($conn, $details_data);
      if (!$query) {
        echo "Error:" . $details_data;
      } else {
        $sucess = "Your Account has been created Sucessfully, kindly Login To Your account ";
        mysqli_query($conn, $user_data);
      }
    }
  }
}
?>



<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css\bootstrap\bootstrap.min.css" crossorigin="anonymous">
  <link rel="stylesheet" href="css\register.css" crossorigin="anonymous">

  <title>New Registration</title>
  <link rel="icon" type="image/x-icon" href="img/ssju-logo_adobe_express.svg">

</head>

<body>
  <section class="vh-100 bg-image">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-9 col-lg-7 col-xl-6">
            <div class="card" style="border-radius: 15px;">
              <div class="card-body p-5">

                <h2 class="text-uppercase text-center mb-5">Create an account</h2>
                <p class="text-uppercase text-center mb-1 p-suc ">
                  <?php
                  if (isset($sucess)) {
                    echo $sucess;
                    sleep(3);
                    header("location/..login.php");
                  }
                  ?>
                </p>


                <p class="text-uppercase text-center mb-1 p-err ">
                  <?php
                  if (isset($error)) {
                    echo $error;
                  }
                  ?>
                </p>

                <form action="" method="POST">
                  <!-- Div Start -->
                  <div class="row gx-5 mb-4">
                    <div class="mb-3">
                      <label class="small mb-1" for="inputUsername">First Name</label>
                      <input class="form-control" id="inputUsername" name="name" type="text" placeholder="Enter your Full Name :" value="<?php if (isset($error)) {
                                                                                                                                            echo $name;
                                                                                                                                          }
                                                                                                                                          ?>">
                    </div>
                  </div>

                  <div class="row gx-5 mb-4">

                    <div class="col-md-6">
                      <label class="small mb-1" for="inputuserid">UserID</label>
                      <input class="form-control" id="inputuserid" name="Empid" type="text" placeholder="Enter your Employee ID :" value="<?php if (isset($error)) {
                                                                                                                                            echo $id;
                                                                                                                                          }
                                                                                                                                          ?>">
                    </div>
                    <div class="col-md-6">
                      <label class="small mb-1" for="inputuserid">Confirm UserID</label>
                      <input class="form-control" id="inputuserid" name="Cempid" type="password" placeholder="Enter your Employee ID :">
                    </div>
                  </div>
                  <div class="row gx-5 mb-4">

                    <div class="col-md-6">
                      <label class="small mb-1" for="mobileno">Mobile No</label>
                      <input class="form-control" id="mobileno" name="mob" type="text" placeholder="Enter your Mobile no :" value="<?php if (isset($error)) {
                                                                                                                                      echo $mob;
                                                                                                                                    }
                                                                                                                                    ?>">
                    </div>
                    <div class="col-md-6">
                      <label class="small mb-1" for="mail">E-mail</label>
                      <input class="form-control" id="mail" name="email" type="email" placeholder="Enter your E-Mail :" value="<?php if (isset($error)) {
                                                                                                                                echo $mail;
                                                                                                                              }
                                                                                                                              ?>">
                    </div>
                  </div>

                  <div class="row gx-5 mb-4">

                    <div class="col-md-6">
                      <label class="small mb-1" for="pass">Password <sub>(atleast 8 characters )</label>
                      <input class="form-control" id="pass" name="Password" type="text" placeholder="Enter your Password :" />

                    </div>
                    <div class="col-md-6">
                      <label class="small mb-1" for="cpass">Confirm Password </label>
                      <input class="form-control" id="cpass" name="Cpassword" type="password" placeholder="Enter Same Password :" />
                    </div>
                  </div>

              </div>
            </div>
            <!-- Div close -->

            <!-- <div class="form-check d-flex justify-content-center mb-5">
                    <input class="form-check-input me-2" name="" type="checkbox" value="" id="check" />
                    <label class="form-check-label" for="check">
                      I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                    </label>
                  </div> -->

            <div class="d-flex justify-content-center">
              <button type="submit" name=" submit_btn" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
            </div>

            <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="index.php" class="fw-bold text-body"><u>Login here</u></a></p>

            </form>

          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </section>
</body>

</html>