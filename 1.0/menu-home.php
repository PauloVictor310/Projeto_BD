<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-left">
		<li><a>Olá, <?=$_SESSION['user']['nome']; ?>!</a></li>
        <li><a href="?acao=listar"><span class="active glyphicon glyphicon-list-alt"></span> Listar</a></li>
        <li><a href="?acao=cadastrar"><span class="glyphicon glyphicon-plus-sign"></span> Cadastrar</a></li>
        <li><a href="?acao=editar"><span class=" glyphicon glyphicon-edit"></span> Editar</a></li>
        <li><a href="?acao=excluir"><span class="glyphicon glyphicon-minus-sign"></span> Excluir</a></li>
        <li><a href="?acao=pesquisar"><span class=" glyphicon glyphicon-search"></span> Pesquisar</a></li>
		<li><a href="logout.php">Sair</a></li>
      </ul>
    </div>
  </div>
</nav>