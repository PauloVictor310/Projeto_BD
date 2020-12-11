<?php
	require_once 'modelo.php';
	
	class Controle{
		
		private $modelo;
		
		public function __construct(){
			$this->modelo = new Modelo();
		}
	
		public function loginJogador(){
			$msg = null;
			if($_SERVER['REQUEST_METHOD']=='POST'){
				if(isset($_POST['login']) && isset($_POST['senha'])){
					// verificar no modelo
					$ret = $this->modelo->verificarLoginJogador(
						$_POST['login'], $_POST['senha']);
					// var_dump($ret);
					if($ret != null){
						$_SESSION['user'] = $ret;
						header('Location: home.php');
					}else{
						// mensagem erro
						$_POST['msg'] = [];
						$_POST['msg']['tipo'] = 'danger';
						$_POST['msg']['texto'] = 'Login e/ou senha inválidos!';
					}
				}else{
					// mensagem erro
					$_POST['msg'] = [];
					$_POST['msg']['tipo'] = 'danger';
					$_POST['msg']['texto'] = 'Preencha todos os campos!';
				}
			}
		}
		
		public function loginTecnico(){
			$msg = null;
			if($_SERVER['REQUEST_METHOD']=='POST'){
				if(isset($_POST['login']) && isset($_POST['senha'])){
					// verificar no modelo
					$ret = $this->modelo->verificarLoginTecnico(
						$_POST['login'], $_POST['senha']);
					// var_dump($ret);
					if($ret != null){
						$_SESSION['user'] = $ret;
						header('Location: home.php');
					}else{
						// mensagem erro
						$_POST['msg'] = [];
						$_POST['msg']['tipo'] = 'danger';
						$_POST['msg']['texto'] = 'Login e/ou senha inválidos!';
					}
				}else{
					// mensagem erro
					$_POST['msg'] = [];
					$_POST['msg']['tipo'] = 'danger';
					$_POST['msg']['texto'] = 'Preencha todos os campos!';
				}
			}
		}
		
		public function cadastrarTime(){
			$msg = null;
			if($_SERVER['REQUEST_METHOD']=='POST'){
				if(isset($_POST['login']) && isset($_POST['senha'])){
					// cadastro
					$ret = $this->modelo->addTime(
						$_POST['nome'], $_POST['cidade'],$_POST['estado'],
						$_POST['pais'], $_POST['data_criacao'],$_POST['esporte'],
						$_POST['modalidade'], $_POST['caixa']);
					if($ret > 0){
						// cadastrado com sucesso!
						$_POST['msg'] = [];
						$_POST['msg']['tipo'] = 'success';
						$_POST['msg']['texto'] = 'Cadastrado com sucesso!';
					}else{
						// erro ao cadastrar
						$_POST['msg'] = [];
						$_POST['msg']['tipo'] = 'danger';
						$_POST['msg']['texto'] = 'Erro ao cadastrar!';
					}
				}else{
					// error
					$_POST['msg'] = [];
					$_POST['msg']['tipo'] = 'danger';
					$_POST['msg']['texto'] = 'Preencha todos os campos!';
				}
			}
		}
		
		public function cadastrarTecnico(){
			$msg = null;
			if($_SERVER['REQUEST_METHOD']=='POST'){
				if(isset($_POST['login']) && isset($_POST['senha'])){
					// cadastro
					$ret = $this->modelo->addTecnico(
						$_SESSION['user']['nome'],
						$_POST['nome'], $_POST['sexo'],$_POST['data_nascimento'],
						$_POST['permissao'], $_POST['login'],$_POST['senha'],
						$_POST['id_time']);
					if($ret > 0){
						// cadastrado com sucesso!
						$_POST['msg'] = [];
						$_POST['msg']['tipo'] = 'success';
						$_POST['msg']['texto'] = 'Cadastrado com sucesso!';
					}else{
						// erro ao cadastrar
						$_POST['msg'] = [];
						$_POST['msg']['tipo'] = 'danger';
						$_POST['msg']['texto'] = 'Erro ao cadastrar!';
					}
				}else{
					// error
					$_POST['msg'] = [];
					$_POST['msg']['tipo'] = 'danger';
					$_POST['msg']['texto'] = 'Preencha todos os campos!';
				}
			}
		}
		
		public function cadastrarJogador(){
			$msg = null;
			if($_SERVER['REQUEST_METHOD']=='POST'){
				if(isset($_POST['login']) && isset($_POST['senha'])){
					// cadastro
					$ret = $this->modelo->addJogador(
						$_SESSION['user']['nome'],
						$_POST['nome'], $_POST['sexo'],$_POST['data_nascimento'],
						$_POST['posicao'],$_POST['numero_camisa'], $_POST['permissao'],
						$_POST['login'],$_POST['senha'], $_POST['id_time']);
					if($ret > 0){
						// cadastrado com sucesso!
						$_POST['msg'] = [];
						$_POST['msg']['tipo'] = 'success';
						$_POST['msg']['texto'] = 'Cadastrado com sucesso!';
					}else{
						// erro ao cadastrar
						$_POST['msg'] = [];
						$_POST['msg']['tipo'] = 'danger';
						$_POST['msg']['texto'] = 'Erro ao cadastrar!';
					}
				}else{
					// error
					$_POST['msg'] = [];
					$_POST['msg']['tipo'] = 'danger';
					$_POST['msg']['texto'] = 'Preencha todos os campos!';
				}
			}
		}
		
		public function listarTime(){
			$times = $this->modelo->listarTime($_SESSION['user']['nome']);
			if(isset($times) && !empty($times)){
				$_POST['times'] = $times;
			}else{
				$_POST['msg'] = [];
				$_POST['msg']['tipo'] = 'info';
				$_POST['msg']['texto'] = 'Nenhum time encontrado.';
			}
		}

		public function cadastrarContato(){
			$msg = null;
			if($_SERVER['REQUEST_METHOD']=='POST'){
				if(isset($_POST['nome']) && isset($_POST['telefone'])){
					// cadastro
					$ret = $this->modelo->addContato(
						$_SESSION['user']['codigo'],
						$_POST['nome'], $_POST['email'],
						$_POST['ddd'], $_POST['telefone']);
					if($ret > 0){
						// cadastrado com sucesso!
						$_POST['msg'] = [];
						$_POST['msg']['tipo'] = 'success';
						$_POST['msg']['texto'] = 'Cadastrado com sucesso!';
					}else{
						// erro ao cadastrar
						$_POST['msg'] = [];
						$_POST['msg']['tipo'] = 'danger';
						$_POST['msg']['texto'] = 'Erro ao cadastrar!';
					}
				}else{
					// error
					$_POST['msg'] = [];
					$_POST['msg']['tipo'] = 'danger';
					$_POST['msg']['texto'] = 'Preencha todos os campos!';
				}
			}
		}

		public function listarContatos(){
			$contatos = $this->modelo->listarContatos($_SESSION['user']['codigo']);
			if(isset($contatos) && !empty($contatos)){
				$_POST['contatos'] = $contatos;
			}else{
				$_POST['msg'] = [];
				$_POST['msg']['tipo'] = 'info';
				$_POST['msg']['texto'] = 'Nenhum contato encontrado.';
			}
		}
		
		public function logout(){
			session_destroy();
			$_SESSION['user'] = null;
			header('Location: index.php');
		}
		
		public function checkLogin(){
			if(!isset($_SESSION['user'])){
				header('Location: login.php');
			}
		}
}

?>