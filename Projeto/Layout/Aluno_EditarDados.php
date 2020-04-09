<?php
	require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Facade/AlunoFacade.php");	
	require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Facade/EnderecoFacade.php");	

	session_start();
	
	//if( isset($_SESSION['cpf']) && isset ($_SESSION['senha']) ){
	//  $aluno	= AlunoFacade::getInstance()->buscarAlunoCPF($_SESSION['cpf']);
	  $aluno	= AlunoFacade::getInstance()->buscarAlunoCPF('05819068530');
	  $endereco	= EnderecoFacade::getInstance()->buscarEndereco($aluno->getIdEndereco());
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
              <h2 class="mb-0">Editar Dados do Aluno</h2>
              <p>Altere as informações que deseja editar.</p>
            </div>
          </div>
        </div>
      </div> 
    

	<div class="site-section">
        <div class="container">
            <form class="form-horizontal" id="formulario" action="Acoes/Cadastro.php" method="POST" enctype="multipart/form-data">

				<div class="row">
					<div class="col-md-6 form-group">
						<label for="nomeAluno">Nome</label>
						<input type="text" name="nomeAluno" id="nomeAluno" value="<?php echo $aluno->getNome();?>" class="form-control form-control-lg" required="required">
					</div>
					<div class="col-md-6 form-group">
						<label for="logadouro">Logadouro</label>
						<input type="text" name="logadouro" id="logadouro" value="<?php echo $endereco->getLogadouro();?>" class="form-control form-control-lg" required="required">
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-6 form-group">
						<label for="cpfAluno">CPF</label>
						<input type="number" name="cpfAluno" id="cpfAluno" value="<?php echo $aluno->getCpfAluno();?>"  class="form-control form-control-lg" required="required" readonly>
					</div>
					<div class="col-md-6 form-group">
						<label for="username">Estado</label>						
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
						<label for="emailAluno">E-mail</label>
						<input type="email" name="emailAluno" id="emailAluno" value="<?php echo $aluno->getEmail();?>" class="form-control form-control-lg" required="required">
					</div>
					<div class="col-md-6 form-group">
						<label for="cidade">Cidade</label>
						<input type="text" name="cidade" id="cidade" value="<?php echo $endereco->getCidade();?>" class="form-control form-control-lg" required="required">
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-6 form-group">
						<label for="senhaAluno">Senha</label>
						<input type="password" name="senhaAluno" id="senhaAluno" value="<?php echo $aluno->getSenha();?>" class="form-control form-control-lg" required="required" >
					</div>
					<div class="col-md-6 form-group">
						<label for="bairro">Bairro</label>
						<input type="text" name="bairro" id="bairro" value="<?php echo $endereco->getBairro();?>" class="form-control form-control-lg" required="required">
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-6 form-group">
						<label for="senhaRepetidaAluno">Repita a senha</label>
						<input type="password" name="senhaRepetidaAluno" id="senhaRepetidaAluno" value="<?php echo $aluno->getSenha();?>" class="form-control form-control-lg" required="required">
					</div>
					<div class="col-md-6 form-group">
						<label for="cep">CEP</label>
						<input type="number" name="cep" id="cep" value="<?php echo $endereco->getCep();?>" class="form-control form-control-lg" required="required">
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-6 form-group">
						<label for="senhaRepetidaAluno">Telefone</label>
						<input type="number" name="telefone" id="telefone" value="<?php echo $aluno->getTelefone();?>"  class="form-control form-control-lg" required="required">
					</div>
					<div class="col-md-6 form-group">
						<label for="descricao">Descrição do Endereço</label>
						<input type="numbTelefoneer" name="descricao" id="descricao" value="<?php echo $endereco->getDescricao();?>" class="form-control form-control-lg" required="required">
					</div>
				</div>
				
				<label for="descricao"><font color="red">Senhas Diferentes</font></label>
				
				<div class="row">
					<div class="col-12">
						<input type="submit" name="alterar_aluno" value="Editar Dados do Aluno" class="btn btn-primary btn-lg px-5">
					</div>
				</div>
			</form>
        </div>
    </div>
   

  
  <?php include('Geral_Rodape.php');?>
  