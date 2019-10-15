<?php
require 'db/conexao.php';

if (isset ( $conexao )) {
	if(isset($_REQUEST["operacao"])) {
		$operacao = $_REQUEST["operacao"];
		//if (!isset($operacao)) $operacao = $_GET["operacao"];
		
		switch ($operacao) {
			case "I":
				// inserindo um novo autor
				$comando = $conexao->prepare(
						"insert into autor values(?,?,?,?,?)");
				$comando->execute(array($_POST["codigo"],
						$_POST["nome"],
						$_POST["data"],
						$_POST["pais"],
						$_POST["nota"]));
				
				echo "INSERÇÃO REALIZADA COM SUCESSO!";
				break;
			case "E":
				// inserindo um novo autor
				$comando = $conexao->prepare(
					"delete from autor where codaut = ?");
				$comando->execute(array($_REQUEST["codigo"]));
				echo "EXCLUSÃO REALIZADA COM SUCESSO!";
				break;
		}
	}
	
	// reconsulta os dados	
	$comando = $conexao->prepare(
			"select * from autor
			 order by nomaut");
	$comando->execute();
	
} // fim do if

?>
<html>
<head>
	<title>Formulário de 
	Cadastro de Autores</title>
</head>
<body>
 <a href="http://localhost/livraria/">Voltar</a>
  
	<center><h2>Cadastro de Autor</h2></center>
	<form action="" method="post">
		<input type="hidden" name="operacao" value="I">
		Código: <input type="number" name="codigo" required="required"/>
		<br/>
		Nome: <input type="text" name="nome" required="required"/>
		<br/>
		Data de Nascimento: <input type="date" name="data" required="required"/>
		<br/>
		Pais: <input type="text" name="pais"/>
		<br/>
		Nota Biográfica: <br/><textarea name="nota" cols="100" rows="10"></textarea>
		<br/>
		<button name="btnInserir" 
		type="submit">Inserir</button>&nbsp;&nbsp;&nbsp;<button name="btnLimpar" 
		type="submit">Limpar</button>
	</form>
	<br/>
	<?php 

	echo "<center><h2>Lista de Autores</h2></center>";
		if (isset($comando) &&
				$comando->rowCount() > 0) {
			echo "<table border='1' align='center'>";
			echo "<tr><td>Código</td><td>Nome</td><td>Data</td><td>Pais</td><td>Nota</td><td></td></tr>";
			while($linha = $comando->fetch(
					PDO::FETCH_ASSOC)) {
				echo "<tr><td>" . $linha["codaut"] . 
					 "</td><td>" . $linha["nomaut"] . 
					 "</td><td>" . $linha["datnasaut"] . 
					 "</td><td>" . $linha["paiaut"] .
				     "</td><td>" . $linha["notbliaut"] .
					 "</td>" .
					"<td><a href='autorform.php?operacao=E&codigo=" . $linha["codaut"] . "'><img src='img/delete.png'/></a></td></tr>";
			}
			echo "</table>";
		}
	?>		
</body>
</html>