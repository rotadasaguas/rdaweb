<?php
	class Local{

		public $ID;
		public $NOME;
		public $DESCRICAO;
		public $CATEGORIA;
		public $RUA;
		public $NUM_END;
		public $BAIRRO;
		public $CEP;
		public $CIDADE;
		public $UF;

		function __construct($id = NULL){
		
			if( !empty($id) ){
				$dbh = new Conexao();
				$sql = 'SELECT * FROM local WHERE id = :id';
				$rs = $dbh->prepare( $sql ); 
				$rs->bindParam(':id', $id); 
				$rs->execute();
				
				$locais = $rs->fetch(PDO::FETCH_OBJ); 
				
				$this->ID = $locais->ID;
				$this->NOME = $locais->NOME;
				$this->DESCRICAO = $locais->DESCRICAO;
				$this->CATEGORIA = $locais->CATEGORIA; 
				$this->RUA = $locais->RUA; 
				$this->NUM_END = $locais->NUM_END; 
				$this->BAIRRO = $locais->BAIRRO; 
				$this->CEP = $locais->CEP; 
				$this->CIDADE = $locais->CIDADE; 
				$this->UF = $locais->UF; 
			}
		}

		function verLocal($aux){
			$dbh = new Conexao();
			$sql = "SELECT DISTINCT l.nome, l.descricao, l.rua, l.num_end, l.bairro, l.cep, l.cidade, l.categoria FROM local l, local_tag lt, tag t WHERE " . $aux;
			$rs = $dbh->prepare($sql);
			$rs->bindParam(':string', $string, PDO::PARAM_INT);
			$rs->execute();
			$locais = $rs->fetchAll(PDO::FETCH_ASSOC); 
			return $locais;
		}

		static function all(){
			$dbh = new Conexao();
			$rs=$dbh->prepare("SELECT * FROM local");
			$rs->execute();
			$data=$rs->fetchAll(PDO::FETCH_ASSOC);

			return $data;
		}

		function listarLocaisRotas($id, $cidade){
			$dbh = new Conexao();
			$sql = "SELECT l.nome, l.descricao, l.rua, l.num_end, l.bairro, l.cep, l.cidade, l.categoria FROM local l, rotas_ids r WHERE r.cidade = '".$cidade."' AND r.id_rota = ".$id." AND l.id = r.id_local";
			$rs=$dbh->prepare($sql);
			$rs->execute();
			$data=$rs->fetchAll(PDO::FETCH_ASSOC);

			return $data;
		}

		function verAgencias(){
			$dbh = new Conexao();
			$rs=$dbh->prepare("SELECT * FROM agencia");
			$rs->execute();
			$data=$rs->fetchAll(PDO::FETCH_ASSOC);

			return $data;
		}

	}
	
?>