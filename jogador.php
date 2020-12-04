<?php
	include ("conexao.php");

	$nome_completo = $_POST['nome_completo'];
	$sexo = $_POST['sexo'];
	$data_nascimento = $_POST['data_nascimento'];
	$posicao = $_POST['posicao'];
	$numero_camisa = $_POST['numero_camisa'];
	$permissao = $_POST['permissao'];
	$login = $_POST['login'];
	$senha = $_POST['senha'];
	$id_time = $_POST['id_time'];
	
	pg_query($con, "insert into jogador(nome_completo, sexo, data_nascimento, posicao, numero_camisa, permissao, login, senha, id_time)
		values('$nome_completo', '$sexo', '$data_nascimento', '$posicao', '$numero_camisa', '$permissao', '$login', '$senha', '$id_time')");
	
	header('location: insert_jogador.php');
?>