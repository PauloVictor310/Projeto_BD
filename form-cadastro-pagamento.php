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

		<input type="text" name="acao" value="cadastrar-pagamentos" hidden="true">
    
	<div class="col-md-12">
		<div class="form-group">
			<label for="id_jogador">Jogador:</label>
			
			<?php
			
			$con = pg_connect("host=localhost dbname=GTI_Final user=postgres password=12345")
			or die ("Não foi possível se conectar ao servidor postgresql".pg_last_error());

			$result = pg_query($con, "select id, nome_completo from jogador order by nome_completo asc");

			echo "<select name='id_jogador' class='form-control' id='id_jogador' required>";
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
	<div class="col-md-12">
		<div class="form-group">
			<label for="id_mensalidade">Mensalidade:</label>
			
			<?php
			
			$con = pg_connect("host=localhost dbname=GTI_Final user=postgres password=12345")
			or die ("Não foi possível se conectar ao servidor postgresql".pg_last_error());

			$result = pg_query($con, "select id from mensalidade order by id asc");

			echo "<select name='id_mensalidade' class='form-control' id='id_mensalidade' required>";
			echo "<option>---Selecione---</option>";

			while ($row = pg_fetch_row($result)) {

				unset($id);
				$id = $row[0];
				echo '<option value="'.$id.'">'.$id.'</option>';

			}
			
			echo "</select>";

			?>
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			<label for="situacao">Situação:</label>
			<input type="text" class="form-control" name="situacao" id="situacao" required>
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
