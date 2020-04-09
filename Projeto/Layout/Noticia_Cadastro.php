
<?php include('Geral_CabecalhoLogado.php');?>

    
      <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/mat.jpg')">
        <div class="container">
          <div class="row align-items-end justify-content-center text-center">
            <div class="col-lg-7">
              <h2 class="mb-0">Cadastro de Notícia</h2>
              <p>Preencha as informações necessárias para prosseguir com o cadastro.</p>
            </div>
          </div>
        </div>
      </div> 
    

    <div class="site-section">
        <div class="container">
		    <form class="form-horizontal" id="formulario" action="Acoes/Cadastro.php" method="POST" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-6 form-group">
						<label for="tituloNoticia">Título</label>
						<input type="text" id="tituloNoticia" name="tituloNoticia" class="form-control form-control-lg" required>
					</div>
					<div class="col-md-6 form-group">
						<label for="dataPublicacao">Data de Publicação </label>					
						<input type="text" name="dataPublicacao" id="dataPublicacao"  value="<?php echo date('d/m/Y');?>" class="form-control form-control-lg" readonly>

					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12 form-group">
						<label for="breveDescricao">Breve Descrição</label>
						<textarea name="breveDescricao" id="breveDescricao" cols="30" rows="5" class="form-control" required></textarea>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 form-group">
						<label for="corpoNoticia">Corpo da Notícia</label>
						<textarea name="corpoNoticia" id="corpoNoticia" cols="30" rows="10" class="form-control" required></textarea>
					</div>
				</div>


				<div class="row">
					<div class="col-md-6 form-group">
						<label for="imagemNoticia">Selecione um arquivo de imagem para esta notícia</label>
						<input type="file" id="imagemNoticia" name="imagemNoticia" accept="image/*">
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-12">
						<input type="submit" value="Cadastrar Notícia" name="cadastrar_noticia" class="btn btn-primary btn-lg px-5">
					</div>
				</div>
			</form>
        </div>
    </div>


  
  <?php include('Geral_Rodape.php');?>
 