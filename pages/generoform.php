<?php
require '../classes/GeneroDAO.class.php';

use lapelicula\dao\GeneroDAO;

$generoDAO = new GeneroDAO();

if (isset($_REQUEST["operacao"])) {
    $operacao = $_REQUEST["operacao"];
    switch ($operacao) {
        case "I":
            // inserindo um novo gênero
            $generoDAO->inserir(array(
            $_POST["nome"]));
            echo "INSERÇÃO REALIZADA COM SUCESSO!";
            break;
        case "A":
            // inserindo um novo gênero
            $generoDAO->atualizar(array(
            $_POST["nome"],
            $_POST["codigo"]));
            echo "ATUALIZAÇÃO REALIZADA COM SUCESSO!";
            break;
        case "D":
            // excluindo um gênero
            $generoDAO->excluir( $_REQUEST["codigo"]);
            header("Location: generoform.php?msg=EXCLUSÃO REALIZADA COM SUCESSO!");
            break;
        case "E":
            // editando gênero
            $genero = $generoDAO->buscarPorCodigo($_REQUEST["codigo"]);
            $operacao = 'A';
            break;
    }
}
?>
<html>
<head>
<script type="text/javascript" src="../js/funcoes.js"></script>
<title>Formulário de Cadastro de Gêneros</title>
</head>
<body>
	<a href="http://localhost/lapelicula/">Voltar</a>
	<h2 style="text-align: center">Cadastro de Gênero</h2>
	<form action="" method="post">
		<input type="hidden" name="operacao" value="<?=isset($operacao) ? $operacao : 'I'?>"> Código: <input
		type="number" name="codigo" required="required" readonly="readonly" value="<?=isset($genero) ? $genero['codgen'] : ''?>"/> <br /> Nome: <input
		type="text" name="nome" required="required" value="<?=isset($genero) ? $genero['nomgen'] : ''?>"/> <br />
		<button name="btnSalvar" type="submit">Salvar</button>
		&nbsp;&nbsp;&nbsp;
		<button name="btnLimpar" type="submit">Limpar</button>
	</form>
	<br />
	<div id="msg" style="text-align: center; font-size: 28; font-weight: bold; color: red"><?=isset($_GET['msg']) ? $_GET['msg'] : ''?></div>
	<?php

echo "<center><h2>Lista de Gêneros</h2></center>";
$generos = $generoDAO->buscarTodos();
if (isset($generoDAO) && count($generos) > 0) {
    echo "<table border='1' align='center'>";
    echo "<tr><td>Código</td><td>Nome</td><td></td><td></td></tr>";
    foreach ($generos as $genero) {
        echo "<tr><td>" . $genero["codgen"] . "</td><td>" . $genero["nomgen"] . "</td><td><a href='generoform.php?operacao=E&codigo=" . $genero["codgen"] . "'><img src='../img/edit.png'/></a></td><td><a href='generoform.php?operacao=D&codigo=" . $genero["codgen"] . "' onclick='return confirmacao(\"Deseja realmente excluir este gênero?\");'><img src='../img/delete.png'/></a></td></tr>";
    }
    echo "</table>";
}
?>		
</body>
</html>