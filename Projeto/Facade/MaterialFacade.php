<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Controller/MaterialController.php");

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MaterialFacade
 *
 * @author Jussara Gomes
 */
class MaterialFacade {

    private $conexaoPDO;

    public function __construct() {
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new MaterialFacade();
        }
        return self::$instance;
    }
    
    
    public function adicionarNovoMAterial($idAula, $nomeMaterial, $tipoMaterial, $arquivo) {
		return  MaterialController::getInstance()->adicionarNovoMaterial($idAula, $nomeMaterial, $tipoMaterial, $arquivo);
    }
        
    public function listarMateriaisAulas($idAula) {
		return  MaterialController::getInstance()->listarMateriaisAulas($idAula);
    }
    
    public function deletarMaterial($idMaterial) {
		return  MaterialController::getInstance()->deletarMaterial($idMaterial);
    }
}
