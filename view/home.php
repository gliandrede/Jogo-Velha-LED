<link rel="stylesheet" href="assets/css/home.css">
<link rel="stylesheet" href="assets/css/memoria.css">

<div id="txtJogo">Jogo da Memória</div>

<div id="containerCartasHome">
    <?php for ($i=1; $i <= 7; $i++) { ?>
        <div id="cartaHome<?= $i; ?>" class="cards">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="assets/img/fundo-carta.png">
                </div>
                <div class="flip-card-back">
                    <img src="assets/img/pack1/<?= $i; ?>.png?v=2">
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<div id="containerTouch">
    <img src="assets/img/touch.png">
    <div class="inicio">Toque na tela<br> para jogar</div>
</div>
    
<div id="touchableArea"></div>
<div id="btnConsultarRanking" onclick="somarEngrenagem()"></div>

<script>
    $("#touchableArea").on("click",function(){
        location.href="memoria-textos";
    });

    $(window).on("load",function(){
        animarCartas(1,1,4);
        animarCartas(5,5,7);
    });

    var __btnEngrenagem=0;
    function somarEngrenagem(){
        __btnEngrenagem++;
        if(__btnEngrenagem==3){
            location.href="ranking";
        }
    }

    function animarCartas(_cartaAtual,_min,_max){
        // $("#containerCartasHome").children("img").each(()=>{
            // $(this).removeClass("animar-carta");
        // });
        setTimeout(()=>{
            $("#cartaHome"+_cartaAtual).addClass("animar-carta");
            setTimeout(()=>{
                $("#cartaHome"+_cartaAtual).children(".flip-card-inner").addClass("flip");
            },400);
            console.log(_max+","+_min+","+_cartaAtual);
            setTimeout(()=>{
                $("#cartaHome"+_cartaAtual).removeClass("animar-carta");
                // setTimeout(()=>{
                    $("#cartaHome"+_cartaAtual).children(".flip-card-inner").removeClass("flip");
                // },400);
                _cartaAtual++;
                if(_cartaAtual>_max)
                    _cartaAtual=_min;
                animarCartas(_cartaAtual,_min,_max);
            },2000);
        },200)
    }
</script>