
<?php include('Geral_CabecalhoLogado.php');?>

    
    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/mat.jpg')">
        <div class="container">
          <div class="row align-items-end justify-content-center text-center">
            <div class="col-lg-7">
              <h2 class="mb-0">Exclusão de Conta</h2>
              <p>Esta ação removerá sua conta do sistema.</p>
            </div>
          </div>
        </div>
      </div> 
    
	<script language="JavaScript">
	function pergunta(){
		confirmacao = confirm('Esta ação não poderá ser desfeita. Tem certeza que deseja excluir sua conta de professor? Você será imediatamente deslogado.');
		
		if (confirmacao){
		   document.formulario.submit()
		}
	}
	
</script>
    <div class="site-section">
        <div class="container">
            <form class="form-horizontal" name="formulario" id="formulario" action="Acoes/RecuperarSenha.php" method="POST" enctype="multipart/form-data">


				<div class="row justify-content-center">
					<div class="col-md-5">
						<div class="row">
							<div class="col-md-12 form-group">
								<div align="center">
									<b>ATENÇÃO</b>, VOCÊ ESTÁ PRESTES A EXCLUIR SUA CONTA DE PROFESSOR!!! 
									<br><br>Se você for o único responsável por algum curso e houver algum aluno matriculado, você não poderá excluir esta conta. Neste caso, sugerimos que você entre em contato com um administrador.
									<br><br>
								</div>
								
								<label for="cpfUsuario">Informe seu CPF</label>
								<input type="password" id="cpfUsuario" class="form-control form-control-lg" required="required">
							
								<label for="cpfUsuario">Informe sua senha </label>
								<input type="password" id="cpfUsuario" class="form-control form-control-lg" required="required">
							</div>
							
						</div>
						<div class="row">
							<div class="col-12">
							    <!-- input button não reconhece required-->
								<input type="button" onclick="pergunta()" value="Excluir Minha Conta de Professor" class="btn btn-primary btn-lg px-5">
							</div>
						</div>
					</div>
				</div>
            
			</form>
          
        </div>
    </div>

  
  <?php include('Geral_Rodape.php');?>
  