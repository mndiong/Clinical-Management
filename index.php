
<?php

  ob_start();
  include('C:\xampp\htdocs\hospital Management System\includes\msqli_connect.php');
  require('C:\xampp\htdocs\hospital Management System\includes\config.inc.php');
  require(MYSQL);

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="generator" content="Hugo 0.88.1">
  <title>Home</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
  <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">

  <!-- Bootstrap core CSS -->
  <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="dashboard.css" rel="stylesheet">
</head>

<body>

  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">TU Hospital</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  </header>

  <div class="container-fluid">
    <div class="row">

      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">

        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="#physiciansResults">
                Physicians
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#nurseResults">
                Nurses
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#medicationResults">
                Medication
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#patientResults">
                Patients
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#departmentResults">
                Departments
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#appointmentResults">
                Appointments
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#bloodTransactions">
                Blood Transactions
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <!-- this is where the table results will be displayed -->
        <div class="results" id="physiciansResults">
          <br>
          <a type="submit" class="btn btn-sm btn-primary" href="addNewForms/addNewPhysician.php">Add New Physician</a>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Position</th>
                    <th scope="col">ssn</th>
                  </tr>
                </thead>
                <?php
          // code that outputs the results for physician
          // query for the physician
          $query=	"SELECT *
                  from physician 
                  order by physid DESC";
          $run = mysqli_query($dbc, $query) or trigger_error("Query: $query\n<br> MYSQL Error: ". mysqli_error($dbc));

          if(@mysqli_num_rows($run) > 0) {
            echo "<br>";

            // prints the record in the table format
            while($qpost = mysqli_fetch_assoc($run)) {
                echo '    
                <tbody>
                  <tr>
                    <th scope="row">'.$qpost["physid"].'</th>
                    <td>'. $qpost["firstname"] .'</td>
                    <td>'.$qpost["position"].'</td>
                    <td>'.$qpost["ssn"].'</td>
                    <td><a style="text-decoration: none; color: white" href="deleteRecord.php?id=' . $qpost['physid'] . '"><button class="btn-sm btn-danger">delete</a></td>
                    <td><a style="text-decoration: none; color: white" href="updateRecord.php?id=' . $qpost['physid'] . '"><button class="btn>-sm btn-info text-white">update</a></td>
                  </tr>
                </tbody>
              ';
            }
          }
          ?>
          </table>
        </div>

        <div class="results" id="nurseResults">
          <br>
          <a type="submit" class="btn btn-sm btn-primary" href="addNewForms/addNewNurse.php">Add New Nurse</a>
          <?php
          // code that outputs the results for physician
          // query for the physician
          $query=	"SELECT *
                  from nurse 
                  order by nurseid DESC";
          $run = mysqli_query($dbc, $query) or trigger_error("Query: $query\n<br> MYSQL Error: ". mysqli_error($dbc));

          if(@mysqli_num_rows($run) > 0) {
            echo "<br>";
            echo '
            <table class="table">
                <thead>
                  <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">Position</th>
                  <th scope="col">Registered</th>
                  <th scope="col">SSN</th>
                  </tr>
                </thead>';
            // prints the record in the table format
            while($qpost = mysqli_fetch_assoc($run)) {
                echo '    
                <tbody>
                  <tr>
                    <th scope="row">'.$qpost["nurseid"].'</th>
                    <td>'. $qpost["firstname"] .'</td>
                    <td>'.$qpost["position"].'</td>
                    <td>'.$qpost["registered"].'</td>
                    <td>'.$qpost["ssn"].'</td>
                    <td><form action="deleteRecord.php" method="post"><button class="btn-sm btn-danger">delete</form></td>
                    <td><form action="updateRecord.php" method="post"><button class="btn>-sm btn-info text-white">update</form></td>
                  </tr>
                </tbody>
              </table>';
            }
          }
          ?>
        </div>

        <div class="results" id="medicationResults">
          <br>
          <a type="submit" class="btn btn-sm btn-primary" href="addNewForms/addNewMedication.php">Add New
            Medication</a>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Code</th>
                <th scope="col">Name</th>
                <th scope="col">Brand</th>
                <th scope="col">Description</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>name of med</td>
                <td>Brand Name</td>
                <td>description</td>
                <td><form action="deleteRecord.php" method="post"><button class="btn-sm btn-danger">delete</form></td>
                  <td><form action="updateRecord.php" method="post"><button class="btn>-sm btn-info text-white">update</form></td>
                  </tr>
            </tbody>
          </table>
        </div>

        <div class="results" id="patientResults">
          <br>
          <a type="submit" class="btn btn-sm btn-primary" href="addNewForms/addNewPatient.php">Add New Patient</a>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">SSN</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Phone</th>
                <th scope="col">Insurance ID</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">123-45-6789</th>
                <td>Michael Jordan</td>
                <td>123 Main Street</td>
                <td>123-456-7890</td>
                <td>098765</td>
                <td><form action="deleteRecord.php" method="post"><button class="btn-sm btn-danger">delete</form></td>
                <td><form action="updateRecord.php" method="post"><button class="btn>-sm btn-info text-white">update</form></td>
              </tr>
            </tbody>
          </table>
        </div>

        <div id="appointmentResults">
          <br>
          <a type="submit" class="btn btn-sm btn-primary" href="addNewForms/addNewAppointment.php">Make a New
            Appointment</a>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Patient</th>
                <th scope="col">Prep Nurse</th>
                <th scope="col">Physician</th>
                <th scope="col">Date</th>
                <th scope="col">Exam Room</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Michael Jordan</td>
                <td>some nurse</td>
                <td>dr. phil</td>
                <td>May 25 2022</td>
                <td>301</td>
                <td><form action="deleteRecord.php" method="post"><button class="btn-sm btn-danger">cancek</form></td>
                  <td><form action="updateRecord.php" method="post"><button class="btn>-sm btn-info text-white">update</form></td>
                  </tr>
            </tbody>
          </table>
        </div>

        <div id="phlebotomistResults">
          <br>
          <a type="submit" class="btn btn-sm btn-primary" href="addNewForms/addNewPhlebotomist.php">Add new
            Phlebotomist</a>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">SSN</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Michael Jordan</td>
                <td>123456789</td>
                <td><form action="deleteRecord.php" method="post"><button class="btn-sm btn-danger">delete</form></td>
                  <td><form action="updateRecord.php" method="post"><button class="btn>-sm btn-info text-white">update</form></td>
                  </tr>
            </tbody>
          </table>
        </div>

        <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->

      </main>
    </div>
  </div>
  <script type="text/javascript">
    $(".nav-link").on("click", function (e) {
      var target = $(this).attr("href");
      $(target).slideToggle("fast");
      $(".results").not(target).hide();
      e.preventDefault();
    });
  </script>
  <!-- <script src="../assets/dist/js/bootstrap.bundle.min.js"></script> -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script> -->
</body>

</html>