<?php

require("ConexaoBD.php");
require_once("ConsultasSQL.php");
require("../Model/Resposta.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Projetos/"."/Projeto_Plataforma/"."Model/Resposta.php");

class RespostaDAO {

    private $instance;

    public function __construct() {
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new RespostaDAO();
        }
        return self::$instance;
    }
    
    public function popularAula($row) {
        $aula = new Aula($row['Id_Resposta'], $row['Id_Pergunta'], $row['Texto_Resposta'], $row['Data_Resposta']);
        
        return $aula;
    }
    
    public function adicionarNovaResposta($resposta) {

        try {
            $sql = Sql::getInstance()->adicionarNovaResposta_SQL();
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);

            $stmt->bindParam(1, $resposta->getIdPergunta());
            $stmt->bindParam(2, $resposta->getTextoPergunta());
            $stmt->bindParam(2, $resposta->getDataPergunta());

            $stmt->execute();
        } catch (Exception $e) {
            echo "<br> Erro AulaDAO (adicionarNovaAula)- Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }

    public function listarRespostasPergunta($idPergunta) {
        try {
            $sql = Sql::getInstance()->listarRespostasPergunta_SQL();
            
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
            
            $stmt->bindParam(1, $idPergunta);
            $stmt->execute();

            if ($stmt->rowCount() == 0) {
                return null;
            }

            $arrayRespostas = array();

            while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $resposta = $this->popularAula($linha);
                $arrayRespostas[] = $resposta;
            }

            return $arrayRespostas;
            
        } catch (Exception $e) {
            echo "<br> Erro RespostaDAO (listarRespostasPergunta): Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }
        
    public function deletarResposta($idResposta) {
        try {
            $sql = Sql::getInstance()->deletarResposta_SQL();
            $p_sql = $ConexaoPDO->prepare($sql);
            
            $p_sql->bindParam(1, $idResposta);
            
            return $p_sql->execute();
        } catch (Exception $e) {
            echo "Erro RespostaDAO (deletarResposta) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }

}
