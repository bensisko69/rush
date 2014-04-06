<?php
$USERS_DB_FILE = "../data/users.db";

session_start();
if ($_SESSION['connect'] && $_SESSION['connect']['is_admin'])
{
	if ($_POST['action'] = "user_del")
	{
		$login = $_POST['login'];

		$user_data = file_get_contents($USERS_DB_FILE);
		$users = Array();
		if ($user_data)
			$users = unserialize($user_data);

		if (isset($users[$login]))
		{
			unset($users[$login]);
			file_put_contents($USERS_DB_FILE, serialize($users));
		}
		else
			echo "Non existing user : $login\n";
	}
}
else
	echo "You are not logged in as an administrator\n";
?>
