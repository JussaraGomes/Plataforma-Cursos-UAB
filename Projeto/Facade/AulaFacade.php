<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Controller/AulaController.php");


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AulaFacade
 *
 * @author Jussara Gomes
 */
class AulaFacade {

    private $conexaoPDO;

    public function __construct() {
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new AulaFacade();
        }
        return self::$instance;
    }
    
    
    public function adicionarNovaAula($idModulo, $nomeAula) {
		return  AulaController::getInstance()->adicionarNovaAula($idModulo, $nomeAula);
    }

    public function listarAulasModulo($idModulo) {
		return  AulaController::getInstance()->listarAulasModulo($idModulo);
    }
        
    public function deletarAula($idAula) {
		return  AulaController::getInstance()->deletarAula($idAula);
    }
}
