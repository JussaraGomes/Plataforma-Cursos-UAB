
<?php include('Geral_CabecalhoLogado.php');?>

    
      <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/mat.jpg')">
        <div class="container">
          <div class="row align-items-end justify-content-center text-center">
            <div class="col-lg-7">
              <h2 class="mb-0">Alteração de Dados do Curso</h2>
              <p>Mude apenas os dados que deseja alterar.</p>
            </div>
          </div>
        </div>
      </div> 
    

    <div class="site-section">
        <div class="container">
		    <form class="form-horizontal" id="formulario" action="Acoes/editarDados.php" method="POST" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-6 form-group">
						<label for="nomeCurso">Nome</label>
						<input type="text" id="nomeCurso" class="form-control form-control-lg" required>
					</div>
					<div class="col-md-6 form-group">
						<label for="modalidadeCurso">Modalidade </label>					
						<select required id="modalidadeCurso" name="modalidadeCurso" class="form-control form-control-lg" required>
							<option value="">Selecione a modalidade do curso</option>
							<option value="Presencial">Presencial</option>
							<option value="Semipresencial">Semipresencial</option>
							<option value="EaD">EaD</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 form-group">
						<label for="nivelDificuldadeCurso">Nível de Dificuldade</label>			
						<select required id="nivelDificuldadeCurso" name="nivelDificuldadeCurso" class="form-control form-control-lg" required>
							<option value="">Selecione a modalidade do curso</option>
							<option value="Fácil">Fácil</option>
							<option value="Moderado">Moderado</option>
							<option value="Difícil">Difícil</option>
						</select>
					</div>
					<div class="col-md-6 form-group">
						<label for="tel">Carga Horária</label>		
						<select required id="cargaHorariaCurso" name="cargaHorariaCurso" class="form-control form-control-lg" required>
							<option value="">Selecione a carga horária do curso</option>
							<option value="20h">20h (Vinte Horas)</option>
							<option value="40h">40h (Quarenta Horas)</option>
							<option value="60h">60h (Sesenta Horas)</option>
							<option value="80h">80h (Oitenta Horas)</option>
							<option value="100h">100h (Cem Horas)</option>
							<option value="120h">120h (Cento e Vinte Horas)</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 form-group">
						<label for="preRequisitosCurso">Pré Requisitos do Curso</label>
						<textarea name="preRequisitosCurso" id="preRequisitosCurso" cols="30" rows="5" class="form-control" required></textarea>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 form-group">
						<label for="descricaoCurso">Descrição do Curso</label>
						<textarea name="descricaoCurso" id="descricaoCurso" cols="30" rows="10" class="form-control" required></textarea>
					</div>
				</div>

				<div class="row">
					<div class="col-12">
						<input type="submit" value="Salvar Alterações" name="editarDadosCurso" class="btn btn-primary btn-lg px-5">
					</div>
				</div>
			</form>
        </div>
    </div>


  
  <?php include('Geral_Rodape.php');?>
 