<?php

$data = array(["api", "60", "1"]);
$data = data_security($data_from_client, $data);

if (empty($data["error"])) {
	switch ($data["api"]) {
		case "view_message_json":
			require_once(dirname(__FILE__) . "/../app_xxx/app_xxx.php");
			break;

		default:
			$return_data["type"] = "error";
			$return_data["message"] = "API doesnt exist";
	}
} else {
	$return_data["type"] = "error";
	$return_data["message"] = "Client data error";
}
