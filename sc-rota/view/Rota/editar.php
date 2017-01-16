<div class="container">
    <div class="row" style="margin-top:35px;">
        <h2 class="center" style="font-size:24px; text-transform: uppercase;">Atualização do Local</h2>
    </div>
    <div class="row" style="margin-top:35px;">
        <form method="post">
            <?php
                foreach($verLocal as $l){
            ?>
            <div class="row" style="margin-top:40px;">
            
                <div class="input-field col s3">
                    <input placeholder="Digite o Nome do Local" value="<?php echo $l->nome; ?>" id="nome" name="nome" type="text" required>
                    <label for="nome">Nome</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="Digite um pouco sobre o local" value="<?php echo $l->descricao; ?>" id="descricao" name="descricao" type="text" required>
                    <label for="descricao">Descrição</label>
                </div>
                <div class="input-field col s3">
                    <select id="categoria" name="categoria" class="browser-default" required>
                        <option value="<?php echo $l->categoria; ?>" disabled selected><?php echo $l->categoria; ?></option>
                        <option id="Alimentacao">Alimentação</option>
                        <option id="Lazer">Lazer</option>
                        <option id="Hospedagem">Hospedagem</option>
                    </select>
                </div>
            </div>

            <div class="row" style="margin-top:40px;">
                <div class="input-field col s4">
                    <select id="cidade" name="cidade" class="browser-default" required>
                        <option value="" disabled selected><?php echo $l->cidade; ?></option>
                        <option id="Socorro">Socorro</option>
                        <option id="Holambra">Holambra</option>
                        <option id="Amparo">Amparo</option>
                        <option id="Serra Negra">Serra Negra</option>
                        <option id="Lindóia">Lindóia</option>
                        <option id="Águas de Lindóia">Águas de Lindóia</option>
                        <option id="Monte Alegre do Sul">Monte Alegre do Sul</option>
                        <option id="Jaguariúna">Jaguariúna</option>
                        <option id="Pedreira">Pedreira</option>
                    </select>
                </div>
                <div class="input-field col s1">
                    <input value="SP" id="uf"  value="<?php echo $l->uf; ?>" name="uf" type="text" required>
                    <label for="uf">Estado</label>
                </div>
                <div class="input-field col s2">
                    <input placeholder="CEP" id="cep"  value="<?php echo $l->cep; ?>" name="cep" type="number" required>
                    <label for="cep">CEP</label>
                </div>
                <div class="input-field col s5">
                    <input id="bairro" name="bairro"  value="<?php echo $l->bairro; ?>" type="text">
                    <label for="bairro">Bairro</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s10">
                    <input placeholder="Endereço" id="rua" value="<?php echo $l->rua; ?>" name="rua" type="text" required>
                    <label for="rua">Endereço</label>
                </div>
                <div class="input-field col s2">
                    <input placeholder="Número" id="num_end" value="<?php echo $l->num_end; ?>" name="num_end" type="text">
                    <label for="num_end">Número</label>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m6 l4 login-button">
                    <a class="btn waves-effect grey col s12" type="submit" href="index.php?c=Local&p=listar"> Voltar para Locais</a>
                </div>
                <div class="col s12 m6 l4 login-button right">
                    <input type="submit" class="btn waves-effect light-blue darken-2  col s12" value="Concluir Cadastro" />
                </div>
            </div>
            <?php
                 }//fim for
            ?>
        </form>
    </div>
</div>