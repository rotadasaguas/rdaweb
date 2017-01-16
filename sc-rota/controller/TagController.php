<?php

class TagController{

	public function listar(){
		$tags = Tag::all(); # acessa o modelo
		$view = 'view/Tag/listar.php';
		require 'template/template.php';
	}
	
	public function cadastrar(){
              
		if( isset($_POST['nome']) ){
			$pessoa = new Tag(); 
			$pessoa->NOME = $_POST['nome'];
			$pessoa->NUMERO = $_POST['chapa'];
            $pessoa->save();
			echo '<script language= "JavaScript">
				location.href="index.php?c=Tag&p=listar"
				</script>';
		}
	
		$view = 'view/Tag/cadastrar.php';
		require 'template/template.php';
	}

	public function editar(){
		if(isset($_GET['p'])){
			$funcao = $_GET['p'];

			if($funcao == "editar"){
				$id = $_GET['id'];
				$verTag = new Tag(); 
				$verTag = Tag::ver($id);	

				if( isset($_POST['nome']) ){
					$tag = new Tag(); 
					$tag->NOME = $_POST['nome'];

					$tag->editar($id);

					echo '<script language= "JavaScript">
					location.href="index.php?c=Tag&p=listar"
					</script>';
				}			
			}
		}

		$view = 'view/Tag/editar.php';
		require 'template/template.php';
	}
}