<?php

	session_start();
	include_once ("conexao.php");
	
	$id_pagamento = filter_input(INPUT_POST, 'id_pagamento', FILTER_SANITIZE_NUMBER_INT);
	$id_jogador = filter_input(INPUT_POST, 'id_jogador', FILTER_SANITIZE_STRING);
	$id_mensalidade = filter_input(INPUT_POST, 'id_mensalidade', FILTER_SANITIZE_STRING);
	$situacao = filter_input(INPUT_POST, 'situacao', FILTER_SANITIZE_STRING);
	
	$result_usuario = "UPDATE Pagamento set id_jogador = '$id_jogador', id_mensalidade = '$id_mensalidade',
		situacao = '$situacao' where id_pagamento = '$id_pagamento'";
	$result_usuario = pg_query($con, $result_usuario);
	
	if(pg_affected_rows($con)){
		$_SESSION['msg'] = "<p style='color:green;'>Pagamento editado com sucesso";
		header('location: home.php');
	}else{
		$_SESSION['msg'] = "<p style='color:red;'>Erro: O pagamento não foi editado com sucesso";
		header('location: home.php');
	}
	
?>