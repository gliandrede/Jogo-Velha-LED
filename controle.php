<?php

session_start();

include 'mvc.php';
include 'biblioteca.php';
date_default_timezone_set('America/Sao_Paulo');
$is_page = true;
$jogou =0;

switch ($page) {
	case 'home':
		unset($_SESSION["idJogador"]);
		unset($_SESSION["nomeJogador"]);
		break;
	case 'memoria':
		$pack=consultarUltimoPackMemoria();
		$pack++;
		if($pack==4)
			$pack=1;
		break;
	case 'memoria-textos':
		$pack=consultarUltimoPackMemoria();
		$pack++;
		if($pack==4)
			$pack=1;
		$textos=consultarTextosCards($pack);
		break;
	case 'iniciar-game-ajax':
		// salvar jogador
		$_SESSION['idJogador'] = salvarUsuarioMemoria($_POST['pack']);
		$is_page = false;
		break;
	case 'salvar-resposta-memoria-ajax':
		$pack = $_POST['pack'];
		$tempo = $_POST['tempo'];
		$memoria = salvarRespostaMemoria($_SESSION['idJogador'], $pack, $tempo);
		$is_page = false;
		break;
	case 'finalizar-memoria-ajax':
		finalizarMemoriaJogador($_SESSION['idJogador'],$_POST['pontuacao'],$_POST['pack']);
		$jogo = $_POST["jogo"];
		$is_page = false;
		break;
	case 'coletar-nome':
		$ranking=consultarRankingJogadorSemNome($_SESSION['idJogador']);
		if($ranking){
	        $maximo = count($ranking);
	        $posicaoAtual=1;
            for ($i=0; $i <$maximo; $i++) { 
                if ($_SESSION["idJogador"] != $ranking[$i]["idJogador"]) {
                    
                    $posicaoAtual++;
                }else{
                    $i = $maximo;
                }
            }
	    }
		break;
	case 'salvar-nome-ajax':
		salvarNomeJogador($_SESSION['idJogador'],$_POST["nomeJogador"]);
		$_SESSION['nomeJogador'] = $_POST["nomeJogador"];
		$is_page = false;
		break;

	case 'ranking':
		$ranking=consultarRanking();
		$nomeSessao="";
		if(isset($_SESSION['nomeJogador'])){
			$nomeSessao =$_SESSION['nomeJogador'];
		}
		$apenasConsulta=false;
	    if(!isset($_SESSION["idJogador"])){
	        $apenasConsulta=true;
	    }
		
		break;
}

if ($is_page) {
	include 'core/header.php';
	include 'view/' . $page . '.php';
	include 'core/footer.php';
}
