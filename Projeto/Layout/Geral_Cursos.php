<?php
	require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Facade/CursoFacade.php");		
	  
    $cursos = CursoFacade::getInstance()->listarCursos();
	
	include('Geral_CabecalhoDeslogado.php');
?>	
    
	   <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/mat.jpg')">
        <div class="container">
          <div class="row align-items-end justify-content-center text-center">
            <div class="col-lg-7">
              <h2 class="mb-0">Cursos Gratuítos Ofertados</h2>
              <p> </p>
            </div>
          </div>
        </div>
      </div> 
	
    <div class="site-section">
        <div class="container">
            <div class="row">
			
			
			<?php if(sizeof($cursos) == 0){ ?>
				<h3 class="post-heading"><br><br>Não há cursos cadastrados!</h3>
			
			 <?php } else{

					 for($i = 0; $i<sizeof($cursos); $i++){ ?>
					 
				
				
                <div class="col-lg-4 col-md-6 mb-4">
                  <div class="course-1-item">
                    <figure class="thumnail">
                      <a href="Geral_CursosDetalhes.php?idCurso=<?php echo $cursos[$i]->getIdCurso();?>">
						<img src="../Uploads/Cursos/<?php echo $cursos[$i]->getFoto();?>" alt="Image" class="img-fluid">
					  </a>
                      <div class="price"><?php echo $cursos[$i]->getModalidade();?></div>
                      <div class="category"><h3>Grande Área</h3></div>  
                    </figure>
                    <div class="course-1-content pb-4">
                      <h2><?php echo $cursos[$i]->getNome();?></h2>
					  <!--
                      <div class="rating text-center mb-3">
                        <span class="icon-star2 text-warning"></span>
                        <span class="icon-star2 text-warning"></span>
                        <span class="icon-star2 text-warning"></span>
                        <span class="icon-star2 text-warning"></span>
                        <span class="icon-star2 text-warning"></span>
                      </div>
					  -->
                      <p class="desc mb-4"><?php echo $cursos[$i]->getDescricao();?></p>
                      <p><a href="Geral_CursosDetalhes.php?idCurso=<?php echo $cursos[$i]->getIdCurso();?>" class="btn btn-primary rounded-0 px-4">Acessar este curso</a></p>
                    </div>
                  </div>
                </div>
		           
			 <?php }} ?>
				
			</div>
		</div>
`	</div>

    <?php include('Geral_Rodape.php');?>
 