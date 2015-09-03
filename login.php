<?php
session_start();

if ($_POST['callbackurl'] == null) { die('No where to redirect to! ERROR'); }

if ($_SESSION['login_status'] == '1') {
	$_SESSION['login_message'] = 'Already logged in mate!';
}
else if ( ($_POST['username']) && ($_POST['password']) && ($_POST['callbackurl']) ) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$callbackurl = $_POST['callbackurl'];
	
	login($username, $password, $callbackurl);
}
else if ($_POST['callbackurl']) {
	$_SESSION['login_message'] = 'Please fill all the fields!';
}

if ($_POST['callbackurl']) {
	$callbackurl = $_POST['callbackurl'];
	header("Location: {$callbackurl}");
}

function login($username, $password, $callbackurl) {
	if ( check_credentials($username,$password) == true ) {
		$_SESSION['login_status'] = '1';
		$_SESSION['login_message'] = 'Logged in mate! Y0 :)';
		$_SESSION['username'] = $username;
	}
	else {
		$_SESSION['login_status'] = '0';
		$_SESSION['login_message'] = 'Wrong password!';
	}
}

function check_credentials($username, $password) {
	if ( ($username == 'atl') && ($password === '1234') ) {
		return true;
	}
	else {
		return false;
	}
}

function validate_letters_numbers($string) {
	// Returns true if the string contains ONLY letters & numbers //
	if (ctype_alnum($string)) { return true; }
	else { return false; }
}

/* function display_login_form($login_uri, $callbackurl) {
	
	echo <<<EOD
	<html><body>
	<form action.php="{$login_uri}" method="POST">
	<input type="text" name="username">
	<input type="password" name="password">
	<input type="hidden" name="callbackurl" value="{$callbackurl}">
	<input type="submit" value="Submit">
	</form>
	</body></html>
EOD;
} */

//display_login_form();


// JUNK CODE //
/* if ($callbackurl == null) { $current_page_uri = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; }
else { $current_page_uri = $callbackurl; }
 */

?>
