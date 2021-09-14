<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br" lang="pt-br">
<html>
<head>
<title>Busca simples com Ajax, PHP, MySQL</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script src="../js/teste.js"></script>
</head>

<body>
	<b>Digite o que procura</b>
	<!--Aqui o formulário para a busca-->
	<form name='busca'>
		<input type="text" name="produto">
		<input type="button" value="buscar" onclick="mostraConteudo('consul-teste.php?produto='+document.busca.produto.value,'resultado_busca')">
	</form>
	<!--Fim do formulário busca-->
	<br />

	<b>Resultado da busca</b><br />

	<!--Aqui é onde vai aparecer o resultado da busca-->
	<div id="resultado_busca"></div>

</body>
</html>
