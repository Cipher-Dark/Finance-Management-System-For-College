<?php
require('vendor/autoload.php');
include 'php/user_auth.php';
if (isset($_POST["generate_report"])) {
  $id = $_SESSION['UserID'];
  $selectedMonth = mysqli_real_escape_string($conn, $_REQUEST['month']);
  list($year, $month) = explode('-', $selectedMonth);
}
$monthName = date('F', mktime(0, 0, 0, $month, 1));

// Query To get Details
$stmt2 = $conn->prepare("SELECT * FROM emp_salery WHERE Emp_id = ? AND YEAR(currenttime) = ? AND MONTH(currenttime) = ?  ");
$stmt2->bind_param('sii', $id, $year, $month);
$stmt2->execute();
// Now assigning the resukt
$result2 = $stmt2->get_result();
// Now accessing the array and saving to a variable
if (mysqli_num_rows($result2) > 0) {
    $row = $result2->fetch_assoc();
    $id = $row['Emp_id'];
    $name = $row['Emp_name'];
    $level = $row['level'];
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
    $gross = ($basic + $da + $hra + $hilla + $bora);
    $deduct = ($gpf + $nps+$gisi+$giss+$sghs);
    $total = $row['Total_sal'];

    $html = '<style>
    /* Add your custom CSS styles here */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .card {
      border: 1px solid #000;
      padding: 10px;
      margin-bottom: 20px;
    }

    .card-header {
      background-color: #000;
      color: #fff;
      text-align: center;
      padding: 5px;
      font-weight: bold;
    }

    .border-bottom {
      border-bottom: 1px solid #000;
      padding-bottom: 10px;
      margin-bottom: 10px;
    }

    .table {
      border-collapse: collapse;
      width: 100%;
    }

    .table th,
    .table td {
      border: 1px solid #000;
      padding: 5px;
      text-align: left;
    }

    .text-center {
      text-align: center;
    }

    .font-weight-bold {
      font-weight: bold;
    }

    .mt-4 {
      margin-top: 20px;
    }

    .mb-0 {
      margin-bottom: 0;
    }

    .col-md-6 {
      width: 50%;
      float: left;
    }

    .clearfix::after {
      content: "";
      clear: both;
      display: table;
    }
    .grid-container {
        display: grid;
        grid-template-columns: auto auto;
        grid-gap: 20px;  
        .first {
            width: 49%;
            margin-left: 3px;
            float: left;
      
          }
      
          .second {
            width: 49%;
            margin-left: 3px;
            float: right;
      
          }
        }
        </style>';


    $html .= '<div>
    <div>
      <div class="card">
        <h5 style="text-align: center;"><strong>L.S.M. Campus, Pithoragarh</strong></h5>
        <h5 style="text-align: center;"><strong>Salary Slip for Month '. $monthName.'</strong></h5>
  
        <label for="name">Name:
        </label>'.strtoupper($name).'
       
        <br>
        <br>
        <label for="name">Level:
        </label>'.strtoupper($level).'
        <br>
        <br>
        <label for="name">EmpId: </label>'.strtoupper($id).'
  
      </div>
    </div>
    <div class="second">
      <div class="border border-dark my-1">
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>

              <tr class ="text-align:center">
              <th colspan="3">
                   Deduction                                                 
              </th>
              </tr>
              <tr>
                <th scope="col">S.No</th>
                <th scope="col">Salary Head</th>
                <th scope="col">Amount</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>GIS Savings</td>
                <td>'. $giss.'</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>GIS Insurance</td>
                <td>'. $gisi.'</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>NPS Emp</td>
                <td>'. $nps.'</td>
              </tr>
              <tr>
                <th scope="row">4</th>
                <td>NPS Employeer</td>
                <td>'. $gpf.'</td>
              </tr>
              <tr>
                <th scope="row">5</th>
                <td>SGHS</td>
                <td>'. $sghs.'</td>
              </tr>
              <!-- Add more deduction rows here if needed -->
            </tbody>
          </table>
        </div>
        <hr>
            <hr>
      </div>
    </div>
    <div class="first">
    <div class="border border-dark my-1">
      <div class="table-responsive">
        <table class="table table-bordered">
        
          <thead>
          <tr class ="text-align:center">
              <th colspan="3">
                Earning                                                 
              </th>
            <tr>
              <th scope="col">S.No</th>
              <th scope="col">Salary Head</th>
              <th scope="col">Amount</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Basic</td>
              <td>'. $basic.'</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Dearness Allowance</td>
              <td>'. $da.'</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>House Rent Allowance</td>
              <td>'. $hra.'</td>
            </tr>
            <tr>
              <th scope="row">4</th>
              <td>Hill Allowance</td>
              <td>'. $hilla.'</td>
            </tr>
            <tr>
              <th scope="row">5</th>
              <td>Boarder Area Allowance</td>
              <td>'. $baa.'</td>
            </tr>
            <!-- Add more earning rows here if needed -->
          </tbody>
        </table>
      </div>
      <hr>
            <hr>
    </div>

  </div>
    <div class="second">
      <div class="table-responsive">
        <table class="table table-bordered">
            <thead>

                <tr class ="text-align:center">
                    <th colspan="2">
                        Total deduction                                              
                    </th>
                    <td> '. $deduct.'</td>
                </tr>
            </thead> 
        </table>
      </div>
    </div>

    <div class="first">
      <div class="table-responsive">
        <table class="table table-bordered">
            <thead>

                <tr class ="text-align:center">
                    <th colspan="2">
                        Gross Saley                                              
                    </th>
                    <td> '. $gross.'</td>
                </tr>
            </thead> 
        </table>
      </div>
    </div>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>

                <tr class ="text-align:center">
                    <th colspan="2">
                        Total deduction                                              
                    </th>
                    <td> '. $total.'</td>
                </tr>
            </thead> 
        </table>
      </div>
    </div>';
} else {
  $error = "No data Found, Please Contact Admin";
  header("Location: ../pro/user.php?error=" . urlencode($error));
  exit();
}
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$file = 'salary_slip_of_month_'.$monthName.'_'.date('Y').'.pdf';
$mpdf->output($file, 'D');
//D
//I
//F
//S
