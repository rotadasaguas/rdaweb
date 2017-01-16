<?php
class Rota{
	
	public $ID;
	public $NOME;
	
	function __construct($id = NULL){
		
		if( !empty($id) ){
			$dbh = new Conexao();
			$sql = 'SELECT * FROM rota WHERE id = :id';
			$rs = $dbh->prepare( $sql ); 
			$rs->bindParam(':id', $id); 
			$rs->execute();
			$rotas = $rs->fetch(PDO::FETCH_OBJ); 
			$this->ID = $rotas->ID;
			$this->NOME = $rotas->NOME;
        }
	}

	function save(){
		if(!$this->ID){ 
			$dbh = new Conexao(); 
			$sql = 'INSERT INTO rota (NOME) VALUES( :nome )';
			$sth = $dbh->prepare( $sql ); 
			$sth->bindParam(':nome', $this->NOME);
        	return $sth->execute(); 
		}
	}

	function salvarLocal($idLocal, $cidadeName, $idRota){
		$dbh = new Conexao(); 
		$sql = 'INSERT INTO rotas_ids (ID_LOCAL, CIDADE, ID_ROTA) VALUES( :id_local, :cidade, :id_rota )';
		$sth = $dbh->prepare( $sql ); 
		$sth->bindParam(':id_local', $idLocal);
		$sth->bindParam(':cidade', $cidadeName);
		$sth->bindParam(':id_rota', $idRota);
        return $sth->execute(); 
	}

	function editar($id){
		$dbh = new Conexao(); 
		$sql = 'UPDATE rota SET NOME = :nome WHERE id ='.$id;
		$sth = $dbh->prepare( $sql ); 
		$sth->bindParam(':nome', $this->NOME);
        return $sth->execute(); 
	}

	function ver($id, $cidade){
		$dbh = new Conexao(); 
		$sql = "SELECT DISTINCT local.nome as local, rotas_ids.cidade, rota.nome FROM local, rota, rotas_ids WHERE rota.id = " .$id. " AND rota.id = rotas_ids.id_rota AND local.id = rotas_ids.id_local AND rotas_ids.cidade = '" .$cidade."'";
		$rs = $dbh->query( $sql );
		$rotas = $rs->fetchAll( PDO::FETCH_CLASS, 'Rota' );
		return $rotas;
	}

	function apagar($id, $cidade){
		$dbh = new Conexao(); 
		$sql2 = "DELETE FROM rotas_ids WHERE rotas_ids.id_rota = ".$id." AND rotas_ids.cidade = '".$cidade."'";
		$sth2 =  $dbh->prepare( $sql2 );

        return $sth2->execute();
	}
	
	static function all(){
		$dbh = new Conexao(); 
		$sql = "SELECT * FROM rota ORDER BY nome";
		$rs = $dbh->query( $sql );
		$rotas = $rs->fetchAll( PDO::FETCH_CLASS, 'Rota' );
		return $rotas;
	}

	static function allListar(){
		$dbh = new Conexao(); 
		$sql = "SELECT DISTINCT rota.id, rota.nome, rotas_ids.cidade FROM rota, rotas_ids WHERE rota.id = rotas_ids.id_rota;";
		$rs = $dbh->query( $sql );
		$rotas = $rs->fetchAll( PDO::FETCH_CLASS, 'Rota' );
		return $rotas;
	}
        

} 




