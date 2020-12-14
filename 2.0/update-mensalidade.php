<?php

	session_start();
	include_once ("conexao.php");
	
	$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
	$valor = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_STRING);
	$data_vencimento = filter_input(INPUT_POST, 'data_vencimento', FILTER_SANITIZE_STRING);
	
	$result_usuario = "UPDATE mensalidade set valor = '$valor', data_vencimento = '$data_vencimento' where id = '$id'";
	$result_usuario = pg_query($con, $result_usuario);
	
	if(pg_affected_rows($con)){
		$_SESSION['msg'] = "<p style='color:green;'>Mensalidade editada com sucesso";
		header('location: home.php');
	}else{
		$_SESSION['msg'] = "<p style='color:red;'>Erro: A mensalidade não foi editada com sucesso";
		header('location: home.php');
	}
	
?>