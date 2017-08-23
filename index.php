<?php

// Controller Default
$c_name = "HomeController";
// Method Default
$method = "index";

// Handle Request
if (isset($_GET['c'])) {
	$c_name = ucfirst(strtolower($_GET['c'])).'Controller';
	if (isset($_GET['m'])) {
		$method = $_GET['m'];
	}
}

$c_path = 'controller/'.$c_name.'.php';
if (file_exists($c_path)) {
	require_once $c_path;
	if (class_exists($c_name) && method_exists($c_name, $method)) {
		$c_object = new $c_name();
		$c_object->$method();
	} else {
		die('Page Not Found 404');
	}
} else {
	die('Page Not Found 404');
}