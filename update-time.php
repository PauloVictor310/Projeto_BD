<?php

	session_start();
	include_once ("conexao.php");
	
	$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
	$estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
	$pais = filter_input(INPUT_POST, 'pais', FILTER_SANITIZE_STRING);
	$data_criacao = filter_input(INPUT_POST, 'data_criacao', FILTER_SANITIZE_STRING);
	$esporte = filter_input(INPUT_POST, 'esporte', FILTER_SANITIZE_STRING);
	$modalidade = filter_input(INPUT_POST, 'modalidade', FILTER_SANITIZE_STRING);
	$caixa = filter_input(INPUT_POST, 'caixa', FILTER_SANITIZE_STRING);
	
	$result_usuario = "UPDATE time set nome = '$nome', cidade = '$cidade', 
	estado = '$estado', pais = '$pais', data_criacao = '$data_criacao',
	esporte = '$esporte', modalidade = '$modalidade', caixa = '$caixa' where id = '$id'";
	$result_usuario = pg_query($con, $result_usuario);
	
	if(pg_affected_rows($con)){
		$_SESSION['msg'] = "<p style='color:green;'>Time editado com sucesso";
		header('location: home.php');
	}else{
		$_SESSION['msg'] = "<p style='color:red;'>Erro: O time não foi editado com sucesso";
		header('location: home.php');
	}
	
?>