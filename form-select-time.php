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
    <form method="POST" action="select-time.php" style="padding:30px;background-color: #eeffee;">

		<input type="text" name="acao" value="pesquisar-times" hidden="true">
    
    <div class="col-md-12">
		<div class="form-group">
			<label for="nome">Nome:</label>
			<input type="text" class="form-control" name="nome" id="nome">
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			<label for="cidade">Cidade:</label>
			<input type="text" class="form-control" name="cidade" id="cidade">
		</div>
	</div>
    <div class="col-md-12">
		<div class="form-group">
			<label for="estado">Estado:</label>
			<select name="estado" class="form-control" id="estado">
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
			<input type="text" class="form-control" name="pais" id="pais">
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			<label for="esporte">Esporte:</label>
			<input type="text" class="form-control" name="esporte" id="esporte">
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			<label for="modalidade">Modalidade:</label>
			<input type="text" class="form-control" name="modalidade" id="modalidade">
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
