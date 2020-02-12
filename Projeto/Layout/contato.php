<!DOCTYPE html>
<html lang="en">
<!-- ADICIONAR VALIDAÇÃO DA SENHA E ADICIONAR PATTERN NOS CAMPOS -->

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

<?php include('cabecalhoDeslogado.php');?>

    
      <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/mat.jpg')">
        <div class="container">
          <div class="row align-items-end justify-content-center text-center">
            <div class="col-lg-7">
              <h2 class="mb-0">Página de Contato</h2>
              <p>Envie sua mensagem, retornaremos o mais breve possível.</p>
            </div>
          </div>
        </div>
      </div> 
    
    <div class="site-section">
        <div class="container">
            <form class="form-horizontal" id="formulario" action="Acoes/contato.php" method="POST" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-6 form-group">
						<label for="nomeEmail">Nome Completo</label>
						<input type="text" id="nomeEmail" class="form-control form-control-lg" required>
					</div>
					<div class="col-md-6 form-group">
						<label for="assuntoEmail">Assunto</label>
						<input type="text" id="assuntoEmail" class="form-control form-control-lg" required>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 form-group">
						<label for="enderecoEmail">Endereço de E-mail</label>
						<input type="text" id="eaddress" class="form-control form-control-lg" required>
					</div>
					<div class="col-md-6 form-group">
						<label for="telefoneemail">Telefone Contato</label>
						<input type="text" id="telefoneEmail" class="form-control form-control-lg" required>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 form-group">
						<label for="mensagemEmail">Mensagem</label>
						<textarea name="" id="mensagemEmail" cols="30" rows="10" class="form-control" required></textarea>
					</div>
				</div>

				<div class="row">
					<div class="col-12">
						<input type="submit" name="enviarMensagem" value="Enviar Mensagem" class="btn btn-primary btn-lg px-5">
					</div>
				</div>
			</form>	
        </div>
    </div>

  
  <?php include('rodape.php');?>
  </div>
  <!-- .site-wrap -->

  <!-- loader -->
  <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#51be78"/></svg></div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/jquery.mb.YTPlayer.min.js"></script>

  <script src="js/main.js"></script>

</body>

</html>