<?php
session_start();
if ($_POST['action'] == "logout")
{
	session_destroy();
	header("Location: inscription.php");
}
?>
