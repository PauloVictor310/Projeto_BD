<?php

	session_start();
	include_once ("conexao.php");
	
	$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
	$local = filter_input(INPUT_POST, 'local', FILTER_SANITIZE_STRING);
	$data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);
	$hora = filter_input(INPUT_POST, 'hora', FILTER_SANITIZE_STRING);
	$id_tecnico = filter_input(INPUT_POST, 'id_tecnico', FILTER_SANITIZE_STRING);
	
	$result_usuario = "UPDATE treino set local = '$local', data = '$data', 
	hora = '$hora', id_tecnico = '$id_tecnico' where id = '$id'";
	$result_usuario = pg_query($con, $result_usuario);
	
	if(pg_affected_rows($con)){
		$_SESSION['msg'] = "<p style='color:green;'>Treino editado com sucesso";
		header('location: home.php');
	}else{
		$_SESSION['msg'] = "<p style='color:red;'>Erro: O treino não foi editado com sucesso";
		header('location: home.php');
	}
	
?>