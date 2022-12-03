<?php

$data = array(["message-id-db", 2, 1]);
$data = data_security($data_from_client_POST, $data);

if (empty($data["type"]) or $data["type"] != "error") {

    $sqlr = $database->prepare("SELECT `id`, `message` FROM exempletable WHERE id = :id");
    $sqlr->bindParam(':id', $data["message-id-db"]);
    $sqlr->execute();
    $sqlr_rows = $sqlr->fetchAll();

    if (!empty($sqlr_rows)) {
        $return_data["type"] = "success";
        $return_data["message"] = "Valid code";
        $return_data["content"] = $sqlr_rows[0]["message"];
    } else {
        $return_data["type"] = "error";
        $return_data["message"] = "Id doesn't match";
    }

} else {
    $return_data["type"] = "error";
    $return_data["message"] = $data["message"];
}
