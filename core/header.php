<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">
	<title>Pepsico</title>
	<link rel="icon" href="assets/img/favicon.png" type="image/png">
	<link rel="stylesheet" href="assets/css/index.css?v=<?= rand() ?>">
	<script src="assets/js/jquery.js?v=<?= rand() ?>"></script>
  	<script src="assets/js/jquery-ui.js?v=<?= rand() ?>"></script>
	<script src="assets/js/index.js?v=<?= rand() ?>"></script>
	<script src="assets/js/jquery.mask.min.js?v=<?= rand() ?>"></script>
	<script src="assets/js/jquery.validate.js?v=<?= rand() ?>"></script>
	<!-- <meta http-equiv="refresh" content="300; URL='http://localhost/'" />  -->
</head>
<body onselectstart="return false">
	<div class="container">
		<div id="grafismoTop"></div>
		<div id="grafismoBottom"></div>
		<!-- <img id="grafismoTop" src="assets/img/grafismo-top.png"> -->
		<!-- <img id="grafismoBottom" src="assets/img/grafismo-bottom.png"> -->
		<div class="container-logos">
			<img src="assets/img/logo-pepsico.png">
			<img src="assets/img/logo-cultura.png">
		</div>

		<!-- INICIO: Configuração para sair da aplicação -->
		<iframe id="iframeSair" style="position: absolute;z-index: 999999; left: 0px; top: 0px; width: 200px;height: 390px; border: 0px; background-color: rgba(0,0,0,0);" src="assets/configuracao/"></iframe>
		<!-- FIM: Configuração para sair da aplicação -->
