<?php

function data_security($data_from_client, $arrays)
{
	$array_return = array();
	foreach ($arrays as $array) {
		$array_return += data_security_tester($data_from_client, $array[0], (isset($array[1])) ? $array[1] : null, (isset($array[2])) ? $array[2] : null);
	}

	return $array_return;
}

function data_security_tester($data_from_client, $variable_name, $max_leght = 100, $min_leght = 0)
{
	$array_return = array();
	if (isset($data_from_client[$variable_name])) {
		if (strlen($data_from_client[$variable_name]) <= $max_leght) {
			if (strlen($data_from_client[$variable_name]) >= $min_leght) {
				$array_return[$variable_name] = htmlspecialchars($data_from_client[$variable_name]);
			} else {
				$array_return["error"]["variable_name"] = $variable_name;
				$array_return["error"]["message"] = "Minlength : " . $min_leght;
			}
		} else {
			$array_return["error"]["variable_name"] = $variable_name;
			$array_return["error"]["message"] = "Maxlenght : " . $max_leght;
		}
	} else {
		$array_return["error"]["variable_name"] = $variable_name;
		$array_return["error"]["message"] = "isset";
	}

	return $array_return;
}
