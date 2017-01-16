<?php

class UsuarioController{

	public function login(){
		$view = 'view/Usuario/login.php';
		require 'template/template.php';

		if (!empty($_POST['loginSubmit'])) {
			$usernameEmail=$_POST['usernameEmail'];
			$password=$_POST['password'];
			if(strlen(trim($usernameEmail))>1 && strlen(trim($password))>1 ){
				$usuario = new Usuario();
				$uid=$usuario->userLogin($usernameEmail,$password);
				if($uid){
					echo '<script language= "JavaScript">
						location.href="index.php?c=Index&p=inicio&m=1"
						</script>';
				}
				else{
					echo '<script language= "JavaScript">
						location.href="index.php?c=Usuario&p=login&m=1"
						</script>'; 
				}
			}
		}

		if(isset($_GET['m'])){
			$mensagem = $_GET['m'];

			if($mensagem == '1'){
				echo "<script>
					Materialize.toast('<span>Erro, Usuario ou senha incorretos!</span>', 3000);
				</script>";
			}
			else if($mensagem == '2'){
				echo "<script>
					Materialize.toast('<span>Você saiu com sucesso!</span>', 3000);
				</script>";
			}
		}
              
		
	}

	public function cadastrar(){
		if (isset($_POST['usernameReg'])){			
			$username=$_POST['usernameReg'];
			$email=$_POST['emailReg'];
			$password=$_POST['passwordReg'];
			$name=$_POST['nameReg'];
			/* Regular expression check */
			$username_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $username);
			$email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$~i', $email);
			$password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $password);

			echo $username_check;

			if($username_check && $email_check && $password_check && strlen(trim($name))>0){
				$usuario = new Usuario();
				$uid = $usuario->cadastrar($username,$password,$email,$name);
				if($uid){
					echo '<script language= "JavaScript">
						location.href="index.php?c=Usuario&p=login"
						</script>'; 
				}
			}
			else{
				echo "<script>
					Materialize.toast('<span>Erro! Verifique os dados!</span>', 3000);
					</script>";
			}
		}

		$view = 'view/Usuario/cadastrar.php';
		require 'template/template.php';

	}


	public function logout(){
		$view = 'view/Usuario/login.php';
		require 'template/template.php';

		$session_uid='';
		$_SESSION['uid']=''; 

		echo '<script language= "JavaScript">
				location.href="index.php?c=Usuario&p=login&m=2"
			</script>'; 
	}
}