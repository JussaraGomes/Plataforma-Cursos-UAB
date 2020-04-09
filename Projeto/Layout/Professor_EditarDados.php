
<?php include('Geral_CabecalhoLogado.php');?>

    
    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/mat.jpg')">
        <div class="container">
          <div class="row align-items-end justify-content-center text-center">
            <div class="col-lg-7">
              <h2 class="mb-0">Alteração de Dados do Professor</h2>
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
								<label for="nomeProfessor">Nome</label>
								<input type="text" id="nomeProfessor" class="form-control form-control-lg" required="required">
							</div>
							
							<div class="col-md-12 form-group">
								<label for="cpfProfessor">CPF</label>
								<input type="number" id="cpfProfessor" class="form-control form-control-lg" required="required" readonly>
							</div>
							
							<div class="col-md-12 form-group">
								<label for="emailProfessor">E-mail</label>
								<input type="email" id="emailProfessor" class="form-control form-control-lg" required="required">
							</div>
							
							<div class="col-md-12 form-group">
								<label for="senhaProfessor">Senha</label>
								<input type="password" id="senhaProfessor" class="form-control form-control-lg" required="required" >
							</div>
							
							<div class="col-md-12 form-group">
								<label for="senhaRepetidaProfessor">Repita a senha</label>
								<input type="password" id="senhaRepetidaProfessor" class="form-control form-control-lg" required="required">
							</div>
							
						</div>
						<div class="row">
							<div class="col-12">
								<input type="submit" name="editarDadosProfessor" value="Salvar Alterações" class="btn btn-primary btn-lg px-5">
							</div>
						</div>
					</div>
				</div>				
			</form>
        </div>
    </div>
   

  
  <?php include('rodape.php');?>
  