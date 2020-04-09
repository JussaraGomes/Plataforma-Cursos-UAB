<?php

require("ConexaoBD.php");
require_once("ConsultasSQL.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Model/Material.php");

class MaterialDAO {

    private $instance;

    public function __construct() {
        $this->conexaoPDO = (new ConexaoBD)->getConexaoPDO();
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new MaterialDAO();
        }
        return self::$instance;
    }
    
    public function popularMaterial($row) { 
        $material = new Material(
                $row['Id_Material'], $row['Id_Aula'], $row['Nome_Material'], $row['Tipo_Material'], $row['Arquivo']);
        return $material;
    }
    
    public function adicionarNovoMAterial($material) {

        try {
            $sql = Sql::getInstance()->adicionarNovoMaterial_SQL();
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
            
            $stmt->bindParam(1, $material->getIdAula());
            $stmt->bindParam(2, $material->getNomeMaterial());
            $stmt->bindParam(3, $material->getTipoMaterial());
            $stmt->bindParam(4, $material->getArquivo());
            
            $stmt->execute();
            
        } catch (Exception $e) {
            echo "<br> Erro MaterialDAO (adicionarNovoMaterial)- Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }
        
    public function listarMateriaisAulas($idAula) {
        try {
            $sql = Sql::getInstance()->listarMateriaisAula_SQL();
            
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
            
            $stmt->bindParam(1, $idAula);
            $stmt->execute();

            if ($stmt->rowCount() == 0) {
                return null;
            }

            $arrayMateriais = array();

            while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $material = $this->popularAula($linha);
                $arrayMateriais[] = $material;
            }

            return $arrayMateriais;
            
        } catch (Exception $e) {
            echo "<br> Erro MaterialDAO(listarMaterialAula): Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }
    
    public function deletarMaterial($idMaterial) {
        try {
            $sql = Sql::getInstance()->deletarMaterial_SQL();
            $p_sql = $ConexaoPDO->prepare($sql);
            
            $p_sql->bindParam(1, $idMaterial);
            
            return $p_sql->execute();
                    
        } catch (Exception $e) {
            echo "Erro MaterialDAO (deletarMaterial) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }
}
