<?php

require("ConexaoBD.php");
require_once("ConsultasSQL.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Model/Prova.php");

class ProvaDAO {

    private $instance;

    public function __construct() {
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new ProvaDAO();
        }
        return self::$instance;
    }
    
    public function popularProva($row) {
        $prova = new Prova($row['Id_Prova'], $row['Id_Curso']);
        
        return $prova;
    }
    
    public function adicionarNovaProva($prova) {

        try {
            $sql = Sql::getInstance()->adicionarProva_SQL();
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);

            $stmt->bindParam(1, $prova->getIdCurso());

            $stmt->execute();
        } catch (Exception $e) {
            echo "<br> Erro ProvaDAO (adicionarNovaProva)- Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }
    
    public function listarProvas($idCurso) {
        try {
            $sql = Sql::getInstance()->listarProvasCurso_SQL();
            
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
            
            $stmt->bindParam(1, $idCurso);
            $stmt->execute();

            if ($stmt->rowCount() == 0) {
                return null;
            }

            $arrayProvas = array();

            while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $prova = $this->popularProva($linha);
                $arrayProvas[] = $prova;
            }

            return $arrayProvas;
            
        } catch (Exception $e) {
            echo "<br> Erro ProvaDAO(listarProvasCurso): Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }
        
    public function deletarProva($idProva) {
        try {
            $sql = Sql::getInstance()->deletarProva_SQL();
            $p_sql = $ConexaoPDO->prepare($sql);
            
            $p_sql->bindParam(1, $idProva);
            
            return $p_sql->execute();
            
        } catch (Exception $e) {
            echo "Erro ProvaDAO (deletarProva) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }
}
