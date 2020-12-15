<div class="panel panel-default" style="margin-top: -20px">
  <div class="panel-heading">Frequências</div>
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
          <th>Treino</th>
          <th>Jogador</th>
		  <th>Presença</th>
		  <th>Ações</th>
        </tr>

        <?php if(!empty($_POST['frequencias']))
              foreach ($_POST['frequencias'] as $f) { ?>
          <tr>
		    <td><?=$f['id_frequencia']; ?></td>
            <td><?=$f['id_treino']; ?></td>
            <td><?=$f['nome_completo']; ?></td>
            <td><?=$f['presenca']; ?></td>
			<div>
				<td>
					<a href="form-update-frequencia.php?id=<?=$f['id_frequencia']; ?>"><button type="submit" class="btn btn-info">Atualizar</button></a>
					<a href="delete-frequencia.php?id=<?=$f['id_frequencia']; ?>"><button type="submit" class="btn btn-danger">Excluir</button></a>
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