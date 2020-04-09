<?php

require("ConexaoBD.php");
require_once("ConsultasSQL.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Model/Questoes_Prova.php");

class Questoes_ProvaDAO {

    private $instance;

    public function __construct() {
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new Questoes_ProvaDAO();
        }
        return self::$instance;
    }
    
    public function popularQuestaoProva($row) {
        $questaoProva = new Questoes_Prova($row['Id_Prova'], $row['Pergunta_Questao'], $row['Alternativa_Correta'], $row['Alternativa_Incorreta1'], $row['Alternativa_Incorreta2'], $row['Alternativa_Incorreta3'], $row['Alternativa_Incorreta4']);
        
        return $questaoProva;
    }
    
    public function adicionarNovaQuestao($questaoProva) {

        try {
            $sql = Sql::getInstance()->adicionarQuestao_SQL();
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);

            $stmt->bindParam(1, $questaoProva->getPerguntaQuestao());
            $stmt->bindParam(2, $questaoProva->getAlternativaCorreta());
            $stmt->bindParam(3, $questaoProva->getAlternativaIncorreta1());
            $stmt->bindParam(4, $questaoProva->getAlternativaIncorreta2());
            $stmt->bindParam(5, $questaoProva->getAlternativaIncorreta3());
            $stmt->bindParam(6, $questaoProva->getAlternativaIncorreta4());

            $stmt->execute();
        } catch (Exception $e) {
            echo "<br> Erro Questao_ProvaDAO (adicionarNovaAula)- Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }

    public function listarQuestoesProva($idProva) {
        try {
            $sql = Sql::getInstance()->listarQuestoesProva_SQL();
            
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
            
            $stmt->bindParam(1, $idProva);
            $stmt->execute();

            if ($stmt->rowCount() == 0) {
                return null;
            }

            $arrayQuestoes = array();

            while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $questao = $this->popularAula($linha);
                $arrayQuestoes[] = $questao;
            }

            return $arrayQuestoes;
            
        } catch (Exception $e) {
            echo "<br> Erro Questao_ProvaDAO (listarQuestoesProva): Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }
            
    public function deletarQuestao($idQuestao) {
        try {
            $sql = Sql::getInstance()->deletarQuestao_SQL();
            $p_sql = $ConexaoPDO->prepare($sql);
            
            $p_sql->bindParam(1, $idQuestao);
            
            return $p_sql->execute();
        } catch (Exception $e) {
            echo "Erro Questao_ProvaDAO (deletarQuestao) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }    
    
        }
