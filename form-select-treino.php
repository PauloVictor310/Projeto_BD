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
    <form method="POST" action="select-treino.php" style="padding:30px;background-color: #eeffee;">

		<input type="text" name="acao" value="pesquisar-treinos" hidden="true">
    
    <div class="col-md-12">
		<div class="form-group">
			<label for="local">Local:</label>
			<input type="text" class="form-control" name="local" id="local">
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			<label for="id_tecnico">Tecnico:</label>
			
			<?php
			
			$con = pg_connect("host=localhost dbname=GTI_Final user=postgres password=12345")
			or die ("Não foi possível se conectar ao servidor postgresql".pg_last_error());

			$result = pg_query($con, "select id, nome from tecnico order by nome asc");

			echo "<select name='id_tecnico' class='form-control' id='id_tecnico'>";
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
    <button type="submit" class="btn btn-success">Pesquisar</button>
    </div>
    </form>
  </div>
  <div class="col-md-2"></div>
</div>
<br/>
