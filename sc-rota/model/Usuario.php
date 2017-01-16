<?php
class Usuario{

	/* User Login */
	public function userLogin($usernameEmail,$password){
		try{
			$db = new Conexao(); 
			$hash_password= hash('sha256', $password); //Password encryption 
			$stmt = $db->prepare("SELECT uid FROM users WHERE (username=:usernameEmail or email=:usernameEmail) AND password=:hash_password"); 
			$stmt->bindParam("usernameEmail", $usernameEmail,PDO::PARAM_STR) ;
			$stmt->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
			$stmt->execute();
			$count=$stmt->rowCount();
			$data=$stmt->fetch(PDO::FETCH_OBJ);
			$db = null;
			if($count){
				$_SESSION['uid']=$data->uid; // Storing user session value
				return true;
			}
			else{
				return false;
			} 
		}
		catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
	}

	/* CADASTRO */
	public function cadastrar($username,$password,$email,$name){
		try{
			$db = new Conexao(); 
			$st = $db->prepare("SELECT uid FROM users WHERE username=:username OR email=:email");
			$st->bindParam("username", $username,PDO::PARAM_STR);
			$st->bindParam("email", $email,PDO::PARAM_STR);
			$st->execute();
			$count=$st->rowCount();

			if($count<1){
				$stmt = $db->prepare("INSERT INTO users(username,password,email,name) VALUES (:username,:hash_password,:email,:name)");
				$stmt->bindParam("username", $username,PDO::PARAM_STR) ;
				$hash_password= hash('sha256', $password); //Password encryption
				$stmt->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
				$stmt->bindParam("email", $email,PDO::PARAM_STR) ;
				$stmt->bindParam("name", $name,PDO::PARAM_STR) ;
				$stmt->execute();
				$uid=$db->lastInsertId(); // Last inserted row id
				$db = null;
				$_SESSION['uid']=$uid;
				return true;
			}
			else{
				$db = null;
				return false;
			}
		} 
		catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}'; 
		}
	}

	/* Detalhes do Usuario */
	public function userDetails($uid){
		/*$db = new Conexao(); 
		$stmt = $db->prepare("SELECT email,username,name FROM users WHERE uid=".$uid); 
		$stmt->bindParam("uid", $uid,PDO::PARAM_INT);
		$stmt->execute();
		$data = $stmt->fetch(PDO::FETCH_OBJ); //User data
		return $data;*/

		$dbh = new Conexao(); 
		$sql = "SELECT email,username,name FROM users WHERE uid=".$uid;
		$rs = $dbh->query( $sql );
		$usuario = $rs->fetchAll( PDO::FETCH_CLASS, 'Usuario' );
		return $usuario;
	}
}

?>