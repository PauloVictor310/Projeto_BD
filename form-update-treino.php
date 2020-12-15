<?php
	session_start();
	include_once("conexao.php");
	$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
	$result_usuario = "SELECT * FROM Treino WHERE id='$id'";
	$resultado_usuario = pg_query($con, $result_usuario);
	$row_usuario = pg_fetch_assoc($resultado_usuario);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Formulário de Update de Treino</title>
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
    <form method="POST" action="update-treino.php" style="padding:30px;background-color: #eeffee;">

		<input type="hidden" name="id" value="<?php echo $row_usuario['id']?>">
    
    <div class="col-md-12">
		<div class="form-group">
			<label for="local">Local:</label>
			<input type="text" class="form-control" name="local" id="local" value="<?php echo $row_usuario['local']?>" required>
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			<label for="data">Data:</label>
			<input type="date" class="form-control" name="data" id="data" value="<?php echo $row_usuario['data']?>" required>
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			<label for="hora">Hora:</label>
			<input type="time" class="form-control" name="hora" id="hora" value="<?php echo $row_usuario['hora']?>">
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			<label for="id_tecnico">Tecnico:</label>
			
			<?php
			
			$con = pg_connect("host=localhost dbname=GTI_Final user=postgres password=12345")
			or die ("Não foi possível se conectar ao servidor postgresql".pg_last_error());

			$result = pg_query($con, "select id, nome_completo from tecnico order by nome_completo asc");

			echo "<select name='id_tecnico' class='form-control' id='id_tecnico' required>";
			echo "<option>---Selecione---</option>";

			while ($row = pg_fetch_row($result)) {

				unset($id, $nome_completo);
				$id = $row[0];
				$nome_completo = $row[1]; 
				echo '<option value="'.$id.'">'.$nome_completo.'</option>';

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