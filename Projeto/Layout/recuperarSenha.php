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
              <h2 class="mb-0">Recuperar Senha</h2>
              <p>Você receberá um e-mail com a nova senha.</p>
            </div>
          </div>
        </div>
      </div> 
    

    <div class="site-section">
        <div class="container">
            <form class="form-horizontal" id="formulario" action="Acoes/RecuperarSenha.php" method="POST" enctype="multipart/form-data">


				<div class="row justify-content-center">
					<div class="col-md-5">
						<div class="row">
							<div class="col-md-12 form-group">
								<label for="cpfUsuario">CPF</label>
								<input type="number" id="cpfUsuario" class="form-control form-control-lg">
							</div>
							<div class="col-md-12 form-group">
								<label for="tipoUsuario">Tipo de Usuário </label>
								<select required id="tipoUsuario" name="tipoUsuario" class="form-control form-control-lg" >
									<option >Selecione o tipo de usuário</option>
									<option value="Aluno">Aluno</option>
									<option value="Professor">Professor</option>
									<option value="Administrador">Administrador</option>
									
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<input type="submit" name="recuperarSenha"  value="Recuperar Senha" class="btn btn-primary btn-lg px-5">
							</div>
						</div>
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