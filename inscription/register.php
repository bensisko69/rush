<?php
session_start();

$USERS_DB_FILE = "../data/users.db";

$infos = Array(
	"name",
	"surname",
	"email",
	"phone"
);

if ($_POST['register'] == "OK")
{
	$login = $_POST['login'];
	$password = $_POST['password'];
	$data = Array();
	foreach ($infos as $info)
		$data[$info] = $_POST[$info];

	$users_data = file_get_contents($USERS_DB_FILE);
	$users = Array();
	if ($users_data)
		$users = unserialize($users_data);

	if (isset($users[$login]))
		echo "already registered\n";
	else
	{
		$hashed_pw = hash("whirlpool", "sc2" . $password);
		$data['login'] = $login;
		$data['password'] = $hashed_pw;
		$users[$login] = $data;
		file_put_contents($USERS_DB_FILE, serialize($users));
		header("Location: inscription.php");
	}
}
?>
