<?php
require 'db/conexao.php';

if (isset ( $conexao )) {
	// reconsulta os dados	
	$comando = $conexao->prepare(
			"select * from autor
			 order by nomaut");
	$comando->execute();
	
} // fim do if

?>
<html>
<head>
	<title>Lista de Autores em ordem decrescente</title>
</head>
<body>

 <a href="http://localhost/livraria/">Voltar</a> 
	<center><h2>Lista de Gêneros</h2></center>
	<?php 
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