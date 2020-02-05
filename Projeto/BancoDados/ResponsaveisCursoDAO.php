<?php

require("ConexaoBD.php");
require_once("ConsultasSQL.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Projetos/"."/Projeto_Plataforma/"."Model/Responsaveis_Curso.php");

class Responsaveis_CursoDAO {

    private $instance;

    public function __construct() {
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new Responsaveis_CursoDAO();
        }
        return self::$instance;
    }
    
    public function popularResponsaveisCurso($row) {
        $responsaveisCurso = new Aula($row['Id_Curso'], $row['CPF_Professor']);
        
        return $responsaveisCurso;
    }
    
    public function adicionarNovResponsavelCurso($responsavel) {

        try {
            $sql = Sql::getInstance()->adicionarNovoResponsavelCurso_SQL();
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);

            $stmt->bindParam(1, $resposta->getIdCurso());
            $stmt->bindParam(2, $resposta->getCpfProfessor());

            return $stmt->execute();
        } catch (Exception $e) {
            echo "<br> Erro Responsaveis_CursoDAODAO (adicionarNovResponsavelCurso)- Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }

    public function listarRespostasCurso($idCurso) {
        try {
            $sql = Sql::getInstance()->listarResponsaveiCurso_SQL();
            
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
            
            $stmt->bindParam(1, $idCurso);
            $stmt->execute();

            if ($stmt->rowCount() == 0) {
                return null;
            }

            $arrayResponsaveisCurso = array();

            while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $resposta = $this->popularResponsaveisCurso($linha);
                $arrayResponsaveisCurso[] = $resposta;
            }

            return $arrayResponsaveisCurso;
            
        } catch (Exception $e) {
            echo "<br> Erro Responsaveis_CursoDAO (listarRespostasCurso): Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }
        
    public function deletarResposta($idResposta) {
        try {
            $sql = Sql::getInstance()->deletarResposta_SQL();
            $stmt = $ConexaoPDO->prepare($sql);
            
            $stmt->bindParam(1, $idResposta);
            
            return $stmt->execute();
			
        } catch (Exception $e) {
            echo "Erro RespostaDAO (deletarResposta) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }

}
