<?php
	include ("conexao.php");
	$nome = $_POST['nome'];
	$cidade = $_POST['cidade'];
	$estado = $_POST['estado'];
	$pais = $_POST['pais'];
	$esporte = $_POST['esporte'];
	$modalidade = $_POST['modalidade'];
	
	$result = pg_query($con, "select * from time where nome like '%$nome%' and cidade like '%$cidade%'
		and estado like '%$estado%' and pais like '%$pais%' and esporte like '%$esporte%' and modalidade like '%$modalidade%' order by nome");
	while($row = pg_fetch_row($result))
	{
		$id = $row[0];
		$nome = $row[1];
		$cidade = $row[2];
		$estado = $row[3];
		$pais = $row[4];
		$data_criacao = $row[5];
		$esporte = $row[6];
		$modalidade = $row[7];
		$caixa = $row[8];
		
		echo "Id: $id<br>";
		echo "Nome: $nome<br>";
		echo "Cidade: $cidade<br>";
		echo "Estado: $estado<br>";
		echo "País: $pais<br>";
		echo "Data da Criação: $data_criacao<br>";
		echo "Esporte: $esporte<br>";
		echo "Modalidade: $modalidade<br>";
		echo "Dinheiro em Caixa Atual: $caixa<br><hr>";
		
	}

?>