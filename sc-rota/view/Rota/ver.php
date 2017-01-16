<div class="container-fluid">
    <div class="row" style="margin-top:40px;">
        <?php
            $c = 1;
            foreach($rota as $l){
                if ($c == 1) {
                    echo '<h4 class="center" style="margin-bottom:50px; text-transform: capitalize; font-size:25px;">'. $l->nome . '</h4>';
                }
        ?>
        <div class="col s4"><?php echo $l->local; ?></div>        

        <?php
            $c++;
            }//fim for
        ?>
    </div>
</div>