<?php

    $data = array(["message", 200, 0]);
    $data = data_security($data_from_client, $data);
    
    if(empty($data["error"])){
		$return_data["type"] = "success";
		$return_data["message"] = "Valid code";
		$return_data["content"] = $data["message"];
    }else{
        $return_data["type"] = "error";
        $return_data["message"] = "Error";
    }