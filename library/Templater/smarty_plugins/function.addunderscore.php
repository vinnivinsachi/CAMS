<?php
	function smarty_function_addunderscore($params, $smarty)
	{
		$newString = preg_replace("/[^a-zA-Z0-9s]/", "", $params['phrase']);
		$newString = str_replace(' ', '_', $newString);
		$newString = str_replace('-', '_', $newString);
		//$newString = str_replace('mea');
		$newString = trim($newString);
		$newString = ucfirst(strtolower($newString));
		return $newString;
	}
?>