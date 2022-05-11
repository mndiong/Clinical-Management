<?php
    ob_start();
    require('../includes/config.inc.php');
    // include('../includes/header.html');
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="../index.html">TU Hospital</a>
    <button class="navbar-toggler brand-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
</header>

<div class="form-group p-4">
    <h2>Add new medication</h2>
    <form action="" method="POST">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Name</span>
            <input type="text" class="form-control" name="name" placeholder="Name" aria-label="name"
                aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">Brand</span>
            <input type="text" class="form-control" name="brand" aria-label="email">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon3">Description</span>
            <textarea type="text" class="form-control" name="description" id="address" aria-describedby="basic-addon3"></textarea>
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
	$name = $brand = $description = FALSE;

	// Check for a last name:
	if (preg_match('/^[A-Z \'.-]{2,40}$/i', $trimmed['name'])) {
		$name = mysqli_real_escape_string($dbc, $trimmed['name']);
	} else {
		echo '<p class="error">Please enter the name!</p>';
	}

	// Check for an brand address:
	if (preg_match('/^[A-Z \'.-]{2,40}$/i', $trimmed['brand'])) {
		$brand = mysqli_real_escape_string($dbc, $trimmed['brand']);
	} else {
		echo '<p class="error">Please enter a valid brand!</p>';
	}

    // Check for an brand address:
	if (preg_match('/^[A-Z \'.-]{2,40}$/i', $trimmed['description'])) {
		$description = mysqli_real_escape_string($dbc, $trimmed['description']);
	} else {
		echo '<p class="error">Please enter a valid description!</p>';
	}

    // Check for an brand address:
	$description = $_POST['description'];

	// Check for an ssn address:
	if (preg_match('/^[A-Z \'.-]{2,40}$/i', $trimmed['ssn'])) {
		$ssn = mysqli_real_escape_string($dbc, $trimmed['ssn']);
	} else {
		echo '<p class="error">Please enter a valid ssn!</p>';
	}

	if ($name && $brand && $description) { // If everything's OK...

        // Create the activation code:
			$a = md5(uniqid(rand(), true));

			// Add the user to the database:
			$q = "INSERT INTO medication (name, brand, description) VALUES ('$name', '$brand', '$description')";
			$r = mysqli_query($dbc, $q) or trigger_error("Query: $q\n<br>MySQL Error: " . mysqli_error($dbc));

			if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.

				// go back to index page
				header('Location: index');

			} else { // If it did not run OK.
				echo '<p class="error">You could not be description due to a system error. We apologize for any inconvenience.</p>';
			}

	} else { // If one of the data tests failed.
		echo '<p class="error">Please try again.</p>';
	}

	mysqli_close($dbc);

} // End of the main Submit conditional.
?>