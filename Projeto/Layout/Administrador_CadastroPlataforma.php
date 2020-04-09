<?php
	require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Facade/PlataformaFacade.php");	
	require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Facade/EnderecoFacade.php");	

	//session_start();
	
	//if( isset($_SESSION['cpf']) && isset ($_SESSION['senha']) ){
	  //include("CabecalhoLogado.php");
	  $plataforma	= PlataformaFacade::getInstance()->buscarPlataforma(1);
	  $endereco	= EnderecoFacade::getInstance()->buscarEndereco($plataforma->getIdEndereco
	  ());
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
              <h2 class="mb-0">Alteração dos Dados da Plataforma</h2>
              <p>Altera os dados gerais da plataforma </p>
            </div>
          </div>
        </div>
      </div> 
    

	<div class="site-section">
        <div class="container">
            <form class="form-horizontal" name="formulario" id="formulario" action="Acoes/AlteracaoDados.php" method="POST" enctype="multipart/form-data">


				<div class="row">
					<div class="col-md-6 form-group">
						<label for="idPlataforma">ID Plataforma</label>
						<input type="text" name="idPlataforma" id="idPlataforma" value="<?php echo $plataforma->getIdPlataforma();?>" class="form-control form-control-lg" required="required" readonly>
					</div>
					<div class="col-md-6 form-group">
						<label for="idEndereco">ID Endereço</label>
						<input type="text" name="idEndereco" id="idEndereco" value="<?php echo $plataforma->getIdEndereco();?>" class="form-control form-control-lg" required="required" readonly>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-6 form-group">
						<label for="nomePlataforma">Nome</label>
						<input type="text" name="nomePlataforma" value="<?php echo $plataforma->getNome();?>" id="nomePlataforma" class="form-control form-control-lg" required="required">
					</div>
					<div class="col-md-6 form-group">
						<label for="logadouro">Logadouro</label>
						<input type="text" name="logadouro" id="logadouro" value="<?php echo $endereco->getLogadouro();?>" class="form-control form-control-lg" required="required">
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-6 form-group">
						<label for="emailPlataforma">E-mail</label>
						<input type="email" name="emailPlataforma" id="emailPlataforma" value="<?php echo $plataforma->getEmail();?>" class="form-control form-control-lg" required="required">
					</div>
					<div class="col-md-6 form-group">
						<label for="estado">Estado</label>						
						<select id="estado" name="estado" class="form-control form-control-lg" required>
							<option value="<?php echo $endereco->getEstado();?>"><?php echo $endereco->getEstado();?></option>
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
						<label for="primeiroTelefonePlataforma">Primeiro Telefone</label>
						<input type="number" name="primeiroTelefonePlataforma" id="primeiroTelefonePlataforma" value="<?php echo $plataforma->getPrimeiroTelefone();?>" class="form-control form-control-lg" required="required">
					</div>
					<div class="col-md-6 form-group">
						<label for="cidade">Cidade</label>
						<input type="text" name="cidade" id="cidade" value="<?php echo $endereco->getCidade();?>" class="form-control form-control-lg" required="required">
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-6 form-group">
						<label for="linkSite">Link Site</label>
						<input type="numbTelefoneer" name="linkSite" id="linkSite" value="<?php echo $plataforma->getLinkSite();?>" class="form-control form-control-lg" required="required">
					</div>
					<div class="col-md-6 form-group">
						<label for="bairro">Bairro</label>
						<input type="text" name="bairro" id="bairro" value="<?php echo $endereco->getBairro();?>" class="form-control form-control-lg" required="required">
					</div>
				</div>
				
				<div class="row">					
					<div class="col-md-6 form-group">
						<label for="linkFacebook">Link Facebook</label>
						<input type="numbTelefoneer" name="linkFacebook" id="linkFacebook" value="<?php echo $plataforma->getLinkFacebook();?>" class="form-control form-control-lg" required="required">
					</div>
					<div class="col-md-6 form-group">
						<label for="cep">CEP</label>
						<input type="number" name="cep" id="cep" value="<?php echo $endereco->getCep();?>"  class="form-control form-control-lg" required="required">
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-6 form-group">
						<label for="linkInstagram">Link Instagram</label>
						<input type="numbTelefoneer" name="linkInstagram" id="linkInstagram" value="<?php echo $plataforma->getLinkInstagram();?>" class="form-control form-control-lg" required="required">
					</div>
					<div class="col-md-6 form-group">
						<label for="descricao">Descrição do Endereço</label>
						<input type="numbTelefoneer" name="descricao" id="descricao" value="<?php echo $endereco->getDescricao();?>" class="form-control form-control-lg" required="required">
					</div>
				</div>
				
				
				<div class="row">
					<div class="col-md-12 form-group">
						<label for="descricaoPlataforma">Descrição da Plataforma</label>
						<textarea name="descricaoPlataforma" id="descricaoPlataforma" cols="30" rows="20" class="form-control" required><?php echo $plataforma->getDescricao();?></textarea>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12 form-group">
						<label for="comoFuncionaPlataforma">Como Funciona</label>
						<textarea name="comoFuncionaPlataforma" id="comoFuncionaPlataforma" cols="30" rows="10" class="form-control" required><?php echo $plataforma->getComoFunciona();?></textarea>
					</div>
				</div>
				
	
				<div class="row">
					<div class="col-12">
						
						<!-- Implementar mecanismo de verificação de alteração nos campos -->
						<input onclick="functionA()" type="submit" id="alterar_plataforma" name="alterar_plataforma" value="Alterar os Dados da Plataforma" class="btn btn-primary btn-lg px-5">
					</div>
				</div>
			</form>
        </div>
    </div>
   


  
  <?php include('Geral_Rodape.php');?>
  