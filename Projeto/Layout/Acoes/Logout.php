<?php

	session_start();
	
	unset($_SESSION['cpf']);
	unset($_SESSION['senha']);
	unset($_SESSION['tipoAutenticacao']);
	
	header('location:../Geral_Index.php');
	
 ?>
