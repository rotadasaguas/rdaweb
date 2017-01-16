<div class="container-fluid">
	<div class="row" style="margin-top:40px;">	
		<div>
            <div class="left" style="font-size:20px; text-transform: uppercase;">
                <strong >Lista de tags cadastradas</strong>
            </div>
            <div class="right">
                <a class="waves-effect waves-light green btn" href="index.php?c=Tag&p=cadastrar">Adicionar Nova</a>
            </div>
            <div class="clear"></div>
        </div> 
	</div>
	<div class="row">
		<table class="bordered">		
			<tr>	
				<th>Id</th>
				<th>Numero</th>
				<th></th> 	
			</tr>
		<?php
		foreach($tags as $t){
			echo '<tr>';
			echo '<td width="5%">'.$t->id.'</td>';
			echo '<td width="90%">';
			echo $t->nome;
			echo '</td>';
			/*echo '<td width="5%"><a class="btn waves-effect grey darken-1 col s12" href="index.php?c=Tag&p=ver&id='. $t->id.'" ><i class="material-icons ">visibility</i></a></td>';*/
            echo '<td width="5%"><a class="btn waves-effect light-blue darken-2 col s12" href="index.php?c=Tag&p=editar&id='. $t->id.'" ><i class="material-icons ">edit</i></a></td>';
           /* echo '<td width="5%"><a class="btn waves-effect modal-trigger red darken-2 col s12" href="#modal'. $t->id.'" ><i class="material-icons ">delete</i></a></td>';*/
			echo '</tr>';
		}
		?>		
		</table>
	</div>
</div>