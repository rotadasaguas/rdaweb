<?php
class Tag{
	
	public $ID;
	public $NOME;   
	
	function __construct($ID = NULL){
		
		if( !empty($ID) ){
			$dbh = new Conexao();
			$sql = 'SELECT * FROM tag WHERE ID = :id';
			$rs = $dbh->prepare( $sql ); 
			$rs->bindParam(':id', $ID); 
			$rs->execute();
			
			$tag = $rs->fetch(PDO::FETCH_OBJ); 
		
			$this->ID = $tag->ID;
			$this->NOME = $tag->NOME;   
        }
	}
	
	
	function save(){
		if(!$this->ID){ 
			$dbh = new Conexao(); 
			$sql = 'INSERT INTO tag (NOME ) VALUES( :nome )';
			$sth = $dbh->prepare( $sql ); 
			
			$sth->bindParam(':nome', $this->NOME);
                       
            return $sth->execute(); 
		}
	}
	
	static function all(){
		$dbh = new Conexao(); 
		$sql = "SELECT * FROM tag";
		$rs = $dbh->query( $sql );
		$tags = $rs->fetchAll( PDO::FETCH_CLASS, 'Tag' );
		return $tags;
	}


	function ver($id){
		$dbh = new Conexao(); 
		$sql = "SELECT * FROM tag WHERE id = ".$id;
		$rs = $dbh->query( $sql );
		$tag = $rs->fetchAll( PDO::FETCH_CLASS, 'Tag' );
		return $tag;
	}

	function editar($id){
		$dbh = new Conexao(); 
		$sql = 'UPDATE tag SET NOME = :nome WHERE id ='.$id;
		$sth = $dbh->prepare( $sql ); 
		$sth->bindParam(':nome', $this->NOME);
        return $sth->execute(); 
	}
        

} 




