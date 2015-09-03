<?php
session_start();

echo $_SESSION['login_message']."<br>".$_SESSION['username'];

display_login_form('login_fork.php', 'loginindex.php');

function display_login_form($login_uri, $callbackurl) {

	echo <<<EOD
	<html><body>
	<form action="{$login_uri}" method="POST">
	<input type="text" name="username">
	<input type="password" name="password">
	<input type="hidden" name="callbackurl" value="{$callbackurl}">
	<input type="submit" value="Submit">
	</form>
	</body></html>
EOD;
}

?>
