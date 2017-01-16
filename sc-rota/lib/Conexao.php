<?php
class Conexao extends PDO{
	function __construct(){
		$dsn = 'mysql:host=localhost;dbname=rda';
        // Set options
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        try {
            parent::__construct($dsn, 'root', 'root', $options);
        } catch (PDOException $e) {
			echo '<div class="alert alert-danger">';
			echo $e->getMessage();
			echo '</div>';
		}
	}
}