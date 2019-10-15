<?php
	// inicia a sessão
	session_start();
	
	// se não estiver iniciado o array da sessão
	// e não houver informação do usuário logad
	// redireciona para o login
	if ((!isset($_SESSION)) || 
			(!isset($_SESSION["usuario"]))) {
		// comando de redirecionamento(forçado)
		header("Location: login.php");
	}	
?>
