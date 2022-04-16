<?php

$data = array(["message", 200, 0], ["message-id-db", 2, 1]);
$data = data_security($data_from_client, $data);

if (empty($data["error"])) {
	$sqlr = $database->prepare("SELECT `id`, `message` FROM exempletable WHERE id = :id");
	$sqlr->bindParam(':id', $data["message-id-db"]);
	$sqlr->execute();
	$sqlr_rows = $sqlr->fetchAll();

	if (!empty($sqlr_rows)) {
		$return_data["content-db"] = $sqlr_rows[0]["message"];
	} else {
		$return_data["content-db"] = "Id doesn't match";
	}

	$return_data["type"] = "success";
	$return_data["message"] = "Valid code";
	$return_data["content"] = $data["message"];
} else {
	$return_data["type"] = "error";
	$return_data["message"] = "Error";
}
