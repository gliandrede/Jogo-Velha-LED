<?php

// -------------------------------------------------CONECTAR-----------------------------------------------------

function conectarBD()
{
	$dbh = new PDO("mysql:host=localhost;dbname=pepsico_memoria", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $dbh;
}

// --------------------------------------------MEMORIA-----------------------------------------------

function consultarTextosCards($pack){
	$dbh = conectarBD();
	$sql = "SELECT * FROM texto WHERE pack=$pack";
	@$temp = $dbh->query($sql)->fetchAll();
	if($temp)
		return $temp;
	else
		return 0;
}

function consultarUltimoPackMemoria()
{
	$dbh = conectarBD();
	$sql = "SELECT packMemoria FROM jogador ORDER BY idJogador DESC LIMIT 1";
	@$temp = $dbh->query($sql)->fetchAll()[0][0];
	if($temp)
		return $temp;
	else
		return 0;
}

function salvarUsuarioMemoria($pack)
{
	$dbh = conectarBD();
	$dataAtual = date('Y-m-d H:i:s');
	$sql = "INSERT INTO jogador(packMemoria,dataInicioJogador) VALUES($pack,'$dataAtual')";
	$cod = $dbh->prepare($sql);
	$cod->execute();
	return $dbh->lastInsertId();
}

function salvarRespostaMemoria($idJogador, $pack, $tempo)
{
	$dbh = conectarBD();
	$sql = "INSERT INTO jogador_memoria(idJogador, packMemoria, tempo) VALUES($idJogador, $pack, $tempo)";
	$cod = $dbh->prepare($sql);
	$cod->execute();
}

function finalizarMemoriaJogador($idJogador,$pontuacao,$pack)
{
	$dbh = conectarBD();
	$dataAtual = date('Y-m-d H:i:s');
	$sql = "UPDATE jogador SET dataFinalizadoJogador='$dataAtual',pontuacaoJogador=$pontuacao, packMemoria=$pack WHERE idJogador=$idJogador";
	$cod = $dbh->prepare($sql);
	$cod->execute();
}

// -------------------------------------------------MENU----------------------------------------------------------

function consultarMenu($especialidade, $id = null)
{
	$dbh = conectarBD();
	if ($id == null)
		$sql = "SELECT * FROM menu WHERE deletado = 0 AND idEspecialidade = $especialidade";
	else
		$sql = "SELECT * FROM menu WHERE deletado = 0 AND idEspecialidade = $especialidade AND idMenu=$id";
	return $dbh->query($sql)->fetchAll();
}

// -------------------------------------------------ITEM----------------------------------------------------------

function consultarItem($menu)
{
	$dbh = conectarBD();
	$sql = "SELECT * FROM item WHERE deletado = 0 AND idMenu = $menu";
	return $dbh->query($sql)->fetchAll();
}

// -------------------------------------------------CATEGORIA-----------------------------------------------------

function consultarCategoria($menu)
{
	$dbh = conectarBD();
	$sql = "SELECT * FROM categoria WHERE deletado = 0 AND idMenu = $menu";
	$categorias = $dbh->query($sql)->fetchAll();

	if ($categorias) foreach ($categorias as $key => $categoria) {
		$sql = "SELECT * FROM arquivo WHERE deletado = 0 AND idCategoria = " . $categoria["idCategoria"];
		$categorias[$key]["arquivos"] = $dbh->query($sql)->fetchAll();
		if($categorias[$key]["arquivos"]){
			foreach ($categorias[$key]["arquivos"] as $key2 => $arquivo) {
				$categorias[$key]["arquivos"][$key2]["tamanho"] = tamanho_arquivo($arquivo["caminhoArquivo"]);
			}
		}
		else{
			$categorias[$key]["arquivos"]=null;
		}
	}

	return $categorias;
}

// -----------------------------------------------RANKING----------------------------------------------------------
function salvarNomeJogador($idJogador,$nomeJogador){
	$dbh = conectarBD();
	$sql = "UPDATE jogador SET nomeJogador = '$nomeJogador' WHERE jogador.idJogador = $idJogador";
	$cod = $dbh->prepare($sql);
	$cod->execute();
}

function consultarRanking(){
	$dbh=conectarBD();
	$sql = "SELECT * FROM jogador WHERE nomeJogador != '' ORDER BY pontuacaoJogador DESC";
	@$temp = $dbh->query($sql)->fetchAll();
	if($temp)
		return $temp;
	else
		return 0;
}

function consultarRankingJogadorSemNome($idJogador){
	$dbh=conectarBD();
	$sql = "(SELECT * FROM jogador WHERE nomeJogador != '' UNION SELECT * FROM jogador WHERE idJogador=$idJogador) ORDER BY pontuacaoJogador DESC;";
	@$temp = $dbh->query($sql)->fetchAll();
	if($temp)
		return $temp;
	else
		return 0;
}

function consultarNome($idJogador){
	$dbh = conectarBD();
	$sql = "SELECT nomeJogador from jogador Where nomeJogador != '' and idJogador = $idJogador";
	@$temp = $dbh->query($sql)->fetchAll();
	if($temp)
		return $temp;
	else
		return 0;

}

// -------------------------------------------------LOGS----------------------------------------------------------

function salvarLog($descricaoLog, $idUsuario)
{
	$dbh = conectarBD();
	$dataAtual = date('Y-m-d H:i:s');
	$sql = "INSERT INTO log(idUsuario,descricaoLog,dataLog) VALUES ($idUsuario,'$descricaoLog','$dataAtual')";
	$cod = $dbh->prepare($sql);
	$cod->execute();
}

// -------------------------------------------------LIBS----------------------------------------------------------
function tamanho_arquivo($arquivo)
{
	$tamanhoarquivo = filesize($arquivo);
	$medidas = array('KB', 'MB', 'GB', 'TB');
	if ($tamanhoarquivo < 999) {
		$tamanhoarquivo = 1000;
	}
	for ($i = 0; $tamanhoarquivo > 999; $i++) {
		$tamanhoarquivo /= 1024;
	}
	return round($tamanhoarquivo) . $medidas[$i - 1];
}

// -------------------------------------------------EMAIL---------------------------------------------------------

function salvarEmail($email)
{
	$dbh = conectarBD();
	$sql = "INSERT INTO email(emailCliente) VALUES('$email')";
	$cod = $dbh->prepare($sql);
	$cod->execute();
	$id = $dbh->lastInsertId();

	$categorias = json_decode($_COOKIE["categorias"]);

	foreach ($categorias as $categoria) {
		$sql = "INSERT INTO pedido(idEmail,idCategoria,idMenu,idEspecialidade) VALUES($id,".$categoria.",".$_COOKIE["idMenu"].",".$_COOKIE["idEspecialidade"].")";
		$cod = $dbh->prepare($sql);
		$cod->execute();

	}
}

// -------------------------------------------------VIDEO---------------------------------------------------------
function consultarVideo($id){
	$dbh=conectarBD();
	$sql = "SELECT * FROM arquivo WHERE idArquivo = $id";
	@$temp = $dbh->query($sql)->fetchAll();
	if($temp)
		return $temp[0];
	else
		return 0;
}