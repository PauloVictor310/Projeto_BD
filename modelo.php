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
	
	public function listarTime(){
		$times = null;
		try{
			if($this->conectar()){
				$sql = "SELECT * FROM Time";
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

	public function addContato($id_agenda, $nome, $email, $ddd, $telefone){
		$id = 0;
		try{
			if($this->conectar()){
				$sql = "INSERT INTO Contato(nome, email, DDD, num_telefone, Agenda_codigo) 
					VALUES(?, ?, ?, ?, ?)";

				$stmt = $this->con->prepare($sql);
				$stmt->bindParam(1, $nome, PDO::PARAM_STR);
				$stmt->bindParam(2, $email, PDO::PARAM_STR);
				$stmt->bindParam(3, $ddd, PDO::PARAM_STR);
				$stmt->bindParam(4, $telefone, PDO::PARAM_STR);
				$stmt->bindParam(5, $id_agenda, PDO::PARAM_INT);
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

	public function listarContatos($id_agenda){
		$contatos = null;
		try{
			if($this->conectar()){
				$sql = "SELECT * FROM Contato
					WHERE Agenda_codigo=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bindParam(1, $id_agenda, PDO::PARAM_INT);
				// PARAM_STR, PARAM_INT, PARAM_*type
				if($stmt->execute()){
					$contatos = $stmt->fetchAll();
				}
			}
		}catch(PDOException $e){
			print $e->getMessage();
		}
		$stmt = null;
		return $contatos;
	}
}

?>