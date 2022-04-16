<?php

$prod = true;

if (isset($_GET["debug"]) and $_GET["debug"] === "1" and $prod === true) {
	var_dump($_SERVER);
}

if ($prod === true) {
	$config = json_decode(file_get_contents(dirname(__FILE__) . "/config.local.json"), true);
} else {
	$config = json_decode(file_get_contents(dirname(__FILE__) . "/config.prod.json"), true);
}

function connectDB($dbname, $config)
{
	$pdo = new PDO("mysql:host=" . $config["host"], $config["dbusername"], $config["dbpassword"]);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->query("use $dbname");
	return $pdo;
}
