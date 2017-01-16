<div class="container-fluid">

    <div class="row" style="margin-top:40px;">
        <div>
            <div class="left" style="font-size:20px; text-transform: uppercase;">
                <strong >Locais Cadastrados</strong>
            </div>
            <div class="right">
                <a class="waves-effect waves-light cyan btn" href="index.php?c=Tag&p=listar" style="margin-right:20px;">Marcadores</a>
                <a class="waves-effect waves-light green btn" href="index.php?c=Local&p=cadastrar">Novo Local</a>
            </div>
            <div class="clear"></div>
        </div>  

        <table class="striped" style="margin-top:20px;">
            <thead>
            <tr>
                <th data-field="nome">Nome</th>
                <th data-field="cidade">Cidade</th>
                <th></th>
                <th></th>
            </tr>
            </thead>

            <tbody>
            <?php
            foreach($locais as $l){
            ?>
            <tr>
                <td width="50%"><?php echo $l->nome; ?></td>
                <td width="27%"><?php echo $l->cidade; ?></td>
                <td width="5%"><a class="btn waves-effect grey darken-1 col s12" href="index.php?c=Local&p=ver&id=<?php echo $l->id; ?>" ><i class="material-icons ">visibility</i></a></td>
                <td width="5%"><a class="btn waves-effect light-blue darken-2 col s12" href="index.php?c=Local&p=editar&id=<?php echo $l->id; ?>" ><i class="material-icons ">edit</i></a></td>
                <td width="5%"><a class="btn waves-effect modal-trigger red darken-2 col s12" href="#modal<?php echo $l->id; ?>" ><i class="material-icons ">delete</i></a></td>
            </tr>

            <!-- Modal Structure -->
            <div id="modal<?php echo $l->id; ?>" class="modal">
                <div class="modal-content">
                    <h5 class="center">Confirmar apagar?</h5>
                    <p class="center">Tem certeza que deseja apagar o local: <?php echo $l->nome; ?></p>
                </div>
                <div class="modal-footer">
                    <a href="index.php?c=Local&p=apagar&id=<?php echo $l->id; ?>" class=" modal-action waves-effect white-text red waves-green btn-flat">Sim</a>
                    <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Não</a>
                </div>
            </div>
            <?php
                }//fim for
            ?>
            </tbody>
      </table>
      
        
    </div>
</div>