<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Model/Aluno.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."BancoDados/ConexaoBD.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."BancoDados/ConsultasSQL.php");

class AlunoDAO {

    private static $instance;

    public function __construct() {
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new AlunoDAO();
        }
        return self::$instance;
    }

    public function popularAluno($row) { 
        $aluno = new Aluno(
                $row['CPF_Aluno'], $row['Id_Endereco'], $row['Nome'], $row['Email'], $row['Senha'], $row['Primeiro_Telefone'], $row['Bloqueado']);
        return $aluno;
    }
	
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 

    // Adiciona um novo administrador com um telefone
    public function adicionarNovoAluno($aluno) {

        try {
            $sql = ConsultasSQL::getInstance()->adicionarNovoAluno_SQL();
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
			
            $stmt->bindParam(1, $aluno->getCpfAluno());
            $stmt->bindParam(2, $aluno->getIdEndereco());
            $stmt->bindParam(3, $aluno->getNome());
            $stmt->bindParam(4, $aluno->getEmail());
            $stmt->bindParam(5, $aluno->getSenha());
            $stmt->bindParam(6, $aluno->getTelefone());
           // $stmt->bindParam(7, $aluno->getBloqueado());
			
			return $stmt->execute();

        } catch (Exception $e) {
            echo "<br> Erro AlunoDAO (adicionarNovoAluno)- Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }
    
	public function verificarAlunoCPF($cpf) {
        try {
            $sql = ConsultasSQL::getInstance()->buscarAluno_SQL();			
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
			
            $stmt->bindParam(1, $cpf);
            $stmt->execute();
            
			return ($stmt->rowCount() != 0);
			
        } catch (Exception $e) {
            echo "<br> Erro AlunoDAO (buscarAlunoCPF) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 

    // Busca um administrador atravéz do CPF
    public function buscarAlunoCPF($cpf) {
        try {
            $sql = ConsultasSQL::getInstance()->buscarAluno_SQL();
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
			
            $stmt->bindParam(1, $cpf);
            
			$stmt->execute();
            
			return self::popularAluno($stmt->fetch(PDO::FETCH_ASSOC));
			
        } catch (Exception $e) {
            echo "<br> Erro AlunoDAO (buscarAlunoCPF) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 

    // Altenticar administrador através do CPF
    public function autenticarAlunoCPF($cpf, $senha) {
        try {
            $sql = Sql::getInstance()->autenticarAlunoCPF_SQL();
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
            
			$stmt->bindParam(1, $cpf);
            $stmt->bindParam(2, $senha);
            $stmt->execute();

            return ($stmt->rowCount() == 1);
			
        } catch (Excepetion $e) {
            echo "<br> Erro AlunoDAO (autenticarAlunoCPF) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
        return FALSE;
    }

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 

    // Autenticar adminitrador atravéz do email
    public function autenticarAlunoEmail($email, $senha) {
        try {
            $sql = Sql::getInstance()->autenticarAlunoEmail_SQL();
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
            
			$stmt->bindParam(1, $email);
            $stmt->bindParam(2, $senha);
			
            $stmt->execute();

            return ($stmt->rowCount() == 1);
			
        } catch (Excepetion $e) {
            echo "<br> Erro AlunoDAO (autenticarAlunoEmail) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }

        return FALSE;
    }

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 

    // Editar senha do administrador
    public function editarSenhaAluno($cpf, $novaSenha) {
        try {
            $sql = Sql::getInstance()->autenticarAlunoCPF_SQL();
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
			
            $stmt->bindParam(1, $novaSenha);
            $stmt->bindParam(2, $cpf);
            
			$stmt->execute();
			
        } catch (Excepetion $e) {
            echo "<br> Erro AlunoDAO (editarSenhaAluno) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 

    // Edita dados do administrador
    public function editarDadosAluno($aluno) {
        try {
            $sql = Sql::getInstance()->alterarDadosAluno_SQL();
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);

            $stmt->bindParam(1, $aluno->getNome());
            $stmt->bindParam(2, $aluno->getEmail());
            $stmt->bindParam(3, $aluno->getPrimeiroTelefone());
            $stmt->bindParam(4, $aluno->getSegundoTelefone());
            $stmt->bindParam(5, $aluno->getCpfProfessor());

            $stmt->execute();
        } catch (Excepetion $e) {
            echo "<br> Erro AlunoDAO (editarDadosAluno) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 

// Apaga um administrador do banco
    public function deletarAluno($cpf) {
        try {
            $sql = Sql::getInstance()->deletarAluno_SQL();
            $stmt = $ConexaoPDO->prepare($sql);
			
            $stmt->bindParam(1, $cpf);
			
            return $stmt->execute();
			
        } catch (Exception $e) {
            echo "Erro AlunoDAO (deletarAluno) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 

    // Bloqueia ou desbloqueia um administrador
    public function bloquearDesbloquearAluno($cpf, $statusBloqueio) {
        try {
            $sql = Sql::getInstance()->bloquearDesbloquearAluno_SQL();
            $stmt = $ConexaoPDO->prepare($sql);
            
			$stmt->bindParam(1, $statusBloqueio);
            $stmt->bindParam(2, $cpf);
			
			return $stmt->execute();
			
        } catch (Exception $e) {
            echo "Erro alunoDao (bloquearDesbloquearAluno) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }

}

?>
