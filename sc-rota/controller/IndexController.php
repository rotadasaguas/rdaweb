<?php
    class IndexController{
        public function inicio(){
            $usr = new Usuario();
            $session_uid = $_SESSION['uid'];

            $user = Usuario::userDetails($session_uid);

            $view = 'view/Index/inicio.php';
            require 'template/template.php';

            if(isset($_GET['m'])){
                $mensagem = $_GET['m'];

                if($mensagem == '1'){
                    echo "<script>
                        Materialize.toast('<span>Olá, ".$user[0]->name."', 3000);
                    </script>";
                }
            }
	    }
    }
?>