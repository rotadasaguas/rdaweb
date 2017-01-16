<div class="container-fluid">

    <div class="row" style="margin-top:40px;">
        <div class="center" style="font-size:26px; text-transform: uppercase;">
            <strong >Selecione os locais da Rota</strong>
        </div>
    </div>

    <div class="container">
        <form method="post">
            <div class="row">
                <div class="center" style="margin-top:40px;"><strong>Marque os locais que fazem parte da rota</strong></div>
                
                <div style="background:#f7f7f7; padding:15px; margin-top:30px;">
                    <?php
                        foreach($locais as $l){
                            echo '<input type="checkbox" class="filled-in" name="local[]"  id="'.$l->id.'" value="'.$l->id.'"/>';
                            echo '<label for="'.$l->id.'">'.$l->nome.'</label>';
                            echo '</br>';
                            echo '</br>';
                        }
                    ?>
                </div>
            </div>
            <div class="row" style="margin-top:40px;">
                <div class="col s12 m6 l4 login-button">
                    <a class="btn waves-effect grey col s12" onclick="goBack();"> Voltar Etapa</a>
                </div>
                <div class="col s12 m6 l4 login-button right">
                    <input type="submit" class="btn waves-effect light-blue darken-2  col s12" value="Concluir Cadastro" />
                </div>
            </div>
        </form>        
    </div>
</div>