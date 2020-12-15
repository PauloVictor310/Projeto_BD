<?php
	include ("conexao.php");
	$nome_equipamento = $_POST['nome_equipamento'];
	$descricao = $_POST['descricao'];
	$id_time = $_POST['id_time'];
	
	$result = pg_query($con, "select * from equipamento where nome_equipamento like '%$nome_equipamento%' and descricao like '%$descricao%'
		and id_time = '$id_time' order by id");
	while($row = pg_fetch_row($result))
	{
		$id = $row[0];
		$nome_equipamento = $row[1];
		$descricao = $row[2];
		$quantidade = $row[3];
		$id_time = $row[4];
		
		echo "Id: $id<br>";
		echo "Nome: $nome_equipamento<br>";
		echo "Descrição: $descricao<br>";
		echo "Quantidade: $quantidade<br>";
		echo "Time: $id_time<br><hr>";
		
	}

?>