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
						$user['nome'] = $row['nome'];
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
						$user['nome'] = $row['nome'];
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
	
	public function addEquipamento($nome, $descricao, $quantidade, $id_time){
		$id = 0;
		try{
			if($this->conectar()){
				$sql = "INSERT INTO Equipamento(nome, descricao, quantidade, id_time) 
					VALUES(?, ?, ?, ?)";

				$stmt = $this->con->prepare($sql);
				$stmt->bindParam(1, $nome, PDO::PARAM_STR);
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
	
	public function addJogador($nome, $sexo, $data_nascimento, $posicao, $numero_camisa, $permissao, $login, $senha, $id_time){
		$id = 0;
		try{
			if($this->conectar()){
				$sql = "INSERT INTO Jogador(nome, sexo, data_nascimento, posicao, numero_camisa, permissao, login, senha, id_time) 
					VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";

				$stmt = $this->con->prepare($sql);
				$stmt->bindParam(1, $nome, PDO::PARAM_STR);
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
	
	public function addTecnico($nome, $sexo, $data_nascimento, $permissao, $login, $senha, $id_time){
		$id = 0;
		try{
			if($this->conectar()){
				$sql = "INSERT INTO Tecnico(nome, sexo, data_nascimento, permissao, login, senha, id_time) 
					VALUES(?, ?, ?, ?, ?, ?, ?)";

				$stmt = $this->con->prepare($sql);
				$stmt->bindParam(1, $nome, PDO::PARAM_STR);
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
	
	public function listarEquipamento(){
		$equipamentos = null;
		try{
			if($this->conectar()){
				$sql = "SELECT * FROM Equipamento order by id";
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
				$sql = "SELECT * FROM Jogador order by nome";
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
				$sql = "SELECT * FROM Tecnico order by nome";
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
				$sql = "SELECT * FROM Treino order by id";
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
}

?>