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

		<input type="text" name="acao" value="cadastrar-mensalidades" hidden="true">
    
    <div class="col-md-12">
		<div class="form-group">
			<label for="valor">Valor:</label>
			<input type="text" class="form-control" name="valor" id="valor" required>
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			<label for="data_vencimento">Data de Vencimento:</label>
			<input type="date" class="form-control" name="data_vencimento" id="data_vencimento" required>
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
