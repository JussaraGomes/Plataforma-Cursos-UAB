<?php

require("ConexaoBD.php");
require_once("ConsultasSQL.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Model/Avaliacao.php");

class AvaliacaoDAO {
    
    private $instance;

    public function __construct() {
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new AvaliacaoDAO();
        }
        return self::$instance;
    }
    
    public function popularAvaliacao($row) {
        $avaliacao = new Avaliacao($row['Id_Avaliacao'], $row['Id_Matricula'], $row['Id_Prova'], $row['Nota']);
        
        return $avaliacao;
    }
    
    public function adicionarAvaliacao($avaliacao) {

        try {
            $sql = Sql::getInstance()->adicionarAvaliacao_SQL();
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
            
            $stmt->bindParam(1, $avaliacao->getIdMatricula());
            $stmt->bindParam(2, $avaliacao->getIdProva());
            $stmt->bindParam(3, $avaliacao->getNota());
            
            return $stmt->execute();
			
        } catch (Exception $e) {
            echo "<br> Erro AvaliacaoDAO (adicionarAvaliacao)- Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }

    
    public function listarAvaliacoesMatriculado($cpfAluno) {
        try {
            $sql = Sql::getInstance()->listarAvaliacoesMatriculado_SQL();
            
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
            
            $stmt->bindParam(1, $cpfAluno);
            $stmt->execute();

            if ($stmt->rowCount() == 0) {
                return null;
            }

            $arrayAvaliacoes = array();

            while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $avaliacao = $this->popularAvaliacao($linha);
                $arrayAvaliacoes[] = $avaliacao;
            }

            return $arrayAvaliacoes;
            
        } catch (Exception $e) {
            echo "<br> Erro AvaliacaoDAO(listarAvaliacoesMatriculado): Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }
            
    public function deletarAvaliacao($idAvaliacao) {
        try {
            $sql = Sql::getInstance()->deletarAvaliacao_SQL();
            $stmt = $ConexaoPDO->prepare($sql);
            
            $stmt->bindParam(1, $idAvaliacao);
            
            return $stmt->execute();
			
        } catch (Exception $e) {
            echo "Erro AvaliacaoDAO (deletarAvaliacao) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }
    
}
