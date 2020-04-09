<?php


require("ConexaoBD.php");
require_once("ConsultasSQL.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Model/Modulo.php");

class ModuloDAO {

    private $instance;

    public function __construct() {
        $this->conexaoPDO = (new ConexaoBD)->getConexaoPDO();
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new ModuloDAO();
        }
        return self::$instance;
    }
    
    public function popularModulo($row) { 
        $modulo = new Modulo(
                $row['Id_Modulo'], $row['Id_Curso'], $row['Nome_Modulo']);
        return $modulo;
    }
    
    public function adicionarNovoModulo($modulo) {

        try {
            $sql = Sql::getInstance()->adicionarNovoAdministrador_SQL();
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
            
            $stmt->bindParam(1, $modulo->getIdCurso());
            $stmt->bindParam(2, $modulo->getNomeModulo());
            
            $stmt->execute();
            
        } catch (Exception $e) {
            echo "<br> Erro ModuloDAO (adicionarNovoModulo)- Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }

    public function listarModulosCurso($idCurso) {
        try {
            $sql = Sql::getInstance()->listarModulosCurso_SQL();
            
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
            
            $stmt->bindParam(1, $idCurso);
            $stmt->execute();

            if ($stmt->rowCount() == 0) {
                return null;
            }

            $arrayModulos = array();

            while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $modulo = $this->popularModulo($linha);
                $arrayModulos[] = $modulo;
            }

            return $arrayModulos;
            
        } catch (Exception $e) {
            echo "<br> Erro ModuloDAO(listarModulosCurso): Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }
        
    public function deletarModulo($idModulo) {
        try {
            $sql = Sql::getInstance()->deletarModulo_SQL();
            $p_sql = $ConexaoPDO->prepare($sql);
            
            $p_sql->bindParam(1, $idModulo);
            
            return $p_sql->execute();
        } catch (Exception $e) {
            echo "Erro ModuloDAO (deletarModulo) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }
}
