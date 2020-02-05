<?php

require("ConexaoBD.php");
require_once("ConsultasSQL.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Projetos/"."/Projeto_Plataforma/"."Model/Administrador.php");

class AdministradorDAO {

    private $instance;

    public function __construct() {
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new AdministradorDAO();
        }
        return self::$instance;
    }

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
//Cria uma instância de um administrador com dados oriúndos do banco
    public function popularAdministrador($row) { 
        $administrador = new Administrador(
                $row['CPF_Administrador'], $row['Id_Endereco'], $row['Nome'], $row['Email'], $row['Senha'], $row['Primeiro_Telefone'], $row['Segundo_Telefone'], $row['Bloqueado']);
        return $administrador;
    }
	
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
// Adiciona um novo administrador com apenas um telefone
    public function adicionarNovoAdministrador($administrador) {

        try {
            $sql = Sql::getInstance()->adicionarNovoAdministrador_SQL();
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
						
            $stmt->bindParam(1, $administrador->getNome());
            $stmt->bindParam(2, $administrador->getEmail());
            $stmt->bindParam(3, $administrador->getPrimeiroTelefone());
            $stmt->bindParam(4, $administrador->getSegundoTelefoneTelefone());
            $stmt->bindParam(5, $administrador->getCpfAdministrador());
            
			return $stmt->execute();
			
        } catch (Exception $e) {
            echo "<br> Erro AdministradorDAO (adicionarNovoAdministrador)- Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }
	
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
    
	// Adiciona um novo administrador com dois telefones
    public function adicionarNovoAdministrador_($administrador) {

        try {
            $sql = Sql::getInstance()->adicionarNovoAdministrador2Tel_SQL();
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
			
            $stmt->bindParam(1, $administrador->getCpfAdministrador());
            $stmt->bindParam(2, $administrador->getIdEndereco());
            $stmt->bindParam(3, $administrador->getNome());
            $stmt->bindParam(4, $administrador->getEmail());
            $stmt->bindParam(5, $administrador->getSenha());
            $stmt->bindParam(6, $administrador->getPrimeiroTelefone());
            $stmt->bindParam(6, $administrador->getSegundoTelefone());
            
			return $stmt->execute();
			
        } catch (Exception $e) {
            echo "<br> Erro AdministradorDAO (adicionarNovoAdministrador_) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }
	
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
    // Busca um administrador atravéz do CPF
    public function buscarAdministradorCPF($cpf) {
        try {
            $sql = Sql::getInstance()->buscarAdministrador_SQL();
			
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
            $stmt->bindParam(1, $cpf);
            $stmt->execute();
            
			return self::popularAdministrador($stmt->fetch(PDO::FETCH_ASSOC));

        } catch (Exception $e) {
            echo "<br> Erro AdministradorDAO (buscarAdministradorCPF) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }
	
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 

    // Altenticar administrador através do CPF
    public function autenticarAdministradorCPF($cpf, $senha) {
        try {
            $sql = Sql::getInstance()->autenticarAdministradorCPF_SQL();
			
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
            $stmt->bindParam(1, $cpf);
            $stmt->bindParam(2, $senha);
            $stmt->execute();

            return ($stmt->rowCount() == 1);
			                     
        } catch (Excepetion $e) {
            echo "<br> Erro AdministradorDAO (autenticarAdministradorCPF) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
        return FALSE;
    }

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 

    // Autenticar adminitrador atravéz do email
    public function autenticarAdministradorEmail($email, $senha) {
        try {
            $sql = Sql::getInstance()->autenticarAdministradorEmail_SQL();
			
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
            $stmt->bindParam(1, $email);
            $stmt->bindParam(2, $senha);
            $stmt->execute();

            return ($stmt->rowCount() == 1);
			
        } catch (Excepetion $e) {
            echo "<br> Erro AdministradorDAO (autenticarAdministradorEmail) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }

        return FALSE;
    }

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 

    // Editar senha do administrador
    public function editarSenhaAdministrador($cpf, $novaSenha) {
        try {
            $sql = Sql::getInstance()->autenticarAdministradorCPF_SQL();
			
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
            $stmt->bindParam(1, $novaSenha);
            $stmt->bindParam(2, $cpf);
            
			return $stmt->execute();
			
        } catch (Excepetion $e) {
            echo "<br> Erro AdministradorDAO (editarSenhaAdministrador) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
        return FALSE;
    }

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 

    // Edita dados do administrador
    public function editarDadosAdministrador($administrador) {
        try {
            $sql = Sql::getInstance()->alterarDadosAdministrador_SQL();
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);

            $stmt->bindParam(1, $administrador->getNome());
            $stmt->bindParam(2, $administrador->getEmail());
            $stmt->bindParam(3, $administrador->getPrimeiroTelefone());
            $stmt->bindParam(4, $administrador->getSegundoTelefone());
            $stmt->bindParam(5, $administrador->getCpfAluno());

            return $stmt->execute();
			
        } catch (Excepetion $e) {
            echo "<br> Erro AdministradorDAO (editarDadosAdministrador) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 

    // Apaga um administrador do banco
    public function deletarAdministrador($cpf) {
        try {
            $stmt = Sql::getInstance()->deletarAdministrador_SQL();
            $stmt = $ConexaoPDO->prepare($sql);
			
            $stmt->bindParam(1, $cpf);
            
			return $stmt->execute();
			
        } catch (Exception $e) {
            echo "Erro AdministradorDAO (deletarAdministrador) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }		
    }
	
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 

    // Bloqueia ou desbloqueia um administrador
    public function bloquearDesbloquearAdministrador($cpf, $statusBloqueio) {
        try {
            $sql = Sql::getInstance()->bloquearDesbloquearAdministrador_SQL();
            $stmt = $ConexaoPDO->prepare($sql);
            
			$stmt->bindParam(1, $statusBloqueio);
            $stmt->bindParam(2, $cpf);
			
			return $stmt->execute();
			
        } catch (Exception $e) {
            echo "Erro administradorDao (bloquearDesbloquearAdministrador) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }

}

?>
