<?php

$request = array_filter(explode('/', $_SERVER['REQUEST_URI']));

if (!empty($request)){

	$controller = ucfirst($request[1]);
	$action = $request[2];

	if (count($request)>=3) {
		$params = array_splice($request, 2);
		var_dump($params);
	}
	if ($controller != "") {
		require_once '../controllers/'.$controller.'.php';
		$controller= new $controller;
		if (isset($params)) {
			$controller->$action($params);
		} else{
			$controller->$action();
		}
	}
}

else {
	echo 'index';
}