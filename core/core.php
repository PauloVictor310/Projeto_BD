<?php

Class Core
{

	public function __construct()
	{
		$this->run();
	}


	public function run()
	{
		$parametros = array();
		if (isset( $_GET['pag'])) 
		{
			$url = $_GET['pag'];
			echo $url;

		}

		//Possui informação após o dominio 
		if (empty($url)) 
		{
			$controller = 'homeController';
			$metodo = 'index';
		}else //site.com
		{
			$url = explode('/', $url);
			$controller = $url[0].'Controller';
			array_shift($url);
			//Se o user mandou função
			if (isset($url[0]) && !empty($url[0])) 
			{
				$metodo=$url[0];
				array_shift($url);
			}else //enviou somente a classe
			{
				$metodo = 'index';
			}


			if (count($url > 0)) 
			{
				$parametros = $url;
			}

		}
		$caminho = 'Projeto_BD/Controllers/'.$controller.'.php';
		if (!file_exists($caminho) && !method_exists($controller, $metodo))
		{
			$controller = 'homeController';
			$metodo = 'index';
		}
		$a = new $controller;
		call_user_func_array(array($a, $metodo), $parametros);
	}

}

?>