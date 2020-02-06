 <?php 

require_once($_SERVER["DOCUMENT_ROOT"]."/Projetos/"."/Projeto_Plataforma/"."Facade/AdministradorFacade.php"); 
require_once($_SERVER["DOCUMENT_ROOT"]."/Projetos/"."/Projeto_Plataforma/"."Facade/AlunoFacade.php"); 
require_once($_SERVER["DOCUMENT_ROOT"]."/Projetos/"."/Projeto_Plataforma/"."Facade/ProfessorFacade.php"); 

 
 // ==================================================================================================================================================
 // ALTERAR SENHA ADMINISTRADOR
 // ==================================================================================================================================================
 
 if(isset($_POST['alterarSenha_Administrador'])){
	
	session_start();	
	
	if(isset($_SESSION['cpfAdministrador']) && isset ($_SESSION['senhaAdministrador']) ){
		
		$cpf_Administrador = $_POST['cpf_Administrador'];
		$novaSenha_Administrador = $_POST['novaSenha_Administrador'];
		$senhaAntiga_Administrador = $_POST['senhaAntiga_Administrador'];
		
		if(!empty($cpf_Administrador) && !empty($novaSenha_Administrador) && !empty($senhaAntiga_Administrador)){
		
			if(AdministradorFacade::getInstance()->autenticarAdministradorCPF($cpf_Administrador, $senhaAntiga_Administrador)){
				
				$confirmacaoEdicaoSenhaAdministrador = AdministradorFacade::getInstance()->editarSenhaAdministrador($cpf_Administrador, $novaSenha_Administrador);
		
				if($confirmacaoEdicaoSenhaAdministrador)
					echo"<script language='javascript' type='text/javascript'>alert('Senha alterada com sucesso!');window.location.href='../telas/Registro.php'</script>";
				else
					echo"<script language='javascript' type='text/javascript'>alert('Houve um erro na alteração da senha, tente novamente em outro momento.');window.location.href='../telas/Registro.php'</script>";
					
			}
			echo"<script language='javascript' type='text/javascript'>alert('Senha atual incorreta, se você esqueceu a senha tente a recuperação por e-mail.');window.location.href='../telas/Registro.php'</script>";
		}
		else
			echo"<script language='javascript' type='text/javascript'>alert('Preencha todos os campos antes de proceguir com a alteração da senha.');window.location.href='../telas/Registro.php'</script>";	
	}
 }
  
 // ==================================================================================================================================================
 // ALTERAR SENHA PROFESSOR
 // ==================================================================================================================================================
 
 if(isset($_POST['alterarSenha_Professor'])){
		
	session_start();
		
	if(isset($_SESSION['cpfProfessor']) && isset ($_SESSION['senhaProfessor']) ){
		
		$cpf_Professor = $_POST['cpfProfessor'];
		$novaSenha_Professor = $_POST['novaSenha_Professor'];
		$senhaAntiga_Professor = $_POST['senhaAntiga_Professor'];
		
		if(!empty($cpf_Professor) && !empty($novaSenha_Professor) && !empty($senhaAntiga_Professor)){
		
			if(ProfessorFacade::getInstance()->autenticarAdministradorCPF($cpf_Administrador, $senhaAntiga_Administrador)){
				
				$confirmacaoEdicaoSenhaAdministrador = AdministradorFacade::getInstance()->editarSenhaAdministrador($cpf_Administrador, $novaSenha_Administrador);
		
				if($confirmacaoEdicaoSenhaAdministrador)
					echo"<script language='javascript' type='text/javascript'>alert('Senha alterada com sucesso!');window.location.href='../telas/Registro.php'</script>";
				else
					echo"<script language='javascript' type='text/javascript'>alert('Houve um erro na alteração da senha, tente novamente em outro momento.');window.location.href='../telas/Registro.php'</script>";
					
			}
			echo"<script language='javascript' type='text/javascript'>alert('Senha atual incorreta, se você esqueceu a senha tente a recuperação por e-mail.');window.location.href='../telas/Registro.php'</script>";
		}
		else
			echo"<script language='javascript' type='text/javascript'>alert('Preencha todos os campos antes de proceguir com a alteração da senha.');window.location.href='../telas/Registro.php'</script>";	
	}
 }
?>


