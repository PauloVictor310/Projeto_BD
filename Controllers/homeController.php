<?php
	Class homeController extends Controller{
		
		public function index(){
			// 1- carregar model
			// 2- carregar view
			// 3- back + frontend


			$this->carregarTemplate('home');

		}
	}
?>