<?php

	session_start();
	include_once ("conexao.php");
	
	$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
	$nome_completo = filter_input(INPUT_POST, 'nome_completo', FILTER_SANITIZE_STRING);
	$sexo= filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);
	$data_nascimento = filter_input(INPUT_POST, 'data_nascimento', FILTER_SANITIZE_STRING);
	$posicao = filter_input(INPUT_POST, 'posicao', FILTER_SANITIZE_STRING);
	$numero_camisa = filter_input(INPUT_POST, 'numero_camisa', FILTER_SANITIZE_STRING);
	$permissao = filter_input(INPUT_POST, 'permissao', FILTER_SANITIZE_STRING);
	$login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
	$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
	$id_time = filter_input(INPUT_POST, 'id_time', FILTER_SANITIZE_STRING);
	
	$result_usuario = "UPDATE jogador set nome_completo = '$nome_completo', sexo = '$sexo', 
	data_nascimento = '$data_nascimento', posicao = '$posicao', numero_camisa = '$numero_camisa',
	permissao = '$permissao', login = '$login', senha = '$senha', id_time = '$id_time' where id = '$id'";
	$result_usuario = pg_query($con, $result_usuario);
	
	if(pg_affected_rows($con)){
		$_SESSION['msg'] = "<p style='color:green;'>Jogador editado com sucesso";
		header('location: home.php');
	}else{
		$_SESSION['msg'] = "<p style='color:red;'>Erro: O jogador não foi editado com sucesso";
		header('location: home.php');
	}
	
?>