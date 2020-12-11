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
		case 'cadastrar':
			$conteudo = 'form-time.php';
			break;

		default:
			$conteudo = 'listar.php';
			$control->listarTime();
			break;
	}
}else if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$acao = @$_POST['acao'];
	switch ($acao) {
		case 'cadastrar':
			$control->cadastrarTime();
			$conteudo = 'form-time.php';
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