<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Model/Professor.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."BancoDados/ConexaoBD.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."BancoDados/ConsultasSQL.php");

class ProfessorDAO {

    private static $instance;

    public function __construct() {
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new ProfessorDAO();
        }
        return self::$instance;
    }
    
    public function popularProfessor($row) {
        $professor = new Professor(
                $row['CPF_Professor'], $row['Id_Endereco'], $row['Nome'], $row['Email'], $row['Senha'], $row['Primeiro_Telefone'], $row['Bloqueado'], $row['FotoProfessor']);
        return $professor;
    }

    // Adiciona um novo administrador com um telefone
    public function adicionarNovoProfessor($professor) {

        try {
            $sql = ConsultasSQL::getInstance()->adicionarNovoProfessor_SQL();
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
			
            $stmt->bindParam(1, $professor->getCpfProfessor());
            $stmt->bindParam(2, $professor->getIdEndereco());
            $stmt->bindParam(3, $professor->getNome());
            $stmt->bindParam(4, $professor->getEmail());
            $stmt->bindParam(5, $professor->getSenha());
            $stmt->bindParam(6, $professor->getPrimeiroTelefone());
            $stmt->bindParam(7, $professor->getFoto());
			
            return $stmt->execute();
			
        } catch (Exception $e) {
            echo "<br> Erro ProfessorDAO (adicionarNovoProfessor)- Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }

    // Adiciona um novo administrador com dois telefones
    public function adicionarNovoProfessor_($professor) {

        try {
            $sql = ConsultasSQL::getInstance()->adicionarNovoProfessor2Tel_SQL();
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
			
            $stmt->bindParam(1, $professor->getCpfAdministrador());
            $stmt->bindParam(2, $professor->getIdEndereco());
            $stmt->bindParam(3, $professor->getNome());
            $stmt->bindParam(4, $professor->getEmail());
            $stmt->bindParam(5, $professor->getSenha());
            $stmt->bindParam(6, $professor->getPrimeiroTelefone());
            $stmt->bindParam(6, $professor->getSegundoTelefone());
            $stmt->execute();
        } catch (Exception $e) {
            echo "<br> Erro ProfessorDAO (adicionarNovoProfessor_) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }

    // Busca um administrador atravéz do CPF
    public function verificarProfessorCPF($cpf) {
        try {
            $sql = ConsultasSQL::getInstance()->buscarProfessor_SQL();
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
			
            $stmt->bindParam(1, $cpf);
            $stmt->execute();
			
            return ($stmt->rowCount() != 0);
			
        } catch (Exception $e) {
            echo "<br> Erro ProfessorDAO (buscarProfessorCPF) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }
	
    // Busca um administrador atravéz do CPF
    public function buscarProfessorCPF($cpf) {
        try {
            $sql = ConsultasSQL::getInstance()->buscarProfessor_SQL();
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
			
            $stmt->bindParam(1, $cpf);
            $stmt->execute();
			
            return $this->popularProfessor($stmt->fetch(PDO::FETCH_ASSOC));
			
        } catch (Exception $e) {
            echo "<br> Erro ProfessorDAO (buscarProfessorCPF) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }

    // Altenticar administrador através do CPF
    public function autenticarProfessorCPF($cpf, $senha) {
        try {
            $sql = ConsultasSQL::getInstance()->autenticarProfessorCPF_SQL();
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
			
            $stmt->bindParam(1, $cpf);
            $stmt->bindParam(2, $senha);
			
            $stmt->execute();

            return ($stmt->rowCount() == 1);
			
        } catch (Excepetion $e) {
            echo "<br> Erro ProfessorDAO (autenticarProfessorCPF) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
        return FALSE;
    }

    // Autenticar adminitrador atravéz do email
    public function autenticarProfessorEmail($email, $senha) {
        try {
            $sql = Sql::getInstance()->autenticarProfessorEmail_SQL();
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
            $stmt->bindParam(1, $email);
            $stmt->bindParam(2, $senha);
            $stmt->execute();

            return ($stmt->rowCount() == 1);
        } catch (Excepetion $e) {
            echo "<br> Erro ProfessorDAO (autenticarProfessorEmail) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }

        return FALSE;
    }

    // Editar senha do administrador
    public function editarSenhaProfessor($cpf, $novaSenha) {
        try {
            $sql = Sql::getInstance()->autenticarProfessorCPF_SQL();
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
            $stmt->bindParam(1, $novaSenha);
            $stmt->bindParam(2, $cpf);
            $stmt->execute();
        } catch (Excepetion $e) {
            echo "<br> Erro ProfessorDao (editarSenhaProfessor) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
        return FALSE;
    }

    // Edita dados do administrador
    public function editarDadosProfessor($professor) {
        try {
            $sql = Sql::getInstance()->alterarDadosProfessor_SQL();
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);

            $stmt->bindParam(1, $professor->getNome());
            $stmt->bindParam(2, $professor->getEmail());
            $stmt->bindParam(3, $professor->getPrimeiroTelefone());
            $stmt->bindParam(4, $professor->getSegundoTelefone());
            $stmt->bindParam(5, $professor->getCpfProfessor());

            $stmt->execute();
        } catch (Excepetion $e) {
            echo "<br> Erro ProfessorDAO (editarDadosProfessor) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }

// Apaga um administrador do banco
    public function deletarProfessor($cpf) {
        try {
            $sql = Sql::getInstance()->deletarProfessor_SQL();
            /* @var $ConexaoPDO type */
            $p_sql = $ConexaoPDO->prepare($sql);
            $p_sql->bindParam(1, $cpf);
            return $p_sql->execute();
        } catch (Exception $e) {
            echo "Erro ProfessorDAO (deletarProfessor) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }

    // Bloqueia ou desbloqueia um administrador
    public function bloquearDesbloquearProfessor($cpf, $statusBloqueio) {
        try {
            $sql = Sql::getInstance()->bloquearDesbloquearProfessor_SQL();
            $p_sql = $ConexaoPDO->prepare($sql);
            $p_sql->bindParam(1, $statusBloqueio);
            $p_sql->bindParam(2, $cpf);
        } catch (Exception $e) {
            echo "Erro professorDao (bloquearDesbloquearProfessor) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }

}

?>
