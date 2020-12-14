<?php

	$con = pg_connect("host=localhost dbname=GTI_Final user=postgres password=12345")
	or die ("Não foi possível se conectar ao servidor postgresql".pg_last_error());
	
?>