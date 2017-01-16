<?php
class Conexao extends PDO{
	function __construct(){
		$dsn = 'mysql:host=localhost;dbname=rda;charset=utf8';
        // Set options
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        try {
            parent::__construct($dsn, 'root', 'root', $options);
        } catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
}