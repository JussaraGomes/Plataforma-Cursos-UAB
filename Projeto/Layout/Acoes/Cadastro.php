<?php 

// Nota, mudar window.location.href='../
// Responsaveis_Curso Pergunta Resposta Módulo
// criar if para verificar formato dos arquivos que podem ser usados na aula
// capturar data do sistema

require_once($_SERVER["DOCUMENT_ROOT"]."/Projetos/"."/Projeto_Plataforma/"."Facade/EnderecoFacade.php"); 
require_once($_SERVER["DOCUMENT_ROOT"]."/Projetos/"."/Projeto_Plataforma/"."Facade/PlataformaFacade.php"); 
require_once($_SERVER["DOCUMENT_ROOT"]."/Projetos/"."/Projeto_Plataforma/"."Facade/AdministradorFacade.php"); 
require_once($_SERVER["DOCUMENT_ROOT"]."/Projetos/"."/Projeto_Plataforma/"."Facade/AlunoFacade.php"); 
require_once($_SERVER["DOCUMENT_ROOT"]."/Projetos/"."/Projeto_Plataforma/"."Facade/ProfessorFacade.php"); 
require_once($_SERVER["DOCUMENT_ROOT"]."/Projetos/"."/Projeto_Plataforma/"."Facade/CursoFacade.php"); 


 $idEndereco = "";
 
 // ==================================================================================================================================================
 // CADASTRO ENDEREÇO
 // ==================================================================================================================================================
 function cadastrarEndereco(){
	 
	if(isset($_POST['cadastrar_endereco'])){ 
	
		$estado = $_POST['estado'];   		
		$cidade = $_POST['cidade']; 		
		$bairro = $_POST['bairro'];   	
		$cep = $_POST['cep']; 		
		$descricao = $_POST['descricao'];   	 
		
			
		if(!empty($estado) && !empty($cidade) && !empty($cep) && !empty($descricao)) 				  
			return EnderecoFacade::getInstance()->cadastrarEndereco($estado, $cidade, $bairro, $cep, $descricao);
		else
			return false;
	}
 }
  
  if(isset($_POST['cadastrar_plataforma'])){
	 
	if(cadastrarEndereco()){
		
		$idEnderecoPlataforma =  // pega como retorno o id do endereco criado
		$nomePlataforma = $_POST['nomePlataforma']; 
		$emailPlataforma = $_POST['emailPlataforma'];
		$descricaoPlataforma = $_POST['descricaoPlataforma'];
		$primeiroTelefonePlataforma = $_POST['primeiroTelefonePlataforma'];
		$segundoTelefonePlataforma = $_POST['segundoTelefonePlataforma'];
		
		if(!empty($idEnderecoPlataforma) && !empty($nomePlataforma) && !empty($emailPlataforma) && !empty($descricaoPlataforma) && !empty($primeiroTelefonePlataforma && !empty($segundoTelefonePlataforma)){
		
			$confirmacaoCadPlataforma = PlataformaFacade::getInstance()->adicionarPlataforma($idEnderecoPlataforma, $nomePlataforma, $emailPlataforma, $descricaoPlataforma, $primeiroTelefonePlataforma, $segundoTelefonePlataforma);
			
			if($confirmacaoCadPlataforma){ 
				
				echo"<script language='javascript' type='text/javascript'>alert('Cadastro de plataforma realizado com sucesso!');window.location.href='../telas/Registro.php'</script>";			
			}	
			else{ 
				echo"<script language='javascript' type='text/javascript'>alert('Houve um erro no cadastro da plataforma.');window.location.href='../telas/Registro.php'</script>";
			}
		}
		else
			echo"<script language='javascript' type='text/javascript'>alert('Preencha todos os campos para prossegui com o cadastro da plataforma!');window.location.href='../telas/Registro.php'</script>";		
	}
	else
		echo"<script language='javascript' type='text/javascript'>alert('Houve um erro no cadastro do seu endereço.');window.location.href='../telas/Registro.php'</script>";
	 	 
 }
 
 // ==================================================================================================================================================
 // CADASTRO ADMINISTRADOR
 // ==================================================================================================================================================
 else if(isset($_POST['cadastrar_administrador'])){
	 
	if(cadastrarEndereco()){
			
		$idEnderecoAdministrador =  // pega como retorno o id do endereco criado
		$cpfAdministrador = $_POST['cpfAdministrador']; 
		$nomeAdministrador = $_POST['nomeAdministrador'];
		$emailAdministrador = $_POST['emailAdministrador'];
		$senhaAdmiistrador = $_POST['senhaAdmiistrador'];
		$primeiroTelefoneAdministrador = $_POST['primeiroTelefoneAdministrador'];
		$segundoTelefoneAdministrador = $_POST['segundoTelefoneAdministrador'];
		
		if(!empty($idEnderecoAdministrador) && !empty($cpfAdministrador) && !empty($nomeAdministrador) && !empty($emailAdministrador) && !empty($senhaAdmiistrador) && !empty($primeiroTelefoneAdministrador)){
		
			if(empty($segundoTelefoneAdministrador){
				
				$confirmacaoCadAdministrador = AdministradorFacade::getInstance()->cadastrarAdministrador($cpfAdministrador, $idEnderecoAdministrador, $nomeAdministrador, $emailAdministrador, $senhaAdmiistrador, $primeiroTelefoneAdministrador);
			
			} else if(!empty($segundoTelefoneAdministrador){
			
				$confirmacaoCadAdministrador = AdministradorFacade::getInstance()->cadastrarAdministrador_($cpfAdministrador, $idEnderecoAdministrador, $nomeAdministrador, $emailAdministrador, $senhaAdmiistrador, $primeiroTelefoneAdministrador, $segundoTelefoneAdministrador);
			}
			
			if($confirmacaoCadAdministrador){ 
				
				echo"<script language='javascript' type='text/javascript'>alert('Cadastro de Administrador realizado com sucesso!');window.location.href='../telas/Registro.php'</script>";			
			}	
			else{ 
				echo"<script language='javascript' type='text/javascript'>alert('Houve um erro no cadastro do novo administrador.');window.location.href='../telas/Registro.php'</script>";
			}
		}
		else
			echo"<script language='javascript' type='text/javascript'>alert('Preencha todos os campos para prossegui com o cadastro do novo administrador!');window.location.href='../telas/Registro.php'</script>";
	}	
	else
		echo"<script language='javascript' type='text/javascript'>alert('Houve um erro no cadastro do seu endereço.');window.location.href='../telas/Registro.php'</script>";
 }
 
 // ==================================================================================================================================================
 // CADASTRO PROFESSOR
 // ==================================================================================================================================================
 else if(isset($_POST['cadastrar_professor'])){
	 
	if(cadastrarEndereco()){
		
		$idEnderecoProfessor =  // pega como retorno o id do endereco criado
		$cpfProfessor = $_POST['cpfProfessor']; 
		$nomeProfessor = $_POST['nomeProfessor'];
		$emailProfessor = $_POST['emailProfessor'];
		$senhaProfessor = $_POST['senhaProfessor'];
		$primeiroTelefoneProfessor = $_POST['primeiroTelefoneProfessor'];
		$segundoTelefoneProfessor = $_POST['segundoTelefoneProfessor'];
		
		if(!empty($idEnderecoProfessor) && !empty($cpfProfessor) && !empty($nomeProfessor) && !empty($emailProfessor) && !empty($senhaProfessor) && !empty($primeiroTelefoneProfessor)){
		
			if(empty($segundoTelefoneProfessor){
				
				$confirmacaoCadProfessor = ProfessorFacade::getInstance()->adicionarNovoProfessor($cpfProfessor, $idEnderecoProfessor, $nomeProfessor, $emailProfessor, $senhaProfessor, $primeiroTelefoneProfessor);
			
			} else if(!empty($segundoTelefoneAdministrador){
			
				$confirmacaoCadProfessor = ProfessorFacade::getInstance()->adicionarNovoProfessor_($cpfProfessor, $idEnderecoProfessor, $nomeProfessor, $emailProfessor, $senhaProfessor, $primeiroTelefoneProfessor, $segundoTelefoneProfessor);
			}
			
			if($confirmacaoCadProfessor){ 
				
				echo"<script language='javascript' type='text/javascript'>alert('Cadastro de Professor realizado com sucesso!');window.location.href='../telas/Registro.php'</script>";			
			}	
			else{ 
				echo"<script language='javascript' type='text/javascript'>alert('Houve um erro no cadastro do novo professor.');window.location.href='../telas/Registro.php'</script>";
			}
		}
		else
			echo"<script language='javascript' type='text/javascript'>alert('Preencha todos os campos para prossegui com o cadastro do novo professor!');window.location.href='../telas/Registro.php'</script>";
	}	
	else
		echo"<script language='javascript' type='text/javascript'>alert('Houve um erro no cadastro do seu endereço.');window.location.href='../telas/Registro.php'</script>";
 }
  
 // ==================================================================================================================================================
 // CADASTRO ALUNO
 // ==================================================================================================================================================
 else if(isset($_POST['cadastrar_aluno'])){
	 
	if(cadastrarEndereco()){
		$idEnderecoAluno =  // pega como retorno o id do endereco criado
		$cpfAluno = $_POST['cpfAluno']; 
		$nomeAluno = $_POST['nomeAluno'];
		$emailAluno = $_POST['emailAluno'];
		$senhaAluno = $_POST['senhaAluno'];
		$primeiroTelefoneAluno = $_POST['primeiroTelefoneAluno'];
		$segundoTelefoneAluno = $_POST['segundoTelefoneAluno'];
		
		if(!empty($idEnderecoAluno) && !empty($cpfAluno) && !empty($nomeAluno) && !empty($emailAluno) && !empty($senhaAluno) && !empty($primeiroTelefoneAluno)){
		
			if(empty($segundoTelefoneAluno){
				
				$confirmacaoCadAluno = AlunoFacade::getInstance()->adicionarNovoAluno($cpfAluno, $idEnderecoAluno, $nomeAluno, $emailAluno, $senhaAluno, $primeiroTelefoneAluno);
				
				
			} else if(!empty($segundoTelefoneAluno){
				
				$confirmacaoCadAluno = AlunoFacade::getInstance()->adicionarNovoAluno_($cpfAluno, $idEnderecoAluno, $nomeAluno, $emailAluno, $senhaAluno, $primeiroTelefoneAluno, $segundoTelefoneAluno);
			
			}
			
			if($confirmacaoCadAluno){ 
				
				echo"<script language='javascript' type='text/javascript'>alert('Cadastro de aluno realizado com sucesso!');window.location.href='../telas/Registro.php'</script>";			
			}	
			else{ 
				echo"<script language='javascript' type='text/javascript'>alert('Houve um erro no cadastro do novo aluno.');window.location.href='../telas/Registro.php'</script>";
			}
		}
		else
			echo"<script language='javascript' type='text/javascript'>alert('Preencha todos os campos para prossegui com o cadastro do novo aluno!');window.location.href='../telas/Registro.php'</script>";
	}	
	else
		echo"<script language='javascript' type='text/javascript'>alert('Houve um erro no cadastro do seu endereço.');window.location.href='../telas/Registro.php'</script>";
 }
   
 // ==================================================================================================================================================
 // CADASTRO CURSO
 // ==================================================================================================================================================
 else if(isset($_POST['cadastrar_curso'])){
	 
	$nomeCurso = $_POST['nomeCurso']; 
	$descricaoCurso = $_POST['descricaoCurso'];
	$nivelDificuldadeCurso = $_POST['nivelDificuldadeCurso'];
	$cargaHorariaCurso = $_POST['cargaHorariaCurso'];
	$preRequisitosCurso = $_POST['preRequisitosCurso'];
	$modalidadeCurso = $_POST['modalidadeCurso'];
	
	if(!empty($nomeCurso) && !empty($descricaoCurso) && !empty($nivelDificuldadeCurso) && !empty($cargaHorariaCurso) && !empty($preRequisitosCurso) && !empty($modalidadeCurso)){
	
		
			$confirmacaoCadCurso = CursoFacade::getInstance()->adicionarNovoCurso($nomeCurso, $descricaoCurso, $nivelDificuldadeCurso, $cargaHorariaCurso, $preRequisitosCurso, $modalidadeCurso);
		
		
		if($confirmacaoCadCurso){ 
			
			echo"<script language='javascript' type='text/javascript'>alert('Curso cadastrado com sucesso!');window.location.href='../telas/Registro.php'</script>";			
		}	
		else{ 
			echo"<script language='javascript' type='text/javascript'>alert('Houve um erro no cadastro do  curso.');window.location.href='../telas/Registro.php'</script>";
		}
	}
	else
		echo"<script language='javascript' type='text/javascript'>alert('Preencha todos os campos para prossegui com o cadastro do novo curso!');window.location.href='../telas/Registro.php'</script>";
 }
 
 // ==================================================================================================================================================
 // CADASTRO AULA
 // ==================================================================================================================================================
  else if(isset($_POST['cadastrar_aula'])){
	 
	$idModuloAula = $_POST['idModulo']; 
	$nomeAula = $_POST['nomeAula'];
	
	if(!empty($idModuloAula) && !empty($nomeAula)){
	
		
			$confirmacaoCadAula = AulaFacade::getInstance()->adicionarNovaAula($idModuloAula, $nomeAula);
		
		
		if($confirmacaoCadAula){ 
			
			echo"<script language='javascript' type='text/javascript'>alert('Aula Cadastrada com sucesso!');window.location.href='../telas/Registro.php'</script>";			
		}	
		else{ 
			echo"<script language='javascript' type='text/javascript'>alert('Houve um erro no cadastro da  aula.');window.location.href='../telas/Registro.php'</script>";
		}
	}
	else
		echo"<script language='javascript' type='text/javascript'>alert('Preencha todos os campos para prossegui com o cadastro da nova aula!');window.location.href='../telas/Registro.php'</script>";
 }
  
 // ==================================================================================================================================================
 // CADASTRO MATERIAL DE AULA
 // ==================================================================================================================================================
  else if(isset($_POST['cadastrar_material'])){
	 
	$idAulaModulo = $_POST['idModulo']; 
	$nomeMaterialModulo = $_POST['nomeAula'];
	$tipoMaterial = $_POST['tipoMaterial'];
	$arquivoMaterial = $_POST['arquivoMaterial'];
	
	if(!empty($idModuloAula) && !empty($nomeAula)){
	
		
			$confirmacaoCadMaterial = MaterialFacade::getInstance()->adicionarNovoMaterial($idAulaModulo, $nomeMaterialModulo, $tipoMaterial, $arquivoMaterial);
		
		
		if($confirmacaoCadMaterial){ 
			
			echo"<script language='javascript' type='text/javascript'>alert('Material da aula cadastrado com sucesso!');window.location.href='../telas/Registro.php'</script>";			
		}	
		else{ 
			echo"<script language='javascript' type='text/javascript'>alert('Houve um erro no cadastro dos materiais da  aula.');window.location.href='../telas/Registro.php'</script>";
		}
	}
	else
		echo"<script language='javascript' type='text/javascript'>alert('Preencha todos os campos para prossegui com o cadastro dos materiais da aula.');window.location.href='../telas/Registro.php'</script>";
 }
  
 // ==================================================================================================================================================
 // CADASTRO AVALIAÇÃO
 // ==================================================================================================================================================
  else if(isset($_POST['cadastrar_avaliacao'])){
	 
	$idMatricula_Avaliacao = $_POST['idMatricula_Avaliacao']; 
	$idProva_Avaliacao = $_POST['idProva_Avaliacao'];
	$nota_Avaliacao = $_POST['nota_Avaliacao'];
	
	if(!empty($idMatricula_Avaliacao) && !empty($idProva_Avaliacao) && !empty($nota_Avaliacao)){
	
		
			$confirmacaoCadAvaliacao = AvaliacaoFacade::getInstance()->adicionarNovoMaterial($idAula, $nomeMaterial, $tipoMaterial, $arquivo);
			
		
		if($confirmacaoCadAvaliacao){ 
			
			echo"<script language='javascript' type='text/javascript'>alert('Avaliação cadastrada com sucesso!');window.location.href='../telas/Registro.php'</script>";			
		}	
		else{ 
			echo"<script language='javascript' type='text/javascript'>alert('Houve um erro no cadastro da avaliação.');window.location.href='../telas/Registro.php'</script>";
		}
	}
	else
		echo"<script language='javascript' type='text/javascript'>alert('Preencha todos os campos para prossegui com o cadastro da nova avaliação!');window.location.href='../telas/Registro.php'</script>";
 }
 
 // ==================================================================================================================================================
 // CADASTRO MATRICULA
 // ==================================================================================================================================================
  else if(isset($_POST['cadastrar_matricula'])){
	 
	$idCurso_Matricula = $_POST['idCurso_Matricula']; 
	$cpfAluno_Matricula = $_POST['cpfAluno_Matricula'];
	$dataMatricula_Matricula = $_POST['dataMatricula_Matricula'];
	
	if(!empty($idCurso_Matricula) && !empty($cpfAluno_Matricula) && !empty($dataMatricula_Matricula)){
	
		
			$confirmacaoCadMatricula = MatriculaFacade::getInstance()->adicionarnovaMatricula($idCurso_Matricula, $cpfAluno_Matricula, $dataMatricula_Matricula);
			
		
		if($confirmacaoCadMatricula){ 
			
			echo"<script language='javascript' type='text/javascript'>alert('Matricula cadastrada com sucesso!');window.location.href='../telas/Registro.php'</script>";			
		}	
		else{ 
			echo"<script language='javascript' type='text/javascript'>alert('Houve um erro no cadastro da nova matricula.');window.location.href='../telas/Registro.php'</script>";
		}
	}
	else
		echo"<script language='javascript' type='text/javascript'>alert('Preencha todos os campos para prossegui com o cadastro da nova matricula!');window.location.href='../telas/Registro.php'</script>";
 }
 
 // ==================================================================================================================================================
 // CADASTRO PERGUNTA
 // ==================================================================================================================================================
  else if(isset($_POST['cadastrar_pergunta'])){
	 
	$idCurso_Pergunta = $_POST['idCurso_Pergunta']; 
	$textoPergunta_Pergunta = $_POST['textoPergunta_Pergunta'];
	$dataPergunta_Pergunta = // buscar no sistema 
	
	if(!empty($idCurso_Pergunta) && !empty($textoPergunta_Pergunta) && !empty($dataPergunta_Pergunta)){
	
		
			$confirmacaoCadPergunta = PerguntaFacade::getInstance()->adicionarPergunta($idCurso_Pergunta, $textoPergunta_Pergunta, $dataPergunta_Pergunta);
			
		
		if($confirmacaoCadPergunta){ 
			
			echo"<script language='javascript' type='text/javascript'>alert('Pergunta cadastrada com sucesso!');window.location.href='../telas/Registro.php'</script>";			
		}	
		else{ 
			echo"<script language='javascript' type='text/javascript'>alert('Houve um erro no cadastro da nova pergunta.');window.location.href='../telas/Registro.php'</script>";
		}
	}
	else
		echo"<script language='javascript' type='text/javascript'>alert('Preencha todos os campos para prossegui com o cadastro da nova pergunta!');window.location.href='../telas/Registro.php'</script>";
 }
?>


