
<?php include('Geral_CabecalhoLogado.php');?>

    
    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/mat.jpg')">
        <div class="container">
          <div class="row align-items-end justify-content-center text-center">
            <div class="col-lg-7">
              <h2 class="mb-0">Alteração de Dados do Administrador</h2>
              <p>Mude apenas os campos com os dados que deseja alterar. </p>
            </div>
          </div>
        </div>
      </div> 
    

	<div class="site-section"> 
        <div class="container">
            <form class="form-horizontal" id="formulario" action="Acoes/editarDados.php" method="POST" enctype="multipart/form-data">
				
				<div class="row justify-content-center">
					<div class="col-md-5">
						<div class="row">
							<div class="col-md-12 form-group">
								<label for="nomeAdministrador">Nome</label>
								<input type="text" id="nomeAdministrador" class="form-control form-control-lg" required="required">
							</div>
							
							<div class="col-md-12 form-group">
								<label for="cpfAdministrador">CPF</label>
								<input type="number" id="cpfAdministrador" class="form-control form-control-lg" required="required" disabled>
							</div>
							
							<div class="col-md-12 form-group">
								<label for="emailAdministrador">E-mail</label>
								<input type="email" id="emailAdministrador" class="form-control form-control-lg" required="required">
							</div>
							
							<div class="col-md-12 form-group">
								<label for="senhaAdministrador">Senha</label>
								<input type="password" id="senhaAdministrador" class="form-control form-control-lg" required="required" >
							</div>
							
							<div class="col-md-12 form-group">
								<label for="senhaRepetidaAdministrador">Repita a senha</label>
								<input type="password" id="senhaRepetidaAdministrador" class="form-control form-control-lg" required="required">
							</div>
							
						</div>
						<div class="row">
							<div class="col-12">
								<input type="submit" name="editarDadosAdministrador" value="Salvar Alterações" class="btn btn-primary btn-lg px-5">
							</div>
						</div>
					</div>
				</div>				
			</form>
        </div>
    </div>
   

  
  <?php include('Geral_Rodape.php');?>
  