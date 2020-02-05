<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProvaController
 *
 * @author Jussara Gomes
 */
class ProvaController {

    private $conexaoPDO;

    public function __construct() {
        $this->conexaoPDO = (new ConexaoBD)->getConexaoPDO();
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new ProvaController();
        }
        return self::$instance;
    }
    
    
    public function adicionarNovaProva($idCurso) {

    }
    
    public function listarProvas($idCurso) {

    }
        
    public function deletarProva($idProva) {
 
    }
    
}
