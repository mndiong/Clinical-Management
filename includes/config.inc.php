<?php

define('LIVE', FALSE); // once the site is live, this will change to true
define('EMAIL', 'business@taleten.com'); // where error messages will be sent to

define('BASE_URL', 'http://localhost/');
define('MYSQL', 'mysqli_connect.php');

date_default_timezone_set('America/New_York'); // time zone for date functions

/*

	if the site is live, this function will send the error message to the email
	and the user will receive a generic message.
	if it is in the development stage will print the error message on the screen.

*/

function my_error_handler($e_number, $e_message, $e_file, $e_line, $e_vars)
{
	$message = "An error occured in script '$e_file' on line $e_line: $e_message\n";
	$message .= "Date/Time: " . date('n-j-Y H:i:s') . "\n";

	if(!LIVE)
	{
		echo '<div class = "error">' . nl2br($message);
		echo '<pre>' . print_r($e_vars, 1) . "\n";
		debug_print_backtrace();
		echo '</pre></div>';
	}
	else
	{
		$body = $message . "\n" . print_r($e_vars, 1);
		mail('business@taleten.com', 'Site Error', $body);

		if($e_number != E_NOTICE)
		{
			echo '<div class = "error">A system error occured. We apologize for the inconvenience.</div><br>';
		}
	}
	
	set_error_handler('my_error_handler');
}