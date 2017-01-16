<div class="container">
    <div class="row" style="margin-top:35px;">        	
        <h2 class="center" style="font-size:24px;">Atualização da Tag</h2>
    </div>
    <div class="row" style="margin-top:35px;">
		<form method="post">
			<?php
                foreach($verTag as $t){
            ?>
			<div class="row" style="margin-top:40px; margin-bottom:10px;">
				<div style="width:300px; margin:0 auto;">
				<div class="input-field col s12">
					<input placeholder="Digite o Nome da Tag" value="<?php echo $t->nome; ?>" id="nome" name="nome" type="text" required>
					<label for="nome">Nome</label>
				</div>
				</div>
			</div>
			<div class="row">
				<div style="width:300px; margin:0 auto;">
				<div class="col s12 login-button right">
					<input type="submit" class="btn waves-effect light-blue darken-2  col s12" value="Salvar"/>
				</div>
				</div>
			</div>
			<?php } ?>
		</form>
	</div>
</div>

