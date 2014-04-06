<?php
$PRODUCT_DB_FILE = "../data/products.db";
$PRODUCT_LIST_FILE = "../data/products.csv";

function product_set(&$products)
{
	$name = $_POST['name'];
	if ($name)
	{
		foreach ($products as $key => $value)
			$products[$key][$name] = $_POST[$key];
	}
}

function product_remove(&$products)
{
	$name = $_POST['name'];
	reset($products);
	if (isset($products[key($products)][$name]))
	{
		foreach ($products as $key => $value)
			unset($products[$key][$name]);
	}
}

function dump_products($products)
{
	$csv = implode(';', array_keys($products)) . "\n";
	reset($products);
	foreach ($products[key($products)] as $key => $value)
	{
		$values = Array();
		foreach ($products as $value)
			array_push($values, $value[$key]);
		$csv .= implode(';', $values) . "\n";
	}
	global $PRODUCT_LIST_FILE;
	file_put_contents($PRODUCT_LIST_FILE, $csv);
}

if ($_POST['submit'] == "OK")
{
	$actions = Array(
		"set" => "product_set",
		"del" => "product_remove"
	);

	session_start();
	if ($_SESSION['connect'] && $_SESSION['connect']['is_admin'])
	{
		$action_type = $_POST['action'];
		$action = $actions[$action_type];
		if ($action)
		{
			$db = file_get_contents($PRODUCT_DB_FILE);
			$products = unserialize($db);
			$action($products);
			file_put_contents($PRODUCT_DB_FILE, serialize($products));
			if ($_POST['dump_csv'] == "TRUE")
				dump_products($products);
		}
	}
	else
		echo "You are not logged in as an administrator\n";
}
?>
