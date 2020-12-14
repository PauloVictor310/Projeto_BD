<?php
	include ("conexao.php");
	$nome = $_POST['nome'];
	$sexo = $_POST['sexo'];
	$id_time = $_POST['id_time'];
	
	$result = pg_query($con, "select * from tecnico where nome like '%$nome%' and sexo like '%$sexo%'
		and id_time = '$id_time' order by nome");
	while($row = pg_fetch_row($result))
	{
		$id = $row[0];
		$nome = $row[1];
		$sexo = $row[2];
		$data_nascimento = $row[3];
		$permissao = $row[4];
		$login = $row[5];
		$id_time = $row[7];
		
		echo "Id: $id<br>";
		echo "Nome: $nome<br>";
		echo "Sexo: $sexo<br>";
		echo "Data de Nascimento: $data_nascimento<br>";
		echo "Permissão: $permissao<br>";
		echo "Login: $login<br>";
		echo "Time: $id_time<hr>";
		
	}

?>