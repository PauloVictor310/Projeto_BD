<?php

Class Core()
{

	public function __construct()
	{
		$this->run();
	}


	public function run()
	{
		if (isset($_GET['pag'])) 
		{
			$url = $_GET['pag'];
		}

		//Possui informação após o dominio 
		if (!empty($url)) 
		{
			$url = explode('/', $url);
			$controller = $url[0].'Controller';
			array_shift($url);

			if (isset($url[0]) && !empty($url)) 
			{
				$metodo=$url;
				array_shift($url);
			}else
			{
				$metodo='index';
			}


			if (count($url > 0)) 
			{
				$parametros = $url;
			}
		}else
		{
			$controller = 'homeController';
			$metodo = 'index';
		}
		$caminho = 'Projeto_BD/controller/'.$controller.'.php'
		if (!file_exists($caminho) && !method_exists($controller, $metodo) 
		{
			$controller = 'homeController';
			$metodo = 'index';
		}
		$c = new $controller;
		call_user_func_array(array($c, $metodo), $parametros);
	}

}

