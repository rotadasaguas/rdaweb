<div class="container-fluid">
	<div class="row" style="margin-top:50px;">
		<h2 class="title-cadastro">Etapa 2 - Adicione marcadores ao local</h2>
	</div>
    <form method="post">
	<div class="row">
        <div class="input-field col s8">
            <select id="local" name="local" class="browser-default">
                <?php
                foreach($locais as $l){
                    echo '<option value="'.$l->id.'">';
                    echo $l->nome;
                    echo '</option>';
                }
                ?>		
            </select>
        </div>
    </div>
    <div class="row" style="margin-top:50px;">
		<h2 class="title-cadastro" style="text-align:left; margin-left:20px; font-size: 18px;">Marcadores:</h2>
	</div>
    <div class="row">
        <div class="input-field col s3">
            <select id="tag1" name="tag1"  class="browser-default" required>
               <option value="" disabled selected>Selecione a Tag</option>
            <?php
            foreach($tags as $t){
                echo '<option value="'.$t->id.'">';
                echo $t->nome;
                echo '</option>';
            }
            ?>		
            </select>
        </div>

        <div class="input-field col s3">
            <select id="tag2" name="tag2"  class="browser-default" required>
                <option value="" disabled selected>Selecione a Tag</option>
            <?php
            foreach($tags as $t){
                echo '<option value="'.$t->id.'">';
                echo $t->nome;
                echo '</option>';
            }
            ?>		
            </select>
        </div>

        <div class="input-field col s3">
            <select id="tag3" name="tag3"  class="browser-default" required>
                <option value="" disabled selected>Selecione a Tag</option>
            <?php
            foreach($tags as $t){
                echo '<option value="'.$t->id.'">';
                echo $t->nome;
                echo '</option>';
            }
            ?>		
            </select>
        </div>

        <div class="input-field col s3">
            <select id="tag4" name="tag4" class="browser-default" required>
                <option value="" disabled selected>Selecione a Tag</option>
            <?php
            foreach($tags as $t){
                echo '<option for="tag4" value="'.$t->id.'">';
                echo $t->nome;
                echo '</option>';
            }
            ?>		
            </select>
        </div>
	</div>
        <div class="row" style="margin-top:50px;">
				<div class="col s12 m6 l2 login-button right">
					<input type="submit" class="btn waves-effect light-blue darken-2  col s12" value="Concluir Cadastro">
				</div>
			</div>
    </form>
</div>
