<div class="panel panel-default" style="margin-top: -20px">
  <div class="panel-heading">Técnicos Desempregados</div>
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
          <th>Data da Demissão</th>
        </tr>

        <?php if(!empty($_POST['desempregados']))
              foreach ($_POST['desempregados'] as $d) { ?>
          <tr>
		    <td><?=$d['id']; ?></td>
            <td><?=$d['nome']; ?></td>
            <td><?=$d['data_demissao']; ?></td>
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