<?php
session_start();
$USERS_DB_FILE = "../data/users.db";
$CONNECT_EXPIRE = 1200;
if ($_POST['register_new'] == "OK")
{
	$login = $_POST['login'];
	$password = $_POST['password'];
	echo strlen($login);
	echo strlen($password);
	$users_data = file_get_contents($USERS_DB_FILE);
	$users = Array();
	if ($users_data)
		$users = unserialize($users_data);
	if (isset($users[$login]))
		echo "already registered\n";
	else
	{
		$hashed_pw = hash("whirlpool", "sc2" . $password);
		$users[$login] = $hashed_pw;
		file_put_contents($USERS_DB_FILE, serialize($users));
		echo "OK $login\n";
	}
}
else if ($_POST['connect'] = "OK")
{
	$login = $_POST['login'];
	$password = $_POST['password'];
	$users_data = file_get_contents($USERS_DB_FILE);
	$users = Array();
	if ($users_data)
		$users = unserialize($users_data);
	if (isset($users[$login]))
	{
		$hashed_pw = hash("whirlpool", "sc2" . $password);
		if ($users[$login] == $hashed_pw)
		{
			echo "OK\n";
			$_SESSION['login'] = $login;
		}
		else
			echo "Bad login credentials\n";
	}
	else
		echo "Bad login credentials\n";
}
else if ($_POST['delete_account'] == "OK")
{

}
else if ($_POST['disconnect'])
{

}
?>
