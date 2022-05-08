<?php
// This script retrieves all the records from the users table.

$page_title = 'View the Current Users';
include('includes/header.html');

// Page header:
echo '<h1>Registered Users</h1>';

require('../mysqli_connect.php'); // Connect to the db.

// Make the query:
$q = "SELECT * FROM physician";
$r = @mysqli_query($dbc, $q); // Run the query.

// Count the number of returned rows:
$num = mysqli_num_rows($r);

if ($num > 0) { // If it ran OK, display the records.

	// Print how many users there are:
	echo "<p>There are currently $num registered users.</p>\n";

	// Table header.
	echo '<table width="60%">
	<thead>
	<tr>
		<th align="left">Name</th>
		<th align="left">Date Registered</th>
	</tr>
	</thead>
	<tbody>
';

	// Fetch and print all the records:
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		echo '<tr><td align="left">' . $row['name'] . '</td><td align="left">' . $row['dr'] . '</td></tr>
		';
	}

	echo '</tbody></table>'; // Close the table.

	mysqli_free_result ($r); // Free up the resources.

} else { // If no records were returned.

	echo '<p class="error">There are currently no registered users.</p>';

}

mysqli_close($dbc); // Close the database connection.

include('includes/footer.html');


// query for the physician results
$query=	"SELECT physid, firstname, lastname, position, ssn 
		from physician 
        order by physid DESC";
$run = mysqli_query($dbc, $query) or trigger_error("Query: $query\n<br> MYSQL Error: ". mysqli_error($dbc));

// query for the nurse results
$query=	"SELECT *
		from nurse 
        order by nurseid DESC";
$run = mysqli_query($dbc, $query) or trigger_error("Query: $query\n<br> MYSQL Error: ". mysqli_error($dbc));

// query for the medication results
$query=	"SELECT *
		from medication 
        order by name DESC";
$run = mysqli_query($dbc, $query) or trigger_error("Query: $query\n<br> MYSQL Error: ". mysqli_error($dbc));

// query for the patient results
$query=	"SELECT *
		from patient 
        order by firstname DESC";
$run = mysqli_query($dbc, $query) or trigger_error("Query: $query\n<br> MYSQL Error: ". mysqli_error($dbc));

// query for the appointment results
$query=	"SELECT *
		from appointment 
        order by appointmentid DESC";
$run = mysqli_query($dbc, $query) or trigger_error("Query: $query\n<br> MYSQL Error: ". mysqli_error($dbc));

// query for the phlebotomist results
$query=	"SELECT *
		from phlebotomist 
        order by phlebotomistid DESC";
$run = mysqli_query($dbc, $query) or trigger_error("Query: $query\n<br> MYSQL Error: ". mysqli_error($dbc));

// query for the blood bank results
$query=	"SELECT *
		from bloodbank 
        order by bbankid DESC";
$run = mysqli_query($dbc, $query) or trigger_error("Query: $query\n<br> MYSQL Error: ". mysqli_error($dbc));


// code that outputs the results for physician
if(@mysqli_num_rows($run) > 0) {
	echo "<br>";
	while($qpost = mysqli_fetch_assoc($run)) {
			echo '    
			<table class="table">
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">First Name</th>
					<th scope="col">Last Name</th>
					<th scope="col">Position</th>
					<th scope="col">ssn</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th scope="row">$qpost[physid]</th>
					<td>$qpost[firstname]</td>
					<td>$qpost[lastname]</td>
					<td>$qpost[position]</td>
					<td>$qpost[ssn]</td>
					<td><button class="btn-sm btn-danger">delete</td>
				</tr>
			</tbody>
		</table>';
	}
}

// code that outputs the results for nurse
if(@mysqli_num_rows($run) > 0) {
	echo "<br>";
	while($qpost = mysqli_fetch_assoc($run)) {
			echo '    
			<table class="table">
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">First Name</th>
					<th scope="col">Last Name</th>
					<th scope="col">Position</th>
					<th scope="col">Registered</th>
					<th scope="col">SSN</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th scope="row">$qpost[nurseid]</th>
					<td>$qpost[firstname]</td>
					<td>$qpost[lastname]</td>
					<td>$qpost[position]</td>
					<td>$qpost[registered]</td>
					<td><button class="btn-sm btn-danger">delete</td>
				</tr>
			</tbody>
		</table>';
	}
}

// code that outputs the results for medication
if(@mysqli_num_rows($run) > 0) {
	echo "<br>";
	while($qpost = mysqli_fetch_assoc($run)) {
			echo '    
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
						<th scope="row">$qpost[code]</th>
						<td>$qpost[name]</td>
						<td>$qpost[brand]</td>
						<td>$qpost[description]</td>
						<td><button class="btn-sm btn-danger">delete</td>
					</tr>
				</tbody>
			</table>';
	}
}

// code that outputs the results for patient
if(@mysqli_num_rows($run) > 0) {
	echo "<br>";
	while($qpost = mysqli_fetch_assoc($run)) {
			echo '    
			<table class="table">
				<thead>
					<tr>
						<th scope="col">SSN</th>
						<th scope="col">First Name</th>
						<th scope="col">Last Name</th>
						<th scope="col">Address</th>
						<th scope="col">Phone</th>
						<th scope="col">Insurance ID</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row">$qpost[ssn]</th>
						<td>$qpost[firstname</td>
						<td>$qpost[lastname]</td>
						<td>$qpost[address]</td>
						<td>$qpost[phone]</td>
						<td>$qpost[insuranceid]</td>
						<td><button class="btn-sm btn-danger">delete</td>
					</tr>
				</tbody>
			</table>';
	}
}

// code that outputs the results for department
if(@mysqli_num_rows($run) > 0) {
	echo "<br>";
	while($qpost = mysqli_fetch_assoc($run)) {
			echo '    
			<table class="table">
				<thead>
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Name</th>
						<th scope="col">Head</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row">$qpost[departmentid]</th>
						<td>$qpost[name]</td>
						<td>$qpost[head]</td>
						<td><button class="btn-sm btn-danger">delete</td>
					</tr>
				</tbody>
			</table>';
	}
}

// code that outputs the results for appointment
if(@mysqli_num_rows($run) > 0) {
	echo "<br>";
	while($qpost = mysqli_fetch_assoc($run)) {
			echo '    
			<table class="table">
				<thead>
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Patient</th>
						<th scope="col">Prep Nurse</th>
						<th scope="col">Physician</th>
						<th scope="col">Date</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row">$qpost[appointmentid]</th>
						<td>$qpost[patient]</td>
						<td>$qpost[prepnurse]</td>
						<td>$qpost[physician]</td>
						<td>$qpost[appdate]</td>
						<td><button class="btn-sm btn-danger">cancel</td>
					</tr>
				</tbody>
			</table>';
	}
}

// code that outputs the results for physician
if(@mysqli_num_rows($run) > 0) {
	echo "<br>";
	while($qpost = mysqli_fetch_assoc($run)) {
			echo '    
			<table class="table">
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Name</th>
					<th scope="col">Position</th>
					<th scope="col">ssn</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th scope="row">$qpost[physid]</th>
					<td>$qpost[name]</td>
					<td>$qpost[position]</td>
					<td>$qpost[ssn]</td>
					<td><button class="btn-sm btn-danger">delete</td>
				</tr>
			</tbody>
		</table>';
	}
}


?>