<?php
	session_start();
	include_once("conexao.php");
	$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
	$result_usuario = "SELECT * FROM Time WHERE id='$id'";
	$resultado_usuario = pg_query($con, $result_usuario);
	$row_usuario = pg_fetch_assoc($resultado_usuario);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Formulário de Update de Time</title>
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
    <form method="POST" action="update-time.php" style="padding:30px;background-color: #eeffee;">

		<input type="hidden" name="id" value="<?php echo $row_usuario['id']?>">
    
    <div class="col-md-12">
		<div class="form-group">
			<label for="nome">Nome:</label>
			<input type="text" class="form-control" name="nome" id="nome" value="<?php echo $row_usuario['nome']?>" required>
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			<label for="cidade">Cidade:</label>
			<input type="text" class="form-control" name="cidade" id="cidade" value="<?php echo $row_usuario['cidade']?>" required>
		</div>
	</div>
    <div class="col-md-12">
		<div class="form-group">
			<label for="estado">Estado:</label>
			<select name="estado" class="form-control" id="estado" required>
				<option>---Selecione---</option>
				<option value="AC">AC</option>
				<option value="AL">AL</option>
				<option value="AP">AP</option>
				<option value="AM">AM</option>
				<option value="BA">BA</option>
				<option value="CE">CE</option>
				<option value="DF">DF</option>
				<option value="ES">ES</option>
				<option value="GO">GO</option>
				<option value="MA">MA</option>
				<option value="MT">MT</option>
				<option value="MS">MS</option>
				<option value="MG">MG</option>
				<option value="PA">PA</option>
				<option value="PB">PB</option>
				<option value="PR">PR</option>
				<option value="PE">PE</option>
				<option value="PI">PI</option>
				<option value="RJ">RJ</option>
				<option value="RN">RN</option>
				<option value="RS">RS</option>
				<option value="RO">RO</option>
				<option value="RR">RR</option>
				<option value="SC">SC</option>
				<option value="SP">SP</option>
				<option value="SE">SE</option>
				<option value="TO">TO</option>
				<option value="--">Outro ou Não Possui</option>
			</select>
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			<label for="pais">País:</label>
			<input type="text" class="form-control" name="pais" id="pais" value="<?php echo $row_usuario['pais']?>" required>
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			<label for="data_criacao">Data de Criação:</label>
			<input type="date" class="form-control" name="data_criacao" id="data_criacao" value="<?php echo $row_usuario['data_criacao']?>" required>
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			<label for="esporte">Esporte:</label>
			<input type="text" class="form-control" name="esporte" id="esporte" value="<?php echo $row_usuario['esporte']?>" required>
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			<label for="modalidade">Modalidade:</label>
			<input type="text" class="form-control" name="modalidade" id="modalidade" value="<?php echo $row_usuario['modalidade']?>" required>
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			<label for="caixa">Dinheiro em Caixa Atual:</label>
			<input type="text" class="form-control" name="caixa" id="caixa" value="<?php echo $row_usuario['caixa']?>" required>
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