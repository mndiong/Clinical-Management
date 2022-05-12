<?php # Script 9.2 - mysqli_connect.php

// This file contains the database access information.
// This file also establishes a connection to MySQL,
// selects the database, and sets the encoding.

// Set the database access information as constants:
// define('DB_USER', 'root');
// define('DB_PASSWORD', 'COSC457');
// define('DB_HOST', 'localhost:3307');
// define('DB_NAME', 'clinical');

// Make the connection:
$dbc = @mysqli_connect ('localhost:3307', 'root', 'COSC457', 'clinical');

// If no connection could be made, trigger an error:
if (!$dbc) {
	trigger_error('Could not connect to MySQL: ' . mysqli_connect_error() );
} else { // Otherwise, set the encoding:
	mysqli_set_charset($dbc, 'utf8');
}