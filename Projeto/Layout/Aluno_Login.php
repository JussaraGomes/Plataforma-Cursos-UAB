<?php
	/*session_start();
	
	if( !isset($_SESSION['mensagem']) ){
		
		//$alerta = $_SESSION['mensagem'];
		unset($_SESSION['mensagem']);

		echo "<script language='javascript' type='text/javascript'> alert('",$_SESSION['mensagem'],"'); </script>";			
	} */
	
	 include('Geral_CabecalhoDeslogado.php');

?>

	
	   <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/mat.jpg')">
        <div class="container">
          <div class="row align-items-end justify-content-center text-center">
            <div class="col-lg-7">
              <h2 class="mb-0">Login de Usuário</h2>
              <p>Entre com seus dados para acessar sua conta.</p>
            </div>
          </div>
        </div>
      </div> 
 <div class="site-section">
        <div class="container">


            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="username">E-mail</label>
                            <input type="text" id="username" class="form-control form-control-lg">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="pword">Senha</label>
                            <input type="password" id="pword" class="form-control form-control-lg">
                        </div>

						
                        <div class="col-md-12 form-group">
                            <p><a href="Aluno_RecuperarSenha.php"> <span class="icon-key mr-2"></span>Esqueci minha senha</s></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="submit" name="login_aluno" value="Fazer Login" class="btn btn-primary btn-lg px-5">
                        </div>
                    </div>
                </div>
            </div>
            

          
        </div>
    </div>



  
  <?php include('Geral_Rodape.php');?>
 