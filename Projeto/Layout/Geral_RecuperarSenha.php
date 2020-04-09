
<?php include('Geral_CabecalhoDeslogado.php');?>

    
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
							<form>
							<INPUT TYPE="RADIO" NAME="OPCAO" VALUE="op1"> Professor
							&nbsp;&nbsp;
							<INPUT TYPE="RADIO" NAME="OPCAO" VALUE="op2"> Administrador
							</form>
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

  
  <?php include('Geral_Rodape.php');?>
  