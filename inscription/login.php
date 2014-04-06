<?php
session_start();

$USERS_DB_FILE = "../data/users.db";

if ($_POST['connect'] == "OK")
{
	$login = $_POST['login'];
	$password = $_POST['password'];

	$users = Array();
	$users_data = file_get_contents($USERS_DB_FILE);
	if ($users_data)
		$users = unserialize($users_data);

	if (isset($users[$login]))
	{
		$hashed_pw = hash("whirlpool", "sc2" . $password);
		if ($users[$login]['password'] == $hashed_pw)
		{
			$_SESSION['connect'] = $users[$login];
			header("Location: inscription.php");
		}
		else
			echo "Bad login credentials\n";
	}
	else
		echo "Bad login credentials\n";
}
?>
