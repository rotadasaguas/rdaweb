<?php

class LocalController{

	public function listar(){

		$view = 'view/Local/listar.php';
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
					Materialize.toast('<span>Local atualizado!</span>', 3000);
				</script>";
			}
			else if($mensagem == '4'){
				echo "<script>
					Materialize.toast('<span>Local removido!</span>', 3000);
				</script>";
			}
		}
	}

	public function listarPorCidade(){

		if( isset($_GET['cidade'])){
			$cidade = $_GET['cidade'];
			$locais = Local::allCidade($cidade); # acessa o modelo
			$view = 'view/Local/listarPorCidade.php';
			require 'template/template.php';
		}
	}

	public function vincular(){
		$locais = Local::allVincular();
		$tags = Tag::all();

		if( isset($_POST['local']) && isset($_POST['tag1']) && isset($_POST['tag2']) && isset($_POST['tag3']) && isset($_POST['tag4'])){
			$rel = new Rel(); 
			$rel2 = new Rel(); 
			$rel3 = new Rel(); 
			$rel4 = new Rel(); 	

			$rel->ID_LOCAL = $_POST['local'];
			$rel->ID_TAG = $_POST['tag1'];

			$rel2->ID_LOCAL = $_POST['local'];
			$rel2->ID_TAG = $_POST['tag2'];

			$rel3->ID_LOCAL = $_POST['local'];
			$rel3->ID_TAG = $_POST['tag3'];

			$rel4->ID_LOCAL = $_POST['local'];
			$rel4->ID_TAG = $_POST['tag4'];

			$rel->save();
			$rel2->save();
			$rel3->save();
			$rel4->save();
			
			$lc = new Local();

			$lc->vinc($_POST['local']);

			echo '<script language= "JavaScript">
				location.href="index.php?c=Local&p=listar&m=1"
			</script>'; 
		}
		$view = 'view/Local/vincular.php';
		require 'template/template.php';	
	}

	public function cadastrar(){
               
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

			$local->save();
			echo '<script language= "JavaScript">
				location.href="index.php?c=Local&p=vincular"
			</script>';
		}
	
		$view = 'view/Local/cadastrar.php';
		require 'template/template.php';
	}

	public function apagar(){
		if(isset($_GET['p'])){
			$funcao = $_GET['p'];

			if($funcao == "apagar"){
				$id = $_GET['id'];
				$local = new Local(); 
				$local->apagar($id);

				echo '<script language= "JavaScript">
				location.href="index.php?c=Local&p=listar&m=4"
				</script>';
			}
		}
	}
	

	public function ver(){
		if(isset($_GET['p'])){
			$funcao = $_GET['p'];

			if($funcao == "ver"){
				$id = $_GET['id'];
				$local = new Local(); 
				$local = Local::ver($id);				
			}
		}

		$view = 'view/Local/ver.php';
		require 'template/template.php';
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