<?php 

// Nota, mudar window.location.href='../
// Responsaveis_Curso Pergunta Resposta Módulo
// criar if para verificar formato dos arquivos que podem ser usados na aula
// capturar data do sistema

require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Facade/EnderecoFacade.php"); 
require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Facade/ColaboradorFacade.php"); 
require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Facade/NoticiaFacade.php"); 
require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Facade/PlataformaFacade.php"); 
require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Facade/AdministadorFacade.php"); 
require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Facade/AlunoFacade.php"); 
require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Facade/ProfessorFacade.php"); 
require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Facade/CursoFacade.php"); 

$window_location_href = "../Geral_Index.php";
$mensagem = "";

 // ==================================================================================================================================================
 // CADASTRO ENDEREÇO
 // ==================================================================================================================================================
 function cadastrarEndereco(){
		$estado = $_POST['estado'];   		
		$logadouro = $_POST['logadouro'];   		
		$cidade = $_POST['cidade']; 		
		$bairro = $_POST['bairro'];   	
		$cep = $_POST['cep']; 		
		$descricao = $_POST['descricao'];   	 
					
		if(!empty($estado) && !empty($logadouro) && !empty($cidade) && !empty($cep) && !empty($descricao)) 			
			return EnderecoFacade::getInstance()->cadastrarEndereco($estado, $logadouro, $cidade, $bairro, $cep, $descricao);
		else
			return -1;	
 }
 
 // ==================================================================================================================================================
 // CADASTRO ADMINISTRADOR
 // ==================================================================================================================================================
 if(isset($_POST['cadastrar_administrador'])){
	
	$window_location_href = "../Geral_Login.php";
 
	$idEnderecoAdministrador = cadastrarEndereco();

	if($idEnderecoAdministrador <> -1){
			
		$cpfAdministrador = $_POST['cpfAdministrador']; 
		$nomeAdministrador = $_POST['nomeAdministrador'];
		$emailAdministrador = $_POST['emailAdministrador'];
		$senhaAdmiistrador = $_POST['senhaAdministrador'];
		$telefone = $_POST['telefone'];
		
		if(!empty($cpfAdministrador) && !empty($nomeAdministrador) && !empty($emailAdministrador) && !empty($senhaAdmiistrador) && !empty($telefone)){
					
			$confirmacaoCadAdministrador = AdministadorFacade::getInstance()->cadastrarAdministrador($cpfAdministrador, $idEnderecoAdministrador, $nomeAdministrador, $emailAdministrador, $senhaAdmiistrador, $telefone);
								
			$mensagem = $confirmacaoCadAdministrador ? "CADASTRO DE ADMINISTRADOR REALIZADO COM SUCESSO!" : "HOUVE UM ERRO NO CADASTRO DO ADMINISTRADOR.";
		}
		else
			$mensagem = "PREENCHA TODOS OS CAMPOS ANTES DE PROCEGUIR.";		
	}
	else
		$mensagem = "HOUVE UM ERRO NO CADASTRO DO ENDEREÇO";
 }
 
 // ==================================================================================================================================================
 // CADASTRO PROFESSOR
 // ==================================================================================================================================================
 else if(isset($_POST['cadastrar_professor'])){
	 	
	$window_location_href = "../Geral_Login.php";

	$idEnderecoProfessor = cadastrarEndereco();

	if($idEnderecoProfessor <> -1){
		
		$cpfProfessor = $_POST['cpfProfessor']; 
		$nomeProfessor = $_POST['nomeProfessor'];
		$emailProfessor = $_POST['emailProfessor'];
		$senhaProfessor = $_POST['senhaProfessor'];
		$primeiroTelefoneProfessor = $_POST['telefone'];
		
		if(!empty($idEnderecoProfessor) && !empty($cpfProfessor) && !empty($nomeProfessor) && !empty($emailProfessor) && !empty($senhaProfessor) && !empty($primeiroTelefoneProfessor) && (isset($_FILES['imagemProfessor']['name']) && $_FILES['imagemProfessor']['error'] == 0)){
				
				
			$arquivo_tmp = $_FILES[ 'imagemProfessor' ][ 'tmp_name' ];
			$nomeFT      = $_FILES[ 'imagemProfessor' ][ 'name' ];
				
			$extensao = pathinfo($nomeFT, PATHINFO_EXTENSION); 	// Pega a extensão		
			$extensao = strtolower($extensao);               	// Converte a extensão para minúsculo
			
			if ( strstr('.jpg;.jpeg;.gif;.png', $extensao)) { 	// Somente imagens, .jpg;.jpeg;.gif;.png
			
				$nomeFoto = md5($cpfProfessor. $nomeProfessor).".".$extensao;
				
				$url_foto = $_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Uploads/Professores/".$nomeFoto; 

				if (@move_uploaded_file($arquivo_tmp, $url_foto)){  					
							
					$confirmacaoCadProfessor = ProfessorFacade::getInstance()->adicionarNovoProfessor($cpfProfessor, $idEnderecoProfessor, $nomeProfessor, $emailProfessor, $senhaProfessor, $primeiroTelefoneProfessor, $url_foto);
														
					$mensagem = $confirmacaoCadProfessor ? "CADASTRO DE PROFESSOR REALIZADO COM SUCESSO!" : "HOUVE UM ERRO NO CADASTRO DO PROFESSOR.";
				
				}
				else
					$mensagem = "HOUVE UM ERRO DURANTE O UPLOAD DA IMAGEM.";		
			}
			else
				$mensagem = "É PRECISO ANEXAR UM ARQUIVO DE IMAGEM. EXTENSÕES PERMITIDAS: .jpg .jpeg .gif .png";				
		}
		else
			$mensagem = "PREENCHA TODOS OS CAMPOS ANTES DE PROCEGUIR.";		
	}
	else
		$mensagem = "HOUVE UM ERRO NO CADASTRO DO ENDEREÇO";
 }
  
 // ==================================================================================================================================================
 // CADASTRO ALUNO
 // ==================================================================================================================================================
 else if(isset($_POST['cadastrar_aluno'])){
	
	$window_location_href = "../Aluno_Login.php";

	$idEnderecoAluno = cadastrarEndereco();

	if($idEnderecoAluno <> -1){
		$cpfAluno = $_POST['cpfAluno']; 
		$nomeAluno = $_POST['nomeAluno'];
		$emailAluno = $_POST['emailAluno'];
		$senhaAluno = $_POST['senhaAluno'];
		$telefone = $_POST['telefone'];
		
		
		if(!empty($cpfAluno) && !empty($nomeAluno) && !empty($emailAluno) && !empty($senhaAluno) && !empty($telefone)){
						
			$confirmacaoCadAluno = AlunoFacade::getInstance()->adicionarNovoAluno($cpfAluno, $idEnderecoAluno, $nomeAluno, $emailAluno, $senhaAluno, $telefone);
			
			$mensagem = $confirmacaoCadAluno ? "CADASTRO DE ALUNO REALIZADO COM SUCESSO!" : "HOUVE UM ERRO NO CADASTRO DO ALUNO.";
		}
		else
			$mensagem = "PREENCHA TODOS OS CAMPOS ANTES DE PROCEGUIR.";		
	}	
	else
		$mensagem = "HOUVE UM ERRO NO CADASTRO DO ENDEREÇO.";
 }
   
 // ==================================================================================================================================================
 // CADASTRO COLABORADOR
 // ==================================================================================================================================================
 else if(isset($_POST['cadastrar_colaborador'])){
	
	$idEnderecoColaborador = cadastrarEndereco();

	if($idEnderecoColaborador <> -1){
		
		$nomeColaborador = $_POST['nomeColaborador']; 
		$emailColaborador = $_POST['emailColaborador'];
		$primeiroTelefoneColaborador = $_POST['primeiroTelefone'];
		$nomeFuncao = $_POST['funcao'];
		$descricaoFuncao = $_POST['descricaoFuncao'];		
		$colaboradorCPF = $_POST['colaboradorCPF']; 

	
		if(!empty($nomeColaborador) && !empty($colaboradorCPF) && !empty($emailColaborador) && !empty($primeiroTelefoneColaborador)  && !empty($nomeFuncao) && !empty($descricaoFuncao) && (isset($_FILES['imagemColaborador']['name']) && $_FILES['imagemColaborador']['error'] == 0)){
						

			$arquivo_tmp = $_FILES[ 'imagemColaborador' ][ 'tmp_name' ];
			$nomeFT      = $_FILES[ 'imagemColaborador' ][ 'name' ];
				
			$extensao = pathinfo($nomeFT, PATHINFO_EXTENSION); 	// Pega a extensão		
			$extensao = strtolower($extensao);               	// Converte a extensão para minúsculo
			
			if ( strstr('.jpg;.jpeg;.gif;.png', $extensao)) { 	// Somente imagens, .jpg;.jpeg;.gif;.png
			
				$nomeFoto = md5($colaboradorCPF. $nomeColaborador).".".$extensao;
				
				$url_foto = $_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Uploads/Colaboradores/".$nomeFoto; 

				if (@move_uploaded_file($arquivo_tmp, $url_foto)){  
					
					$confirmacaoCadColaborador = ColaboradorFacade::getInstance()->adicionarNovoColaborador($colaboradorCPF, $idEnderecoColaborador, $nomeColaborador, $emailColaborador, $primeiroTelefoneColaborador, $nomeFuncao, $descricaoFuncao, $nomeFoto);
					
					$mensagem = $confirmacaoCadColaborador ? "CADASTRO DE COLABORADOR REALIZADO COM SUCESSO!" : "HOUVE UM ERRO NO CADASTRO DO COLABORADOR.";
				
				}
				else
					$mensagem = "HOUVE UM ERRO DURANTE O UPLOAD DA IMAGEM.";		
			}
			else
				$mensagem = "É PRECISO ANEXAR UM ARQUIVO DE IMAGEM. EXTENSÕES PERMITIDAS: .jpg .jpeg .gif .png";				
		}
		else
			$mensagem = "PREENCHA TODOS OS CAMPOS ANTES DE PROCEGUIR.";		
	}	
	else
		$mensagem = "HOUVE UM ERRO NO CADASTRO DO ENDEREÇO.";		
 }
   
 // ==================================================================================================================================================
 // CADASTRO Notícia
 // ==================================================================================================================================================
 else if(isset($_POST['cadastrar_noticia'])){

	$tituloNoticia = $_POST['tituloNoticia']; 
	$dataPublicacaoNoticia = $_POST['dataPublicacao'];
	$breveDescricaoNoticia = $_POST['breveDescricao'];
	$corpoNoticia = $_POST['corpoNoticia'];
		
	
	if(!empty($tituloNoticia) && !empty($dataPublicacaoNoticia) && !empty($breveDescricaoNoticia) && !empty($corpoNoticia)){
			
		$confirmacaoCadNoticia = false;
		
		//Não é obrigatório anexar foto				
		if (isset($_FILES['imagemNoticia']['name']) && $_FILES['imagemNoticia']['error'] == 0) {

			$arquivo_tmp = $_FILES[ 'imagemNoticia' ][ 'tmp_name' ];
			$nomeFT      = $_FILES[ 'imagemNoticia' ][ 'name' ];
				
			$extensao = pathinfo($nomeFT, PATHINFO_EXTENSION); 	// Pega a extensão		
			$extensao = strtolower($extensao);               	// Converte a extensão para minúsculo
			
			if ( strstr('.jpg;.jpeg;.gif;.png', $extensao)) { 	// Somente imagens, .jpg;.jpeg;.gif;.png
			
				$nomeFoto = md5($tituloNoticia. $dataPublicacaoNoticia).".".$extensao;
				
				$url_foto = $_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Uploads/Noticias/".$nomeFoto; 

				if (@move_uploaded_file($arquivo_tmp, $url_foto))  
					$confirmacaoCadNoticia = NoticiaFacade::getInstance()->adicionarNovaNoticia($tituloNoticia, $breveDescricaoNoticia, $corpoNoticia, $dataPublicacaoNoticia, $nomeFoto);				
				else
					$mensagem = "HOUVE UM ERRO DURANTE O UPLOAD DA IMAGEM.";		
			}
			else
				$mensagem = "É PRECISO ANEXAR UM ARQUIVO DE IMAGEM. EXTENSÕES PERMITIDAS: .jpg .jpeg .gif .png";		
		}
		else			
			$confirmacaoCadNoticia = NoticiaFacade::getInstance()->adicionarNovaNoticia($tituloNoticia, $breveDescricaoNoticia, $corpoNoticia, $dataPublicacaoNoticia, null);
		
		
		$mensagem = $confirmacaoCadNoticia ? "CADASTRO DE NOTÍCIA REALIZADO COM SUCESSO!" : "HOUVE UM ERRO NO CADASTRO DA NOTÍCIA.";
		
	}
	else
		$mensagem = "PREENCHA TODOS OS CAMPOS ANTES DE PROCEGUIR.";		
	
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
	
	if(!empty($nomeCurso) && !empty($descricaoCurso) && !empty($nivelDificuldadeCurso) && !empty($cargaHorariaCurso) && !empty($preRequisitosCurso) && !empty($modalidadeCurso) && (isset($_FILES['imagemCurso']['name']) && $_FILES['imagemCurso']['error'] == 0)){
						
			$arquivo_tmp = $_FILES[ 'imagemCurso' ][ 'tmp_name' ];
			$nomeFT      = $_FILES[ 'imagemCurso' ][ 'name' ];
				
			$extensao = pathinfo($nomeFT, PATHINFO_EXTENSION); 	// Pega a extensão		
			$extensao = strtolower($extensao);               	// Converte a extensão para minúsculo
			
	
			if ( strstr('.jpg;.jpeg;.gif;.png', $extensao)) { 	// Somente imagens, .jpg;.jpeg;.gif;.png
			
				$nomeFoto = md5($nomeCurso).".".$extensao;
				
				$url_foto = $_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Uploads/Cursos/".$nomeFoto; 

				if (@move_uploaded_file($arquivo_tmp, $url_foto)){  
					
					$confirmacaoCadCurso = CursoFacade::getInstance()->adicionarNovoCurso($nomeCurso, $descricaoCurso, $nivelDificuldadeCurso, $cargaHorariaCurso, $preRequisitosCurso, $modalidadeCurso, $nomeFoto);	
					
					$mensagem = $confirmacaoCadCurso ? "CADASTRO DE CURSO REALIZADO COM SUCESSO!" : "HOUVE UM ERRO NO CADASTRO DO CURSO.";
				
				}else
					$mensagem = "HOUVE UM ERRO DURANTE O UPLOAD DA IMAGEM.";		
			}
			else
				$mensagem = "É PRECISO ANEXAR UM ARQUIVO DE IMAGEM. EXTENSÕES PERMITIDAS: .jpg .jpeg .gif .png";		
	}
	else
		$mensagem = "PREENCHA TODOS OS CAMPOS ANTES DE PROCEGUIR.";		
 }
 
 // ==================================================================================================================================================
 // CADASTRO AULA
 // ==================================================================================================================================================
  else if(isset($_POST['cadastrar_aula'])){
	 
	$idModuloAula = $_POST['idModulo']; 
	$nomeAula = $_POST['nomeAula'];
	
	if(!empty($idModuloAula) && !empty($nomeAula)){

		$confirmacaoCadAula = AulaFacade::getInstance()->adicionarNovaAula($idModuloAula, $nomeAula);
		
		$mensagem = $confirmacaoCadAula ? "CADASTRO DE AULA REALIZADO COM SUCESSO!" : "HOUVE UM ERRO NO CADASTRO DA AULA.";

	}
	else
		$mensagem = "PREENCHA TODOS OS CAMPOS ANTES DE PROCEGUIR.";		
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
		
		$mensagem = $confirmacaoCadMaterial ? "CADASTRO DE MATERIAL REALIZADO COM SUCESSO!" : "HOUVE UM ERRO NO CADASTRO DO MATERIAL.";

	}
	else
		$mensagem = "PREENCHA TODOS OS CAMPOS ANTES DE PROCEGUIR.";		
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
			
		$mensagem = $confirmacaoCadAvaliacao ? "CADASTRO DE AVALIACAO REALIZADO COM SUCESSO!" : "HOUVE UM ERRO NO CADASTRO DO MATERIAL.";

	}
	else
		$mensagem = "PREENCHA TODOS OS CAMPOS ANTES DE PROCEGUIR.";		
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
	
		$mensagem = $confirmacaoCadMatricula ? "MATRICULA REALIZADA COM SUCESSO!" : "HOUVE UM ERRO NA REALIZAÇÃO DA MATRICULA.";			
	
	}
	else
		$mensagem = "PREENCHA TODOS OS CAMPOS ANTES DE PROCEGUIR.";		
 }
 
 // ==================================================================================================================================================
 // CADASTRO PERGUNTA
 // ==================================================================================================================================================
  /*else if(isset($_POST['cadastrar_pergunta'])){
	 
	$idCurso_Pergunta = $_POST['idCurso_Pergunta']; 
	$textoPergunta_Pergunta = $_POST['textoPergunta_Pergunta'];
	$dataPergunta_Pergunta = // buscar no sistema 
	
	if(!empty($idCurso_Pergunta) && !empty($textoPergunta_Pergunta) && !empty($dataPergunta_Pergunta)){
		
		$confirmacaoCadPergunta = PerguntaFacade::getInstance()->adicionarPergunta($idCurso_Pergunta, $textoPergunta_Pergunta, $dataPergunta_Pergunta);
			
		$mensagem = $confirmacaoCadPergunta ? "PERGURA REALIZADA COM SUCESSO!" : "HOUVE UM ERRO NA REALIZAÇÃO DA PERGUNTA.";
		
	}
	else
		echo"<script language='javascript' type='text/javascript'>alert('Preencha todos os campos para prossegui com o cadastro da nova pergunta!');window.location.href='../telas/Registro.php'</script>";
 }
 */
 
	$window_location_href = $window_location_href."?returnMessage=".base64_encode($mensagem);
	
 	echo"<script language='javascript' type='text/javascript'> window.location.href='", $window_location_href, "'</script>";	

 
 
?>


