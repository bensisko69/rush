<?php
session_start();

$USERS_DB_FILE = "../data/users.db";

if ($_POST['action'] == "unsubscribe")
{
	$login = $_SESSION['connect']['login'];

	$user_data = file_get_contents($USERS_DB_FILE);
	$users = Array();
	if ($user_data)
		$users = unserialize($user_data);
	if (isset($users[$login]))
	{
		unset($users[$login]);
		session_destroy();
		file_put_contents($USERS_DB_FILE, serialize($users));
		header("Location: inscription.php");
	}
	else
		echo "Error $login\n";
}
?>
