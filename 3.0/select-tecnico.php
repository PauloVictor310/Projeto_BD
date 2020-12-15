<?php
	include ("conexao.php");
	$nome_completo = $_POST['nome_completo'];
	$sexo = $_POST['sexo'];
	$id_time = $_POST['id_time'];
	
	$result = pg_query($con, "select * from tecnico where nome_completo like '%$nome_completo%' and sexo like '%$sexo%'
		and id_time = '$id_time' order by nome_completo");
	while($row = pg_fetch_row($result))
	{
		$id = $row[0];
		$nome_completo = $row[1];
		$sexo = $row[2];
		$data_nascimento = $row[3];
		$permissao = $row[4];
		$login = $row[5];
		$id_time = $row[7];
		
		echo "Id: $id<br>";
		echo "Nome: $nome_completo<br>";
		echo "Sexo: $sexo<br>";
		echo "Data de Nascimento: $data_nascimento<br>";
		echo "Permissão: $permissao<br>";
		echo "Login: $login<br>";
		echo "Time: $id_time<hr>";
		
	}

?>