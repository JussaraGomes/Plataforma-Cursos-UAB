<?php


require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Model/Material.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."BancoDados/MaterialDAO.php");

/**
 * Description of materialController
 *
 * @author Jussara Gomes
 */
class materialController {

    private $conexaoPDO;

    public function __construct() {
        $this->conexaoPDO = (new ConexaoBD)->getConexaoPDO();
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new AdministradorController();
        }
        return self::$instance;
    } 
    
    public function adicionarNovoMaterial($idAula, $nomeMaterial, $tipoMaterial, $arquivo) {
        $material = new Material($idAula, $nomeMaterial, $tipoMaterial, $arquivo);
        return EnderecoDAO::getInstance()->adicionarNovoMaterial($material);
    }
        
    public function listarMateriaisAulas($idAula) {
        return MaterialDAO::getInstance()->listarMateriaisAulas($idAula);
    }
    
    public function deletarMaterial($idMaterial) {
        return MaterialDAO::getInstance()->deletarMaterial($idMaterial);
    }
}
