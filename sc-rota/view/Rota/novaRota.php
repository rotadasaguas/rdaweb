<div class="container-fluid">

    <div class="row" style="margin-top:40px;">
        <div class="center" style="font-size:26px; text-transform: uppercase;">
            <strong >Configuração da Rota</strong>
        </div>
    </div>

    <div class="container">
        <form method="post">
            <div class="row">
                <div class="input-field col s6">
                    <select id="rota" name="rota" class="browser-default" required>
                        <option disabled selected>Selecione a Rota</option>
                        <?php
                        foreach($rotas as $r){
                            echo '<option value="'.$r->id.'">';
                            echo $r->nome;
                            echo '</option>';
                        }
                        ?>		
                    </select>
                </div>
                <div class="input-field col s6">
                    <select id="cidade" name="cidade" class="browser-default" required>
                        <option disabled selected>Selecione a Cidade</option>
                        <option value="Socorro">Socorro</option>
                        <option value="Lindóia">Lindóia</option>
                        <option value="Pedreira">Pedreira</option>
                        <option value="Holambra">Holambra</option>
                        <option value="Amparo">Amparo</option>
                        <option value="Serra Negra">Serra Negra</option>
                        <option value="Jaguariúna">Jaguariúna</option>
                        <option value="Águas de Lindóia">Águas de Lindóia</option>
                        <option value="Monte Alegre do Sul">Monte Alegre do Sul</option>     
                    </select>
                </div>
            </div>
            <div class="row" style="margin-top:40px;">
                <div class="col s12 m6 l4 login-button">
                    <a class="btn waves-effect grey col s12" type="submit" href="index.php?c=Rota&p=listar"> Voltar para Rotas</a>
                </div>
                <div class="col s12 m6 l4 login-button right">
                    <input type="submit" class="btn waves-effect light-blue darken-2  col s12" value="Próxima Etapa" />
                </div>
            </div>
        </form>        
    </div>
</div>