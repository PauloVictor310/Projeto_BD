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
		
		public function cadastrarEquipamento(){
			$msg = null;
			if($_SERVER['REQUEST_METHOD']=='POST'){
				if(isset($_POST['nome']) && isset($_POST['descricao']) && isset($_POST['quantidade'])
				&& isset($_POST['id_time'])){
					// cadastro
					$ret = $this->modelo->addEquipamento(
						$_POST['nome'], $_POST['descricao'],$_POST['quantidade'],
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
				if(isset($_POST['nome']) && isset($_POST['sexo']) && isset($_POST['data_nascimento'])
				&& isset($_POST['posicao']) && isset($_POST['numero_camisa']) && isset($_POST['permissao'])
				&& isset($_POST['login']) && isset($_POST['senha']) && isset($_POST['id_time'])){
					// cadastro
					$ret = $this->modelo->addJogador(
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
		
		public function cadastrarMensalidade(){
			$msg = null;
			if($_SERVER['REQUEST_METHOD']=='POST'){
				if(isset($_POST['valor']) && isset($_POST['data_vencimento'])){
					// cadastro
					$ret = $this->modelo->addMensalidade(
						$_POST['valor'], $_POST['data_vencimento']);
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
				if(isset($_POST['nome']) && isset($_POST['sexo']) && isset($_POST['data_nascimento'])
				&& isset($_POST['permissao']) && isset($_POST['login']) && isset($_POST['senha']) 
				&& isset($_POST['id_time'])){
					// cadastro
					$ret = $this->modelo->addTecnico(
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
		
		public function cadastrarTime(){
			$msg = null;
			if($_SERVER['REQUEST_METHOD']=='POST'){
				if(isset($_POST['nome']) && isset($_POST['cidade']) && isset($_POST['estado'])
				&& isset($_POST['pais']) && isset($_POST['data_criacao']) && isset($_POST['esporte'])
				&& isset($_POST['modalidade']) && isset($_POST['caixa'])){
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
		
		public function cadastrarTreino(){
			$msg = null;
			if($_SERVER['REQUEST_METHOD']=='POST'){
				if(isset($_POST['local']) && isset($_POST['data']) && isset($_POST['hora'])
				&& isset($_POST['id_tecnico'])){
					// cadastro
					$ret = $this->modelo->addTreino(
						$_POST['local'], $_POST['data'],$_POST['hora'],
						$_POST['id_tecnico']);
					if($ret > 0){
						// cadastrado com sucesso!
						$_POST['msg'] = [];
						$_POST['msg']['tipo'] = 'success';
						$_POST['msg']['texto'] = 'Treino agendado com sucesso!';
					}else{
						// erro ao cadastrar
						$_POST['msg'] = [];
						$_POST['msg']['tipo'] = 'danger';
						$_POST['msg']['texto'] = 'Erro ao agendar treino!';
					}
				}else{
					// error
					$_POST['msg'] = [];
					$_POST['msg']['tipo'] = 'danger';
					$_POST['msg']['texto'] = 'Preencha todos os campos!';
				}
			}
		}
		
		public function listarEquipamento(){
			$equipamentos= $this->modelo->listarEquipamento($_SESSION['user']['nome']);
			if(isset($equipamentos) && !empty($equipamentos)){
				$_POST['equipamentos'] = $equipamentos;
			}else{
				$_POST['msg'] = [];
				$_POST['msg']['tipo'] = 'info';
				$_POST['msg']['texto'] = 'Nenhum equipamento encontrado.';
			}
		}
		
		public function listarJogador(){
			$jogadores = $this->modelo->listarJogador($_SESSION['user']['nome']);
			if(isset($jogadores) && !empty($jogadores)){
				$_POST['jogadores'] = $jogadores;
			}else{
				$_POST['msg'] = [];
				$_POST['msg']['tipo'] = 'info';
				$_POST['msg']['texto'] = 'Nenhum jogador encontrado.';
			}
		}
		
		public function listarMensalidade(){
			$mensalidades = $this->modelo->listarMensalidade($_SESSION['user']['nome']);
			if(isset($mensalidades) && !empty($mensalidades)){
				$_POST['mensalidades'] = $mensalidades;
			}else{
				$_POST['msg'] = [];
				$_POST['msg']['tipo'] = 'info';
				$_POST['msg']['texto'] = 'Nenhuma mensalidade encontrada.';
			}
		}
		
		public function listarTecnico(){
			$tecnicos = $this->modelo->listarTecnico($_SESSION['user']['nome']);
			if(isset($tecnicos) && !empty($tecnicos)){
				$_POST['tecnicos'] = $tecnicos;
			}else{
				$_POST['msg'] = [];
				$_POST['msg']['tipo'] = 'info';
				$_POST['msg']['texto'] = 'Nenhum técnico encontrado.';
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
		
		public function listarTreino(){
			$treinos = $this->modelo->listarTreino($_SESSION['user']['nome']);
			if(isset($treinos) && !empty($treinos)){
				$_POST['treinos'] = $treinos;
			}else{
				$_POST['msg'] = [];
				$_POST['msg']['tipo'] = 'info';
				$_POST['msg']['texto'] = 'Nenhum treino agendado.';
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