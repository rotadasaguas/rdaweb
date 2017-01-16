<?php
class Agencia{
	
	public $ID;
	public $NOME;
	public $DESCRICAO;
    public $RUA;
	public $NUM_END;
	public $BAIRRO;
	public $CEP;
	public $CIDADE;
	public $UF;
	
	function __construct($id = NULL){
		
		if( !empty($id) ){
			$dbh = new Conexao();
			$sql = 'SELECT * FROM agencia WHERE id = :id';
			$rs = $dbh->prepare( $sql ); 
			$rs->bindParam(':id', $id); 
			$rs->execute();
			
			$locais = $rs->fetch(PDO::FETCH_OBJ); 
			
			$this->ID = $locais->ID;
			$this->NOME = $locais->NOME;
            $this->DESCRICAO = $locais->DESCRICAO; 
			$this->RUA = $locais->RUA; 
			$this->NUM_END = $locais->NUM_END; 
			$this->BAIRRO = $locais->BAIRRO; 
			$this->CEP = $locais->CEP; 
			$this->CIDADE = $locais->CIDADE; 
			$this->UF = $locais->UF; 
        }
	}
	function save(){
		if(!$this->ID){ 
			$dbh = new Conexao(); 
			$sql = 'INSERT INTO agencia (NOME, DESCRICAO, RUA, NUM_END, BAIRRO, CEP, CIDADE, UF) VALUES( :nome, :descricao, :rua, :num_end, :bairro, :cep, :cidade, :uf )';
			$sth = $dbh->prepare( $sql ); 
			$sth->bindParam(':nome', $this->NOME);
			$sth->bindParam(':descricao', $this->DESCRICAO);
			$sth->bindParam(':rua', $this->RUA);
			$sth->bindParam(':num_end', $this->NUM_END);
			$sth->bindParam(':bairro', $this->BAIRRO);
			$sth->bindParam(':cep', $this->CEP);
			$sth->bindParam(':cidade', $this->CIDADE);
			$sth->bindParam(':uf', $this->UF);
        	return $sth->execute(); 
		}
	}


	function editar($id){
		$dbh = new Conexao(); 
		$sql = 'UPDATE agencia SET NOME = :nome, DESCRICAO = :descricao, RUA = :rua, NUM_END = :num_end, BAIRRO = :bairro, CEP = :cep, CIDADE = :cidade, UF = :uf WHERE id ='.$id;
		$sth = $dbh->prepare( $sql ); 
		$sth->bindParam(':nome', $this->NOME);
		$sth->bindParam(':descricao', $this->DESCRICAO);
		$sth->bindParam(':rua', $this->RUA);
		$sth->bindParam(':num_end', $this->NUM_END);
		$sth->bindParam(':bairro', $this->BAIRRO);
		$sth->bindParam(':cep', $this->CEP);
		$sth->bindParam(':cidade', $this->CIDADE);
		$sth->bindParam(':uf', $this->UF);
        return $sth->execute(); 
	}

	function ver($id){
		$dbh = new Conexao(); 
		$sql = "SELECT * FROM agencia WHERE agencia.id = ".$id;
		$rs = $dbh->query( $sql );
		$agencias = $rs->fetchAll( PDO::FETCH_CLASS, 'Agencia' );
		return $agencias;
	}

	function apagar($id){
		$dbh = new Conexao(); 
		$sql2 = "DELETE FROM agencia WHERE agencia.id = ".$id;
		$sth2 =  $dbh->prepare( $sql2 );

        return $sth2->execute(); 
	}
	
	static function all(){
		$dbh = new Conexao(); 
		$sql = "SELECT * FROM agencia ORDER BY nome";
		$rs = $dbh->query( $sql );
		$agencias = $rs->fetchAll( PDO::FETCH_CLASS, 'Agencia' );
		return $agencias;
	}

	static function allCidade($cidade){
		$dbh = new Conexao(); 
		$sql = "SELECT * FROM agencia WHERE agencia.cidade = '".$cidade."' ORDER BY nome";
		$rs = $dbh->query( $sql );
		$agencias = $rs->fetchAll( PDO::FETCH_CLASS, 'Agencia' );
		return $agencias;
	}
        

} 




