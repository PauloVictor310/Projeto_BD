<?php
	session_start();
	include_once("conexao.php");
	$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
	$result_usuario = "SELECT * FROM Tecnico WHERE id='$id'";
	$resultado_usuario = pg_query($con, $result_usuario);
	$row_usuario = pg_fetch_assoc($resultado_usuario);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Formulário de Update de Técnico</title>
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
	</head>
	<body>
		<?php require 'menu.php'; ?>
		<div class="container">
  <div class="col-md-2"></div>
  <div class="col-md-8 col-sm-12">
    <!-- BEGIN: Mensagem de erro -->
      <?php if(isset($_POST['msg'])){ ?>
      <div class="alert alert-<?=$_POST['msg']['tipo']; ?>" role="alert">
        <?=$_POST['msg']['texto']; ?>
      </div>
      <?php } ?>
      <!-- END: Mensagem de erro -->
    <form method="POST" action="update-tecnico.php" style="padding:30px;background-color: #eeffee;">
	
		<input type="hidden" name="id" value="<?php echo $row_usuario['id']?>">
	
    <div class="col-md-12">
		<div class="form-group">
			<label for="nome_completo">Nome Completo:</label>
			<input type="text" class="form-control" name="nome_completo" id="nome_completo" value="<?php echo $row_usuario['nome_completo']?>" required>
		</div>
	</div>
    <div class="col-md-12">
		<div class="form-group">
			<label for="sexo">Sexo:</label>
			<select name="sexo" class="form-control" id="sexo" required>
				<option>---Selecione---</option>
				<option value="Feminino">Feminino</option>
				<option value="Masculino">Masculino</option>
			</select>
		</div>
	</div>
    <div class="col-md-12">
		<div class="form-group">
			<label for="data_nascimento">Data de Nascimento:</label>
			<input type="date" class="form-control" name="data_nascimento" id="data_nascimento" value="<?php echo $row_usuario['data_nascimento']?>" required>
		</div>
	</div>
    <div class="col-md-12">
		<div class="form-group">
			<label for="permissao">Permissão:</label>
			<select name="permissao" class="form-control" id="permissao" required>
				<option>---Selecione---</option>
				<option value="0">0 - Técnico</option>
				<option value="1">1 - Jogador</option>
			</select>
		</div>
	</div>
    <div class="col-md-12">
		<div class="form-group">
			<label for="login">Nome de Usuário:</label>
			<input type="text" class="form-control" name="login" id="login" value="<?php echo $row_usuario['login']?>" required>
		</div>
	</div>
    <div class="col-md-12">
		<div class="form-group">
			<label for="senha">Senha:</label>
			<input type="password" class="form-control" name="senha" id="senha" value="<?php echo $row_usuario['senha']?>" required>
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			<label for="id_time">Time:</label>
			
			<?php
			
			$con = pg_connect("host=localhost dbname=GTI_Final user=postgres password=12345")
			or die ("Não foi possível se conectar ao servidor postgresql".pg_last_error());

			$result = pg_query($con, "select id, nome from time order by nome asc");

			echo "<select name='id_time' class='form-control' id='id_time' required>";
			echo "<option>---Selecione---</option>";

			while ($row = pg_fetch_row($result)) {

				unset($id, $nome);
				$id = $row[0];
				$nome = $row[1]; 
				echo '<option value="'.$id.'">'.$nome.'</option>';

			}
			
			echo "</select>";

			?>
		</div>
	</div>
    <div class="text-center">
		<button type="submit" class="btn btn-success">Editar</button>
    </div>
	</form>
  </div>
  <div class="col-md-2"></div>
</div>
<br/>
	<?php include 'footer.php'; ?>
	</body>
</html>