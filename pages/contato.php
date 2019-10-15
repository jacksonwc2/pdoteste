<?php 
	require 'sessao.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Cadastro de Contatos</title>
</head>
<body>
	<div style="margin-right: auto; margin-left: auto; width: 300px">
		<h3 align="center">Contato:</h3>
		<form action="processar_contato.php" name="frmcontato" method="post">
			<input type="text" name="cpf" placeholder="Digite o CPF"
			required="required" autofocus="autofocus" maxlength="14"
				style="width: 150px" />
			<p />
			<input type="text" name="nome" placeholder="Digite o nome"
				required="required" maxlength="40" 
				style="width: 280px" />
			<p />
			<input type="date" name="datanascimento" required="required"
				placeholder="Digite a data de nascimento:" style="width: 150px" />
			<p />
			<input type="radio" name="sexo" value="F" /> Feminino
			<!-- espaço HTML -->
			&nbsp;&nbsp; <input type="radio" name="sexo" value="M" /> Masculino
			<p />
			<input type="text" name="rua" placeholder="Digite a rua e o número"
				maxlength="80" style="width: 280px" />
			<p />
			<!--  Lista dos bairros -->
			<select name="bairro" style="width: 280px">
				<option value="">Selecione um bairro</option>
				<option value="Centro">Centro</option>
				<option value="Agostini">Agostini</option>
			</select>
			<p/>
			<!--  Lista das cidades -->
			<select name="cidade" style="width: 280px">
				<option value="">Selecione uma cidade</option>
				<option value="Maravilha">Maravilha</option>
				<option value="São Miguel do Oeste">São Miguel do Oeste</option>
			</select>
			<p/>
			<input type="number" name="cep"
			 placeholder="Digite o CEP"
			 style="width: 150px"/>		
			 <p/>
			<input type="tel" name="telefone"
			 placeholder="Digite o Telefone"
			 required="required"
			 style="width: 150px" />
			 <p/>
			 <input type="email" name="email"
			 placeholder="Digite o E-mail"
			 required="required"
			 style="width: 280px" />
			 <p/>
			 Observações: <textarea  name="observacao" 
			 rows="6" cols="40">
			 </textarea>
			 <p/><p/>
			 <button name="btnsalvar" type="submit">Salvar</button>
			 <button name="btnlimpar" type="reset">Limpar</button>
		</form>
		
		<p/>
		<h3>Lista de Contatos</h3>
		<?php
			$contatos = fopen("contatos.txt", "r");
			while (!feof($contatos)) {
				echo fgets($contatos);
			}
			fclose($contatos);
		?>
	</div>
</body>
</html>