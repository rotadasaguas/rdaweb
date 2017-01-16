<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Rota das Águas - SGRDA</title>

    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="template/css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="template/css/custom.css"  media="screen,projection"/>

    <script>
    function goBack() {
        window.history.back();
    }
    </script>
</head>

<body>
 	<header>
        <nav>
          <div class="nav-wrapper blue darken-1">
              <div class="container-fluid">
            <?php
                    if(empty($_SESSION['uid'])){
                        echo '<a href="index.php" class="center brand-logo">
                                <img class="logomarca" src="template/images/logo.png"/>
                              </a>';
                    }
                    else{
            ?>
            <a href="index.php" class="brand-logo">
            	<img class="logomarca" src="template/images/logo.png"/>
            </a>

            <ul class="right hide-on-med-and-down">
              <li><a href="index.php">Inicio</a></li>
              <li><a href="index.php?c=Agencia&p=listar">Agências</a></li>
              <li><a href="index.php?c=Rota&p=listar">Rotas</a></li>
              <li><a href="index.php?c=Local&p=listar">Locais</a></li>
              <li><a href="/rotadasaguas/ws-rota/">Web Service</a></li>
              <li><a class="btn waves-effect waves-light  blue darken-4" href="index.php?c=Usuario&p=logout">Sair</a></li>
            </ul>
            <?php } ?>
            </div>
          </div>
        </nav>
	</header>

    <?php
         require $view; 
    ?>


    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="template/js/materialize.min.js"></script>

    <script>
    $(document).ready(function() {
        $('select').material_select();
        $('.modal-trigger').leanModal();
    });
    </script>
    
</body>

</html>