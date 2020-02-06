<?php 

// Nota, mudar window.location.href='../
// Responsaveis_Curso Pergunta Resposta Módulo
// Pesquisar id do curso

require_once($_SERVER["DOCUMENT_ROOT"]."/Projetos/"."/Projeto_Plataforma/"."Facade/EnderecoFacade.php"); 
require_once($_SERVER["DOCUMENT_ROOT"]."/Projetos/"."/Projeto_Plataforma/"."Facade/PlataformaFacade.php"); 
require_once($_SERVER["DOCUMENT_ROOT"]."/Projetos/"."/Projeto_Plataforma/"."Facade/AdministradorFacade.php"); 
require_once($_SERVER["DOCUMENT_ROOT"]."/Projetos/"."/Projeto_Plataforma/"."Facade/AlunoFacade.php"); 
require_once($_SERVER["DOCUMENT_ROOT"]."/Projetos/"."/Projeto_Plataforma/"."Facade/ProfessorFacade.php"); 
require_once($_SERVER["DOCUMENT_ROOT"]."/Projetos/"."/Projeto_Plataforma/"."Facade/CursoFacade.php"); 


 
 // ==================================================================================================================================================
 // ALTERAR ENDEREÇO
 // ==================================================================================================================================================
 
	 
	if(isset($_POST['alterar_endereco'])){ 
		$idEndereco = $_POST['idEndereco'];
		$estado = $_POST['estado'];   		
		$cidade = $_POST['cidade']; 		
		$bairro = $_POST['bairro'];   	
		$cep = $_POST['cep']; 		
		$descricao = $_POST['descricao'];   	 
		
			
		if(!empty($idEndereco) && !empty($estado) && !empty($cidade) && !empty($cep) && !empty($descricao)){				  
			$confirmacaoAlteracaoEndereco = EnderecoFacade::getInstance()->editarEndereco($estado, $cidade, $bairro, $cep, $descricao, $idEndereco);
		
		
			if($confirmacaoAlteracaoEndereco){ 
				
				echo"<script language='javascript' type='text/javascript'>alert('Endereço alterado com sucesso!');window.location.href='../telas/Registro.php'</script>";			
			}	
			else{ 
				echo"<script language='javascript' type='text/javascript'>alert('Houve um erro na alteração endereço');window.location.href='../telas/Registro.php'</script>";
			}
		} else
			echo"<script language='javascript' type='text/javascript'>alert('Preencha todos os campos para prosseguir com a alteração do endereço.');window.location.href='../telas/Registro.php'</script>";	
	}
 
  
 // ==================================================================================================================================================
 // ALTERAR DADOS DA PLATAFORMA
 // ==================================================================================================================================================
 
  if(isset($_POST['alterar_plataforma'])){
	  
		$idPlataforma = $_POST["idPlataforma"];
		$nomePlataforma = $_POST['nomePlataforma']; 
		$emailPlataforma = $_POST['emailPlataforma'];
		$descricaoPlataforma = $_POST['descricaoPlataforma'];
		$primeiroTelefonePlataforma = $_POST['primeiroTelefonePlataforma'];
		$segundoTelefonePlataforma = $_POST['segundoTelefonePlataforma'];
		
		if(!empty($idPlataforma) && !empty($nomePlataforma) && !empty($emailPlataforma) && !empty($descricaoPlataforma) && !empty($primeiroTelefonePlataforma && !empty($segundoTelefonePlataforma)){
		
			$confirmacaoAlteracaoPlataforma = PlataformaFacade::getInstance()->editarDadosPlataforma($idPlataforma, $idEnderecoPlataforma, $nomePlataforma, $emailPlataforma, $descricaoPlataforma, $primeiroTelefonePlataforma, $segundoTelefonePlataforma);
			
			if($confirmacaoAlteracaoPlataforma){ 
				
				echo"<script language='javascript' type='text/javascript'>alert('Dados da plataforma alterados com sucesso!');window.location.href='../telas/Registro.php'</script>";			
			}	
			else{ 
				echo"<script language='javascript' type='text/javascript'>alert('Houve um erro na alteração dos dados da plataforma.');window.location.href='../telas/Registro.php'</script>";
			}
		}
		else
			echo"<script language='javascript' type='text/javascript'>alert('Preencha todos os campos para prosseguir com a alteração dos dados da plataforma!');window.location.href='../telas/Registro.php'</script>";		
	
	 
	 
 }
 
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
?>

