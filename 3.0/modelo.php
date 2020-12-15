<?php
require_once 'db-config.php';

class Modelo{

	private $servername;
	private $usuario;
	private $password;
	private $database;
	private $con;

	public function __construct(){
		global $servername;
		global $usuario;
		global $password;
		global $database;
		$this->servername = $servername;
		$this->usuario = $usuario;
		$this->password = $password;
		$this->database = $database;
		
	}

	public function conectar(){
		try{
			$this->con = new PDO("pgsql:host=$this->servername;dbname=$this->database;",
			$this->usuario, $this->password);
			$this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch(PDOException $e){
			echo $e->getMessage();
			return false;
		}
		return true;
	}
	
	public function verificarLoginJogador($login, $senha){
		$user = null;
		try{
			if($this->conectar()){
				$sql = "SELECT * FROM Jogador
					WHERE login=? and senha=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bindParam(1, $login, PDO::PARAM_STR);
				$stmt->bindParam(2, $senha, PDO::PARAM_STR);
				// PARAM_STR, PARAM_INT, PARAM_*type
				if($stmt->execute()){
					$user = array();
					while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
						$user['id'] = $row['id'];
						$user['nome_completo'] = $row['nome_completo'];
						$user['sexo'] = $row['sexo'];
						$user['data_nascimento'] = $row['data_nascimento'];
						$user['posicao'] = $row['posicao'];
						$user['numero_camisa'] = $row['numero_camisa'];
						$user['permissao'] = $row['permissao'];
						$user['login'] = $row['login'];
						$user['senha'] = $row['senha'];
						$user['id_time'] = $row['id_time'];
					}
				}
			}
		}catch(PDOException $e){
			print $e->getMessage();
		}
		$stmt = null;
		return $user;
	}
	
	public function verificarLoginTecnico($login, $senha){
		$user = null;
		try{
			if($this->conectar()){
				$sql = "SELECT * FROM Tecnico
					WHERE login=? and senha=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bindParam(1, $login, PDO::PARAM_STR);
				$stmt->bindParam(2, $senha, PDO::PARAM_STR);
				// PARAM_STR, PARAM_INT, PARAM_*type
				if($stmt->execute()){
					$user = array();
					while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
						$user['id'] = $row['id'];
						$user['nome_completo'] = $row['nome_completo'];
						$user['sexo'] = $row['sexo'];
						$user['data_nascimento'] = $row['data_nascimento'];
						$user['permissao'] = $row['permissao'];
						$user['login'] = $row['login'];
						$user['senha'] = $row['senha'];
						$user['id_time'] = $row['id_time'];
					}
				}
			}
		}catch(PDOException $e){
			print $e->getMessage();
		}
		$stmt = null;
		return $user;
	}
	
	public function addEquipamento($nome_equipamento, $descricao, $quantidade, $id_time){
		$id = 0;
		try{
			if($this->conectar()){
				$sql = "INSERT INTO Equipamento(nome_equipamento, descricao, quantidade, id_time) 
					VALUES(?, ?, ?, ?)";

				$stmt = $this->con->prepare($sql);
				$stmt->bindParam(1, $nome_equipamento, PDO::PARAM_STR);
				$stmt->bindParam(2, $descricao, PDO::PARAM_STR);
				$stmt->bindParam(3, $quantidade, PDO::PARAM_STR);
				$stmt->bindParam(4, $id_time, PDO::PARAM_STR);
				// PARAM_STR, PARAM_INT, PARAM_*type
				if($stmt->execute())
					$id =  $this->con->lastInsertId();
			}
		}catch(PDOException $e){
			print $e->getMessage();
		}
		$stmt = null;
		return $id;
	}
	
	public function addJogador($nome_completo, $sexo, $data_nascimento, $posicao, $numero_camisa, $permissao, $login, $senha, $id_time){
		$id = 0;
		try{
			if($this->conectar()){
				$sql = "INSERT INTO Jogador(nome_completo, sexo, data_nascimento, posicao, numero_camisa, permissao, login, senha, id_time) 
					VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";

				$stmt = $this->con->prepare($sql);
				$stmt->bindParam(1, $nome_completo, PDO::PARAM_STR);
				$stmt->bindParam(2, $sexo, PDO::PARAM_STR);
				$stmt->bindParam(3, $data_nascimento, PDO::PARAM_STR);
				$stmt->bindParam(4, $posicao, PDO::PARAM_STR);
				$stmt->bindParam(5, $numero_camisa, PDO::PARAM_STR);
				$stmt->bindParam(6, $permissao, PDO::PARAM_STR);
				$stmt->bindParam(7, $login, PDO::PARAM_STR);
				$stmt->bindParam(8, $senha, PDO::PARAM_STR);
				$stmt->bindParam(9, $id_time, PDO::PARAM_STR);
				// PARAM_STR, PARAM_INT, PARAM_*type
				if($stmt->execute())
					$id =  $this->con->lastInsertId();
			}
		}catch(PDOException $e){
			print $e->getMessage();
		}
		$stmt = null;
		return $id;
	}
	
	public function addPagamento($id_jogador, $id_mensalidade, $situacao){
		$id = 0;
		try{
			if($this->conectar()){
				$sql = "INSERT INTO Pagamento(id_jogador, id_mensalidade, situacao) 
					VALUES(?, ?, ?)";

				$stmt = $this->con->prepare($sql);
				$stmt->bindParam(1, $id_jogador, PDO::PARAM_STR);
				$stmt->bindParam(2, $id_mensalidade, PDO::PARAM_STR);
				$stmt->bindParam(3, $situacao, PDO::PARAM_STR);
				// PARAM_STR, PARAM_INT, PARAM_*type
				if($stmt->execute())
					$id =  $this->con->lastInsertId();
			}
		}catch(PDOException $e){
			print $e->getMessage();
		}
		$stmt = null;
		return $id;
	}
	
	public function addMensalidade($valor, $data_vencimento){
		$id = 0;
		try{
			if($this->conectar()){
				$sql = "INSERT INTO Mensalidade(valor, data_vencimento) 
					VALUES(?, ?)";

				$stmt = $this->con->prepare($sql);
				$stmt->bindParam(1, $valor, PDO::PARAM_STR);
				$stmt->bindParam(2, $data_vencimento, PDO::PARAM_STR);
				// PARAM_STR, PARAM_INT, PARAM_*type
				if($stmt->execute())
					$id =  $this->con->lastInsertId();
			}
		}catch(PDOException $e){
			print $e->getMessage();
		}
		$stmt = null;
		return $id;
	}
	
	public function addTecnico($nome_completo, $sexo, $data_nascimento, $permissao, $login, $senha, $id_time){
		$id = 0;
		try{
			if($this->conectar()){
				$sql = "INSERT INTO Tecnico(nome_completo, sexo, data_nascimento, permissao, login, senha, id_time) 
					VALUES(?, ?, ?, ?, ?, ?, ?)";

				$stmt = $this->con->prepare($sql);
				$stmt->bindParam(1, $nome_completo, PDO::PARAM_STR);
				$stmt->bindParam(2, $sexo, PDO::PARAM_STR);
				$stmt->bindParam(3, $data_nascimento, PDO::PARAM_STR);
				$stmt->bindParam(4, $permissao, PDO::PARAM_STR);
				$stmt->bindParam(5, $login, PDO::PARAM_STR);
				$stmt->bindParam(6, $senha, PDO::PARAM_STR);
				$stmt->bindParam(7, $id_time, PDO::PARAM_STR);
				// PARAM_STR, PARAM_INT, PARAM_*type
				if($stmt->execute())
					$id =  $this->con->lastInsertId();
			}
		}catch(PDOException $e){
			print $e->getMessage();
		}
		$stmt = null;
		return $id;
	}
	
	public function addTime($nome, $cidade, $estado, $pais, $data_criacao, $esporte, $modalidade, $caixa){
		$id = 0;
		try{
			if($this->conectar()){
				$sql = "INSERT INTO Time(nome, cidade, estado, pais, data_criacao, esporte, modalidade, caixa) 
					VALUES(?, ?, ?, ?, ?, ?, ?, ?)";

				$stmt = $this->con->prepare($sql);
				$stmt->bindParam(1, $nome, PDO::PARAM_STR);
				$stmt->bindParam(2, $cidade, PDO::PARAM_STR);
				$stmt->bindParam(3, $estado, PDO::PARAM_STR);
				$stmt->bindParam(4, $pais, PDO::PARAM_STR);
				$stmt->bindParam(5, $data_criacao, PDO::PARAM_STR);
				$stmt->bindParam(6, $esporte, PDO::PARAM_STR);
				$stmt->bindParam(7, $modalidade, PDO::PARAM_STR);
				$stmt->bindParam(8, $caixa, PDO::PARAM_STR);
				// PARAM_STR, PARAM_INT, PARAM_*type
				if($stmt->execute())
					$id =  $this->con->lastInsertId();
			}
		}catch(PDOException $e){
			print $e->getMessage();
		}
		$stmt = null;
		return $id;
	}
	
	public function addTreino($local, $data, $hora, $id_tecnico){
		$id = 0;
		try{
			if($this->conectar()){
				$sql = "INSERT INTO Treino(local, data, hora, id_tecnico) 
					VALUES(?, ?, ?, ?)";

				$stmt = $this->con->prepare($sql);
				$stmt->bindParam(1, $local, PDO::PARAM_STR);
				$stmt->bindParam(2, $data, PDO::PARAM_STR);
				$stmt->bindParam(3, $hora, PDO::PARAM_STR);
				$stmt->bindParam(4, $id_tecnico, PDO::PARAM_STR);
				// PARAM_STR, PARAM_INT, PARAM_*type
				if($stmt->execute())
					$id =  $this->con->lastInsertId();
			}
		}catch(PDOException $e){
			print $e->getMessage();
		}
		$stmt = null;
		return $id;
	}
	
	public function addFrequencia($id_treino, $id_jogador, $presenca){
		$id = 0;
		try{
			if($this->conectar()){
				$sql = "INSERT INTO Frequencia(id_treino, id_jogador, presenca) 
					VALUES(?, ?, ?)";

				$stmt = $this->con->prepare($sql);
				$stmt->bindParam(1, $id_treino, PDO::PARAM_STR);
				$stmt->bindParam(2, $id_jogador, PDO::PARAM_STR);
				$stmt->bindParam(3, $presenca, PDO::PARAM_STR);
				// PARAM_STR, PARAM_INT, PARAM_*type
				if($stmt->execute())
					$id =  $this->con->lastInsertId();
			}
		}catch(PDOException $e){
			print $e->getMessage();
		}
		$stmt = null;
		return $id;
	}
	
	public function listarEquipamento(){
		$equipamentos = null;
		try{
			if($this->conectar()){
				$sql = "SELECT E.id, E.nome_equipamento, E.descricao, E.quantidade, T.nome
						FROM Equipamento AS E
						INNER JOIN Time AS T
						ON E.id_time=T.id order by E.id";
				$stmt = $this->con->prepare($sql);
				// PARAM_STR, PARAM_INT, PARAM_*type
				if($stmt->execute()){
					$equipamentos = $stmt->fetchAll();
				}
			}
		}catch(PDOException $e){
			print $e->getMessage();
		}
		$stmt = null;
		return $equipamentos;
	}
	
	public function listarJogador(){
		$jogadores = null;
		try{
			if($this->conectar()){
				$sql = "SELECT J.id, J.nome_completo, J.sexo, J.data_nascimento, J.posicao,
						J.numero_camisa, J.permissao, J.login, J.senha, T.nome
						FROM Jogador AS J
						INNER JOIN Time AS T
						ON J.id_time=T.id order by J.nome_completo";
				$stmt = $this->con->prepare($sql);
				// PARAM_STR, PARAM_INT, PARAM_*type
				if($stmt->execute()){
					$jogadores = $stmt->fetchAll();
				}
			}
		}catch(PDOException $e){
			print $e->getMessage();
		}
		$stmt = null;
		return $jogadores;
	}
	
	public function listarPagamento(){
		$pagamentos = null;
		try{
			if($this->conectar()){
				$sql = "SELECT P.id_pagamento, P.id_mensalidade, P.situacao, J.nome_completo
						FROM Pagamento AS P
						INNER JOIN Jogador AS J
						ON P.id_jogador=J.id order by id_pagamento";
				$stmt = $this->con->prepare($sql);
				// PARAM_STR, PARAM_INT, PARAM_*type
				if($stmt->execute()){
					$pagamentos = $stmt->fetchAll();
				}
			}
		}catch(PDOException $e){
			print $e->getMessage();
		}
		$stmt = null;
		return $pagamentos;
	}
	
	public function listarMensalidade(){
		$mensalidades = null;
		try{
			if($this->conectar()){
				$sql = "SELECT * FROM Mensalidade order by id";
				$stmt = $this->con->prepare($sql);
				// PARAM_STR, PARAM_INT, PARAM_*type
				if($stmt->execute()){
					$mensalidades = $stmt->fetchAll();
				}
			}
		}catch(PDOException $e){
			print $e->getMessage();
		}
		$stmt = null;
		return $mensalidades;
	}
	
	public function listarTecnico(){
		$tecnicos = null;
		try{
			if($this->conectar()){
				$sql = "SELECT T.id, T.nome_completo, T.sexo, T.data_nascimento, T.permissao, T.login, T.senha, Ti.nome
						FROM Tecnico AS T
						INNER JOIN Time AS Ti
						ON T.id_time=Ti.id order by T.nome_completo";
				$stmt = $this->con->prepare($sql);
				// PARAM_STR, PARAM_INT, PARAM_*type
				if($stmt->execute()){
					$tecnicos = $stmt->fetchAll();
				}
			}
		}catch(PDOException $e){
			print $e->getMessage();
		}
		$stmt = null;
		return $tecnicos;
	}
	
	public function listarTime(){
		$times = null;
		try{
			if($this->conectar()){
				$sql = "SELECT * FROM Time order by nome";
				$stmt = $this->con->prepare($sql);
				// PARAM_STR, PARAM_INT, PARAM_*type
				if($stmt->execute()){
					$times = $stmt->fetchAll();
				}
			}
		}catch(PDOException $e){
			print $e->getMessage();
		}
		$stmt = null;
		return $times;
	}
	
	public function listarTreino(){
		$treinos = null;
		try{
			if($this->conectar()){
				$sql = "SELECT T.id, T.local, T.data, T.hora, Te.nome_completo
						FROM Treino AS T
						INNER JOIN Tecnico AS Te
						ON T.id_tecnico=Te.id order by T.id";
				$stmt = $this->con->prepare($sql);
				// PARAM_STR, PARAM_INT, PARAM_*type
				if($stmt->execute()){
					$treinos = $stmt->fetchAll();
				}
			}
		}catch(PDOException $e){
			print $e->getMessage();
		}
		$stmt = null;
		return $treinos;
	}
	
	public function listarFrequencia(){
		$frequencias = null;
		try{
			if($this->conectar()){
				$sql = "SELECT F.id_frequencia, F.id_treino, F.presenca, J.nome_completo
						FROM Frequencia AS F
						INNER JOIN Jogador AS J
						ON F.id_jogador=J.id order by id_frequencia";
				$stmt = $this->con->prepare($sql);
				// PARAM_STR, PARAM_INT, PARAM_*type
				if($stmt->execute()){
					$frequencias = $stmt->fetchAll();
				}
			}
		}catch(PDOException $e){
			print $e->getMessage();
		}
		$stmt = null;
		return $frequencias;
	}
	
	public function listarLog(){
		$logs = null;
		try{
			if($this->conectar()){
				$sql = "SELECT * FROM log_sistema";
				$stmt = $this->con->prepare($sql);
				// PARAM_STR, PARAM_INT, PARAM_*type
				if($stmt->execute()){
					$logs = $stmt->fetchAll();
				}
			}
		}catch(PDOException $e){
			print $e->getMessage();
		}
		$stmt = null;
		return $logs;
	}
	
	public function listarDesempregado(){
		$desempregados = null;
		try{
			if($this->conectar()){
				$sql = "SELECT * FROM tecnicos_desempregados";
				$stmt = $this->con->prepare($sql);
				// PARAM_STR, PARAM_INT, PARAM_*type
				if($stmt->execute()){
					$desempregados = $stmt->fetchAll();
				}
			}
		}catch(PDOException $e){
			print $e->getMessage();
		}
		$stmt = null;
		return $desempregados;
	}
}

?>