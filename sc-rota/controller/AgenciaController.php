<?php

class AgenciaController{

	public function listar(){
		$agencias = Agencia::all(); # acessa o modelo

		$view = 'view/Agencia/listar.php';
		require 'template/template.php';

		if(isset($_GET['m'])){
			$mensagem = $_GET['m'];

			if($mensagem == '1'){
				echo "<script>
					Materialize.toast('<span>Marcadores adicionados!</span>', 3000);
				</script>";
			}
			else if($mensagem == '2'){
				echo "<script>
					Materialize.toast('<span>Cadastrado com sucesso!</span>', 3000);
				</script>";
			}
			else if($mensagem == '3'){
				echo "<script>
					Materialize.toast('<span>Agência atualizada!</span>', 3000);
				</script>";
			}
			else if($mensagem == '4'){
				echo "<script>
					Materialize.toast('<span>Agência removida!</span>', 3000);
				</script>";
			}
		}
	}

	public function listarPorCidade(){

		if( isset($_GET['cidade'])){
			$cidade = $_GET['cidade'];
			$agencias = Agencia::allCidade($cidade); # acessa o modelo
			$view = 'view/Agencia/listarPorCidade.php';
			require 'template/template.php';
		}
	}

	public function cadastrar(){
               
		if( isset($_POST['nome']) ){
			$agencia = new Agencia(); 
			$agencia->NOME = $_POST['nome'];
			$agencia->DESCRICAO = $_POST['descricao'];
			$agencia->RUA = $_POST['rua'];
			$agencia->NUM_END = $_POST['num_end'];
			$agencia->BAIRRO = $_POST['bairro'];
			$agencia->CEP = $_POST['cep'];
			$agencia->CIDADE = $_POST['cidade'];
			$agencia->UF = $_POST['uf'];

			$agencia->save();
			echo '<script language= "JavaScript">
				location.href="index.php?c=Agencia&p=listar"
			</script>';
		}
	
		$view = 'view/Agencia/cadastrar.php';
		require 'template/template.php';
	}

	public function apagar(){
		if(isset($_GET['p'])){
			$funcao = $_GET['p'];

			if($funcao == "apagar"){
				$id = $_GET['id'];
				$agencia = new Agencia(); 
				$agencia->apagar($id);

				echo '<script language= "JavaScript">
				location.href="index.php?c=Agencia&p=listar&m=4"
				</script>';
			}
		}
	}
	

	public function ver(){
		if(isset($_GET['p'])){
			$funcao = $_GET['p'];

			if($funcao == "ver"){
				$id = $_GET['id'];
				$agencia = new Agencia(); 
				$agencia = Agencia::ver($id);				
			}
		}

		$view = 'view/Agencia/ver.php';
		require 'template/template.php';
	}
	
	public function editar(){
		if(isset($_GET['p'])){
			$funcao = $_GET['p'];

			if($funcao == "editar"){
				$id = $_GET['id'];
				$verAgencia = new Agencia(); 
				$verAgencia = Agencia::ver($id);	

				if( isset($_POST['nome']) ){
					$agencia = new Agencia(); 
					$agencia->NOME = $_POST['nome'];
					$agencia->DESCRICAO = $_POST['descricao'];
					$agencia->CATEGORIA = $_POST['categoria'];
					$agencia->RUA = $_POST['rua'];
					$agencia->NUM_END = $_POST['num_end'];
					$agencia->BAIRRO = $_POST['bairro'];
					$agencia->CEP = $_POST['cep'];
					$agencia->CIDADE = $_POST['cidade'];
					$agencia->UF = $_POST['uf'];

					$agencia->editar($id);

					echo '<script language= "JavaScript">
						location.href="index.php?c=Agencia&p=listar&m=3"
						</script>';
				}			
			}
		}

		$view = 'view/Agencia/editar.php';
		require 'template/template.php';
	}
	
	
}