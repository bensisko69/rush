<?php
// $PRODUCT_DB_FILE = "data/products.db";

// $db = file_get_contents($PRODUCT_DB_FILE);
// $products = unserialize($db);
// echo preg_replace("/\n/", "<br>", print_r($products, True));
session_start();
header("Location: index.html");
?>
