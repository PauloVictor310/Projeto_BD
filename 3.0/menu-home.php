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
		<li><a>Olá, <?=$_SESSION['user']['nome_completo']; ?>!</a></li>
		<li><a href="home.php">Home</a></li>
        <li><select onchange="location=this.value">
			<option>Equipamentos</option>
			<option value="?acao=listar-equipamentos">Listar</option>
			<option value="?acao=cadastrar-equipamentos">Cadastrar</option>
			<option value="?acao=pesquisar-equipamentos">Pesquisar</option>
			<option value="?acao=listar-logs">Logs</option>
		</select></li>
		<li><select onchange="location=this.value">
			<option>Jogadores</option>
			<option value="?acao=listar-jogadores">Listar</option>
			<option value="?acao=cadastrar-jogadores">Cadastrar</option>
			<option value="?acao=pesquisar-jogadores">Pesquisar</option>
		</select></li>
		<li><select onchange="location=this.value">
			<option>Mensalidades</option>
			<option value="?acao=listar-mensalidades">Listar</option>
			<option value="?acao=cadastrar-mensalidades">Cadastrar</option>
			<option value="?acao=listar-pagamentos">Listar Pagamentos</option>
			<option value="?acao=cadastrar-pagamentos">Cadastrar Pagamentos</option>
		</select></li>
		<li><select onchange="location=this.value">
			<option>Técnicos</option>
			<option value="?acao=listar-tecnicos">Listar</option>
			<option value="?acao=cadastrar-tecnicos">Cadastrar</option>
			<option value="?acao=pesquisar-tecnicos">Pesquisar</option>
			<option value="?acao=listar-desempregados">Desempregados</option>
		</select></li>
		<li><select onchange="location=this.value">
			<option>Times</option>
			<option value="?acao=listar-times">Listar</option>
			<option value="?acao=cadastrar-times">Cadastrar</option>
			<option value="?acao=pesquisar-times">Pesquisar</option>
		</select></li>
		<li><select onchange="location=this.value">
			<option>Treinos</option>
			<option value="?acao=listar-treinos">Listar</option>
			<option value="?acao=cadastrar-treinos">Cadastrar</option>
			<option value="?acao=pesquisar-treinos">Pesquisar</option>
			<option value="?acao=listar-frequencias">Listar Frequências</option>
			<option value="?acao=cadastrar-frequencias">Cadastrar Frequências</option>
		</select></li>
		<li><a href="gerar-pdf.php">Gerar Relatório de Times</a></li>
		<li><a href="logout.php">Sair</a></li>
      </ul>
    </div>
  </div>
</nav>