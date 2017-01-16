<div class="container-fluid">
    <div class="row" style="margin-top:40px;">
        <?php
            foreach($agencia as $l){
        ?>
        <h4 class="center"><?php echo $l->nome; ?></h4>

        <div class="container">
        <div class="row">
            <iframe
            width="100%"
            height="450"
            frameborder="0" style="border:0"
            src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCvLptUUleUij6Bu5wsUcgBN5punqYO1Wo
                &q=<?php echo $l->nome; ?>,<?php echo $l->rua; ?>,<?php echo $l->num_end; ?>,<?php echo $l->bairro; ?>,<?php echo $l->cep; ?>,<?php echo $l->cidade; ?>,<?php echo $l->uf; ?>" allowfullscreen>
            </iframe>
        </div>
            <a class="btn waves-effect grey right" type="submit" href="index.php?c=Agencia&p=listar"> Voltar para Agências</a>      
            <p><strong>Contato: </strong><?php echo $l->descricao; ?></p>
            <p><strong>Localização: </strong><?php echo $l->rua; ?>, <?php echo $l->num_end; ?>, <?php echo $l->bairro; ?>, <?php echo $l->cep; ?> - <?php echo $l->cidade; ?>, <?php echo $l->uf; ?></p>
        </div>
        <?php
            }//fim for
        ?>
    </div>
</div>