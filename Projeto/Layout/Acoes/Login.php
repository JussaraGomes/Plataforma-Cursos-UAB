<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Facade/AdministadorFacade.php"); 
require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Facade/AlunoFacade.php"); 
require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Facade/ProfessorFacade.php"); 

$window_location_href = "../Geral_Index.php";
$mensagem = "";

// ====================================================================================================================================================
// LOGIN ALUNO
// ====================================================================================================================================================
if(isset($_POST['login_aluno'])){

	$cpfAluno = $_POST['cpfAluno']; 
	$senhaAluno = $_POST['senhaAluno'];
		
	if(!empty($cpfAluno) && !empty($senhaAluno)){

		$autenticacaoAluno = AlunoFacade::getInstance()->autenticarAlunoCPF($cpfAluno, $senhaAluno);

			if ($autenticacaoAluno){			
				session_start();					
				$_SESSION['cpf'] = $cpfAluno;
				$_SESSION['senha'] = $senhaAluno;
				$_SESSION['tipoAutenticacao'] = "aluno";
				$window_location_href = "../Aluno_Menu.php";
			}
			else
				$mensagem = "FALHA NA AUTENTICAÇÃO. VERIFIQUE OS DADOS INFORMADOS.";
	}
	else
		$mensagem = "PREENCHA TODOS OS CAMPOS ANTES DE PROCEGUIR.";		  
}


// ====================================================================================================================================================
// LOGIN PROFESSOR E ADMINISTRADOR
// ====================================================================================================================================================
else if(isset($_POST['geral_login'])){
		
	$cpf = $_POST['cpf']; 
	$senha = $_POST['senha'];
	$tipoAutenticacao = $_POST['tipoAutenticacao'];
	
	if(!empty($cpf) && !empty($senha) && !empty($tipoAutenticacao)){

		// Login de Professor -------------------------------------------------------------------------------------------------------------------------
		if($tipoAutenticacao == "professor"){

			$autenticacaoProfessor = ProfessorFacade::getInstance()->autenticarProfessorCPF($cpf, $senha);

			if ($autenticacaoProfessor){				
				session_start();					
				$_SESSION['cpf'] = $cpf;
				$_SESSION['senha'] = $senha;
				$_SESSION['tipoAutenticacao'] = "professor";
				$window_location_href = "../Professor_Menu.php";				
			}
			else
				$mensagem = "FALHA NA AUTENTICAÇÃO. VERIFIQUE OS DADOS INFORMADOS.";
		}
		// --------------------------------------------------------------------------------------------------------------------------------------------

		
		// Login de Administador ----------------------------------------------------------------------------------------------------------------------
		else if($tipoAutenticacao == "administrador"){
			
			$autenticacaoAdministrador = AdministadorFacade::getInstance()->autenticarAdministradorCPF($cpf, $senha);

			if ($autenticacaoAdministrador){				
				session_start();					
				$_SESSION['cpf'] = $cpf;
				$_SESSION['senha'] = $senha;
				$_SESSION['tipoAutenticacao'] = "administrador";
				$window_location_href = "../Administrador_Menu.php";				
			}
			else
				$mensagem = "FALHA NA AUTENTICAÇÃO. VERIFIQUE OS DADOS INFORMADOS.";
		}
		// --------------------------------------------------------------------------------------------------------------------------------------------
	}
	else
		$mensagem = "PREENCHA TODOS OS CAMPOS ANTES DE PROCEGUIR.";		  
}	


	$window_location_href = $window_location_href."?returnMessage=".base64_encode($mensagem);

 	echo"<script language='javascript' type='text/javascript'> window.location.href='", $window_location_href, "'</script>";	
		
?>