<div class="panel panel-default" style="margin-top: -20px">
  <div class="panel-heading">Times</div>
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
		  <th>Cidade</th>
          <th>Estado</th>
		  <th>País</th>
          <th>Data de Criação</th>
		  <th>Esporte</th>
          <th>Modalidade</th>
          <th>Caixa</th>
		  <th>Ações</th>
        </tr>

        <?php if(!empty($_POST['times']))
              foreach ($_POST['times'] as $t) { ?>
          <tr>
            <td><?=$t['id']; ?></td>
            <td><?=$t['nome']; ?></td>
            <td><?=$t['cidade']; ?></td>
			<td><?=$t['estado']; ?></td>
            <td><?=$t['pais']; ?></td>
            <td><?=$t['data_criacao']; ?></td>
			<td><?=$t['esporte']; ?></td>
            <td><?=$t['modalidade']; ?></td>
            <td><?=$t['caixa']; ?></td>
			<div>
				<td>
					<a href="form-update-time.php?id=<?=$t['id']; ?>"><button type="submit" class="btn btn-info">Atualizar</button></a>
					<a href="delete-time.php?id=<?=$t['id']; ?>"><button type="submit" class="btn btn-danger">Excluir</button></a>
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