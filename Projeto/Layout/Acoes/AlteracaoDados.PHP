<?php 

// Nota, mudar window.location.href='../
// Responsaveis_Curso Pergunta Resposta Módulo
// Pesquisar id do curso

require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Facade/EnderecoFacade.php"); 
require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Facade/PlataformaFacade.php"); 
require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Facade/AdministadorFacade.php"); 
require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Facade/AlunoFacade.php"); 
require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Facade/ProfessorFacade.php"); 
require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Facade/CursoFacade.php"); 


 
 // ==================================================================================================================================================
 // ALTERAR ENDEREÇO
 // ==================================================================================================================================================
  function alterarEndereco(){
		$estado = $_POST['estado'];   		
		$logadouro = $_POST['logadouro'];   		
		$cidade = $_POST['cidade']; 		
		$bairro = $_POST['bairro'];   	
		$cep = $_POST['cep']; 		
		$descricao = $_POST['descricao'];   
	    $idEndereco = $_POST['idEndereco'];
		
					
		if(!empty($idEndereco) && !empty($estado) && !empty($logadouro) && !empty($cidade) && !empty($cep) && !empty($descricao)) 			
			return EnderecoFacade::getInstance()->editarEndereco($estado, $logadouro, $cidade, $bairro, $cep, $descricao, $idEndereco);
		else			
			return false;	
		
 }
	 
 // ==================================================================================================================================================
 // ALTERAR DADOS DA PLATAFORMA
 // ==================================================================================================================================================
 
  if(isset($_POST['alterar_plataforma'])){
	
	if(alterarEndereco()){ 
	
		$idPlataforma = $_POST["idPlataforma"];
		$nomePlataforma = $_POST['nomePlataforma']; 
		$emailPlataforma = $_POST['emailPlataforma'];
		$descricaoPlataforma = $_POST['descricaoPlataforma'];
		$comoFuncionaPlataforma = $_POST['comoFuncionaPlataforma'];
		$primeiroTelefonePlataforma = $_POST['primeiroTelefonePlataforma'];
		$linkFacebook = $_POST['linkFacebook'];
		$linkInstagram = $_POST['linkInstagram'];
		$linkSite = $_POST['linkSite'];

		
		if(!empty($idPlataforma) && !empty($nomePlataforma) && !empty($emailPlataforma) && !empty($descricaoPlataforma) && !empty($comoFuncionaPlataforma) && !empty($primeiroTelefonePlataforma) && !empty($linkFacebook) && !empty($linkInstagram) && !empty($linkSite)){
					
			$confirmacaoAlteracaoPlataforma = PlataformaFacade::getInstance()->editarDadosPlataforma($idPlataforma, $nomePlataforma, $emailPlataforma, $descricaoPlataforma, $comoFuncionaPlataforma, $primeiroTelefonePlataforma, $linkFacebook, $linkInstagram, $linkSite);
			
			if($confirmacaoAlteracaoPlataforma){ 
				
				echo"<script language='javascript' type='text/javascript'>alert('Dados da plataforma alterados com sucesso!');window.location.href='../telas/Registro.php'</script>";			
			}	
			else{ 
				echo"<script language='javascript' type='text/javascript'>alert('Houve um erro na alteração dos dados da plataforma.');window.location.href='../telas/Registro.php'</script>";
			}
		}
		//else
			//echo"<script language='javascript' type='text/javascript'>alert('Preencha todos os campos para prosseguir com a alteração dos dados da plataforma!');window.location.href='../telas/Registro.php'</script>";		
	
	}
	else
		echo"<script language='javascript' type='text/javascript'>alert('Houve um erro na alteração dos dados do endereço.');window.location.href='../telas/Registro.php'</script>";
	 
 }
/* 
 // ==================================================================================================================================================
 // ALTERAR DADOS DO ADMINISTRADOR
 // ==================================================================================================================================================
 else if(isset($_POST['alterar_administrador'])){
	 			
		$cpfAdministrador = $_POST['cpfAdministrador']; 
		$nomeAdministrador = $_POST['nomeAdministrador'];
		$emailAdministrador = $_POST['emailAdministrador'];
		$senhaAdmiistrador = $_POST['senhaAdmiistrador'];
		$primeiroTelefoneAdministrador = $_POST['primeiroTelefoneAdministrador'];
		$segundoTelefoneAdministrador = $_POST['segundoTelefoneAdministrador'];
		
		if(!empty($cpfAdministrador) && !empty($nomeAdministrador) && !empty($emailAdministrador) && !empty($senhaAdmiistrador) && !empty($primeiroTelefoneAdministrador)){
		
			$confirmacaoAlteraçãoAdministrador = AdministradorFacade::getInstance()->editarDadosAdministrador($cpfAdministrador, $nomeAdministrador, $emailAdministrador, $senhaAdmiistrador, $primeiroTelefoneAdministrador, $segundoTelefoneAdministrador);
			
			
			if($confirmacaoAlteracaoAdministrador){ 
				
				echo"<script language='javascript' type='text/javascript'>alert('Dados do Administrador alterados com sucesso!');window.location.href='../telas/Registro.php'</script>";			
			}	
			else{ 
				echo"<script language='javascript' type='text/javascript'>alert('Houve um erro na alteração dos dados do			administrador.');window.location.href='../telas/Registro.php'</script>";
			}
		}
		else
			echo"<script language='javascript' type='text/javascript'>alert('Preencha todos os campos para prossegui com a alteração dos dados do administrador!');window.location.href='../telas/Registro.php'</script>";
	
 }
 
 // ==================================================================================================================================================
 // ALTERAR DADOS DO PROFESSOR
 // ==================================================================================================================================================
 else if(isset($_POST['alterar_professor'])){
	 
		$cpfProfessor = $_POST['cpfProfessor']; 
		$nomeProfessor = $_POST['nomeProfessor'];
		$emailProfessor = $_POST['emailProfessor'];
		$senhaProfessor = $_POST['senhaProfessor'];
		$primeiroTelefoneProfessor = $_POST['primeiroTelefoneProfessor'];
		$segundoTelefoneProfessor = $_POST['segundoTelefoneProfessor'];
		
		if(!empty($cpfProfessor) && !empty($nomeProfessor) && !empty($emailProfessor) && !empty($senhaProfessor) && !empty($primeiroTelefoneProfessor)){
		
			if(empty($segundoTelefoneProfessor){
				
				$confirmacaoAlteracaoProfessor = ProfessorFacade::getInstance()->editarDadosProfessor($cpfProfessor, $nomeProfessor, $emailProfessor, $primeiroTelefoneProfessor, $segundoTelefoneProfessor);
				
			
			} else if(!empty($segundoTelefoneAdministrador){
				$confirmacaoAlteracaoProfessor = ProfessorFacade::getInstance()->editarDadosProfessor($cpfProfessor, $nomeProfessor, $emailProfessor, $primeiroTelefoneProfessor, "");
			}
			
			if($confirmacaoAlteracaoProfessor){ 
				
				echo"<script language='javascript' type='text/javascript'>alert('Dados do professor alterados com sucesso!');window.location.href='../telas/Registro.php'</script>";			
			}	
			else{ 
				echo"<script language='javascript' type='text/javascript'>alert('Houve um erro na alteração dos dados do professor.');window.location.href='../telas/Registro.php'</script>";
			}
		}
		else
			echo"<script language='javascript' type='text/javascript'>alert('Preencha todos os campos para prossegui com as alterações do dados do professor!');window.location.href='../telas/Registro.php'</script>";
	
 }
  
 // ==================================================================================================================================================
 // ALTERAR DADOS DO ALUNO
 // ==================================================================================================================================================
 else if(isset($_POST['alterar_aluno'])){
	 
	
		$cpfAluno = $_POST['cpfAluno']; 
		$nomeAluno = $_POST['nomeAluno'];
		$emailAluno = $_POST['emailAluno'];
		$senhaAluno = $_POST['senhaAluno'];
		$primeiroTelefoneAluno = $_POST['primeiroTelefoneAluno'];
		$segundoTelefoneAluno = $_POST['segundoTelefoneAluno'];
		
		if(!empty($cpfAluno) && !empty($nomeAluno) && !empty($emailAluno) && !empty($senhaAluno) && !empty($primeiroTelefoneAluno)){
		
			if(empty($segundoTelefoneAluno){
			
				$confirnacaoAlteracaoAluno = AlunoFacade::getInstance()-> editarDadosAluno($cpfAluno, $nomeAluno, $emailAluno, $primeiroTelefoneAluno, $segundoTelefoneAluno);
				
			
			} else if(!empty($segundoTelefoneAluno){
				
				$confirnacaoAlteracaoAluno = AlunoFacade::getInstance()->editarDadosAluno($cpfAluno, $nomeAluno, $emailAluno, $primeiroTelefoneAluno, $segundoTelefoneAluno);
			}
			
			if($confirnacaoAlteracaoAluno){ 
				
				echo"<script language='javascript' type='text/javascript'>alert('Dados do aluno alterados com sucesso!');window.location.href='../telas/Registro.php'</script>";			
			}	
			else{ 
				echo"<script language='javascript' type='text/javascript'>alert('Houve um erro na alteração dos dados do aluno.');window.location.href='../telas/Registro.php'</script>";
			}
		}
		else
			echo"<script language='javascript' type='text/javascript'>alert('Preencha todos os campos para prossegui com a alteração dos dados do aluno!');window.location.href='../telas/Registro.php'</script>";
	
 }
   
 // ==================================================================================================================================================
 // ALTERAR DADOS DO CURSO
 // ==================================================================================================================================================
 else if(isset($_POST['alterar_curso'])){
	$idCurso = // buscar id curso
	$nomeCurso = $_POST['nomeCurso']; 
	$descricaoCurso = $_POST['descricaoCurso'];
	$nivelDificuldadeCurso = $_POST['nivelDificuldadeCurso'];
	$cargaHorariaCurso = $_POST['cargaHorariaCurso'];
	$preRequisitosCurso = $_POST['preRequisitosCurso'];
	$modalidadeCurso = $_POST['modalidadeCurso'];
	
	if(!empty($nomeCurso) && !empty($descricaoCurso) && !empty($nivelDificuldadeCurso) && !empty($cargaHorariaCurso) && !empty($preRequisitosCurso) && !empty($modalidadeCurso)){
	
		
			$confirmacaoAlteracaoCurso = CursoFacade::getInstance()->editarDadosCurso($idCurso, $nomeCurso, $descricaoCurso, $nivelDificuldadeCurso, $cargaHorariaCurso, $preRequisitosCurso, $modalidadeCurso);
						
		
		if($confirmacaoAlteracaoCurso){ 
			
			echo"<script language='javascript' type='text/javascript'>alert('Dados do curso alterados com sucesso!');window.location.href='../telas/Registro.php'</script>";			
		}	
		else{ 
			echo"<script language='javascript' type='text/javascript'>alert('Houve um erro na alteração dos dados do curso.');window.location.href='../telas/Registro.php'</script>";
		}
	}
	else
		echo"<script language='javascript' type='text/javascript'>alert('Preencha todos os campos para prossegui com a alteração dos dado do curso!');window.location.href='../telas/Registro.php'</script>";
 }
 */
?>

