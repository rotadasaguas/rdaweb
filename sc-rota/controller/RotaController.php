<?php

class RotaController{

	public function listar(){
		$locais = Rota::allListar(); # acessa o modelo

		$view = 'view/Rota/listar.php';
		require 'template/template.php';

		if(isset($_GET['m'])){
			$mensagem = $_GET['m'];

			if($mensagem == '1'){
				echo "<script>
					Materialize.toast('<span>Categoria de Rota Criada!</span>', 3000);
				</script>";
			}
			else if($mensagem == '2'){
				echo "<script>
					Materialize.toast('<span>Categoria de Rota Atualizada!</span>', 3000);
				</script>";
			}
			else if($mensagem == '3'){
				echo "<script>
					Materialize.toast('<span>Rota Criada!</span>', 3000);
				</script>";
			}
			else if($mensagem == '4'){
				echo "<script>
					Materialize.toast('<span>Rota Atualizada!</span>', 3000);
				</script>";
			}
			else if($mensagem == '5'){
				echo "<script>
					Materialize.toast('<span>Rota Apagada!</span>', 3000);
				</script>";
			}
		}
	}

	public function novaRota(){
		if (isset($_GET['rota']) && isset($_GET['cidade'])) {
			$rotaId = $_GET['rota'];
			$cidadeName = $_GET['cidade'];
			if (isset($_POST['local'])) {
				$rota = new Rota();
				$locaisId = $_POST['local'];

				foreach($locaisId as $l){
					$rota->salvarLocal($l, $cidadeName, $rotaId);
				}

				echo '<script language= "JavaScript">
					location.href="index.php?c=Rota&p=listar&m=3"
				</script>';
			}
			$locais = Local::allCidade($cidadeName);
		}

		$rotas = Rota::all(); # acessa o modelo
		

		$view = 'view/Rota/selecaoLocais.php';
		require 'template/template.php';
	}
	public function listarRotas(){

		if( isset($_POST['rota']) ){

			$rotaId = $_POST['rota'];
			$cidadeName = $_POST['cidade'];
			$locaisId = $_POST['local'];

			echo '<script language= "JavaScript">
				location.href="index.php?c=Rota&p=novaRota&m=3&rota='.$rotaId.'&cidade='.$cidadeName.'"
			</script>';
		}

		$rotas = Rota::all(); # acessa o modelo
		$locais = Local::all();

		$view = 'view/Rota/novaRota.php';
		require 'template/template.php';
	}


	public function cadastrar(){
               
		if( isset($_POST['nome']) ){
			$local = new Rota(); 
			$local->NOME = $_POST['nome'];

			$local->save();
			echo '<script language= "JavaScript">
				location.href="index.php?c=Rota&p=listar&m=1"
			</script>';
		}
	
		$view = 'view/Rota/cadastrar.php';
		require 'template/template.php';
	}

	public function ver(){
		if(isset($_GET['p'])){
			$funcao = $_GET['p'];

			if($funcao == "ver"){
				$id = $_GET['id'];
				$cidade = $_GET['cidade'];
				$rota = new Rota(); 
				$rota = Rota::ver($id,$cidade);				
			}
		}

		$view = 'view/Rota/ver.php';
		require 'template/template.php';
	}

	public function apagar(){
		if(isset($_GET['p'])){
			$funcao = $_GET['p'];

			if($funcao == "apagar"){
				$id = $_GET['id'];
				$cidade = $_GET['cidade'];
				$rota = new Rota(); 
				$rota = Rota::apagar($id,$cidade);	

				echo '<script language= "JavaScript">
				location.href="index.php?c=Rota&p=listar&m=5"
				</script>';			
			}
		}

	}
	
	public function editar(){
		if(isset($_GET['p'])){
			$funcao = $_GET['p'];

			if($funcao == "editar"){
				$id = $_GET['id'];
				$verLocal = new Local(); 
				$verLocal = Local::ver($id);	

				if( isset($_POST['nome']) ){
					$local = new Local(); 
					$local->NOME = $_POST['nome'];
					$local->DESCRICAO = $_POST['descricao'];
					$local->CATEGORIA = $_POST['categoria'];
					$local->RUA = $_POST['rua'];
					$local->NUM_END = $_POST['num_end'];
					$local->BAIRRO = $_POST['bairro'];
					$local->CEP = $_POST['cep'];
					$local->CIDADE = $_POST['cidade'];
					$local->UF = $_POST['uf'];

					$local->editar($id);

					echo '<script language= "JavaScript">
						location.href="index.php?c=Local&p=listar&m=3"
						</script>';
				}			
			}
		}

		$view = 'view/Local/editar.php';
		require 'template/template.php';
	}
	
	
}