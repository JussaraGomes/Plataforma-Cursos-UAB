<?php
	require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Facade/ColaboradorFacade.php");	
	require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Facade/NoticiaFacade.php");	
	require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Facade/PlataformaFacade.php");	
	  
	$plataforma	= PlataformaFacade::getInstance()->buscarPlataforma(55555);
    $noticias = NoticiaFacade::getInstance()->listarNoticias();
    $colaboradores = ColaboradorFacade::getInstance()->listarColaboradores();
	
	include('Geral_CabecalhoDeslogado.php');
?>

    <div><br><br></div>

    <div class="site-section">
      <div class="container">


        <div class="row mb-5 justify-content-center text-center">
          <div class="col-lg-6 mb-5">
            <h2 class="section-title-underline mb-3">
              <span>Plataforma de Cursos UAB - UEFS</span>
            </h2>
            <a href="Geral_Cursos.php"><p>Conheça os nossos cursos gratuitos e com certificado.</p></a>
          </div>
        </div>
		
		<!-- Carrocel de cursos (Busca no banco seis cursos aleatórios) -->
        <div class="row">
          <div class="col-12">
              <div class="owl-slide-3 owl-carousel">
			  
                  <div class="course-1-item">
                    <figure class="thumnail">
                      <img src="images/curso_1.jpg" alt="Image" class="img-fluid">
                      <div class="price">Modalidade do Curso</div>
                      <div class="category"><h3>Grande Área</h3></div>  
                    </figure>
                    <div class="course-1-content pb-4">
                      <h2>Nome do Curso</h2>
                      <p class="desc mb-4">Descrição do curso. Descrição do curso. Descrição do curso. Descrição do curso. Descrição do curso. Descrição do curso. Descrição do curso. </p>
                      <p><a href="Geral_CursosDetalhes.php" class="btn btn-primary rounded-0 px-4">Acessar este curso</a></p>
                    </div>
                  </div>
      
	  
                  <div class="course-1-item">
                    <figure class="thumnail">
                      <img src="images/curso_1.jpg" alt="Image" class="img-fluid">
                      <div class="price">Modalidade do Curso</div>
                      <div class="category"><h3>Grande Área</h3></div>  
                    </figure>
                    <div class="course-1-content pb-4">
                      <h2>Nome do Curso</h2>
                      <p class="desc mb-4">Descrição do curso. Descrição do curso. Descrição do curso. Descrição do curso. Descrição do curso. Descrição do curso. Descrição do curso. </p>
                      <p><a href="Geral_CursosDetalhes.php" class="btn btn-primary rounded-0 px-4">Acessar este curso</a></p>
                    </div>
                  </div>
      
	  
                  <div class="course-1-item">
                    <figure class="thumnail">
                      <img src="images/curso_1.jpg" alt="Image" class="img-fluid">
                      <div class="price">Modalidade do Curso</div>
                      <div class="category"><h3>Grande Área</h3></div>  
                    </figure>
                    <div class="course-1-content pb-4">
                      <h2>Nome do Curso</h2>
                      <p class="desc mb-4">Descrição do curso. Descrição do curso. Descrição do curso. Descrição do curso. Descrição do curso. Descrição do curso. Descrição do curso. </p>
                      <p><a href="Geral_CursosDetalhes.php" class="btn btn-primary rounded-0 px-4">Acessar este curso</a></p>
                    </div>
                  </div>
      
	  
                  <div class="course-1-item">
                    <figure class="thumnail">
                      <img src="images/curso_1.jpg" alt="Image" class="img-fluid">
                      <div class="price">Modalidade do Curso</div>
                      <div class="category"><h3>Grande Área</h3></div>  
                    </figure>
                    <div class="course-1-content pb-4">
                      <h2>Nome do Curso</h2>
                      <p class="desc mb-4">Descrição do curso. Descrição do curso. Descrição do curso. Descrição do curso. Descrição do curso. Descrição do curso. Descrição do curso. </p>
                      <p><a href="Geral_CursosDetalhes.php" class="btn btn-primary rounded-0 px-4">Acessar este curso</a></p>
                    </div>
                  </div>
      
	  
                  <div class="course-1-item">
                    <figure class="thumnail">
                      <img src="images/curso_1.jpg" alt="Image" class="img-fluid">
                      <div class="price">Modalidade do Curso</div>
                      <div class="category"><h3>Grande Área</h3></div>  
                    </figure>
                    <div class="course-1-content pb-4">
                      <h2>Nome do Curso</h2>
                      <p class="desc mb-4">Descrição do curso. Descrição do curso. Descrição do curso. Descrição do curso. Descrição do curso. Descrição do curso. Descrição do curso. </p>
                      <p><a href="Geral_CursosDetalhes.php" class="btn btn-primary rounded-0 px-4">Acessar este curso</a></p>
                    </div>
                  </div>
      
	  
                  <div class="course-1-item">
                    <figure class="thumnail">
                      <img src="images/curso_1.jpg" alt="Image" class="img-fluid">
                      <div class="price">Modalidade do Curso</div>
                      <div class="category"><h3>Grande Área</h3></div>  
                    </figure>
                    <div class="course-1-content pb-4">
                      <h2>Nome do Curso</h2>
                      <p class="desc mb-4">Descrição do curso. Descrição do curso. Descrição do curso. Descrição do curso. Descrição do curso. Descrição do curso. Descrição do curso. </p>
                      <p><a href="Geral_CursosDetalhes.php" class="btn btn-primary rounded-0 px-4">Acessar este curso</a></p>
                    </div>
                  </div>
	  
	  
              </div>      
          </div>
        </div>
		<!-- Fim do carrocel de cursos-->       
        
      </div>
    </div>
   

	<!-- Início da parte de como funciona -->
    <div class="section-bg style-1" style="background-image: url('images/about_1.jpg');">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <h2 class="section-title-underline style-2">
              <span>Como funciona?</span>
            </h2>
          </div>
          <div class="col-lg-8">
            <p class="lead"><?php echo nl2br($plataforma->getComoFunciona()); ?></p>
            <p><a href="Geral_Historia">Saber mais</a></p>
          </div>
        </div>
      </div>
    </div>
	<!-- Fim da parte de como funciona -->

    <!-- Início da descrição dos colaboradores ------------------------------------------------------------------------------------------------------->
  <div class="site-section">
      <div class="container">
	  
        <div class="row mb-5">
          <div class="col-lg-4">
            <h2 class="section-title-underline">
              <span>Colaboradores</span>
            </h2>
          </div>
        </div>


        <div class="owl-slide owl-carousel">

		<?php if(sizeof($colaboradores) == 0){ ?>
				<h3 class="post-heading"><br><br>Não há colaboradores cadastrados!</h3>
			
			 <?php } else{

					 for($i = 0; $i<sizeof($colaboradores); $i++){ ?>
				
					  <div class="ftco-testimonial-1">
						<div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
						  <img src="../Uploads/Colaboradores/<?php echo $colaboradores[$i]->getFoto();?>" alt="Image" class="img-fluid mr-3">
						  <div>
							<h3><?php echo $colaboradores[$i]->getNome();?></h3>
							<span><?php echo $colaboradores[$i]->getFuncao();?></span>
						  </div>
						</div>
						<div>
						  <p>&ldquo;<?php echo $colaboradores[$i]->getBreveDescricao();?>&rdquo;</p>
						</div>
					  </div>

		           
			 <?php }} ?>


        </div>
        
      </div>
    </div>
	<!-- Fim da descrição dos colaboradores ---------------------------------------------------------------------------------------------------------->
    
	<!-- Inicio das descrições rápidas --------------------------------------------------------------------------------------------------------------->
    <div class="section-bg style-1" style="background-image: url('images/hero_1.jpg');">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
            <span class="icon flaticon-mortarboard"></span>
            <h3>Certificado</h3>
            <p align="left">Após concluir todas as atividades do curso e obter nota mínima necessária para aprovação, o aluno poderá solicitar o certificado estando logado em sua conta.  </p>
          </div>
          <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
            <span class="icon flaticon-school-material"></span>
            <h3>Materiais de Estudo</h3>
            <p align="left">Os cursos ofertados na plataforma disponibiliza materiais didáticos em formato digital, o aluno poderá obtê-lo gratuitamente após a matricula e posterior acesso a sua conta.</p>
          </div>
          <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
            <span class="icon flaticon-library"></span>
            <h3>Instituição Concedente</h3>
            <p align="left">A <a href="http://www.uefs.br/">Universidade Estadual de Feira de Santana (UEFS)</a> é uma instituição pública brasileira de ensino superior sediada na cidade de Feira de Santana, localizada no agreste baiano. </p>
          </div>
        </div>
      </div>
    </div>
	<!-- Fim das desrições rápidas ------------------------------------------------------------------------------------------------------------------->
    
	
	<!-- Início da parte das notícias ---------------------------------------------------------------------------------------------------------------->
    <div class="news-updates">
      <div class="container">
         
        <div class="row"> 		
			<div class="section-heading">
              <h2 class="text-black">Notícias &amp; Atualizações</h2>
              <a href="Geral_Noticias.php">Ler todas as notícias</a>
            </div>		
				
             
            <div class="row">              
			  <?php if(sizeof($noticias) == 0){ ?>
				<h3 class="post-heading"><br><br>Não há notícias cadastradas!</h3>
			
			 <?php }else {
					
				    $limiteNoticias = 4;

					if(sizeof($noticias) <= $limiteNoticias)
						$limiteNoticias = sizeof($noticias);
					

					 for($i = 0; $i<$limiteNoticias; $i++){ ?>
				
			  <!-- Duas notícias por linha -->
              <div class="col-lg-6">
                <div class="post-entry-big horizontal d-flex mb-4">
                  <div class="post-content">
                    <div class="post-meta">
                      <a href="Geral_NoticiaDetalhe.php?idNoticia=<?php echo $noticias[$i]->getIdNoticia();?>">
						Publicada em <?php echo $noticias[$i]->getDataPublicacao();?>
					  </a>
                    </div>
                    <h3 class="post-heading">
						<a href="Geral_NoticiaDetalhe.php?idNoticia=<?php echo $noticias[$i]->getIdNoticia();?>">
							<?php echo $noticias[$i]->getTitulo();?>
						</a>
					</h3>
					<div align="justify"><p><?php echo $noticias[$i]->getBreveDescricao();?></p></div>
                  </div>
                </div>
              </div>	
			  
			 <?php }} ?>
          </div>
        </div>
      </div>
    </div>

	<!-- Fim da parte das notícias ------------------------------------------------------------------------------------------------------------------->


    <?php include('Geral_Rodape.php');?>
 