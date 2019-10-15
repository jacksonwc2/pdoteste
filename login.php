<?php
	// verificar se o login e senha são válidos
	require 'classes/UsuarioDAO.class.php';
	
	use lapelicula\dao\UsuarioDAO;
	
	session_start();
		
	$usuarioDAO = new UsuarioDAO();
	
	if (isset($_SESSION["usuario"])) unset($_SESSION["usuario"]);
	
	if (isset($_POST["login"]) && isset($_POST["senha"])) {
		// verifica o login
	    $retorno = $usuarioDAO->validarLogin($_POST["login"], $_POST["senha"]);
		if ($retorno) {
			// cria a sessão			
			session_start();
			$_SESSION["usuario"] = $_POST["login"];			
			header("Location: index.php");
		}
		else {
			// mensagem de erro caso login/senha não funcionem
			$mensagem = "Login e/ou senha inválidos! Tente novamente!";
		}
	}
	
?>
<html>
<head>
	<meta charset="utf-8">
	<title>LaPelicula - Login</title>
</head>
<body>
	<h1 style="text-align: center">Acesso ao LaPelicula</h1>
	<div style="margin-top: 100px; margin-right: auto; margin-left: auto; width: 200px">
	<?php 
		if (isset($mensagem)) 
			echo "<h3>" . $mensagem . "</h3>"; 
	?>
	<form action="" name="frmLogin" method="post">
		<input type="text" name="login" required="required"
		maxlength="100" autofocus="autofocus" 
		placeholder="Login"/>
		<p/>
		<input type="password" name="senha" required="required"
		maxlength="100" placeholder="Senha"/>
		<p/>
		<button name="btnAcessar" type="submit">Acessar</button>
		<!-- espaço em html -->
		&nbsp;&nbsp;&nbsp;
		<button name="btnLimpar" type="reset">Limpar</button>
		<p/>
		<a href="registrar.php">Registrar-se</a> 		
	</form>
	</div>
</body>
</html>