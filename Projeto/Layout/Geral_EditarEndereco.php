
  <?php include('Geral_CabecalhoLogado.php');?>

    
    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/mat.jpg')">
        <div class="container">
          <div class="row align-items-end justify-content-center text-center">
            <div class="col-lg-7">
              <h2 class="mb-0">Edição de Endereço</h2>
              <p>Preencha as informações necessárias para prosseguir com a edição.</p>
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
								<label for="username">Estado</label>						
								<select id="estado" name="estado" class="form-control form-control-lg" required>
									<option value="">Selecione o Estado</option>
									<option value="Acre (AC)">Acre (AC)</option>
									<option value="Alagoas (AL)">Alagoas (AL)</option>
									<option value="Amapá (AP)">Amapá (AP)</option>
									<option value="Amazonas (AM)">Amazonas (AM)</option>
									<option value="Bahia (BA)">Bahia (BA)</option>
									<option value="Ceará (CE)">Ceará (CE)</option>
									<option value="Espírito Santo (ES)">Espírito Santo (ES)</option>
									<option value="Goiás (GO)">Goiás (GO)</option>
									<option value="Maranhão (MA)">Maranhão (MA)</option>
									<option value="Mato Grosso (MT)">Mato Grosso (MT)</option>
									<option value="Mato Grosso do Sul (MS)">Mato Grosso do Sul (MS)</option>
									<option value="Minas Gerais (MG)">Minas Gerais (MG)</option>
									<option value="Pará (PA)">Pará (PA)</option>
									<option value="Paraíba (PB)">Paraíba (PB)</option>
									<option value="Paraná (PR)">Paraná (PR)</option>
									<option value="Pernambuco (PE)">Pernambuco (PE)</option>
									<option value="Piauí (PI)">Piauí (PI)</option>
									<option value="Rio de Janeiro (RJ)">Rio de Janeiro (RJ)</option>
									<option value="Rio Grande do Norte (RN)">Rio Grande do Norte (RN)</option>
									<option value="Rio Grande do Sul (RS)">Rio Grande do Sul (RS)</option>
									<option value="Rondônia (RO)">Rondônia (RO)</option>
									<option value="Roraima (RR)">Roraima (RR)</option>
									<option value="Santa Catarina (SC)">Santa Catarina (SC)</option>
									<option value="São Paulo (SP)">São Paulo (SP)</option>
									<option value="Sergipe (SE)">Sergipe (SE)</option>
									<option value="Tocantins (TO)">Tocantins (TO)</option>
									<option value="Distrito Federal (DF)">Distrito Federal (DF)</option>
								</select>
							</div>
							
							<div class="col-md-12 form-group">
								<label for="cidade">Cidade</label>
								<input type="text" id="cidade" class="form-control form-control-lg">
							</div>
							
							<div class="col-md-12 form-group">
								<label for="bairro">Bairro</label>
								<input type="text" id="bairro" class="form-control form-control-lg">
							</div>
							
							<div class="col-md-12 form-group">
								<label for="cep">CEP</label>
								<input type="text" id="cep" class="form-control form-control-lg">
							</div>
							
							<div class="col-md-12 form-group">
								<label for="descricao">Descrição do Endereço</label>
								<input type="numbTelefoneer" id="descricao" class="form-control form-control-lg">
							</div>
							
						</div>
						<div class="row">
							<div class="col-12">
								<input type="submit" name="editarEndereco" value="Salvar Alterações" class="btn btn-primary btn-lg px-5">
							</div>
						</div>
					</div>
				</div>				
			</form>
        </div>
    </div>
   

    
  
  <?php include('Geral_Rodape.php');?>
 