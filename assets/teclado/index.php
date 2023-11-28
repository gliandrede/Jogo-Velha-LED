<link rel="stylesheet" href="assets/teclado/css/teclado.css">

<div class="container-teclado" id="divContainerTeclado">
	<!-- teclado com letras -->
	<div id="divTecladoLetras" class="teclado-letras">
		<!-- linha 1 -->
		<div id="keyTeclaQ" ontouchstart="animarTecla( 'Q' ); escrever( 'q' );" class="teclas">Q</div>
		<div id="keyTeclaW" ontouchstart="animarTecla( 'W' ); escrever( 'w' );" class="teclas">W</div>
		<div id="keyTeclaE" ontouchstart="animarTecla( 'E' ); escrever( 'e' );" class="teclas">E</div>
		<div id="keyTeclaR" ontouchstart="animarTecla( 'R' ); escrever( 'r' );" class="teclas">R</div>
		<div id="keyTeclaT" ontouchstart="animarTecla( 'T' ); escrever( 't' );" class="teclas">T</div>
		<div id="keyTeclaY" ontouchstart="animarTecla( 'Y' ); escrever( 'y' );" class="teclas">Y</div>
		<div id="keyTeclaU" ontouchstart="animarTecla( 'U' ); escrever( 'u' );" class="teclas">U</div>
		<div id="keyTeclaI" ontouchstart="animarTecla( 'I' ); escrever( 'i' );" class="teclas">I</div>
		<div id="keyTeclaO" ontouchstart="animarTecla( 'O' ); escrever( 'o' );" class="teclas">O</div>
		<div id="keyTeclaP" ontouchstart="animarTecla( 'P' ); escrever( 'p' );" class="teclas">P</div>
		<div id="keyTeclaEscuraTextoApagar" ontouchstart="animarTeclaEscura( 'TextoApagar' ); apagar();" class="teclas tecla-apagar"><img class="img-apagar" src="assets/teclado/img/apagar-claro.png"></div>
		<!-- linha 2 -->
		<div id="keyTeclaA" ontouchstart="animarTecla( 'A' ); escrever( 'a' );" class="teclas espacamento">A</div>
		<div id="keyTeclaS" ontouchstart="animarTecla( 'S' ); escrever( 's' );" class="teclas">S</div>
		<div id="keyTeclaD" ontouchstart="animarTecla( 'D' ); escrever( 'd' );" class="teclas">D</div>
		<div id="keyTeclaF" ontouchstart="animarTecla( 'F' ); escrever( 'f' );" class="teclas">F</div>
		<div id="keyTeclaG" ontouchstart="animarTecla( 'G' ); escrever( 'g' );" class="teclas">G</div>
		<div id="keyTeclaH" ontouchstart="animarTecla( 'H' ); escrever( 'h' );" class="teclas">H</div>
		<div id="keyTeclaJ" ontouchstart="animarTecla( 'J' ); escrever( 'j' );" class="teclas">J</div>
		<div id="keyTeclaK" ontouchstart="animarTecla( 'K' ); escrever( 'k' );" class="teclas">K</div>
		<div id="keyTeclaL" ontouchstart="animarTecla( 'L' ); escrever( 'l' );" class="teclas">L</div>
		<div id="keyTeclaCd" ontouchstart="animarTecla( 'Cd' ); escrever( 'ç' );" class="teclas">Ç</div>
		<!-- linha 3 -->
		<div class="teclas vazio"></div>
		<div id="keyShiftEsquerda" ontouchstart="fixaLetra()" class="teclas"><img id="imgShiftEsquerda" class="img-shift" src="assets/teclado/img/shift-escuro.png"></div>
		<div id="keyTeclaZ" ontouchstart="animarTecla( 'Z' ); escrever( 'z' );" class="teclas">Z</div>
		<div id="keyTeclaX" ontouchstart="animarTecla( 'X' ); escrever( 'x' );" class="teclas">X</div>
		<div id="keyTeclaC" ontouchstart="animarTecla( 'C' ); escrever( 'c' );" class="teclas">C</div>
		<div id="keyTeclaV" ontouchstart="animarTecla( 'V' ); escrever( 'v' );" class="teclas">V</div>
		<div id="keyTeclaB" ontouchstart="animarTecla( 'B' ); escrever( 'b' );" class="teclas">B</div>
		<div id="keyTeclaN" ontouchstart="animarTecla( 'N' ); escrever( 'n' );" class="teclas">N</div>
		<div id="keyTeclaM" ontouchstart="animarTecla( 'M' ); escrever( 'm' );" class="teclas">M</div>
		<div id="keyTeclaVirgula" ontouchstart="animarTecla( 'Virgula' ); escrever( ',' );" class="teclas">,</div>
		<div id="keyTeclaPonto" ontouchstart="animarTecla( 'Ponto' ); escrever( '.' );" class="teclas">.</div>
		<div id="keyShiftDireita" ontouchstart="fixaLetra()" class="teclas"><img id="imgShiftDireita" class="img-shift" src="assets/teclado/img/shift-escuro.png"></div>
		<!-- linha 4 -->
		<div id="keyTecla123" class="teclas tecla-numeros" ontouchstart="abrirNumeros()">123</div>
		<div id="keyTeclaEspaco" ontouchstart="animarTecla( 'Espaco' ); escrever( ' ' );" class="teclas tecla-espaco"></div>
		<div id="keyTeclaTraco" ontouchstart="animarTecla( 'Traco' ); escrever( '-' );" class="teclas">-</div>
		<div id="keyTeclaUndeline" ontouchstart="animarTecla( 'Underline' ); escrever( '_' );" class="teclas">_</div>
		<div id="keyTeclaArroba" ontouchstart="animarTecla( 'Arroba' ); escrever( '@' );" class="teclas">@</div>
		<div id="keyTeclaEscuraComBr" ontouchstart="animarTeclaEscura( 'ComBr' ); escrever( '.com.br' );" class="teclas tecla-com">.com.br</div>
	</div>

	<!-- teclado com numeros -->
	<div id="divTecladoNumeros" class="teclado-numeros">
		<div id="keyTecla7" ontouchstart="animarTecla( 7 ); escrever( '7' );" class="teclas">7</div>
		<div id="keyTecla8" ontouchstart="animarTecla( 8 ); escrever( '8' );" class="teclas">8</div>
		<div id="keyTecla9" ontouchstart="animarTecla( 9 ); escrever( '9' );" class="teclas">9</div>
		<div id="keyTecla4" ontouchstart="animarTecla( 4 ); escrever( '4' );" class="teclas">4</div>
		<div id="keyTecla5" ontouchstart="animarTecla( 5 ); escrever( '5' );" class="teclas">5</div>
		<div id="keyTecla6" ontouchstart="animarTecla( 6 ); escrever( '6' );" class="teclas">6</div>
		<div id="keyTecla1" ontouchstart="animarTecla( 1 ); escrever( '1' );" class="teclas">1</div>
		<div id="keyTecla2" ontouchstart="animarTecla( 2 ); escrever( '2' );" class="teclas">2</div>
		<div id="keyTecla3" ontouchstart="animarTecla( 3 ); escrever( '3' );" class="teclas">3</div>
		<div id="keyTecla0" ontouchstart="animarTecla( 0 ); escrever( '0' );" class="teclas">0</div>
		<div id="keyTeclaEscuraNumeroApagar" ontouchstart="animarTeclaEscura( 'NumeroApagar' ); apagar();" class="teclas tecla-apagar"><img class="img-apagar" src="assets/teclado/img/apagar-claro.png"></div>
	</div>
</div>

<script type="text/javascript" src="assets/teclado/js/teclado.js"></script>

<!-- bloqueia numeros do input txtNome de inicio -->
<script type="text/javascript"> //bloquearNumeros(); </script>