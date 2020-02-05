<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AulaController
 *
 * @author Jussara Gomes
 */
class AulaController {

    private $conexaoPDO;

    public function __construct() {
        $this->conexaoPDO = (new ConexaoBD)->getConexaoPDO();
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new AulaController();
        }
        return self::$instance;
    }
    
    public function adicionarNovaAula($idModulo, $nomeAula) {
        return AulaDAO::getInstance()-->adicionarNovaAula($idModulo, $nomeAula);
    }

    public function listarAulasModulo($idModulo) {
        return AulaDAO::getInstance()-->listarAulasModulo($idModulo);
    }
        
    public function deletarAula($idAula) {
        return AulaDAO::getInstance()-->deletarAula($idAula);
    }
}
