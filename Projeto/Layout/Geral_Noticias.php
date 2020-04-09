<?php
	require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Facade/NoticiaFacade.php");	

    $noticias = NoticiaFacade::getInstance()->listarNoticias();
	
	include('Geral_CabecalhoDeslogado.php');
?>

    
	   <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/mat.jpg')">
        <div class="container">
          <div class="row align-items-end justify-content-center text-center">
            <div class="col-lg-7">
              <h2 class="mb-0">Notícias &amp; Atualizações</h2>
              <p> Fique por dentro do que acontece e mantenha-se atualizado.</p>
            </div>
          </div>
        </div>
      </div> 

	<!-- Início da parte das notícias -->
    <div class="news-updates">
      <div class="container">
         
        <div class="row">
            <div class="row">
              
			 <?php if(sizeof($noticias) == 0){ ?>
				<h3 class="post-heading">Não há notícias cadastradas!</h3>
			
			 <?php }else
					 for($i = 0; $i <sizeof($noticias); $i++){ ?>
				
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
			
			 <?php } ?>
          </div>
		  
		  
        </div>
		
		
      </div>
    </div>
	<!-- Fim da parte das notícias -->


    <?php include('Geral_Rodape.php');?>
 