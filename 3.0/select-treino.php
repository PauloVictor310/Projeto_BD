<?php
	include ("conexao.php");
	$local = $_POST['local'];
	$id_tecnico = $_POST['id_tecnico'];
	
	$result = pg_query($con, "select * from treino where local like '%$local%' and id_tecnico = '$id_tecnico' order by id");
	while($row = pg_fetch_row($result))
	{
		$id = $row[0];
		$local = $row[1];
		$data = $row[2];
		$hora = $row[3];
		$id_tecnico = $row[4];
		
		echo "Id: $id<br>";
		echo "Local: $local<br>";
		echo "Data: $data<br>";
		echo "Hora: $hora<br>";
		echo "Técnico: $id_tecnico<br><hr>";
		
	}

?>