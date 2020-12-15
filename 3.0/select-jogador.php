<?php
	include ("conexao.php");
	$nome_completo = $_POST['nome_completo'];
	$sexo = $_POST['sexo'];
	$posicao = $_POST['posicao'];
	$id_time = $_POST['id_time'];
	
	$result = pg_query($con, "select * from jogador where nome_completo like '%$nome_completo%' and sexo like '%$sexo%'
		and posicao like '%$posicao%' and id_time = '$id_time' order by nome_completo");
	while($row = pg_fetch_row($result))
	{
		$id = $row[0];
		$nome_completo = $row[1];
		$sexo = $row[2];
		$data_nascimento = $row[3];
		$posicao = $row[4];
		$numero_camisa = $row[5];
		$permissao = $row[6];
		$login = $row[7];
		$id_time = $row[9];
		
		echo "Id: $id<br>";
		echo "Nome: $nome_completo<br>";
		echo "Sexo: $sexo<br>";
		echo "Data de Nascimento: $data_nascimento<br>";
		echo "Posição: $posicao<br>";
		echo "Número da Camisa: $numero_camisa<br>";
		echo "Permissão: $permissao<br>";
		echo "Login: $login<br>";
		echo "Time: $id_time<br><hr>";
		
	}

?>