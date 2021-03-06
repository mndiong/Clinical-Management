
<?php
  ob_start();
  include('C:\xampp\htdocs\hospital Management System\includes\msqli_connect.php');
  require('C:\xampp\htdocs\hospital Management System\includes\config.inc.php');
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="../index.php">TU Clinic</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
</header>

<div class="form-group p-4">
    <h2>Add new physician</h2>
    <form action="addNewPhysician.php" method="POST">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">First Name</span>
            <input type="text" class="form-control" name="firstname" placeholder="First Name" aria-label="name"
                aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Last Name</span>
            <input type="text" class="form-control" name="lastname" placeholder="Last Name" aria-label="name"
                aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">Position</span>
            <input type="text" class="form-control" name="position" aria-label="email">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon3">SSN</span>
            <input type="text" class="form-control" name="ssn" placeholder="123-45-6789" aria-describedby="basic-addon3">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <button class="btn btn-secondary" type="button" onclick="history.back()">Go back</button>

    </form>
</div>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Handle the form.

	// Need the database connection:
	require(MYSQL);

	// Trim all the incoming data:
	$trimmed = array_map('trim', $_POST);

	// Assume invalid values:
	$fn = $ln = $pos = $ssn = FALSE;

	// Check for a first name:
	if (preg_match('/^[A-Z \'.-]{2,20}$/i', $trimmed['firstname'])) {
		$fn = mysqli_real_escape_string($dbc, $trimmed['firstname']);
	} else {
		echo '<p class="error">Please enter first name!</p>';
	}

	// Check for a last name:
	if (preg_match('/^[A-Z \'.-]{2,40}$/i', $trimmed['lastname'])) {
		$ln = mysqli_real_escape_string($dbc, $trimmed['lastname']);
	} else {
		echo '<p class="error">Please enter last name!</p>';
	}

	// Check for an position address:
	if (preg_match('/^[A-Z \'.-]{2,40}$/i', $trimmed['position'])) {
		$pos = mysqli_real_escape_string($dbc, $trimmed['position']);
	} else {
		echo '<p class="error">Please enter a valid position!</p>';
	}

		// Check for an ssn address:
	if (strlen($trimmed['ssn']) > 0) {
		$ssn = mysqli_real_escape_string($dbc, $trimmed['ssn']);
	} else {
		echo '<p class="error">Please enter a valid ssn!</p>';
	}

	if ($fn && $ln && $pos && $ssn) { // If everything's OK...

			// Create the activation code:
			$a = md5(uniqid(rand(), true));

			// Add the user to the database:
			$q = "INSERT INTO physician (firstname, lastname, position, ssn) VALUES ('$fn', '$ln', '$pos', '$ssn')";
			$r = mysqli_query($dbc, $q) or trigger_error("Query: $q\n<br>MySQL Error: " . mysqli_error($dbc));

			if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.

				// go back to index page
				header('Location: ../index.php');

			} else { // If it did not run OK.
				echo '<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>';
			}


	} else { // If one of the data tests failed.
		echo '<p class="error">Please try again.</p>';
	}

	mysqli_close($dbc);

} // End of the main Submit conditional.
?>