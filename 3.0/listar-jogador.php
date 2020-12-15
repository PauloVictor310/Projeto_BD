<div class="panel panel-default" style="margin-top: -20px">
  <div class="panel-heading">Jogadores</div>
  <div class="panel-body">
    <?php if(isset($_POST['msg'])){ ?>
      <div class="alert alert-<?=$_POST['msg']['tipo']; ?>" role="alert">
        <?=$_POST['msg']['texto']; ?>
      </div>
    <?php } ?>
    <div class="table-responsive">
      <table class="table table-striped">
        <tr>
          <th>Id</th>
          <th>Nome</th>
		  <th>Sexo</th>
          <th>Data de Nascimento</th>
		  <th>Posição</th>
          <th>Número da Camisa</th>
          <th>Login</th>
		  <th>Time</th>
		  <th>Ações</th>
        </tr>

        <?php if(!empty($_POST['jogadores']))
              foreach ($_POST['jogadores'] as $j) { ?>
          <tr>
            <td><?=$j['id']; ?></td>
            <td><?=$j['nome_completo']; ?></td>
            <td><?=$j['sexo']; ?></td>
			<td style="text-align: center"><?=$j['data_nascimento']; ?></td>
            <td><?=$j['posicao']; ?></td>
            <td style="text-align: center"><?=$j['numero_camisa']; ?></td>
            <td><?=$j['login']; ?></td>
			<td><?=$j['nome']; ?></td>
			<div>
				<td>
					<a href="form-update-jogador.php?id=<?=$j['id']; ?>"><button type="submit" class="btn btn-info">Atualizar</button></a>
					<a href="delete-jogador.php?id=<?=$j['id']; ?>"><button type="submit" class="btn btn-danger">Excluir</button></a>
				</td>
			</div>
          </tr>
        <?php } ?>
      </table>
    <center>
    <nav aria-label="...">
      <ul class="pagination">
        <li class=""><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
        <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
        <li class=""><a href="#">2</a></li>
        <li class=""><a href="#">3</a></li>
        <li class=""><a href="#">4</a></li>
        <li class=""><a href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
      </ul>
    </nav>
  </center>
    </div>
  </div>
</div>
</div>