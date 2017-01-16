<?php

session_start();

if(!empty($_SESSION['uid'])){
    $session_uid = $_SESSION['uid'];

	if( isset( $_GET['c'] ) && isset( $_GET['p'] ) ){
		$controller = $_GET['c'];
		$metodo = $_GET['p'];
	}else{
		$controller = 'Index';
		$metodo = 'inicio'; 
	}
}
if(empty($session_uid)){
    $controller = 'Usuario';
	$metodo = 'login'; 
}

$controller = $controller . 'Controller';

require 'lib/Conexao.php';
require 'model/Tag.php';
require 'model/Agencia.php';
require 'model/Local.php';
require 'model/Rota.php';
require 'model/Rel.php';
require 'model/Usuario.php';


require  'controller/'.$controller.'.php';

$c = new $controller;

$c->$metodo();

