<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/Projetos/"."/PetshApp/"."Layout/Acoes/PHPMailer/PHPMailerAutoload.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Projetos/"."/PetshApp/"."Facade/ClienteFacade.php");

// Corrigir linhas: 14, 30, 31, 35, 36, 37

if(isset($_POST['recuperarSenha'])){
	
	$cpf = $_POST["cpfUsuario"];
	$tipoUsuario = $_POST["tipoUsuario"];
	
	$senha = rand(100000,999999);
    
	$retorno = //verifica a existencia de um usuário (criar if para direcionar busca)
	
	if($retorno){
		$usuario = // busca usuário	 (criar if)
		
		// Inicia a classe PHPMailer
		$mail = new PHPMailer(true);
		 
		// Define os dados do servidor e tipo de conexão
		// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		$mail->IsSMTP(); // Define que a mensagem será SMTP

		try {
			 $mail->Host = 'smtp.gmail.com'; 				// Endereço do servidor SMTP (Autenticação, utilize o host smtp.seudomínio.com.br)
			 $mail->SMTPAuth   = true;  					// Usar autenticação SMTP (obrigatório para smtp.seudomínio.com.br)
			 $mail->Port       = 587; 						// Usar 587 porta SMTP
			 $mail->Username = 'email@gmail.com'; 			// Usuário do servidor SMTP (endereço de email)
			 $mail->Password = 'senha'; 					// Senha do servidor SMTP (senha do email usado)
		 
			 //Define o remetente
			 // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=    
			 $mail->SetFrom('email@gmail.com', 'Nome'); 		//Seu e-mail
			 $mail->AddReplyTo('email@gmail.com', 'Nome'); 	//Seu e-mail
			 $mail->Subject = 'Recuperacao de senha - Nome';	//Assunto do e-mail
		 
		 
			 //Define os destinatário(s)
			 //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
			 $mail->AddAddress($usuario->getEmail(), $usuario->getNome());
		 
			 //Campos abaixo são opcionais 
			 //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
			 //$mail->AddCC('destinarario@dominio.com.br', 'Destinatario'); 			// Copia
			 //$mail->AddBCC('destinatario_oculto@dominio.com.br', 'Destinatario2`'); 	// Cópia Oculta
			 //$mail->AddAttachment('images/phpmailer.gif');      						// Adicionar um anexo
		 
		 
			 // Informa que vamos enviar mensagens usando HTML
			 $mail->IsHTML(true);
			 
			 
			// Mensagem que vai no corpo do e-mail
			$mail->Body = '<h1>Recuperação de Senha</h1><br>
						   <p> Caro(a) ';
			$mail->Body .= $usuario->getNome();
			$mail->Body .=',<br> Solicitação de Recuperação de Senha.<br>Segue os seus dados:<br><br><br>';
			$mail->Body .= 'CPF: '.$usuario->getCpf().'<br> Senha: '.$senha.'<br><br><br>';
			$mail->Body .= 'Caso nao tenha feito esta solicitacao, ignore este e-mail.<br> 
			Favor não responder essa mensagem.<br><br>
			PetshApp, a melhor opção para seu Pet.<br></p>';	 
			 
		 
			 ////Caso queira colocar o conteudo de um arquivo utilize o método abaixo ao invés da mensagem no corpo do e-mail.
			 //$mail->MsgHTML(file_get_contents('arquivo.html'));
		 
			 $mail->SMTPOptions = array(
					'ssl' => array(
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true)
				);

			 
			 // Envia o email e verifica se houve algum erro
			if($mail->Send()){
				// buscar usuario
				header('location:../tela/efetuarLogin.php');
				echo"<script language='javascript' type='text/javascript'>alert('Senha enviada por e-mail.');window.location.href='../login.php'</script>";
			}
			else{	
				echo"<script language='javascript' type='text/javascript'>alert('Não foi possível fazer a recuperação da senha!');window.location.href='../telas/Recuperar_Senha.php'</script>";
			}
		 
			//caso apresente algum erro é apresentado abaixo com essa exceção.
		}
		catch (phpmailerException $e) {
			  echo $e->errorMessage(); //Mensagem de erro costumizada do PHPMailer
		}

		
	}	
	else {
		echo"<script language='javascript' type='text/javascript'>alert('Usuário não cadastrado!');window.location.href='../recuperar_Senha.php'</script>";
	}
	
}
else {
	echo"<script language='javascript' type='text/javascript'>alert('Preencha os campos corretamente!');window.location.href='../recuperarSenha.php'</script>";
}

?>