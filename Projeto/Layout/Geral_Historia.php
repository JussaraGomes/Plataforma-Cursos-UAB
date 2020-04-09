<?php
	require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Facade/PlataformaFacade.php");	

	//session_start();
	
	//if( isset($_SESSION['cpf']) && isset ($_SESSION['senha']) ){
	  //include("CabecalhoLogado.php");
	  $plataforma	= PlataformaFacade::getInstance()->buscarPlataforma(55555);

	//}
	//else{
	//  include("Cabecalho.php");
	//}
	include('Geral_CabecalhoDeslogado.php');
?>

	
	   <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/mat.jpg')">
        <div class="container">
          <div class="row align-items-end justify-content-center text-center">
            <div class="col-lg-7">
              <h2 class="mb-0">Nossa História</h2>
              <p>Uma iniciativa com o objetivo de promover a educação gratúita.</p>
            </div>
          </div>
        </div>
      </div> 
	  
    <div class="site-section">
      <div class="container">

		<div align="justify"><p><?php echo nl2br($plataforma->getDescricao());?></p></div>     
        
      </div>
    </div>
   

	<!-- Início da parte de como funciona -->
    <div class="section-bg style-1" style="background-image: url('images/imagemBranco.png');">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <h2 class="section-title-underline style-2">
              <span>Como funciona?</span>
            </h2>
          </div>
          <div class="col-lg-8">
            <p class="lead"><?php echo nl2br($plataforma->getComoFunciona()); ?></p>
           
          </div>
        </div>
      </div>
    </div>
	<!-- Fim da parte de como funciona -->

  

    <?php include('Geral_Rodape.php');?>
  