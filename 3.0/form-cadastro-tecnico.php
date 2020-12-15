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
    <form method="POST" action="" style="padding:30px;background-color: #eeffee;">
	
		<input type="text" name="acao" value="cadastrar-tecnicos" hidden="true">
	
    <div class="col-md-12">
		<div class="form-group">
			<label for="nome_completo">Nome Completo:</label>
			<input type="text" class="form-control" name="nome_completo" id="nome_completo" required>
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
			<input type="date" class="form-control" name="data_nascimento" id="data_nascimento" required>
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
		<button type="submit" class="btn btn-success">Cadastrar</button>
    </div>
	</form>
	</div>
	<div class="col-md-2"></div>
</div>
<br/>