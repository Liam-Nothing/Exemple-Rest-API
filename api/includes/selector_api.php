<?php

if (!(empty($headers_from_client["NE-API"]))) {
    $secu_data_api = array(["NE-API", 30, 1]);
    $secu_data_api = data_security($headers_from_client, $secu_data_api);
    if (empty($secu_data_api["type"]) or $secu_data_api["type"] != "error") {
        if (empty($headers_from_client["NE-SESSION-ID"])) {
            $secu_data = array(["NE-SESSION-ID", 100, 1]);
            $secu_data = data_security($headers_from_client, $secu_data);
            if (empty($secu_data["type"]) or $secu_data["type"] != "error") {
                session_id($secu_data["NE-SESSION-ID"]);
            }
        }
        switch ($secu_data_api["NE-API"]) {
            case "view_message_json":
                require_once(dirname(__FILE__) . "/../app_xxx/app_xxx.php");
                break;
    
            default:
                $return_data["type"] = "error";
                $return_data["message"] = "API doesnt exist";
        }
    }else{
        $return_data["type"] = "error";
        $return_data["message"] = $secu_data["message"];
    }
}else{
    $return_data["type"] = "error";
    $return_data["message"] = "No API";
}