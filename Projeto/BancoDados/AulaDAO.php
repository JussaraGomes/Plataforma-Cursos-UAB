<?php

require("ConexaoBD.php");
require_once("ConsultasSQL.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Model/Aula.php");

class AulaDAO {

    private $instance;

    public function __construct() {
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new AulaDAO();
        }
        return self::$instance;
    }

    public function popularAula($row) {
        $aula = new Aula($row['Id_Aula'], $row['Id_Modulo'], $row['Nome_Aula']);
        
        return $aula;
    }

    public function adicionarNovaAula($aula) {

        try {
            $sql = Sql::getInstance()->adicionarAulaModulo_SQL();
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);

            $stmt->bindParam(1, $aula->getIdModulo());
            $stmt->bindParam(2, $aula->getNomeAula());

			return $stmt->execute();
			
        } catch (Exception $e) {
            echo "<br> Erro AulaDAO (adicionarNovaAula)- Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }

    public function listarAulasModulo($idModulo) {
        try {
            $sql = Sql::getInstance()->listarAulasModulo_SQL();
            
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
            
            $stmt->bindParam(1, $idModulo);
            $stmt->execute();

            if ($stmt->rowCount() == 0) {
                return null;
            }

            $arrayAulas = array();

            while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $aula = $this->popularAula($linha);
				
                $arrayAulas[] = $aula;
            }

            return $arrayAulas;
            
        } catch (Exception $e) {
            echo "<br> Erro AulaDAO(listarAulasModulo): Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
		
		return false;
    }
        
    public function deletarAula($idAula) {
        try {
            $sql = Sql::getInstance()->deletarAula_SQL();
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
            
            $stmt->bindParam(1, $idAula);
            
            return $stmt->execute();
			
        } catch (Exception $e) {
            echo "Erro AulaDAO (deletarAula) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }

}
