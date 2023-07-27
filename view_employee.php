<!DOCTYPE html>

<?php
include 'php/admin_auth.php';
$id = $_REQUEST['emp_id'];
$_SESSION['UserID'] = $id;
$chech_data = "SELECT * from employee_details where Emp_id='$id'";
$data = mysqli_query($conn, $chech_data);
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Details</title>
  <link rel="icon" type="image/x-icon" href="img/ssju-logo_adobe_express.svg">
  <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="css/view_employee.css">
</head>

<body>
  <?php
  if (mysqli_num_rows($data) > 0) {
    $row = mysqli_fetch_array($data);
    $name = $row['Emp_name'];
    $dob = $row['Emp_DOB'];
    $gender = $row['gender'];
    $aadhar = $row['Aadhar_no'];
    $pan = $row['pan/pran'];
    $stree = $row['street'];
    $city = $row['city'];
    $state = $row['state'];
    $district = $row['district'];
    $pincode = $row['pin-code'];
    $emptype = $row['Emp_type'];
    $depatment = $row['Emp_dept'];
  } else {
    $name = '';
    $dob = '';
    $gender = '';
    $aadhar = '';
    $pan = '';
    $stree = '';
    $city = '';
    $state = '';
    $district = '';
    $pincode = '';
    $emptype = '';
    $depatment = '';
  }
  // $isDisabled = ($name == '') ? '' : 'disabled';
  if ($name == '') {
    $ishide = 'hidden';
    $isDisabled = '';
    $isname = 'submit';
    echo  "<h5 class = 'text-uppercase text-danger d-flex justify-content-center'>Please fill all the Details First...  </h5>";
  } else {
    $isDisabled = 'disabled';
    $ishide = '';
    $isname = 'update_submit';
  }
  ?>

  <form style="background-color:turquoise;" action="php/complete_user_profile.php" method="post">
    <div class="container py-5">
      <div class="row">
        <div class="col">
          <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="admin.php">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Complete- Profile</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="d-flex justify-content-center mb-2  ">

        <h2 class="text-uppercase text-danger d-flex justify-content-center mb-2"><?php if (isset($_GET['error'])) {
                                                                                    $error = $_GET['error'];
                                                                                    echo "<p>Error: $error</p>";
                                                                                  } ?> </h2>
      </div>
      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
              <img src="img\dp.webp" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
              <h5 class="my-3 editt">EmpID- <?php echo strtoupper($id);  ?></h5>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <div class="row gx-3 mb-3">
                  <!-- Form Group ( UserID)-->
                  <div class="col-md-6">
                    <label class="small mb-1" for="inputUsername">UserID</label>
                    <input class="form-control " id="inputUsername" name="userid" type="text" value="<?php echo $id ?> " <?php echo $isDisabled ?>>
                  </div>
                  <!-- Form Group ( name)-->
                  <div class="col-md-6">
                    <label class="small mb-1" for="FullName">Full Name</label>
                    <input class="form-control editt" name="name" id="FullName" type="text" placeholder="Enter your Full Name" value="<?php echo strtoupper($name);  ?>" <?php echo $isDisabled ?>>
                  </div>
                </div>
                <!-- Form Row-->
                <div class="row gx-3 mb-3">
                  <!-- Form Group (DOB)-->
                  <div class="col-md-6">
                    <label class="small mb-1" for="dob">DOB</label>
                    <input class="form-control editt" name="dob" id="dob" type="date" value="<?php echo strtoupper($dob);  ?>" <?php echo $isDisabled ?>>
                  </div>
                  <!-- Form Group (gender)-->
                  <div class="col-md-6">
                    <label class="small mb-1" for="inputgender">Gender</label>
                    <select name="gender" class="form-control editt" id="inputgender" class="editt" <?php echo $isDisabled ?>>
                      <option value="<?php echo strtoupper($gender); ?>"> <?php echo strtoupper($gender); ?></option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                      <option value="Other">Other</option>
                    </select>
                  </div>
                </div>
                <!-- Form Row        -->
                <div class="row gx-3 mb-3">
                  <!-- Form Group (Aadhar no)-->
                  <div class="col-md-6">
                    <label class="small mb-1" for="inputaadhar">Aadhar Number</label>
                    <input class="form-control editt" name="aadhar" id="inputaadhar" type="text" placeholder="Enter your Aadhar Number" value="<?php echo strtoupper($aadhar);  ?>" <?php echo $isDisabled ?>>
                  </div>
                  <!-- Form Group (pan/pran)-->
                  <div class="col-md-6">
                    <label class="small mb-1" for="inputLocation">Pan/Pran Number</label>
                    <input class="form-control editt" name="pan" id="inputLocation" type="text" placeholder="Enter your PAN/PRAN Number" value="<?php echo strtoupper($pan);  ?>" <?php echo $isDisabled ?>>
                  </div>
                </div>

                <div class="row gx-3 mb-3">
                  <!-- Form Group (address)-->
                  <div class="mb-3">
                    <label class="small mb-1" for="inputAddress">Address</label>
                    <input class="form-control editt" name="address" id="inputAddress" type="text" placeholder="Enter your full Address" value="<?php echo strtoupper($stree);  ?>" <?php echo $isDisabled ?>>
                  </div>
                  <!-- Form Group (city)-->
                  <div class="col-md-6">
                    <label class="small mb-1" for="inputcity">City</label>
                    <input class="form-control editt" id="inputcity" name="city" type="text" placeholder="City name :" value="<?php echo strtoupper($city);  ?>" <?php echo $isDisabled ?>>
                  </div>
                  <div class="col-md-6">
                    <label class="small mb-1" for="inputcity">State</label>
                    <input class="form-control editt" id="inputcity" name="state" type="text" placeholder="State name :" value="<?php echo strtoupper($state);  ?>" <?php echo $isDisabled ?>>
                  </div>
                  <div class="col-md-6">
                    <label class="small mb-1" for="inputcity">District</label>
                    <input class="form-control editt" id="inputcity" name="district" type="text" placeholder="District name :" value="<?php echo strtoupper($district);  ?>" <?php echo $isDisabled ?>>
                  </div>
                  <div class="col-md-6">
                    <label class="small mb-1" for="inputcity">Pin Code</label>
                    <input class="form-control editt" id="inputcity" name="pincode" type="text" placeholder="Pin Code :" value="<?php echo strtoupper($pincode);  ?>" <?php echo $isDisabled ?>>
                  </div>
                </div>
                <div class="row gx-3 mb-3">
                  <!-- Form Group (EMP TYPE)-->
                  <div class="col-md-6">
                    <label class="small mb-1" for="inputPhone">EMP TYPE</label>
                    <select class="form-control editt" name="emp_type" class="editt" <?php echo $isDisabled ?>>
                      <option value="<?php echo strtoupper($emptype);  ?>"> <?php echo strtoupper($emptype);  ?> </option>
                      <option value="Staff">Staff</option>
                      <option value="Non-Staff">Non-Staff</option>
                    </select>

                  </div>
                  <!-- Form Group (EMP Department)-->
                  <div class="col-md-6">
                    <label class="small mb-1" for="inputBirthday">EMP Department</label>
                    <select name="department" class="editt form-control editt" placeholder="Department" <?php echo $isDisabled ?>>
                      <option value="<?php echo strtoupper($depatment);  ?>"> <?php echo strtoupper($depatment);  ?> </option>
                      <option value="Adminstration">Adminstration</option>
                      <option value="Department of Computer Application">Department of Computer Application</option>
                      <option value="Department of Business Adminstration">Department of Business Adminstration </option>
                      <option value="Department of Physics">Department of Physics</option>
                      <option value="Department of Chemistry">Department of Chemistry</option>
                      <option value="Department of Mathematics">Department of Mathematics</option>
                      <option value="Department of Botany ">Department of Botany </option>
                      <option value="Department of Zoology">Department of Zoology </option>
                      <option value="Department of History">Department of History </option>
                      <option value="Department of Political">Department of Political </option>
                      <option value="Department of Commerce">Department of Commerce</option>
                      <option value="Department of Education">Department of Education</option>
                      <option value="Department of Physical Education">Department of Physical Education</option>
                      <option value="Department of Sanskrit">Department of Sanskrit</option>
                      <option value="Department of Hindi ">Department of Hindi </option>
                      <option value="Department of Geography">Department of Geography </option>
                      <option value="Department of Geoglogy">Department of Geoglogy </option>
                      <option value="Department of Defence Studies">Department of Defence Studies </option>
                    </select>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
      <div class="d-flex justify-content-center  mb-4">

        <button class="btn btn-outline-primary btn-sm mx-1 " id="editButton" type="button" <?php echo $ishide; ?>>edit</button>
        <button class="btn btn-outline-primary btn-sm mx-1 editt" name="<?php echo $isname; ?>" type="submit" <?php echo $isDisabled ?>>Submit</button>
        <a href="admin.php" class="btn btn-secondary btn-sm  mx-3" role="button" aria-pressed="true">Home</a>
      </div>

  </form>

  <script src="js/enable_edit.js"></script>
</body>

</html>