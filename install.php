#!/usr/bin/php
<?php
$PRODUCT_LIST_FILE = "data/products.csv";
$PRODUCT_DB_FILE = "data/products.db";
$USERS_DB_FILE = "data/users.db";

echo "Setting up server...\n";
$products = file_get_contents($PRODUCT_LIST_FILE);
$lines = preg_split("/\n/", $products);
$keys = preg_split("/;/", $lines[0]);
foreach ($keys as $key)
	eval("\$$key = Array();");
$key_count = count($keys);

$product_count = count($lines) - 1;
$products_array = Array();
for ($i = 1; $i < $product_count; $i++)
{
	$values = preg_split("/;/", $lines[$i]);
	$key = $values[0];
	for ($j = 0; $j < $key_count; $j++)
		eval("\$$keys[$j]['$key'] = '$values[$j]';");
}

$data = Array();
foreach ($keys as $key)
	$data[$key] = eval("return \$$key;");
$str = serialize($data);
file_put_contents($PRODUCT_DB_FILE, $str);

$users = Array();
$users['admin'] = Array(
	"login" => "admin",
	"password" => hash("whirlpool", "sc2admin"),
	"name" => "admin",
	"surname" => "admin",
	"email" => "admin@admin.admin",
	"phone" => "+336421337",
	"is_admin" => True
);
file_put_contents($USERS_DB_FILE, serialize($users));
echo "done\n";
?>
