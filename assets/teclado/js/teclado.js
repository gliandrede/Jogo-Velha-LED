// animar teclas padrão
function animarTecla(_tecla){
	$( "#keyTecla"+_tecla ).css("background", "rgb(225,225,225)");
	$( "#keyTecla"+_tecla ).css("color", "rgb(175,175,175)");
	setTimeout(desanimarTecla, 200, _tecla);
}
function desanimarTecla(_tecla){
	$( "#keyTecla"+_tecla ).css("background", "rgb(255,255,255)");
	$( "#keyTecla"+_tecla ).css("color", "rgb(155,155,155)");
}

//animar teclas escuras
function animarTeclaEscura(_tecla){
	$( "#keyTeclaEscura"+_tecla ).css("background", "rgb(100,100,100)");
	setTimeout(desanimarTeclaEscura, 200, _tecla);
}
function desanimarTeclaEscura(_tecla){
	$( "#keyTeclaEscura"+_tecla ).css("background", "rgb(155,155,155)");
}

// teclado de numeros
var menuNum = 0;
function abrirNumeros(){
	if (menuNum == 0){
		menuNum = 1;
		$( "#divContainerTeclado" ).css("width", "1405px");
		$( "#divTecladoNumeros" ).css("display", "block");
		$( "#keyTecla123" ).css("color", "rgb(255,255,255");
		$( "#keyTecla123" ).css("background", "rgb(155,155,155");
	}else{
		menuNum = 0;
		$( "#divContainerTeclado" ).css("width", "1100px");
		$( "#divTecladoNumeros" ).css("display", "none");
		$( "#keyTecla123" ).css("color", "rgb(155,155,155");
		$( "#keyTecla123" ).css("background", "rgb(255,255,255");
	}
}

// animar shift
var letrasFixadas = 0;
function fixaLetra(){
	if (letrasFixadas == 0){
		letrasFixadas = 1;
		$( "#keyShiftEsquerda" ).css("background", "rgb(155,155,155)");
		$( "#imgShiftEsquerda" ).attr("src", "assets/teclado/img/shift-claro.png");
		$( "#keyShiftDireita" ).css("background", "rgb(155,155,155)");
		$( "#imgShiftDireita" ).attr("src", "assets/teclado/img/shift-claro.png");
	}
	else{
		letrasFixadas = 0;
		$( "#keyShiftEsquerda" ).css("background", "rgb(255,255,255)");
		$( "#imgShiftEsquerda" ).attr("src", "assets/teclado/img/shift-escuro.png");
		$( "#keyShiftDireita" ).css("background", "rgb(255,255,255)");
		$( "#imgShiftDireita" ).attr("src", "assets/teclado/img/shift-escuro.png");
	}
}

//  funções do teclado
function funcaoTeclado(idTemp, abrir) {
    if (abrir == 1) {
        mostrarTeclado();
        id = idTemp;
    }
    else {
        ocultarTeclado();
    }
}

function mostrarTeclado(){
	$( "#divContainerTeclado" ).css("display", "block");
}

function ocultarTeclado(){
	$( "#divContainerTeclado" ).css("display", "none");
	document.getElementById(id).blur();
}

function escrever(letra){
	document.getElementById(id).focus();
	if (letrasFixadas == 1){
		escrevaMai(letra);
		fixaLetra();
	}
	else
		escrevaMin(letra);

	//código para cursor ir pro final
	document.getElementById(id).setSelectionRange(document.getElementById(id).value.length,document.getElementById(id).value.length);		
}

function escrevaMai(letra){
	document.getElementById(id).value += letra.toUpperCase();
}

function escrevaMin(letra){
	// IE Support
	if (document.selection) {
		document.getElementById(id).focus ();
		var Sel = document.selection.createRange ();
		Sel.moveStart ('character', -document.getElementById(id).value.length);
		CaretPos = Sel.text.length;
	}
	// Firefox support
	else if (document.getElementById(id).selectionStart || document.getElementById(id).selectionStart == '0')
		CaretPos = document.getElementById(id).selectionStart;

	document.getElementById(id).value = document.getElementById(id).value.substr(0,(CaretPos)) + letra.toLowerCase() + document.getElementById(id).value.substr(CaretPos,(document.getElementById(id).value.length));

	pos = CaretPos+1;
	if(document.getElementById(id).setSelectionRange)
	{
		document.getElementById(id).focus();
		document.getElementById(id).setSelectionRange(pos,pos);
	}
	else if (document.getElementById(id).createTextRange) {
		var range = document.getElementById(id).createTextRange();
		range.collapse(true);
		range.moveEnd('character', pos);
		range.moveStart('character', pos);
		range.select();
	}
}

function apagar(){
	doGetCaretPosition(id);
}

function doGetCaretPosition (ctrl) {
	var CaretPos = 0;
	// IE Support
	if (document.selection) {
		document.getElementById(ctrl).focus ();
		var Sel = document.selection.createRange ();
		Sel.moveStart ('character', -document.getElementById(ctrl).value.length);
		CaretPos = Sel.text.length;
	}
	// Firefox support
	else if (document.getElementById(ctrl).selectionStart || document.getElementById(ctrl).selectionStart == '0')
		CaretPos = document.getElementById(ctrl).selectionStart;
	
	if(CaretPos!=0){
		document.getElementById(ctrl).value = document.getElementById(ctrl).value.substr(0,(CaretPos-1)) + document.getElementById(ctrl).value.substr(CaretPos,document.getElementById(ctrl).value.length-CaretPos);/*get.value.substr(0,(CaretPos-1));*//*get.value.length*/
	}

	pos = CaretPos-1;
	if(document.getElementById(ctrl).setSelectionRange)
	{
		document.getElementById(ctrl).focus();
		document.getElementById(ctrl).setSelectionRange(pos,pos);
	}
	else if (document.getElementById(ctrl).createTextRange) {
		var range = document.getElementById(ctrl).createTextRange();
		range.collapse(true);
		range.moveEnd('character', pos);
		range.moveStart('character', pos);
		range.select();
	}
}

function mostrarTodoTeclado(){
  $( "#keyTecla123" ).css("display", "block");
  $( "#keyTeclaEspaco" ).css("margin-left", "8px");

  $( "#divTecladoLetras" ).css("display", "block");
  $( "#divTecladoNumeros" ).css("display", "block");

  $( "#keyTecla123" ).css("color", "rgb(255,255,255");
  $( "#keyTecla123" ).css("background", "rgb(155,155,155");
  $( "#divContainerTeclado" ).css("width", "1405px");
  menuNum = 1;

  //nesse caso
  $( "#divContainerTeclado" ).css("left", "118.5px");
}

function bloquearNumeros(){
  $( "#keyTecla123" ).css("display", "none");
  $( "#keyTeclaEspaco" ).css("margin-left", "50px");
  $( "#divTecladoLetras" ).css("display", "block");
  $( "#divTecladoNumeros" ).css("display", "none");
  $( "#divContainerTeclado" ).css("width", "1100px");

  //nesse caso
  $( "#divContainerTeclado" ).css("left", "210px");
}

function bloquearLetras(){
  $( "#divTecladoLetras" ).css("display", "none");
  $( "#divTecladoNumeros" ).css("display", "block");
  $( "#divContainerTeclado" ).css("width", "305px");

  //nesse caso
  $( "#divContainerTeclado" ).css("left", "448.5px");
}