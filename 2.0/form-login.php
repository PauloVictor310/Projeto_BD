<div class="container text-center">
	<div class="col-md-4"></div>
	<div class="col-md-4 col-sm-12">
		<!-- BEGIN: Mensagem de erro -->
		<?php if(isset($_POST['msg'])){ ?>
		<div class="alert alert-<?=$_POST['msg']['tipo']; ?>" role="alert">
			<?=$_POST['msg']['texto']; ?>
		</div>
		<?php } ?>
		<!-- END: Mensagem de erro -->
		<form method="POST" action="" style="padding:30px;background-color: #eeffee;">
		  <div class="form-group">
		    <label for="login">Login:</label>
		    <input type="login" class="form-control" name="login" id="login" required>
		  </div>
		  <div class="form-group">
		    <label for="senha">Senha:</label>
		    <input type="password" class="form-control" name="senha" id="senha" required>
		  </div>
		  <button type="submit" class="btn btn-success">Entrar</button>
		</form>
	</div>
	<div class="col-md-4"></div>
</div>
<br/>