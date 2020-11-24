<div class="wrap">
	<h1>Crud de contatos do meu plugin</h1>
	<br><br>

	<?php 

		

		if (count($contatos) > 0) {

			echo "<table border='1'><tr><td>Nome</td><td>Whatsapp</td></tr>";

			foreach ($contatos as $contato) {
				echo "<tr><td>{$contato->nome}</td><td>{$contato->whatsapp}</td></tr>";
			}

			echo "</table>";
		}
		
	?>

	<form method="post">
		
		<label for="nome">Nome: </label>
		<input type="text" id="nome" name="nome" value=""><br><br>

		<label for="whatsapp">Whatsapp: </label>
		<input type="text" id="whatsapp" name="whatsapp" value=""><br><br>

		
		<?php submit_button('Gravar Novo'); ?>
	</form>

</div>