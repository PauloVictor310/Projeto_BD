<?php

	session_start();
	include_once ("conexao.php");
	
	$id_frequencia = filter_input(INPUT_POST, 'id_frequencia', FILTER_SANITIZE_NUMBER_INT);
	$id_treino = filter_input(INPUT_POST, 'id_treino', FILTER_SANITIZE_STRING);
	$id_jogador = filter_input(INPUT_POST, 'id_jogador', FILTER_SANITIZE_STRING);
	$presenca = filter_input(INPUT_POST, 'presenca', FILTER_SANITIZE_STRING);
	
	$result_usuario = "UPDATE Frequencia set id_treino = '$id_treino', id_jogador = '$id_jogador',
		presenca = '$presenca' where id_frequencia = '$id_frequencia'";
	$result_usuario = pg_query($con, $result_usuario);
	
	if(pg_affected_rows($con)){
		$_SESSION['msg'] = "<p style='color:green;'>Frequência editada com sucesso";
		header('location: home.php');
	}else{
		$_SESSION['msg'] = "<p style='color:red;'>Erro: A frequência não foi editada com sucesso";
		header('location: home.php');
	}
	
?>