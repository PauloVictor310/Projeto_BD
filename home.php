<?php
session_start();
require_once 'controle.php';
$control = new Controle();
$control->checkLogin();

$acao = null;
$conteudo = null;

if($_SERVER['REQUEST_METHOD'] == 'GET'){
	$acao = @$_GET['acao'];
	switch ($acao) {
		
		case 'cadastrar-equipamentos':
			$conteudo = 'form-cadastro-equipamento.php';
			break;
			
		case 'cadastrar-jogadores':
			$conteudo = 'form-cadastro-jogador.php';
			break;
			
		case 'cadastrar-mensalidades':
			$conteudo = 'form-cadastro-mensalidade.php';
			break;
			
		case 'cadastrar-tecnicos':
			$conteudo = 'form-cadastro-tecnico.php';
			break;
		
		case 'cadastrar-times':
			$conteudo = 'form-cadastro-time.php';
			break;
			
		case 'cadastrar-treinos':
			$conteudo = 'form-cadastro-treino.php';
			break;
			
		case 'listar-equipamentos':
			$conteudo = 'listar-equipamento.php';
			$control->listarEquipamento();
			break;
			
		case 'listar-jogadores':
			$conteudo = 'listar-jogador.php';
			$control->listarJogador();
			break;
			
		case 'listar-mensalidades':
			$conteudo = 'listar-mensalidade.php';
			$control->listarMensalidade();
			break;
			
		case 'listar-tecnicos':
			$conteudo = 'listar-tecnico.php';
			$control->listarTecnico();
			break;
			
		case 'listar-treinos':
			$conteudo = 'listar-treino.php';
			$control->listarTreino();
			break;
			
		case 'pesquisar-equipamentos':
			$conteudo = 'form-select-equipamento.php';
			break;

		case 'pesquisar-jogadores':
			$conteudo = 'form-select-jogador.php';
			break;
			
		case 'pesquisar-tecnicos':
			$conteudo = 'form-select-tecnico.php';
			break;
		
		case 'pesquisar-times':
			$conteudo = 'form-select-time.php';
			break;
			
		case 'pesquisar-treinos':
			$conteudo = 'form-select-treino.php';
			break;

		default:
			$conteudo = 'listar-time.php';
			$control->listarTime();
			break;
	}
}else if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$acao = @$_POST['acao'];
	switch ($acao) {
			
		case 'cadastrar-equipamentos':
			$control->cadastrarEquipamento();
			$conteudo = 'form-cadastro-equipamento.php';
			break;
			
		case 'cadastrar-jogadores':
			$control->cadastrarJogador();
			$conteudo = 'form-cadastro-jogador.php';
			break;
			
		case 'cadastrar-mensalidades':
			$control->cadastrarMensalidade();
			$conteudo = 'form-cadastro-mensalidade.php';
			break;
			
		case 'cadastrar-tecnicos':
			$control->cadastrarTecnico();
			$conteudo = 'form-cadastro-tecnico.php';
			break;
			
		case 'cadastrar-times':
			$control->cadastrarTime();
			$conteudo = 'form-cadastro-time.php';
			break;
			
		case 'cadastrar-treinos':
			$control->cadastrarTreino();
			$conteudo = 'form-cadastro-treino.php';
			break;
	}
}

?>
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="pt">
<head>
	<title>Gerenciamento de Times Independentes</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<!-- bootstrap-css -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<!--// css -->
	<!-- font-awesome icons -->
	<link href="css/font-awesome.css" rel="stylesheet"> 
	<!-- //font-awesome icons -->
	<!-- portfolio -->	

	<!-- //portfolio -->	
	<!-- font -->
	<link href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
	<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>
	<!-- //font -->
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<style type="text/css" media="screen">
		a.dis:hover{
			text-decoration: none;
			color: black;
		}
		.dis{
			color: #666;
			font-weight: bold;
			font-size: 50px;
			padding-bottom: 5px;
			border-bottom: solid 3px #80fc88;
		}	
	</style>
</head>
<body>
	<a class="dis" href="index.php"><h1 class="text-center dis">Gerenciamento de Times Independentes</h1></a>
	<?php require 'menu-home.php'; ?>
	<?php require $conteudo; ?>
	<?php include 'footer.php'; ?>
</body>	
</html>