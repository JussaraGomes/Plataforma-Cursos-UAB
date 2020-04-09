<?php
	require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Facade/PlataformaFacade.php");	
	//session_start();
	
	//if( isset($_SESSION['cpf']) && isset ($_SESSION['senha']) ){
	  //include("CabecalhoLogado.php");
	  $plataforma	= PlataformaFacade::getInstance()->buscarPlataforma(1);
	 
	//}
	//else{
	//  include("Cabecalho.php");
	//}
	
?>

<!DOCTYPE html>
<!-- INICIO DO CABEÇALHO-->
<html lang="en">
<head>
  <title>Plataforma Cursos &mdash; UAB</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">

  <link rel="stylesheet" href="css/jquery.fancybox.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

  <link rel="stylesheet" href="css/aos.css">
  <link href="css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="css/style.css">
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">


    <div class="py-2 bg-light">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-9 d-none d-lg-block">
            <a href="Geral_Contato.php" class="small mr-3"><span class="icon-question-circle-o mr-2"></span> Você tem alguma dúvida?</a> 
            <a href="Geral_Contato.php" class="small mr-3"><span class="icon-phone2 mr-2"></span> <?php echo $plataforma->getPrimeiroTelefone();?></a> 
            <a href="Geral_Contato.php" class="small mr-3"><span class="icon-envelope-o mr-2"></span> <?php echo $plataforma->getEmail();?></a> 
            
			
			<?php
				
				if( isset($_GET['returnMessage']) ){ ?>
						
					<a href="" class="small mr-3">
						<p class='msg-success' style="color:#0B610B;" >
							<br>
							<b><span class="icon-arrow-right"></span> <?php echo base64_decode($_GET['returnMessage']); ?> </b> 
						</p>
					</a>
					
					<script>
					setTimeout(function(){ 
						var msg = document.getElementsByClassName("msg-success");
						
						while(msg.length > 0){
							msg[0].parentNode.removeChild(msg[0]);
						}
						
					}, 10000);
					</script>
				
			<?php		
				} 
				
			?>
			
			
			
			
          </div>
          <div class="col-lg-3 text-right">
		  
            <a href="Aluno_Login.php" class="small mr-3"><span class="icon-unlock-alt"></span> Login</a>
            <a href="Aluno_Cadastro.php" class="small btn btn-primary px-4 py-2 rounded-0"><span class="icon-users"></span> Cadastro</a>
          </div>
        </div>
      </div>
    </div>
	
	
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="d-flex align-items-center">
          
		  <div class="site-logo">
            <a href="index.html" class="d-block">
              <img src="images/logo.JPG" alt="Imagem" class="img-fluid">
            </a>
          </div>
		  
          <div class="mr-auto">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li>
                  <a href="Geral_Index.php" class="nav-link text-left">Página Inicial</a>
                </li>
                <li class="has-children">
                  <a href="#" class="nav-link text-left">Sobre Nós </a>
                  <ul class="dropdown">
                    <li><a href="Geral_Historia.php">História</a></li>
                    <li><a href="Geral_Professores.php">Nossos Professores</a></li>
                  </ul>
                </li>
                <li>
                  <a href="Geral_Noticias.php" class="nav-link text-left">Notícias</a>
                </li>
                <li>
                  <a href="Geral_Cursos.php" class="nav-link text-left">Nossos Cursos</a>
                </li>
                <li>
                    <a href="Geral_Contato.php" class="nav-link text-left">Contato</a>
                  </li>
              </ul>
            </nav>
          </div>
		  
          <div class="ml-auto">
            			
			<span></span>&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="<?php echo $plataforma->getLinkFacebook();?>"><span class="icon-facebook"></span></a> &nbsp;&nbsp;&nbsp;
            <a href="<?php echo $plataforma->getLinkInstagram();?>"><span class="icon-twitter"></span></a> &nbsp;&nbsp;&nbsp;
            <a href="<?php echo $plataforma->getLinkSite();?>"><span class="icon-linkedin"></span></a> &nbsp;&nbsp;&nbsp;
          </div>
         
        </div>
      </div>

    </header>
<!-- FIM DO CABEÇALHO -->