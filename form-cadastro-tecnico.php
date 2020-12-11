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
    <form method="POST" action="cadastro-tecnico.php" style="padding:30px;background-color: #eeffee;">
    <div class="col-md-12">
		<div class="form-group">
			<label for="nome">Nome Completo:</label>
			<input type="text" class="form-control" name="nome" id="nome" required>
		</div>
	</div>
    <div class="col-md-12">
		<div class="form-group">
			<label for="sexo">Sexo:</label>
			<select name="sexo" class="form-control" id="sexo" required>
				<option>-----</option>
				<option value="feminino">Feminino</option>
				<option value="masculino">Masculino</option>
			</select>
		</div>
	</div>
    <div class="col-md-12">
		<div class="form-group">
			<label for="data_nascimento">Data de Nascimento:</label>
			<input type="date" class="form-control" name="data_nascimento" id="data_nascimento" required>
		</div>
	</div>
    <div class="col-md-12">
		<div class="form-group">
			<label for="permissao">Permissão:</label>
			<select name="permissao" class="form-control" id="permissao" required>
				<option>-----</option>
				<option value="0">0 - Técnico</option>
				<option value="1">1 - Jogador</option>
			</select>
		</div>
	</div>
    <div class="col-md-12">
		<div class="form-group">
			<label for="login">Nome de Usuário:</label>
			<input type="text" class="form-control" name="login" id="login" required>
		</div>
	</div>
    <div class="col-md-12">
		<div class="form-group">
			<label for="senha">Senha:</label>
			<input type="password" class="form-control" name="senha" id="senha" required>
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			<label for="time">Time:</label>
			
			<?php
			
			$con = pg_connect("host=localhost dbname=GTI_Final user=postgres password=12345")
			or die ("Não foi possível se conectar ao servidor postgresql".pg_last_error());

			$result = pg_query($con, "select id, nome from time order by nome asc");

			echo "<select name='time' class='form-control' id='time' required>";
			echo "<option>-----</option>";

			while ($row = pg_fetch_row($result)) {

				unset($id, $nome);
				$id = $row[0];
				$nome = $row[1]; 
				echo '<option value="'.$id.'">'.$nome.'</option>';

			}
			
			echo "</select>";

			?>
			</select>
		</div>
	</div>
    <div class="text-center">
		<button type="submit" class="btn btn-success">Cadastrar</button>
    </div>
	</form>
	</div>
	<div class="col-md-2"></div>
</div>
<br/>