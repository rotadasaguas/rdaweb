<?php       
	if( isset( $_GET['c'] ) && isset( $_GET['s'] ) ){
		$controller = $_GET['c'];
		$metodo = $_GET['s'];
	}
	else {
		$controller = 'Locais';
		$metodo = 'inicio'; 
	}

	$controller = $controller . 'Controller';

	require 'lib/Conexao.php';
	require 'model/Local.php';


	require  'controller/'.$controller.'.php';

	$c = new $controller;
	$c->$metodo();

	
?>