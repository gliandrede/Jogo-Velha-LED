<?php 
    $nCards=7;
	$cards=array();
	for ($i=1; $i <= $nCards; $i++) { 
		array_push($cards, $i);
	}
    for ($i=1; $i <= $nCards; $i++) { 
		array_push($cards, ($i."-2"));
	}
	sort($cards);

?>
<link rel="stylesheet" href="assets/css/memoria.css">
<!-- <img style="top: 0;left: 0;width: 100%;height: 100%;position: absolute;opacity: 0.5;" src="assets/img/fundo.png"> -->

<span id="txtInfo">Memorize as cartas para ligar os comportamentos do The PepsiCo Way.</span>
<div class="infos-memoria">
	<div class="container-count-down">
		TEMPO RESTANTE: <div id="countdown">02:00</div>
    </div>

    <div class="btn-embaralhar" onclick="iniciarGame()">
		EMBARALHAR CARTAS!
    </div>
</div>

<div class="container-game-memoria-animacao">
	<?php for ($i=0; $i < sizeof($cards); $i++) { ?>
	    <div id="cA<?= $cards[$i]; ?>" class="flip-card-animacao">
	        <div class="flip-card-inner flip">
		        <div class="flip-card-front">
		            <img src="assets/img/fundo-carta.png">
		        </div>
		        <div class="flip-card-back cor-<?= $cards[$i]; ?>">
		            <img src="assets/img/pack<?= $pack ?>/<?= $cards[$i]; ?>.png?v=2">
		        </div>
	        </div>
	    </div>
	<?php } ?>
</div>
<?php shuffle($cards); ?>
<div class="container-game-memoria">
	<?php for ($i=0; $i < sizeof($cards); $i++) { 
	    $valor=$cards[$i];
	    if(strpos($cards[$i], "-2") !== false){
	        $valor=substr($cards[$i],0,1);
	    } ?>
	    <div id="c<?= $i; ?>" valor="<?= $valor; ?>" class="flip-card">
	        <div class="flip-card-inner">
		        <div class="flip-card-front">
		            <img src="assets/img/fundo-carta.png">
		        </div>
		        <div class="flip-card-back cor-<?= $cards[$i]; ?>">
		            <img src="assets/img/pack<?= $pack ?>/<?= $cards[$i]; ?>.png?v=2">
		        </div>
	        </div>
	    </div>
	<?php } ?>
</div>

<div id="btnVoltar" onclick="location.href='home'">
	<img id="imgVoltar1" src="assets/img/voltar.png">
	<img id="imgVoltar2" src="assets/img/voltar.png">
</div>

<script type="text/javascript">
	var __escolhido1=0;
	var __escolhido2=0;
	var __idPrimeiroSelecionado=0;
	
	var __cliqueLiberado=1;
	var __cardsVirados=0;
	var __pack = "<?= $pack ?>";

	let __tempoAcabou=0;
	let __tempoResposta=0;
	var __tempo=120;
	var __minutos=2;
	var __segundos=0;
	var __timeoutCronometro;

	var __pontos=0;
	var __embaralhado=false;
	
	$(window).load(function(){
		// tempo de cartas viradas pra cima
		$("#countdown-number").text("2:00");
		$("#countdown-number").show("fade",500);

		$(".infos-memoria").css("opacity","1");

		$("#txtInfo").show("fade",500);
		$(".container-game-memoria-animacao").delay(500).show("fade",500);
	});

	function iniciarGame(){
		if(!__embaralhado){
			$(".btn-embaralhar").css("opacity","0.5");
			$(".btn-embaralhar").css("animation","none");
			$.ajax({
			  url: "iniciar-game-ajax",
			  type: "POST",
			  data:{pack:__pack},
			  dataType: "html"
			}).done(function(resposta) {
				__embaralhado=true;
				embaralharCards(1);
			}).fail(function(jqXHR, textStatus ) {
				console.log("Request failed: " + textStatus);
			});	
		}
	}

	function embaralharCards(_idCard){
		$(".container-game-memoria-animacao").children(".flip-card-animacao").each(function(){
			$(this).children(".flip-card-inner").removeClass("flip");
			console.log($(this).children(".flip-card-inner").hasClass("flip"));
		});
		console.log(_idCard);
		$("#cA"+_idCard).css("top","calc(35vw)");
		$("#cA"+_idCard).css("left","calc(30vw)");

		$("#cA"+_idCard+"-2").css("top","calc(35vw)");
		$("#cA"+_idCard+"-2").css("left","calc(30vw)");
		_idCard++;
		if(_idCard==9){
			setTimeout(desembaralharCards,700,1,1);
		}else{
			setTimeout(embaralharCards,100,_idCard);
		}
	}

	function desembaralharCards(_idCard,_i){
		if(_idCard<=2){
			$("#cA"+_idCard).css("top","0vw");
			$("#cA"+_idCard).css("left","calc(18.5*"+(_i-1)+"vw)");
			_i++;
			$("#cA"+_idCard+"-2").css("top","0vw");
			$("#cA"+_idCard+"-2").css("left","calc(18.5*"+(_i-1)+"vw)");
		}
		
		if(_idCard>2 && _idCard<=4){
			$("#cA"+_idCard).css("top","27vw");
			$("#cA"+_idCard).css("left","calc(18.5*"+(_i-1)+"vw)");
			_i++;
			$("#cA"+_idCard+"-2").css("top","27vw");
			$("#cA"+_idCard+"-2").css("left","calc(18.5*"+(_i-1)+"vw)");
		}

		if(_idCard>4 && _idCard<=6){
			$("#cA"+_idCard).css("top","calc(27vw*2)");
			$("#cA"+_idCard).css("left","calc(18.5*"+(_i-1)+"vw)");
			_i++;
			$("#cA"+_idCard+"-2").css("top","calc(27vw*2)");
			$("#cA"+_idCard+"-2").css("left","calc(18.5*"+(_i-1)+"vw)");
		}

		if(_idCard>6 && _idCard<=8){
			$("#cA"+_idCard).css("top","calc(27vw*3)");
			$("#cA"+_idCard).css("left","calc(18.5*"+(_i-1)+"vw)");
			_i++;
			$("#cA"+_idCard+"-2").css("top","calc(27vw*3)");
			$("#cA"+_idCard+"-2").css("left","calc(18.5*"+(_i-1)+"vw)");
		}
		_idCard++;
		if(_i==4){
			_i=1;
		}else{
			_i++;
		}
		if(_idCard==9){
			setTimeout(()=>{
				$(".container-game-memoria").show("fade",200);
				$(".container-game-memoria-animacao").delay(300).hide("fade",200);
				// tempo para comecar cronometro
				setTimeout(cronometro,1000);
			},1000);
		}else{
			setTimeout(desembaralharCards,100,_idCard,_i);
		}
	}

	$(".flip-card").click(function(){
		console.log($(this).attr('valor'));
		console.log($(this).attr('id'));
		if(__escolhido1==0 && !$(this).children(".flip-card-inner").hasClass("flip")){
			$(this).children(".flip-card-inner").addClass("flip");
			__escolhido1=$(this).attr('valor');
			$(".container-carta-grande img").attr("src","assets/img/cartas/"+__escolhido1+".png?v=2");
			$("#result").text(__escolhido1);
			__idPrimeiroSelecionado=$(this).attr("id");
			$(this).children(".flip-card-inner").addClass("certo");
		}else if(__escolhido2==0 && __idPrimeiroSelecionado!=$(this).attr("id") && !$(this).children(".flip-card-inner").hasClass("flip")){
			$(this).children(".flip-card-inner").addClass("flip");
			$(this).children(".flip-card-inner").addClass("certo");
			__escolhido2=$(this).attr('valor');
			$(".container-carta-grande img").attr("src","assets/img/cartas/"+__escolhido2+".png?v=2");
			$("#result").text(__escolhido1+" = "+__escolhido2);
			setTimeout(function(){
				if(__escolhido1!=__escolhido2){
					$(".certo").each(function(){
						// if(!$(this).hasClass("flip")){
							$(this).removeClass("flip");
							$(this).removeClass("certo");
							__cliqueLiberado=1;
							__escolhido1=0;
							__escolhido2=0;
						// }
					});
				}else{
					$(".certo").each(function(){
						$(this).removeClass("certo");
						__cliqueLiberado=1;
						$("#cor-card-placeholder-"+__escolhido2).show("fade");
						__escolhido1=0;
						__escolhido2=0;
						__pontos=__pontos+100;
						verificarFimJogo();
					});
				}
				__escolhido1=0;
				__escolhido2=0;
			},1000);
		}
		console.log("escolhido 1: "+__escolhido1);
		console.log("escolhido 2: "+__escolhido2);
	});

	var __salvarResultadoAjax=0;
	function verificarFimJogo(){
		__cardsVirados++;
		console.log("cards virados="+__cardsVirados);
		if(!__salvarResultadoAjax){
			__salvarResultadoAjax=1;
			$.ajax({
			  url: "salvar-resposta-memoria-ajax",
			  type: "POST",
			  data: "pack="+__pack+"&tempo="+__tempoResposta,
			  dataType: "html"
			}).done(function(resposta) {
				__salvarResultadoAjax=0;
				console.log(resposta);
				if(__cardsVirados==14){
					finalizarGame();
				}
			}).fail(function(jqXHR, textStatus ) {
				console.log("Request failed: " + textStatus);
			});		
		}
	}

	function finalizarGame(){
		clearTimeout(__timeoutCronometro);
		var calcPontuacao = 0;
		if(__tempoAcabou ){
			calcPontuacao = __pontos+__tempo;

		}else{
			calcPontuacao = (__pontos+__tempo)*100;
		}
		$.ajax({
		  url: "finalizar-memoria-ajax",
		  type: "POST",
		  data: "pontuacao="+calcPontuacao+"&pack="+__pack,
		  dataType: "html"
		}).done(function(resposta) {
			// if(!__tempoAcabou){
				location.href="coletar-nome";
			// }
		}).fail(function(jqXHR, textStatus ) {
			console.log("Request failed: " + textStatus);
		});
	}

	function cronometro(){
		__tempoResposta++;
		__tempo--;
		__segundos--;
		if(__tempo<0){
			finalizarGame();
			__tempoAcabou =1;	
		}else{
			if(__segundos<0 && __minutos>0){
				__minutos--;
				__segundos=59;
			}
			if(__segundos == 0 && __minutos ==0){
				setTimeout(finalizarGame,500);
				__tempoAcabou =1;	
			}
			$("#countdown").text(verTextoCronometro(__minutos)+":"+verTextoCronometro(__segundos));
			console.log(verTextoCronometro(__minutos)+":"+verTextoCronometro(__segundos));
			__timeoutCronometro=setTimeout(cronometro,1000);
		}
	}
	function verTextoCronometro(_num){
		if(_num<10){
			return "0"+_num;
		}else{
			return _num;
		}
	}
</script>