
<?php include('Geral_CabecalhoDeslogado.php');?>

    
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

  
  <?php include('Geral_Rodape.php');?>
  