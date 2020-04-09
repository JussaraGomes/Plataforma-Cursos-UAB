
<?php include('Geral_CabecalhoDeslogado.php');?>

	
	   <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/mat.jpg')">
        <div class="container">
          <div class="row align-items-end justify-content-center text-center">
            <div class="col-lg-7">
              <h2 class="mb-0">Login de Professor - Administrador</h2>
              <p>Entre com seus dados para acessar sua conta, não se esqueça de marcar o campo Professor ou Administrador.</p>
            </div>
          </div>
        </div>
      </div> 
	  
	  <div class="site-section">
        <div class="container">


            <div class="row justify-content-center">
                <div class="col-md-5">
				    <form class="form-horizontal" id="formulario" action="Acoes/Login.php" method="POST" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="cpf">CPF</label>
							<input type="number" name="cpf" id="cpf" class="form-control form-control-lg" required="required">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="senha">Senha</label>
							<input type="password" name="senha" id="senha" class="form-control form-control-lg" required="required">
                        </div>
						
						<div class="col-md-12 form-group">
						
						<INPUT TYPE="RADIO" name="tipoAutenticacao" value="professor"> Professor
						&nbsp;&nbsp;
						<INPUT TYPE="RADIO" name="tipoAutenticacao" value="administrador"> Administrador
						
						</div> 
						
                        <div class="col-md-12 form-group">
                            <p><a href="Geral_RecuperarSenha.php"> <span class="icon-key mr-2"></span>Esqueci minha senha</s></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="submit" name="geral_login" value="Fazer Login" class="btn btn-primary btn-lg px-5">
                        </div>
                    </div>
					</form>
                </div>
            </div>
            

          
        </div>
    </div>

    

  
  <?php include('Geral_Rodape.php');?>
