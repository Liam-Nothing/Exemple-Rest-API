<?php

/* Disable for production  */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/***************************/

if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');
}

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
    exit(0);
}

require_once("includes/functs_db.php");
require_once("includes/functs_utils.php");

header('Content-Type: application/json');
$data_from_client_POST = (array) json_decode(stripslashes(file_get_contents("php://input")));
$database = connectDB("ApiRestExemple", $config);
$headers_from_client = apache_request_headers();
$data_from_client_GET = $_GET;

require_once("includes/selector_api.php");

echo json_encode($return_data);