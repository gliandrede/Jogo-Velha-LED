function fecharNotificacao(){
	$( "#divNotificacao" ).css("display", "none");
}


function abrirVideo(){
	$(".modal-tela-cheia").show("fade",500);
	$(".video").delay(500).show("fade",500);
	setTimeout(function(){
		$(".video")[0].play();
	},1000);
	$(".botao-fechar").show("fade",500);
	$(".btn-voltar").hide("fade",500);
}

function fecharVideo(){
	//$(".video").pause();
	$(".video").hide("fade",500);
	$(".video")[0].pause();
	$(".video")[0].currrentTime = 0.1;
	$(".modal-tela-cheia").hide("fade",500);
	$(".botao-fechar").hide("fade",500);
	$(".btn-voltar").show("fade",500);
}
// DESAFIO NÃO LIBERADO
_tempoExibir = 0;
_bloquear = 0;

function abrirDesafioNaoLiberado(){
	if (_bloquear == 0){
		_bloquear = 1;
		$( "#divNaoLiberado" ).show("fade", 600);
		_tempoExibir = setTimeout(function(){
			$( "#divNaoLiberado" ).hide("fade", 600);
			_bloquear = 0;
		}, 3000);
	}
}

function fecharDesafioNaoLiberado(){
	clearTimeout(_tempoExibir);
	$( "#divNaoLiberado" ).hide("fade", 600);
	_bloquear = 0;
}
