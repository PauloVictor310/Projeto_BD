<?php

	$con = pg_connect("host=localhost dbname=GTI_Final user=postgres password=12345")
	or die ("Não foi possível se conectar ao servidor postgresql".pg_last_error());
	
	#echo "Conexão efetuada com sucesso";
	
	#$result = pg_query($con, "select * from jogador");
	
	#while($row = pg_fetch_row($result))
	#{
	#	echo "<br>" .
	#	"Nome: " .$row[1] . ", Sexo: " .$row[2] . ", Data de Nascimento: " .$row[3];
	#}
	
	#pg_query($con, "insert into jogador values (
	#	11, 'Guilherme', 'Masculino', '2000/06/08', 'Blitz', 11, 1, 1);
	#");
	
	#pg_query($con, 
	#"update jogador set nome_completo = 'Guilherme Augusto'
	#	where id = 11;"
	#);
	
	#@pg_close($con);
?>