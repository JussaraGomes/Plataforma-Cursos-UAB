
<?php include('Geral_CabecalhoLogado.php');?>

    
    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/mat.jpg')">
        <div class="container">
          <div class="row align-items-end justify-content-center text-center">
            <div class="col-lg-7">
              <h2 class="mb-0">Cadastro de Administrador</h2>
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
						<label for="nomeAdministrador">Nome</label>
						<input type="text" id="nomeAdministrador" name="nomeAdministrador" class="form-control form-control-lg" required="required">
					</div>
					<div class="col-md-6 form-group">
						<label for="logadouro">Logadouro</label>
						<input type="text" id="logadouro" name="logadouro" class="form-control form-control-lg" required="required">
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-6 form-group">
						<label for="cpfAdministrador">CPF</label>
						<input type="number" id="cpfAdministrador" name="cpfAdministrador" class="form-control form-control-lg" required="required">
					</div>
					<div class="col-md-6 form-group">
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
				</div>

				<div class="row">
					<div class="col-md-6 form-group">
						<label for="emailAdministrador">E-mail</label>
						<input type="email" id="emailAdministrador" name="emailAdministrador" class="form-control form-control-lg" required="required">
					</div>
					<div class="col-md-6 form-group">
						<label for="cidade">Cidade</label>
						<input type="text" id="cidade" name="cidade" class="form-control form-control-lg" required="required">
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-6 form-group">
						<label for="senhaAdministrador">Senha</label>
						<input type="password" id="senhaAdministrador" name="senhaAdministrador" class="form-control form-control-lg" required="required" >
					</div>
					<div class="col-md-6 form-group">
						<label for="bairro">Bairro</label>
						<input type="text" id="bairro" name="bairro" class="form-control form-control-lg" required="required">
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-6 form-group">
						<label for="senhaRepetidaAdministrador">Repita a senha</label>
						<input type="password" id="senhaRepetidaAdministrador" name="senhaRepetidaAdministrador" class="form-control form-control-lg" required="required">
					</div>
					<div class="col-md-6 form-group">
						<label for="cep">CEP</label>
						<input type="number" id="cep" name="cep" class="form-control form-control-lg" required="required">
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-6 form-group">
						<label for="telefone">Telefone</label>
						<input type="number" id="telefone" name="telefone" class="form-control form-control-lg" required="required">
					</div>
					<div class="col-md-6 form-group">
						<label for="descricao">Descrição do Endereço</label>
						<input type="numbTelefoneer" id="descricao" name="descricao" class="form-control form-control-lg" required="required">
					</div>
					
				</div>
				
				<label for="descricao"><font color="red">Senhas Diferentes</font></label>
				
				<div class="row">
					<div class="col-12">
						<input type="submit" name="cadastrar_administrador" value="Cadastrar Administrador" class="btn btn-primary btn-lg px-5" >
					</div>
				</div>
			</form>
        </div>
    </div>
   

  
  <?php include('Geral_Rodape.php');?>
  