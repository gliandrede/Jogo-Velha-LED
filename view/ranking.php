<?php 
   
    if($ranking){
        $dezMelhores=false;
        $maximo = count($ranking);
        $posicaoAtual=0;
        if (!$apenasConsulta) {
            for ($i=0; $i <$maximo; $i++) { 
                if ($_SESSION["idJogador"] != $ranking[$i]["idJogador"]) {
                    
                    $posicaoAtual++;
                }else{
                    $i = $maximo;
                }
            }
        }

        if ($posicaoAtual<10) {
            $dezMelhores=true;
        }

        if ($maximo>10) {
            $maximo = 10;
        }
    }
?>
<link rel="stylesheet" href="assets/css/ranking.css">
<!-- <img style="opacity:0.5;position:absolute;top: 0;left: 0;width: 100%;height: 100%;" src="assets/img/ranking.png"> -->
<div class="container-ranking">
    <div class="header-games">
        <div class="titulo-game">Ranking</div>
        <div class="descricao">Conheça os melhores jogadores.</div>
    </div>
</div>
<div class="ranking">
    <?php if ($ranking){ ?>
        <?php for ($i = 0; $i < $maximo; $i++){ ?>
            <?php  $cor=""; $cor=$i%2==0?"branca":"azul"; ?>
            <div class="row">
                <div id="posicao<?= $i+1; ?>" class="posicao"><?= $i+1; ?>.</div>
                <div class="nome-jogador <?= ($posicaoAtual==$i&&$nomeSessao!='')?"destaque":""; ?>"><?= $posicaoAtual==$i&&$nomeSessao!=''?$nomeSessao:$ranking[$i]['nomeJogador'];?> <?= ($posicaoAtual==$i&&$nomeSessao!='')?"<span id='txtVoceRanking'>(Você)</span>":""; ?></div>
                <div class="pontos-jogador" ><?= $ranking[$i]["pontuacaoJogador"]<0 ? 0:$ranking[$i]["pontuacaoJogador"]; ?> Pontos</div>
                <!-- <div class="tempo-jogador"></div> -->
            </div>
        <?php } ?>
        <?php if (!$dezMelhores AND !$apenasConsulta){ ?>
            <div class="row">
                <div class="posicao fora-top"><?= $posicaoAtual+1; ?>.</div>
                <div class="nome-jogador fora-top">
                    <?= $ranking[$posicaoAtual]["nomeJogador"] ?> (Você)
                </div>
                <div class="pontos-jogador fora-top" ><?= $ranking[$posicaoAtual]["pontuacaoJogador"]<0 ? 0:$ranking[$posicaoAtual]["pontuacaoJogador"]; ?> Pontos
                </div>
            </div>
        <?php } ?>
    <?php }else{ ?>
        <div class="row">
            <div class="posicao fora-top"></div>
            <div class="nome-jogador fora-top">
                Nenhum dado registrado!
            </div>
            <div class="pontos-jogador fora-top">
                
            </div>
        </div>
    <?php } ?>
</div>
<div id="btnEnviar" onclick="location.href='home'">Voltar para a tela inicial</div>

<script>
    $(window).on("load", function(){
        $(".procedimento").show("fade",500)
        $(".titulo-game").delay(500).show("fade",500)
        $(".descricao").delay(800).show("fade",500)
        var _delay=300;
        $(".row").delay(800).each(function(){
            $(this).delay(_delay).show("fade",500);
            _delay+= 300;
        })
    	$(".pontos-jogador").delay(1000).show("fade",500);
		$("#btnEnviar").delay(_delay).show("fade",500);

        $(".game").delay(3600).show("fade",500);
    });
</script>