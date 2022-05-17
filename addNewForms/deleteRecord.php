<?php # Script 10.2 - delete_user.php

ob_start();
require('C:\xampp\htdocs\hospital Management System\includes\config.inc.php');
include('C:\xampp\htdocs\hospital Management System\includes\msqli_connect.php');
require(MYSQL);

// Check for a valid user ID, through GET or POST:
if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { // From view_users.php
	$id = $_GET['id'];
	$table = $_GET['table'];
	$col = $_GET['col'];

} elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { // Form submission.
	$id = $_POST['id'];
	$table = $_POST['table'];
	$col = $_POST['col'];
} else { // No valid ID, kill the script.
	echo '<p class="error">This page has been accessed in error.</p>';
	exit();
	header('Location: index.php');
}


// Make the query:
$q = "DELETE FROM $table WHERE col=$id LIMIT 1";
$r = @mysqli_query($dbc, $q);
if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.
	// return to home page
	header('Location: index.php');
}

mysqli_close($dbc);

?>