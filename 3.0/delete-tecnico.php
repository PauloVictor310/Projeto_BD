<?php

	session_start();
	include_once ("conexao.php");
	
	$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
	if(!empty($id)){
			
		$result_usuario = "delete from Tecnico where id='$id'";
		$resultado_usuario = pg_query($con, $result_usuario);
		
		if(pg_affected_rows($con)){
			$_SESSION['msg'] = "<p style='color:green;'>Técnico apagado com sucesso";
			header('location: home.php');
		}else{
			$_SESSION['msg'] = "<p style='color:red;'>Erro: O técnico não foi apagado com sucesso";
			header('location: home.php');
		}
	}
	else{
			$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um técnico";
			header('location: home.php');
		}

?>