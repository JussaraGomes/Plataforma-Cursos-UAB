<?php 
	require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Facade/NoticiaFacade.php");	

	$noticia = NoticiaFacade::getInstance()->buscarNoticiaId($_GET['idNoticia']);
	include('Geral_CabecalhoDeslogado.php');
?>
	
	   <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/mat.jpg')">
        <div class="container">
          <div class="row align-items-end justify-content-center text-center">
            <div class="col-lg-7">
              <h2 class="mb-0"><?php echo $noticia->getTitulo();?></h2>
              <p>Publicada em <?php echo $noticia->getDataPublicacao();?>.</p>
            </div>
          </div>
        </div>
      </div> 
	    
   
    <div class="site-section">
      <div class="container">

		<div align="justify"><p>
		<?php echo nl2br($noticia->getCorpoNoticia()); ?>
		</p></div>        
				
		
		<?php if($noticia->getUrlFoto() != NULL){ ?>
		<div align="center">
			<br>
			<img src="../Uploads/Noticias/<?php echo $noticia->getUrlFoto();?>" width="200" height="200" style="border: #000000 Solid 1px;" class="img-fluid">
		</div>
		<?php } ?>
					
      </div>
    </div>

	<!-- Fim da parte de como funciona -->

  

    <?php include('Geral_Rodape.php');?>
 