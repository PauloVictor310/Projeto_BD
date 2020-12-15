<?php

	session_start();
	include_once ("conexao.php");
	
	$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
	$nome_equipamento = filter_input(INPUT_POST, 'nome_equipamento', FILTER_SANITIZE_STRING);
	$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
	$quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_STRING);
	$id_time = filter_input(INPUT_POST, 'id_time', FILTER_SANITIZE_STRING);
	
	$result_usuario = "UPDATE equipamento set nome_equipamento = '$nome_equipamento', descricao = '$descricao', 
	quantidade = '$quantidade', id_time = '$id_time' where id = '$id'";
	$result_usuario = pg_query($con, $result_usuario);
	
	if(pg_affected_rows($con)){
		$_SESSION['msg'] = "<p style='color:green;'>Time editado com sucesso";
		header('location: home.php');
	}else{
		$_SESSION['msg'] = "<p style='color:red;'>Erro: O time não foi editado com sucesso";
		header('location: home.php');
	}
	
?>