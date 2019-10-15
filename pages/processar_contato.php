<?php
	// incluindo outro arquivo php
	require "conexao.php";	
	
	// cria/prepara o comando
	$comando = $conexao->prepare(
			"select count(*) as conta from contato");
	// executa o comando
	$comando->execute();
	// capturando o retorno
	$retorno = $comando->fetch(PDO::FETCH_ASSOC);
	echo "Total de contatos: " . $retorno["conta"];	

	if (isset($_POST)) {
		$cpf = $_POST["cpf"];
		$nome = $_POST["nome"];
		$datanascimento = $_POST["datanascimento"];
		$sexo = $_POST["sexo"];
		$bairro = $_POST["bairro"];
		$cidade = $_POST["cidade"];
		$cep = $_POST["cep"];
		$telefone = $_POST["telefone"];
		$email = $_POST["email"];
		$observacao= $_POST["observacao"];
		
		echo "Dados salvos com sucesso!<p/>";
		echo "$cpf, $nome, $sexo, $bairro, $cidade, $observacao";
				
		// salvando em arquivo texto
		$contatos = fopen("contatos.txt", "a");
		fwrite($contatos, "$cpf,$nome,$datanascimento,$sexo,$bairro,$cidade,$cep,$telefone,$email,$observacao\n");
		fclose($contatos);
	}
	
	// adicionar um voltar

?>