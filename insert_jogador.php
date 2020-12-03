<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Formulário de Insert de Jogador</title>
	</head>
	<body>
		
		<form action="jogador.php" method="POST">
			<label for="nome_completo">Nome Completo:</label><br>
			<input type="text" name="nome_completo" placeholder="Digite o seu nome completo." size="25"><br><br>
			
			<label for="sexo">Sexo:</label><br>
			<select name="sexo">
				<option>---------</option>
				<option value="Masculino">Masculino</option>
				<option value="Feminino">Feminino</option>
			</select><br><br>
			
			<label for="data_nascimento">Data de Nascimento:</label><br>
			<input type="date" name="data_nascimento"><br><br>
			
			<label for="posicao">Posição:</label><br>
			<input type="text" name="posicao" placeholder="Digite o nome da sua posição." size="25"><br><br>
			
			<label for="numero_camisa">Número da Camisa:</label><br>
			<input type="number" name="numero_camisa"><br><br>
			
			<label for="permissao">Permissão: </label><br>
			<select name="permissao">
				<option>-----</option>
				<option value="0">0</option>
				<option value="1">1</option>
			</select><br><br>
			
			<label for="id_time">Número do Time:</label><br>
			<input type="number" name="id_time"><br><br>

			<input type="submit" value="Cadastrar">
		</form> 
		
	</body>
</html>