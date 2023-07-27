<!DOCTYPE html>
<?php
include 'php/user_auth.php';
$conn = OpenCon();
$id = $_SESSION['empid'];

$chech_data = "SELECT * FROM employee_details WHERE Emp_id='$id'";
$sql = "SELECT * FROM emp_register WHERE Emp_id='$id'";
$data = mysqli_query($conn, $chech_data);
if (mysqli_num_rows($data) > 0) {
  $row = mysqli_fetch_array($data);
  $name = $row['Emp_name'];
  $dob = $row['Emp_DOB'];
  $gender = $row['gender'];
  $aadhar = $row['Aadhar_no'];
  $pan = $row['pan/pran'];
  $street = $row['street'];
  $city = $row['city'];
  $state = $row['state'];
  $district = $row['district'];
  $pincode = $row['pin-code'];
  $emptype = $row['Emp_type'];
  $department = $row['Emp_dept'];
} else {
  $error = "Details are not Filled, Kindly Contact Admin For Uploadation";
  $name = '';
  $dob = '';
  $gender = '';
  $aadhar = '';
  $pan = '';
  $street = '';
  $city = '';
  $state = '';
  $district = '';
  $pincode = '';
  $emptype = '';
  $department = '';
}
//
$result = mysqli_query($conn, $sql);
$row1 = mysqli_fetch_array($result);
$email = $row1['Emp_mail'];
$mob = $row1['Emp_mobile_number'];
//
if (mysqli_num_rows($data) > 0 and $row['B_name'] != "") {
  $b_name = $row['B_name'];
  $B_account = $row['accaount_no'];
  $ifsc = $row['ifsc'];
  $branch = $row['branch'];
  $father = $row['father/husband'];
  $mother = $row['mother_name'];
  $dept= $row['Emp_dept'];
  $type = $row['Emp_type'];
} else {
  $error1 = "Please Fill Parents Details and Bank Details. ";
  $b_name = "";
  $B_account = "";
  $ifsc = "";
  $branch = "";
  $father = "";
  $mother = "";
  $dept= "";
  $type = "";
}
$isDisabled = ($b_name == '') ? '' : 'disabled';
$hide = ($b_name == '') ? 'hidden' : '';
?>


<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Details</title>
  <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="css/view_employee.css">
</head>

<body style="background-color: turquoise;">
  <div class="container py-lg-5">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="user.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="tables.php">Employee</a></li>
            <li class="breadcrumb-item active" aria-current="page">Employee Profile</li>
          </ol>
        </nav>
        <?php if (isset($error)) { ?>
          <div class="alert alert-danger" role="alert">
            <?php echo $error; ?>
          </div>
        <?php } ?>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="img/dp.webp" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3"><?php echo strtoupper($row['Emp_id']); ?></h5>
            <p class="text-muted mb-1"><?php echo strtoupper($dept); ?></p>
            <p class="text-muted mb-4"><?php echo strtoupper($type); ?></p>
          </div>
        </div>
        <div class="col-mb-4">
          <form action="user_profile_update.php" method="post">
            <div class="card mb-4">
              <div class="card-body text-center">

                <?php if (isset($error)) { ?>
                  <div class="alert alert-danger" role="alert">
                    <?php echo $error; ?>
                  </div>
                  <?php
                } else {
                  if (isset($error1)) { ?>
                    <div class="alert alert-danger" role="alert">
                      <?php echo $error1; ?>
                    </div>
                  <?php } else {
                  } ?>
                  <div class="row gx-2 mb-2">

                    <div class="col-md-6">
                      <label class="small mb-1" for="inputcity">Father/Husband Name</label>
                      <input class="form-control editt " id="inputcity" name="father" type="text" value="<?php echo $father; ?> " <?php echo $isDisabled ?>>
                    </div>
                    <div class="col-md-6">
                      <label class="small mb-1" for="inputcity">Mother Name</label>
                      <input class="form-control editt " id="inputcity" name="mother" type="text" value="<?php echo $mother; ?> " <?php echo $isDisabled ?>>
                    </div>
                    <div class="col-md-6">
                      <label class="small mb-1" for="inputcity">Bank name</label>
                      <input class="form-control editt " id="inputcity" name="b_name" type="text" value="<?php echo strtoupper($b_name); ?> " <?php echo $isDisabled ?>>
                    </div>
                    <div class="col-md-6">
                      <label class="small mb-1" for="inputcity">Account No</label>
                      <input class="form-control editt" id="inputcity" name="account" type="text" value="<?php echo strtoupper($B_account); ?> " <?php echo $isDisabled ?>>
                    </div>
                    <div class="col-md-6">
                      <label class="small mb-1" for="inputcity">IFSC <Code></Code></label>
                      <input class="form-control editt" id="inputcity" name="ifsc" type="text" value="<?php echo strtoupper($ifsc); ?> " <?php echo $isDisabled ?>>
                    </div>
                    <div class="col-md-6">
                      <label class="small mb-1" for="inputcity">Branch</label>
                      <input class="form-control editt" id="inputcity" name="branch" type="text" value="<?php echo strtoupper($branch); ?> " <?php echo $isDisabled ?>>
                    </div>
                  </div>
                <?php
                } ?>
              </div>
            </div>
            <div class="d-flex justify-content-center mb-2 ">
              <button type="button" id="editButton" class="btn btn-secondary mx-1" <?php echo $hide ?>>Edit Bank Details</button>

              <button type="submit" class="btn btn-outline-primary mx-1 editt " name="profilesubmit" <?php echo $isDisabled ?>>Submit Bank Details</button>

            </div>
          </form>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="row gx-3 mb-3">
                <div class="col-md-6">
                  <label class="small mb-1" for="inputUsername">UserID</label>
                  <input class="form-control" id="inputUsername" name="userid" type="text" value="<?php echo $id; ?>" disabled>
                </div>
                <div class="col-md-6">
                  <label class="small mb-1" for="FullName">Full Name</label>
                  <input class="form-control " name="name" id="FullName" type="text" placeholder="Enter your Full Name" value="<?php echo strtoupper($name); ?>" disabled>
                </div>
              </div>
              <div class="row gx-3 mb-3">
                <div class="col-md-6">
                  <label class="small mb-1" for="dob">DOB</label>
                  <input class="form-control " name="dob" id="dob" type="date" value="<?php echo strtoupper($dob); ?>" disabled>
                </div>
                <div class="col-md-6">
                  <label class="small mb-1" for="inputgender">Gender</label>
                  <input class="form-control " name="aadhar" id="inputaadhar" type="text" placeholder="Enter your Aadhar Number" value="<?php echo strtoupper($gender); ?>" disabled>
                </div>
              </div>
              <div class="row gx-3 mb-3">
                <div class="col-md-6">
                  <label class="small mb-1" for="inputaadhar">Aadhar Number</label>
                  <input class="form-control " name="aadhar" id="inputaadhar" type="text" placeholder="Enter your Aadhar Number" value="<?php echo strtoupper($aadhar); ?>" disabled>
                </div>
                <div class="col-md-6">
                  <label class="small mb-1" for="inputLocation">Pan/Pran Number</label>
                  <input class="form-control " name="pan" id="inputLocation" type="text" placeholder="Enter your PAN/PRAN Number" value="<?php echo strtoupper($pan); ?>" disabled>
                </div>
              </div>
              <div class="row gx-3 mb-3">
                <div class="mb-3">
                  <label class="small mb-1" for="inputAddress">Address</label>
                  <input class="form-control " name="address" id="inputAddress" type="text" placeholder="Enter your full Address" value="<?php echo strtoupper($street); ?>" disabled>
                </div>
                <div class="col-md-6">
                  <label class="small mb-1" for="inputcity">City</label>
                  <input class="form-control " id="inputcity" name="city" type="text" placeholder="City name :" value="<?php echo strtoupper($city); ?>" disabled>
                </div>
                <div class="col-md-6">
                  <label class="small mb-1" for="inputcity">State</label>
                  <input class="form-control " id="inputcity" name="state" type="text" placeholder="State name :" value="<?php echo strtoupper($state); ?>" disabled>
                </div>
                <div class="col-md-6">
                  <label class="small mb-1" for="inputcity">District</label>
                  <input class="form-control " id="inputcity" name="district" type="text" placeholder="District name :" value="<?php echo strtoupper($district); ?>" disabled>
                </div>
                <div class="col-md-6">
                  <label class="small mb-1" for="inputcity">Pin Code</label>
                  <input class="form-control " id="inputcity" name="pincode" type="text" placeholder="Pin Code :" value="<?php echo strtoupper($pincode); ?>" disabled>
                </div>
              </div>
              <div class="row gx-3 mb-3">
                <div class="col-md-6">
                  <label class="small mb-1" for="inputPhone">EMP TYPE</label>
                  <input class="form-control " id="inputcity" name="city" type="text" placeholder="City name :" value="<?php echo strtoupper($city); ?>" disabled>
                </div>
                <div class="col-md-6">
                  <label class="small mb-1" for="inputBirthday">EMP Department</label>
                  <input class="form-control " id="inputcity" type="text" placeholder="City name :" value="<?php echo strtoupper($department); ?>" disabled>

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-center mb-2">
          <button type="button" class="btn btn-warning"><a href="user.php">Dashboard</a></button>
        </div>
      </div>
    </div>
  </div>
  <script src="js/enable_edit.js"></script>
</body>

</html>